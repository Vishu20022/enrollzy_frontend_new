<section class="expert-section">
    <div class="container">

        <!-- Heading -->
        <div class="section-top">
            <div class="badge-text">👋 Say Goodbye to faceless Call Centers</div>
            <h2>Right Guidance from Experts</h2>
            <p>
                College Vidya has a team of 500+ experts assisting students since 2019
                with the right guidance for a successful career ahead.
            </p>
        </div>

        <!-- Slider -->
        <div class="expert-slider">
            @foreach ($experts as $expert)
                <div>
                    <div class="expert-card">
                        <div class="image-wrap skeleton">
                            @php
                                $imgUrl = (str_starts_with($expert->img, 'http')) ? $expert->img : env('BACKEND_URL') . '/' . $expert->img;
                            @endphp
                            <a href="{{ route('pages.experts.detail', $expert->id) }}">
                                <img src="{{ $imgUrl }}" alt="{{ $expert->name }}" loading="lazy">
                            </a>
                            <div class="rating">⭐ {{ $expert->rating }}</div>
                            <div class="count">✔ {{ $expert->count }}</div>
                        </div>

                        <div class="card-body">
                            <h5><a href="{{ route('pages.experts.detail', $expert->id) }}" class="text-decoration-none text-dark">{{ $expert->name }}</a></h5>
                            <div class="meta">{{ $expert->role }} · {{ $expert->degree }}</div>
                            <div class="exp">{{ $expert->exp }}</div>
                            <button type="button" 
                                class="btn btn-sm btn-theme-one btn-book-session" 
                                data-bs-toggle="modal" 
                                data-bs-target="#bookingModal"
                                data-provider-id="{{ $expert->id }}"
                                data-provider-type="expert"
                                data-provider-name="{{ $expert->name }}"
                                data-provider-role="{{ $expert->role }}"
                                data-provider-img="{{ $imgUrl }}">
                                Book Session
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
