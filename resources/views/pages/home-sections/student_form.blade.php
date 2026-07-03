<section class="contact-section-new py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 40%, #fffdfa 100%); min-height: 700px;">
    <!-- Decorative asterisk watermark in bottom left -->
    <i class="fas fa-asterisk position-absolute" style="font-size: 350px; color: rgba(147, 197, 253, 0.2); bottom: -100px; left: -100px; transform: rotate(15deg); z-index: 0;"></i>

    <div class="container position-relative z-1 py-5">
        <div class="row g-5 align-items-center">

            <!-- LEFT: Image Graphic with Strips -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="position-relative mx-auto" style="max-width: 400px; height: 500px;">
                    
                    <!-- Striped Image Mask -->
                    <div class="w-100 h-100 rounded-4" 
                         style="background: url('https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600') center/cover; 
                                -webkit-mask-image: linear-gradient(to right, black 22%, transparent 22%, transparent 26%, black 26%, black 48%, transparent 48%, transparent 52%, black 52%, black 74%, transparent 74%, transparent 78%, black 78%);
                                mask-image: linear-gradient(to right, black 22%, transparent 22%, transparent 26%, black 26%, black 48%, transparent 48%, transparent 52%, black 52%, black 74%, transparent 74%, transparent 78%, black 78%);">
                    </div>
                    
                    <!-- Floating Pill Top Right -->
                    <div class="position-absolute shadow-sm bg-white rounded-pill px-3 py-2 d-flex align-items-center gap-2" style="top: 30px; right: -30px; z-index: 2;">
                        <div class="d-flex">
                            <img src="https://i.pravatar.cc/100?img=11" class="rounded-circle border border-2 border-white shadow-sm" style="width: 24px; height: 24px;">
                            <img src="https://i.pravatar.cc/100?img=12" class="rounded-circle border border-2 border-white shadow-sm" style="width: 24px; height: 24px; margin-left: -10px;">
                            <img src="https://i.pravatar.cc/100?img=13" class="rounded-circle border border-2 border-white shadow-sm" style="width: 24px; height: 24px; margin-left: -10px;">
                        </div>
                        <span class="fw-bold text-dark" style="font-size: 12px;">Speak with an Expert</span>
                    </div>

                    <!-- Floating Pill Bottom Left -->
                    <div class="position-absolute shadow-lg rounded-pill px-3 py-2 d-flex align-items-center gap-2" style="bottom: 40px; left: -30px; background: linear-gradient(135deg, #1e3a8a, #0f172a); z-index: 2;">
                        <div class="d-flex">
                            <img src="https://i.pravatar.cc/100?img=14" class="rounded-circle border border-2 border-primary shadow-sm" style="width: 24px; height: 24px;">
                            <img src="https://i.pravatar.cc/100?img=15" class="rounded-circle border border-2 border-primary shadow-sm" style="width: 24px; height: 24px; margin-left: -10px;">
                            <img src="https://i.pravatar.cc/100?img=16" class="rounded-circle border border-2 border-primary shadow-sm" style="width: 24px; height: 24px; margin-left: -10px;">
                        </div>
                        <span class="fw-bold text-white" style="font-size: 12px;">Book a Free Consultation</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Contact Form -->
            <div class="col-lg-7 ps-lg-5">
                <form class="contact-form-modern" action="{{ route('leads.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="subject" value="Contact Form Enquiry">

                    <h2 class="fw-bolder text-dark mb-2" style="font-size: 40px; letter-spacing: -1px;">
                        {!! $section->title ?? "Let's Get in Touch" !!}
                    </h2>
                    <p class="text-muted mb-5" style="font-size: 16px;">
                        Leave us a message and our advisors will get back to you shortly.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success rounded-3 border-0 bg-success bg-opacity-10 text-success fw-medium">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 border-0 bg-danger bg-opacity-10 text-danger fw-medium">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-2">Student Name</label>
                            <input type="text" placeholder="Enter your name" name="name" class="form-control form-control-lg bg-white shadow-sm border-0 rounded-3" style="font-size: 14px; padding: 12px 15px;" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-2">Student Phone Number</label>
                            <input type="tel" placeholder="Enter your Phone Number" name="phone" class="form-control form-control-lg bg-white shadow-sm border-0 rounded-3" style="font-size: 14px; padding: 12px 15px;" required>
                        </div>
                        
                        <!-- Extra required fields kept for backend compatibility, styled beautifully -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-2">Email Address</label>
                            <input type="email" placeholder="Enter your email" name="email" class="form-control form-control-lg bg-white shadow-sm border-0 rounded-3" style="font-size: 14px; padding: 12px 15px;" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-2">I'm looking for</label>
                            <select class="form-select form-select-lg bg-white shadow-sm border-0 rounded-3 text-muted" name="inquiry_type" style="font-size: 14px; padding: 12px 15px;">
                                <option value="School Admission">School Admission</option>
                                <option value="College Admission">College Admission</option>
                                <option value="Career Counselling">Career Counselling</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label fw-bold text-dark small mb-2">Message</label>
                            <textarea name="message" placeholder="How can we help you?" class="form-control form-control-lg bg-white shadow-sm border-0 rounded-3" style="font-size: 14px; padding: 15px; min-height: 100px;" required></textarea>
                        </div>
                    </div>

                    <div class="text-center text-lg-center mt-3">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-semibold shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #007aff; border-color: #007aff; font-size: 15px; transition: transform 0.2s ease;">
                            Book my free session <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-form-modern .form-control:focus, .contact-form-modern .form-select:focus {
        box-shadow: 0 0 0 4px rgba(0, 122, 255, 0.15) !important;
        outline: none;
    }
    .contact-form-modern button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 122, 255, 0.3) !important;
    }
</style>
