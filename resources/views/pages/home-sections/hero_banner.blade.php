@if($hero_sliders && $hero_sliders->isNotEmpty())
    <section class="hero-slider pt-0">
        <div class="container-fluid pt-0 pb-4" style="padding-left: 10%; padding-right: 10%;">

            <div id="heroCarousel" class="carousel slide rounded-4 overflow-hidden shadow" data-bs-ride="carousel" data-bs-interval="3000">

                <!-- indicators -->

                <div class="carousel-indicators">
                    @foreach ($hero_sliders as $index => $slider)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>


                <div class="carousel-inner">
                    @foreach($hero_sliders as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} position-relative">
                            <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}"
                                alt="{{ $slider->heading ?? 'banner' }}" class="d-block w-100">
                            
                            @if($slider->image_type === 'Text Overlay' || ($slider->heading || $slider->subheading || $slider->button_text))
                                <div class="hero-slider-overlay">
                                    <div class="hero-slider-content">
                                        @if($slider->heading)
                                            <h2 class="hero-slider-title">{{ $slider->heading }}</h2>
                                        @endif
                                        @if($slider->subheading)
                                            <div class="hero-slider-desc">
                                                {!! $slider->subheading !!}
                                            </div>
                                        @endif
                                        @if($slider->button_text)
                                            <a href="{{ $slider->button_url ?? '#' }}" class="btn hero-slider-btn">
                                                {{ $slider->button_text }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

    <style>
        .hero-slider-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.45) 50%, rgba(0, 0, 0, 0.15) 100%);
            display: flex;
            align-items: center;
            padding: 0 8%;
            color: #ffffff;
            z-index: 2;
        }
        .hero-slider-content {
            max-width: 60%;
            text-align: left;
        }
        .hero-slider-title {
            font-size: clamp(1.4rem, 3.5vw, 2.8rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .hero-slider-desc {
            font-size: clamp(0.9rem, 1.8vw, 1.2rem);
            line-height: 1.5;
            margin-bottom: 25px;
            opacity: 0.95;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }
        .hero-slider-desc p {
            margin-bottom: 0;
        }
        .hero-slider-btn {
            background-color: #163c97;
            border-color: #163c97;
            color: #ffffff;
            padding: 10px 28px;
            font-weight: 600;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .hero-slider-btn:hover {
            background-color: #0f2a6b;
            border-color: #0f2a6b;
            color: #ffffff;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .hero-slider-overlay {
                background: rgba(0, 0, 0, 0.6);
                padding: 0 5%;
            }
            .hero-slider-content {
                max-width: 100%;
            }
            .hero-slider-title {
                font-size: 1.2rem;
                margin-bottom: 8px;
            }
            .hero-slider-desc {
                font-size: 0.8rem;
                margin-bottom: 12px;
                max-height: 50px;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }
            .hero-slider-btn {
                padding: 6px 18px;
                font-size: 0.75rem;
            }
        }
    </style>
@endif


