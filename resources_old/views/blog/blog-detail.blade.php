@extends('layouts.master')

@section('title', $blog->meta_title ?? $blog->title)

@section('seo')
    <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords" content="{{ $blog->meta_keywords }}">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@push('css')
<style>
    .blog-detail-section { padding: 80px 0; background: #fdfdfd; }
    .blog-header { margin-bottom: 40px; }
    .blog-category { color: var(--theme-color); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 14px; }
    .blog-title { font-size: 42px; font-weight: 800; margin: 15px 0; color: #1a1a1a; line-height: 1.2; }
    .blog-meta { color: #888; font-size: 15px; }
    .blog-featured-img { border-radius: 20px; overflow: hidden; margin-bottom: 50px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    .blog-featured-img img { width: 100%; height: auto; display: block; }
    .blog-content { font-size: 18px; line-height: 1.8; color: #444; }
    .blog-content h2, .blog-content h3 { color: #1a1a1a; margin-top: 40px; margin-bottom: 20px; font-weight: 700; }
    .recent-posts-card { background: #fff; border-radius: 15px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .recent-post-item { display: flex; align-items: center; margin-bottom: 20px; text-decoration: none; color: inherit; }
    .recent-post-img { width: 80px; height: 60px; border-radius: 8px; overflow: hidden; margin-right: 15px; flex-shrink: 0; }
    .recent-post-img img { width: 100%; height: 100%; object-fit: cover; }
    .recent-post-info h6 { font-size: 14px; font-weight: 700; margin-bottom: 5px; line-height: 1.4; color: #1a1a1a; }
    .recent-post-info span { font-size: 12px; color: #999; }
    .blog-content blockquote { border-left: 5px solid var(--theme-color); padding: 20px 30px; background: #f9f9f9; font-style: italic; margin: 30px 0; border-radius: 0 10px 10px 0; }
</style>
@endpush

@section('content')
<section class="blog-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-header">
                    <span class="blog-category">{{ $blog->category->name ?? 'Update' }}</span>
                    <h1 class="blog-title">{{ $blog->title }}</h1>
                    <div class="blog-meta">
                        <i class="far fa-user me-1"></i> {{ $blog->author }} 
                        <span class="mx-2">|</span>
                        <i class="far fa-calendar-alt me-1"></i> {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M, Y') : $blog->created_at->format('d M, Y') }}
                    </div>
                </div>

                <div class="blog-featured-img">
                    @php
                        $imgUrl = (str_starts_with($blog->image, 'http')) ? $blog->image : asset($blog->image);
                    @endphp
                    <img src="{{ $imgUrl }}" alt="{{ $blog->title }}">
                </div>

                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="recent-posts-card sticky-top" style="top: 100px;">
                    <h5 class="fw-bold mb-4">Recent Posts</h5>
                    @foreach($recent_blogs as $rb)
                    <a href="{{ route('pages.blogs.detail', $rb->slug) }}" class="recent-post-item">
                        <div class="recent-post-img">
                            @php
                                $rbImg = (str_starts_with($rb->image, 'http')) ? $rb->image : asset($rb->image);
                            @endphp
                            <img src="{{ $rbImg }}" alt="{{ $rb->title }}">
                        </div>
                        <div class="recent-post-info">
                            <h6>{{ Str::limit($rb->title, 45) }}</h6>
                            <span>{{ $rb->created_at->format('d M, Y') }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
