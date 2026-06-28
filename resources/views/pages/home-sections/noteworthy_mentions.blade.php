@if ($noteworthy_categories->count() > 0)
<section class="mention-section">

            <div class="container">

                <div class="section-heading heading">

                    <h2 class="main-heading">
                {!! $section->title ?? '<span class=\"main-heading\">Noteworthy</span> Mentions' !!}
            </h2>

                    <p>
                        Explore our popular certificates, credentials, and achievements.
                    </p>

                    <div class="heading-line"></div>

                </div>


                <div class="row g-4">

                    @php
                        $colors = ['purple', 'cream', 'green'];
                    @endphp
                    @foreach ($noteworthy_categories->take(3) as $cIndex => $category)
                        <div class="col-lg-4 col-md-6">

                            <div class="mention-column">

                                <div class="column-top">

                                    <h4 class="sub-heading-two text-capitalize">{{ $category->name }}</h4>

                                    <i class="fa-solid fa-arrow-right"></i>

                                </div>

                                @foreach ($category->mentions->take(6) as $mention)
                                    @php
                                        $colorClass = $colors[$cIndex % 3];
                                    @endphp
                                    @php
                                        $detailUrl = route('pages.learning-opportunity.detail', $mention->slug ?? $mention->id);
                                    @endphp
                                    <a href="{{ $detailUrl }}" class="text-decoration-none text-dark">
                                    <div class="mention-card {{ $colorClass }}">

                                        <div class="icon-box">
                                            @if ($mention->image)
                                                <img src="{{ env('BACKEND_URL') . '/' . $mention->image }}"
                                                    alt="img" style="width: 32px; height: 32px; border-radius: 50%;">
                                            @else
                                                🏅
                                            @endif
                                        </div>

                                        <div class="card-content">

                                            <h5>
                                                {{ $mention->title }}
                                            </h5>

                                            <p>
                                                {{ $mention->subtitle }} @if ($mention->badge_text)
                                                    | {{ $mention->badge_text }}
                                                @endif
                                            </p>

                                        </div>

                                    </div>
                                    </a>
                                @endforeach

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif
