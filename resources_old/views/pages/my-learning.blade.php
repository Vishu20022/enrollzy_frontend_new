@extends('layouts.master')

@section('title', 'My-Learning')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/page-banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-learning/learning-overview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-learning/my-courses.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-learning/learning-progress.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-learning/assignment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-learning/learning-resource.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-learning/certificates.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/faqs.css') }}">
@endpush

@section('content')
    <section>
        <div class="container-fluid">
            @include('common.page-banner')
            @include('my-learning.learning-overview')
            @include('my-learning.my-courses')
            @include('my-learning.learning-progress')
            @include('my-learning.assignments')
            @include('my-learning.certificates')
            @include('my-learning.learning-resource')
            @include('common.faq')
        </div>
    </section>
@endsection

