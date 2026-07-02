@extends('layouts.master')

@section('title', 'Meet Our Experts')

@section('content')
<div class="breadcrumb-area py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold mb-2">Our Experts</h1>
        <p class="text-muted">Get right guidance from industry veterans and academic experts.</p>
    </div>
</div>

<div class="experts-listing py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($experts as $expert)
                <div class="col-lg-3 col-md-6">
                    <div class="expert-card h-100 shadow-sm border-0" style="border-radius: 15px; overflow: hidden; background: #fff;">
                        <div class="image-wrap position-relative">
                            @php
                                $imgUrl = $expert->profile_photo ? (str_starts_with($expert->profile_photo, 'http') ? $expert->profile_photo : asset($expert->profile_photo)) : 'https://ui-avatars.com/api/?name='.urlencode($expert->first_name . ' ' . $expert->last_name);
                            @endphp
                            <img src="{{ $imgUrl }}" class="w-100" style="height: 250px; object-fit: cover;" alt="{{ $expert->first_name . ' ' . $expert->last_name }}">
                            
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold mb-1">{{ $expert->first_name . ' ' . $expert->last_name }}</h5>
                            <p class="text-primary small mb-2">{{ $expert->professional_headline }}</p>
                            <p class="text-muted small mb-3">{{ ($expert->educations->first() ? $expert->educations->first()->degree_type : '') }} · {{ ($expert->experiences->first() ? $expert->experiences->first()->years_of_experience . ' yrs' : '') }}</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}" class="btn btn-outline-primary rounded-pill">View Profile</a>
                                <button type="button" 
                                    class="btn btn-primary rounded-pill btn-book-session" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#bookingModal"
                                    data-provider-id="{{ $expert->id }}"
                                    data-provider-type="expert"
                                    data-provider-name="{{ $expert->first_name . ' ' . $expert->last_name }}"
                                    data-provider-role="{{ $expert->professional_headline }}"
                                    data-provider-img="{{ $imgUrl }}">
                                    Book Session
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

