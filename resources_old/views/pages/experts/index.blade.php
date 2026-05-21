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
                                $imgUrl = $expert->img ? (str_starts_with($expert->img, 'http') ? $expert->img : asset($expert->img)) : 'https://ui-avatars.com/api/?name='.urlencode($expert->name);
                            @endphp
                            <img src="{{ $imgUrl }}" class="w-100" style="height: 250px; object-fit: cover;" alt="{{ $expert->name }}">
                            <div class="rating position-absolute top-0 end-0 m-3 px-2 py-1 bg-white rounded shadow-sm small">⭐ {{ $expert->rating }}</div>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold mb-1">{{ $expert->name }}</h5>
                            <p class="text-primary small mb-2">{{ $expert->role }}</p>
                            <p class="text-muted small mb-3">{{ $expert->degree }} · {{ $expert->exp }}</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}" class="btn btn-outline-primary rounded-pill">View Profile</a>
                                <button type="button" 
                                    class="btn btn-primary rounded-pill btn-book-session" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#bookingModal"
                                    data-provider-id="{{ $expert->id }}"
                                    data-provider-type="expert"
                                    data-provider-name="{{ $expert->name }}"
                                    data-provider-role="{{ $expert->role }}"
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
