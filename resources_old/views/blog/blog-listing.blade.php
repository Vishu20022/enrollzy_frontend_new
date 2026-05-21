@extends('layouts.master')

@section('title', 'Latest Blogs')

@push('css')
<style>
    .blog-section { padding: 80px 0; background: #f9f9f9; }
    .blog-card { background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; margin-bottom: 30px; height: 100%; display: flex; flex-direction: column; }
    .blog-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.1); }
    .blog-img { height: 200px; overflow: hidden; }
    .blog-img img { width: 100%; height: 100%; object-fit: cover; }
    .blog-content { padding: 25px; flex-grow: 1; display: flex; flex-direction: column; }
    .blog-content h4 { font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #1a1a1a; line-height: 1.4; }
    .blog-content p { color: #666; font-size: 15px; margin-bottom: 20px; flex-grow: 1; }
    .read-more { color: var(--theme-color); font-weight: 700; text-decoration: none; display: flex; align-items: center; margin-bottom: 20px; }
    .read-more:hover { color: #000; }
    .blog-meta { padding-top: 15px; border-top: 1px solid #eee; font-size: 13px; color: #999; }
</style>
@endpush

@section('content')
<section class="blog-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="main-heading">
                <span class="theme">Explore</span> Our Insights
            </h2>
            <p class="text-muted">Stay updated with the latest news, guides, and stories from our college.</p>
        </div>

        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img">
                            @php
                                $imgUrl = (str_starts_with($blog->image, 'http')) ? $blog->image : asset($blog->image);
                            @endphp
                            <img src="{{ $imgUrl }}" alt="{{ $blog->title }}">
                        </div>

                        <div class="blog-content">
                            <span class="badge bg-primary-subtle text-primary border-primary-subtle rounded-pill small mb-2" style="width: fit-content;">
                                {{ $blog->category->name ?? 'Update' }}
                            </span>
                            <h4>{{ $blog->title }}</h4>

                            <p>
                                {{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 120) }}
                            </p>

                            <a href="{{ route('pages.blogs.detail', $blog->slug) }}" class="read-more">
                                Read more <i class="fas fa-arrow-right ms-2"></i>
                            </a>

                            <div class="blog-meta d-flex justify-content-between">
                                <span><i class="far fa-user me-1"></i> {{ $blog->author }}</span>
                                <span><i class="far fa-calendar-alt me-1"></i> {{ $blog->created_at->format('d M, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="mb-3 text-muted" style="font-size: 40px;"><i class="fas fa-folder-open"></i></div>
                    <h4>No blogs found.</h4>
                    <p>Check back later for fresh content!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
