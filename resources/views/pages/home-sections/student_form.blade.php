    <section class="contact-section">
        <div class="container">
            <div class="contact-box">
                <div class="row g-0 align-items-stretch">

                    <!-- LEFT -->
                    <div class="col-lg-5">
                        <div class="left-panel">
                            <div class="left-text">
                                <h2>Let's Shape Your Future</h2>
                                <p>Get personalized guidance from our expert counselors.</p>
                            </div>
                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/customer-support-3483562-2912010.png" alt="contact">
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-7">
                        <form class="form-side" action="{{ route('leads.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Contact Form Enquiry">

                            <h2 class="main-heading mb-2">
                                {!! $section->title ?? 'Contact Us' !!}
                            </h2>

                            <p class="mb-4">
                                Leave us a message and our advisors will get back to you shortly.
                            </p>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-label">
                                        <span>Name</span>
                                    </div>
                                    <input type="text" placeholder="Enter your name" name="name" class="form-control custom-input" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="input-label">
                                        <span>Mobile</span>
                                    </div>
                                    <input type="tel" placeholder="Enter your mobile" name="phone" class="form-control custom-input">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-label">
                                    <span>Email Address</span>
                                </div>
                                <input type="email" placeholder="Enter your email" name="email" class="form-control custom-input" required>
                            </div>

                            <div class="mb-4">
                                <div class="input-label">
                                    <span>Message</span>
                                </div>
                                <textarea name="message" placeholder="How can we help you?" class="form-control custom-textarea" required></textarea>
                            </div>

                            <button type="submit" class="btn-theme-1">
                                Send Message
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
