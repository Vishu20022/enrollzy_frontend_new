@extends('mentor.layouts.app')

@section('title', 'Verification & Compliance')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Verification & compliance</h3>
        <p class="text-muted mb-4 pb-3 border-bottom">Verified mentors appear higher in search results and receive a trust badge on their profile.</p>

        <!-- Government ID -->
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Government ID</h6>
                    <small class="text-muted d-block mb-1">Aadhaar, PAN, or Passport</small>
                    @if($verification->gov_id_path)
                        <a href="{{ asset($verification->gov_id_path) }}" target="_blank" class="text-primary small fw-bold text-decoration-none"><i class="bi bi-eye"></i> View Uploaded ID</a>
                    @endif
                </div>
                <div class="text-end">
                    @if($verification->gov_id_status == 'verified')
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">Verified</span>
                    @elseif($verification->gov_id_status == 'pending')
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-bold">Pending</span>
                    @elseif($verification->gov_id_status == 'rejected')
                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill fw-bold mb-2 d-inline-block">Rejected</span><br>
                        <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-bold" onclick="document.getElementById('gov-id-upload').click()">Re-upload</button>
                    @else
                        <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-4 fw-bold" onclick="document.getElementById('gov-id-upload').click()">Upload</button>
                    @endif

                    <form action="{{ route('mentor.profile.verification.gov_id') }}" method="POST" enctype="multipart/form-data" id="gov-id-form" class="d-none">
                        @csrf
                        <input type="file" name="gov_id_file" id="gov-id-upload" onchange="document.getElementById('gov-id-form').submit()">
                    </form>
                </div>
            </div>
            @if($verification->gov_id_comment)
                <div class="alert alert-{{ $verification->gov_id_status == 'rejected' ? 'danger' : 'info' }} mt-3 mb-0 p-2 small border-0 bg-opacity-10">
                    <strong>Admin Note:</strong> {{ $verification->gov_id_comment }}
                </div>
            @endif
        </div>

        <!-- LinkedIn Profile -->
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">LinkedIn profile</h6>
                    <small class="text-muted">Auto-matched with your role</small>
                </div>
                <div class="text-end">
                    @if($verification->linkedin_status == 'verified')
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">Matched</span>
                    @elseif($verification->linkedin_status == 'pending')
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-bold">Pending</span>
                    @elseif($verification->linkedin_status == 'rejected')
                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill fw-bold mb-2 d-inline-block">Rejected</span><br>
                        <a href="{{ route('mentor.profile.professional') }}" class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-bold">Update URL</a>
                    @else
                        <a href="{{ route('mentor.profile.professional') }}" class="btn btn-sm btn-outline-dark rounded-pill px-4 fw-bold">Add URL</a>
                    @endif
                </div>
            </div>
            @if($verification->linkedin_comment)
                <div class="alert alert-{{ $verification->linkedin_status == 'rejected' ? 'danger' : 'info' }} mt-3 mb-0 p-2 small border-0 bg-opacity-10">
                    <strong>Admin Note:</strong> {{ $verification->linkedin_comment }}
                </div>
            @endif
        </div>

        <!-- Background check -->
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Background check</h6>
                    <small class="text-muted">Required for mentors working with students under 18</small>
                </div>
                <div class="text-end">
                    @if($verification->background_check_status == 'verified')
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">Verified</span>
                    @elseif($verification->background_check_status == 'pending')
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-bold">Pending</span>
                    @elseif($verification->background_check_status == 'rejected')
                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill fw-bold mb-2 d-inline-block">Rejected</span><br>
                        <form action="{{ route('mentor.profile.verification.background') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-bold">Re-initiate</button>
                        </form>
                    @else
                        <form action="{{ route('mentor.profile.verification.background') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-dark rounded-pill px-4 fw-bold">Initiate</button>
                        </form>
                    @endif
                </div>
            </div>
            @if($verification->background_check_comment)
                <div class="alert alert-{{ $verification->background_check_status == 'rejected' ? 'danger' : 'info' }} mt-3 mb-0 p-2 small border-0 bg-opacity-10">
                    <strong>Admin Note:</strong> {{ $verification->background_check_comment }}
                </div>
            @endif
        </div>

        <!-- Degree certificates -->
        <div class="py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Degree certificates</h6>
                    <small class="text-muted">Uploaded in Education section</small>
                </div>
                <div class="text-end">
                    @if($verification->degree_status == 'verified')
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">Verified</span>
                    @elseif($verification->degree_status == 'pending')
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-bold">Pending</span>
                    @elseif($verification->degree_status == 'rejected')
                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill fw-bold mb-2 d-inline-block">Rejected</span><br>
                        <a href="{{ route('mentor.profile.education') }}" class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-bold">Update Degrees</a>
                    @else
                        <a href="{{ route('mentor.profile.education') }}" class="btn btn-sm btn-outline-dark rounded-pill px-4 fw-bold">Upload</a>
                    @endif
                </div>
            </div>
            @if($verification->degree_comment)
                <div class="alert alert-{{ $verification->degree_status == 'rejected' ? 'danger' : 'info' }} mt-3 mb-0 p-2 small border-0 bg-opacity-10">
                    <strong>Admin Note:</strong> {{ $verification->degree_comment }}
                </div>
            @endif
        </div>

        <!-- Platform agreement -->
        <div class="py-3 border-bottom mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fw-bold mb-1">Platform agreement</h6>
                <small class="text-muted">Mentor conduct & session guidelines</small>
            </div>
            <div>
                @if($verification->platform_agreement_signed)
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">Signed</span>
                @else
                    <form action="{{ route('mentor.profile.verification.agreement') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark rounded-pill px-4 fw-bold">Sign</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="p-3 bg-light rounded-3 d-flex gap-2 text-muted small mb-5">
            <i class="bi bi-info-circle mt-1"></i>
            <div>
                All documents are encrypted and stored securely. They are not shared with students or third parties. Used only for identity verification.
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
            <div class="text-muted small">
                <i class="bi bi-shield-check"></i> Changes auto-saved as draft &middot; last saved just now
            </div>
            <div>
                <a href="{{ route('mentor.profile.verification') }}" class="btn btn-light border px-4 py-2 me-2 fw-bold" style="color: #374151;">Discard changes</a>
                <button type="button" class="btn btn-dark px-4 py-2 fw-bold">Save &amp; publish <i class="bi bi-arrow-up-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
