<section class="student-query-section">
    <div class="container">
        <div class="row justify-content-center  align-items-center">
            <div class="col-lg-5">
                <div class="query-img">
                    <img src="{{ asset('images/contactus.gif') }}" alt="query">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="query-card">

                    <h2 class="text-center mb-4 main-heading"> <span class="theme">Enquiry</span> Form</h2>

                    <form action="{{ route('leads.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="subject" value="Student Enquiry">

                        <div class="row g-3">

                            <!-- Name -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Student Name" required>
                            </div>

                            <!-- Mobile -->
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone" placeholder="Mobile Number">
                            </div>

                            <!-- Email (Added for leads) -->
                            <div class="col-12">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                            </div>

                            {{-- Simplified OTP section for now as we don't have SMS gateway --}}
                            {{-- 
                            <div class="col-12">
                                <div class="otp-wrapper">
                                    <label class="otp-label">Enter 6-Digit OTP</label>
                                    <div class="otp-inputs">
                                        <input type="text" maxlength="1" class="otp-input">
                                        <input type="text" maxlength="1" class="otp-input">
                                        <input type="text" maxlength="1" class="otp-input">
                                        <input type="text" maxlength="1" class="otp-input">
                                        <input type="text" maxlength="1" class="otp-input">
                                        <input type="text" maxlength="1" class="otp-input">
                                    </div>
                                </div>
                            </div>
                            --}}


                            <!-- Message -->
                            <div class="col-12">
                                <textarea class="form-control textarea" name="message" placeholder="Your Query / Message" required></textarea>
                            </div>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-theme-two mt-4">
                                Submit Enquiry
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>


@push('js')
    <script src="{{asset('js/stuent-form.js')}}"></script>
@endpush