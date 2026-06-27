<!-- WHY CHOOSE ENROLLZY SECTION -->
<section class="why-choose-section py-3 bg-white" style="background-color: #fafafa !important;">
    <div class="container px-4">
        <div class="text-center mb-3 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->features_subtitle ?? 'WHY CHOOSE ENROLLZY' }}</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->features_title ?? 'Designed for today\'s learners and families' }}</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        @php
            $featureIcons = [
                'fas fa-search',
                'fas fa-balance-scale',
                'fas fa-shield-alt',
                'fas fa-headset',
                'far fa-heart',
                'fas fa-lock',
            ];
        @endphp

        <div class="row justify-content-center pt-2">
            @forelse($features as $index => $feature)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 fade-in-up delay-{{ $index % 6 }}">
                <div class="feature-item p-4 rounded-4 bg-white border h-100" style="border-color: #f1f5f9 !important; box-shadow: 0 4px 20px rgba(0,0,0,0.01);">
                    <div class="icon-wrapper mb-3 d-flex align-items-center justify-content-center rounded-3" style="width: 50px; height: 50px; background-color: rgba(22, 60, 151, 0.05);">
                        @if($feature->icon_image)
                            <img src="{{ env('BACKEND_URL') . '/' . $feature->icon_image }}" height="24" alt="{{ $feature->title }}">
                        @else
                            <i class="{{ $featureIcons[$index % 6] }} fs-4" style="color: #163c97;"></i>
                        @endif
                    </div>
                    <h5 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1.05rem;">{{ $feature->title }}</h5>
                    <p class="text-muted mb-0" style="font-size: 0.82rem; line-height: 1.5;">{{ $feature->description }}</p>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Features will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>


