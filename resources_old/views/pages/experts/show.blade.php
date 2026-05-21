@extends('layouts.master')

@section('title', $expert->name . ' - Expert Profile')

@section('content')
<div class="expert-profile-area py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Sidebar: Profile Overview -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="border-radius: 20px; top: 100px;">
                    <div class="card-body p-4 text-center">
                        @php
                            $imgUrl = $expert->img ? (str_starts_with($expert->img, 'http') ? $expert->img : asset($expert->img)) : 'https://ui-avatars.com/api/?name='.urlencode($expert->name);
                        @endphp
                        <img src="{{ $imgUrl }}" class="rounded-circle mb-3 shadow-sm" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $expert->name }}">
                        <h3 class="fw-bold mb-1">{{ $expert->name }}</h3>
                        <p class="text-primary mb-3">{{ $expert->role }}</p>
                        
                        <div class="d-flex justify-content-center gap-3 mb-4">
                            <div class="text-center">
                                <h6 class="fw-bold mb-0">{{ $expert->rating }} ⭐</h6>
                                <small class="text-muted">Rating</small>
                            </div>
                            <div class="vr"></div>
                            <div class="text-center">
                                <h6 class="fw-bold mb-0">{{ $expert->exp }}</h6>
                                <small class="text-muted">Experience</small>
                            </div>
                        </div>

                        <button type="button" 
                            class="btn btn-primary w-100 py-3 fw-bold rounded-pill btn-book-session mb-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#bookingModal"
                            data-provider-id="{{ $expert->id }}"
                            data-provider-type="expert"
                            data-provider-name="{{ $expert->name }}"
                            data-provider-role="{{ $expert->role }}"
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
                <h5 class="modal-title fw-bold">Send Inquiry to {{ $expert->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('leads.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="Expert">
                    <input type="hidden" name="leadable_type" value="App\Models\Expert">
                    <input type="hidden" name="leadable_id" value="{{ $expert->id }}">
                    <input type="hidden" name="subject" value="Inquiry for Expert: {{ $expert->name }}">
                    
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
                    <h4 class="fw-bold mb-4">Academic & Professional Background</h4>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Highest Qualification</small>
                                <span class="fw-semibold">{{ $expert->highest_qualification ?: $expert->degree }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Domain Certification</small>
                                <span class="fw-semibold">{{ $expert->domain_certification ?: 'Not Specified' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Primary Domain</small>
                                <span class="fw-semibold">{{ $expert->primary_domain ?: 'Career Guidance' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Sub-Specialization</small>
                                <span class="fw-semibold">{{ $expert->sub_specialization ?: 'Overseas Education' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-section mb-5">
                    <h4 class="fw-bold mb-4">Expertise & Experience</h4>
                    <p class="text-muted">Helping students choose the right path with data-driven career mapping and goal-oriented planning.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>{{ $expert->years_of_domain_experience ?: '5+' }} Years of Domain Experience</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>{{ $expert->no_of_students_counseled ?: '500+' }} Students Counseled</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Expertise in {{ is_array($expert->counseling_specialization) ? implode(', ', $expert->counseling_specialization) : 'General Counseling' }}</span>
                        </li>
                    </ul>
                </div>

                <div class="detail-section">
                    <h4 class="fw-bold mb-4">Counseling Features</h4>
                    <div class="row g-3">
                        @php
                            $features = [
                                'One-on-One Counseling' => $expert->one_on_one_counseling,
                                'Group Counseling' => $expert->group_counseling,
                                'Psychometric Based' => $expert->psychometric_based_counseling,
                                'Data Driven Mapping' => $expert->data_driven_career_mapping,
                                'Goal Oriented' => $expert->goal_oriented_planning,
                                'Flexible Scheduling' => $expert->flexible_scheduling,
                            ];
                        @endphp
                        @foreach($features as $label => $valid)
                            <div class="col-md-4">
                                <div class="card bg-{{ $valid ? 'success-subtle' : 'light' }} border-0 text-center py-3">
                                    <div class="fw-bold small {{ $valid ? 'text-success' : 'text-muted' }}">{{ $label }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
