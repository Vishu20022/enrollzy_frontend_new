@extends('layouts.master')

@section('title', 'About Us')

@section('content')

@php
    $heroTitleParts = explode('.', $page->hero_title ?? '');
    $firstPart = $heroTitleParts[0] ?? 'We simplify education decisions';
    $secondPart = isset($heroTitleParts[1]) ? trim($heroTitleParts[1]) : 'You shape your future';
@endphp

<!-- HERO SECTION -->
<section class="about-hero-section position-relative overflow-hidden pt-5 pb-0">
    <div class="container pt-4">
        <div class="row align-items-center">
            <div class="col-lg-5 z-index-1 fade-in-up mb-5 mb-lg-0">
                <span class="text-primary fw-bold text-uppercase tracking-wider mb-3 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->hero_subtitle ?? 'ABOUT US' }}</span>
                <h1 class="display-5 fw-bolder mb-4 text-dark" style="font-family: 'Outfit', sans-serif; line-height: 1.2; letter-spacing: -0.5px;">
                    {{ $firstPart }}. <br> <span class="text-primary">{{ $secondPart }}.</span>
                </h1>
                <p class="text-muted pe-lg-4" style="font-size: 1rem; line-height: 1.6;">
                    {{ $page->hero_description ?? 'Enrollzy is India\'s trusted education discovery platform that helps students explore, compare and access the best schools, coaching institutes, scholarships, exam preparation, certifications and higher education opportunities.' }}
                </p>
            </div>
            <div class="col-lg-7 position-relative fade-in-up delay-1 text-end px-0">
                <div class="position-relative z-index-1 d-inline-block w-100">
                    <img src="{{ $page->hero_image ? env('BACKEND_URL') . '/' . $page->hero_image : 'https://placehold.co/800x600/e9ecef/495057?text=Hero+Image' }}" alt="Students" class="img-fluid" style="border-top-left-radius: 400px; border-bottom-left-radius: 0; object-fit: cover; width: 100%; max-height: 500px; border-bottom-left-radius: 200px;">
                    
                    <div class="position-absolute border border-warning border-2 rounded-circle" style="width: 400px; height: 400px; bottom: -50px; left: -20px; z-index: -1;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR STORY SECTION -->
<section class="our-story-section py-5 bg-white mt-4">
    <div class="container pb-lg-5">
        <div class="row align-items-center">
            <div class="col-lg-6 position-relative mb-5 mb-lg-0 fade-in-up pe-lg-5">
                <img src="{{ $page->story_image ? env('BACKEND_URL') . '/' . $page->story_image : 'https://placehold.co/600x500/e9ecef/495057?text=Mountain' }}" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; min-height: 380px;" alt="Our Story">
                
                <div class="position-absolute p-4 rounded-4 shadow-lg d-flex align-items-start gap-3" style="bottom: 20px; left: 20px; width: 85%; max-width: 360px; background-color: #1b193f; color: #fff;">
                    <div class="icon-wrapper d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                        <i class="fas fa-bullseye text-warning fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-warning mb-2" style="font-size: 0.95rem;">Our Purpose</h6>
                        <p class="mb-0 text-white" style="font-size: 0.85rem; line-height: 1.5; font-weight: 300;">
                            {{ $page->story_purpose_text ?? 'To empower every learner to discover the right opportunities and build a better tomorrow.' }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 mt-4 mt-lg-0 fade-in-up delay-1">
                <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->story_subtitle ?? 'OUR STORY' }}</span>
                <h3 class="fw-bolder mb-3 text-dark" style="font-family: 'Outfit', sans-serif; letter-spacing: -0.5px;">{{ $page->story_title ?? 'A journey built on a simple belief' }}</h3>
                <div class="mb-4" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
                
                <div class="custom-editor-content text-dark" style="line-height: 1.6; font-size: 0.95rem;">
                    @if($page->story_description)
                        {!! $page->story_description !!}
                    @else
                        <p class="mb-3">We started Enrollzy with a simple belief - every student deserves the right guidance and access to the best opportunities.</p>
                        <p class="mb-3">But the education landscape is fragmented, confusing and time-consuming. Information is scattered, comparisons are difficult and genuine guidance is hard to find.</p>
                        <p class="mb-3">Enrollzy was created to change that.</p>
                        <p class="mb-0">We bring everything a learner needs - all in one place, with transparency, accuracy and trust.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORE VALUES SECTION -->
