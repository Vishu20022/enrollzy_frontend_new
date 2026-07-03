@if($hero_sliders && $hero_sliders->isNotEmpty())
    <section class="hero-slider-new position-relative overflow-hidden pt-5 pb-5">
        
        <!-- Subtle Grid Background Overlay -->
        <div class="hero-bg-grid"></div>

        <div class="container position-relative z-1 pt-4 pb-2">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">

                <div class="carousel-inner">
                    @foreach($hero_sliders as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row align-items-center g-5">
                                
                                <!-- LEFT SIDE -->
                                <div class="col-lg-6 hero-left-content text-center text-lg-start">
                                    
                                    <!-- Badge -->
                                    <div class="d-inline-block px-3 py-1 mb-4 rounded-pill border shadow-sm" style="background-color: #f1f5f9; border-color: #e2e8f0 !important;">
                                        <span class="fw-semibold text-dark" style="font-size: 13px;">
                                            {{ $slider->badge_text ?? "India's no.1 Education Market place" }}
                                        </span>
                                    </div>

                                    <!-- Heading -->
                                    <h1 class="hero-main-title mb-2 text-dark">
                                        {{ $slider->heading ?? 'Find your path.' }}
                                    </h1>

                                    <!-- Subheading -->
                                    <h2 class="hero-sub-title mb-5">
                                        @if($slider->subheading)
                                            {!! $slider->subheading !!}
                                        @else
                                            <span style="color: #f59e0b; font-weight: 700;">Learn, Apply,</span> 
                                            <span style="font-style: italic; color: #1e293b;">Get Hired.</span>
                                        @endif
                                    </h2>

                                    <!-- Search Bar Area -->
                                    <div class="hero-search-wrapper p-2 bg-white border rounded-pill shadow-sm d-flex align-items-center mb-4 mx-auto mx-lg-0" style="max-width: 550px; border-color: #f59e0b !important;">
                                        
                                        <!-- Dropdown -->
                                        <div class="dropdown border-end px-2">
                                            <button class="btn btn-link text-dark text-decoration-none dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown" style="font-size: 14px;">
                                                Looking for..
                                            </button>
                                            <ul class="dropdown-menu border-0 shadow">
                                                <li><a class="dropdown-item" href="#">Courses</a></li>
                                                <li><a class="dropdown-item" href="#">Colleges</a></li>
                                                <li><a class="dropdown-item" href="#">Mentors</a></li>
                                            </ul>
                                        </div>

                                        <!-- Input -->
                                        <input type="text" class="form-control border-0 shadow-none px-3" placeholder="Search courses, colleges, mentor" style="font-size: 14px;">

                                        <!-- Submit Button -->
                                        <button class="btn rounded-pill px-4 py-2 text-white fw-bold d-flex align-items-center gap-2" style="background-color: #f59e0b; font-size: 14px;">
                                            Search <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>

                                    <!-- Tags -->
                                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start gap-2 mb-5">
                                        <span class="badge rounded-pill bg-transparent text-dark border border-secondary border-opacity-25 px-3 py-2 fw-medium">Top University</span>
                                        <span class="badge rounded-pill bg-transparent text-dark border border-secondary border-opacity-25 px-3 py-2 fw-medium">Top Schools</span>
                                        <span class="badge rounded-pill bg-transparent text-dark border border-secondary border-opacity-25 px-3 py-2 fw-medium">Top Schools</span>
                                        <span class="badge rounded-pill bg-transparent text-dark border border-secondary border-opacity-25 px-3 py-2 fw-medium">Top Schools</span>
                                    </div>

                                    <!-- Statistics Blocks -->
                                    <div class="row g-3 justify-content-center justify-content-lg-start mt-2">
                                        <div class="col-auto">
                                            <div class="bg-white rounded-3 shadow-sm py-3 px-4 text-center border hero-stat-card">
                                                <h4 class="fw-bolder text-dark mb-1">{{ $slider->stat_1_count ?? '2800+' }}</h4>
                                                <small class="text-muted fw-semibold" style="font-size: 12px;">{{ $slider->stat_1_label ?? 'Institution' }}</small>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="bg-white rounded-3 shadow-sm py-3 px-4 text-center border hero-stat-card">
                                                <h4 class="fw-bolder text-dark mb-1">{{ $slider->stat_2_count ?? '1.2L+' }}</h4>
                                                <small class="text-muted fw-semibold" style="font-size: 12px;">{{ $slider->stat_2_label ?? 'Student Enrolled' }}</small>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="bg-white rounded-3 shadow-sm py-3 px-4 text-center border hero-stat-card">
                                                <h4 class="fw-bolder text-dark mb-1">{{ $slider->stat_3_count ?? '4500+' }}</h4>
                                                <small class="text-muted fw-semibold" style="font-size: 12px;">{{ $slider->stat_3_label ?? "Scholarship's" }}</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- RIGHT SIDE (Image) -->
                                <div class="col-lg-6 text-center">
                                    <div class="hero-image-wrapper mx-auto ms-lg-auto me-lg-0">
                                        <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}" alt="Hero Graphic" class="img-fluid w-100 h-100 object-fit-cover shadow-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Custom Carousel Indicators below the content -->
                <div class="carousel-indicators custom-hero-indicators mt-5 position-relative mb-0 pt-4 pb-2">
                    @foreach ($hero_sliders as $index => $slider)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <style>
        .hero-slider-new {
            background: linear-gradient(135deg, #e0f2fe 0%, #ffffff 50%, #f0f9ff 100%);
        }

        /* Subtle grid pattern overlay */
        .hero-bg-grid {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-size: 60px 60px;
            background-image: 
                linear-gradient(to right, rgba(148, 163, 184, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(148, 163, 184, 0.1) 1px, transparent 1px);
            z-index: 0;
        }

        .hero-main-title {
            font-size: clamp(3rem, 5vw, 4.5rem);
            font-weight: 800;
            letter-spacing: -1.5px;
            line-height: 1.1;
        }

        .hero-sub-title {
            font-size: clamp(2.5rem, 4vw, 3.8rem);
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .hero-image-wrapper {
            max-width: 550px;
            height: 550px;
            border-radius: 30px;
            overflow: hidden;
        }

        .hero-stat-card {
            min-width: 130px;
            transition: transform 0.2s ease;
        }
        .hero-stat-card:hover {
            transform: translateY(-5px);
        }

        /* Custom Indicators */
        .custom-hero-indicators button {
            width: 10px !important;
            height: 10px !important;
            border-radius: 50% !important;
            background-color: #cbd5e1 !important;
            border: none !important;
            opacity: 1 !important;
            margin: 0 6px !important;
            transition: all 0.3s ease;
        }
        
        .custom-hero-indicators button.active {
            width: 30px !important;
            border-radius: 5px !important;
            background-color: #1e293b !important;
        }

        @media (max-width: 991px) {
            .hero-image-wrapper {
                height: 400px;
                max-width: 100%;
                border-radius: 20px;
            }
            .hero-main-title {
                font-size: 2.5rem;
            }
            .hero-sub-title {
                font-size: 2rem;
            }
        }
    </style>
@endif
