<section class="community-posts" id="posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row g-4">
                    @forelse($questions as $question)
                    <div class="col-12">
                        <div class="post-card">

                            <!-- Header -->
                            <div class="post-header justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar bg-theme-one-light rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background: #eef1f6; color: var(--theme-one); font-weight: bold;">
                                        {{ substr($question->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $question->user->name }}</h6>
                                        <span class="text-muted small">#{{ $question->category->name }}</span>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="review text-muted small">#{{ $question->views }} Views</h6>
                                </div>
                            </div>

                            <!-- Content -->
                            <p class="post-text mt-3">
                                {{ $question->question_text }}
                            </p>
                            
                            @if($question->image)
                            <img src="{{ asset($question->image) }}" class="post-img mt-2 rounded shadow-sm">
                            @endif

                            <!-- Actions -->
                            <div class="post-actions mt-3 pt-3 border-top">
                                <button class="like-btn {{ Auth::check() && $question->likes->where('user_id', Auth::id())->count() ? 'active' : '' }}" 
                                        data-id="{{ $question->id }}" data-type="question"
                                        style="{{ Auth::check() && $question->likes->where('user_id', Auth::id())->count() ? 'color: var(--theme-one);' : '' }}">
                                    👍 Like <span class="like-count">{{ $question->likes->count() }}</span>
                                </button>

                                <button class="comment-toggle">
                                    💬 Comment ({{ $question->replies->count() }})
                                </button>

                                <button>
                                    🔗 Share
                                </button>
                            </div>

                            <!-- Add Comment -->
                            <div class="add-comment d-none mt-3">
                                <input type="text" class="form-control comment-input"
                                    placeholder="{{ Auth::check() ? 'Write a comment...' : 'Please login to comment' }}"
                                    {{ !Auth::check() ? 'disabled' : '' }}>

                                @auth
                                <button class="btn btn-theme-two btn-sm mt-3 add-comment-btn" 
                                        data-question-id="{{ $question->id }}">
                                    Post
                                </button>
                                @else
                                <a href="{{ route('login-otp') }}" class="btn btn-theme-two btn-sm mt-3">Login to Post</a>
                                @endauth
                            </div>

                            <!-- 🔥 COMMENTS CONTAINER -->
                            <div class="comments mt-4">
                                @foreach($question->replies->whereNull('parent_id') as $reply)
                                    @include('community.partials.reply_item', ['reply' => $reply])
                                @endforeach
                            </div>

                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/no-search-result-find-illustration-download-in-svg-png-gif-formats--empty-not-found-box-pack-user-interface-illustrations-4752613.png" style="max-height: 200px;" class="mb-3">
                        <h4 class="text-muted">No discussions found yet!</h4>
                        <p>Be the first to ask something in this category.</p>
                    </div>
                    @endforelse

                    <div class="col-12 mt-4">
                        {{ $questions->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="community-sidebar">

                    {{-- Top Contributors --}}
                    <div class="sidebar-card contributors-card">
                        <h5 class="sidebar-title">Top Contributors</h5>

                        <ul class="contributors-list">
                            @foreach($topContributors as $contributor)
                            <li>
                                <div class="user-avatar bg-theme-one-light rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background: #eef1f6; color: var(--theme-one); font-weight: bold;">
                                    {{ substr($contributor->name, 0, 1) }}
                                </div>
                                <div>
                                    <strong>{{ $contributor->name }}</strong>
                                    <span>Helped: {{ $contributor->community_questions_count + $contributor->community_replies_count }} Students</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Applications Open --}}
                    <div class="sidebar-card applications-card">
                        <h5 class="sidebar-title text-center">
                            Applications for Admissions are open.
                        </h5>

                        @foreach($applications as $app)
                        <div class="application-item">
                            @if($app->logo_url)
                            <img src="{{ asset($app->logo_url) }}" alt="{{ $app->name }}">
                            @else
                            <div class="bg-light rounded p-2 text-center d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-weight: bold; color: #ccc;">U</div>
                            @endif
                            <div class="info">
                                <strong>{{ $app->name }}</strong>
                                <p>Admissions 2026</p>
                            </div>
                            <a href="{{ route('pages.organisations.detail', $app->slug) }}" class="btn btn-apply">Apply</a>
                        </div>
                        @endforeach
                    </div>

                    {{-- Filters --}}
                    <div class="sidebar-card filter-card">
                        <div class="filter-head">
                            <h5>Trending Tags</h5>
                            <a href="#">Clear All</a>
                        </div>

                        <div class="filter-tags">
                            @foreach($categories as $cat)
                                <a href="{{ route('pages.students.community', ['category' => $cat->slug]) }}" class="text-decoration-none">
                                    <span># {{ $cat->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
