@extends('layouts.master')

@section('title', $pageTitle ?? 'Organisations')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ date('YmdHis') }}">
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
            <h1 class="main-heading">All Exams</h1>
            <p class="text-muted mt-3">Explore our complete list of competitive exams.</p>
        </div>
    </div>

    <section class="exam-section pt-5 position-relative">
        <div class="container">
            <div class="premium-grid-wrapper">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center g-4">
                    @foreach ($exams as $exam)
                        <div class="col">
                            <a href="{{ route('pages.exams.detail', $exam->slug) }}" class="text-decoration-none">
                                <div class="exam-card">

                                    <div class="exam-icon">
                                        <img src="{{ $exam->logo ? env('BACKEND_URL') . '/' . $exam->logo : asset('images/upsc.jpg') }}" alt="icon">
                                    </div>

                                    <h3 class="text-dark">
                                        {{ $exam->name }}
                                    </h3>

                                    <p class="text-muted">
                                        {{ $exam->exam_type }} | {{ is_array($exam->exam_category) ? implode(', ', $exam->exam_category) : $exam->exam_category }}
                                    </p>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-5 d-flex justify-content-center">
                    {{ $exams->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
