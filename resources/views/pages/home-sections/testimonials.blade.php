@if ($testimonials->count() > 0)
        <section class="text-testimonial">

            <div class="container">

                <div class="heading">

                    <h2 class="main-heading">
                {!! $section->title ?? '<span class=\"main-heading\">Text</span> Testimonials' !!}
            </h2>

                    <p>
                        What our students and parents have to say about their experience with us.
                    </p>

                    <div class="heading-line"></div>

                </div>


                <div class="swiper testimonialSlider">

                    <div class="swiper-wrapper">

                        @foreach ($testimonials as $testi)
                            <div class="swiper-slide">

                                <div class="testimonial-card">

                                    <div class="profile">
                                        @php
                                            $avatar = $testi->image
                                                ? (str_starts_with($testi->image, 'http')
                                                    ? $testi->image
                                                    : env('BACKEND_URL') . '/' . $testi->image)
                                                : 'https://ui-avatars.com/api/?name=' . urlencode($testi->name);
                                        @endphp
                                        <img src="{{ $avatar }}" alt="{{ $testi->name }}">

                                    </div>

                                    <h3>{{ $testi->name }}</h3>
                                    <h6 class="text-muted small mb-2">{{ $testi->role }}</h6>

                                    <p>
                                        {{ $testi->content }}
                                    </p>

                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa-solid fa-star" style="color: #ffc107;"></i>
                                        @endfor
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-pagination"></div>

                </div>

            </div>

        </section>
    @endif
