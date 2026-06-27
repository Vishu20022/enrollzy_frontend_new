<!-- WHAT WE OFFER SECTION -->
<section class="what-we-offer-section py-3 bg-white">
    <div class="container px-4">
        <div class="text-center mb-3 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">{{ $page->offers_subtitle ?? 'WHAT WE OFFER' }}</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">{{ $page->offers_title ?? 'A complete education ecosystem' }}</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>
        
        @php
            $offerStyles = [
                ['icon' => 'fas fa-school', 'color' => '#f59e0b', 'bg' => 'rgba(245, 158, 11, 0.1)'],
                ['icon' => 'fas fa-graduation-cap', 'color' => '#6366f1', 'bg' => 'rgba(99, 102, 241, 0.1)'],
                ['icon' => 'fas fa-trophy', 'color' => '#10b981', 'bg' => 'rgba(16, 185, 129, 0.1)'],
                ['icon' => 'fas fa-coins', 'color' => '#eab308', 'bg' => 'rgba(234, 179, 8, 0.1)'],
                ['icon' => 'fas fa-laptop', 'color' => '#8b5cf6', 'bg' => 'rgba(139, 92, 246, 0.1)'],
                ['icon' => 'fas fa-certificate', 'color' => '#14b8a6', 'bg' => 'rgba(20, 184, 166, 0.1)'],
            ];
        @endphp
        
        <div class="row justify-content-center">
            @forelse($offers as $index => $offer)
            <div class="col-12 col-md-6 mb-4 fade-in-up delay-{{ $index % 6 }}">
                <div class="card offer-card h-100 p-4 rounded-4 bg-white border" style="border-color: #f1f5f9 !important; box-shadow: 0 4px 20px rgba(0,0,0,0.01);">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-3 flex-shrink-0" style="width: 50px; height: 50px; background-color: {{ $offerStyles[$index % 6]['bg'] }};">
                                @if($offer->icon_image)
                                    <img src="{{ env('BACKEND_URL') . '/' . $offer->icon_image }}" width="24" alt="{{ $offer->title }}">
                                @else
                                    <i class="{{ $offerStyles[$index % 6]['icon'] }} fs-4" style="color: {{ $offerStyles[$index % 6]['color'] }};"></i>
                                @endif
                            </div>
                            <div>
                                <h5 class="fw-bold text-dark mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1.15rem;">{{ $offer->title }}</h5>
                                <p class="text-muted mb-0" style="font-size: 0.88rem; line-height: 1.6;">{{ $offer->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted"><p>Offers will appear here.</p></div>
            @endforelse
        </div>
    </div>
</section>


