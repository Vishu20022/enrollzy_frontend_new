<!-- CORE VALUES SECTION -->
@if($page->mission_text || $page->vision_text || $page->philosophy_text)
<section class="core-values-section py-3 bg-light" style="background-color: #f8f9fa !important;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @if($page->mission_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-1">
                <div class="card h-100 border-0 rounded-4 bg-white p-4 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-bullseye fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1.1rem;">Our Mission</h5>
                    <div class="text-muted mb-0" style="line-height: 1.6; font-size: 0.85rem;">{!! $page->mission_text !!}</div>
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
                    <div class="text-muted mb-0" style="line-height: 1.6; font-size: 0.85rem;">{!! $page->vision_text !!}</div>
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
                    <div class="text-muted mb-0" style="line-height: 1.6; font-size: 0.85rem;">{!! $page->philosophy_text !!}</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif


