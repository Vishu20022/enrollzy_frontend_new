@extends('layouts.master')

@section('title', 'Meet Our Alumni')

@section('content')
<div class="breadcrumb-area py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold mb-2">Our Alumni Network</h1>
        <p class="text-muted">Connect with our alumni working in top organizations worldwide.</p>
    </div>
</div>

<div class="alumni-listing py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($site_alumni as $alumnus)
                <div class="col-lg-3 col-md-6">
                    <div class="alumni-card h-100 shadow-sm border-0" style="border-radius: 15px; overflow: hidden; background: #fff;">
                        <div class="image-wrap position-relative">
                            @php
                                $imgUrl = $alumnus->image ? (str_starts_with($alumnus->image, 'http') ? $alumnus->image : asset($alumnus->image)) : 'https://ui-avatars.com/api/?name='.urlencode($alumnus->name);
                            @endphp
                            <img src="{{ $imgUrl }}" class="w-100" style="height: 250px; object-fit: cover;" alt="{{ $alumnus->name }}">
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold mb-1">{{ $alumnus->name }}</h5>
                            <p class="text-muted small mb-2">{{ $alumnus->designation }} {{ $alumnus->company ? '@ ' . $alumnus->company : '' }}</p>
                            <p class="badge bg-light text-dark mb-3">{{ $alumnus->experience_years ?: '2+' }} Years Exp</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('pages.alumni.detail', $alumnus->id) }}" class="btn btn-outline-primary rounded-pill">View Journey</a>
                                <button type="button" 
                                    class="btn btn-primary rounded-pill btn-book-session" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#bookingModal"
                                    data-provider-id="{{ $alumnus->id }}"
                                    data-provider-type="alumni"
                                    data-provider-name="{{ $alumnus->name }}"
                                    data-provider-role="{{ $alumnus->designation }}"
                                    data-provider-img="{{ $imgUrl }}">
                                    Book Mentorship
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
