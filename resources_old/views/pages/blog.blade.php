@extends('layouts.master')

@section('title', 'Blogs')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/common/page-banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/blog-listing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/pagination.css') }}">

@endpush

@section('content')
    <section>
        <div class="container-fluid">
            @include('common.page-banner')
            @include('blog.blog-listing')
            @include('common.pagination')
        </div>
    </section>
@endsection
