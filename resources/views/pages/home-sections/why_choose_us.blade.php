    <section class="timeline-section">

        <div class="container">

            <h2 class="section-title main-heading">
                {!! $section->title ?? 'Why Choose enrollzy' !!}
            </h2>

            <p class="section-desc">
                We assist you with the right guidance for a successful career ahead.
            </p>

            <div class="title-line"></div>


            <div class="timeline">
                <div class="timeline-progress"></div>

                @forelse($home_services as $index => $service)
                    <div class="timeline-item row">
                        @if ($index % 2 == 0)
                            <div class="timeline-content left animate">
                                <div class="image-box">
                                    <img src="{{ $service->image ? rtrim(env('BACKEND_URL'), '/') . '/' . ltrim($service->image, '/') : asset('images/Choose-enrollzy.png') }}" alt="{{ $service->title }}" class="img-fluid">
                                </div>
                            </div>

                            <div class="timeline-content right animate">
                                <div class="card-box">
                                    <h3 class="sub-heading">{{ $service->title }}</h3>
                                    <p>{{ $service->description }}</p>
                                    @if ($service->footer_text)
                                        <button class="btn-theme-1">
                                            {{ $service->footer_text }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="timeline-content left animate">
                                <div class="card-box">
                                    <h3 class="sub-heading">{{ $service->title }}</h3>
                                    <p>{{ $service->description }}</p>
                                    @if ($service->footer_text)
                                        <button class="btn-theme-1">
                                            {{ $service->footer_text }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="timeline-content right animate">
                                <div class="image-box">
                                    <img src="{{ $service->image ? rtrim(env('BACKEND_URL'), '/') . '/' . ltrim($service->image, '/') : asset('images/Choose-enrollzy.png') }}" alt="{{ $service->title }}" class="img-fluid">
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <!-- default fallback mock items -->
                    <div class="timeline-item row">
                        <div class="timeline-content left animate">
                            <div class="image-box">
                                <img src="{{ asset('images/Choose-enrollzy.png') }}" alt="timeline">
                            </div>
                        </div>
                        <div class="timeline-content right animate">
                            <div class="card-box">
                                <h3 class="sub-heading">Stage 1</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <button class="btn-theme-1">Find</button>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>

    </section>



