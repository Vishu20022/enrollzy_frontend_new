@if(count($trending_skills) > 0 )
<div class="trending-section">
    <div class="container">
        <!-- Trending Skills -->
        <h2 class="main-heading">
            <sppan class="theme">Trending</sppan> Skills
        </h2>
        <div class="d-flex flex-wrap gap-2 mb-4">
            @foreach ($trending_skills as $skill)
                @if($skill->url)
                    <a href="{{ $skill->url }}" class="skill-pill">{{ $skill->name }}</a>
                @else
                    <span class="skill-pill">{{ $skill->name }}</span>
                @endif
            @endforeach

            @if($trending_skills->count() > 8)
                <a href="#" class="text-primary fw-semibold ms-2">Show more</a>
            @endif
        </div>

       
    </div>
</div>
@endif
