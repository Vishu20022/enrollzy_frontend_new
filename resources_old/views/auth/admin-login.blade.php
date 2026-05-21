@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('css/login/login-password.css') }}">
<style>
    .admin-login-card {
        border-top: 5px solid #ff4d4d; /* Adjust color for admin theme */
    }
    .admin-badge {
        display: inline-block;
        background: #ff4d4d;
        color: #fff;
        padding: 2px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-bottom: 10px;
    }
    .login-section .login-card::before {
        pointer-events: none;
    }
</style>
@endpush

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">

            <!-- LEFT IMAGE (Optional for admin, keep same or different) -->
            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div class="login-illustration floating">
                    <img 
                        src="{{ asset('images/auth/login-password.png') }}" 
                        alt="Admin Login" >
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="col-lg-6">
                <div class="login-card admin-login-card text-center">
                    <span class="admin-badge">ADMINISTRATION</span>
                    <h2 class="mb-4">Secure Admin Login</h2>

                    <form action="{{ route('admin.login') }}" method="POST" id="adminLoginForm">
                        @csrf

                        @if(session('error'))
                            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
                        @endif

                        @if(session('status'))
                            <div class="alert alert-success mb-3">{{ session('status') }}</div>
                        @endif

                        <!-- EMAIL -->
                        <div class="otp-input-group mb-3 text-start">
                            <span class="country-code">
                                <i class="fa-regular fa-envelope"></i>
                            </span>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Admin Email"
                                required>
                        </div>
                        @error('email')
                            <div class="text-danger mb-2 text-start">{{ $message }}</div>
                        @enderror

                        <!-- PASSWORD -->
                        <div class="otp-input-group mb-4 text-start">
                            <span class="country-code">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                required>
                        </div>
                        @error('password')
                            <div class="text-danger mb-2 text-start">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-danger w-100 mb-3">
                            Login as Admin
                        </button>

                    </form>

                    <div class="mt-3">
                        <a href="{{ route('login') }}" class="text-muted small">← Back to User Login</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@push('js')
<script>
    document.getElementById('adminLoginForm').addEventListener('submit', function() {
        console.log('Admin login form submitted!');
    });
</script>
@endpush
@endsection
