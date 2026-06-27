<!-- HERO SECTION -->
@php
    $heroTitleParts = explode('.', $page->hero_title ?? '');
    $firstPart = $heroTitleParts[0] ?? 'We simplify education decisions';
    $secondPart = isset($heroTitleParts[1]) ? trim($heroTitleParts[1]) : 'You shape your future';
@endphp
<section class="about-hero-section position-relative overflow-hidden py-3" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
    <div class="container py-lg-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 z-index-1 fade-in-up">
                <span class="badge px-3 py-2 rounded-pill fw-bold text-uppercase mb-3" style="letter-spacing: 1.5px; font-size: 0.75rem; background-color: #e6f0fa !important; color: #163c97 !important;">{{ $page->hero_subtitle ?? 'ABOUT US' }}</span>
                <h1 class="fw-bold text-dark mb-4" style="font-family: 'Outfit', sans-serif; line-height: 1.25; letter-spacing: -1px; font-size: 2.25rem;">
                    {{ $firstPart }}. <span class="text-primary d-block mt-2" style="color: #163c97 !important;">{{ $secondPart }}.</span>
                </h1>
                <div class="text-muted pe-lg-4 mb-0" style="font-size: 0.95rem; line-height: 1.7;">
                    {!! $page->hero_description ?? 'Enrollzy is India\'s trusted education discovery platform that helps students explore, compare and access the best schools, coaching institutes, scholarships, exam preparation, certifications and higher education opportunities.' !!}
                </div>
            </div>
            <div class="col-lg-6 position-relative fade-in-up delay-1 text-center mt-lg-0 mt-5">
                <div class="hero-image-wrapper position-relative d-inline-block" style="max-width: 100%; width: 480px;">
                    <!-- Main Image -->
                    <img src="{{ $page->hero_image ? env('BACKEND_URL') . '/' . $page->hero_image : 'https://placehold.co/800x600/e9ecef/495057?text=Hero+Image' }}" 
                         alt="Students" 
                         class="img-fluid rounded-4 shadow-lg border border-4 border-white" 
                         style="height: 400px; object-fit: cover; width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>


