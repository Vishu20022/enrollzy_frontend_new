@extends('layouts.master')

@section('title', 'Community')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/community/intro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/community/multiple-department.css') }}">
    <link rel="stylesheet" href="{{ asset('css/community/post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/community/community.css') }}">
@endpush

@section('content')
    <section>
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show container mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @include('community.intro')
            @include('community.multiple-department')
            @include('community.post')
        </div>
    </section>

    <!-- Ask Question Modal -->
    <div class="modal fade" id="askQuestionModal" tabindex="-1" aria-labelledby="askQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
                <div class="modal-header border-0 p-4 pb-2">
                    <div>
                        <h5 class="modal-title fw-bold" id="askQuestionModalLabel">Ask a Question</h5>
                        <p class="text-muted small mb-0">Share your thoughts with the community</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('community.questions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 pt-1">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Select Category</label>
                            <select name="category_id" class="form-select rounded-3 shadow-sm border-light-subtle" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Your Question</label>
                            <textarea name="question_text" class="form-control rounded-3 shadow-sm border-light-subtle" rows="5" placeholder="Type your question here... Please be specific." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Image (Optional)</label>
                            <input type="file" name="image" class="form-control rounded-3 shadow-sm border-light-subtle" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4 pt-0">
                        <button type="submit" class="btn btn-theme-one px-5 py-2 rounded-pill shadow-sm fw-bold">Post Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{ asset('js/student-community.js') }}"></script>
    <script src="{{ asset('js/multiple-department.js') }}"></script>
@endpush