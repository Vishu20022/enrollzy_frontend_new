@extends('layouts.master')

@section('title', 'Community Discussion - College Website')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/community/community.css') }}">
@endpush

@section('content')
<section class="discussion-detail py-5 bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <a href="{{ route('pages.students.community') }}" class="text-decoration-none text-muted mb-4 d-inline-block">
                    <i class="fas fa-arrow-left me-1"></i> Back to Community
                </a>

                <!-- Main Question -->
                <div class="card border-0 shadow-sm mb-5 main-question-card">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="user-avatar bg-theme-light rounded-circle text-center me-3" style="width: 50px; height:50px; line-height:50px; font-size: 1.2rem;">
                                {{ substr($question->user->name, 0, 1) }}
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold fs-5">{{ $question->user->name }}</h6>
                                <span class="text-muted small">{{ $question->created_at->format('M d, Y - h:i A') }} • {{ $question->category->name }}</span>
                            </div>
                            <div class="ms-auto engagement-meta text-muted small">
                                <span class="me-3"><i class="far fa-eye me-1"></i> {{ $question->views }}</span>
                                <span><i class="far fa-comment-alt me-1"></i> {{ $question->replies->count() }}</span>
                            </div>
                        </div>

                        <h2 class="fw-bold mb-4 line-height-base">{{ $question->question_text }}</h2>

                        @if($question->image)
                        <div class="question-image-detail mb-4 rounded overflow-hidden shadow-sm">
                            <img src="{{ asset($question->image) }}" class="img-fluid w-100" alt="Question Image">
                        </div>
                        @endif

                        <div class="engagement-actions border-top pt-4 mt-4 d-flex">
                            <button class="btn btn-outline-theme toggle-like" data-id="{{ $question->id }}" data-type="question">
                                <i class="far fa-thumbs-up me-1"></i> <span>Like</span> (<span class="like-count">{{ $question->likes->count() }}</span>)
                            </button>
                            <button class="btn btn-theme-one ms-3 px-4" onclick="document.getElementById('replyBox').focus();">
                                <i class="fas fa-reply me-1"></i> Reply to Question
                            </button>
                            <button class="btn btn-outline-secondary ms-auto">
                                <i class="fas fa-share-alt"></i> Share
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Replies Section -->
                <div class="replies-header mb-4 d-flex align-items-center">
                    <h4 class="fw-bold mb-0">Discussions</h4>
                    <span class="ms-2 badge bg-theme-one">{{ $question->replies->count() }}</span>
                </div>

                <!-- Reply Input -->
                <div class="card border-0 shadow-sm mb-5 p-4">
                    <div class="d-flex">
                        <div class="user-avatar bg-theme-light rounded-circle text-center me-3 flex-shrink-0" style="width: 40px; height:40px; line-height:40px;">
                            {{ Auth::check() ? substr(Auth::user()->name, 0, 1) : '?' }}
                        </div>
                        <div class="flex-grow-1">
                            <textarea id="replyBox" class="form-control border-0 bg-light p-3" rows="3" placeholder="{{ Auth::check() ? 'Write your reply here...' : 'Please login to join the discussion' }}" {{ !Auth::check() ? 'disabled' : '' }}></textarea>
                            <div class="text-end mt-3">
                                <button class="btn btn-theme-one px-4 submit-reply" data-question-id="{{ $question->id }}">Post Reply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Threaded List -->
                <div class="replies-list pb-5">
                    @foreach($question->replies as $reply)
                        @include('community.partials.reply_item', ['reply' => $reply])
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Like Toggle
    $(document).on('click', '.toggle-like', function() {
        let btn = $(this);
        let id = btn.data('id');
        let type = btn.data('type');

        $.ajax({
            url: "{{ route('community.like') }}",
            type: "POST",
            data: { _token: "{{ csrf_token() }}", id: id, type: type },
            success: function(res) {
                if(res.success) {
                    btn.find('.like-count').text(res.count);
                    if(res.liked) {
                        btn.addClass('active btn-primary').removeClass('btn-outline-theme');
                        btn.find('i').removeClass('far').addClass('fas');
                    } else {
                        btn.removeClass('active btn-primary').addClass('btn-outline-theme');
                        btn.find('i').removeClass('fas').addClass('far');
                    }
                }
            },
            error: function() {
                alert('Please login to like this!');
            }
        });
    });

    // Store Reply
    $(document).on('click', '.submit-reply', function() {
        let container = $(this).closest('.flex-grow-1');
        let textarea = container.find('textarea');
        let content = textarea.val();
        let questionId = $(this).data('question-id');
        let parentId = $(this).data('parent-id') || null;

        if(!content) return;

        $.ajax({
            url: "{{ route('community.reply') }}",
            type: "POST",
            data: { 
                _token: "{{ csrf_token() }}", 
                question_id: questionId, 
                parent_id: parentId,
                content: content 
            },
            success: function(res) {
                if(res.success) {
                    location.reload(); // Quick fix for hierarchical placement
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Toggle Reply Box for comments
    $(document).on('click', '.reply-trigger', function() {
        $(this).closest('.comment-content').find('.reply-form-wrap').toggleClass('d-none');
    });
});
</script>
@endpush
