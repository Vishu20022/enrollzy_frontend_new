<!-- CTA SECTION -->
<section class="cta-section py-3 bg-white">
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


