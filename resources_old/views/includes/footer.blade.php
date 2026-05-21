<footer class="site-footer">
    <div class="container py-4">

        <div class="row g-4">

            @php
                $footerLinks = [
                    'Coursera' => [
                        'About',
                        'What We Offer',
                        'Leadership',
                        'Careers',
                        'Catalog',
                        'Coursera Plus',
                        'Professional Certificates',
                        'Degrees',
                        'For Enterprise',
                        'For Government',
                        'For Campus',
                        'Become a Partner',
                        'Social Impact',
                    ],
                    'Community' => [
                        'Learners',
                        'Partners',
                        'Beta Testers',
                        'Blog',
                        'The Coursera Podcast',
                        'Tech Blog',
                    ],
                    'More' => [
                        'Press',
                        'Investors',
                        'Terms',
                        'Privacy',
                        'Help',
                        'Accessibility',
                        'Contact',
                        'Articles',
                        'Directory',
                        'Affiliates',
                        'Modern Slavery Statement',
                        'Cookies Preference Center',
                    ],
                ];
            @endphp

            {{-- Link Columns --}}
            @foreach ($footerLinks as $title => $links)
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-title">{{ $title }}</h6>
                    <ul class="footer-list">
                        @foreach ($links as $link)
                            <li>
                                <a href="#">{{ $link }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            {{-- Mobile App Column --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Mobile App</h6>

                <div class="app-badges">
                    <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                        alt="App Store">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
                        alt="Google Play">
                </div>

                <div class="certified mt-4">
                    <span>Certified</span>
                    <div class="b-corp">B</div>
                    <small>Corporation</small>
                </div>
            </div>

        </div>

        <div class="row">
            {{-- Bottom Bar --}}
            <div class="footer-bottom mt-3 pt-3">
                <div class="row align-items-center">

                    <div class="col-md-6 text-center text-md-start">
                        <small>{{ $site_settings->footer_text ?? '© ' . date('Y') . '. All rights reserved.' }}</small>
                    </div>

                    <div class="col-md-6 text-center text-md-end">
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
