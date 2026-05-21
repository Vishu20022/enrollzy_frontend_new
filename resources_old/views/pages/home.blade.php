@extends('layouts.master')

@section('title', 'Home')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home/hero-banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/trending-skills.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/noteworthy-mentions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/expert-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/faqs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/company-marquee.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/organisation-grid.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/home/admission-form.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home/query.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/home/student-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/talk-to-alumni.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/video-testimonials.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/organisation-comparison.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/ques-ans.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/blogs.css') }}">

@endpush

@section('content')
    <section>
        <div class="container-fluid">
            @foreach($homepage_sections as $section)
                @switch($section->section_key)
                    @case('hero_banner')
                        @include('home.hero-banner')
                        @break
                    @case('expert_carousel')
                        @include('home.expert-carousel')
                        @break
                    @case('university_comparison')
                        @include('home.organisation-comparison')
                        @break
                    @case('trending_skills')
                        @include('home.trending-skills')
                        @break
                    @case('noteworthy_mentions')
                        @include('home.noteworthy-mentions')
                        @break
                    @case('faq')
                        @include('common.faq')
                        @break
                    @case('company_marquee')
                        @include('home.company-marquee')
                        @break
                    @case('talk_to_alumni')
                        @include('home.talk-to-alumni')
                        @break
                    @case('university_grid')
                        @include('home.organisation-grid')
                        @break
                    @case('video_testimonials')
                        @include('common.video-testimonials')
                        @break
                    @case('student_form')
                        @include('home.student-form')
                        @break
                    @case('testimonials')
                        @include('home.testimonials')
                        @break
                    @case('blogs')
                        @include('home.blogs')
                        @break
                    @case('ques_ans')
                        @include('home.ques-ans')
                        @break
                    @case('specialized_courses')
                        @include('home.specialized-courses')
                        @break
                    @case('why_choose_us')
                        @include('home.why-choose-us')
                        @break
                @endswitch
            @endforeach
        </div>
    </section>
@endsection
