    <section class="testimonial-section-new py-5" style="background-color: #fffdfa;">
        <div class="container pb-4">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #ea580c;"></span>
                    <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                        {!! $section->title ?? 'Testimonials' !!}
                    </h2>
                    <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #ea580c;"></span>
                </div>
                <p class="text-muted mx-auto" style="max-width: 700px; font-size: 15px;">
                    What our students and parents have to say about their experience with us.
                </p>
            </div>



            <div class="swiper testimonialSwiper">

                <div class="swiper-wrapper">

                    @forelse($video_testimonials as $video)
                        @php
                            $url = $video->video_url;
                            $isYoutube = false;
                            $youtubeId = '';
                            
                            // Check if YouTube
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                                $isYoutube = true;
                                $youtubeId = $match[1];
                            }
                            
                            $params = [];
                            if ($video->autoplay) {
                                $params['autoplay'] = '1';
                            }
                            if ($video->muted) {
                                $params['mute'] = '1';
                                $params['muted'] = '1';
                            }
                            if ($isYoutube && $video->autoplay) {
                                $params['controls'] = '0';
                                $params['loop'] = '1';
                                $params['playlist'] = $youtubeId;
                                $params['playsinline'] = '1';
                            }
                            
                            $finalUrl = $url;
                            if ($isYoutube) {
                                $finalUrl = "https://www.youtube.com/embed/{$youtubeId}?" . http_build_query($params);
                            } else {
                                if (!empty($params)) {
                                    $finalUrl .= (parse_url($finalUrl, PHP_URL_QUERY) ? '&' : '?') . http_build_query($params);
                                }
                            }
                        @endphp
                        <div class="swiper-slide">
                            <div class="testimonial-card position-relative overflow-hidden custom-video-card"
                                 data-video-url="{{ $url }}"
                                 data-muted="{{ $video->muted ? '1' : '0' }}"
                                 style="background-image:linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0) 65%), url('{{ env('BACKEND_URL') . '/' . $video->thumbnail }}'); background-size: cover; background-position: center; min-height: 400px; border-radius: 12px; transition: transform 0.3s ease;">
                                
                                @if($video->autoplay)
                                    @if($isYoutube)
                                        <iframe src="{{ $finalUrl }}"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; pointer-events: none; border: none; border-radius: 12px;"
                                                allow="autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen>
                                        </iframe>
                                    @else
                                        <video src="{{ (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) ? $url : env('BACKEND_URL') . '/' . $url }}"
                                               style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; border-radius: 12px;"
                                               autoplay
                                               loop
                                               playsinline
                                               {{ $video->muted ? 'muted' : '' }}>
                                        </video>
                                    @endif
                                @endif

                                @if(!$video->autoplay)
                                    <a href="{{ $finalUrl }}" target="_blank"
                                        class="play-btn text-decoration-none text-white d-inline-flex align-items-center justify-content-center position-absolute"
                                        style="width: 70px; height: 70px; background: #ea580c; border-radius: 50%; top: 40%; left: 50%; transform: translate(-50%, -50%); z-index: 3; box-shadow: 0 4px 15px rgba(234, 88, 12, 0.4); transition: transform 0.2s ease;">
                                        <i class="fa-solid fa-play fs-4" style="margin-left: 5px;"></i>
                                    </a>
                                @endif
                                    
                                <div class="d-flex flex-column justify-content-end h-100 w-100 p-4 text-center" style="position: relative; z-index: 2;">
                                    <div>
                                        <h3 class="text-white fw-bold mb-1" style="font-size: 1.3rem;">{{ $video->name }}</h3>
                                        <p class="text-white small mb-2" style="font-size: 0.85rem;">
                                            {{ $video->course }}
                                        </p>
                                        <div class="rating mt-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa-solid fa-star" style="color: #fbbf24; font-size: 0.85rem;"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="play-btn">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                                <h3>Lorem Ipsum</h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                </p>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

                <div class="swiper-pagination mt-4"></div>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-5 mb-2">
                <a href="#" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 14px;">
                    View More <i class="fas fa-arrow-right ms-1" style="font-size: 12px;"></i>
                </a>
            </div>

        </div>

    </section>

    <style>
        .custom-video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .custom-video-card:hover .play-btn {
            transform: translate(-50%, -50%) scale(1.1) !important;
        }
    </style>

@push('js')
<script>
$(document).ready(function() {
    $('.testimonial-card .play-btn').on('click', function(e) {
        const card = $(this).closest('.testimonial-card');
        const videoUrl = card.data('video-url');
        const isMuted = card.data('muted') == '1';
        
        if (!videoUrl) return;
        
        e.preventDefault();
        
        let playerHtml = '';
        let isYoutube = false;
        let youtubeId = '';
        
        // Match YouTube ID
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = videoUrl.match(regExp);
        if (match && match[2].length == 11) {
            isYoutube = true;
            youtubeId = match[2];
        }
        
        if (isYoutube) {
            playerHtml = `<iframe src="https://www.youtube.com/embed/${youtubeId}?autoplay=1&mute=${isMuted ? 1 : 0}&playsinline=1"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; border: none;"
                            allow="autoplay; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                          </iframe>`;
        } else {
            // Check if relative
            let finalUrl = videoUrl;
            if (videoUrl.indexOf('http://') !== 0 && videoUrl.indexOf('https://') !== 0) {
                finalUrl = "{{ env('BACKEND_URL') }}/" + videoUrl;
            }
            playerHtml = `<video src="${finalUrl}" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;"
                            autoplay 
                            controls
                            playsinline
                            ${isMuted ? 'muted' : ''}>
                          </video>`;
        }
        
        // Remove play button and insert player
        $(this).fadeOut(200, function() {
            $(this).remove();
        });
        card.prepend(playerHtml);
    });
});
</script>
@endpush



