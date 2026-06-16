    <section class="featured-section">
        <div class="container text-center">
            <h2 class="featured-title main-heading">
                {!! $section->title ?? 'Comparison' !!}
            </h2>

            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
            @else
            <p class="featured-desc">
                Compare multiple institutions and courses side-by-side to find the perfect fit for your academic journey.
            </p>
            @endif

            <div class="title-line"></div>
        </div>
    </section>

    <section class="compare-section text-center" style="background: linear-gradient(135deg, #4e3890 0%, #7f5ae8 100%); position: relative; overflow: hidden; padding: 80px 0;">
        <div class="container" style="position: relative; z-index: 2;">
            <h3 class="text-white mb-4 fw-bold" style="font-size: 2rem;">Ready to make an informed decision?</h3>
            <button type="button" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg" data-bs-toggle="modal" data-bs-target="#courseSelectionModal" style="font-size: 1.2rem; letter-spacing: 1px; color: #4e3890 !important; transition: transform 0.3s ease; border: none;">
                <i class="fas fa-layer-group me-2"></i> SELECT COURSES TO COMPARE
            </button>
            <p class="text-white mt-4 mb-0" style="font-size: 1.1rem; opacity: 0.9;">Choose up to 4 programs to compare fees, placements, ratings, and more!</p>
        </div>
        <!-- Decorative overlay from theme -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('{{ asset('images/comparison.png') }}') center/cover; opacity: 0.15; z-index: 1;"></div>
    </section>

    <!-- Include the Unified Selection Modal here so it works on the homepage -->
    @include('partials.compare-modal')



