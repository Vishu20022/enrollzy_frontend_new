@php
    $footerMenus = \App\Models\FooterMenu::with(['children' => function($q) {
        $q->where('status', 1)->orderBy('sort_order');
    }])->whereNull('parent_id')->where('status', 1)->orderBy('sort_order')->get();
@endphp

<footer class="site-footer reference-dark-footer pt-5 pb-3">
    <div class="container">
        <div class="row g-4 mb-4">
            {{-- Left Column: Logo, Description, Apps, Contact --}}
            <div class="col-lg-4 col-md-12 pe-lg-4">
                <a href="{{ url('/') }}" class="text-decoration-none d-inline-block mb-3">
                    @if(isset($site_settings) && $site_settings->logo)
                        <img src="{{ env('BACKEND_URL') . '/' . $site_settings->logo }}" alt="{{ $site_settings->site_name ?? 'Logo' }}" style="max-height: 70px;">
                    @else
                        <span class="h3 mb-0 text-white fw-bold">{{ $site_settings->site_name ?? 'Enrollzy' }}</span>
                    @endif
                </a>
                
                <p class="mb-4" style="font-size: 0.88rem; line-height: 1.6; color: #cbd5e0;">
                    {{ $site_settings->footer_description ?? 'Get the right guidance with us' }}
                </p>

                <div class="row align-items-center mb-4">
                    <div class="col-7">
                        <h6 class="text-white mb-2 fw-normal">Contact us :</h6>
                        <a href="mailto:{{ $site_settings->contact_email ?? 'info@collegevidya.com' }}" class="text-white text-decoration-none d-block mb-3" style="font-size: 0.95rem;">
                            {{ $site_settings->contact_email ?? 'info@collegevidya.com' }}
                        </a>
                        
                        {{-- Social Icons --}}
                        <div class="d-flex gap-3">
                            @if(isset($site_settings->facebook_url) && $site_settings->facebook_url)
                                <a href="{{ $site_settings->facebook_url }}" target="_blank" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(isset($site_settings->twitter_url) && $site_settings->twitter_url)
                                <a href="{{ $site_settings->twitter_url }}" target="_blank" class="text-white fs-5"><i class="fa-brands fa-x-twitter"></i></a>
                            @endif
                            @if(isset($site_settings->youtube_url) && $site_settings->youtube_url)
                                <a href="{{ $site_settings->youtube_url }}" target="_blank" class="text-white fs-5"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(isset($site_settings->linkedin_url) && $site_settings->linkedin_url)
                                <a href="{{ $site_settings->linkedin_url }}" target="_blank" class="text-white fs-5"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(isset($site_settings->instagram_url) && $site_settings->instagram_url)
                                <a href="{{ $site_settings->instagram_url }}" target="_blank" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-5">
                        @if(isset($site_settings) && $site_settings->footer_qr_image)
                        <div class="bg-white p-2 rounded text-center">
                            <img src="{{ env('BACKEND_URL') . '/' . $site_settings->footer_qr_image }}" alt="QR Badge" class="img-fluid rounded">
                        </div>
                        @endif
                    </div>
                </div>

                @if(isset($site_settings->address) && $site_settings->address)
                    <div class="mb-4">
                        <h6 class="text-white mb-2 fw-normal">Address :</h6>
                        <p class="mb-0" style="font-size: 0.88rem; line-height: 1.5; color: #a0aec0 !important;">
                            {!! nl2br(e($site_settings->address)) !!}
                        </p>
                    </div>
                @endif

                <div class="d-flex gap-3 flex-wrap">
                    @if(isset($site_settings) && $site_settings->toll_free_number)
                    <div class="contact-pill border rounded px-3 py-2 position-relative">
                        <span class="badge bg-primary position-absolute top-0 start-50 translate-middle rounded-pill" style="font-size: 0.65rem;">Toll Free</span>
                        <a href="tel:{{ str_replace('-', '', $site_settings->toll_free_number) }}" class="text-white text-decoration-none fw-bold">
                            {{ $site_settings->toll_free_number }}
                        </a>
                    </div>
                    @endif
                    @if(isset($site_settings) && $site_settings->whatsapp_number)
                    <div class="contact-pill border rounded px-3 py-2 position-relative">
                        <span class="badge bg-success position-absolute top-0 start-50 translate-middle rounded-pill" style="font-size: 0.65rem;">WhatsApp</span>
                        <a href="https://wa.me/{{ str_replace('-', '', $site_settings->whatsapp_number) }}" target="_blank" class="text-white text-decoration-none fw-bold">
                            {{ $site_settings->whatsapp_number }}
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right Columns: Dynamic Menus & General --}}
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @php
                        // Fetch General Links
                        $generalLinks = \App\Models\GeneralLink::where('status', 1)->orderBy('sort_order')->get();
                    @endphp
                    
                    {{-- Dynamic Menus --}}
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($footerMenus as $column)
                                <div class="col-md-6 mb-4">
                                    <div class="footer-menu-block h-100">
                                        <h6 class="footer-heading fw-bold mb-3 pb-2 text-white" style="border-bottom: 2px solid rgba(255,255,255,0.2);">{{ $column->title }}</h6>
                                        <ul class="list-unstyled mb-2">
                                            @foreach($column->children->take(5) as $link)
                                            <li class="mb-2"><a href="{{ $link->url ?: '#' }}" class="footer-link">{{ $link->title }}</a></li>
                                            @endforeach
                                        </ul>
                                        @if($column->show_view_all || $column->children->count() > 5)
                                        <a href="{{ $column->url ?: ($column->view_all_link ?: '#') }}" class="text-primary text-decoration-none" style="font-size: 0.85rem;">View All +</a>
                                        @endif
                                        
                                        {{-- Badge Placement --}}
                                        @if($column->bottom_badge_text)
                                        <div class="mt-4">
                                            <div class="bg-white text-dark py-2 px-3 rounded-pill d-inline-flex align-items-center gap-3">
                                                @if($column->bottom_badge_icon)
                                                    <i class="fas {{ $column->bottom_badge_icon }} fs-4 text-primary"></i>
                                                @endif
                                                <div class="d-flex flex-column lh-1">
                                                    @if($column->bottom_badge_subtext)
                                                        <span class="text-muted fw-bold" style="font-size: 0.65rem;">{{ $column->bottom_badge_subtext }}</span>
                                                    @endif
                                                    <span class="fw-bold" style="font-size: 0.8rem;">{{ $column->bottom_badge_text }}</span>
                                                </div>
                                                @if($column->bottom_badge_rating)
                                                    <div class="bg-primary text-white px-2 py-1 rounded d-flex align-items-center gap-1" style="font-size: 0.75rem;">
                                                        <i class="fas fa-star" style="font-size: 0.6rem;"></i> {{ $column->bottom_badge_rating }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- General Links Column (3rd Column on the right) --}}
                    @if($generalLinks->count() > 0)
                    <div class="col-md-4 mb-4">
                        <div class="footer-menu-block h-100">
                            <h6 class="footer-heading fw-bold mb-3 pb-2 text-white" style="border-bottom: 2px solid rgba(255,255,255,0.2);">General</h6>
                            <ul class="list-unstyled mb-2">
                                @foreach($generalLinks as $gLink)
                                <li class="mb-2"><a href="{{ $gLink->url ?: '#' }}" class="footer-link">{{ $gLink->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="row align-items-center pt-3 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
            <div class="col-12 text-center">
                <small class="bottom-bar-text" style="color: #94a3b8;">{{ $site_settings->footer_text ?? '© ' . date('Y') . ' Enrollzy. All rights reserved.' }}</small>
            </div>
        </div>
    </div>
</footer>

<style>
    .reference-dark-footer {
        background-color: #171923 !important; /* Very dark blue/gray */
        font-family: 'Inter', system-ui, -apple-system, sans-serif !important;
    }

    .reference-dark-footer .app-btn img {
        border-radius: 8px;
        border: 1px solid rgba(255,255,255,0.2);
        transition: transform 0.2s ease;
    }
    
    .reference-dark-footer .app-btn:hover img {
        transform: scale(1.05);
    }

    .reference-dark-footer .footer-link {
        color: #a0aec0 !important; 
        text-decoration: none !important;
        font-size: 0.9rem !important;
        transition: color 0.2s ease !important;
        display: inline-block !important;
    }

    .reference-dark-footer .footer-link:hover {
        color: #ffffff !important;
    }

    .reference-dark-footer .contact-pill {
        border-color: rgba(255,255,255,0.2) !important;
        min-width: 130px;
        text-align: center;
        background: rgba(255,255,255,0.02);
    }
    
    .reference-dark-footer .contact-pill:hover {
        background: rgba(255,255,255,0.05);
    }
</style>
