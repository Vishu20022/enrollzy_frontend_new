@extends('layouts.master')

@section('title', $alumnus->name . ' - Alumni Profile')

@section('content')
<div class="alumni-profile-area py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Sidebar: Alumnus Overview -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="border-radius: 20px; top: 100px;">
                    <div class="card-body p-4 text-center">
                        @php
                            $imgUrl = $alumnus->image ? (str_starts_with($alumnus->image, 'http') ? $alumnus->image : asset($alumnus->image)) : 'https://ui-avatars.com/api/?name='.urlencode($alumnus->name);
                        @endphp
                        <img src="{{ $imgUrl }}" class="rounded-circle mb-3 shadow-sm" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $alumnus->name }}">
                        <h3 class="fw-bold mb-1">{{ $alumnus->name }}</h3>
                        <p class="text-primary mb-3">{{ $alumnus->designation }} {{ $alumnus->company ? '@ ' . $alumnus->company : '' }}</p>
                        
                        <div class="badge bg-light text-dark px-3 py-2 rounded-pill mb-4">{{ $alumnus->experience_years ?: '2+' }} Years Experience</div>

                        <button type="button" 
                            class="btn btn-primary w-100 py-3 fw-bold rounded-pill btn-book-session" 
                            data-bs-toggle="modal" 
                            data-bs-target="#bookingModal"
                            data-provider-id="{{ $alumnus->id }}"
                            data-provider-type="alumni"
                            data-provider-name="{{ $alumnus->name }}"
                            data-provider-role="{{ $alumnus->designation }}"
                            data-provider-img="{{ $imgUrl }}">
                            Book Mentorship Session
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Content: Professional Journey -->
            <div class="col-lg-8">
                <div class="detail-section mb-5">
                    <h4 class="fw-bold mb-4">Professional Overview</h4>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-4 bg-light rounded-4">
                                <i class="fas fa-briefcase text-primary fa-2x mb-3"></i>
                                <h6 class="fw-bold">Current Role</h6>
                                <p class="mb-0 text-muted">{{ $alumnus->designation }} at {{ $alumnus->company ?: 'Top Tier Firm' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 bg-light rounded-4">
                                <i class="fas fa-graduation-cap text-primary fa-2x mb-3"></i>
                                <h6 class="fw-bold">Alumni Status</h6>
                                <p class="mb-0 text-muted">A proud member of our alumni community, sharing real-world insights.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-section mb-5">
                    <h4 class="fw-bold mb-4">Why Connect with {{ $alumnus->name }}?</h4>
                    <p class="text-muted mb-4">Get direct mentorship and career advice based on successfully navigating the transition from student life to a high-growth professional career.</p>
                    <div class="row g-3">
                        <div class="col-md-6"><i class="fas fa-check-circle text-primary me-2"></i> Resume reviews & industry insights</div>
                        <div class="col-md-6"><i class="fas fa-check-circle text-primary me-2"></i> Interview preparation tips</div>
                        <div class="col-md-6"><i class="fas fa-check-circle text-primary me-2"></i> Networking strategies</div>
                        <div class="col-md-6"><i class="fas fa-check-circle text-primary me-2"></i> Goal setting & career pathing</div>
                    </div>
                </div>

                <div class="detail-section">
                    <h4 class="fw-bold mb-4">Educational Foundation</h4>
                    <div class="p-4 border rounded-4 bg-white d-flex align-items-center">
                        <div class="icon-box me-4 bg-primary-subtle text-primary p-3 rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-university fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Our Prestigious Institution</h6>
                            <p class="text-muted mb-0">Graduated with excellence, laying the groundwork for a successful career.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
