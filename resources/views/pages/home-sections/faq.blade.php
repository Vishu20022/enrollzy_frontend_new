@if ($faqs->count() > 0)
<section class="faq-section py-5 bg-white">
    <div class="container text-center mb-5">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
            <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                {!! $section->title ?? 'The FAQ Zone' !!}
            </h2>
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
        </div>
        
        <p class="text-muted mx-auto" style="max-width: 700px; font-size: 15px;">
            {{ $section->subtitle ?? 'Find answers to frequently asked questions about our programs and admissions.' }}
        </p>
    </div>

    <div class="container pb-4">
        <div class="mx-auto custom-faq-container" style="max-width: 850px;">
            <div class="accordion custom-faq" id="faqAccordion">
                @foreach ($faqs as $index => $faq)
                    <div class="accordion-item border-0 border-bottom rounded-0" style="border-color: #e2e8f0 !important;">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }} fw-bold text-dark shadow-none px-3 py-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}" style="font-size: 1.05rem;">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="faq{{ $faq->id }}"
                            class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body px-3 pt-0 pb-4 text-muted" style="font-size: 0.95rem; line-height: 1.6;">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5 mb-2">
                <a href="{{ route('pages.faq') }}" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 15px;">
                    View More <i class="fas fa-arrow-right ms-1" style="font-size: 12px;"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom FAQ Styles */
    .custom-faq .accordion-item {
        background-color: transparent;
    }
    
    /* Background for active items */
    .custom-faq .accordion-button {
        background-color: transparent;
        transition: background-color 0.3s ease;
    }
    .custom-faq .accordion-button:not(.collapsed) {
        background-color: #fffcf2; /* Light warm beige */
        color: #0f172a;
    }
    .custom-faq .accordion-collapse {
        background-color: #fffcf2; /* Light warm beige */
    }

    /* Remove bootstrap blue outline */
    .custom-faq .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0,0,0,.125);
    }
    
    /* Modify default bootstrap accordion icon */
    .custom-faq .accordion-button::after {
        background-image: none;
        content: '+';
        font-size: 1.6rem;
        font-weight: 300;
        color: #0f172a;
        width: auto;
        height: auto;
        transform: none !important;
        line-height: 1;
        margin-left: auto;
    }
    
    .custom-faq .accordion-button:not(.collapsed)::after {
        content: '−'; /* Minus sign */
    }
</style>
@endif
