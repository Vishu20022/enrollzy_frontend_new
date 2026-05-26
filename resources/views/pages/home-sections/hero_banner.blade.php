    <section class="hero-slider">
        <div class="container-fluid px-0">

            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

                <!-- indicators -->

                <div class="carousel-indicators">
                    @foreach ($hero_sliders as $index => $slider)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>


                <div class="carousel-inner">
                    @forelse($hero_sliders as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}"
                                alt="{{ $slider->heading ?? 'banner' }}">
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img src="{{ asset('images/bannertest.png') }}" alt="banner">
                        </div>
                    @endforelse
                </div>

            </div>

        </div>
    </section>


