<?php
$file = 'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\about-us.blade.php';
$content = file_get_contents($file);

$whatWeOfferSearch = <<<EOT
<!-- WHAT WE OFFER SECTION -->
<section class="what-we-offer-section py-5 bg-light position-relative" style="background-color: #f8f9fc !important;">
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ \$page->offers_subtitle ?? 'WHAT WE OFFER' }}</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ \$page->offers_title ?? 'A complete education ecosystem' }}</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        <div class="row g-4 justify-content-center">
            @forelse(\$offers as \$index => \$offer)
            <div class="col-md-6 col-lg-4 fade-in-up delay-{{ \$index % 3 }}">
                <div class="card h-100 border-0 shadow-sm offer-card text-center p-4 rounded-4">
                    <div class="card-body">
                        <div class="icon-wrapper mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background-color: rgba(13, 110, 253, 0.05);">
                            @if(\$offer->icon_image)
                                <img src="{{ asset(\$offer->icon_image) }}" width="40" alt="{{ \$offer->title }}">
                            @else
                                <i class="fas fa-graduation-cap fs-2 text-primary"></i>
                            @endif
                        </div>
                        <h5 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ \$offer->title }}</h5>
                        <p class="text-muted mb-0" style="font-size: 0.95rem;">{{ \$offer->description }}</p>
                    </div>
                </div>
            </div>
            @empty
                <!-- Fallback content if empty -->
                <div class="col-12 text-center text-muted"><p>Offers will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>
EOT;

$whatWeOfferReplace = <<<EOT
<!-- WHAT WE OFFER SECTION -->
<section class="what-we-offer-section py-5 bg-light position-relative" style="background-color: #f8f9fc !important;">
    <div class="container-fluid px-4 py-lg-5" style="max-width: 1400px;">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ \$page->offers_subtitle ?? 'WHAT WE OFFER' }}</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ \$page->offers_title ?? 'A complete education ecosystem' }}</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        @php
            \$offerStyles = [
                ['icon' => 'fas fa-school text-warning', 'bg' => 'rgba(255, 193, 7, 0.08)'],
                ['icon' => 'fas fa-graduation-cap text-primary', 'bg' => 'rgba(13, 110, 253, 0.08)'],
                ['icon' => 'fas fa-trophy text-success', 'bg' => 'rgba(25, 135, 84, 0.08)'],
                ['icon' => 'fas fa-award text-warning', 'bg' => 'rgba(255, 193, 7, 0.08)'],
                ['icon' => 'fas fa-laptop text-indigo', 'bg' => 'rgba(102, 16, 242, 0.08)'],
                ['icon' => 'fas fa-certificate text-success', 'bg' => 'rgba(25, 135, 84, 0.08)'],
            ];
        @endphp
        
        <div class="row g-3 justify-content-center">
            @forelse(\$offers as \$index => \$offer)
            <div class="col-6 col-md-4 col-lg-2 fade-in-up delay-{{ \$index % 6 }}">
                <div class="card h-100 border text-center p-3 rounded-4 shadow-sm" style="border-color: #f1f5f9 !important;">
                    <div class="card-body p-2 d-flex flex-column align-items-center">
                        <div class="icon-wrapper mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 65px; height: 65px; background-color: {{ \$offerStyles[\$index % 6]['bg'] }};">
                            @if(\$offer->icon_image)
                                <img src="{{ asset(\$offer->icon_image) }}" width="30" alt="{{ \$offer->title }}">
                            @else
                                <i class="{{ \$offerStyles[\$index % 6]['icon'] }} fs-4"></i>
                            @endif
                        </div>
                        <h6 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 0.95rem;">{{ \$offer->title }}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.5;">{{ \$offer->description }}</p>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Offers will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>
EOT;

$whyChooseSearch = <<<EOT
<!-- WHY CHOOSE ENROLLZY SECTION -->
<section class="why-choose-section py-5 bg-white">
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ \$page->features_subtitle ?? 'WHY CHOOSE ENROLLZY' }}</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ \$page->features_title ?? 'Designed for today\'s learners and families' }}</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        <div class="row justify-content-center">
            @forelse(\$features as \$index => \$feature)
            <div class="col-6 col-md-4 col-lg-2 text-center mb-4 fade-in-up delay-{{ \$index % 6 }}">
                <div class="feature-item px-2">
                    <div class="icon-wrapper mx-auto mb-3 text-primary d-flex align-items-center justify-content-center" style="height: 60px;">
                        @if(\$feature->icon_image)
                            <img src="{{ asset(\$feature->icon_image) }}" height="45" alt="{{ \$feature->title }}">
                        @else
                            <i class="fas fa-check-circle fs-1 text-primary"></i>
                        @endif
                    </div>
                    <h6 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif;">{{ \$feature->title }}</h6>
                    <p class="text-muted small mb-0">{{ \$feature->description }}</p>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Features will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>
EOT;

$whyChooseReplace = <<<EOT
<!-- WHY CHOOSE ENROLLZY SECTION -->
<section class="why-choose-section py-5 bg-white">
    <div class="container-fluid px-4 py-lg-5" style="max-width: 1400px;">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.85rem;">{{ \$page->features_subtitle ?? 'WHY CHOOSE ENROLLZY' }}</span>
            <h2 class="display-6 fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ \$page->features_title ?? 'Designed for today\'s learners and families' }}</h2>
            <div class="mx-auto" style="width: 50px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        @php
            \$featureIcons = [
                'fas fa-search text-primary',
                'fas fa-balance-scale text-primary',
                'fas fa-shield-alt text-primary',
                'fas fa-headset text-primary',
                'far fa-heart text-primary',
                'fas fa-lock text-primary',
            ];
        @endphp

        <div class="row justify-content-center align-items-start pt-3">
            @forelse(\$features as \$index => \$feature)
            <div class="col-6 col-md-4 col-lg-2 text-center mb-4 fade-in-up delay-{{ \$index % 6 }} {{ !\$loop->last ? 'border-end' : '' }} border-light">
                <div class="feature-item px-lg-3 px-1">
                    <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center" style="height: 50px;">
                        @if(\$feature->icon_image)
                            <img src="{{ asset(\$feature->icon_image) }}" height="35" alt="{{ \$feature->title }}">
                        @else
                            <i class="{{ \$featureIcons[\$index % 6] }} fs-2"></i>
                        @endif
                    </div>
                    <h6 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 0.95rem;">{{ \$feature->title }}</h6>
                    <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.5;">{{ \$feature->description }}</p>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Features will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>
EOT;

$content = str_replace($whatWeOfferSearch, $whatWeOfferReplace, $content);
$content = str_replace($whyChooseSearch, $whyChooseReplace, $content);
file_put_contents($file, $content);
echo "Replaced successfully.";
