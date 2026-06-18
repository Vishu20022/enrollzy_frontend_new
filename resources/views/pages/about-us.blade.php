@extends('layouts.master')

@section('title', 'About Us')

@section('content')

@php
    $heroTitleParts = explode('.', $page->hero_title ?? '');
    $firstPart = $heroTitleParts[0] ?? 'We simplify education decisions';
    $secondPart = isset($heroTitleParts[1]) ? trim($heroTitleParts[1]) : 'You shape your future';
@endphp

<!-- HERO SECTION -->
<section class="about-hero-section py-5 position-relative overflow-hidden">
    <div class="container py-4 py-lg-5">
        <div class="row align-items-center">
            <div class="col-lg-5 z-index-1 fade-in-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider mb-3 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ $page->hero_subtitle ?? 'ABOUT US' }}</span>
                <h1 class="display-4 fw-bolder mb-4 text-dark" style="font-family: 'Outfit', sans-serif; line-height: 1.2; letter-spacing: -1px;">
                    {{ $firstPart }}. <br> <span class="text-primary">{{ $secondPart }}.</span>
                </h1>
                <p class="lead text-muted mb-0 pe-lg-4" style="font-size: 1.1rem; line-height: 1.8;">
                    {{ $page->hero_description ?? 'Enrollzy is India\'s trusted education discovery platform that helps students explore, compare and access the best schools, coaching institutes, scholarships, exam preparation, certifications and higher education opportunities.' }}
                </p>
            </div>
            <div class="col-lg-7 mt-5 mt-lg-0 position-relative fade-in-up delay-1">
                <!-- Abstract dotted pattern background -->
                <div class="position-absolute" style="top: -50px; right: 0; width: 200px; height: 200px; background-image: radial-gradient(circle, #e5e7eb 2px, transparent 2px); background-size: 20px 20px; z-index: 0;"></div>
                
                <div class="position-relative z-index-1 text-end">
                    <!-- The hero image -->
                    <img src="{{ $page->hero_image ? env('BACKEND_URL') . '/' . $page->hero_image : 'https://placehold.co/800x600/e9ecef/495057?text=Hero+Image' }}" alt="Students" class="img-fluid rounded-start-pill rounded-end-4 shadow-lg border border-4 border-white" style="border-bottom-left-radius: 200px !important; border-top-right-radius: 100px !important; width: 95%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR STORY SECTION -->
<section class="our-story-section py-5 bg-white">
    <div class="container py-lg-5">
        <div class="row align-items-center">
            <!-- Left Image & Overlay -->
            <div class="col-lg-6 position-relative mb-5 mb-lg-0 fade-in-up">
                <img src="{{ $page->story_image ? env('BACKEND_URL') . '/' . $page->story_image : 'https://placehold.co/600x500/e9ecef/495057?text=Mountain' }}" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; min-height: 400px; border-top-right-radius: 80px !important;" alt="Our Story">
                
                <!-- Overlay Card -->
                <div class="position-absolute bg-dark text-white p-4 rounded-3 shadow-lg" style="bottom: -30px; left: 30px; width: 80%; max-width: 380px;">
                    <div class="d-flex align-items-start">
                        <div class="me-3 mt-1">
                            <i class="fas fa-bullseye text-warning fs-3"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-warning mb-2">Our Purpose</h5>
                            <p class="mb-0 text-white-50" style="font-size: 0.95rem; line-height: 1.6;">
                                {{ $page->story_purpose_text ?? 'To empower every learner to discover the right opportunities and build a better tomorrow.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Text Content -->
            <div class="col-lg-5 offset-lg-1 mt-5 mt-lg-0 fade-in-up delay-1">
                <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ $page->story_subtitle ?? 'OUR STORY' }}</span>
                <h2 class="display-6 fw-bolder mb-4 text-dark" style="font-family: 'Outfit', sans-serif; letter-spacing: -0.5px;">{{ $page->story_title ?? 'A journey built on a simple belief' }}</h2>
                <div class="mb-4" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
                
                <div class="text-muted custom-editor-content" style="line-height: 1.8;">
                    @if($page->story_description)
                        {!! $page->story_description !!}
                    @else
                        <p>We started Enrollzy with a simple belief - every student deserves the right guidance and access to the best opportunities.</p>
                        <p>But the education landscape is fragmented, confusing and time-consuming. Information is scattered, comparisons are difficult and genuine guidance is hard to find.</p>
                        <p>Enrollzy was created to change that.</p>
                        <p>We bring everything a learner needs - all in one place, with transparency, accuracy and trust.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORE VALUES SECTION (Mission, Vision, Philosophy) -->
