@extends('layouts.master')

@section('title', $page->meta_title ?? $page->title)

@section('meta_tags')
@if($page->meta_keywords)
<meta name="keywords" content="{{ $page->meta_keywords }}">
@endif
@if($page->meta_description)
<meta name="description" content="{{ $page->meta_description }}">
@endif
@endsection

@section('content')
<!-- Premium Page Header -->
<section class="premium-page-header position-relative overflow-hidden">
    <!-- Abstract Background Elements -->
    <div class="header-bg-shape shape-1"></div>
    <div class="header-bg-shape shape-2"></div>
    
    <div class="container position-relative z-index-1 text-center">
        <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-medium mb-3 shadow-sm fade-in-up">Legal Information</span>
        <h1 class="display-3 fw-bolder text-white mb-3 fade-in-up delay-1" style="font-family: 'Outfit', sans-serif; letter-spacing: -1px;">{{ $page->title }}</h1>
        
        <nav aria-label="breadcrumb" class="fade-in-up delay-2">
            <ol class="breadcrumb justify-content-center mb-0 custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Premium Page Content -->
<section class="premium-dynamic-content pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card content-card border-0 rounded-4">
                    <div class="card-body p-4 p-md-5 p-lg-5">
                        <div class="content-wrapper custom-editor-content">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('css')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    /* Premium Header Styling */
    .premium-page-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 8rem 0 10rem 0;
        position: relative;
    }
    
    .header-bg-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.5;
        z-index: 0;
    }
    
    .shape-1 {
        width: 400px;
        height: 400px;
        background: #4facfe;
        top: -100px;
        left: -100px;
        animation: float 8s ease-in-out infinite;
    }
    
    .shape-2 {
        width: 300px;
        height: 300px;
        background: #00f2fe;
        bottom: -50px;
        right: -50px;
        animation: float 10s ease-in-out infinite reverse;
    }
    
    @keyframes float {
        0% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-20px) scale(1.05); }
        100% { transform: translateY(0) scale(1); }
    }
    
    /* Breadcrumb */
    .custom-breadcrumb .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .custom-breadcrumb .breadcrumb-item a:hover {
        color: #fff;
    }
    
    .custom-breadcrumb .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .custom-breadcrumb .breadcrumb-item.active {
        color: #fff;
        font-weight: 500;
    }

    /* Content Card overlapping header */
    .premium-dynamic-content {
        margin-top: -6rem;
        position: relative;
        z-index: 10;
        background-color: #f8f9fa;
    }
    
    .content-card {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0,0,0,0.02);
        backdrop-filter: blur(20px);
        transition: transform 0.3s ease;
    }
    
    /* Animations */
    .fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Premium Content Styling */
    .custom-editor-content {
        font-family: 'Inter', sans-serif;
        line-height: 1.85;
        color: #374151;
        font-size: 1.1rem;
    }
    
    .custom-editor-content h1, 
    .custom-editor-content h2, 
    .custom-editor-content h3, 
    .custom-editor-content h4 {
        font-family: 'Outfit', sans-serif;
        color: #111827;
        margin-top: 2.5rem;
        margin-bottom: 1.25rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    
    .custom-editor-content h1 { font-size: 2.25rem; }
    .custom-editor-content h2 { font-size: 1.875rem; border-bottom: 1px solid #e5e7eb; padding-bottom: 0.5rem; }
    .custom-editor-content h3 { font-size: 1.5rem; }
    
    .custom-editor-content p {
        margin-bottom: 1.75rem;
    }
    
    .custom-editor-content ul, 
    .custom-editor-content ol {
        margin-bottom: 1.75rem;
        padding-left: 1.5rem;
    }
    
    .custom-editor-content li {
        margin-bottom: 0.75rem;
        position: relative;
    }
    
    .custom-editor-content a {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        transition: all 0.2s ease;
    }
    
    .custom-editor-content a:hover {
        color: #1d4ed8;
        border-bottom-color: #1d4ed8;
    }
    
    .custom-editor-content blockquote {
        border-left: 4px solid #3b82f6;
        padding: 1.5rem 2rem;
        margin: 2rem 0;
        font-style: italic;
        color: #4b5563;
        background: linear-gradient(to right, rgba(59, 130, 246, 0.05), transparent);
        border-radius: 0 0.5rem 0.5rem 0;
        font-size: 1.15rem;
    }
</style>
@endpush
@endsection
