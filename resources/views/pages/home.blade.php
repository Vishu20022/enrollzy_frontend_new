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
    @php
        $compData = $organisations->mapWithKeys(function ($org) {
            return [
                $org->id => [
                    'name' => $org->name,
                    'courses' => $org->courses->map(function ($c) {
                        return [
                            'id' => $c->id,
                            'name' => $c->course->name ?? 'N/A',
                            'fee' => $c->fees ?? 'N/A',
                            'mode' => $c->mode ?? 'N/A',
                            'duration' => $c->duration ?? 'N/A',
                            'rating' => $c->rating ?? 0,
                            'placement' => strip_tags($c->placement_details) ?: 'N/A',
                            'eligibility' => strip_tags($c->eligibility) ?: 'N/A',
                            'admission' => strip_tags($c->admission_process) ?: 'N/A',
                            'roi' => $c->roi ?: 'N/A',
                            'industrial' => strip_tags($c->industrial_collaboration) ?: 'N/A',
                            'internship' => $c->internship_ranking ?: 'N/A',
                        ];
                    }),
                ],
            ];
        });
    @endphp
    <script>
        window.enrollzyOrgData = @json($compData);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.org-selector, .course-selector').select2({
                width: '100%'
            });

            // Bridge Select2 changes back to native change event so home.js triggers
            $('.org-selector, .course-selector').on('select2:select', function (e) {
                this.dispatchEvent(new Event('change'));
            });
        });
    </script>
@endpush
