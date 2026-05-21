<section class="query-section">
    <div class="container">
        <div class="row justify-content-center  align-items-center">
            <div class="col-lg-5">
                <div class="query-img">
                    <img src="{{ asset('images/contactus.gif') }}" alt="query">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="query-card">

                    <h2 class="text-center mb-4">University Admission Enquiry</h2>

                    <form>


                        <div class="row g-3">

                            <!-- Name -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Full Name">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>

                            <!-- Mobile -->
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="mobile" placeholder="Mobile Number">
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" placeholder="City / State">
                            </div>

                            <!-- Qualification -->
                            <div class="col-md-6">
                                <select class="form-control" name="qualification">
                                    <option value="">Highest Qualification</option>
                                    <option>12th</option>
                                    <option>Diploma</option>
                                    <option>Graduate</option>
                                    <option>Post Graduate</option>
                                </select>
                            </div>

                            <!-- Course -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="course"
                                    placeholder="Interested Course">
                            </div>

                            <!-- Intake -->
                            <div class="col-md-6">
                                <select class="form-control" name="intake">
                                    <option value="">Preferred Intake</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <textarea class="form-control textarea" name="message" placeholder="Your Query / Message"></textarea>
                            </div>

                        </div>

                        <div class="text-center">
                            <button class="btn btn-theme-two   mt-4">
                                Submit Enquiry
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>
