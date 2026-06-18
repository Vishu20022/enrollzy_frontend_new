@if($institute_marquees->count() > 0)
    <section class="school-marquee-section pt-5 pb-5 bg-light">
        <div class="container text-center mb-4">
            <h2 class="featured-title main-heading">
                {!! $section->title ?? ($institute_marquees->first()->heading ?? 'Top Institutes') !!}
            </h2>
            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
        @else
            <p class="featured-desc">
                {{ $institute_marquees->first()->subheading ?? 'Our students are placed in top companies worldwide.' }}
            </p>
        @endif
            <div class="title-line"></div>
        </div>
        <div class="marquee-container">
            @php 
                $direction = $institute_marquees->first()->direction ?? 'rtl'; 
                $duration = max(30, $institute_marquees->count() * 5); 
            @endphp
            <div class="marquee-track dir-{{ strtolower($direction) }}" style="--marquee-duration: {{ $duration }}s;">
                @foreach($institute_marquees as $marquee)
                    <div class="marquee-item" title="{{ $marquee->name }}">
                        @if($marquee->logo_url)
                            <a href="{{ $marquee->logo_url }}" target="_blank">
                                <img src="{{ env('BACKEND_URL') . '/' . $marquee->logo }}" alt="{{ $marquee->name }}">
                            </a>
                        @else
                            <img src="{{ env('BACKEND_URL') . '/' . $marquee->logo }}" alt="{{ $marquee->name }}">
                        @endif
                    </div>
                @endforeach
                <!-- Duplicate for seamless scroll -->
                @foreach($institute_marquees as $marquee)
                    <div class="marquee-item" title="{{ $marquee->name }}">
                        @if($marquee->logo_url)
                            <a href="{{ $marquee->logo_url }}" target="_blank">
                                <img src="{{ env('BACKEND_URL') . '/' . $marquee->logo }}" alt="{{ $marquee->name }}">
                            </a>
                        @else
                            <img src="{{ env('BACKEND_URL') . '/' . $marquee->logo }}" alt="{{ $marquee->name }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
