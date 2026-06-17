<section class="organisation-section py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Explore over <span class="text-primary">100 online organisations</span>
                & Compare on <span class="text-primary">30+ factors</span>
            </h2>
        </div>

        <!-- Grid -->
        <div class="row g-4">
            @foreach ($organisations as $org)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ $org->detail_url }}" class="text-decoration-none">
                        <div class="organisation-card h-100">
                            <img src="{{ $org->logo_url ? env('BACKEND_URL') . '/' . $org->logo_url : asset('images/default-org.png') }}"
                                alt="{{ $org->name }}" class="org-logo">

                            <div class="course-count">
                                {{ $org->courses->count() }} Courses
                            </div>

                            <div class="org-name">
                                {{ $org->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- CTA -->
        <div class="text-center mt-5">
            <a href="#" class="btn btn-theme-one">
                View More Organisations →
            </a>
        </div>

    </div>
</section>