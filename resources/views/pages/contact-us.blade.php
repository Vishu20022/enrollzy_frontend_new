@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')

@push('css')
<style>
    /* Google Fonts & Base Typography */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap');

    :root {
        --color-primary: #0f172a; /* Deep Navy for premium feel */
        --color-primary-dark: #0b1120;
        --color-accent: #3b82f6; /* Trust blue */
        --color-accent-light: #eff6ff;
        --color-secondary: #0f172a;
        --color-text: #334155;
        --color-text-light: #64748b;
        --color-bg-light: #f8fafc;
        --color-bg-gray: #f1f5f9;
        --color-border: #e2e8f0;
        
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 10px 25px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
        --shadow-hover: 0 20px 40px -5px rgba(0, 0, 0, 0.1);
        
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 20px;
        --radius-xl: 32px;
    }

    .premium-contact-wrapper,
    .premium-contact-wrapper p,
    .premium-contact-wrapper span,
    .premium-contact-wrapper div,
    .premium-contact-wrapper a,
    .premium-contact-wrapper li,
    .premium-contact-wrapper input,
    .premium-contact-wrapper select,
    .premium-contact-wrapper textarea,
    .premium-contact-wrapper button {
        font-family: 'Inter', sans-serif !important;
        color: var(--color-text);
    }

    h1, h2, h3, h4, h5, h6,
    .premium-contact-wrapper h1,
    .premium-contact-wrapper h2,
    .premium-contact-wrapper h3,
    .premium-contact-wrapper h4,
    .premium-contact-wrapper h5,
    .premium-contact-wrapper h6 {
        font-family: 'Outfit', sans-serif !important;
        color: var(--color-primary);
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    /* Buttons */
    .btn-premium {
        background-color: var(--color-accent);
        color: #ffffff !important;
        border: none;
        padding: 14px 28px;
        font-weight: 600;
        font-size: 16px;
        border-radius: 100px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: var(--shadow-md);
        text-decoration: none;
    }
    .btn-premium:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    .btn-outline-premium {
        background-color: #ffffff;
        color: var(--color-primary) !important;
        border: 2px solid var(--color-border);
        padding: 12px 28px;
        font-weight: 600;
        font-size: 16px;
        border-radius: 100px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    .btn-outline-premium:hover {
        border-color: var(--color-primary);
        background-color: var(--color-bg-light);
        transform: translateY(-2px);
    }

    /* Hero Section */
    .hero-section {
        padding: 64px 0 48px;
        background: linear-gradient(135deg, #ffffff 0%, var(--color-bg-light) 100%);
        position: relative;
        overflow: hidden;
    }
    .hero-badge {
        display: inline-block;
        padding: 6px 16px;
        background-color: var(--color-accent-light);
        color: var(--color-accent);
        font-weight: 700;
        font-size: 14px;
        border-radius: 100px;
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .hero-title {
        font-size: 52px;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 16px;
        color: var(--color-primary);
    }
    .hero-subtitle {
        font-size: 18px;
        color: var(--color-text-light);
        margin-bottom: 24px;
        line-height: 1.6;
    }
    .hero-trust-list {
        list-style: none;
        padding: 0;
        margin: 0 0 24px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .hero-trust-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 16px;
        font-weight: 500;
        color: var(--color-primary);
    }
    .hero-trust-list li i {
        color: var(--color-accent);
        font-size: 18px;
        background: var(--color-accent-light);
        padding: 4px;
        border-radius: 50%;
    }
    .hero-image-wrapper {
        position: relative;
        z-index: 2;
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }
    .hero-image-wrapper img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    .hero-bg-pattern {
        position: absolute;
        top: -50px;
        right: -50px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--color-accent-light) 0%, rgba(255,255,255,0) 70%);
        z-index: 1;
    }

    /* Contact Cards */
    .contact-cards-section {
        padding: 48px 0;
        background-color: #ffffff;
    }
    .contact-card {
        background: #ffffff;
        border-radius: var(--radius-lg);
        padding: 24px;
        height: 100%;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--color-border);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
        border-color: var(--color-accent-light);
    }
    .contact-icon {
        width: 64px;
        height: 64px;
        background: var(--color-accent-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
    }
    .contact-icon i {
        font-size: 24px;
        color: var(--color-accent);
    }
    .contact-card h3 {
        font-size: 22px;
        margin-bottom: 16px;
        color: var(--color-primary);
    }
    .contact-item {
        margin-bottom: 12px;
    }
    .contact-label {
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--color-text-light);
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: block;
    }
    .contact-value {
        font-size: 16px;
        color: var(--color-primary);
        font-weight: 500;
        text-decoration: none;
    }
    a.contact-value:hover {
        color: var(--color-accent);
    }

    /* Founder Spotlight */
    .founder-section {
        padding: 48px 0;
        background-color: var(--color-bg-light);
    }
    .founder-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        padding: 48px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--color-border);
    }
    .founder-badge {
        font-size: 13px;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--color-accent);
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: block;
    }
    .founder-title {
        font-size: 36px;
        margin-bottom: 16px;
        color: var(--color-primary);
    }
    .founder-quote {
        font-size: 20px;
        line-height: 1.6;
        color: var(--color-text);
        font-style: italic;
        padding-left: 24px;
        border-left: 4px solid var(--color-accent);
        margin-bottom: 24px;
        font-weight: 500;
    }
    .founder-info {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }
    .founder-name {
        font-weight: 700;
        font-size: 18px;
        color: var(--color-primary);
        margin: 0;
    }
    .founder-designation {
        color: var(--color-text-light);
        font-size: 14px;
        margin: 0;
    }
    .founder-image {
        border-radius: var(--radius-lg);
        width: 100%;
        height: 100%;
        object-fit: cover;
        min-height: 400px;
    }

    /* Map & Form Section */
    .map-form-section {
        padding: 64px 0;
        background-color: #ffffff;
    }
    .form-card {
        background: #ffffff;
        border-radius: var(--radius-lg);
        padding: 32px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--color-border);
    }
    .form-floating > label {
        color: var(--color-text-light);
        font-family: 'Inter', sans-serif !important;
    }
    .form-floating > .form-control,
    .form-floating > .form-select {
        border: 1px solid var(--color-border);
        border-radius: var(--radius-sm);
        background-color: var(--color-bg-light);
        color: var(--color-primary);
        font-family: 'Inter', sans-serif !important;
    }
    .form-floating > .form-control:focus,
    .form-floating > .form-select:focus {
        border-color: var(--color-accent);
        box-shadow: 0 0 0 3px var(--color-accent-light);
        background-color: #ffffff;
    }
    .map-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        height: 100%;
        min-height: 400px;
        border: 1px solid var(--color-border);
    }
    .map-card iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }
    .form-trust-box {
        background: var(--color-bg-light);
        padding: 16px;
        border-radius: var(--radius-sm);
        margin-top: 16px;
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: center;
        border: 1px solid var(--color-border);
    }
    .form-trust-box span {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
        color: var(--color-text);
    }
    .form-trust-box span i {
        color: #10b981; /* Green check */
    }

    /* Why Contact Us */
    .why-us-section {
        padding: 64px 0;
        background-color: var(--color-bg-gray);
    }
    .section-title-center {
        text-align: center;
        font-size: 36px;
        margin-bottom: 32px;
        color: var(--color-primary);
    }
    .why-card {
        background: #ffffff;
        padding: 24px;
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        height: 100%;
        transition: all 0.3s ease;
    }
    .why-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }
    .why-card i {
        font-size: 28px;
        color: var(--color-accent);
        margin-bottom: 16px;
    }
    .why-card h4 {
        font-size: 20px;
        margin-bottom: 8px;
    }
    .why-card p {
        font-size: 15px;
        color: var(--color-text-light);
        margin: 0;
        line-height: 1.6;
    }

    /* Consultation CTA Banner */
    .consultation-cta {
        padding: 48px 0 64px;
        background-color: #ffffff;
    }
    .cta-banner {
        background: var(--color-primary);
        border-radius: var(--radius-xl);
        padding: 48px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }
    .cta-content {
        position: relative;
        z-index: 2;
    }
    .cta-heading {
        color: #ffffff !important;
        font-size: 40px;
        margin-bottom: 16px;
        max-width: 600px;
    }
    .cta-points {
        list-style: none;
        padding: 0;
        margin: 0 0 24px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        max-width: 600px;
    }
    .cta-points li {
        color: #f8fafc;
        font-size: 16px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    .cta-points li i {
        color: var(--color-accent);
        margin-top: 4px;
    }
    .cta-image {
        position: absolute;
        bottom: 0;
        right: 0;
        height: 120%;
        width: 40%;
        object-fit: cover;
        object-position: left top;
        z-index: 1;
        opacity: 0.9;
        mask-image: linear-gradient(to left, black 50%, transparent 100%);
        -webkit-mask-image: linear-gradient(to left, black 50%, transparent 100%);
    }

    @media (max-width: 991px) {
        .hero-title { font-size: 40px; }
        .cta-points { grid-template-columns: 1fr; }
        .cta-image { display: none; }
        .founder-card { padding: 32px 24px; }
        .form-card { padding: 24px 16px; }
    }
</style>
@endpush

<div class="premium-contact-wrapper">

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-bg-pattern"></div>
        <div class="container relative z-10">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="hero-badge">{{ $contactUs->hero_badge ?? "Let's Talk" }}</span>
                    <h1 class="hero-title">{{ $contactUs->hero_title ?? "Need Help Improving Your Business Operations?" }}</h1>
                    <p class="hero-subtitle">{{ $contactUs->hero_description ?? "Reach out for consultation, support, automation, process improvement, and operational clarity." }}</p>
                    
                    @if(!empty($contactUs->hero_trust_points))
                    <ul class="hero-trust-list">
                        @foreach($contactUs->hero_trust_points as $point)
                            @if(trim($point))
                            <li><i class="fas fa-check"></i> <span>{{ $point }}</span></li>
                            @endif
                        @endforeach
                    </ul>
                    @endif

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ $contactUs->btn_hero_primary_url ?? '#inquiry' }}" class="btn-premium">
                            {{ $contactUs->btn_hero_primary_text ?? 'Book Free Consultation' }} <i class="fas fa-arrow-right"></i>
                        </a>
                        @if(!empty($contactUs->btn_hero_secondary_text))
                        <a href="{{ $contactUs->btn_hero_secondary_url ?? 'tel:' . ($contactUs->phone_general ?? '') }}" class="btn-outline-premium">
                            <i class="fas fa-phone-alt"></i> {{ $contactUs->btn_hero_secondary_text }}
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        @if(!empty($contactUs->hero_image))
                            <img src="{{ env('BACKEND_URL', 'http://127.0.0.1:8000') }}/{{ ltrim($contactUs->hero_image, '/') }}" alt="Consultation">
                        @else
                            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Consultation Placeholder">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT CARDS -->
    <section class="contact-cards-section">
        <div class="container">
            <div class="row g-4">
                <!-- Call Us -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Call Us</h3>
                        
                        @if(!empty($contactUs->phone_general))
                        <div class="contact-item">
                            <span class="contact-label">Main Phone</span>
                            <a href="tel:{{ $contactUs->phone_general }}" class="contact-value">{{ $contactUs->phone_general }}</a>
                        </div>
                        @endif

                        @if(!empty($contactUs->phone_toll_free))
                        <div class="contact-item">
                            <span class="contact-label">Support Phone</span>
                            <a href="tel:{{ $contactUs->phone_toll_free }}" class="contact-value">{{ $contactUs->phone_toll_free }}</a>
                        </div>
                        @endif

                        @if(!empty($contactUs->phone_sales))
                        <div class="contact-item">
                            <span class="contact-label">Sales Phone</span>
                            <a href="tel:{{ $contactUs->phone_sales }}" class="contact-value">{{ $contactUs->phone_sales }}</a>
                        </div>
                        @endif

                        @if(!empty($contactUs->office_timings))
                        <div class="contact-item mt-auto pt-3 border-top">
                            <span class="contact-label"><i class="far fa-clock me-1"></i> Working Hours</span>
                            <span class="contact-value" style="font-size: 14px;">{{ $contactUs->office_timings }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Visit Us -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Visit Us</h3>
                        
                        @if(!empty($contactUs->address_head_office))
                        <div class="contact-item">
                            <span class="contact-label">Head Office</span>
                            <span class="contact-value d-block" style="line-height: 1.5;">{!! nl2br(e($contactUs->address_head_office)) !!}</span>
                        </div>
                        @endif

                        @if(!empty($contactUs->address_regional_office))
                        <div class="contact-item">
                            <span class="contact-label">Regional Office</span>
                            <span class="contact-value d-block" style="line-height: 1.5;">{!! nl2br(e($contactUs->address_regional_office)) !!}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Email Us -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email Us</h3>
                        
                        @if(!empty($contactUs->email_queries))
                        <div class="contact-item">
                            <span class="contact-label">General Email</span>
                            <a href="mailto:{{ $contactUs->email_queries }}" class="contact-value">{{ $contactUs->email_queries }}</a>
                        </div>
                        @endif

                        @if(!empty($contactUs->email_support))
                        <div class="contact-item">
                            <span class="contact-label">Support Email</span>
                            <a href="mailto:{{ $contactUs->email_support }}" class="contact-value">{{ $contactUs->email_support }}</a>
                        </div>
                        @endif

                        @if(!empty($contactUs->email_sales))
                        <div class="contact-item">
                            <span class="contact-label">Sales Email</span>
                            <a href="mailto:{{ $contactUs->email_sales }}" class="contact-value">{{ $contactUs->email_sales }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOUNDER SPOTLIGHT -->
    <section class="founder-section">
        <div class="container">
            <div class="founder-card">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="founder-badge">{{ $contactUs->founder_badge ?? 'Founder Message' }}</span>
                        <h2 class="founder-title">{{ $contactUs->founder_heading ?? 'A Personal Note From Our Founder' }}</h2>
                        
                        <div class="founder-quote">
                            "{{ $contactUs->co_founder_message ?? 'We believe in building scalable systems and operations that empower your business to grow without friction.' }}"
                        </div>

                        <div class="founder-info">
                            <div>
                                <h4 class="founder-name">{{ $contactUs->co_founder_name ?? 'Leadership Team' }}</h4>
                                <p class="founder-designation">{{ $contactUs->co_founder_title ?? 'Founder & CEO' }}</p>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-3">
                            @if(!empty($contactUs->co_founder_email))
                            <a href="mailto:{{ $contactUs->co_founder_email }}" class="btn-outline-premium">
                                <i class="fas fa-envelope"></i> Email Founder
                            </a>
                            @endif
                            <a href="{{ $contactUs->btn_founder_book_url ?? '#inquiry' }}" class="btn-premium">
                                {{ $contactUs->btn_founder_book_text ?? 'Book Consultation' }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        @if(!empty($contactUs->co_founder_image))
                            <img src="{{ env('BACKEND_URL', 'http://127.0.0.1:8000') }}/{{ ltrim($contactUs->co_founder_image, '/') }}" alt="{{ $contactUs->co_founder_name }}" class="founder-image">
                        @else
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Founder Placeholder" class="founder-image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAP & FORM SECTION -->
    <section id="inquiry" class="map-form-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="map-card">
                        @if(!empty($contactUs->map_embed_url))
                            <iframe src="{{ $contactUs->map_embed_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-muted">Map not configured</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-card">
                        <h3 class="mb-4" style="color: var(--color-primary); font-family: 'Outfit', sans-serif !important; font-weight: 700;">Request a Consultation</h3>
                        <form action="{{ route('leads.submit') }}" method="POST" id="consultationForm">
                            @csrf
                            <input type="hidden" name="source" value="Premium Consultation Form">
                            <input type="hidden" name="message" id="finalMessagePayload">
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="John Doe" required>
                                        <label for="nameInput">Full Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" name="phone" id="phoneInput" placeholder="+1 234 567 8900" required>
                                        <label for="phoneInput">Phone Number <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="emailInput" placeholder="name@company.com" required>
                                        <label for="emailInput">Email Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="companyInput" placeholder="Company Ltd." required>
                                        <label for="companyInput">Company Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="businessTypeInput" required>
                                            <option value="" disabled selected>Select type</option>
                                            <option value="B2B Services">B2B Services</option>
                                            <option value="B2C Retail/E-commerce">B2C Retail/E-commerce</option>
                                            <option value="SaaS/Technology">SaaS/Technology</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <option value="Healthcare">Healthcare</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label for="businessTypeInput">Business Type <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="messageInput" placeholder="How can we help?" style="height: 120px" required></textarea>
                                        <label for="messageInput">How can we help your business? <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-premium w-100 justify-content-center mt-2" style="padding: 16px;">
                                        Submit Request <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if(!empty($contactUs->form_trust_points))
                        <div class="form-trust-box">
                            @foreach($contactUs->form_trust_points as $point)
                                @if(trim($point))
                                <span><i class="fas fa-check-circle"></i> {{ $point }}</span>
                                @endif
                            @endforeach
                        </div>
                        @else
                        <div class="form-trust-box">
                            <span><i class="fas fa-check-circle"></i> 100% Confidential</span>
                            <span><i class="fas fa-check-circle"></i> No Spam</span>
                            <span><i class="fas fa-check-circle"></i> Free Initial Consultation</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CONTACT US -->
    <section class="why-us-section">
        <div class="container">
            <h2 class="section-title-center">{{ $contactUs->why_contact_heading ?? 'Why Businesses Work With Us' }}</h2>
            
            <div class="row g-4">
                @php
                    $cards = $contactUs->why_contact_cards ?? [];
                    if(!is_array($cards)) $cards = [];
                    
                    // Fallback dummy data if empty
                    if(empty($cards) || empty(array_filter($cards, fn($c) => !empty($c['title'])))) {
                        $cards = [
                            ['icon' => 'fas fa-cogs', 'title' => 'Process Improvement', 'description' => 'We analyze your workflows and eliminate bottlenecks to increase efficiency.'],
                            ['icon' => 'fas fa-robot', 'title' => 'Business Automation', 'description' => 'Automate repetitive tasks to save time, reduce errors, and scale faster.'],
                            ['icon' => 'fas fa-chart-line', 'title' => 'Operational Visibility', 'description' => 'Gain deep insights into your operations with custom dashboards and reporting.'],
                            ['icon' => 'fas fa-lightbulb', 'title' => 'Better Decision Making', 'description' => 'Leverage data-driven strategies to make informed decisions for growth.']
                        ];
                    }
                @endphp

                @foreach($cards as $card)
                    @if(!empty($card['title']))
                    <div class="col-lg-3 col-md-6">
                        <div class="why-card">
                            <i class="{{ $card['icon'] ?? 'fas fa-check' }}"></i>
                            <h4 style="font-family: 'Outfit', sans-serif !important; color: var(--color-primary); font-weight: 700;">{{ $card['title'] }}</h4>
                            <p>{{ $card['description'] ?? '' }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- CONSULTATION CTA -->
    <section class="consultation-cta">
        <div class="container">
            <div class="cta-banner">
                <div class="cta-content">
                    <h2 class="cta-heading">{{ $contactUs->cta_heading ?? 'Ready To Improve Your Business Operations?' }}</h2>
                    
                    <ul class="cta-points">
                        @if(!empty($contactUs->career_coach_points))
                            @foreach($contactUs->career_coach_points as $point)
                                @if(trim($point))
                                <li><i class="fas fa-check-circle"></i> <span>{{ $point }}</span></li>
                                @endif
                            @endforeach
                        @else
                            <li><i class="fas fa-check-circle"></i> <span>Reduce dependency on people</span></li>
                            <li><i class="fas fa-check-circle"></i> <span>Gain visibility into operations</span></li>
                            <li><i class="fas fa-check-circle"></i> <span>Build scalable systems</span></li>
                            <li><i class="fas fa-check-circle"></i> <span>Improve overall efficiency</span></li>
                        @endif
                    </ul>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ $contactUs->btn_book_session_url ?? '#inquiry' }}" class="btn-outline-premium" style="background: transparent; color: #fff !important; border-color: #fff;">
                            {{ $contactUs->btn_hero_primary_text ?? 'Book Free Consultation' }}
                        </a>
                        @if(!empty($contactUs->btn_cta_secondary_text))
                        <a href="{{ $contactUs->btn_cta_secondary_url ?? '#' }}" class="btn-premium" style="background: #25d366; color: #fff !important;">
                            <i class="fab fa-whatsapp"></i> {{ $contactUs->btn_cta_secondary_text }}
                        </a>
                        @endif
                    </div>
                </div>
                
                @if(!empty($contactUs->career_coach_image))
                    <img src="{{ env('BACKEND_URL', 'http://127.0.0.1:8000') }}/{{ ltrim($contactUs->career_coach_image, '/') }}" alt="Consultant" class="cta-image">
                @else
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Consultant Placeholder" class="cta-image">
                @endif
            </div>
        </div>
    </section>

</div>

@push('js')
<script>
    document.getElementById('consultationForm').addEventListener('submit', function(e) {
        // Intercept form submission to build the combined message payload
        const company = document.getElementById('companyInput').value;
        const type = document.getElementById('businessTypeInput').value;
        const originalMessage = document.getElementById('messageInput').value;
        
        // Combine inputs into the hidden message field expected by leads.submit
        const payload = `[Company: ${company}]\n[Business Type: ${type}]\n\nMessage:\n${originalMessage}`;
        document.getElementById('finalMessagePayload').value = payload;
    });
</script>
@endpush

@endsection
