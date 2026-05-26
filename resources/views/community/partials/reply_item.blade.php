<div class="comment-item mt-3 p-3 bg-light rounded shadow-sm border-start border-4 border-theme-one" style="margin-left: {{ $reply->parent_id ? '30px' : '0px' }};">
    <div class="d-flex align-items-center mb-2">
        <div class="user-avatar bg-theme-one-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px; background: #eef1f6; color: var(--theme-one); font-weight: bold; font-size: 12px;">
            {{ substr($reply->user->name, 0, 1) }}
        </div>
        <div>
            <h6 class="mb-0 small fw-bold d-inline">{{ $reply->user->name }}</h6>
            @if($reply->status == 'pending')
                <span class="badge bg-warning text-dark ms-2" style="font-size: 9px;">Pending</span>
            @elseif($reply->status == 'rejected')
                <span class="badge bg-danger ms-2" style="font-size: 9px;">Rejected</span>
            @endif
            <br>
            <span class="text-muted" style="font-size: 10px;">{{ $reply->created_at->diffForHumans() }}</span>
        </div>
        
        <div class="ms-auto d-flex align-items-center">
             <button class="btn btn-link p-0 text-muted text-decoration-none small me-2 like-btn {{ Auth::check() && $reply->likes->where('user_id', Auth::id())->count() ? 'active' : '' }}" 
                    data-id="{{ $reply->id }}" data-type="reply"
                    style="font-size: 11px; {{ Auth::check() && $reply->likes->where('user_id', Auth::id())->count() ? 'color: var(--theme-one);' : '' }}">
                👍 <span class="like-count">{{ $reply->likes->count() }}</span>
            </button>
            @auth
            <button class="btn btn-link p-0 text-muted text-decoration-none small reply-trigger" style="font-size: 11px;">
                💬 Reply
            </button>
            @endauth
        </div>
    </div>
    
    <p class="mb-2 text-dark small">{{ $reply->content }}</p>

    @if($reply->image)
    <div class="mb-2">
        <img src="{{ env('APP_ENV') == 'local' ? 'http://127.0.0.1:8000' : 'https://enrollzy.com' }}/{{ ltrim($reply->image, '/') }}" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
    </div>
    @endif

    <!-- Nested Reply Form -->
    <div class="reply-form-wrap mt-2 d-none">
        <div class="d-flex align-items-center mb-2">
            <input type="text" class="form-control form-control-sm comment-input me-2" placeholder="Reply to {{ $reply->user->name }}...">
            <label class="btn btn-outline-secondary btn-sm mb-0 d-flex align-items-center justify-content-center" style="width: 32px; height: 31px; cursor: pointer;" title="Attach Image">
                <i class="fas fa-image"></i>
                <input type="file" class="d-none reply-image-input" accept="image/*">
            </label>
            <button class="btn btn-sm btn-theme-two ms-2 add-comment-btn" 
                    data-question-id="{{ $reply->question_id }}" 
                    data-parent-id="{{ $reply->id }}">
                Post
            </button>
        </div>
        <div class="reply-image-preview mt-2 d-none">
            <img src="" class="img-thumbnail" style="max-height: 80px;">
            <button class="btn btn-sm btn-danger remove-reply-image ms-2"><i class="fas fa-times"></i></button>
        </div>
    </div>

    <!-- Recursive Children -->
    @if($reply->replies->count() > 0)
        <div class="children mt-2">
            @foreach($reply->replies as $child)
                @include('community.partials.reply_item', ['reply' => $child])
            @endforeach
        </div>
    @endif
</div>