@if($page->mission_text || $page->vision_text || $page->philosophy_text)
<section class="core-values-section py-4 bg-light" style="background-color: #f8f9fa !important;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @if($page->mission_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-1">
                <div class="card h-100 border-0 rounded-4 bg-white p-4 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-bullseye fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1.1rem;">Our Mission</h5>
                    <p class="text-muted mb-0" style="line-height: 1.6; font-size: 0.85rem;">{{ $page->mission_text }}</p>
                </div>
            </div>
            @endif

            @if($page->vision_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-2">
                <div class="card h-100 border-0 rounded-4 bg-white p-4 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-eye fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1.1rem;">Our Vision</h5>
                    <p class="text-muted mb-0" style="line-height: 1.6; font-size: 0.85rem;">{{ $page->vision_text }}</p>
                </div>
            </div>
            @endif

            @if($page->philosophy_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-3">
                <div class="card h-100 border-0 rounded-4 bg-white p-4 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-leaf fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1.1rem;">Our Philosophy</h5>
                    <p class="text-muted mb-0" style="line-height: 1.6; font-size: 0.85rem;">{{ $page->philosophy_text }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- WHAT WE OFFER SECTION -->
<section class="what-we-offer-section py-5 bg-white">
    <div class="container px-4">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->offers_subtitle ?? 'WHAT WE OFFER' }}</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->offers_title ?? 'A complete education ecosystem' }}</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        @php
            $offerStyles = [
                ['icon' => 'fas fa-school', 'color' => '#f59e0b', 'bg' => 'rgba(245, 158, 11, 0.1)'],
                ['icon' => 'fas fa-graduation-cap', 'color' => '#6366f1', 'bg' => 'rgba(99, 102, 241, 0.1)'],
                ['icon' => 'fas fa-trophy', 'color' => '#10b981', 'bg' => 'rgba(16, 185, 129, 0.1)'],
                ['icon' => 'fas fa-coins', 'color' => '#eab308', 'bg' => 'rgba(234, 179, 8, 0.1)'],
                ['icon' => 'fas fa-laptop', 'color' => '#8b5cf6', 'bg' => 'rgba(139, 92, 246, 0.1)'],
                ['icon' => 'fas fa-certificate', 'color' => '#14b8a6', 'bg' => 'rgba(20, 184, 166, 0.1)'],
            ];
        @endphp
        
        <div class="row g-3 justify-content-center px-lg-4">
            @forelse($offers as $index => $offer)
            <div class="col-6 col-md-4 col-lg-2 fade-in-up delay-{{ $index % 6 }}">
                <div class="card h-100 text-center p-3 rounded-4 bg-white" style="border: 1px solid #e2e8f0;">
                    <div class="card-body p-1 d-flex flex-column align-items-center">
                        <div class="icon-wrapper mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background-color: {{ $offerStyles[$index % 6]['bg'] }};">
                            @if($offer->icon_image)
                                <img src="{{ env('BACKEND_URL') . '/' . $offer->icon_image }}" width="30" alt="{{ $offer->title }}">
                            @else
                                <i class="{{ $offerStyles[$index % 6]['icon'] }} fs-4" style="color: {{ $offerStyles[$index % 6]['color'] }};"></i>
                            @endif
                        </div>
                        <h6 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 0.85rem; line-height: 1.3;">{!! str_replace(' ', '<br>', $offer->title) !!}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.75rem; line-height: 1.5;">{{ $offer->description }}</p>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Offers will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>

<!-- WHY CHOOSE ENROLLZY SECTION -->
<section class="why-choose-section py-5 bg-white" style="background-color: #fafafa !important;">
    <div class="container px-4">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->features_subtitle ?? 'WHY CHOOSE ENROLLZY' }}</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->features_title ?? 'Designed for today\'s learners and families' }}</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        @php
            $featureIcons = [
                'fas fa-search',
                'fas fa-balance-scale',
                'fas fa-shield-alt',
                'fas fa-headset',
                'far fa-heart',
                'fas fa-lock',
            ];
        @endphp

        <div class="row justify-content-center align-items-start pt-2 px-lg-4">
            @forelse($features as $index => $feature)
            <div class="col-6 col-md-4 col-lg-2 text-center mb-4 fade-in-up delay-{{ $index % 6 }}">
                <div class="feature-item px-lg-2 px-1">
                    <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center" style="height: 40px;">
                        @if($feature->icon_image)
                            <img src="{{ env('BACKEND_URL') . '/' . $feature->icon_image }}" height="30" alt="{{ $feature->title }}">
                        @else
                            <i class="{{ $featureIcons[$index % 6] }} fs-3" style="color: #3b3a5b;"></i>
                        @endif
                    </div>
                    <h6 class="fw-bold text-dark mb-2 px-2" style="font-family: 'Outfit', sans-serif; font-size: 0.85rem; line-height: 1.4;">{!! str_replace(' ', '<br>', $feature->title) !!}</h6>
                    <p class="text-muted mb-0" style="font-size: 0.75rem; line-height: 1.5;">{{ $feature->description }}</p>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Features will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>