@if($page->mission_text || $page->vision_text || $page->philosophy_text)
<section class="core-values-section pt-5 pb-1 bg-light" style="background-color: #f8f9fa !important;">
    <div class="container pt-lg-5 pb-lg-2">
        <div class="row g-4 justify-content-center">
            
            @if($page->mission_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-1">
                <div class="card h-100 border-0 rounded-4 shadow-sm bg-white p-4 text-center">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-bullseye fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Our Mission</h4>
                    <p class="text-muted mb-0" style="line-height: 1.7;">{{ $page->mission_text }}</p>
                </div>
            </div>
            @endif

            @if($page->vision_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-2">
                <div class="card h-100 border-0 rounded-4 shadow-sm bg-white p-4 text-center">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-eye fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Our Vision</h4>
                    <p class="text-muted mb-0" style="line-height: 1.7;">{{ $page->vision_text }}</p>
                </div>
            </div>
            @endif

            @if($page->philosophy_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-3">
                <div class="card h-100 border-0 rounded-4 shadow-sm bg-white p-4 text-center">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-leaf fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Our Philosophy</h4>
                    <p class="text-muted mb-0" style="line-height: 1.7;">{{ $page->philosophy_text }}</p>
                </div>
            </div>
            @endif
            
        </div>
    </div>
</section>
@endif

<!-- WHAT WE OFFER SECTION -->
<section class="what-we-offer-section pt-2 pb-5 bg-light position-relative" style="background-color: #f8f9fc !important;">
    <div class="container-fluid px-4 pt-lg-2 pb-lg-5" style="max-width: 1400px;">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ $page->offers_subtitle ?? 'WHAT WE OFFER' }}</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->offers_title ?? 'A complete education ecosystem' }}</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
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
        
        <div class="row g-3 justify-content-center px-lg-5">
            @forelse($offers as $index => $offer)
            <div class="col-6 col-md-4 col-lg-2 fade-in-up delay-{{ $index % 6 }}">
                <div class="card h-100 text-center p-3 rounded-4 bg-white" style="border: 1px solid #f1f5f9; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div class="card-body p-1 d-flex flex-column align-items-center">
                        <div class="icon-wrapper mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background-color: {{ $offerStyles[$index % 6]['bg'] }};">
                            @if($offer->icon_image)
                                <img src="{{ env('BACKEND_URL') . '/' . $offer->icon_image }}" width="35" alt="{{ $offer->title }}">
                            @else
                                <i class="{{ $offerStyles[$index % 6]['icon'] }} fs-3" style="color: {{ $offerStyles[$index % 6]['color'] }};"></i>
                            @endif
                        </div>
                        <h6 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif; font-size: 0.95rem; line-height: 1.3;">{!! str_replace(' ', '<br>', $offer->title) !!}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.6;">{{ $offer->description }}</p>
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
<section class="why-choose-section py-5 bg-white">
    <div class="container-fluid px-4 py-lg-5" style="max-width: 1400px;">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ $page->features_subtitle ?? 'WHY CHOOSE ENROLLZY' }}</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->features_title ?? 'Designed for today\'s learners and families' }}</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
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

        <div class="row justify-content-center align-items-start pt-4 px-lg-4">
            @forelse($features as $index => $feature)
            <div class="col-6 col-md-4 col-lg-2 text-center mb-4 fade-in-up delay-{{ $index % 6 }} position-relative">
                <div class="feature-item px-lg-2 px-1">
                    <div class="icon-wrapper mx-auto mb-4 d-flex align-items-center justify-content-center" style="height: 45px;">
                        @if($feature->icon_image)
                            <img src="{{ env('BACKEND_URL') . '/' . $feature->icon_image }}" height="35" alt="{{ $feature->title }}">
                        @else
                            <i class="{{ $featureIcons[$index % 6] }} fs-2" style="color: #3b3a5b;"></i>
                        @endif
                    </div>
                    <h6 class="fw-bold text-dark mb-3 px-2" style="font-family: 'Outfit', sans-serif; font-size: 0.95rem; line-height: 1.4;">{!! str_replace(' ', '<br>', $feature->title) !!}</h6>
                    <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.6;">{{ $feature->description }}</p>
                </div>
                @if(!$loop->last)
                    <div class="d-none d-lg-block position-absolute" style="right: 0; top: 10%; height: 80%; width: 1px; background-color: #e2e8f0;"></div>
                @endif
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Features will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>

