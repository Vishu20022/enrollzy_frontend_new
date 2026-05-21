@extends('layouts.master')

@section('title', 'Degrees')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/page-banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/degree/degree-cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/degree/program-level.css') }}">
    <link rel="stylesheet" href="{{ asset('css/degree/browse-category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/degree/faculty-cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/degree/career-options.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/faqs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/degree/admission.css') }}">
@endpush

@section('content')
    <section>
        <div class="container-fluid">
            @include('common.page-banner')
            @include('degree.degree-cards')
            @include('common.pagination')
            @include('degree.program-level')
            @include('degree.browse-category')
            @include('degree.faculty-cards')
            @include('degree.career')
            @include('common.faq')
            @include('degree.admission')
        </div>
    </section>
@endsection


@push('js')
    <script src="{{asset('js/degree-card.js')}}"></script>
@endpush