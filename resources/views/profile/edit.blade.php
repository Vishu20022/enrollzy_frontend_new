@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<style>
    .profile-section {
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        min-height: calc(100vh - 80px);
        padding: 50px 0;
    }
    .profile-card {
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        background: #ffffff;
        overflow: hidden;
    }
    .profile-header-bg {
        height: 120px;
        background: linear-gradient(135deg, #4f46e5 0%, #ec4899 100%);
    }
    .profile-avatar-container {
        margin-top: -60px;
        text-align: center;
        position: relative;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #ffffff;
        object-fit: cover;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        background: #f1f5f9;
    }
    .profile-avatar-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #ffffff;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #94a3b8;
        margin: 0 auto;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .premium-input {
        border-radius: 10px;
        padding: 12px 16px;
        border: 1px solid #e2e8f0;
        background-color: #f8fafc;
        transition: all 0.3s ease;
    }
    .premium-input:focus {
        background-color: #ffffff;
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    .premium-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }
    .btn-premium {
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        border: none;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
    }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        color: #fff;
    }
</style>

<div class="profile-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="profile-card">
                    <div class="profile-header-bg"></div>
                    
                    <div class="profile-avatar-container mb-4">
                        @if($user->image)
                            <img src="{{ asset('images/profiles/' . $user->image) }}" alt="Profile Image" class="profile-avatar">
                        @else
                            <div class="profile-avatar-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                        <h3 class="mt-3 fw-bold text-dark">{{ $user->name }}</h3>
                        <p class="text-muted mb-0"><i class="fas fa-envelope me-2"></i>{{ $user->email }}</p>
                    </div>

                    <div class="card-body px-4 px-md-5 pb-5">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf

                            <h5 class="fw-bold mb-4 text-primary"><i class="fas fa-user-edit me-2"></i> Edit Personal Information</h5>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="name" class="premium-label">{{ __('Full Name') }}</label>
                                    <input id="name" type="text" class="form-control premium-input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="premium-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control premium-input @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="mobile" class="premium-label">{{ __('Mobile Number') }}</label>
                                    <input id="mobile" type="text" class="form-control premium-input @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $user->mobile) }}" autocomplete="mobile" placeholder="+91 9876543210">
                                    @error('mobile')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="image" class="premium-label">{{ __('Profile Picture') }}</label>
                                    <input id="image" type="file" class="form-control premium-input @error('image') is-invalid @enderror" name="image" accept="image/*">
                                    <div class="form-text small mt-1 text-muted"><i class="fas fa-info-circle me-1"></i> JPG, PNG, GIF up to 2MB</div>
                                    @error('image')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-5 text-end border-top pt-4">
                                <button type="submit" class="btn btn-premium px-5">
                                    <i class="fas fa-save me-2"></i> {{ __('Save Changes') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
