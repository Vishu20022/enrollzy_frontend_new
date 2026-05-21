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
            'firebase_token' => ['required'], // Ensure token is passed from frontend
        ]);

        // In a real app, you would verify the firebase_token here using Firebase Admin SDK
        // For now, we trust the frontend verification as requested

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
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
            'mobile' => 'required|digits:10',
            'firebase_token' => 'required'
        ]);

        $mobile = $request->mobile;
        
        // Verify Firebase Token here in production
        
        $user = User::where('mobile', $mobile)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        Auth::login($user);
        session()->forget(['mobile', 'otp_type']); 
        
        return response()->json([
            'success' => true,
            'redirect' => route('pages.home')
        ]);
    }
}
