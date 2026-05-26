@extends('layouts.master')

@section('title', $exam->name)

@push('css')
    <link rel="stylesheet" href="{{ asset('css/pages/organisation-detail.css') }}">
    <style>
        .exam-hero {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .exam-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.4));
        }

        .exam-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .exam-logo-wrapper {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            flex-shrink: 0;
        }

        .exam-logo-lg {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .section-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f1f1;
        }
    </style>
@endpush

@section('content')
    <div class="exam-detail-wrapper">
        <!-- Hero Section -->
        <div class="exam-hero"
            style="background-image: url('{{ $exam->cover_image ? env('BACKEND_URL') . '/' . $exam->cover_image : asset('images/default-cover.jpg') }}')">
            <div class="container">
                <div class="exam-hero-content">
                    <div class="exam-logo-wrapper">
                        <img src="{{ $exam->logo ? env('BACKEND_URL') . '/' . $exam->logo : asset('images/upsc.jpg') }}"
                            alt="{{ $exam->name }}" class="exam-logo-lg">
                    </div>
                    <div class="exam-info">
                        <h1 class="text-white fw-bold mb-2">{{ $exam->name }}</h1>
                        <p class="text-white-50 mb-0 d-flex align-items-center flex-wrap gap-2">
                            <span><i class="bi bi-tag-fill me-1"></i>{{ $exam->exam_type }}</span>
                            <span class="vr bg-white-50 mx-1"></span>
                            <span class="badge bg-primary">{{ is_array($exam->exam_category) ? implode(', ', $exam->exam_category) : $exam->exam_category }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- About Section -->
                    @if($exam->about_exam)
                        <div class="section-card">
                            <h2 class="section-title">About {{ $exam->short_name ?? $exam->name }}</h2>
                            <div class="text-muted lh-lg">
                                {!! $exam->about_exam !!}
                            </div>
                        </div>
                    @endif

                    <!-- Dynamic Sections -->
                    @foreach($exam->sections as $section)
                        @if($section->status)
                            <div class="section-card">
                                <h2 class="section-title">{{ $section->heading }}</h2>
                                <div class="text-muted lh-lg">
                                    @if(is_array($section->content))
                                        <ul>
                                            @foreach($section->content as $item)
                                                <li>{!! $item !!}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        {!! $section->content !!}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <!-- Sidebar Details -->
                    <div class="section-card">
                        <h2 class="section-title fs-5">Exam Overview</h2>
                        <ul class="list-unstyled mb-0">
                            @if($exam->conducting_body_type)
                                <li class="mb-3">
                                    <strong>Conducting Body Type:</strong><br>
                                    <span class="text-muted">{{ $exam->conducting_body_type }}</span>
                                </li>
                            @endif
                            @if($exam->conducting_authority_name)
                                <li class="mb-3">
                                    <strong>Conducting Authority:</strong><br>
                                    <span class="text-muted">{{ $exam->conducting_authority_name }}</span>
                                </li>
                            @endif
                            @if($exam->exam_frequency)
                                <li class="mb-3">
                                    <strong>Frequency:</strong><br>
                                    <span class="text-muted">{{ $exam->exam_frequency }}</span>
                                </li>
                            @endif
                            @if($exam->official_website)
                                <li>
                                    <strong>Official Website:</strong><br>
                                    <a href="{{ $exam->official_website }}" target="_blank" class="text-decoration-none">{{ $exam->official_website }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
