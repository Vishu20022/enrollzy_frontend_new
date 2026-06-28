@extends('layouts.master')

@section('title', $mention->title . ' - ' . ($site_settings->meta_title ?? config('app.name')))

@push('css')
<style>
    .learning-hero {
        background-color: #f8f9fa;
        padding: 60px 0;
        border-bottom: 1px solid #e9ecef;
    }
    .learning-hero-img {
        max-height: 250px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        width: 100%;
    }
    .badge-tag {
        display: inline-block;
        padding: 5px 12px;
        background-color: var(--primary-color, #702b88);
        color: white;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .learning-content {
        padding: 50px 0;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #4a4a4a;
    }
    .cta-card {
        background-color: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: 1px solid #eee;
        position: sticky;
        top: 100px;
    }
</style>
@endpush

@section('content')

<section class="learning-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                @if($mention->category)
                    <div class="text-uppercase text-muted fw-bold mb-2" style="letter-spacing: 1px; font-size: 0.85rem;">{{ $mention->category->name }}</div>
                @endif
                <h1 class="fw-bold mb-3" style="color: #1a1a1a;">{{ $mention->title }}</h1>
                @if($mention->subtitle)
                    <p class="text-muted fs-5 mb-4">{{ $mention->subtitle }}</p>
                @endif
                
                @if($mention->badge_text)
                    <div class="badge-tag">{{ $mention->badge_text }}</div>
                @endif
            </div>
            <div class="col-lg-5 text-center text-lg-end">
                @if($mention->image)
                    <img src="{{ env('BACKEND_URL') . '/' . $mention->image }}" alt="{{ $mention->title }}" class="learning-hero-img">
                @else
                    <div class="learning-hero-img d-flex align-items-center justify-content-center bg-light border">
                        <i class="fas fa-graduation-cap fa-5x text-muted opacity-50"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="learning-content">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-4">About this Opportunity</h3>
                
                @if($mention->description)
                    <div class="rich-text-content">
                        {!! $mention->description !!}
                    </div>
                @else
                    <div class="alert alert-info">
                        <p class="mb-0">More details about this opportunity will be added soon.</p>
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="cta-card">
                    <h4 class="fw-bold mb-3">Ready to Start?</h4>
                    <p class="text-muted mb-4 fs-6">Take the next step in your career with this outstanding learning opportunity.</p>
                    
                    @if($mention->url)
                        <a href="{{ $mention->url }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <span>Visit Official Page</span>
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <div class="text-center mt-3">
                            <small class="text-muted"><i class="fas fa-info-circle"></i> This will open an external website.</small>
                        </div>
                    @else
                        <button class="btn btn-secondary w-100 py-3 fw-bold rounded-pill" disabled>Registration Closed</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
