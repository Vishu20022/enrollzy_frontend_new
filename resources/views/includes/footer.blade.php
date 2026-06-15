<footer class="site-footer premium-dark-footer mt-5 pt-5 pb-3">
    <div class="container">
        <div class="row g-4 mb-4">
            {{-- Left Column: Logo and Subheading --}}
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/') }}" class="text-decoration-none d-inline-flex align-items-center mb-4 logo-pill-wrapper">
                    @if(isset($site_settings) && $site_settings->logo)
                        <img src="{{ env('BACKEND_URL') . '/' . $site_settings->logo }}" alt="{{ $site_settings->site_name ?? 'Logo' }}" style="max-height: 45px;">
                    @else
                        <span class="h3 mb-0 theme fw-bold" style="color: #4f46e5;">{{ explode(' ', $site_settings->site_name ?? 'Enrollzy')[0] ?? 'Enrollzy' }}</span>
                        <span class="h3 mb-0 fw-bold text-dark">{{ implode(' ', array_slice(explode(' ', $site_settings->site_name ?? 'Enrollzy'), 1)) }}</span>
                    @endif
                </a>
                <p class="footer-text lh-base mb-4 pe-lg-4">
                    Empowering your future with world-class education. Discover, learn, and grow with top-rated courses and programs tailored for your success.
                </p>
                
                {{-- Social Icons --}}
                <div class="d-flex gap-3">
                    <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            {{-- Column 2: Important Links --}}
            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="footer-heading fw-bold mb-4">Important Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="{{ url('/about') }}" class="footer-link">About Us</a></li>
                    <li class="mb-3"><a href="{{ url('/courses') }}" class="footer-link">Browse Courses</a></li>
                    <li class="mb-3"><a href="{{ url('/instructors') }}" class="footer-link">Our Instructors</a></li>
                    <li class="mb-3"><a href="{{ url('/blog') }}" class="footer-link">Blog & News</a></li>
                    <li class="mb-3"><a href="{{ url('/contact') }}" class="footer-link">Contact Us</a></li>
                </ul>
            </div>

            {{-- Column 3: More --}}
            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="footer-heading fw-bold mb-4">More</h6>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="{{ url('/privacy-policy') }}" class="footer-link">Privacy Policy</a></li>
                    <li class="mb-3"><a href="{{ url('/terms-and-conditions') }}" class="footer-link">Terms & Conditions</a></li>
                    <li class="mb-3"><a href="{{ url('/refund-policy') }}" class="footer-link">Refund Policy</a></li>
                    <li class="mb-3"><a href="{{ url('/faq') }}" class="footer-link">FAQ / Help</a></li>
                    <li class="mb-3"><a href="{{ url('/careers') }}" class="footer-link">Careers</a></li>
                </ul>
            </div>

            {{-- Right Column: Contact Information --}}
            <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                <h6 class="footer-heading fw-bold mb-4">Contact Info</h6>
                <ul class="list-unstyled">
                    <li class="mb-4 d-flex align-items-start">
                        <div class="contact-icon me-3 mt-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="footer-text">
                            123 Education Lane, Learning City,<br> ED 12345, Country
                        </span>
                    </li>
                    <li class="mb-4 d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="mailto:support@enrollzy.com" class="footer-link">support@enrollzy.com</a>
                    </li>
                    <li class="mb-4 d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <a href="tel:+1234567890" class="footer-link">+1 (234) 567-890</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-divider my-4"></div>

        {{-- Bottom Bar --}}
        <div class="row align-items-center pb-2">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <small class="bottom-bar-text">{{ $site_settings->footer_text ?? '© ' . date('Y') . ' Enrollzy. All rights reserved.' }}</small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <small class="bottom-bar-text">
                    Designed with <i class="fas fa-heart text-danger mx-1"></i> for Education
                </small>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Premium Dark Footer Styles */
    .premium-dark-footer {
        background-color: #0b1120 !important;
        background-image: radial-gradient(at top center, rgba(30, 58, 138, 0.15) 0%, transparent 70%) !important;
        color: #e2e8f0 !important;
        font-family: 'Inter', system-ui, -apple-system, sans-serif !important;
    }
    
    .premium-dark-footer .logo-pill-wrapper {
        background: rgba(255, 255, 255, 0.95) !important;
        padding: 10px 20px !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3) !important;
        transition: transform 0.3s ease !important;
    }

    .premium-dark-footer .logo-pill-wrapper:hover {
        transform: translateY(-3px) !important;
    }

    .premium-dark-footer .footer-heading {
        color: #ffffff !important;
        letter-spacing: 0.5px !important;
    }

    .premium-dark-footer .footer-text {
        color: #94a3b8 !important;
        font-size: 0.95rem !important;
    }

    .premium-dark-footer .footer-link {
        color: #e2e8f0 !important; /* Brighter color for links to ensure they show up well */
        text-decoration: none !important;
        font-size: 0.95rem !important;
        transition: all 0.3s ease !important;
        display: inline-block !important;
    }

    .premium-dark-footer .footer-link:hover {
        color: #60a5fa !important;
        transform: translateX(4px) !important;
    }

    .premium-dark-footer .social-btn {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 40px !important;
        height: 40px !important;
        background-color: rgba(255, 255, 255, 0.05) !important;
        color: #cbd5e1 !important;
        border-radius: 50% !important;
        text-decoration: none !important;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }

    .premium-dark-footer .social-btn:hover {
        background-color: #3b82f6 !important;
        color: #ffffff !important;
        transform: translateY(-5px) scale(1.1) !important;
        border-color: transparent !important;
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4) !important;
    }

    .premium-dark-footer .contact-icon {
        width: 24px !important;
        height: 24px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: rgba(59, 130, 246, 0.1) !important;
        color: #60a5fa !important;
        border-radius: 6px !important;
        font-size: 0.85rem !important;
    }

    .premium-dark-footer .footer-divider {
        height: 1px !important;
        width: 100% !important;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent) !important;
    }

    .premium-dark-footer .bottom-bar-text {
        color: #94a3b8 !important;
    }
</style>
