@extends('layouts.master')

@section('title', 'Home')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .marquee-container {
            width: 100%;
            overflow: hidden;
            background: #fff;
            padding: 20px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .marquee-track {
            display: flex;
            width: fit-content;
            animation: scrollMarquee 30s linear infinite;
            align-items: center;
        }
        .marquee-item {
            width: 200px;
            flex-shrink: 0;
            padding: 0 30px;
            text-align: center;
        }
        .marquee-item img {
            max-width: 100%;
            max-height: 70px;
            object-fit: contain;
            filter: grayscale(100%);
            transition: 0.3s all ease;
        }
        .marquee-item img:hover {
            filter: grayscale(0%);
            transform: scale(1.1);
        }
        @keyframes scrollMarquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
@endpush

@section('content')

    @foreach($homepage_sections as $section)
        @if(view()->exists('pages.home-sections.' . $section->section_key))
            @include('pages.home-sections.' . $section->section_key)
        @endif
    @endforeach

    @if(view()->exists('pages.home-sections.exams'))
        @include('pages.home-sections.exams')
    @endif
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/home.js') }}?v={{ time() }}"></script>
@endpush