<!-- OUR IMPACT SECTION -->
<section class="impact-section pb-0 pt-0">
    <div class="container-fluid px-0">
        <div class="bg-dark text-white py-5 px-4" style="background-color: #1b193f !important;">
            <div class="row align-items-center justify-content-center max-w-1200 mx-auto" style="max-width: 1200px;">
                <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-0 border-end border-secondary border-opacity-25">
                    <h4 class="fw-bold text-white mb-2" style="font-family: 'Outfit', sans-serif;">Our Impact So Far</h4>
                    <div class="mx-auto mx-lg-0" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
                </div>
                <div class="col-lg-9">
                    <div class="row g-0 h-100">
                        @forelse($impacts as $index => $impact)
                        <div class="col-6 col-md-3 text-center border-end border-secondary border-opacity-25 {{ $loop->last ? 'border-end-0' : '' }} d-flex flex-column justify-content-center align-items-center px-3">
                            @if($impact->icon_image)
                                <img src="{{ env('BACKEND_URL') . '/' . $impact->icon_image }}" width="30" class="mb-2 opacity-75" alt="{{ $impact->label }}">
                            @endif
                            <h3 class="fw-bold text-warning mb-1" style="font-family: 'Outfit', sans-serif;">{{ $impact->count_text }}</h3>
                            <span class="text-white-50" style="font-size: 0.75rem;">{{ $impact->label }}</span>
                        </div>
                        @empty
                            <div class="col-12 p-4 text-center text-white-50">Impact stats will appear here.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOUNDERS SECTION -->
@if($page->founder_1_name || $page->founder_2_name)
<section class="founders-section py-5 bg-white">
    <div class="container py-lg-4">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">LEADERSHIP</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Meet Our Founders</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="row justify-content-center g-4">
            <!-- Founder 1 -->
            @if($page->founder_1_name)
            <div class="col-md-5 text-center fade-in-up delay-1">
                <div class="position-relative d-inline-block mb-3">
                    <img src="{{ $page->founder_1_image ? env('BACKEND_URL') . '/' . $page->founder_1_image : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                         alt="{{ $page->founder_1_name }}" 
                         class="rounded-circle shadow-sm position-relative" 
                         style="width: 180px; height: 180px; object-fit: cover; z-index: 1; border: 3px solid #f8f9fa;">
                </div>
                <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif;">{{ $page->founder_1_name }}</h5>
                <p class="text-muted small fw-bold text-uppercase tracking-wider mb-2" style="font-size: 0.75rem;">{{ $page->founder_1_title ?? 'Co-Founder' }}</p>
                <div class="d-flex justify-content-center gap-2">
                    @if($page->founder_1_facebook)
                        <a href="{{ $page->founder_1_facebook }}" target="_blank" class="text-primary fs-5"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if($page->founder_1_linkedin)
                        <a href="{{ $page->founder_1_linkedin }}" target="_blank" class="text-primary fs-5"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if($page->founder_1_twitter)
                        <a href="{{ $page->founder_1_twitter }}" target="_blank" class="text-primary fs-5"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            @endif

            <!-- Founder 2 -->
            @if($page->founder_2_name)
            <div class="col-md-5 text-center fade-in-up delay-2">
                <div class="position-relative d-inline-block mb-3">
                    <img src="{{ $page->founder_2_image ? env('BACKEND_URL') . '/' . $page->founder_2_image : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                         alt="{{ $page->founder_2_name }}" 
                         class="rounded-circle shadow-sm position-relative" 
                         style="width: 180px; height: 180px; object-fit: cover; z-index: 1; border: 3px solid #f8f9fa;">
                </div>
                <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif;">{{ $page->founder_2_name }}</h5>
                <p class="text-muted small fw-bold text-uppercase tracking-wider mb-2" style="font-size: 0.75rem;">{{ $page->founder_2_title ?? 'Co-Founder' }}</p>
                <div class="d-flex justify-content-center gap-2">
                    @if($page->founder_2_facebook)
                        <a href="{{ $page->founder_2_facebook }}" target="_blank" class="text-primary fs-5"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if($page->founder_2_linkedin)
                        <a href="{{ $page->founder_2_linkedin }}" target="_blank" class="text-primary fs-5"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if($page->founder_2_twitter)
                        <a href="{{ $page->founder_2_twitter }}" target="_blank" class="text-primary fs-5"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            @endif
        </div>

        @if($page->founders_common_message)
        <div class="row justify-content-center mt-4 fade-in-up delay-3">
            <div class="col-lg-8 text-center">
                <div class="bg-light p-3 rounded-4 position-relative border border-white shadow-sm">
                    <p class="text-dark fst-italic mb-0" style="line-height: 1.6; font-size: 0.95rem;">"{{ $page->founders_common_message }}"</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif

