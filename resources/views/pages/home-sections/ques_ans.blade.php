@if ($faqs->count() > 0)
<section class="qa-section-new py-5" style="background-color: #f0f7ff;">
    <div class="container text-center mb-5">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
            <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                {!! $section->title ?? 'Questions & Answers' !!}
            </h2>
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
        </div>
        <p class="text-muted mx-auto" style="max-width: 700px; font-size: 15px;">
            Here are some of the most commonly asked questions by our prospective students.
        </p>
    </div>

    <div class="container pb-4">
        <div class="row g-4 g-lg-5 align-items-center justify-content-center">
            
            <!-- Left Side Image Area -->
            <div class="col-lg-5 col-md-8">
                <div class="position-relative mx-auto mt-3 mt-lg-0" style="max-width: 360px;">
                    
                    <!-- Main Image -->
                    <div class="overflow-hidden rounded-4 shadow-sm" style="aspect-ratio: 4/5; background-color: #e2e8f0;">
                        <img src="{{ asset('images/q-a.png') }}" alt="Expert" class="w-100 h-100" style="object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600'">
                        <!-- Gradient fade at bottom -->
                        <div class="position-absolute bottom-0 start-0 w-100 h-50" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); pointer-events: none;"></div>
                    </div>

                    <!-- Top Right Yellow Pill -->
                    <div class="position-absolute shadow-sm d-flex flex-column justify-content-center px-3 py-2" 
                         style="top: 20px; right: -15px; background-color: #fcd34d; border-radius: 12px; z-index: 2;">
                        <span class="fw-bolder text-dark mb-1" style="font-size: 12px;">Asked Questions ?</span>
                        <div class="d-flex align-items-center">
                            <img src="https://i.pravatar.cc/100?img=11" class="rounded-circle border border-2 border-white shadow-sm" style="width: 22px; height: 22px;">
                            <img src="https://i.pravatar.cc/100?img=12" class="rounded-circle border border-2 border-white shadow-sm" style="width: 22px; height: 22px; margin-left: -8px;">
                            <img src="https://i.pravatar.cc/100?img=13" class="rounded-circle border border-2 border-white shadow-sm" style="width: 22px; height: 22px; margin-left: -8px;">
                        </div>
                    </div>

                    <!-- Bottom Left Blue Box -->
                    <div class="position-absolute shadow" 
                         style="bottom: 25px; left: -25px; background: linear-gradient(135deg, #93c5fd, #3b82f6); border-radius: 12px; padding: 12px 18px; z-index: 2; padding-right: 40px;">
                        <span class="text-white fw-bold d-block" style="font-size: 13px;">Still Have Question?</span>
                        <span class="text-white d-block" style="font-size: 11px;">Book session with expert</span>
                        
                        <!-- Phone Icon -->
                        <div class="position-absolute d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm" 
                             style="width: 24px; height: 24px; top: 50%; right: -12px; transform: translateY(-50%);">
                            <i class="fas fa-phone-alt text-primary" style="font-size: 10px;"></i>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- Right Side Q&A Cards -->
            <div class="col-lg-7">
                <div class="d-flex flex-column gap-3">
                    @foreach ($faqs->take(4) as $faq)
                        <div class="card border-0 shadow-sm custom-qa-card" style="border-radius: 14px; background-color: #ffffff;">
                            <div class="card-body p-4">
                                <h5 class="fw-bolder text-dark mb-2" style="font-size: 1.05rem;">
                                    {{ $faq->question }}
                                </h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem; line-height: 1.5;">
                                    {!! nl2br(e($faq->answer)) !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="text-center mt-5 mb-2">
            <a href="{{ route('pages.faq') }}" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 14px;">
                Book Now <i class="fas fa-arrow-right ms-1" style="font-size: 12px;"></i>
            </a>
        </div>

    </div>
</section>

<style>
    .custom-qa-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .custom-qa-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.06) !important;
    }
    /* Mobile responsive tweaks for absolute items */
    @media (max-width: 576px) {
        .qa-section-new .position-absolute[style*="left: -25px"] {
            left: 0 !important;
            border-bottom-left-radius: 0 !important;
        }
        .qa-section-new .position-absolute[style*="right: -15px"] {
            right: 0 !important;
            border-top-right-radius: 0 !important;
        }
    }
</style>
@endif
