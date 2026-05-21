@if($site_settings->is_show_full_banner ?? 0)
  {{-- FULL BANNER MODE: Just images, no text --}}
  <section class="hero-section p-0">
    <div class="container-fluid p-0">
      <div class="hero-slider full-banner-mode">
        @forelse($hero_sliders as $slider)
          <div class="banner-item">
            <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}" alt="Hero Image" class="w-100">
          </div>
        @empty
          <div class="banner-item">
            <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" alt="Campus" class="w-100">
          </div>
        @endforelse
      </div>
    </div>
  </section>
@else
  {{-- DYNAMIC TEXT OVERLAY MODE --}}
  <section class="hero-section dynamic-overlay">
    <div class="container">
      <div class="hero-slider dynamic-content-slider">
        @forelse($hero_sliders as $slider)
          <div class="slide-item">
            <div class="row align-items-center gy-4">
              <!-- LEFT CONTENT - Now Dynamic -->
              <div class="col-lg-6">
                <div class="hero-content">
                  <h1 class="main-heading">
                    {!! $slider->heading ?? ($site_settings->hero_title ?? 'Welcome to <span class="theme">' . $site_settings->site_name . '</span>') !!}
                  </h1>
                  <div class="hero-description mb-4">
                    {!! $slider->subheading ?? ($site_settings->hero_description ?? '') !!}
                  </div>
                  
                  @if($slider->button_text)
                    <a href="{{ $slider->button_url ?? '#' }}" class="btn btn-theme-one me-2">{{ $slider->button_text }}</a>
                  @else
                    <a href="{{ $site_settings->hero_cta_1_link ?? '#' }}" class="btn btn-theme-one me-2"
                      target="{{ ($site_settings->hero_cta_1_new_tab ?? false) ? '_blank' : '_self' }}">{{ $site_settings->hero_cta_1_text ?? 'Apply Now' }}</a>
                    <a href="{{ $site_settings->hero_cta_2_link ?? '#' }}" class="btn btn-theme-two"
                      target="{{ ($site_settings->hero_cta_2_new_tab ?? false) ? '_blank' : '_self' }}">{{ $site_settings->hero_cta_2_text ?? 'Explore Courses' }}</a>
                  @endif
                </div>
              </div>

              <!-- RIGHT IMAGE -->
              <div class="col-lg-6 text-center">
                <div class="slider-image-wrapper">
                    <img src="{{ env('BACKEND_URL') . '/' . $slider->image_path }}" alt="Hero Image" class="img-fluid rounded-4 shadow">
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="slide-item">
            <div class="row align-items-center gy-4">
              <div class="col-lg-6">
                <div class="hero-content">
                  <h1 class="main-heading">Welcome to <span class="theme">{{ $site_settings->site_name ?? 'Enrollzy' }}</span></h1>
                  <p>Start your learning journey today with our expert-led courses.</p>
                </div>
              </div>
              <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" alt="Campus" class="img-fluid rounded-4 shadow">
              </div>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endif

<style>
.dynamic-overlay .slide-item {
    outline: none;
    padding: 20px 0;
}
.dynamic-overlay .slider-image-wrapper img {
    max-height: 500px;
    width: 100%;
    object-fit: cover;
}
.full-banner-mode .banner-item img {
    height: 90vh;
    object-fit: cover;
}
</style>