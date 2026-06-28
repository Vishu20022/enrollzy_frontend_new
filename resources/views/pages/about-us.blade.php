@extends('layouts.master')

@section('title', 'About Us | Enrollzy')

@section('content')

@php
    $defaultSections = ['hero', 'story', 'core_values', 'offers', 'features', 'impacts', 'founders', 'teams', 'advisory_board', 'cta'];
    $sectionOrders = $page->section_orders ?? $defaultSections;
@endphp

@foreach($sectionOrders as $section)
    @if(view()->exists("pages.about-us-sections.{$section}"))
        @include("pages.about-us-sections.{$section}")
    @endif
@endforeach

@endsection

@push('css')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    /* Typography */
    body {
        font-family: 'Inter', sans-serif;
    }
    
    /* Animations */
    .fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    .delay-0 { animation-delay: 0s; }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Cards */
    .offer-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .offer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.05) !important;
    }
    
    .feature-item {
        transition: transform 0.3s ease;
    }
    .feature-item:hover {
        transform: translateY(-3px);
    }
    
    .social-btn:hover {
        background-color: #163c97 !important;
        color: #ffffff !important;
        transform: translateY(-2px);
    }
    
    /* Utilities */
    .tracking-wider {
        letter-spacing: 0.05em;
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function(){
        $('.team-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
@endpush
