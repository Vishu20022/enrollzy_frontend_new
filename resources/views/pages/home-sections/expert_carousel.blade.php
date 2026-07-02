    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                {!! $section->title ?? 'Talk To Experts' !!}
            </h2>

            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
        @else
            <p class="featured-desc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
            </p>
        @endif

            <div class="title-line"></div>

        </div>

    </section>


    <section class="info-section">

        <div class="container">

            <div class="row g-4 justify-content-center">

                @foreach ($experts->take(4) as $expert)
                    @php
                        $imgUrl = str_starts_with($expert->profile_photo, 'http')
                            ? $expert->profile_photo
                            : asset($expert->profile_photo);
                    @endphp
                    <div class="col-lg-3 col-md-6">

                        <div class="custom-card">

                            <div class="card-image" style="height: 150px; width: 150px; overflow: hidden; margin: 20px auto 10px; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}">
                                    <img src="{{ $imgUrl }}" alt="{{ $expert->first_name . ' ' . $expert->last_name }}"
                                        style="object-fit: cover; height: 100%; width: 100%;">
                                </a>
                            </div>

                            <h3 class="card-title">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}"
                                    class="text-decoration-none text-dark">{{ $expert->first_name . ' ' . $expert->last_name }}</a>
                            </h3>

                            <p class="card-desc">
                                {{ $expert->professional_headline }} · {{ ($expert->educations->first() ? $expert->educations->first()->degree_type : '') }}<br>
                                {{ ($expert->experiences->first() ? $expert->experiences->first()->years_of_experience . ' yrs' : '') }} · ⭐ {{ $expert->rating }}
                            </p>

                            <button class="btn-theme-2 btn-book-session" data-bs-toggle="modal"
                                data-bs-target="#bookingModal" data-provider-id="{{ $expert->id }}"
                                data-provider-type="expert" data-provider-name="{{ $expert->first_name . ' ' . $expert->last_name }}"
                                data-provider-role="{{ $expert->professional_headline }}" data-provider-img="{{ $imgUrl }}">
                                Book Session
                            </button>

                        </div>
                    </div>
                @endforeach

            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('pages.experts') }}" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">View More</a>
            </div>

        </div>

    </section>



