@if ($noteworthy_categories->count() > 0)
<section class="mention-section py-5 bg-white">
    <div class="container text-center mb-5">
        <h2 class="main-heading fw-bold mb-2">
            {!! $section->title ?? 'Trending Learning Opportunities' !!}
        </h2>
        <p class="text-muted mb-3" style="font-size: 15px;">
            Explore our popular certificates, credentials, and achievements.
        </p>
        <div class="mx-auto" style="width: 50px; height: 4px; background-color: #8b5cf6; border-radius: 2px;"></div>
    </div>

    <div class="container">
        <div class="row g-4">
            @php
                // Defining the distinct column colors: Blue, Orange/Yellow, Dark/Black
                $borderColors = ['#3b82f6', '#f59e0b', '#0f172a']; 
                $textColors = ['text-primary', 'text-warning', 'text-dark'];
            @endphp
            @foreach ($noteworthy_categories->take(3) as $cIndex => $category)
                @php
                    $borderColor = $borderColors[$cIndex % 3];
                    $textColor = $textColors[$cIndex % 3];
                @endphp
                <div class="col-lg-4 col-md-12">
                    
                    <!-- Column Wrapper with dashed border -->
                    <div class="p-4 h-100 rounded-3" style="border: 2px dashed {{ $borderColor }};">
                        
                        <!-- Column Header -->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="fw-bolder mb-0 {{ $textColor }}" style="font-size: 1.35rem;">
                                {{ $category->name }}
                            </h4>
                            <i class="fa-solid fa-arrow-right {{ $textColor }} fs-5"></i>
                        </div>

                        <!-- Cards Grid (2 cards per row) -->
                        <div class="row row-cols-2 g-3">
                            @foreach ($category->mentions->take(6) as $mention)
                                @php
                                    $detailUrl = route('pages.learning-opportunity.detail', $mention->slug ?? $mention->id);
                                @endphp
                                <div class="col">
                                    <a href="{{ $detailUrl }}" class="text-decoration-none text-dark d-block h-100">
                                        <div class="card h-100 shadow-sm custom-mention-card" style="border-radius: 12px; border: 1px solid #e2e8f0;">
                                            <div class="card-body p-3 text-center d-flex flex-column align-items-center">
                                                
                                                <!-- Icon Circle -->
                                                <div class="rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 44px; height: 44px; background-color: #0f172a; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                                    @if ($mention->image)
                                                        <img src="{{ env('BACKEND_URL') . '/' . $mention->image }}" alt="icon" style="width: 22px; height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                                                    @else
                                                        <!-- Fallback AI icon text like in screenshot -->
                                                        <span class="text-white fw-bold" style="font-size: 12px;">AI</span>
                                                    @endif
                                                </div>

                                                <!-- Card Title -->
                                                <h6 class="fw-bold mb-3 w-100" style="font-size: 13px; line-height: 1.3;">
                                                    {{ $mention->title }}
                                                </h6>

                                                <!-- Subtitle / Bullet Points -->
                                                <div class="text-start text-muted w-100 mt-auto" style="font-size: 11px; line-height: 1.5;">
                                                    {!! nl2br(e($mention->subtitle)) !!} 
                                                    @if ($mention->badge_text)
                                                        <div class="fw-semibold mt-1 text-dark">{{ $mention->badge_text }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .custom-mention-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        background-color: #ffffff;
    }
    .custom-mention-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.06) !important;
        border-color: #cbd5e1 !important;
    }
</style>
@endif
