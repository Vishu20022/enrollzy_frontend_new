@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('css/login/login-otp.css') }}">
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth-compat.js"></script>
@endpush
@section('content')

<section class="login-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">

            <!-- LEFT IMAGE -->
            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div class="login-illustration floating">
                    <img 
                        src="{{ asset('images/auth/login-otp.png') }}" 
                        alt="Login Illustration">
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="col-lg-6">
                <div class="login-card">

                    <h2 class="mb-4 text-center">Verify OTP</h2>
                    
                    @if(false && session('mock_otp'))
                        <div class="alert alert-info text-center">
                            <strong>Testing Mode:</strong> Your OTP is {{ session('mock_otp') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- OTP FORM -->
                    <form id="verifyOtpForm">
                        @csrf
                        <div class="mb-4 text-center">
                            <p class="text-muted">Enter the 6-digit code sent to <strong>+91 {{ session('mobile') }}</strong></p>
                        </div>
                        
                        <!-- OTP INPUT -->
                        <div class="otp-input-group mb-4">
                            <span class="country-code"><i class="fas fa-key"></i></span>
                            <input type="text" id="otpInput" name="otp" placeholder="Enter OTP" maxlength="6" required style="letter-spacing: 5px; text-align: center; font-weight: bold; font-size: 1.2rem;">
                        </div>

                        <button type="button" id="verifyOtpBtn" class="btn btn-theme-one w-100 mb-3">
                            Verify & Proceed
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('login-otp') }}" class="text-muted small">← Back to Mobile Entry</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    const firebaseConfig = {
        apiKey: "AIzaSyDISZTQSab0rRd8ARiadaQgokmCRwgbP-A",
        authDomain: "enrollzy.firebaseapp.com",
        projectId: "enrollzy",
        storageBucket: "enrollzy.firebasestorage.app",
        messagingSenderId: "323478887040",
        appId: "1:323478887040:web:c8631fc5981e15ac37a465",
        measurementId: "G-YWST0ZBBME"
    };

    firebase.initializeApp(firebaseConfig);
    const auth = firebase.auth();

    document.getElementById('verifyOtpBtn').addEventListener('click', function() {
        const code = document.getElementById('otpInput').value;
        
        // We need the confirmationResult from the previous page. 
        // Since we redirected, we can't easily keep the JS object.
        // BETTER WAY: Firebase Phone Auth usually stays on the same page for OTP entry.
        // But to keep your current flow, we'd need to handle this differently.
        // Let's try to keep it simple: If we use Firebase, we should probably do it all on one page or use a persistent way.
        
        // However, Firebase `confirmationResult` can't be easily passed through redirect. 
        // I will update the logic to stay on the same page for OTP entry on login-otp and register.
    });
</script>
@endsection
