@extends('layouts.master')

@section('title', 'Featured Universities')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .premium-header {
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            padding: 80px 0 100px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .premium-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 60%);
            transform: rotate(45deg);
        }
        .premium-header .main-heading {
            color: #ffffff !important;
            font-size: 3.5rem;
            font-weight: 800;
            text-shadow: 0 4px 20px rgba(0,0,0,0.4);
            position: relative;
            z-index: 2;
        }
        .premium-header .text-muted {
            color: #cbd5e1 !important;
            font-size: 1.25rem;
            position: relative;
            z-index: 2;
        }

        .premium-grid-wrapper {
            background: #ffffff;
            border-radius: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
            padding: 60px 40px;
            margin-top: -60px; /* Pull grid up into the header */
            position: relative;
            z-index: 10;
        }

        .premium-org-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
            width: 100%;
            max-width: 150px;
            margin: 0 auto;
            position: relative;
        }
        
        .premium-org-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,0.04);
        }

        .premium-org-card:hover {
            transform: translateY(-12px) scale(1.08);
            box-shadow: 0 25px 45px rgba(22, 60, 151, 0.18);
            border-color: rgba(22, 60, 151, 0.1);
        }

        .page-wrapper-bg {
            background-color: #f8fafc;
            padding-bottom: 100px;
            min-height: 100vh;
        }
        
        @media(max-width: 768px) {
            .premium-header { padding: 60px 0 80px; }
            .premium-header .main-heading { font-size: 2.2rem; }
            .premium-grid-wrapper { padding: 40px 20px; border-radius: 25px; }
        }
    </style>
@endpush

@section('content')
<div class="page-wrapper-bg">
    <div class="premium-header">
        <div class="container">
            <h1 class="main-heading">All Featured Universities</h1>
            <p class="text-muted mt-3">Explore our complete list of partner universities and institutions driving global education.</p>
        </div>
    </div>

    <section class="pt-0 position-relative">
        <div class="container">
            <div class="premium-grid-wrapper">
                <div class="row g-5 justify-content-center align-items-center">
                    @foreach ($organisations as $org)
                        <div class="col-lg-2 col-md-3 col-6">
                            <a href="{{ route('pages.organisations.detail', $org->slug) }}" 
                               class="text-decoration-none uni-card premium-org-card {{ $org->logo_url ? 'rounded-circle' : 'rounded-circle' }}"
                                @if ($org->logo_url)
                                    style="background-image: url('{{ env('BACKEND_URL') . '/' . $org->logo_url }}'); background-size: cover; background-position: center; background-repeat: no-repeat; aspect-ratio: 1/1;"
                                @else
                                    style="aspect-ratio: 1/1; background: #f1f5f9; display: flex; align-items: center;"
                                @endif
                            >
                                @if (!$org->logo_url)
                                    <span class="fw-bold text-center px-3 w-100"
                                        style="font-size: 12px; color: #334155; line-height: 1.4;">{{ $org->name }}</span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
