    <section class="featured-section d-none">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                {!! $section->title ?? 'Our Trending Program' !!}
            </h2>
        </div>

    </section>


    <section class="about-section d-none">

        <div class="container">

            @php
                $trending_courses = [];
                foreach ($organisations as $org) {
                    foreach ($org->courses as $c) {
                        if (count($trending_courses) < 3) {
                            $trending_courses[] = [
                                'org' => $org,
                                'course' => $c,
                            ];
                        }
                    }
                }
            @endphp

            @forelse($trending_courses as $index => $tc)
                @php
                    $org = $tc['org'];
                    $c = $tc['course'];
                    $img = $org->logo_url
                        ? env('BACKEND_URL') . '/' . $org->logo_url
                        : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=900';
                @endphp
                <div class="row align-items-center info-row">
                    @if ($index % 2 == 0)
                        <div class="col-lg-5">
                            <div class="image-box">
                                <img src="{{ $img }}" alt="{{ $c->course->name ?? 'Course' }}"
                                    style="max-height: 250px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="content-box">
                                <h2 class="sub-heading">{{ $c->course->name ?? 'N/A' }}</h2>
                                <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                    Offered by <strong>{{ $org->name }}</strong>.<br>
                                    Mode: {{ $c->mode ?? 'N/A' }} | Duration: {{ $c->duration ?? 'N/A' }}<br>
                                    {!! Str::limit(
                                        strip_tags(
                                            $c->placement_details ??
                                                ($c->eligibility ??
                                                    'Learn more about this dynamic program, its curriculum, fees, and career placement options.'),
                                        ),
                                        200,
                                    ) !!}
                                </p>
                                <a href="{{ route('pages.organisations.detail', $org->slug) }}"
                                    class="btn-theme-2 text-decoration-none d-inline-block text-center pt-2">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-7 order-lg-1 order-2">
                            <div class="content-box">
                                <h2 class="sub-heading">{{ $c->course->name ?? 'N/A' }}</h2>
                                <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                    Offered by <strong>{{ $org->name }}</strong>.<br>
                                    Mode: {{ $c->mode ?? 'N/A' }} | Duration: {{ $c->duration ?? 'N/A' }}<br>
                                    {!! Str::limit(
                                        strip_tags(
                                            $c->placement_details ??
                                                ($c->eligibility ??
                                                    'Learn more about this dynamic program, its curriculum, fees, and career placement options.'),
                                        ),
                                        200,
                                    ) !!}
                                </p>
                                <a href="{{ route('pages.organisations.detail', $org->slug) }}"
                                    class="btn-theme-2  text-decoration-none d-inline-block text-center pt-2">
                                    Learn More
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-2 order-1">
                            <div class="image-box">
                                <img src="{{ $img }}" alt="{{ $c->course->name ?? 'Course' }}"
                                    style="max-height: 250px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <!-- fallback mock if no courses in database -->
                <div class="row align-items-center info-row">
                    <div class="col-lg-5">
                        <div class="image-box">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=900"
                                alt="students">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="content-box">
                            <h2>What is Lorem Ipsum?</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                            <button class="learn-btn">Learn More</button>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>

    </section>


