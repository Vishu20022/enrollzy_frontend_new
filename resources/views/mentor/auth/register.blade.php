@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('css/login/login-otp.css') }}">
<style>
.form-group {
    margin-bottom: 1rem;
}
.form-control {
    padding: 0.75rem;
    border-radius: 8px;
}
</style>
@endpush

@section('content')

<section class="login-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div class="login-illustration floating">
                    <img src="{{ asset('images/auth/register.png') }}" alt="Register Illustration">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login-card">

                    <h2 class="mb-4 text-center">Mentor Registration</h2>

                    <form id="mentorRegisterForm">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email" class="form-control">
                        </div>

                        <div class="form-group mb-4">
                            <label>Mobile Number</label>
                            <input type="text" id="mobile" class="form-control" required pattern="\d{10}" maxlength="10">
                        </div>

                        <div class="text-center mb-4">
                            <button type="button" id="sendOtpBtn" class="btn btn-theme-one w-100 btn-lg mb-3" onclick="handleRegister()" disabled>
                                <i class="fas fa-mobile-alt me-2"></i> Register with OTP
                            </button>
                        </div>
                    </form>

                    <p class="signup-text mt-4 text-center">
                        Already have an account?
                        <a href="{{ route('mentor.login') }}" class="fw-bold">Sign In</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- MSG91 Configuration -->
<script type="text/javascript">
    function handleRegister() {
        const form = document.getElementById('mentorRegisterForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        // If valid, initialize MSG91 with the mobile number provided
        const mobile = document.getElementById('mobile').value;
        configuration.identifier = "+91" + mobile; // Assuming India for 10 digits
        initSendOTP(configuration);
    }

    var configuration = {
        widgetId: "36666f6c696d323833353533",
        tokenAuth: "531665T6dGSx75SC386a2febdcP1",
        identifier: "", 
        success: (data) => {
            if (data.message) {
                Swal.fire({
                    title: 'Verifying...',
                    text: 'Please wait while we set up your account.',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading(); }
                });

                fetch("{{ route('mentor.register.submit') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        mobile: document.getElementById('mobile').value,
                        msg91_token: data.message
                    })
                }).then(response => {
                    if (response.ok || response.status === 422) {
                        return response.json();
                    }
                    return response.text().then(text => {
                        throw new Error(`Server returned ${response.status}: ${text.substring(0, 100)}`);
                    });
                })
                .then(res => {
                    if (res.success || (res.success === undefined && !res.errors)) {
                        Swal.fire({
                            icon: 'success', title: 'Welcome!',
                            text: 'Account created and logged in successfully.',
                            timer: 1500, showConfirmButton: false
                        }).then(() => { window.location.href = res.redirect || '{{ route("mentor.dashboard") }}'; });
                    } else {
                        let errorMessage = res.message || 'Registration failed.';
                        if (res.errors) {
                            errorMessage = Object.values(res.errors).map(err => err.join('\n')).join('\n');
                        }
                        Swal.fire({
                            icon: 'error', title: 'Error',
                            text: errorMessage
                        });
                    }
                }).catch(error => {
                    console.error("Verification Error: ", error);
                    Swal.fire({
                        icon: 'error', title: 'Oops...',
                        text: 'Error: ' + error.message
                    });
                });
            }
        },
        failure: (error) => {
            Swal.fire({
                icon: 'error', title: 'OTP Failed',
                text: 'Could not complete OTP verification.'
            });
        }
    };
</script>
<script type="text/javascript" src="https://verify.msg91.com/otp-provider.js" onload="document.getElementById('sendOtpBtn').disabled = false;"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
