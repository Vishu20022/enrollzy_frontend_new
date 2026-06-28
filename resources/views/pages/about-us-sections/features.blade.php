<!-- WHY CHOOSE ENROLLZY SECTION -->
<section class="why-choose-section py-5 bg-white overflow-hidden" style="background-color: #fafafa !important;">
    <div class="container px-4">
        <div class="text-center mb-5 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->features_subtitle ?? 'WHY CHOOSE ENROLLZY' }}</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->features_title ?? 'Designed for today\'s learners and families' }}</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        <div class="row justify-content-center">
            @forelse($features as $index => $feature)
                @php 
                    $bgGradient = ($index % 2 == 0) ? 'linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%)' : 'linear-gradient(135deg, #c2410c 0%, #f97316 100%)';
                    $textColor = ($index % 2 == 0) ? '#2563eb' : '#f97316';
                @endphp
                
                <div class="col-md-6 col-lg-4 mb-4 fade-in-up delay-{{ $index % 6 }}">
                    <div class="card border-0 rounded-4 shadow-sm p-4 text-white h-100 feature-card-normal" style="background: {{ $bgGradient }};">
                        <div class="mb-3 d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm" style="width: 48px; height: 48px; color: {{ $textColor }};">
                            <span class="fw-bolder fs-5" style="font-family: 'Outfit', sans-serif;">{{ $index + 1 }}</span>
                        </div>
                        <h5 class="fw-bold mb-3" style="font-family: 'Outfit', sans-serif; font-size: 1.15rem;">{{ $feature->title }}</h5>
                        <p class="mb-0" style="font-size: 0.9rem; line-height: 1.5; color: rgba(255,255,255,0.9);">{{ $feature->description }}</p>
                    </div>
                </div>
            @empty
                <div class="w-100 text-center text-muted py-5"><p>Features will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .feature-card-normal {
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease;
    }
    .feature-card-normal:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }
</style>


