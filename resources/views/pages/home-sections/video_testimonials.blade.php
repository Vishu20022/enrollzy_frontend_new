    <section class="testimonial-section">

        <div class="container">

            <div class="heading-wrap">

                <div class="heading-line"></div>

                <h2 class="main-heading">
                {!! $section->title ?? 'Testimonials' !!}
            </h2>

                <div class="heading-line"></div>

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
                            <div class="testimonial-card position-relative overflow-hidden"
                                 data-video-url="{{ $url }}"
                                 data-muted="{{ $video->muted ? '1' : '0' }}"
                                 style="background-image:linear-gradient(rgba(173, 41, 172, 0.35),rgba(111, 68, 117, 0.70)), url('{{ env('BACKEND_URL') . '/' . $video->thumbnail }}'); background-size: cover; background-position: center; min-height: 250px;">
                                
                                @if($video->autoplay)
                                    @if($isYoutube)
                                        <iframe src="{{ $finalUrl }}"
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; pointer-events: none; border: none;"
                                                allow="autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen>
                                        </iframe>
                                    @else
                                        <video src="{{ (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) ? $url : env('BACKEND_URL') . '/' . $url }}"
                                               style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;"
                                               autoplay
                                               loop
                                               playsinline
                                               {{ $video->muted ? 'muted' : '' }}>
                                        </video>
                                    @endif
                                @endif

                                <div class="d-flex flex-column justify-content-between h-100 w-100" style="position: relative; z-index: 2;">
                                    @if(!$video->autoplay)
                                        <a href="{{ $finalUrl }}" target="_blank"
                                            class="play-btn text-decoration-none text-white d-inline-flex align-items-center justify-content-center mb-3"
                                            style="width: 50px; height: 50px; background: #fff; backdrop-filter: blur(5px); border-radius: 50%; color: #163c97 !important;">
                                            <i class="fa-solid fa-play" style="margin-left: 3px;"></i>
                                        </a>
                                    @endif
                                    
                                    <div>
                                        <h3 class="text-white fw-bold mb-1" style="font-size: 1.25rem; text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">{{ $video->name }}</h3>
                                        <p class="text-white-50 small mb-2" style="font-size: 0.85rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.8); min-height: auto;">
                                            {{ $video->course }}
                                        </p>
                                        <div class="rating mt-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa-solid fa-star" style="color: #ffc107; font-size: 0.8rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.8);"></i>
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

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section>

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



