<!-- ADVISORY BOARD SECTION -->
@if(isset($advisory_boards) && count($advisory_boards) > 0)
<section class="advisory-board-section pt-1 pb-5 bg-white">
    <div class="container px-4">
        <div class="text-center mb-4 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">ADVISORY BOARD</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Guiding Our Vision</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="row justify-content-center fade-in-up delay-2">
            @foreach($advisory_boards as $board)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 position-relative" style="transition: transform 0.3s ease;">
                    <div class="mx-auto mb-3" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; border: 3px solid #f8f9fc;">
                        <img src="{{ $board->image ? env('BACKEND_URL') . '/' . $board->image : 'https://placehold.co/150x150/e9ecef/495057?text=Board' }}" alt="{{ $board->name }}" class="w-100 h-100 object-fit-cover">
                    </div>
                    <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif;">{{ $board->name }}</h5>
                    <p class="text-primary small fw-bold mb-3" style="font-size: 0.8rem;">{{ $board->designation }}</p>
                    
                    @if($board->linkedin_url)
                    <div class="mt-auto">
                        <a href="{{ $board->linkedin_url }}" target="_blank" class="text-primary text-decoration-none" style="transition: opacity 0.2s; opacity: 0.8;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                            <i class="fab fa-linkedin" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
