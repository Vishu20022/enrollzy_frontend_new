<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteProtectionController extends Controller
{
    public function index()
    {
        if (session()->has('site_protected_access')) {
            return redirect('/');
        }
        return view('site_protection_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === 'enrollzy' && $request->password === '12345678') {
            session(['site_protected_access' => true]);
            return redirect()->intended('/');
        }

        return back()->withErrors(['message' => 'Invalid credentials. Please try again.']);
    }
}
