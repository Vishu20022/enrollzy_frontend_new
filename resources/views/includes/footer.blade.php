@php
    $footerMenus = \App\Models\FooterMenu::with(['children' => function($q) {
        $q->where('status', 1)->orderBy('sort_order');
    }])->whereNull('parent_id')->where('status', 1)->orderBy('sort_order')->get();
@endphp

<footer class="pro-footer pt-5 pb-5">
    <div class="container">
        <div class="pro-footer-card">
            <div class="row g-5">
                {{-- Left Column: Logo, Description, Contact --}}
                <div class="col-lg-4 pe-lg-5">
                    <a href="{{ url('/') }}" class="text-decoration-none d-inline-block mb-4">
                        @if(isset($site_settings) && $site_settings->logo)
                            <img src="{{ env('BACKEND_URL') . '/' . $site_settings->logo }}" alt="{{ $site_settings->site_name ?? 'Logo' }}" style="max-height: 50px;">
                        @else
                            <span class="h3 mb-0 text-dark fw-bold" style="color:#0071dc !important;">Enrollzy</span>
                        @endif
                    </a>
                    
                    <p class="pro-footer-desc mb-5">
                        {{ $site_settings->footer_description ?? 'Enrollzy, a DPIIT-recognized education technology platform, enables students to explore, compare, and access quality education opportunities with transparency and confidence.' }}
                    </p>

                    <div class="d-flex align-items-center mb-3">
                        <span class="pro-footer-label">CONTACT US:</span>
                        <a href="mailto:{{ $site_settings->contact_email ?? 'info@enrollzy.com' }}" class="pro-footer-value text-decoration-none">
                            {{ $site_settings->contact_email ?? 'info@enrollzy.com' }}
                        </a>
                    </div>
                    
                    @if(isset($site_settings->address) && $site_settings->address)
                    <div class="d-flex align-items-start mb-4">
                        <span class="pro-footer-label pt-1">OUR ADDRESS:</span>
                        <span class="pro-footer-value">
                            {!! nl2br(e($site_settings->address)) !!}
                        </span>
                    </div>
                    @else
                    <div class="d-flex align-items-start mb-4">
                        <span class="pro-footer-label pt-1">OUR ADDRESS:</span>
                        <span class="pro-footer-value">
                            Workaholics Workzone,<br>
                            SCO 364-365-366 Second Floor,<br>
                            Sector 34A, Chandigarh, 160022
                        </span>
                    </div>
                    @endif

                    <div class="d-flex align-items-center">
                        <span class="pro-footer-label">CONNECT US:</span>
                        <div class="d-flex gap-2">
                            <a href="{{ $site_settings->twitter_url ?? '#' }}" target="_blank" class="pro-social-icon icon-twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="{{ $site_settings->instagram_url ?? '#' }}" target="_blank" class="pro-social-icon icon-instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{ $site_settings->facebook_url ?? '#' }}" target="_blank" class="pro-social-icon icon-facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $site_settings->linkedin_url ?? '#' }}" target="_blank" class="pro-social-icon icon-linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Banner & Links --}}
                <div class="col-lg-8">
                    {{-- Banner Image --}}
                    @php
                        // Check if a banner is set in admin setup or fallback to default
                        $bannerImage = isset($site_settings->footer_banner) && $site_settings->footer_banner 
                            ? env('BACKEND_URL') . '/' . $site_settings->footer_banner 
                            : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&q=80';
                    @endphp
                    <img src="{{ $bannerImage }}" alt="Graduation Banner" class="pro-banner-img">

                    {{-- Dynamic Menus --}}
                    <div class="row">
                        @php
                            // Let's divide menus into columns. If there are fewer menus, they span naturally.
                            // The reference has 4 columns.
                            // We will loop through max 4 menus.
                            $displayMenus = $footerMenus->take(4);
                        @endphp

                        @forelse($displayMenus as $column)
                            <div class="col-6 col-md-3 mb-4">
                                <h6 class="pro-menu-title">{{ $column->title }}</h6>
                                <div class="pro-menu-list">
                                    @foreach($column->children->take(6) as $link)
                                        <a href="{{ $link->url ?: '#' }}" class="pro-menu-link">{{ $link->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <!-- Fallback Demo Columns if no DB menus -->
                            @for($i = 0; $i < 4; $i++)
                                <div class="col-6 col-md-3 mb-4">
                                    <h6 class="pro-menu-title">{{ $i%2==0 ? 'Universities' : 'Student Support' }}</h6>
                                    <div class="pro-menu-list">
                                        <a href="#" class="pro-menu-link">Partner Universities</a>
                                        <a href="#" class="pro-menu-link">Online Universities</a>
                                        <a href="#" class="pro-menu-link">Top Ranked Universities</a>
                                        <a href="#" class="pro-menu-link">University Comparison</a>
                                        <a href="#" class="pro-menu-link">Trending Programs</a>
                                    </div>
                                </div>
                            @endfor
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Bottom Copyright --}}
            <div class="pro-copyright mt-4">
                {{ $site_settings->footer_text ?? '© 2026 Uniband8 Education Technology Pvt. Ltd. All Rights Reserved.' }}
            </div>
        </div>
    </div>
</footer>
