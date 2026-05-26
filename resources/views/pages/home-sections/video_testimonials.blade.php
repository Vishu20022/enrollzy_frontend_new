    <section class="testimonial-section">

        <div class="container">

            <div class="heading-wrap">

                <div class="heading-line"></div>

                <h2 class="main-heading">
                {!! $section->title ?? 'Testimonials' !!}
            </h2>

                <div class="heading-line"></div>

            </div>



            <div class="swiper testimonialSwiper">

                <div class="swiper-wrapper">

                    @forelse($video_testimonials as $video)
                        <div class="swiper-slide">
                            <div class="testimonial-card"
                                style="background-image:linear-gradient(rgba(173, 41, 172, 0.35),rgba(111, 68, 117, 0.70)), url('{{ env('BACKEND_URL') . '/' . $video->thumbnail }}'); background-size: cover; background-position: center; min-height: 250px;">
                                <a href="{{ $video->video_url }}" target="_blank"
                                    class="play-btn text-decoration-none text-white d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 50px; height: 50px; background: #fff; backdrop-filter: blur(5px); border-radius: 50%;">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <h3>{{ $video->name }}</h3>
                                <p>
                                    {{ $video->course }}
                                </p>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa-solid fa-star" style="color: #ffc107;"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="play-btn">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section>



