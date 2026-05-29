@extends('layouts.master')

@section('title', $course->name . ' - ' . config('app.name'))

@section('content')
<div class="container my-5 py-5" style="min-height: 60vh;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
            <h1 class="display-4 fw-bold theme mb-3">{{ $course->name }}</h1>
            
            <div class="card shadow-sm mt-4 border-0">
                <div class="card-body p-4">
                    <h5 class="card-title text-secondary mb-4 text-start">Course Details</h5>
                    
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Program Level</strong>
                            <span class="text-muted">{{ $course->programLevel->title ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Stream Offered</strong>
                            <span class="text-muted">{{ $course->streamOffered->title ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Discipline</strong>
                            <span class="text-muted">{{ $course->discipline->title ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Duration</strong>
                            <span class="text-muted">{{ $course->duration ? $course->duration . ' Months' : 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-5">
                <a href="{{ route('pages.home') }}" class="btn btn-primary px-4 py-2" style="background-color: #805CD8; border-color: #805CD8;">Explore More Programs</a>
            </div>
        </div>
    </div>
</div>
@endsection
