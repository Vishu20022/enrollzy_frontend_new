<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the user login form.
     */
    public function showLoginForm()
    {
        return view('auth.login-password');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mobile' => ['required', 'digits:10'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['mobile' => $credentials['mobile'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended(route('pages.home'));
        }

        return back()->withErrors([
            'mobile' => 'The provided credentials do not match our records.',
        ])->onlyInput('mobile');
    }



    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        // Logout from all possible professional guards
        Auth::guard('web')->logout();
        Auth::guard('expert')->logout();
        Auth::guard('alumni')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'digits:10', 'unique:users,mobile'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'msg91_token' => ['required'], // Ensure MSG91 token is passed from frontend
        ]);

        // Verify the MSG91 token securely
        $authKey = env('MSG91_AUTH_KEY', '509095AeRzdoYXdas69e1d083P1');
        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->withBody(json_encode([
            'authkey' => $authKey,
            'access-token' => $request->msg91_token
        ]), 'application/json')->post('https://control.msg91.com/api/v5/widget/verifyAccessToken');

        $data = $response->json();

        if (!$response->successful() || ($data['type'] ?? '') !== 'success') {
            return response()->json([
                'success' => false,
                'message' => 'OTP verification failed. Please try again.'
            ], 422);
        }

        $verifiedMobile = $data['message'] ?? '';
        $phone = substr($verifiedMobile, -10);

        if ($phone !== $request->mobile) {
            return response()->json([
                'success' => false,
                'message' => 'The verified mobile number does not match the registration number.'
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'mobile' => $phone,
            'password' => Hash::make($request->password),
            'email' => null,
        ]);

        Auth::login($user);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('pages.home')
            ]);
        }

        return redirect()->route('pages.home')->with('success', 'Registration successful!');
    }

    public function loginOtpSubmit(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'digits:10', 'exists:users,mobile'],
        ]);

        // Store in session for tracking
        session([
            'mobile' => $request->mobile,
            'otp_type' => 'login'
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('otp.verify');
    }

    public function showVerifyOtp()
    {
        if (!session('otp') || !session('mobile')) {
            return redirect()->route('login-otp');
        }
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $authKey = env('MSG91_AUTH_KEY', '509095AeRzdoYXdas69e1d083P1'); // Fallback to a default if not set
        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->withBody(json_encode([
            'authkey' => $authKey,
            'access-token' => $request->token
        ]), 'application/json')->post('https://control.msg91.com/api/v5/widget/verifyAccessToken');

        $data = $response->json();

        if ($response->successful() && ($data['type'] ?? '') == 'success') {
            $mobile = $data['message'] ?? '';
            if (!$mobile) {
                return response()->json(['success' => false, 'message' => 'Invalid response from MSG91'], 422);
            }

            // Extract the 10-digit number
            $phone = substr($mobile, -10);

            $user = User::where('mobile', $phone)->first();
            
            if (!$user) {
                // Auto-register the user if they don't exist
                $user = User::create([
                    'name' => 'User', // default name
                    'mobile' => $phone,
                    'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(10)),
                    'email' => null,
                ]);
            }

            Auth::login($user, true);
            session()->forget(['mobile', 'otp_type']); 

            return response()->json([
                'success' => true,
                'redirect' => route('pages.home')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $data['message'] ?? 'OTP verification failed. Please try again.'
        ], 422);
    }
}
