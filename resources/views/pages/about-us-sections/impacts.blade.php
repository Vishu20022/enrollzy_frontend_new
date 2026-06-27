<!-- OUR IMPACT SECTION -->
<section class="impact-section pb-0 pt-0">
    <div class="container-fluid px-0">
        <div class="bg-dark text-white py-5 px-4" style="background-color: #1b193f !important;">
            <div class="row align-items-center justify-content-center max-w-1200 mx-auto" style="max-width: 1200px;">
                <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-0 border-end border-secondary border-opacity-25">
                    <h4 class="fw-bold text-white mb-2" style="font-family: 'Outfit', sans-serif;">Our Impact So Far</h4>
                    <div class="mx-auto mx-lg-0" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
                </div>
                <div class="col-lg-9">
                    <div class="row g-0 h-100">
                        @forelse($impacts as $index => $impact)
                        <div class="col-6 col-md-3 text-center border-end border-secondary border-opacity-25 {{ $loop->last ? 'border-end-0' : '' }} d-flex flex-column justify-content-center align-items-center px-3">
                            @if($impact->icon_image)
                                <img src="{{ env('BACKEND_URL') . '/' . $impact->icon_image }}" width="30" class="mb-2 opacity-75" alt="{{ $impact->label }}">
                            @endif
                            <h3 class="fw-bold text-warning mb-1" style="font-family: 'Outfit', sans-serif;">{{ str_ends_with(trim($impact->count_text), '+') ? trim($impact->count_text) : trim($impact->count_text) . '+' }}</h3>
                            <span class="text-white-50" style="font-size: 0.75rem;">{{ $impact->label }}</span>
                        </div>
                        @empty
                            <div class="col-12 p-4 text-center text-white-50">Impact stats will appear here.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


