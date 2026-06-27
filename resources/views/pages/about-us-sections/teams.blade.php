<!-- TEAM SECTION -->
@if(isset($teams) && count($teams) > 0)
<section class="team-section py-3 bg-light">
    <div class="container px-4">
        <div class="text-center mb-3 fade-in-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">OUR TEAM</span>
            <h3 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">The People Behind Enrollzy</h3>
            <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
        </div>

        <div class="team-slider fade-in-up delay-2">
            @foreach($teams as $team)
            <div class="px-3 py-2">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4" style="transition: transform 0.3s ease;">
                    <div class="mx-auto mb-3" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; border: 3px solid #f8f9fc;">
                        <img src="{{ $team->image ? env('BACKEND_URL') . '/' . $team->image : 'https://placehold.co/150x150/e9ecef/495057?text=Team' }}" alt="{{ $team->name }}" class="w-100 h-100 object-fit-cover">
                    </div>
                    <h5 class="fw-bold text-dark mb-1" style="font-family: 'Outfit', sans-serif;">{{ $team->name }}</h5>
                    <p class="text-primary small fw-bold mb-0" style="font-size: 0.8rem;">{{ $team->job_profile }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


