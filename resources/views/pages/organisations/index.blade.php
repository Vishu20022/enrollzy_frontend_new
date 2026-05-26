@extends('layouts.master')

@section('title', 'Featured Universities')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .page-header {
            background-color: #f8f9fa;
            padding: 60px 0 40px;
            margin-bottom: 40px;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="main-heading">All Featured Universities</h1>
            <p class="text-muted mt-3">Explore our complete list of partner universities and institutions.</p>
        </div>
    </div>

    <section class="university-section pt-0">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach ($organisations as $org)
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="{{ route('pages.organisations.detail', $org->slug) }}" 
                           class="text-decoration-none uni-card d-block"
                            @if ($org->logo_url)
                                style="background-image: url('{{ env('BACKEND_URL') . '/' . $org->logo_url }}'); background-size: contain; background-position: center; background-repeat: no-repeat;"
                            @endif
                        >
                            @if (!$org->logo_url)
                                <span class="fw-bold text-center px-2 w-100 d-flex align-items-center justify-content-center"
                                    style="font-size: 14px; color: #333; min-height: 80px;">{{ $org->name }}</span>
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
