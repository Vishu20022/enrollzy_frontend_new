<!-- OUR STORY SECTION -->
<section class="our-story-section py-3 bg-white mt-0">
    <div class="container pb-lg-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 position-relative mb-5 mb-lg-0 fade-in-up">
                <div class="story-image-wrapper position-relative d-inline-block w-100">
                    <img src="{{ $page->story_image ? env('BACKEND_URL') . '/' . $page->story_image : 'https://placehold.co/600x500/e9ecef/495057?text=Mountain' }}" class="img-fluid rounded-4 shadow-lg w-100 border border-4 border-white" style="object-fit: cover; min-height: 400px; height: 400px;" alt="Our Story">
                    
                    <!-- Glassmorphism Purpose Badge -->
                    <div class="position-absolute p-4 rounded-4 shadow-lg d-flex align-items-start gap-3" style="bottom: 25px; left: 25px; width: calc(100% - 50px); max-width: 380px; background: rgba(27, 25, 63, 0.9); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.1); color: #fff;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-3" style="width: 42px; height: 42px; background-color: rgba(255, 193, 7, 0.15);">
                            <i class="fas fa-bullseye text-warning fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-warning mb-2" style="font-size: 0.95rem; font-family: 'Outfit', sans-serif;">Our Purpose</h6>
                            <p class="mb-0 text-white-50" style="font-size: 0.82rem; line-height: 1.5; font-weight: 300;">
                                {{ $page->story_purpose_text ?? 'To empower every learner to discover the right opportunities and build a better tomorrow.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mt-4 mt-lg-0 fade-in-up delay-1">
                <span class="badge px-3 py-2 rounded-pill fw-bold text-uppercase mb-3" style="letter-spacing: 1.5px; font-size: 0.75rem; background-color: #e6f0fa !important; color: #163c97 !important;">{{ $page->story_subtitle ?? 'OUR STORY' }}</span>
                <h3 class="fw-bolder mb-3 text-dark" style="font-family: 'Outfit', sans-serif; letter-spacing: -0.5px; font-size: 2rem;">{{ $page->story_title ?? 'A journey built on a simple belief' }}</h3>
                <div class="mb-4" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
                
                <div class="custom-editor-content text-dark" style="line-height: 1.7; font-size: 1rem; color: #475569 !important;">
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


