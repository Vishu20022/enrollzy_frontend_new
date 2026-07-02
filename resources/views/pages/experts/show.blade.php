@extends('layouts.master')

@section('title', $expert->first_name . ' ' . $expert->last_name . ' - Mentor Profile')

@section('content')
<div class="expert-profile-area py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Sidebar: Profile Overview -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="border-radius: 20px; top: 100px;">
                    <div class="card-body p-4 text-center">
                        @php
                            $imgUrl = $expert->profile_photo ? (str_starts_with($expert->profile_photo, 'http') ? $expert->profile_photo : asset($expert->profile_photo)) : 'https://ui-avatars.com/api/?name='.urlencode($expert->first_name . ' ' . $expert->last_name);
                        @endphp
                        <img src="{{ $imgUrl }}" class="rounded-circle mb-3 shadow-sm" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $expert->first_name . ' ' . $expert->last_name }}">
                        <h3 class="fw-bold mb-1">{{ $expert->first_name . ' ' . $expert->last_name }}</h3>
                        <p class="text-primary mb-3">{{ $expert->professional_headline }}</p>
                        
                        <div class="d-flex justify-content-center gap-3 mb-4">
                            <div class="text-center">
                                <h6 class="fw-bold mb-0">? 5.0</h6>
                                <small class="text-muted">Rating</small>
                            </div>
                            <div class="vr"></div>
                            <div class="text-center">
                                <h6 class="fw-bold mb-0">{{ $expert->experiences->first() ? $expert->experiences->first()->years_of_experience . '+' : 'N/A' }}</h6>
                                <small class="text-muted">Experience</small>
                            </div>
                        </div>

                        <button type="button" 
                            class="btn btn-primary w-100 py-3 fw-bold rounded-pill btn-book-session mb-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#bookingModal"
                            data-provider-id="{{ $expert->id }}"
                            data-provider-type="expert"
                            data-provider-name="{{ $expert->first_name . ' ' . $expert->last_name }}"
                            data-provider-role="{{ $expert->professional_headline }}"
                            data-provider-img="{{ $imgUrl }}">
                            Book a Session Now
                        </button>
                        
                        <button type="button" class="btn btn-outline-primary w-100 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#inquiryModal">
                            <i class="fas fa-envelope me-2"></i> Send Inquiry
                        </button>
                    </div>
                </div>
            </div>

<!-- Inquiry Modal -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Send Inquiry to {{ $expert->first_name . ' ' . $expert->last_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('leads.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="Expert">
                    <input type="hidden" name="leadable_type" value="App\Models\MentorProfile">
                    <input type="hidden" name="leadable_id" value="{{ $expert->id }}">
                    <input type="hidden" name="subject" value="Inquiry for Mentor: {{ $expert->first_name . ' ' . $expert->last_name }}">
                    
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" required value="{{ auth()->user()->name ?? '' }}" placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" required value="{{ auth()->user()->email ?? '' }}" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number (Optional)</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+91 9876543210">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="3" required placeholder="What would you like to ask?"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-bold">Submit Inquiry</button>
                </form>
            </div>
        </div>
    </div>
</div>

            <!-- Main Content: Professional Details -->
            <div class="col-lg-8">
                <div class="detail-section mb-5">
                    <h4 class="fw-bold mb-4">About Me</h4>
                    <p class="text-muted">{{ $expert->short_bio ?: 'Passionate about mentoring students and helping them achieve their career goals.' }}</p>
                </div>

                <div class="detail-section mb-5">
                    <h4 class="fw-bold mb-4">Academic & Professional Background</h4>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Highest Qualification</small>
                                <span class="fw-semibold">{{ $expert->educations->first() ? $expert->educations->first()->degree_type : 'Not Specified' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Institution</small>
                                <span class="fw-semibold">{{ $expert->educations->first() ? $expert->educations->first()->institution : 'Not Specified' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Primary Industry</small>
                                <span class="fw-semibold">{{ $expert->experiences->first() ? $expert->experiences->first()->industry : 'Not Specified' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Current Company</small>
                                <span class="fw-semibold">{{ $expert->experiences->first() ? $expert->experiences->first()->company : 'Not Specified' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-section mb-5">
                    <h4 class="fw-bold mb-4">Mentorship Details</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Areas of Mentorship: 
                                @php 
                                    $areas = $expert->mentorshipDetail ? $expert->mentorshipDetail->areas_of_mentorship : null;
                                    if (is_string($areas)) $areas = json_decode($areas, true);
                                @endphp
                                {{ is_array($areas) ? implode(', ', $areas) : 'General Counseling' }}
                            </span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Languages Spoken: {{ $expert->languages->pluck('name')->implode(', ') ?: 'English' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
