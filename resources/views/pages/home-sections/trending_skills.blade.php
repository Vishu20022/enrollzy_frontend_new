    <section class="scholarship-section">

        <div class="container">

            <div class="section-heading heading">

                <h2 class="main-heading fw-bold">
                    @php
                        $title = $section->title ?? 'Scholarships & Benefits';
                        if (strip_tags($title) === $title) {
                            $words = explode(' ', $title);
                            if (count($words) > 0) {
                                $words[0] = '<span class="theme">' . $words[0] . '</span>';
                                $title = implode(' ', $words);
                            }
                        }
                    @endphp
                    {!! $title !!}
                </h2>

                <p>
                    Check out the top student benefits and programs designed for your success.
                </p>

                <div class="title-line"></div>

            </div>

<div class="scholarship-wrapper">
            <div class="row justify-content-center align-items-center g-4">

                @forelse($home_benefits->take(4) as $index => $benefit)
                    @php
                        $cardClass = $index == 0 || $index == 3 ? 'top-card' : 'bottom-card';
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <div class="scholar-card {{ $cardClass }} scholar-card-color-{{ $index % 4 }}">

                            <img src="{{ $benefit->icon ? env('BACKEND_URL') . '/' . $benefit->icon : 'https://cdn-icons-png.flaticon.com/512/3135/3135755.png' }}">

                            <h3 class="sub-heading-two" style="color: #FFD700; text-decoration: underline; text-underline-offset: 4px;">{{ $benefit->title }}</h3>

                            <p class="text-white">
                                {{ $benefit->content }}
                            </p>

                            <button class="btn-theme-3">
                                Learn More
                            </button>

                        </div>

                    </div>
                @empty
                    <div class="col-lg-3 col-md-6">
                        <div class="scholar-card top-card">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
                            <h3 class="sub-heading-two" style="color: #FFD700; text-decoration: underline; text-underline-offset: 4px;">Lorem Ipsum</h3>
                            <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                            <button class="learn-btn">Learn More</button>
                        </div>
                    </div>
                @endforelse

            </div>
</div>
        </div>

    </section>



