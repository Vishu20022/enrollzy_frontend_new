@if ($testimonials->count() > 0)
<section class="text-testimonial-new py-5" style="background-color: #fffdfa;">
    <div class="container position-relative pb-4">
        
        <!-- Header Section -->
        <div class="text-center mb-5">
            <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
                <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #ea580c;"></span>
                <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                    {!! $section->title ?? 'Student Insights & Feedback' !!}
                </h2>
                <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #ea580c;"></span>
            </div>
            <p class="text-muted mx-auto" style="max-width: 700px; font-size: 15px;">
                What our students and parents have to say about their experience with us.
            </p>
        </div>

        <!-- Custom Navigation Arrows (hidden on small screens) -->
        <div class="d-none d-lg-block position-absolute" style="top: 15%; left: 0; transform: translateY(-50%); z-index: 10;">
            <div class="swiper-button-prev-custom d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm cursor-pointer" style="width: 45px; height: 45px; cursor: pointer; transition: transform 0.2s ease;">
                <i class="fas fa-arrow-left text-dark"></i>
            </div>
        </div>
        <div class="d-none d-lg-block position-absolute" style="top: 15%; right: 0; transform: translateY(-50%); z-index: 10;">
            <div class="swiper-button-next-custom d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm cursor-pointer" style="width: 45px; height: 45px; cursor: pointer; transition: transform 0.2s ease;">
                <i class="fas fa-arrow-right text-dark"></i>
            </div>
        </div>

        <!-- Slider -->
        <div class="swiper testimonialSlider custom-text-slider px-lg-5 py-4">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testi)
                    <div class="swiper-slide h-auto">
                        <div class="card h-100 border-0 custom-testi-card" style="border-radius: 16px; background-color: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.04);">
                            <div class="card-body p-4 p-lg-5 d-flex flex-column text-start">
                                
                                <!-- Stars -->
                                <div class="mb-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa-solid fa-star" style="color: #fcd34d; font-size: 14px;"></i>
                                    @endfor
                                </div>

                                <!-- Testimonial Text -->
                                <p class="text-muted flex-grow-1 mb-5" style="font-size: 15px; line-height: 1.6;">
                                    "{{ $testi->content }}"
                                </p>

                                <!-- Profile -->
                                <div class="d-flex align-items-center gap-3 mt-auto">
                                    @php
                                        $avatar = $testi->image
                                            ? (str_starts_with($testi->image, 'http')
                                                ? $testi->image
                                                : env('BACKEND_URL') . '/' . $testi->image)
                                            : 'https://ui-avatars.com/api/?name=' . urlencode($testi->name);
                                    @endphp
                                    <img src="{{ $avatar }}" alt="{{ $testi->name }}" class="rounded-circle object-fit-cover shadow-sm" style="width: 45px; height: 45px;">
                                    
                                    <div>
                                        <h5 class="fw-bold text-dark mb-0" style="font-size: 15px;">{{ $testi->name }}</h5>
                                        <span class="text-muted d-block" style="font-size: 12px;">{{ $testi->role }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Mobile Pagination -->
            <div class="swiper-pagination mt-4 d-lg-none position-relative bottom-0"></div>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-5 mb-2">
            <a href="#" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 14px;">
                View More <i class="fas fa-arrow-right ms-1" style="font-size: 12px;"></i>
            </a>
        </div>

    </div>
</section>

<style>
    .custom-testi-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-testi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.08) !important;
    }
    .swiper-button-prev-custom:hover, .swiper-button-next-custom:hover {
        transform: translateY(-50%) scale(1.1) !important;
        background-color: #f8fafc !important;
    }
</style>

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.custom-text-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.custom-text-slider .swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    }
                }
            });
        }
    });
</script>
@endpush
@endif