<!-- OUR IMPACT SECTION -->
<section class="impact-section pt-5 pb-2">
    <div class="container">
        <div class="card border-0 rounded-4 shadow-lg overflow-hidden" style="background-color: #0f172a;">
            <div class="row g-0">
                <div class="col-lg-3 p-4 p-lg-5 border-end border-secondary border-opacity-25 d-flex align-items-center">
                    <div>
                        <h3 class="fw-bold text-white mb-2" style="font-family: 'Outfit', sans-serif;">Our Impact So Far</h3>
                        <div style="width: 40px; height: 3px; background-color: #ffc107;"></div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row g-0 h-100">
                        @forelse($impacts as $index => $impact)
                        <div class="col-6 col-md-3 p-4 p-lg-4 text-center border-end border-secondary border-opacity-25 {{ $loop->last ? 'border-end-0' : '' }} d-flex flex-column justify-content-center align-items-center">
                            @if($impact->icon_image)
                                <img src="{{ env('BACKEND_URL') . '/' . $impact->icon_image }}" width="40" class="mb-3 opacity-75" alt="{{ $impact->label }}">
                            @endif
                            <h3 class="display-6 fw-bold text-warning mb-1" style="font-family: 'Outfit', sans-serif;">{{ $impact->count_text }}</h3>
                            <span class="text-white-50 small">{{ $impact->label }}</span>
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
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">LEADERSHIP</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Meet Our Founders</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="row justify-content-center g-5">
            <!-- Founder 1 -->
            @if($page->founder_1_name)
            <div class="col-md-5 text-center fade-in-up delay-1">
                <div class="position-relative d-inline-block mb-4">
                    <div class="position-absolute w-100 h-100 rounded-circle border border-2 border-primary" style="top: 10px; left: 10px; z-index: 0; opacity: 0.3;"></div>
                    <img src="{{ $page->founder_1_image ? env('BACKEND_URL') . '/' . $page->founder_1_image : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                         alt="{{ $page->founder_1_name }}" 
                         class="rounded-circle shadow-lg position-relative" 
                         style="width: 220px; height: 220px; object-fit: cover; z-index: 1;">
                </div>
                <h4 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif;">{{ $page->founder_1_name }}</h4>
                <p class="text-muted small fw-bold text-uppercase tracking-wider mb-3">Co-Founder</p>
                <div class="d-flex justify-content-center gap-3">
                    @if($page->founder_1_facebook)
                        <a href="{{ $page->founder_1_facebook }}" target="_blank" class="text-primary fs-4"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if($page->founder_1_linkedin)
                        <a href="{{ $page->founder_1_linkedin }}" target="_blank" class="text-primary fs-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if($page->founder_1_twitter)
                        <a href="{{ $page->founder_1_twitter }}" target="_blank" class="text-primary fs-4"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            @endif

            <!-- Founder 2 -->
            @if($page->founder_2_name)
            <div class="col-md-5 text-center fade-in-up delay-2">
                <div class="position-relative d-inline-block mb-4">
                    <div class="position-absolute w-100 h-100 rounded-circle border border-2 border-warning" style="top: 10px; left: 10px; z-index: 0; opacity: 0.3;"></div>
                    <img src="{{ $page->founder_2_image ? env('BACKEND_URL') . '/' . $page->founder_2_image : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                         alt="{{ $page->founder_2_name }}" 
                         class="rounded-circle shadow-lg position-relative" 
                         style="width: 220px; height: 220px; object-fit: cover; z-index: 1;">
                </div>
                <h4 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif;">{{ $page->founder_2_name }}</h4>
                <p class="text-muted small fw-bold text-uppercase tracking-wider mb-3">Co-Founder</p>
                <div class="d-flex justify-content-center gap-3">
                    @if($page->founder_2_facebook)
                        <a href="{{ $page->founder_2_facebook }}" target="_blank" class="text-primary fs-4"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if($page->founder_2_linkedin)
                        <a href="{{ $page->founder_2_linkedin }}" target="_blank" class="text-primary fs-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if($page->founder_2_twitter)
                        <a href="{{ $page->founder_2_twitter }}" target="_blank" class="text-primary fs-4"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            @endif
        </div>

        @if($page->founders_common_message)
        <div class="row justify-content-center mt-5 fade-in-up delay-3">
            <div class="col-lg-8 text-center">
                <div class="bg-light p-4 rounded-4 position-relative">
                    <i class="fas fa-quote-left fs-1 text-black-50 position-absolute" style="top: -15px; left: 20px; opacity: 0.1;"></i>
                    <p class="lead text-dark fst-italic mb-0" style="line-height: 1.8;">"{{ $page->founders_common_message }}"</p>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>
@endif

<!-- CTA SECTION -->
<section class="cta-section pt-4 pb-5 mb-5">
    <div class="container">
        <div class="card border-0 rounded-4 shadow-sm overflow-hidden" style="background-color: #f8f9fa;">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 p-4 p-lg-5 text-center text-lg-start">
                    <img src="{{ $page->cta_image ? env('BACKEND_URL') . '/' . $page->cta_image : 'https://placehold.co/500x300/e9ecef/495057?text=Students+Illustration' }}" class="img-fluid" alt="Journey" style="max-height: 250px;">
                </div>
                <div class="col-lg-6 p-4 p-lg-5 text-center text-lg-start">
                    <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif; letter-spacing: -0.5px;">{{ $page->cta_title ?? 'Your journey. Our mission.' }}</h2>
                    <p class="text-muted mb-4 lead" style="font-size: 1.1rem;">{{ $page->cta_description ?? 'Wherever you are in your education journey, Enrollzy is here to help you take the right next step.' }}</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                        @if($page->cta_button_1_text)
                        <a href="{{ $page->cta_button_1_link ?? '#' }}" class="btn btn-dark btn-lg px-4 rounded-3 fw-medium">{{ $page->cta_button_1_text }}</a>
                        @endif
                        @if($page->cta_button_2_text)
                        <a href="{{ $page->cta_button_2_link ?? '#' }}" class="btn btn-outline-secondary btn-lg px-4 rounded-3 fw-medium">{{ $page->cta_button_2_text }}</a>
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
    .delay-4 { animation-delay: 0.4s; }
    .delay-5 { animation-delay: 0.5s; }
    
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
@endsection
