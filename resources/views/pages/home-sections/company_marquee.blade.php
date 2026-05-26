@if($company_marquees->count() > 0)
    <section class="company-marquee-section pt-5 pb-5 bg-light">
        <div class="container text-center mb-4">
            <h2 class="featured-title main-heading">
                {!! $section->title ?? ($company_marquees->first()->heading ?? 'Top Hiring Companies') !!}
            </h2>
            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
        @else
            <p class="featured-desc">
                {{ $company_marquees->first()->subheading ?? 'Our students are placed in top companies worldwide.' }}
            </p>
        @endif
            <div class="title-line"></div>
        </div>
        <div class="marquee-container">
            <div class="marquee-track">
                @foreach($company_marquees as $marquee)
                    <div class="marquee-item" title="{{ $marquee->name }}">
                        <img src="{{ env('BACKEND_URL') . '/' . $marquee->logo }}" alt="{{ $marquee->name }}">
                    </div>
                @endforeach
                <!-- Duplicate for seamless scroll -->
                @foreach($company_marquees as $marquee)
                    <div class="marquee-item" title="{{ $marquee->name }}">
                        <img src="{{ env('BACKEND_URL') . '/' . $marquee->logo }}" alt="{{ $marquee->name }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

