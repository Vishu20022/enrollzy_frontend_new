@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('css/login/login-otp.css') }}">
@endpush

@section('content')

<section class="login-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">

            <!-- LEFT IMAGE -->
            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div class="login-illustration floating">
                    <img 
                        src="{{ asset('images/auth/register.png') }}" 
                        alt="Register Illustration">
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="col-lg-6">
                <div class="login-card">

                    <h2 class="mb-4 text-center">Create Your Account</h2>

                    <div class="text-center mb-4">
                        <p class="text-muted">Click the button below to register using your mobile number.</p>
                        
                        <!-- MSG91 Widget Trigger Button -->
                        <button type="button" id="sendOtpBtn" class="btn btn-theme-one w-100 btn-lg mb-3" onclick="initSendOTP(configuration)" disabled>
                            <i class="fas fa-mobile-alt me-2"></i> Register with OTP
                        </button>
                    </div>

                    <div class="divider">or</div>

                    <div class="alt-login">
                        <a href="{{route('login')}}" class="alt-btn text-center password w-100">
                            🔐 Using Password
                        </a>
                    </div>

                    <p class="signup-text mt-4 text-center">
                        Already have an account?
                        <a href="{{route('login')}}" class="fw-bold">Sign In</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- MSG91 Configuration -->
<script type="text/javascript">
    var configuration = {
        widgetId: "36666f6c696d323833353533",
        tokenAuth: "531665T6dGSx75SC386a2febdcP1",
        identifier: "", // optional
        success: (data) => {
            console.log('success response', data);
            
            if (data.message) {
                // Show loading state
                Swal.fire({
                    title: 'Verifying...',
                    text: 'Please wait while we set up your account.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Send the token to the backend OTP verify endpoint (which handles auto-registration)
                fetch("{{ route('otp.verify.submit') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        token: data.message
                    })
                }).then(response => response.json())
                .then(res => {
                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Welcome!',
                            text: 'Account created and logged in successfully.',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = res.redirect;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message || 'Registration failed.'
                        });
                    }
                }).catch(error => {
                    console.error("Backend Verification Error", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong during verification!'
                    });
                });
            }
        },
        failure: (error) => {
            console.log('failure reason', error);
            Swal.fire({
                icon: 'error',
                title: 'OTP Failed',
                text: 'Could not complete OTP verification.'
            });
        }
    };
</script>
<script type="text/javascript" src="https://verify.msg91.com/otp-provider.js" onload="document.getElementById('sendOtpBtn').disabled = false;"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
