<?php
$file = 'c:\\xampp\\htdocs\\enrollzy_frontend_new\\resources\\views\\pages\\about-us.blade.php';
$content = file_get_contents($file);

$whatWeOfferSearch = <<<EOT
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
EOT;

$whatWeOfferReplace = <<<EOT
        @php
            \$offerStyles = [
                ['icon' => 'fas fa-school', 'color' => '#f59e0b', 'bg' => 'rgba(245, 158, 11, 0.1)'],
                ['icon' => 'fas fa-graduation-cap', 'color' => '#6366f1', 'bg' => 'rgba(99, 102, 241, 0.1)'],
                ['icon' => 'fas fa-trophy', 'color' => '#10b981', 'bg' => 'rgba(16, 185, 129, 0.1)'],
                ['icon' => 'fas fa-coins', 'color' => '#eab308', 'bg' => 'rgba(234, 179, 8, 0.1)'],
                ['icon' => 'fas fa-laptop', 'color' => '#8b5cf6', 'bg' => 'rgba(139, 92, 246, 0.1)'],
                ['icon' => 'fas fa-certificate', 'color' => '#14b8a6', 'bg' => 'rgba(20, 184, 166, 0.1)'],
            ];
        @endphp
        
        <div class="row g-3 justify-content-center px-lg-5">
            @forelse(\$offers as \$index => \$offer)
            <div class="col-6 col-md-4 col-lg-2 fade-in-up delay-{{ \$index % 6 }}">
                <div class="card h-100 text-center p-3 rounded-4 bg-white" style="border: 1px solid #f1f5f9; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div class="card-body p-1 d-flex flex-column align-items-center">
                        <div class="icon-wrapper mb-4 d-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background-color: {{ \$offerStyles[\$index % 6]['bg'] }};">
                            @if(\$offer->icon_image)
                                <img src="{{ asset(\$offer->icon_image) }}" width="35" alt="{{ \$offer->title }}">
                            @else
                                <i class="{{ \$offerStyles[\$index % 6]['icon'] }} fs-3" style="color: {{ \$offerStyles[\$index % 6]['color'] }};"></i>
                            @endif
                        </div>
                        <h6 class="fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif; font-size: 0.95rem; line-height: 1.3;">{!! str_replace(' ', '<br>', \$offer->title) !!}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.6;">{{ \$offer->description }}</p>
                    </div>
                </div>
            </div>
            @empty
EOT;

$whyChooseSearch = <<<EOT
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
EOT;

$whyChooseReplace = <<<EOT
        @php
            \$featureIcons = [
                'fas fa-search',
                'fas fa-balance-scale',
                'fas fa-shield-alt',
                'fas fa-headset',
                'far fa-heart',
                'fas fa-lock',
            ];
        @endphp

        <div class="row justify-content-center align-items-start pt-4 px-lg-4">
            @forelse(\$features as \$index => \$feature)
            <div class="col-6 col-md-4 col-lg-2 text-center mb-4 fade-in-up delay-{{ \$index % 6 }} position-relative">
                <div class="feature-item px-lg-2 px-1">
                    <div class="icon-wrapper mx-auto mb-4 d-flex align-items-center justify-content-center" style="height: 45px;">
                        @if(\$feature->icon_image)
                            <img src="{{ asset(\$feature->icon_image) }}" height="35" alt="{{ \$feature->title }}">
                        @else
                            <i class="{{ \$featureIcons[\$index % 6] }} fs-2" style="color: #3b3a5b;"></i>
                        @endif
                    </div>
                    <h6 class="fw-bold text-dark mb-3 px-2" style="font-family: 'Outfit', sans-serif; font-size: 0.95rem; line-height: 1.4;">{!! str_replace(' ', '<br>', \$feature->title) !!}</h6>
                    <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.6;">{{ \$feature->description }}</p>
                </div>
                @if(!\$loop->last)
                    <div class="d-none d-lg-block position-absolute" style="right: 0; top: 10%; height: 80%; width: 1px; background-color: #e2e8f0;"></div>
                @endif
            </div>
            @empty
EOT;

$content = str_replace($whatWeOfferSearch, $whatWeOfferReplace, $content);
$content = str_replace($whyChooseSearch, $whyChooseReplace, $content);
file_put_contents($file, $content);
echo "Final patch successful.";
