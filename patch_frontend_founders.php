<?php
$file = 'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\about-us.blade.php';
$content = file_get_contents($file);

$storyEndSearch = <<<EOT
        </div>
    </div>
</section>

<!-- WHAT WE OFFER SECTION -->
EOT;

$coreValuesInsert = <<<EOT
        </div>
    </div>
</section>

<!-- CORE VALUES SECTION (Mission, Vision, Philosophy) -->
@if(\$page->mission_text || \$page->vision_text || \$page->philosophy_text)
<section class="core-values-section py-5 bg-light" style="background-color: #f8f9fa !important;">
    <div class="container py-lg-5">
        <div class="row g-4 justify-content-center">
            
            @if(\$page->mission_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-1">
                <div class="card h-100 border-0 rounded-4 shadow-sm bg-white p-4 text-center">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-bullseye fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Our Mission</h4>
                    <p class="text-muted mb-0" style="line-height: 1.7;">{{ \$page->mission_text }}</p>
                </div>
            </div>
            @endif

            @if(\$page->vision_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-2">
                <div class="card h-100 border-0 rounded-4 shadow-sm bg-white p-4 text-center">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-eye fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Our Vision</h4>
                    <p class="text-muted mb-0" style="line-height: 1.7;">{{ \$page->vision_text }}</p>
                </div>
            </div>
            @endif

            @if(\$page->philosophy_text)
            <div class="col-lg-4 col-md-6 fade-in-up delay-3">
                <div class="card h-100 border-0 rounded-4 shadow-sm bg-white p-4 text-center">
                    <div class="icon-wrapper mx-auto mb-3 text-white bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fas fa-leaf fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Our Philosophy</h4>
                    <p class="text-muted mb-0" style="line-height: 1.7;">{{ \$page->philosophy_text }}</p>
                </div>
            </div>
            @endif
            
        </div>
    </div>
</section>
@endif

<!-- WHAT WE OFFER SECTION -->
EOT;

$impactEndSearch = <<<EOT
    </div>
</section>

<!-- CTA SECTION -->
EOT;

$foundersInsert = <<<EOT
    </div>
</section>

<!-- FOUNDERS SECTION -->
@if(\$page->founder_1_name || \$page->founder_2_name)
<section class="founders-section py-5 bg-white">
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">LEADERSHIP</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Meet Our Founders</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="row justify-content-center g-5">
            <!-- Founder 1 -->
            @if(\$page->founder_1_name)
            <div class="col-md-5 text-center fade-in-up delay-1">
                <div class="position-relative d-inline-block mb-4">
                    <div class="position-absolute w-100 h-100 rounded-circle border border-2 border-primary" style="top: 10px; left: 10px; z-index: 0; opacity: 0.3;"></div>
                    <img src="{{ \$page->founder_1_image ? asset(\$page->founder_1_image) : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                         alt="{{ \$page->founder_1_name }}" 
                         class="rounded-circle shadow-lg position-relative" 
                         style="width: 220px; height: 220px; object-fit: cover; z-index: 1;">
                </div>
                <h4 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif;">{{ \$page->founder_1_name }}</h4>
                <p class="text-muted small fw-bold text-uppercase tracking-wider mb-3">Co-Founder</p>
                <div class="d-flex justify-content-center gap-3">
                    @if(\$page->founder_1_facebook)
                        <a href="{{ \$page->founder_1_facebook }}" target="_blank" class="text-primary fs-4"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if(\$page->founder_1_linkedin)
                        <a href="{{ \$page->founder_1_linkedin }}" target="_blank" class="text-primary fs-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if(\$page->founder_1_twitter)
                        <a href="{{ \$page->founder_1_twitter }}" target="_blank" class="text-primary fs-4"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            @endif

            <!-- Founder 2 -->
            @if(\$page->founder_2_name)
            <div class="col-md-5 text-center fade-in-up delay-2">
                <div class="position-relative d-inline-block mb-4">
                    <div class="position-absolute w-100 h-100 rounded-circle border border-2 border-warning" style="top: 10px; left: 10px; z-index: 0; opacity: 0.3;"></div>
                    <img src="{{ \$page->founder_2_image ? asset(\$page->founder_2_image) : 'https://placehold.co/300x300/e9ecef/495057?text=Founder' }}" 
                         alt="{{ \$page->founder_2_name }}" 
                         class="rounded-circle shadow-lg position-relative" 
                         style="width: 220px; height: 220px; object-fit: cover; z-index: 1;">
                </div>
                <h4 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif;">{{ \$page->founder_2_name }}</h4>
                <p class="text-muted small fw-bold text-uppercase tracking-wider mb-3">Co-Founder</p>
                <div class="d-flex justify-content-center gap-3">
                    @if(\$page->founder_2_facebook)
                        <a href="{{ \$page->founder_2_facebook }}" target="_blank" class="text-primary fs-4"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if(\$page->founder_2_linkedin)
                        <a href="{{ \$page->founder_2_linkedin }}" target="_blank" class="text-primary fs-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if(\$page->founder_2_twitter)
                        <a href="{{ \$page->founder_2_twitter }}" target="_blank" class="text-primary fs-4"><i class="fab fa-twitter"></i></a>
                    @endif
                </div>
            </div>
            @endif
        </div>

        @if(\$page->founders_common_message)
        <div class="row justify-content-center mt-5 fade-in-up delay-3">
            <div class="col-lg-8 text-center">
                <div class="bg-light p-4 rounded-4 position-relative">
                    <i class="fas fa-quote-left fs-1 text-black-50 position-absolute" style="top: -15px; left: 20px; opacity: 0.1;"></i>
                    <p class="lead text-dark fst-italic mb-0" style="line-height: 1.8;">"{{ \$page->founders_common_message }}"</p>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>
@endif

<!-- CTA SECTION -->
EOT;

$content = str_replace($storyEndSearch, $coreValuesInsert, $content);
$content = str_replace($impactEndSearch, $foundersInsert, $content);

file_put_contents($file, $content);
echo "Frontend patched successfully.";
