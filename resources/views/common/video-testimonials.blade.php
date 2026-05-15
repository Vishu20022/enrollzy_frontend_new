<section class="video-testimonial-section py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold main-heading"><span class="theme">Video</span> Testimonials</h2>
            <p class="text-muted">
                Real stories from students who transformed their careers
            </p>
        </div>

        <!-- Slider -->
        <div class="video-slider">
            @forelse($video_testimonials as $video)
                <div class="video-slide">
                    <div class="video-card">
                        <div class="video-thumb"
                             style="background-image:url('{{ env('BACKEND_URL') . '/' . $video->thumbnail }}')">
                            <a href="{{ $video->video_url }}" target="_blank" class="play-btn">
                                ▶
                            </a>
                        </div>

                        <div class="video-info">
                            <h6>{{ $video->name }}</h6>
                            <span>{{ $video->course }}</span>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Fallback placeholders if needed, or keep empty --}}
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Stay tuned for inspiring student stories!</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@push('js')
   <script>
$(document).ready(function () {
  $('.video-slider').slick({
    arrows: true,
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: { slidesToShow: 3 }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2 }
      },
      {
        breakpoint: 500,
        settings: { slidesToShow: 1 }
      }
    ]
  });
});
</script>

@endpush