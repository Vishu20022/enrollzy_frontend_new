    <section class="contact-section">

        <div class="container-fluid px-0">

            <div class="contact-box">

                <div class="row g-0 align-items-center">


                    <!-- LEFT -->

                    <div class="col-lg-5">

                        <div class="left-panel">

                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/customer-support-3483562-2912010.png"
                                alt="contact">

                        </div>

                    </div>


                    <!-- RIGHT -->

                    <div class="col-lg-7">


                        <form class="form-side" action="{{ route('leads.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject" value="Contact Form Enquiry">

                            <h2 class="main-heading">
                {!! $section->title ?? 'Contact Us' !!}
            </h2>

                            <p>
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

                                <div class="col-md-6 mb-2">
                                    <div class="input-label">
                                        <i class="fa-solid fa-user"></i>
                                        <span>Name</span>
                                    </div>
                                    <input type="text"  placeholder="Name" name="name" class="form-control custom-input" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="input-label">
                                        <i class="fa-solid fa-phone"></i>
                                        <span>Mobile</span>
                                    </div>
                                    <input type="tel" placeholder="Mobile" name="phone" class="form-control custom-input">
                                </div>

                            </div>

                            <div class="mb-2 d-none">
                                <div class="input-label">
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>Email Address</span>
                                </div>
                                <input type="email"  placeholder="Email Address" name="email" class="form-control custom-input" required>
                            </div>

                            <div class="input-label">
                                <i class="fa-solid fa-message"></i>
                                <span>Message</span>
                            </div>
                            <textarea name="message"  placeholder="Message" class="form-control custom-textarea" required></textarea>

                            <button type="submit" class="btn-theme-1 mt-3">
                                Send
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
