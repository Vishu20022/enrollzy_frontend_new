<!-- FOUNDERS SECTION -->
@if($page->founder_1_name || $page->founder_2_name)
<section class="founders-section py-4 bg-white">
    <div class="container">
        <div class="text-center mb-4 fade-in-up">
            <span class="badge px-3 py-2 rounded-pill fw-bold text-uppercase mb-3" style="letter-spacing: 1.5px; font-size: 0.75rem; background-color: #e6f0fa !important; color: #163c97 !important;">LEADERSHIP</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif; font-size: 2rem;">Meet Our Founders</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="row justify-content-center g-4">
            <!-- Founder 1 -->
            @if($page->founder_1_name)
            <div class="col-md-5 col-lg-4 text-center fade-in-up delay-1">
                <div class="card border-0 rounded-4 shadow-sm p-4 h-100 bg-white" style="border: 1px solid #f1f5f9 !important; transition: all 0.3s ease;">
                    <div class="mx-auto mb-3 position-relative" style="width: 140px; height: 140px; border-radius: 50%; padding: 4px; background: linear-gradient(135deg, #163c97 0%, #ffc107 100%);">
                        <img src="{{ $page->founder_1_image ? env('BACKEND_URL') . '/' . $page->founder_1_image : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                             alt="{{ $page->founder_1_name }}" 
                             class="rounded-circle w-100 h-100 object-fit-cover border border-3 border-white">
                    </div>
                    <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif; font-size: 1.15rem;">{{ $page->founder_1_name }}</h5>
                    <p class="text-muted small fw-bold text-uppercase tracking-wider mb-3" style="font-size: 0.75rem; color: #163c97 !important;">{{ $page->founder_1_title ?? 'Co-Founder' }}</p>
                    
                    <div class="d-flex justify-content-center gap-2 mt-auto pt-2">
                        @if($page->founder_1_linkedin)
                            <a href="{{ $page->founder_1_linkedin }}" target="_blank" class="social-btn d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; background-color: #e6f0fa; color: #163c97; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fab fa-linkedin-in fs-5"></i>
                            </a>
                        @endif
                        @if($page->founder_1_facebook)
                            <a href="{{ $page->founder_1_facebook }}" target="_blank" class="social-btn d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; background-color: #e6f0fa; color: #163c97; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fab fa-facebook-f fs-5"></i>
                            </a>
                        @endif
                        @if($page->founder_1_twitter)
                            <a href="{{ $page->founder_1_twitter }}" target="_blank" class="social-btn d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; background-color: #e6f0fa; color: #163c97; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fab fa-twitter fs-5"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Founder 2 -->
            @if($page->founder_2_name)
            <div class="col-md-5 col-lg-4 text-center fade-in-up delay-2">
                <div class="card border-0 rounded-4 shadow-sm p-4 h-100 bg-white" style="border: 1px solid #f1f5f9 !important; transition: all 0.3s ease;">
                    <div class="mx-auto mb-3 position-relative" style="width: 140px; height: 140px; border-radius: 50%; padding: 4px; background: linear-gradient(135deg, #163c97 0%, #ffc107 100%);">
                        <img src="{{ $page->founder_2_image ? env('BACKEND_URL') . '/' . $page->founder_2_image : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                             alt="{{ $page->founder_2_name }}" 
                             class="rounded-circle w-100 h-100 object-fit-cover border border-3 border-white">
                    </div>
                    <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif; font-size: 1.15rem;">{{ $page->founder_2_name }}</h5>
                    <p class="text-muted small fw-bold text-uppercase tracking-wider mb-3" style="font-size: 0.75rem; color: #163c97 !important;">{{ $page->founder_2_title ?? 'Co-Founder' }}</p>
                    
                    <div class="d-flex justify-content-center gap-2 mt-auto pt-2">
                        @if($page->founder_2_linkedin)
                            <a href="{{ $page->founder_2_linkedin }}" target="_blank" class="social-btn d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; background-color: #e6f0fa; color: #163c97; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fab fa-linkedin-in fs-5"></i>
                            </a>
                        @endif
                        @if($page->founder_2_facebook)
                            <a href="{{ $page->founder_2_facebook }}" target="_blank" class="social-btn d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; background-color: #e6f0fa; color: #163c97; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fab fa-facebook-f fs-5"></i>
                            </a>
                        @endif
                        @if($page->founder_2_twitter)
                            <a href="{{ $page->founder_2_twitter }}" target="_blank" class="social-btn d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; background-color: #e6f0fa; color: #163c97; transition: all 0.3s ease; text-decoration: none;">
                                <i class="fab fa-twitter fs-5"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>

        @if($page->founders_common_message)
        <div class="row justify-content-center mt-5 fade-in-up delay-3">
            <div class="col-lg-10 col-xl-9">
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 position-relative overflow-hidden text-center" style="background-color: #1b193f; color: #fff;">
                    <!-- Decorative Quote Icon -->
                    <div class="position-absolute opacity-10" style="font-size: 8rem; top: -30px; left: 20px; font-family: Georgia, serif; line-height: 1; color: #fff;">“</div>
                    <div class="position-absolute opacity-10" style="font-size: 8rem; bottom: -80px; right: 20px; font-family: Georgia, serif; line-height: 1; color: #fff;">”</div>
                    
                    <div class="position-relative z-index-1">
                        <h5 class="text-warning fw-bold text-uppercase mb-3" style="letter-spacing: 1.5px; font-size: 0.8rem;">A Message From Our Leadership</h5>
                        <div class="lh-lg fst-italic text-white-50 mb-0" style="font-size: 1rem; font-weight: 300;">
                            {!! $page->founders_common_message !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif


