    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                {!! $section->title ?? 'Alumnai' !!}
            </h2>

            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
        @else
            <p class="featured-desc">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's
            </p>
        @endif

            <div class="title-line"></div>

        </div>

    </section>





    @if ($site_alumni->count() > 0)
        <section class="custom-slider">

            <div class="container-fluid px-lg-4">

                <div id="customCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">


                    <div class="carousel-indicators">
                        @foreach ($site_alumni as $index => $alumnus)
                            <button type="button" data-bs-target="#customCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>



                    <div class="carousel-inner">

                        @foreach ($site_alumni as $index => $alumnus)
                            @php
                                $imgUrl = $alumnus->image
                                    ? (str_starts_with($alumnus->image, 'http')
                                        ? $alumnus->image
                                        : env('BACKEND_URL') . '/' . $alumnus->image)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($alumnus->name);
                            @endphp
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                                <div class="slider-wrapper">

                                    <div class="left-image">
                                        <a href="{{ route('pages.alumni.detail', $alumnus->id) }}">
                                            <img src="{{ $imgUrl }}" alt="{{ $alumnus->name }}"
                                                style=" object-fit: cover; width: 100%;">
                                        </a>
                                    </div>


                                    <div class="content-box text-center">

                                        <h2 class="sub-heading text-center">
                                            {{ $alumnus->name }}
                                        </h2>

                                       
                                        <p class="mt-2 text-center">
                                            {{ $alumnus->experience_years ? $alumnus->experience_years . ' years of professional experience.' : '' }}
                                            Connect with our alumni working in top organizations worldwide to get real-world
                                            insights, career guidance, and mentorship.
                                        </p>

                                        <button type="button" class="btn-theme-1 mt-2 btn-book-session"
                                            data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            data-provider-id="{{ $alumnus->id }}" data-provider-type="alumni"
                                            data-provider-name="{{ $alumnus->name }}"
                                            data-provider-role="{{ $alumnus->designation }}"
                                            data-provider-img="{{ $imgUrl }}">
                                            Book Session
                                        </button>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </section>
    @endif
