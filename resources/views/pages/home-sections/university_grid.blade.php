    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                {!! $section->title ?? 'Featured University' !!}
            </h2>

            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
        @else
            <p class="featured-desc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
            </p>
        @endif

            <div class="title-line"></div>

        </div>

    </section>


    <section class="university-section ">

        <div class="container">

            <div class="row g-4 justify-content-center">

                @foreach ($organisations->take(12) as $org)
                
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="{{ route('pages.organisations.detail', $org->slug) }}" 
                           class="text-decoration-none uni-card {{ $org->logo_url ? 'rounded-circle' : '' }}"
                            @if ($org->logo_url)
                                style="background-image: url('{{ env('BACKEND_URL') . '/' . $org->logo_url }}'); background-size: cover; background-position: center; background-repeat: no-repeat; aspect-ratio: 1/1;"
                            @endif
                        >
                            @if (!$org->logo_url)
                                <span class="fw-bold text-center px-2 w-100"
                                    style="font-size: 13px; color: #333;">{{ $org->name }}</span>
                            @endif
                        </a>
                    </div>
                @endforeach

            </div>


            <div class="text-center">
                <a href="{{ $section->cta_url ?? route('pages.organisations') }}"
                    class="btn-theme-1 mt-3 text-decoration-none d-inline-block text-center pt-2">
                {{ $section->cta_title ?? 'View More' }}
            </a>
            </div>
        </div>

    </section>

    </section>
