@php
    $benefits = \App\Models\HomeBenefit::where('status', true)->orderBy('sort_order')->get();
@endphp

@if($benefits->count() > 0)
<section class="why-choose-us py-5" style="background-color: #fcfcfc;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #2c2445; font-weight: 700; font-size: 2.5rem;">
            <span style="background-color: #f7941d; color: #fff; padding: 2px 10px; border-radius: 4px; margin-right: 5px;">Why</span> Choose Our Two-Year Integrated NEET Program?
        </h2>
        
        <div class="row g-4 justify-content-center">
            @foreach($benefits as $benefit)
            <div class="col-lg-3 col-md-6">
                <div class="benefit-card h-100">
                    <div class="card-inner">
                        {{-- Front: Title (Default) --}}
                        <div class="card-front text-center p-4 d-flex align-items-center justify-content-center">
                            <h4 class="mb-0" style="font-weight: 800; font-size: 1.25rem; line-height: 1.4; color: #000;">
                                {{ $benefit->title }}
                            </h4>
                        </div>
                        
                        {{-- Back: Content (On Hover) --}}
                        <div class="card-back text-center p-4 d-flex align-items-center justify-content-center">
                            <p class="mb-0" style="font-size: 0.95rem; line-height: 1.6; font-weight: 500; color: #fff;">
                                {{ $benefit->content ?? $benefit->title }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .benefit-card {
        perspective: 1000px;
        min-height: 250px;
    }

    .card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        border-radius: 20px;
    }

    .benefit-card:hover .card-inner {
        transform: rotateY(180deg);
    }

    .card-front, .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 20px;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-front {
        background: linear-gradient(135deg, #ffcc33 0%, #ffb300 100%);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        z-index: 2;
    }

    .card-back {
        background-color: #e8863d;
        transform: rotateY(180deg);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        z-index: 1;
    }
</style>
@endif
