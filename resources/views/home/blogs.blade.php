<section class="blog-section">
    <div class="container">

        <div class="row">
            <h2 class="main-heading text-center">
                <span class="theme">Latest</span> Blogs
            </h2>
        </div>
        <div class="blog-slider mt-4">

            @foreach($blogs as $blog)
                <div class="blog-card mx-2 my-2">

                    <div class="blog-img">
                        @php
                            $imgUrl = (str_starts_with($blog->image, 'http')) ? $blog->image : env('BACKEND_URL') . '/' . $blog->image;
                        @endphp
                        <img src="{{ $imgUrl }}" alt="{{ $blog->title }}">
                    </div>

                    <div class="blog-content">
                        <span class="badge bg-primary-subtle text-primary border-primary-subtle rounded-pill small mb-2">{{ $blog->category->name ?? 'Update' }}</span>
                        <h4>{{ $blog->title }}</h4>

                        <p>
                            {{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 100) }}
                        </p>

                        <a href="{{ route('pages.blogs.detail', $blog->slug) }}" class="read-more">
                            Read more →
                        </a>

                        <div class="blog-meta mt-3 pt-3 border-top d-flex justify-content-between">
                            <small>{{ $blog->author }}</small>
                            <small>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M, Y') : $blog->created_at->format('d M, Y') }}</small>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>


@push('js')
<script>
$(document).ready(function () {
    $('.blog-slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: { slidesToShow: 3 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 500,
                settings: { slidesToShow: 1 }
            }
        ]
    });
});
</script>
@endpush
