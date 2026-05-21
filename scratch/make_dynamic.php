<?php

$filePath = 'resources/views/pages/test.blade.php';
$content = file_get_contents($filePath);

// 1. Testimonial Swiper (Video Testimonials)
$videoTestiSearch = '/<div class="swiper testimonialSwiper">.*?<div class="swiper-pagination"><\/div>\s*<\/div>/s';
$videoTestiReplace = '
            <div class="swiper testimonialSwiper">

                <div class="swiper-wrapper">

                    @forelse($video_testimonials as $video)
                        <div class="swiper-slide">
                            <div class="testimonial-card" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.75)), url(\'{{ env(\'BACKEND_URL\') . \'/\' . $video->thumbnail }}\'); background-size: cover; background-position: center; min-height: 250px;">
                                <a href="{{ $video->video_url }}" target="_blank" class="play-btn text-decoration-none text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(5px); border-radius: 50%;">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <h3>{{ $video->name }}</h3>
                                <p>
                                    {{ $video->course }}
                                </p>
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa-solid fa-star" style="color: #ffc107;"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="play-btn">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

                <div class="swiper-pagination"></div>

            </div>';

$content = preg_replace($videoTestiSearch, $videoTestiReplace, $content);

// 2. Alumni Carousel
$alumniSearch = '/<section class="custom-slider">.*?<\/section>/s';
$alumniReplace = '
    @if($site_alumni->count() > 0)
    <section class="custom-slider">

        <div class="container-fluid px-lg-4">

            <div id="customCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">


                <div class="carousel-indicators">
                    @foreach($site_alumni as $index => $alumnus)
                        <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? \'active\' : \'\' }}"></button>
                    @endforeach
                </div>



                <div class="carousel-inner">

                    @foreach($site_alumni as $index => $alumnus)
                        @php
                            $imgUrl = $alumnus->image ? (str_starts_with($alumnus->image, \'http\') ? $alumnus->image : env(\'BACKEND_URL\') . \'/\' . $alumnus->image) : \'https://ui-avatars.com/api/?name=\'.urlencode($alumnus->name);
                        @endphp
                        <div class="carousel-item {{ $index == 0 ? \'active\' : \'\' }}">

                            <div class="slider-wrapper">

                                <div class="left-image">
                                    <a href="{{ route(\'pages.alumni.detail\', $alumnus->id) }}">
                                        <img src="{{ $imgUrl }}" alt="{{ $alumnus->name }}" style="max-height: 400px; object-fit: cover; width: 100%;">
                                    </a>
                                </div>


                                <div class="content-box">

                                    <h2>
                                        {{ $alumnus->name }}
                                    </h2>

                                    <h4 class="text-white opacity-75 mt-2">{{ $alumnus->designation }} {{ $alumnus->company ? \'@ \' . $alumnus->company : \'\' }}</h4>

                                    <p class="mt-3">
                                        {{ $alumnus->experience_years ? $alumnus->experience_years . \' years of professional experience.\' : \'\' }}
                                        Connect with our alumni working in top organizations worldwide to get real-world insights, career guidance, and mentorship.
                                    </p>

                                    <button type="button" 
                                        class="btn-theme-one mt-4 btn-book-session"
                                        style="background: #2563eb; color: #fff; border: none; padding: 12px 30px; border-radius: 30px; font-weight: bold; transition: all 0.3s ease;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#bookingModal"
                                        data-provider-id="{{ $alumnus->id }}"
                                        data-provider-type="alumni"
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
    @endif';

$content = preg_replace($alumniSearch, $alumniReplace, $content);

// 3. FAQ Section
$faqSearch = '/<section class="faq-section">.*?<\/section>/s';
$faqReplace = '
    @if($faqs->count() > 0)
    <section class="faq-section">

        <div class="container">

            <div class="faq-heading">

                <h2>
                    FAQ
                </h2>

                <p>
                    Find answers to frequently asked questions about our programs and admissions.
                </p>

            </div>


            <div class="faq-wrapper">

                <div class="accordion" id="faqAccordion">

                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item">

                            <h2 class="accordion-header">

                                <button class="accordion-button {{ $index == 0 ? \'\' : \'collapsed\' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq{{ $faq->id }}">

                                    <div class="faq-icon"></div>

                                    {{ $faq->question }}

                                </button>

                            </h2>


                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? \'show\' : \'\' }}" data-bs-parent="#faqAccordion">

                                <div class="accordion-body">

                                    {{ $faq->answer }}

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </section>
    @endif';

$content = preg_replace($faqSearch, $faqReplace, $content);

// 4. Blog Section
$blogSearch = '/<section class="blog-section">.*?<\/section>/s';
$blogReplace = '
    @if($blogs->count() > 0)
    <section class="blog-section">

        <div class="container">

            <div class="blog-heading">

                <h2>
                    Our Latest Blog
                </h2>

            </div>


            <div class="blog-wrapper">

                <div class="row g-4">

                    @foreach($blogs->take(3) as $blog)
                        <div class="col-lg-4 col-md-6">

                            <div class="blog-card">

                                <div class="blog-image">

                                    <img src="{{ env(\'BACKEND_URL\') . \'/\' . $blog->image }}" alt="{{ $blog->title }}">

                                </div>


                                <div class="blog-content">

                                    <button class="update-btn">
                                        Update
                                    </button>

                                    <h3 class="blog-title">
                                        {{ $blog->title }}
                                    </h3>

                                    <p class="blog-desc">
                                        {!! Str::limit(strip_tags($blog->description), 100) !!}
                                    </p>

                                    <a href="{{ route(\'pages.blogs.detail\', $blog->slug) }}" class="read-more">
                                        Read More →
                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </section>
    @endif';

$content = preg_replace($blogSearch, $blogReplace, $content);

// 5. QA Section
$qaSearch = '/<section class="qa-section">.*?<\/section>/s';
$qaReplace = '
    @if($faqs->count() > 0)
    <section class="qa-section">

        <div class="container">

            <div class="top-heading">

                <h2>
                    Questions & Answers
                </h2>

                <p>
                    Here are some of the most commonly asked questions by our prospective students.
                </p>

                <div class="heading-line"></div>

            </div>


            <div class="qa-wrapper">

                <div class="row">


                    <!-- left -->

                    <div class="col-lg-7">

                        <div class="left-side">

                            <h3>
                                Asked Questions
                            </h3>

                            <p class="big-text">
                                Have more specific questions? Reach out to our guidance experts for custom advice.
                            </p>


                            <div class="left-image">

                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=900">

                            </div>


                            <div class="question-box">

                                <h4>
                                    Still Have Question ?
                                </h4>

                                <p>
                                    Fill in our contact form or book a free session with any of our experts to clarify your doubts.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- right -->

                    <div class="col-lg-5">

                        @foreach($faqs->skip(1)->take(4) as $faq)
                            <div class="answer-card">

                                <h4>
                                    {{ $faq->question }}
                                </h4>

                                <p>
                                    {{ $faq->answer }}
                                </p>

                            </div>
                        @endforeach

                    </div>


                </div>

            </div>

        </div>

    </section>
    @endif';

$content = preg_replace($qaSearch, $qaReplace, $content);

// 6. Compare Section
$compareSearch = '/<section class="compare-section">.*?<\/section>/s';
$compareReplace = '
    <section class="compare-section">

        <div class="container">
            <div class="compare-bg">

                <div class="container">

                    <div class="row g-4 justify-content-center">

                        @for($i = 1; $i <= 3; $i++)
                            <div class="col-lg-4 col-md-6">

                                <div class="compare-card" data-slot-card="{{ $i }}">

                                    <div class="card-top">

                                        <span class="option-tag">
                                            OPTION {{ $i }}
                                        </span>

                                        <img src="{{ asset(\'images/Vector.svg\') }}" alt="img">

                                    </div>


                                    <div class="field">

                                        <label>
                                            UNIVERSITY
                                        </label>

                                        <select class="form-select org-selector" data-slot="{{ $i }}">

                                            <option value="">
                                                Choose Institution
                                            </option>
                                            @foreach($organisations as $org)
                                                <option value="{{ $org->id }}">{{ $org->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>


                                    <div class="field">

                                        <label>
                                            Program
                                        </label>

                                        <select class="form-select course-selector" data-slot="{{ $i }}" disabled>

                                            <option value="">
                                                Select Course
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>
                        @endfor

                    </div>

                </div>

            </div>

            <!-- Parameters Quick Access -->
            <div id="paramTabs" class="param-tabs-wrapper mb-4 mt-4 d-none">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-filter me-2 text-primary"></i>
                    <span class="fw-bold small text-uppercase text-white">Quick Jump</span>
                </div>
                <div class="param-tabs-scroll d-flex gap-2" style="overflow-x: auto; white-space: nowrap; padding-bottom: 10px;">
                    <!-- Tabs will be injected here -->
                </div>
            </div>

            <!-- Comparison Matrix -->
            <div id="comparisonResults" class="comparison-matrix-wrapper d-none shadow-premium rounded-4 overflow-hidden border-0 mt-4 bg-white p-3">
                <div class="table-responsive">
                    <table class="table comparison-matrix-table mb-0">
                        <thead>
                            <tr id="matrixHead">
                                <th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>
                                <!-- Slot headers injected here -->
                            </tr>
                        </thead>
                        <tbody id="matrixBody">
                            <!-- Comparison rows injected here -->
                        </tbody>
                    </table>
                </div>
                
                <div class="text-center py-4 bg-light border-top mt-3">
                    <button id="resetComparison" class="btn btn-dark rounded-pill px-5 py-2 shadow-sm">
                        <i class="fas fa-undo me-2"></i> Reset Comparison
                    </button>
                </div>
            </div>

            <div id="emptyMessage"></div>

        </div>

    </section>';

$content = preg_replace($compareSearch, $compareReplace, $content);

// 7. Text Testimonial Section
$textTestiSearch = '/<section class="text-testimonial">.*?<\/section>/s';
$textTestiReplace = '
    @if($testimonials->count() > 0)
    <section class="text-testimonial">

        <div class="container">

            <div class="heading">

                <h2>
                    <span>Text</span> Testimonials
                </h2>

                <p>
                    What our students and parents have to say about their experience with us.
                </p>

                <div class="heading-line"></div>

            </div>


            <div class="swiper testimonialSlider">

                <div class="swiper-wrapper">

                    @foreach($testimonials as $testi)
                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="profile">
                                    @php
                                        $avatar = $testi->image ? (str_starts_with($testi->image, \'http\') ? $testi->image : env(\'BACKEND_URL\') . \'/\' . $testi->image) : \'https://ui-avatars.com/api/?name=\'.urlencode($testi->name);
                                    @endphp
                                    <img src="{{ $avatar }}" alt="{{ $testi->name }}">

                                </div>

                                <h3>{{ $testi->name }}</h3>
                                <h6 class="text-muted small mb-2">{{ $testi->role }}</h6>

                                <p>
                                    {{ $testi->content }}
                                </p>

                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
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
    @endif';

$content = preg_replace($textTestiSearch, $textTestiReplace, $content);

// 8. Noteworthy Mentions Section
$mentionSearch = '/<section class="mention-section">.*?<\/section>/s';
$mentionReplace = '
    @if($noteworthy_categories->count() > 0)
    <section class="mention-section">

        <div class="container">

            <div class="section-heading">

                <h2>
                    <span>Noteworthy</span> Mentions
                </h2>

                <p>
                    Explore our popular certificates, credentials, and achievements.
                </p>

                <div class="heading-line"></div>

            </div>


            <div class="row g-4">

                @php
                    $colors = [\'purple\', \'cream\', \'green\'];
                @endphp
                @foreach ($noteworthy_categories->take(3) as $cIndex => $category)
                    <div class="col-lg-4 col-md-6">

                        <div class="mention-column">

                            <div class="column-top">

                                <h4>{{ $category->name }}</h4>

                                <i class="fa-solid fa-arrow-right"></i>

                            </div>

                            @foreach($category->mentions->take(6) as $mention)
                                @php
                                    $colorClass = $colors[$cIndex % 3];
                                @endphp
                                @if($mention->url)
                                    <a href="{{ $mention->url }}" class="text-decoration-none text-dark">
                                @endif
                                <div class="mention-card {{ $colorClass }}">

                                    <div class="icon-box">
                                        @if($mention->image)
                                            <img src="{{ env(\'BACKEND_URL\') . \'/\' . $mention->image }}" alt="img" style="width: 32px; height: 32px; border-radius: 50%;">
                                        @else
                                            🏅
                                        @endif
                                    </div>

                                    <div class="card-content">

                                        <h5>
                                            {{ $mention->title }}
                                        </h5>

                                        <p>
                                            {{ $mention->subtitle }} @if($mention->badge_text) | {{ $mention->badge_text }} @endif
                                        </p>

                                    </div>

                                </div>
                                @if($mention->url)
                                    </a>
                                @endif
                            @endforeach

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
    @endif';

$content = preg_replace($mentionSearch, $mentionReplace, $content);

// 9. Exam Section
$examSearch = '/<section class="exam-section">.*?<\/section>/s';
$examReplace = '
    @if($exams->count() > 0)
    <section class="exam-section">

        <div class="container">

            <div class="section-heading">

                <h2>
                    <span>Top</span> Exams
                </h2>

                <p>
                    Prepare for the top competitive exams in the country.
                </p>

                <div class="heading-line"></div>

            </div>


            <div class="row justify-content-center g-4">

                @foreach($exams->take(6) as $exam)
                    <div class="col-lg-4 col-md-6">

                        <div class="exam-card">

                            <div class="exam-icon">
                                <img src="{{ asset(\'images/upsc.jpg\') }}" alt="icon">
                            </div>

                            <h3>
                                {{ $exam->name }}
                            </h3>

                            <p>
                                {{ $exam->exam_type }} | {{ $exam->exam_category }}
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
    @endif';

$content = preg_replace($examSearch, $examReplace, $content);

// 10. Contact Us form
$contactSearch = '/<form class="form-side">.*?<\/form>/s';
$contactReplace = '
                        <form class="form-side" action="{{ route(\'leads.submit\') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Contact Form Enquiry">

                            <h2>
                                Contact Us
                            </h2>

                            <p>
                                Leave us a message and our advisors will get back to you shortly.
                            </p>

                            @if(session(\'success\'))
                                <div class="alert alert-success">
                                    {{ session(\'success\') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-4">

                                    <div class="input-label">

                                        <i class="fa-solid fa-user"></i>

                                        <span>Name</span>

                                    </div>

                                    <input type="text" name="name" class="form-control custom-input" required>

                                </div>


                                <div class="col-md-6 mb-4">

                                    <div class="input-label">

                                        <i class="fa-solid fa-circle-phone"></i>

                                        <span>Mobile</span>

                                    </div>

                                    <input type="tel" name="phone" class="form-control custom-input">

                                </div>

                            </div>

                            <div class="mb-4">

                                <div class="input-label">

                                    <i class="fa-solid fa-envelope"></i>

                                    <span>Email Address</span>

                                </div>

                                <input type="email" name="email" class="form-control custom-input" required>

                            </div>

                            <div class="input-label">

                                <i class="fa-solid fa-message"></i>

                                <span>Message</span>

                            </div>

                            <textarea name="message" class="form-control custom-textarea" required></textarea>


                            <button type="submit" class="send-btn">

                                Send

                            </button>

                        </form>';

$content = preg_replace($contactSearch, $contactReplace, $content);

// 11. Push JS block
$pushSearch = '/@push\(\'js\'\).*?@endpush/s';
$pushReplace = '
@push(\'js\')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const observer = new IntersectionObserver((entries) => {

            entries.forEach((entry) => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("show");

                }

            })

        }, {
            threshold: .2
        })

        document
            .querySelectorAll(".animate")
            .forEach(el => observer.observe(el))
    </script>

    <script>
        window.addEventListener("scroll", () => {

            const timeline =
                document.querySelector(".timeline");

            const progress =
                document.querySelector(".timeline-progress");

            if (!timeline || !progress) return;

            const rect =
                timeline.getBoundingClientRect();

            const windowHeight =
                window.innerHeight;

            const totalHeight =
                timeline.offsetHeight;

            const visible =
                windowHeight - rect.top;

            let percentage =
                (visible / totalHeight) * 100;

            percentage =
                Math.max(
                    0,
                    Math.min(100, percentage)
                );

            progress.style.height =
                percentage + "%";

        });
    </script>

    <script>
        new Swiper(".testimonialSwiper", {

            slidesPerView: 1,
            spaceBetween: 25,

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

            breakpoints: {

                576: {
                    slidesPerView: 2
                },

                768: {
                    slidesPerView: 3
                },

                1200: {
                    slidesPerView: 4
                }

            }

        })
    </script>

    <script>
        new Swiper(".testimonialSlider", {

            spaceBetween: 25,

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },

            breakpoints: {

                0: {
                    slidesPerView: 1
                },

                576: {
                    slidesPerView: 2
                },

                992: {
                    slidesPerView: 3
                },

                1200: {
                    slidesPerView: 4
                }

            }

        })
    </script>

    @php
        $compData = $organisations->mapWithKeys(function($org) {
            return [$org->id => [
                \'name\' => $org->name,
                \'courses\' => $org->courses->map(function($c) {
                    return [
                        \'id\' => $c->id,
                        \'name\' => $c->course->name ?? \'N/A\',
                        \'fee\' => $c->fees ?? \'N/A\',
                        \'mode\' => $c->mode ?? \'N/A\',
                        \'duration\' => $c->duration ?? \'N/A\',
                        \'rating\' => $c->rating ?? 0,
                        \'placement\' => strip_tags($c->placement_details) ?: \'N/A\',
                        \'eligibility\' => strip_tags($c->eligibility) ?: \'N/A\',
                        \'admission\' => strip_tags($c->admission_process) ?: \'N/A\',
                        \'roi\' => $c->roi ?: \'N/A\',
                        \'industrial\' => strip_tags($c->industrial_collaboration) ?: \'N/A\',
                        \'internship\' => $c->internship_ranking ?: \'N/A\'
                    ];
                })
            ]];
        });
    @endphp
    <script>
        document.addEventListener(\'DOMContentLoaded\', function () {
            const orgData = @json($compData);

            const orgSelectors = document.querySelectorAll(\'.org-selector\');
            const courseSelectors = document.querySelectorAll(\'.course-selector\');
            const resultsDiv = document.getElementById(\'comparisonResults\');
            const emptyMessage = document.getElementById(\'emptyMessage\');
            const paramTabs = document.getElementById(\'paramTabs\');
            const matrixHead = document.getElementById(\'matrixHead\');
            const matrixBody = document.getElementById(\'matrixBody\');
            const resetBtn = document.getElementById(\'resetComparison\');

            const params = [
                { label: \'Mode of Study\', key: \'mode\', icon: \'fas fa-laptop-house\' },
                { label: \'Total Fees\', key: \'fee\', icon: \'fas fa-money-bill-wave\' },
                { label: \'Duration\', key: \'duration\', icon: \'fas fa-clock\' },
                { label: \'Rating\', key: \'rating\', isRating: true, icon: \'fas fa-star\' },
                { label: \'Eligibility\', key: \'eligibility\', icon: \'fas fa-user-check\' },
                { label: \'Admission Process\', key: \'admission\', icon: \'fas fa-file-signature\' },
                { label: \'Placement\', key: \'placement\', icon: \'fas fa-briefcase\' },
                { label: \'ROI\', key: \'roi\', icon: \'fas fa-chart-line\' },
                { label: \'Ind. Collaboration\', key: \'industrial\', icon: \'fas fa-handshake\' },
                { label: \'Internship Rank\', key: \'internship\', icon: \'fas fa-medal\' }
            ];

            let selections = { 1: null, 2: null, 3: null };

            orgSelectors.forEach(select => {
                select.addEventListener(\'change\', function () {
                    const slot = this.getAttribute(\'data-slot\');
                    const orgId = this.value;
                    const courseSelect = document.querySelector(`.course-selector[data-slot="${slot}"]`);
                    
                    courseSelect.innerHTML = \'<option value="">Select Course</option>\';
                    selections[slot] = null;

                    if (orgId && orgData[orgId]) {
                        courseSelect.disabled = false;
                        const compareCard = this.closest(".compare-card");
                        if (compareCard) compareCard.classList.add(\'active-slot\');
                        
                        orgData[orgId].courses.forEach(course => {
                            const option = document.createElement(\'option\');
                            option.value = course.id;
                            option.textContent = course.name;
                            courseSelect.appendChild(option);
                        });
                    } else {
                        courseSelect.disabled = true;
                        const compareCard = this.closest(".compare-card");
                        if (compareCard) compareCard.classList.remove(\'active-slot\');
                    }
                    
                    updateComparison();
                });
            });

            courseSelectors.forEach(select => {
                select.addEventListener(\'change\', function () {
                    const slot = this.getAttribute(\'data-slot\');
                    const courseId = this.value;
                    const orgId = document.querySelector(`.org-selector[data-slot="${slot}"]`).value;

                    if (courseId && orgId) {
                        const courseData = orgData[orgId].courses.find(c => c.id == courseId);
                        selections[slot] = { 
                            orgName: orgData[orgId].name, 
                            ...courseData 
                        };
                    } else {
                        selections[slot] = null;
                    }

                    updateComparison();
                });
            });

            function updateComparison() {
                const activeSelections = Object.values(selections).filter(s => s !== null);

                if (activeSelections.length > 0) {
                    emptyMessage.classList.add(\'d-none\');
                    resultsDiv.classList.remove(\'d-none\');
                    paramTabs.classList.remove(\'d-none\');
                    renderTabs();
                    renderMatrix(activeSelections);
                } else {
                    emptyMessage.classList.remove(\'d-none\');
                    resultsDiv.classList.add(\'d-none\');
                    paramTabs.classList.add(\'d-none\');
                }
            }

            function renderTabs() {
                const scrollContainer = paramTabs.querySelector(\'.param-tabs-scroll\');
                scrollContainer.innerHTML = \'\';
                params.forEach(p => {
                    const btn = document.createElement(\'div\');
                    btn.className = \'param-tab-btn\';
                    btn.innerHTML = `<i class="\${p.icon} me-1 small"></i> \${p.label}`;
                    btn.onclick = () => {
                        const target = document.getElementById(\'row-\' + p.key);
                        if (target) {
                            target.scrollIntoView({ behavior: \'smooth\', block: \'center\' });
                            target.style.backgroundColor = \'rgba(128, 92, 216, 0.05)\';
                            setTimeout(() => target.style.backgroundColor = \'\', 2000);
                        }
                    };
                    scrollContainer.appendChild(btn);
                });
            }

            function renderMatrix(data) {
                let headHtml = `<th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>`;
                data.forEach(item => {
                    headHtml += `
                        <th class="matrix-org-header">
                            <div class="matrix-org-badge text-truncate px-2" style="font-size:1.1rem;font-weight:700;color:#fff;">\${item.orgName}</div>
                            <div class="matrix-course-badge text-truncate px-2" style="font-size:0.8rem;background:rgba(255,255,255,0.2);padding:2px 8px;border-radius:4px;color:#fff;">\${item.name}</div>
                        </th>`;
                });
                matrixHead.innerHTML = headHtml;

                let bodyHtml = \'\';
                params.forEach(p => {
                    bodyHtml += `<tr id="row-\${p.key}">
                        <td class="params-column ps-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle me-3 bg-light text-primary d-none d-lg-flex" style="width:30px;height:30px;border-radius:50%;align-items:center;justify-content:center;font-size:0.8rem;">
                                    <i class="\${p.icon}"></i>
                                </div>
                                <div class="matrix-label" style="font-weight:700;font-size:0.8rem;text-transform:uppercase;">\${p.label}</div>
                            </div>
                        </td>`;
                    data.forEach(item => {
                        let val = item[p.key] || \'N/A\';
                        if (p.isRating) {
                            const starCount = Math.round(val);
                            let stars = \'\';
                            for(let i=1; i<=5; i++) {
                                stars += `<i class="fa\${i <= starCount ? \'s\' : \'r\'} fa-star text-warning"></i>`;
                            }
                            val = `<div class="rating-box">\${stars} <span class="ms-1 text-dark fw-bold">\${val}</span></div>`;
                        }
                        bodyHtml += `<td>
                            <div class="matrix-value-card">
                                <div class="matrix-value" style="color:#475569;">\${val}</div>
                            </div>
                        </td>`;
                    });
                    bodyHtml += \'</tr>\';
                });
                matrixBody.innerHTML = bodyHtml;
            }

            resetBtn.addEventListener(\'click\', function() {
                orgSelectors.forEach(s => s.value = \'\');
                courseSelectors.forEach(s => {
                    s.innerHTML = \'<option value="">Select Course</option>\';
                    s.disabled = true;
                });
                document.querySelectorAll(\'.compare-card\').forEach(c => c.classList.remove(\'active-slot\'));
                selections = { 1: null, 2: null, 3: null };
                updateComparison();
            });
        });
    </script>
@endpush
';

$content = preg_replace($pushSearch, $pushReplace, $content);

file_put_contents($filePath, $content);
echo "Successfully completed replacements!\n";
