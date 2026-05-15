<section class="noteworthy-mentions">
    <div class="container">
        <!-- Noteworthy Mentions -->
        <h2 class="main-heading"><span class="theme">Noteworthy</span> Mentions</h2>

        <div class="row g-4">
            @foreach ($noteworthy_categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="info-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <strong>{{ $category->name }}</strong>
                            <a href="#" class="text-primary small">→</a>
                        </div>

                        @foreach ($category->mentions as $mention)
                            @if($mention->url)
                                <a href="{{ $mention->url }}" class="text-style-none">
                            @endif
                            <div class="d-flex gap-3 mb-3 align-items-start anim-card">
                                @if($mention->image)
                                    <img src="{{ env('BACKEND_URL') . '/' . $mention->image }}" alt="{{ $mention->title }}">
                                @endif
                                <div>
                                    <div class="card-title">
                                        {{ $mention->title }}
                                    </div>
                                    <div class="card-sub">
                                        <span>{{ $mention->subtitle }}</span>
                                        @if($mention->badge_text)
                                            <span class="extra">{{ $mention->badge_text }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($mention->url)
                                </a>
                            @endif
                        @endforeach

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
