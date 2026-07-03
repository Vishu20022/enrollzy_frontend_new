@if ($blogs->count() > 0)
<section class="blog-section-new py-5" style="background-color: #f0f7ff;">
    <div class="container text-center mb-5">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
            <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                {!! $section->title ?? 'Our Latest Blog' !!}
            </h2>
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
        </div>
        <p class="text-muted mx-auto" style="max-width: 700px; font-size: 15px;">
            Read our latest articles, tips, and insights to help you on your educational journey.
        </p>
    </div>

    <div class="container pb-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 align-items-stretch">
            @foreach ($blogs->take(4) as $blog)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm custom-blog-card" style="border-radius: 14px; background-color: #ffffff;">
                        <div class="card-body p-3 d-flex flex-column">
                            <!-- Padded Image -->
                            <div class="overflow-hidden rounded-3 mb-3" style="aspect-ratio: 4/3;">
                                <img src="{{ env('BACKEND_URL') . '/' . $blog->image }}" alt="{{ $blog->title }}" class="w-100 h-100" style="object-fit: cover;">
                            </div>
                            
                            <!-- Category Pill -->
                            <div class="mb-2">
                                <span class="badge rounded-pill fw-medium" style="background-color: #eff6ff; color: #3b82f6; font-size: 11px; padding: 6px 12px;">
                                    {{ $blog->category->name ?? 'Technology' }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h5 class="fw-bolder text-dark mb-4 mt-1" style="font-size: 1.1rem; line-height: 1.4;">
                                {{ Str::limit($blog->title, 55) }}
                            </h5>
                            
                            <!-- Push button to bottom -->
                            <div class="mt-auto">
                                <a href="{{ route('pages.blogs.detail', $blog->slug) }}" class="btn btn-primary btn-sm rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-1 shadow-sm" style="font-size: 12px; background-color: #007aff; border-color: #007aff;">
                                    Read more <i class="fas fa-arrow-right ms-1" style="font-size: 10px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5 mb-2">
            <a href="{{ route('pages.blogs') }}" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 14px;">
                View More <i class="fas fa-arrow-right ms-1" style="font-size: 12px;"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .custom-blog-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .custom-blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08) !important;
    }
</style>
@endif
