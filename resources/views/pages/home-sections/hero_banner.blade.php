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
                            @if($slider->image_type === 'Text Overlay' || $slider->image_type === 'Text')
                                <div class="hero-split-slide">
                                    <div class="container-fluid p-0">
                                        <div class="row align-items-center">
                                            <!-- LEFT SIDE: Text Content (4 columns on desktop) -->
                                            <div class="col-lg-4 col-md-12 hero-split-left-col">
                                                <div class="hero-split-content">
                                                    @if($slider->heading)
                                                        <h2 class="hero-split-title">{{ $slider->heading }}</h2>
                                                    @endif
                                                    @if($slider->subheading)
                                                        <div class="hero-split-desc">
                                                            {!! $slider->subheading !!}
                                                        </div>
                                                    @endif
                                                    @if($slider->button_text)
                                                        <div class="hero-split-actions">
                                                            <a href="{{ $slider->button_url ?? '#' }}" class="btn hero-slider-btn">
                                                                {{ $slider->button_text }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- RIGHT SIDE: Image (8 columns on desktop for larger display) -->
                                            <div class="col-lg-8 col-md-12 hero-split-right-col text-center">
                                                <div class="hero-split-image-wrapper">
                                                    <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}"
                                                        alt="{{ $slider->heading ?? 'banner' }}" class="img-fluid hero-split-img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}"
                                    alt="{{ $slider->heading ?? 'banner' }}" class="d-block w-100">
                                
                                @if($slider->heading || $slider->subheading || $slider->button_text)
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

        /* Hero Split Layout Styles */
        .hero-split-slide {
            background: linear-gradient(135deg, #0b1528 0%, #0f224a 50%, #1a356c 100%);
            padding: 2.5rem 3.5rem;
            min-height: 480px;
            display: flex;
            align-items: center;
            color: #ffffff;
            position: relative;
            overflow: hidden;
            font-family: 'Inter', sans-serif !important;
        }

        /* Subtle glowing background circles for premium look */
        .hero-split-slide::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(22, 60, 151, 0.45) 0%, rgba(22, 60, 151, 0) 70%);
            z-index: 1;
            pointer-events: none;
        }

        .hero-split-slide .container-fluid {
            position: relative;
            z-index: 2;
        }

        .hero-split-left-col {
            display: flex;
            align-items: center;
        }

        .hero-split-content {
            width: 100%;
            text-align: left;
            padding-right: 1.5rem;
        }

        .hero-split-title {
            font-family: 'Inter', sans-serif !important;
            font-size: clamp(1.5rem, 2.5vw, 2.2rem);
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 15px;
            color: #ffffff;
            letter-spacing: -0.5px;
            background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 60%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-split-desc {
            font-family: 'Inter', sans-serif !important;
            font-size: clamp(0.8rem, 1.2vw, 0.95rem);
            line-height: 1.6;
            margin-bottom: 25px;
            color: #cbd5e1 !important;
            font-weight: 400;
            opacity: 0.9;
        }

        /* Force all children inside desc (like p, span, strong) to inherit the light color and sans-serif font */
        .hero-split-desc * {
            color: #cbd5e1 !important;
            font-family: 'Inter', sans-serif !important;
            font-size: inherit !important;
            line-height: inherit !important;
        }

        .hero-split-desc p {
            margin-bottom: 10px;
        }
        .hero-split-desc p:last-child {
            margin-bottom: 0;
        }

        .hero-split-actions {
            margin-top: 20px;
        }

        .hero-split-slide .hero-slider-btn {
            font-family: 'Inter', sans-serif !important;
            background: linear-gradient(135deg, #163c97 0%, #1e4bbd 100%);
            border: none;
            color: #ffffff !important;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 6px;
            box-shadow: 0 4px 14px rgba(22, 60, 151, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            text-decoration: none;
        }

        .hero-split-slide .hero-slider-btn:hover {
            background: linear-gradient(135deg, #1e4bbd 0%, #2b61eb 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(22, 60, 151, 0.6);
            color: #ffffff !important;
        }

        .hero-split-right-col {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-split-image-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .hero-split-img {
            max-height: 440px;
            max-width: 100%;
            object-fit: contain;
            display: block;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 50px rgba(22, 60, 151, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s ease;
        }

        .hero-split-img:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6), 0 0 60px rgba(22, 60, 151, 0.35);
            border-color: rgba(255, 255, 255, 0.25);
        }

        @media (max-width: 991px) {
            .hero-split-slide {
                padding: 3rem 2rem;
                min-height: auto;
            }
            .hero-split-content {
                padding-right: 0;
                text-align: center;
                margin-bottom: 2.5rem;
            }
            .hero-split-image-wrapper {
                max-width: 90%;
            }
            .hero-split-img {
                max-height: 320px;
            }
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

            .hero-split-slide {
                padding: 2.5rem 1.5rem;
            }
            .hero-split-title {
                font-size: 1.6rem;
                margin-bottom: 12px;
            }
            .hero-split-desc {
                font-size: 0.9rem;
                margin-bottom: 20px;
            }
            .hero-split-img {
                max-height: 240px;
            }
        }
    </style>
@endif


