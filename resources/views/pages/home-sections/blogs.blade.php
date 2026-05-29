@if ($blogs->count() > 0)
<section class="featured-section">
            <div class="container">
                <div class="row col-12">
                    <div class="blog-heading">

                        <h2 class="main-heading">
                {!! $section->title ?? 'Our Latest Blog' !!}
            </h2>

                    </div>


                </div>
            </div>
        </section>
        <section class="blog-section">

            <div class="container">


                <div class="blog-wrapper">

                    <div class="row g-4">

                        @foreach ($blogs->take(4) as $blog)
                            <div class="col-lg-3 col-md-6">

                                <div class="blog-card">

                                    <div class="blog-image">

                                        <img src="{{ env('BACKEND_URL') . '/' . $blog->image }}"
                                            alt="{{ $blog->title }}">

                                    </div>


                                    <div class="blog-content">

                                        <!-- <button class="update-btn">
                                            Update
                                        </button> -->

                                        <h3 class="blog-title sub-heading-two">
                                            {{ $blog->title }}
                                        </h3>

                                        @if (!empty($blog->description))
                                            <p class="blog-desc">
                                                {!! Str::limit(strip_tags($blog->description), 100) !!}
                                            </p>
                                        @endif

                                        <a href="{{ route('pages.blogs.detail', $blog->slug) }}" class="read-more">
                                            Read More →
                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </section>
    @endif
