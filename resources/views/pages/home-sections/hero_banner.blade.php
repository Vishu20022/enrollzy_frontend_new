    <section class="hero-slider pt-0">
        <div class="container-fluid pt-0 pb-4" style="padding-left: 10%; padding-right: 10%;">

            <div id="heroCarousel" class="carousel slide rounded-4 overflow-hidden shadow" data-bs-ride="carousel" data-bs-interval="3000">

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
                                alt="{{ $slider->heading ?? 'banner' }}" class="d-block w-100">
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img src="{{ asset('images/bannertest.png') }}" alt="banner" class="d-block w-100">
                        </div>
                    @endforelse
                </div>

            </div>

        </div>
    </section>