<!-- TEAM SECTION -->
@if(isset($teams) && count($teams) > 0)
<section class="team-section py-5 bg-light">
    <div class="container px-4">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">OUR TEAM</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">The People Behind Enrollzy</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="team-slider fade-in-up delay-2">
            @foreach($teams as $team)
            <div class="px-3 py-2">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4" style="transition: transform 0.3s ease;">
                    <div class="mx-auto mb-3" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; border: 3px solid #f8f9fc;">
                        <img src="{{ $team->image ? env('BACKEND_URL') . '/' . $team->image : 'https://placehold.co/150x150/e9ecef/495057?text=Team' }}" alt="{{ $team->name }}" class="w-100 h-100 object-fit-cover">
                    </div>
                    <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif;">{{ $team->name }}</h5>
                    <p class="text-primary small fw-bold mb-0" style="font-size: 0.8rem;">{{ $team->job_profile }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA SECTION -->
<section class="cta-section py-5 bg-white">
    <div class="container px-4">
        <div class="card border-0 rounded-4 overflow-hidden" style="background-color: #f8f9fc;">
            <div class="row g-0 align-items-center">
                <div class="col-lg-5 p-4 p-lg-0 text-center text-lg-start bg-white d-flex align-items-center justify-content-center">
                    <img src="{{ $page->cta_image ? env('BACKEND_URL') . '/' . $page->cta_image : 'https://placehold.co/500x300/e9ecef/495057?text=Students+Illustration' }}" class="img-fluid" alt="Journey" style="max-height: 280px; mix-blend-mode: multiply;">
                </div>
                <div class="col-lg-7 p-4 p-lg-5 text-center text-lg-start">
                    <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif; letter-spacing: -0.5px;">{{ $page->cta_title ?? 'Your journey. Our mission.' }}</h3>
                    <p class="text-muted mb-4" style="font-size: 1rem;">{{ $page->cta_description ?? 'Wherever you are in your education journey, Enrollzy is here to help you take the right next step.' }}</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                        @if($page->cta_button_1_text)
                        <a href="{{ $page->cta_button_1_link ?? '#' }}" class="btn btn-dark btn-sm px-4 py-2 rounded-2 fw-medium" style="background-color: #1b193f; border-color: #1b193f;">{{ $page->cta_button_1_text }}</a>
                        @endif
                        @if($page->cta_button_2_text)
                        <a href="{{ $page->cta_button_2_link ?? '#' }}" class="btn btn-outline-secondary btn-sm px-4 py-2 rounded-2 fw-medium">{{ $page->cta_button_2_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('css')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    /* Typography */
    body {
        font-family: 'Inter', sans-serif;
    }
    
    /* Animations */
    .fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    .delay-0 { animation-delay: 0s; }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Cards */
    .offer-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .offer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.05) !important;
    }
    
    .feature-item {
        transition: transform 0.3s ease;
    }
    .feature-item:hover {
        transform: translateY(-3px);
    }
    
    /* Utilities */
    .tracking-wider {
        letter-spacing: 0.05em;
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function(){
        $('.team-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
@endpush
@endsection
