@extends('layouts.master')

@section('title', 'Student Community - College Website')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/community/community.css') }}">
@endpush

@section('content')
<section class="community-hero py-5">
    <div class="container text-center py-4">
        <h1 class="display-4 fw-bold mb-3">Student Community</h1>
        <p class="lead mb-4">Ask questions, share experiences, and learn from fellow students and experts.</p>
        <div class="search-bar-wrap mx-auto" style="max-width: 600px;">
            <form action="{{ route('pages.students.community') }}" method="GET">
                <div class="input-group input-group-lg shadow-sm">
                    <input type="text" name="search" class="form-control" placeholder="Search for questions..." value="{{ request('search') }}">
                    <button class="btn btn-theme-one px-4" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="community-main py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Categories</h5>
                        <ul class="list-unstyled category-list">
                            <li><a href="{{ route('pages.students.community') }}" class="py-2 d-block {{ !request('category') ? 'text-primary fw-bold' : 'text-muted' }}">All Questions</a></li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('pages.students.community', ['category' => $category->slug]) }}" 
                                   class="py-2 d-block {{ request('category') == $category->slug ? 'text-primary fw-bold' : 'text-muted' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        
                        @auth
                            <button class="btn btn-theme-one w-100 mt-4 py-2" data-bs-toggle="modal" data-bs-target="#askQuestionModal">
                                Ask A Question
                            </button>
                        @else
                            <a href="{{ route('login-otp') }}" class="btn btn-theme-one w-100 mt-4 py-2">
                                Login to Ask
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Feed -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">
                        @if(request('category'))
                            {{ $categories->firstWhere('slug', request('category'))->name }}
                        @else
                            Recent Questions
                        @endif
                    </h4>
                </div>

                <div class="questions-list g-4">
                    @forelse($questions as $question)
                    <div class="card border-0 shadow-sm mb-4 question-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="user-avatar bg-theme-light rounded-circle text-center me-2" style="width: 32px; height:32px; line-height:32px;">
                                    {{ substr($question->user->name, 0, 1) }}
                                </div>
                                <span class="fw-bold me-2">{{ $question->user->name }}</span>
                                <span class="text-muted small">{{ $question->created_at->diffForHumans() }}</span>
                                <span class="badge bg-light text-dark ms-auto">{{ $question->category->name }}</span>
                            </div>

                            <a href="{{ route('pages.community.show', $question->id) }}" class="text-decoration-none text-dark">
                                <h5 class="fw-bold mb-3">{{ $question->question_text }}</h5>
                            </a>

                            @if($question->image)
                            <div class="question-img mb-3 rounded overflow-hidden">
                                <img src="{{ asset($question->image) }}" class="img-fluid" alt="Question Image">
                            </div>
                            @endif

                            <div class="d-flex align-items-center engagement-bar border-top pt-3 mt-3">
                                <button class="btn btn-link text-muted text-decoration-none me-4">
                                    <i class="far fa-eye me-1"></i> {{ $question->views }} Views
                                </button>
                                <button class="btn btn-link text-muted text-decoration-none me-4">
                                    <i class="far fa-comment-alt me-1"></i> {{ $question->replies()->count() }} Replies
                                </button>
                                <a href="{{ route('pages.community.show', $question->id) }}" class="btn btn-theme-one btn-sm ms-auto">View Discussion</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-5">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/no-search-result-find-illustration-download-in-svg-png-gif-formats--empty-not-found-box-pack-user-interface-illustrations-4752613.png" style="max-height: 200px;" class="mb-3">
                        <h4 class="text-muted">No questions found!</h4>
                        <p>Be the first to ask something in this category.</p>
                    </div>
                    @endforelse

                    <div class="pagination-wrap mt-5">
                        {{ $questions->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ask Question Modal -->
<div class="modal fade" id="askQuestionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Ask a Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('community.questions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Your Question</label>
                        <textarea name="question_text" class="form-control" rows="5" placeholder="Type your question here... Please be specific." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Image (Optional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="btn btn-theme-one px-4">Post Question</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
