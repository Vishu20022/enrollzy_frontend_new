<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MentorAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('mentor.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email'],
            'mobile' => ['required', 'digits:10', 'unique:users,mobile'],
            'msg91_token' => ['required'], 
        ]);

        $authKey = env('MSG91_AUTH_KEY', '509095AeRzdoYXdas69e1d083P1');
        
        try {
            $response = Http::withoutVerifying()->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->withBody(json_encode([
                'authkey' => $authKey,
                'access-token' => $request->msg91_token
            ]), 'application/json')->post('https://control.msg91.com/api/v5/widget/verifyAccessToken');

            $data = $response->json();
            $type = is_array($data) ? ($data['type'] ?? '') : '';

            if (!$response->successful() || $type !== 'success') {
                return response()->json([
                    'success' => false,
                    'message' => 'OTP verification failed with MSG91.'
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error communicating with MSG91: ' . $e->getMessage()
            ], 500);
        }

        $verifiedMobile = is_array($data) ? ($data['message'] ?? '') : '';
        $phone = substr($verifiedMobile, -10);

        if ($phone !== $request->mobile) {
            return response()->json([
                'success' => false,
                'message' => 'The verified mobile number does not match the registration number.'
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $phone,
            'role' => 'mentor',
            'password' => Hash::make(Str::random(10)),
        ]);

        Auth::login($user);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('mentor.dashboard')
            ]);
        }

        return redirect()->route('mentor.dashboard')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('mentor.auth.login-otp');
    }

    public function loginOtpSubmit(Request $request)
    {
        // Only allow mentors to login through here, but since it's just users, we can just check if user exists.
        // We'll restrict to mentors only during verifyOtp or allow upgrade. Let's just check mobile exists.
        $request->validate([
            'mobile' => ['required', 'digits:10', 'exists:users,mobile'],
        ]);

        session([
            'mentor_mobile' => $request->mobile,
            'mentor_otp_type' => 'login'
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('mentor.otp.verify');
    }

    public function showVerifyOtp()
    {
        if (!session('mentor_mobile')) {
            return redirect()->route('mentor.login');
        }
        return view('mentor.auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $authKey = env('MSG91_AUTH_KEY', '509095AeRzdoYXdas69e1d083P1'); 
        
        try {
            $response = Http::withoutVerifying()->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->withBody(json_encode([
                'authkey' => $authKey,
                'access-token' => $request->token
            ]), 'application/json')->post('https://control.msg91.com/api/v5/widget/verifyAccessToken');

            $data = $response->json();
            $type = is_array($data) ? ($data['type'] ?? '') : '';

            if (!$response->successful() || $type !== 'success') {
                return response()->json([
                    'success' => false,
                    'message' => is_array($data) ? ($data['message'] ?? 'OTP verification failed.') : 'Verification failed.'
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error communicating with MSG91: ' . $e->getMessage()
            ], 500);
        }

        $mobile = is_array($data) ? ($data['message'] ?? '') : '';
            if (!$mobile) {
                return response()->json(['success' => false, 'message' => 'Invalid response from MSG91'], 422);
            }

            $phone = substr($mobile, -10);
            $user = User::where('mobile', $phone)->first();
            
            if (!$user) {
                 return response()->json(['success' => false, 'message' => 'User not found. Please register.'], 422);
            }

            // Optional: Upgrade user to mentor if they login here, or just let them login.
            if ($user->role !== 'mentor') {
                $user->role = 'mentor';
                $user->save();
            }

            Auth::login($user, true);
            session()->forget(['mentor_mobile', 'mentor_otp_type']); 

            return response()->json([
                'success' => true,
                'redirect' => route('mentor.dashboard')
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pages.home');
    }
}
