<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollzy - Find Your Path</title>
    <!-- Google Fonts & Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="top-gradient-div"></div>


    <!-- Header Section -->
    <header class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container d-block">
                <!-- Logo -->
                <div class="d-flex header-d-fl">
                    <a class="logo navbar-brand d-flex align-items-center text-decoration-none" href="#">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                    </a>
                    <!-- Navigation Pills (Stacked and Centered) -->
                    <div class="offcanvas-mobile offcanvas offcanvas-start order-lg-2" tabindex="-1" id="enrollzyNavbar"
                        aria-labelledby="enrollzyNavbarLabel">
                        <div class="offcanvas-header d-lg-none">
                            <a class="logo text-decoration-none" href="#">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="Enrollzy Logo" style="width: 140px;">
                            </a>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="d-flex flex-column align-items-center gap-2 gap-lg-3 w-100">
                                <!-- Top Nav Card (Primary Links) - Desktop Only -->
                                <div class="nav-card-top w-100 d-none d-lg-block">
                                    <ul class="navbar-nav flex-row flex-wrap justify-content-center align-items-center"
                                        style="gap:16px">
                                        <li class="nav-item" data-tab-trigger="tab-boarding"><a class="nav-link"
                                                href="#">BOARDING SCHOOLS</a></li>
                                        <li class="nav-item" data-tab-trigger="tab-universities"><a class="nav-link"
                                                href="#">UNIVERSITIES</a></li>
                                        <li class="nav-item" data-tab-trigger="tab-coaching"><a class="nav-link"
                                                href="#">INTEGRATED COACHING</a></li>
                                        <li class="nav-item" data-tab-trigger="tab-roadmap"><a class="nav-link"
                                                href="#">CAREER ROADMAP</a></li>
                                        <li class="nav-item" data-tab-trigger="tab-exams"><a class="nav-link"
                                                href="#">TOP EXAMS</a></li>
                                        <li class="nav-item" data-tab-trigger="tab-scholarships"><a class="nav-link"
                                                href="#">SCHOLARSHIPS</a></li>
                                    </ul>

                                    <!-- Mega Menu Wrapper -->
                                    <div class="mega-menu-wrapper">
                                        <div class="mega-menu-container">
                                            <!-- Sidebar -->
                                            <div class="mega-menu-sidebar">
                                                <ul class="mega-sidebar-list">
                                                    <li class="mega-sidebar-item active" data-mega-tab="tab-boarding">
                                                        <span>Boarding Schools</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-universities">
                                                        <span>Universities</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-coaching">
                                                        <span>Integrated Coaching</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-roadmap">
                                                        <span>Career Roadmap</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-skills">
                                                        <span>Trending Skills</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-courses">
                                                        <span>Free Courses</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-programs">
                                                        <span>Trending Programs</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-exams">
                                                        <span>Top Exams</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                    <li class="mega-sidebar-item" data-mega-tab="tab-scholarships">
                                                        <span>Scholarships</span>
                                                        <i class="fa-solid fa-chevron-right mega-arrow-icon"></i>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Content Area -->
                                            <div class="mega-menu-content">
                                                <!-- Pane 1: Boarding Schools -->
                                                <div class="mega-tab-content active" id="tab-boarding">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>School Type</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">Boys Boarding Schools</a></li>
                                                                <li><a href="#">Girls Boarding Schools</a></li>
                                                                <li><a href="#">Co-Ed Boarding Schools</a></li>
                                                                <li><a href="#">Residential Schools</a></li>
                                                                <li><a href="#">Day Boarding</a></li>
                                                                <li><a href="#">International Boarding</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Curriculum</h5>
                                                            <ul>
                                                                <li><a href="#">CBSE</a></li>
                                                                <li><a href="#">ICSE</a></li>
                                                                <li><a href="#">ISC</a></li>
                                                                <li><a href="#">IB</a></li>
                                                                <li><a href="#">Cambridge</a></li>
                                                                <li><a href="#">State Board</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Browse by State</h5>
                                                            <ul>
                                                                <li><a href="#">Uttarakhand</a></li>
                                                                <li><a href="#">Himachal Pradesh</a></li>
                                                                <li><a href="#">Karnataka</a></li>
                                                                <li><a href="#">Tamil Nadu</a></li>
                                                                <li><a href="#">Rajasthan</a></li>
                                                                <li><a href="#">Maharashtra</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Popular Schools</h5>
                                                            <ul>
                                                                <li><a href="#">Doon School</a></li>
                                                                <li><a href="#">Mayo College</a></li>
                                                                <li><a href="#">Bishop Cotton School</a></li>
                                                                <li><a href="#">Residential Schools</a></li>
                                                                <li><a href="#">Welham Girl's</a></li>
                                                                <li><a href="#">Birla Vidya Mandir</a></li>
                                                                <li><a href="#">Scindia School</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Resources</h5>
                                                            <ul>
                                                                <li><a href="#">Compare Schools</a></li>
                                                                <li><a href="#">Admission Process</a></li>
                                                                <li><a href="#">Fee Structure</a></li>
                                                                <li><a href="#">Scholarships</a></li>
                                                                <li><a href="#">Reviews</a></li>
                                                                <li><a href="#">Virtual Campus Tour</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane 2: Universities -->
                                                <div class="mega-tab-content" id="tab-universities">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Browse by Stream</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">Engineering</a></li>
                                                                <li><a href="#">Medical</a></li>
                                                                <li><a href="#">Management</a></li>
                                                                <li><a href="#">Law</a></li>
                                                                <li><a href="#">Design</a></li>
                                                                <li><a href="#">Commerce
</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Browse by Degree
</h5>
                                                            <ul>
                                                                <li><a href="#">Diploma</a></li>
                                                                <li><a href="#">Undergraduate</a></li>
                                                                <li><a href="#">Postgraduate</a></li>
                                                                <li><a href="#">Doctorate</a></li>
                                                                <li><a href="#">Online Degree</a></li>
                                                                <li><a href="#">State Board</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Browse by Location</h5>
                                                            <ul>
                                                                <li><a href="#">North India</a></li>
                                                                <li><a href="#">South India</a></li>
                                                                <li><a href="#">East India</a></li>
                                                                <li><a href="#">West India</a></li>
                                                                <li><a href="#">Central India</a></li>
                                                                <li><a href="#">Top Universities</a></li>
                                                                <li><a href="#">IITs</a></li>
                                                                <li><a href="#">NITs</a></li>
                                                                <li><a href="#">IIMs</a></li>
                                                                <li><a href="#">AIIMS</a></li>
                                                                <li><a href="#">Central Universities</a></li>
                                                                <li><a href="#">Private Universities</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Resources</h5>
                                                            <ul>
                                                                <li><a href="#">Compare Universities</a></li>
                                                                <li><a href="#">NIRF Rankings</a></li>
                                                                <li><a href="#">Placements</a></li>
                                                                <li><a href="#">Scholarships</a></li>
                                                                <li><a href="#">Apply Now</a></li>
                                                                <li><a href="#">Reviews</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane 3: Integrated Coaching -->
                                                <div class="mega-tab-content" id="tab-coaching">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Browse by Stream</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">Engineering</a></li>
                                                                <li><a href="#">IIT-JEE</a></li>
                                                                <li><a href="#">BITSAT</a></li>
                                                                <li><a href="#">VITEEE</a></li>
                                                                <li><a href="#">Olympiads</a></li>
                                                            </ul>
                                                            <h5 class="mt-4">Resources</h5>
                                                            <ul>
                                                                <li><a href="#">Top Coaching Institutes</a></li>
                                                                <li><a href="#">Faculty</a></li>
                                                                <li><a href="#">Results</a></li>
                                                                <li><a href="#">Fees</a></li>
                                                                <li><a href="#">Hostel</a></li>
                                                                <li><a href="#">Demo Classes</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Medical</h5>
                                                            <ul>
                                                                <li><a href="#">NEET</a></li>
                                                                <li><a href="#">AIIMS</a></li>
                                                                <li><a href="#">JIPMER</a></li>
                                                                <li><a href="#">Doctorate</a></li>
                                                                <li><a href="#">Online Degree</a></li>
                                                                <li><a href="#">State Board</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Government Exams</h5>
                                                            <ul>
                                                                <li><a href="#">NDA</a></li>
                                                                <li><a href="#">UPSC</a></li>
                                                                <li><a href="#">SSC</a></li>
                                                                <li><a href="#">Banking</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>International Exams</h5>
                                                            <ul>
                                                                <li><a href="#">IELTS</a></li>
                                                                <li><a href="#">TOEFL</a></li>
                                                                <li><a href="#">GRE</a></li>
                                                                <li><a href="#">GMAT</a></li>
                                                                <li><a href="#">SAT</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane: Career Roadmap -->
                                                <div class="mega-tab-content" id="tab-roadmap">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Popular Roadmaps</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">Engineering
                                                                        Pathway</a></li>
                                                                <li><a href="#">Medical Pathway</a></li>
                                                                <li><a href="#">Management Pathway</a></li>
                                                                <li><a href="#">Creative Arts Pathway</a></li>
                                                                <li><a href="#">Law Career Pathway</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Self Assessment</h5>
                                                            <ul>
                                                                <li><a href="#">Aptitude Test</a></li>
                                                                <li><a href="#">Personality Profiling</a></li>
                                                                <li><a href="#">Interest Mapping</a></li>
                                                                <li><a href="#">Skill Gap Analysis</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Expert Guidance</h5>
                                                            <ul>
                                                                <li><a href="#">1:1 Mentorship</a></li>
                                                                <li><a href="#">Profile Building</a></li>
                                                                <li><a href="#">Resume Review</a></li>
                                                                <li><a href="#">Interview Prep</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane 4: Trending Skills -->
                                                <div class="mega-tab-content" id="tab-skills">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Technology</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">Artificial Intelligence</a></li>
                                                                <li><a href="#">Machine Learning</a></li>
                                                                <li><a href="#">Data Science</a></li>
                                                                <li><a href="#">Cyber Security</a></li>
                                                                <li><a href="#">Cloud Computing</a></li>
                                                                <li><a href="#">DevOps</a></li>
                                                            </ul>
                                                            <h5 class="mt-4">Resources</h5>
                                                            <ul>
                                                                <li><a href="#">Certifications</a></li>
                                                                <li><a href="#">Learning Paths</a></li>
                                                                <li><a href="#">Beginner Friendly</a></li>
                                                                <li><a href="#">Industry Demand</a></li>
                                                                <li><a href="#">Top Providers</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Business</h5>
                                                            <ul>
                                                                <li><a href="#">Digital Marketing</a></li>
                                                                <li><a href="#">Finance</a></li>
                                                                <li><a href="#">Stock Market</a></li>
                                                                <li><a href="#">Entrepreneurship</a></li>
                                                                <li><a href="#">Project Management</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Design</h5>
                                                            <ul>
                                                                <li><a href="#">UI/UX</a></li>
                                                                <li><a href="#">Graphic Design</a></li>
                                                                <li><a href="#">Video Editing</a></li>
                                                                <li><a href="#">Animation</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Career Skills</h5>
                                                            <ul>
                                                                <li><a href="#">Communication</a></li>
                                                                <li><a href="#">Public Speaking</a></li>
                                                                <li><a href="#">Leadership</a></li>
                                                                <li><a href="#">Interview Skills</a></li>
                                                                <li><a href="#">Resume Building</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Pane 5: Free Courses -->
                                                <div class="mega-tab-content" id="tab-courses">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Programming</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">Python for
                                                                        Beginners</a></li>
                                                                <li><a href="#">Web Dev Essentials</a></li>
                                                                <li><a href="#">Java Programming</a></li>
                                                                <li><a href="#">SQL & Databases</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Self Growth</h5>
                                                            <ul>
                                                                <li><a href="#">Public Speaking</a></li>
                                                                <li><a href="#">Graphic Design Basics</a></li>
                                                                <li><a href="#">Financial Literacy</a></li>
                                                                <li><a href="#">Content Writing</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane 6: Trending Programs -->
                                                <div class="mega-tab-content" id="tab-programs">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Undergraduate</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">B.Tech
                                                                        CSE</a></li>
                                                                <li><a href="#">BBA / BCA</a></li>
                                                                <li><a href="#">B.Com Honors</a></li>
                                                                <li><a href="#">B.Des Fashion</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Postgraduate</h5>
                                                            <ul>
                                                                <li><a href="#">MBA Finance</a></li>
                                                                <li><a href="#">M.Tech AI</a></li>
                                                                <li><a href="#">MCA Cloud</a></li>
                                                                <li><a href="#">M.Des Product</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane 7: Top Exams -->
                                                <div class="mega-tab-content" id="tab-exams">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>National Level</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">JEE Main /
                                                                        Advanced</a></li>
                                                                <li><a href="#">NEET UG</a></li>
                                                                <li><a href="#">CAT Exam</a></li>
                                                                <li><a href="#">CLAT Law</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Study Abroad</h5>
                                                            <ul>
                                                                <li><a href="#">SAT / ACT</a></li>
                                                                <li><a href="#">GRE / GMAT</a></li>
                                                                <li><a href="#">IELTS / TOEFL</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pane 8: Scholarships -->
                                                <div class="mega-tab-content" id="tab-scholarships">
                                                    <div class="mega-grid">
                                                        <div class="mega-col">
                                                            <h5>Government</h5>
                                                            <ul>
                                                                <li><a href="#" class="highlight-link">NSP
                                                                        Scholarships</a></li>
                                                                <li><a href="#">State Scholarships</a></li>
                                                                <li><a href="#">Inspire Scheme</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-col">
                                                            <h5>Private & Corporate</h5>
                                                            <ul>
                                                                <li><a href="#">Tata Capital Pankh</a></li>
                                                                <li><a href="#">HDFC Badhte Kadam</a></li>
                                                                <li><a href="#">L'Oreal Girls Science</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Bottom Footer -->
                                                <div class="mega-menu-footer-main">
                                                    <div class="mega-menu-footer">
                                                        <div class="mega-footer-left">
                                                            <span>Not sure where to begin?</span>
                                                            <a href="#">browse more courses</a>
                                                            <span>or</span>
                                                            <a href="#">Learn more about</a>
                                                        </div>
                                                        <div class="mega-footer-right">
                                                            <img src="{{ asset('assets/images/logo.svg') }}" alt="Enrollzy"
                                                                class="mega-footer-logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile Menu Accordion (Mobile Only) -->
                                <div class="mobile-menu-accordion accordion d-lg-none w-100" id="mobileMenuAccordion">
                                    <!-- Item 1: Boarding Schools -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-m-boarding">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-m-boarding"
                                                aria-expanded="false" aria-controls="collapse-m-boarding">
                                                BOARDING SCHOOLS
                                            </button>
                                        </h2>
                                        <div id="collapse-m-boarding" class="accordion-collapse collapse"
                                            aria-labelledby="heading-m-boarding" data-bs-parent="#mobileMenuAccordion">
                                            <div class="accordion-body">
                                                <div class="mobile-submenu-group">
                                                    <h6>School Type</h6>
                                                    <ul>
                                                        <li><a href="#">Boys Boarding Schools</a></li>
                                                        <li><a href="#">Girls Boarding Schools</a></li>
                                                        <li><a href="#">Co-Ed Boarding Schools</a></li>
                                                        <li><a href="#">Residential Schools</a></li>
                                                        <li><a href="#">Day Boarding</a></li>
                                                        <li><a href="#">International Boarding</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Curriculum</h6>
                                                    <ul>
                                                        <li><a href="#">CBSE</a></li>
                                                        <li><a href="#">ICSE</a></li>
                                                        <li><a href="#">ISC</a></li>
                                                        <li><a href="#">IB</a></li>
                                                        <li><a href="#">Cambridge</a></li>
                                                        <li><a href="#">State Board</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Browse by State</h6>
                                                    <ul>
                                                        <li><a href="#">Uttarakhand</a></li>
                                                        <li><a href="#">Himachal Pradesh</a></li>
                                                        <li><a href="#">Karnataka</a></li>
                                                        <li><a href="#">Tamil Nadu</a></li>
                                                        <li><a href="#">Rajasthan</a></li>
                                                        <li><a href="#">Maharashtra</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Popular Schools</h6>
                                                    <ul>
                                                        <li><a href="#">Doon School</a></li>
                                                        <li><a href="#">Mayo College</a></li>
                                                        <li><a href="#">Bishop Cotton School</a></li>
                                                        <li><a href="#">Residential Schools</a></li>
                                                        <li><a href="#">Welham Girl's</a></li>
                                                        <li><a href="#">Birla Vidya Mandir</a></li>
                                                        <li><a href="#">Scindia School</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Resources</h6>
                                                    <ul>
                                                        <li><a href="#">Compare Schools</a></li>
                                                        <li><a href="#">Admission Process</a></li>
                                                        <li><a href="#">Fee Structure</a></li>
                                                        <li><a href="#">Scholarships</a></li>
                                                        <li><a href="#">Reviews</a></li>
                                                        <li><a href="#">Virtual Campus Tour</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 2: Universities -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-m-universities">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-m-universities"
                                                aria-expanded="false" aria-controls="collapse-m-universities">
                                                UNIVERSITIES
                                            </button>
                                        </h2>
                                        <div id="collapse-m-universities" class="accordion-collapse collapse"
                                            aria-labelledby="heading-m-universities"
                                            data-bs-parent="#mobileMenuAccordion">
                                            <div class="accordion-body">
                                                <div class="mobile-submenu-group">
                                                    <h6>Featured Programs</h6>
                                                    <ul>
                                                        <li><a href="#">MBA / PGDM</a></li>
                                                        <li><a href="#">B.Tech / B.E.</a></li>
                                                        <li><a href="#">MCA / BCA</a></li>
                                                        <li><a href="#">BBA / BBM</a></li>
                                                        <li><a href="#">MBBS / MD</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Study Mode</h6>
                                                    <ul>
                                                        <li><a href="#">Regular Universities</a></li>
                                                        <li><a href="#">Online Universities</a></li>
                                                        <li><a href="#">Distance Education</a></li>
                                                        <li><a href="#">Executive Programs</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Top Cities</h6>
                                                    <ul>
                                                        <li><a href="#">Delhi NCR</a></li>
                                                        <li><a href="#">Bangalore</a></li>
                                                        <li><a href="#">Mumbai</a></li>
                                                        <li><a href="#">Pune</a></li>
                                                        <li><a href="#">Chennai</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Resources</h6>
                                                    <ul>
                                                        <li><a href="#">Compare Universities</a></li>
                                                        <li><a href="#">Admission Guidelines</a></li>
                                                        <li><a href="#">Education Loans</a></li>
                                                        <li><a href="#">University Rankings</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 3: Integrated Coaching -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-m-coaching">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-m-coaching"
                                                aria-expanded="false" aria-controls="collapse-m-coaching">
                                                INTEGRATED COACHING
                                            </button>
                                        </h2>
                                        <div id="collapse-m-coaching" class="accordion-collapse collapse"
                                            aria-labelledby="heading-m-coaching" data-bs-parent="#mobileMenuAccordion">
                                            <div class="accordion-body">
                                                <div class="mobile-submenu-group">
                                                    <h6>Exam Prep</h6>
                                                    <ul>
                                                        <li><a href="#">IIT JEE Prep</a></li>
                                                        <li><a href="#">NEET Coaching</a></li>
                                                        <li><a href="#">NTSE / Olympiads</a></li>
                                                        <li><a href="#">CA / CS Coaching</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Study Modes</h6>
                                                    <ul>
                                                        <li><a href="#">Classroom Centers</a></li>
                                                        <li><a href="#">Live Online Classes</a></li>
                                                        <li><a href="#">Self-Paced Programs</a></li>
                                                        <li><a href="#">Test Series Packs</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Resources</h6>
                                                    <ul>
                                                        <li><a href="#">Compare Institutes</a></li>
                                                        <li><a href="#">Scholarship Tests</a></li>
                                                        <li><a href="#">Preparation Tips</a></li>
                                                        <li><a href="#">Mock Exams</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 4: Career Roadmap -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-m-roadmap">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-m-roadmap"
                                                aria-expanded="false" aria-controls="collapse-m-roadmap">
                                                CAREER ROADMAP
                                            </button>
                                        </h2>
                                        <div id="collapse-m-roadmap" class="accordion-collapse collapse"
                                            aria-labelledby="heading-m-roadmap" data-bs-parent="#mobileMenuAccordion">
                                            <div class="accordion-body">
                                                <div class="mobile-submenu-group">
                                                    <h6>Popular Roadmaps</h6>
                                                    <ul>
                                                        <li><a href="#">Engineering Pathway</a></li>
                                                        <li><a href="#">Medical Pathway</a></li>
                                                        <li><a href="#">Management Pathway</a></li>
                                                        <li><a href="#">Creative Arts Pathway</a></li>
                                                        <li><a href="#">Law Career Pathway</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Self Assessment</h6>
                                                    <ul>
                                                        <li><a href="#">Aptitude Test</a></li>
                                                        <li><a href="#">Personality Profiling</a></li>
                                                        <li><a href="#">Interest Mapping</a></li>
                                                        <li><a href="#">Skill Gap Analysis</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Expert Guidance</h6>
                                                    <ul>
                                                        <li><a href="#">1:1 Mentorship</a></li>
                                                        <li><a href="#">Profile Building</a></li>
                                                        <li><a href="#">Resume Review</a></li>
                                                        <li><a href="#">Interview Prep</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 5: Top Exams -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-m-exams">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-m-exams"
                                                aria-expanded="false" aria-controls="collapse-m-exams">
                                                TOP EXAMS
                                            </button>
                                        </h2>
                                        <div id="collapse-m-exams" class="accordion-collapse collapse"
                                            aria-labelledby="heading-m-exams" data-bs-parent="#mobileMenuAccordion">
                                            <div class="accordion-body">
                                                <div class="mobile-submenu-group">
                                                    <h6>National Level</h6>
                                                    <ul>
                                                        <li><a href="#">JEE Main / Advanced</a></li>
                                                        <li><a href="#">NEET UG</a></li>
                                                        <li><a href="#">CAT Exam</a></li>
                                                        <li><a href="#">CLAT Law</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Study Abroad</h6>
                                                    <ul>
                                                        <li><a href="#">SAT / ACT</a></li>
                                                        <li><a href="#">GRE / GMAT</a></li>
                                                        <li><a href="#">IELTS / TOEFL</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 6: Scholarships -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-m-scholarships">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-m-scholarships"
                                                aria-expanded="false" aria-controls="collapse-m-scholarships">
                                                SCHOLARSHIPS
                                            </button>
                                        </h2>
                                        <div id="collapse-m-scholarships" class="accordion-collapse collapse"
                                            aria-labelledby="heading-m-scholarships"
                                            data-bs-parent="#mobileMenuAccordion">
                                            <div class="accordion-body">
                                                <div class="mobile-submenu-group">
                                                    <h6>Government</h6>
                                                    <ul>
                                                        <li><a href="#">NSP Scholarships</a></li>
                                                        <li><a href="#">State Scholarships</a></li>
                                                        <li><a href="#">Inspire Scheme</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mobile-submenu-group mt-3">
                                                    <h6>Private & Corporate</h6>
                                                    <ul>
                                                        <li><a href="#">Tata Capital Pankh</a></li>
                                                        <li><a href="#">HDFC Badhte Kadam</a></li>
                                                        <li><a href="#">L'Oreal Girls Science</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile Secondary Links (Mobile Only) -->
                                <div class="mobile-secondary-links d-lg-none w-100 mt-4">
                                    <h5>Quick Links</h5>
                                    <ul>
                                        <li><a href="#">Ask Enrollzy</a></li>
                                        <li><a href="#">Connect with Expert</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">FAQ's</a></li>
                                        <li><a href="#">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Controls (Profile Button and Hamburger for Mobile) -->
                    <div class="d-flex align-items-center gap-3 order-lg-3">
                        <!-- Profile Button -->
                        <a href="#" class="profile-btn" id="profileBtn" aria-label="Profile">
                            <i class="fa-regular fa-user" style="color: #fff;"></i>
                        </a>
                        <!-- Mobile Hamburger -->
                        <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#enrollzyNavbar" aria-controls="enrollzyNavbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <!-- Bottom Nav Card (Secondary Links) -->
                    <div class="nav-card-bottom d-none d-lg-inline-block">
                        <ul class="navbar-nav flex-row flex-wrap justify-content-center align-items-center"
                            style="gap:45px">
                            <li class="nav-item"><a class="nav-link" href="#">Ask Enrollzy</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Connect with Expert</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">FAQ's</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="pb-5 hero-sec">
        <div class="bg-square">
            <img src="{{ asset('assets/images/banner-square-img.svg') }}" alt="">
        </div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <!-- Left Column (Content & Search) -->
                <div class="col-lg-6 col-12 text-center text-lg-start">
                    <!-- Marketplace Badge -->
                    <div class="mb-4">
                        <span class="marketplace-badge">India's no.1 Education Market place</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="hero-title">
                        Find your path.<br>
                        <span class="text-orange">Learn, Apply,</span><br>
                        <span class="fst-italic">Get Hired.</span>
                    </h1>

                    <!-- Search Capsule -->
                    <div class="search-bar-container mx-auto mx-lg-0 ">
                        <div class="dropdown">
                            <button class="search-dropdown" type="button" id="searchFilterDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Looking for..</span>
                                <i class="fa-solid fa-chevron-down" style="color: rgb(0, 0, 0);"></i>
                            </button>
                            <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="searchFilterDropdown">
                                <li><a class="dropdown-item" href="#">Colleges</a></li>
                                <li><a class="dropdown-item" href="#">Courses</a></li>
                                <li><a class="dropdown-item" href="#">Mentors</a></li>
                                <li><a class="dropdown-item" href="#">Schools</a></li>
                            </ul>
                        </div>

                        <input type="text" class="search-input" placeholder="Search courses, colleges, mentor"
                            aria-label="Search text">
                        <button class="search-btn" type="submit" aria-label="Submit Search">
                            Search
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </button>
                    </div>

                    <!-- Search Tags -->
                    <div class=" d-flex flex-wrap justify-content-center justify-content-lg-start"
                        style="margin-bottom:41px">
                        <a href="#" class="tag-pill">Top University</a>
                        <a href="#" class="tag-pill">Top Schools</a>
                        <a href="#" class="tag-pill">Top Schools</a>
                        <a href="#" class="tag-pill">Top Schools</a>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="stats-container mb-4">
                        <div class="stat-card">
                            <span class="stat-number">2800+</span>
                            <span class="stat-label">Institution</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">1.2L+</span>
                            <span class="stat-label">Student Enrolled</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">4500+</span>
                            <span class="stat-label">Scholarship's</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Robot Hand Image & Carousel Slider) -->
                <div class="col-lg-6 col-12 d-flex flex-column align-items-center">
                    <div class="hero-image-card swiper hero-swiper mb-4" style="overflow: hidden;">
                        <div class="swiper-wrapper">
                            <!-- Slide 1 -->
                            <div class="swiper-slide d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/banner-image.svg') }}" alt="Futuristic Glowing Cybernetic Hand"
                                    class="img-fluid hero-slide-img"
                                    style="border-radius: 20px; object-fit: cover; width: 100%; height: 100%;">
                            </div>
                            <!-- Slide 2 -->
                            <div class="swiper-slide d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/banner-image.svg') }}" alt="Expert Mentor"
                                    class="img-fluid hero-slide-img"
                                    style="border-radius: 20px; object-fit: cover; width: 100%; height: 100%;">
                            </div>
                            <!-- Slide 3 -->
                            <div class="swiper-slide d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/banner-image.svg') }}" alt="Academic Guide"
                                    class="img-fluid hero-slide-img"
                                    style="border-radius: 20px; object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Pagination Dots -->
                    <div class="carousel-dots"></div>
                </div>
            </div>
        </div>
    </main>


    <!-- Categories Section -->
    <section class="categories-section ptb-70">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center heading-card">
                <span class="marketplace-badge mb-3">India's no.1 Market place</span>
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Everything education, in one marketplace</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted">
                    From your first school admission to your first job offer — we cover every milestone of your
                    education journey.
                </p>
            </div>

            <!-- Categories Grid -->
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-7 category-row justify-content-center">

                <!-- Row 1, Card 1: Schools -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Schools</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 1, Card 2: Coaching -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color: #09FF6333;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Coaching</h3>
                        <span class="category-count">62+ listed</span>
                    </div>
                </div>

                <!-- Row 1, Card 3: Universities -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color: #83CBFF33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Universities</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 1, Card 4: Mentors -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color: #FFCC0033;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Mentors</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 1, Card 5: Scholarships -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Scholarships</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 1, Card 6: Internships -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Internships</h3>
                        <span class="category-count">4500+ listed</span>
                    </div>
                </div>

                <!-- Row 1, Card 7: Schools -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Schools</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 8: Schools -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper " style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Schools</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 9: Coaching -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color: #09FF6333;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Coaching</h3>
                        <span class="category-count">62+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 10: Universities -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper " style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Universities</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 11: Mentors -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper" style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Mentors</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 12: Scholarships -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper " style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Scholarships</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 13: Internships -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper " style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Internships</h3>
                        <span class="category-count">4500+ listed</span>
                    </div>
                </div>

                <!-- Row 2, Card 14: Schools -->
                <div class="col">
                    <div class="category-card">
                        <div class="category-icon-wrapper " style="background-color:#FCD8CB33;">
                            <img src="{{ asset('assets/images/education-list-icon.svg') }}" alt="">
                        </div>
                        <h3 class="category-name">Schools</h3>
                        <span class="category-count">850+ listed</span>
                    </div>
                </div>

            </div>

            <!-- View More Action Button -->
            <div class="text-center">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
    </section>

    <!-- Boarding School Section -->
    <div class="grad-main"
        style="background: linear-gradient(180deg, rgba(191, 219, 247, 0) 0%, rgb(191 219 247 / 17%) 50%, rgba(191, 219, 247, 0) 100%);">
        <section class="boarding-schools-section ptb-70">
            <div class="container">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                        <span class="heading-line d-none d-md-block"></span>
                        <h2 class="section-title mb-0">BOARDING SCHOOL</h2>
                        <span class="heading-line d-none d-md-block"></span>
                    </div>
                    <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                        Explore India's leading boarding schools and discover institutions designed to shape academic
                        excellence, leadership, character, and future success. Compare schools, curriculum, facilities,
                        campus life, and admissions — all in one place.
                    </p>
                </div>

                <!-- School Cards Grid -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4 mb-5 justify-content-center">
                    <!-- Card 1 -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">rashtriya indian</span>
                            <div class="card-info-text">jaipur, rajasthan &nbsp; CBSE</div>
                            <div class="card-info-text mb-3 fw-bold">3rd - 12th</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">rashtriya indian</span>
                            <div class="card-info-text">jaipur, rajasthan &nbsp; CBSE</div>
                            <div class="card-info-text mb-3 fw-bold">3rd - 12th</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">rashtriya indian</span>
                            <div class="card-info-text">jaipur, rajasthan &nbsp; CBSE</div>
                            <div class="card-info-text mb-3 fw-bold">3rd - 12th</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">rashtriya indian</span>
                            <div class="card-info-text">jaipur, rajasthan &nbsp; CBSE</div>
                            <div class="card-info-text mb-3 fw-bold">3rd - 12th</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">rashtriya indian</span>
                            <div class="card-info-text">jaipur, rajasthan &nbsp; CBSE</div>
                            <div class="card-info-text mb-3 fw-bold">3rd - 12th</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">rashtriya indian</span>
                            <div class="card-info-text">jaipur, rajasthan &nbsp; CBSE</div>
                            <div class="card-info-text mb-3 fw-bold">3rd - 12th</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View More Button -->
                <div class="text-center">
                    <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                        View More
                        <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Coaching Institutes Section -->
        <section class="coaching-institutes-section ptb-70">
            <div class="container">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                        <span class="heading-line d-none d-md-block"></span>
                        <h2 class="section-title mb-0">COACHING INSTITUTES</h2>
                        <span class="heading-line d-none d-md-block"></span>
                    </div>
                    <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                        Discover leading coaching institutes that help students prepare for competitive exams and future
                        success through expert mentorship, structured learning, and proven outcomes.
                    </p>
                </div>

                <!-- Coaching Cards Grid -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4 mb-5 justify-content-center">
                    <!-- Card 1: ALLEN -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">ALLEN</span>
                            <div class="card-info-text">sikar, rajasthan</div>
                            <div class="card-info-text "
                                style="font-size: 10px; font-weight: 700; color: #000000;margin-bottom: 13px;">
                                NEET <span>|</span> IIT-JEE <span>|</span> NDA <span>|</span> CA/CS</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 2: AKASH -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">AKASH</span>
                            <div class="card-info-text">sikar, rajasthan</div>
                            <div class="card-info-text "
                                style="font-size: 10px; font-weight: 700; color: #000000;margin-bottom: 13px;">
                                NEET <span>|</span> IIT-JEE <span>|</span> NDA <span>|</span> CA/CS</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 3: UNACADEMY -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">UNACADEMY</span>
                            <div class="card-info-text">sikar, rajasthan</div>
                            <div class="card-info-text "
                                style="font-size: 10px; font-weight: 700; color: #000000;margin-bottom: 13px;">
                                NEET <span>|</span> IIT-JEE <span>|</span> NDA <span>|</span> CA/CS</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 4: PHYSICS WALLAH -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">ALPHYSICS WALLAHLEN</span>
                            <div class="card-info-text">sikar, rajasthan</div>
                            <div class="card-info-text "
                                style="font-size: 10px; font-weight: 700; color: #000000;margin-bottom: 13px;">
                                NEET <span>|</span> IIT-JEE <span>|</span> NDA <span>|</span> CA/CS</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 5: SRI CHAITANYA -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">SRI CHAITANYA</span>
                            <div class="card-info-text">sikar, rajasthan</div>
                            <div class="card-info-text "
                                style="font-size: 10px; font-weight: 700; color: #000000;margin-bottom: 13px;">
                                NEET <span>|</span> IIT-JEE <span>|</span> NDA <span>|</span> CA/CS</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card 6: WHITERAY -->
                    <div class="col">
                        <div class="institution-card position-relative">
                            <span class="rating-badge position-absolute">
                                <span>4.5 <span class="star-icon">★</span></span>
                            </span>
                            <div class="institution-logo-wrapper mx-auto mb-3">
                                <img src="{{ asset('assets/images/boarding-school-logo.png') }}" alt="">
                            </div>
                            <span class="badge-capsule mb-2">WHITERAY</span>
                            <div class="card-info-text">sikar, rajasthan</div>
                            <div class="card-info-text "
                                style="font-size: 10px; font-weight: 700; color: #000000;margin-bottom: 13px;">
                                NEET <span>|</span> IIT-JEE <span>|</span> NDA <span>|</span> CA/CS</div>
                            <a href="#" class="btn btn-enrollzy btn-enrollzy-sm w-100">
                                APPLY NOW
                                <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View More Button -->
                <div class="text-center">
                    <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                        View More
                        <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                    </button>
                </div>
            </div>
        </section>
    </div>

    <!-- Journey Section -->
    <section class="journey-section ptb-70">
        <div class="blue-shadow">
            <img src="{{ asset('assets/images/journey-blue-shadow.png') }}" alt="">
        </div>
        <div class="pink-shadow">
            <img src="{{ asset('assets/images/journey-pink-shadow.png') }}" alt="">
        </div>
        <div class="container-fluid">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <span class="marketplace-badge mb-3">Why choose enrollzy</span>
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Your step-by-step journey to success</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    We guide you from school to your dream career with personalised milestones, resources, and mentors
                    at every stage.
                </p>
            </div>

            <!-- Journey Steps Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4  mt-5 justify-content-center"
                style="margin-bottom:57px !important">
                <!-- Step 1 -->
                <div class="col journey-step-col">
                    <div class="journey-icon-wrapper">
                        <!-- Book SVG -->
                        <img src="{{ asset('assets/images/step-img-1.png') }}" alt="">
                    </div>
                    <h3 class="journey-step-title">Explore & Discover</h3>
                    <p class="journey-step-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>

                <!-- Step 2 -->
                <div class="col journey-step-col">
                    <div class="journey-icon-wrapper">
                        <!-- Cap SVG -->
                        <img src="{{ asset('assets/images/step-img-2.png') }}" alt="">
                    </div>
                    <h3 class="journey-step-title">Choose Institution</h3>
                    <p class="journey-step-desc">Compare & apply to best-fit <br> schools, coaching, or colleges</p>
                </div>
                <!-- Step 3 -->
                <div class="col journey-step-col">
                    <div class="journey-icon-wrapper">
                        <!-- Trophy SVG -->
                        <img src="{{ asset('assets/images/step-img-3.png') }}" alt="">
                    </div>
                    <h3 class="journey-step-title">Secure Funding</h3>
                    <p class="journey-step-desc">Apply for scholarships & financial <br> aid through Enrollzy</p>
                </div>
                <!-- Step 4 -->
                <div class="col journey-step-col">
                    <div class="journey-icon-wrapper">
                        <!-- Books SVG -->
                        <img src="{{ asset('assets/images/step-img-4.png') }}" alt="">
                    </div>
                    <h3 class="journey-step-title">Skill Up</h3>
                    <p class="journey-step-desc">Take certifications and courses <br> alongside academics</p>
                </div>
                <!-- Step 5 -->
                <div class="col journey-step-col">
                    <div class="journey-icon-wrapper">
                        <!-- Mentors SVG -->
                        <img src="{{ asset('assets/images/step-img-5.png') }}" alt="">
                    </div>
                    <h3 class="journey-step-title">Get a Mentor</h3>
                    <p class="journey-step-desc">1:1 sessions with industry experts <br> and alumni</p>
                </div>
                <!-- Step 6 -->
                <div class="col journey-step-col">
                    <div class="journey-icon-wrapper">
                        <!-- Briefcase SVG -->
                        <img src="{{ asset('assets/images/step-img-6.png') }}" alt="">
                    </div>
                    <h3 class="journey-step-title">Land the Job</h3>
                    <p class="journey-step-desc">Internships, placements, and <br> career support on one platform</p>
                </div>
            </div>

            <!-- Start Journey Button -->
            <div class="text-center">
                <a href="#" class="btn btn-enrollzy btn-enrollzy-lg">
                    Start your Journey
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Scholarships Section -->
    <section class="scholarships-section ptb-70"
        style="    background: linear-gradient(180deg, #FFFFFF 0%, #f8fbfd 49%, #f8fbfd 100%);">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <span class="marketplace-badge mb-3">Scholarships & Benefits</span>
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Don't miss out on free money</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    4,500+ scholarships worth over ₹200 Cr available. We match you automatically based on your profile.
                </p>
            </div>

            <!-- Scholarship Cards Grid -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                <!-- Card 1 -->
                <div class="col">
                    <div class="scholarship-card">
                        <div>
                            <h3 class="scholarship-title">PM Scholarship Scheme</h3>
                            <a href="#" class="scholarship-authority">Government of India · Central Sector Scheme</a>
                            <span class="scholarship-amount">₹75,000 <span
                                    style="font-size: 1rem; color: #777777; font-weight: 500;">/year</span></span>
                            <div class="scholarship-meta-row">
                                <span class="scholarship-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-mortarboard-fill text-muted" viewBox="0 0 16 16">
                                        <path
                                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.135 3.7A.5.5 0 0 0 0 6.18v3.135a2.5 2.5 0 0 0 .768 1.77L8 15.8l7.232-4.715A2.5 2.5 0 0 0 16 9.315V6.18a.5.5 0 0 0-.654-.473L8.211 2.047z" />
                                    </svg>
                                    Merit-based
                                </span>
                                <span class="scholarship-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-alarm-fill text-muted" viewBox="0 0 16 16">
                                        <path
                                            d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v.5H6zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86l.294.294a8.5 8.5 0 0 0-4.062 4.062l.241-.241zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527l-.241-.241a8.5 8.5 0 0 0-4.062-4.062zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.514l1.5-2.5A.5.5 0 0 0 8.5 9zM8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    </svg>
                                    Dec 31, 2026
                                </span>
                            </div>
                            <div class="scholarship-badges-row">
                                <span class="badge-stream">Any stream</span>
                                <span class="badge-income">Income &lt; ₹8L</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                            Check eligibility & Apply
                            <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                        </a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col">
                    <div class="scholarship-card">
                        <div>
                            <h3 class="scholarship-title">Tata Scholarship for Engineering</h3>
                            <a href="#" class="scholarship-authority">Government of India · Central Sector Scheme</a>
                            <span class="scholarship-amount">₹75,000 <span
                                    style="font-size: 1rem; color: #777777; font-weight: 500;">/year</span></span>
                            <div class="scholarship-meta-row">
                                <span class="scholarship-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-mortarboard-fill text-muted" viewBox="0 0 16 16">
                                        <path
                                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.135 3.7A.5.5 0 0 0 0 6.18v3.135a2.5 2.5 0 0 0 .768 1.77L8 15.8l7.232-4.715A2.5 2.5 0 0 0 16 9.315V6.18a.5.5 0 0 0-.654-.473L8.211 2.047z" />
                                    </svg>
                                    Merit-based
                                </span>
                                <span class="scholarship-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-alarm-fill text-muted" viewBox="0 0 16 16">
                                        <path
                                            d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v.5H6zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86l.294.294a8.5 8.5 0 0 0-4.062 4.062l.241-.241zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527l-.241-.241a8.5 8.5 0 0 0-4.062-4.062zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.514l1.5-2.5A.5.5 0 0 0 8.5 9zM8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    </svg>
                                    Dec 31, 2026
                                </span>
                            </div>
                            <div class="scholarship-badges-row">
                                <span class="badge-stream">Any stream</span>
                                <span class="badge-income">Income &lt; ₹8L</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                            Check eligibility & Apply
                            <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                        </a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col">
                    <div class="scholarship-card">
                        <div>
                            <h3 class="scholarship-title">Inspire Scholarship for Science</h3>
                            <a href="#" class="scholarship-authority">Government of India · Central Sector Scheme</a>
                            <span class="scholarship-amount">₹75,000 <span
                                    style="font-size: 1rem; color: #777777; font-weight: 500;">/year</span></span>
                            <div class="scholarship-meta-row">
                                <span class="scholarship-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-mortarboard-fill text-muted" viewBox="0 0 16 16">
                                        <path
                                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.135 3.7A.5.5 0 0 0 0 6.18v3.135a2.5 2.5 0 0 0 .768 1.77L8 15.8l7.232-4.715A2.5 2.5 0 0 0 16 9.315V6.18a.5.5 0 0 0-.654-.473L8.211 2.047z" />
                                    </svg>
                                    Merit-based
                                </span>
                                <span class="scholarship-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-alarm-fill text-muted" viewBox="0 0 16 16">
                                        <path
                                            d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v.5H6zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86l.294.294a8.5 8.5 0 0 0-4.062 4.062l.241-.241zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527l-.241-.241a8.5 8.5 0 0 0-4.062-4.062zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.514l1.5-2.5A.5.5 0 0 0 8.5 9zM8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    </svg>
                                    Dec 31, 2026
                                </span>
                            </div>
                            <div class="scholarship-badges-row">
                                <span class="badge-stream">Any stream</span>
                                <span class="badge-income">Income &lt; ₹8L</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                            Check eligibility & Apply
                            <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Trending Section -->
    <section class="trending-section ptb-70">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center" style="margin-bottom: 57px;">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Trending Learning Opportunities</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    Explore our popular certificates, credentials, and achievements.
                </p>
            </div>

            <!-- Outer 3 Columns Grid -->
            <div class="row row-cols-1 row-cols-lg-3 g-4">

                <!-- Column 1: Trending Skills -->
                <div class="col">
                    <div class="trending-column-container trending-border-blue">
                        <div class="trending-column-header text-primary">
                            <h3 class="trending-header-title mb-0">Trending Skills</h3>
                            <span class="trending-header-arrow"><i class="fa-solid fa-arrow-right-long"></i></span>
                        </div>
                        <div class="row row-cols-2" style="gap: 15px 0px;">
                            <!-- Skill Card 1 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Artificial Intelligence & Generative AI</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Skill Card 2 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Data Science & Analytics</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Skill Card 3 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cybersecurity & Ethical Hacking</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Skill Card 4 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cloud Computing & DevOps</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Skill Card 5 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cybersecurity & Ethical Hacking</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Skill Card 6 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cloud Computing & DevOps</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Free Courses -->
                <div class="col">
                    <div class="trending-column-container trending-border-yellow">
                        <div class="trending-column-header text-warning">
                            <h3 class="trending-header-title mb-0" style="color: #F9AD0B;">Free Courses
                            </h3>
                            <span class="trending-header-arrow"><i class="fa-solid fa-arrow-right-long"></i></span>
                        </div>
                        <div class="row row-cols-2" style="gap: 15px 0px;">
                            <!-- Course Card 1 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Artificial Intelligence & Generative AI</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Course Card 2 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Data Science & Analytics</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Course Card 3 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cybersecurity & Ethical Hacking</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Course Card 4 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cloud Computing & DevOps</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Course Card 5 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cybersecurity & Ethical Hacking</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Course Card 6 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cloud Computing & DevOps</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Trending Programmes -->
                <div class="col">
                    <div class="trending-column-container trending-border-dark">
                        <div class="trending-column-header text-dark">
                            <h3 class="trending-header-title mb-0" style="color: #000;">Trending Programmes</h3>
                            <span class="trending-header-arrow"><i class="fa-solid fa-arrow-right-long"></i></span>
                        </div>
                        <div class="row row-cols-2" style="gap: 15px 0px;">
                            <!-- Programme Card 1 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Artificial Intelligence & Generative AI</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Programme Card 2 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Data Science & Analytics</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Programme Card 3 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cybersecurity & Ethical Hacking</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Programme Card 4 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cloud Computing & DevOps</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Programme Card 5 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cybersecurity & Ethical Hacking</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Programme Card 6 -->
                            <div class="col">
                                <div class="skill-list-card">
                                    <div class="skill-card-icon-wrapper">
                                        <img src="{{ asset('assets/images/trending-ai-img.png') }}" alt="">
                                    </div>
                                    <h4 class="skill-card-title">Cloud Computing & DevOps</h4>
                                    <ul class="skill-list">
                                        <li class="skill-list-item">Learn AI tools</li>
                                        <li class="skill-list-item">automation</li>
                                        <li class="skill-list-item">prompt engineering</li>
                                        <li class="skill-list-item">future-ready AI technologies.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center" style="margin-top: 57px;">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Expert Mentors Section -->
    <section class="mentors-section ptb-70">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Expert Mentors</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    Learn from experienced professionals, industry leaders, and academic mentors dedicated to student
                    success.
                </p>
            </div>

            <!-- Mentors Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
                <!-- Mentor 1 -->
                <div class="col">
                    <div class="mentor-card">
                        <div class="mentor-img-wrapper">
                            <img src="{{ asset('assets/images/mentor-img-1.png') }}" alt="Abhishek Sharma" class="mentor-img">
                        </div>
                        <div class="mentor-card-body">
                            <div>
                                <h3 class="mentor-name">Abhishek Sharma</h3>
                                <p class="mentor-title">Product Manager · Google · IIM-A</p>
                                <div class="mentor-tags-row mb-3">
                                    <span class="badge-mentor-tag mentor-tag-blue">MBA Prep</span>
                                    <span class="badge-mentor-tag mentor-tag-orange">Product</span>
                                    <span class="badge-mentor-tag mentor-tag-green">Startups</span>
                                </div>
                            </div>
                            <div>
                                <div class="mentor-rating-row mb-3">
                                    <div class="mentor-rating">
                                        <span class="star-rating">★★★★★</span>
                                        <span class="rating-value ms-1">4.9</span>
                                    </div>
                                    <span class="mentor-sessions">280 sessions</span>
                                </div>
                                <div class="mentor-footer">
                                    <span class="mentor-price">₹500<span
                                            style="font-size: 0.72rem; color: #777777; font-weight: 600;">/min</span></span>
                                    <a href="#" class="btn btn-enrollzy btn-enrollzy-sm">
                                        Book session
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mentor 2 -->
                <div class="col">
                    <div class="mentor-card">
                        <div class="mentor-img-wrapper">
                            <img src="{{ asset('assets/images/mentor-img-2.png') }}" alt="Abhishek Sharma" class="mentor-img">
                        </div>
                        <div class="mentor-card-body">
                            <div>
                                <h3 class="mentor-name">Abhishek Sharma</h3>
                                <p class="mentor-title">Product Manager · Google · IIM-A</p>
                                <div class="mentor-tags-row mb-3">
                                    <span class="badge-mentor-tag mentor-tag-blue">MBA Prep</span>
                                    <span class="badge-mentor-tag mentor-tag-orange">Product</span>
                                    <span class="badge-mentor-tag mentor-tag-green">Startups</span>
                                </div>
                            </div>
                            <div>
                                <div class="mentor-rating-row mb-3">
                                    <div class="mentor-rating">
                                        <span class="star-rating">★★★★★</span>
                                        <span class="rating-value ms-1">4.9</span>
                                    </div>
                                    <span class="mentor-sessions">280 sessions</span>
                                </div>
                                <div class="mentor-footer">
                                    <span class="mentor-price">₹500<span
                                            style="font-size: 0.72rem; color: #777777; font-weight: 600;">/min</span></span>
                                    <a href="#" class="btn btn-enrollzy btn-enrollzy-sm">
                                        Book session
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mentor 3 -->
                <div class="col">
                    <div class="mentor-card">
                        <div class="mentor-img-wrapper">
                            <img src="{{ asset('assets/images/mentor-img-3.png') }}" alt="Abhishek Sharma" class="mentor-img">
                        </div>
                        <div class="mentor-card-body">
                            <div>
                                <h3 class="mentor-name">Abhishek Sharma</h3>
                                <p class="mentor-title">Product Manager · Google · IIM-A</p>
                                <div class="mentor-tags-row mb-3">
                                    <span class="badge-mentor-tag mentor-tag-blue">MBA Prep</span>
                                    <span class="badge-mentor-tag mentor-tag-orange">Product</span>
                                    <span class="badge-mentor-tag mentor-tag-green">Startups</span>
                                </div>
                            </div>
                            <div>
                                <div class="mentor-rating-row mb-3">
                                    <div class="mentor-rating">
                                        <span class="star-rating">★★★★★</span>
                                        <span class="rating-value ms-1">4.9</span>
                                    </div>
                                    <span class="mentor-sessions">280 sessions</span>
                                </div>
                                <div class="mentor-footer">
                                    <span class="mentor-price">₹500<span
                                            style="font-size: 0.72rem; color: #777777; font-weight: 600;">/min</span></span>
                                    <a href="#" class="btn btn-enrollzy btn-enrollzy-sm">
                                        Book session
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mentor 4 -->
                <div class="col">
                    <div class="mentor-card">
                        <div class="mentor-img-wrapper">
                            <img src="{{ asset('assets/images/mentor-img-4.png') }}" alt="Abhishek Sharma" class="mentor-img">
                        </div>
                        <div class="mentor-card-body">
                            <div>
                                <h3 class="mentor-name">Abhishek Sharma</h3>
                                <p class="mentor-title">Product Manager · Google · IIM-A</p>
                                <div class="mentor-tags-row mb-3">
                                    <span class="badge-mentor-tag mentor-tag-blue">MBA Prep</span>
                                    <span class="badge-mentor-tag mentor-tag-orange">Product</span>
                                    <span class="badge-mentor-tag mentor-tag-green">Startups</span>
                                </div>
                            </div>
                            <div>
                                <div class="mentor-rating-row mb-3">
                                    <div class="mentor-rating">
                                        <span class="star-rating">★★★★★</span>
                                        <span class="rating-value ms-1">4.9</span>
                                    </div>
                                    <span class="mentor-sessions">280 sessions</span>
                                </div>
                                <div class="mentor-footer">
                                    <span class="mentor-price">₹500<span
                                            style="font-size: 0.72rem; color: #777777; font-weight: 600;">/min</span></span>
                                    <a href="#" class="btn btn-enrollzy btn-enrollzy-sm">
                                        Book session
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ Zone Section -->
    <section class="faq-zone-section ptb-70">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">The FAQ Zone</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    What our students and parents have to say about their experience with us.
                </p>
            </div>

            <!-- FAQ Accordion -->
            <div class="accordion accordion-flush mx-auto mb-5" id="faqZoneAccordion" style="max-width: 900px;">
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            How does Enrollzy help students choose the right course or university?
                        </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Enrollzy offers personalized matching algorithms, detailed institution comparison tools,
                            expert mentor advice, and comprehensive resource guides to help you evaluate and choose the
                            best path.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can I compare universities and courses on Enrollzy?
                        </button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Yes, students can compare universities based on fees, placements, rankings, approvals,
                            scholarships, course structure, and career opportunities before making a decision.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Does Enrollzy provide admission assistance?
                        </button>
                    </h3>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Yes, Enrollzy offers admission support including application form filling, document review,
                            and guidance through the admission processes of partner schools and colleges.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Can I talk to alumni or industry experts before taking admission?
                        </button>
                    </h3>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Yes, you can schedule 1:1 mentorship sessions with verified alumni and industry leaders on
                            the Enrollzy platform to get real insights before committing.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 5 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Lorem ipsum dolor sit ame
                        </button>
                    </h3>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 6 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Lorem ipsum dolor sit ame
                        </button>
                    </h3>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 7 -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingSeven">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            Lorem ipsum dolor sit ame
                        </button>
                    </h3>
                    <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven"
                        data-bs-parent="#faqZoneAccordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Top Exams Section -->
    <section class="top-exams-section ptb-70">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Top Exams</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    Prepare for the top competitive exams in the country.
                </p>
            </div>

            <!-- Exams Grid -->
            <div class="row row-cols-1 row-cols-md-3 g-5 mb-5 justify-content-center">
                <!-- Exam 1 -->
                <div class="col text-center">
                    <div class="exam-icon-wrapper">
                        <!-- Notebook Icon SVG -->
                        <img src="{{ asset('assets/images/top-exam-icon-1.png') }}" alt="">
                    </div>
                    <h3 class="exam-title">Joint Entrance Examination <br> MAINS</h3>
                    <p class="exam-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>
                <!-- Exam 2 -->
                <div class="col text-center">
                    <div class="exam-icon-wrapper">
                        <!-- School Icon SVG -->
                        <img src="{{ asset('assets/images/top-exam-icon-2.png') }}" alt="">
                    </div>
                    <h3 class="exam-title">National Eligibility cum Entrance <br> Test (Undergraduate)</h3>
                    <p class="exam-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>
                <!-- Exam 3 -->
                <div class="col text-center">
                    <div class="exam-icon-wrapper">
                        <!-- Trophy Icon SVG -->
                        <img src="{{ asset('assets/images/top-exam-icon-3.png') }}" alt="">
                    </div>
                    <h3 class="exam-title">Graduate Aptitude Test in <br> Engineering</h3>
                    <p class="exam-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>
                <!-- Exam 4 -->
                <div class="col text-center">
                    <div class="exam-icon-wrapper">
                        <!-- Stacked Books Icon SVG -->
                        <img src="{{ asset('assets/images/top-exam-icon-4.png') }}" alt="">
                    </div>
                    <h3 class="exam-title">National Eligibility cum <br> Entrance Test – Postgraduate</h3>
                    <p class="exam-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>
                <!-- Exam 5 -->
                <div class="col text-center">
                    <div class="exam-icon-wrapper">
                        <!-- Laptop Users Icon SVG -->
                        <img src="{{ asset('assets/images/top-exam-icon-5.png') }}" alt="">
                    </div>
                    <h3 class="exam-title">Common University Entrance <br> Test – Postgraduate</h3>
                    <p class="exam-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>
                <!-- Exam 6 -->
                <div class="col text-center">
                    <div class="exam-icon-wrapper">
                        <!-- Briefcase Icon SVG -->
                        <img src="{{ asset('assets/images/top-exam-icon-6.png') }}" alt="">
                    </div>
                    <h3 class="exam-title">Xavier Aptitude Test</h3>
                    <p class="exam-desc">Find your interests and aptitude <br> through guided assessments</p>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center" style="margin-top: 57px;">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <div class="grad-main"
        style="background: linear-gradient(180deg, rgba(191, 219, 247, 0) 0%, rgb(191 219 247 / 30%) 50%, rgba(191, 219, 247, 0) 100%)">
        <!-- Questions & Answers Section -->
        <section class="qa-section ptb-70">
            <div class="container">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                        <span class="heading-line d-none d-md-block"></span>
                        <h2 class="section-title mb-0">Questions & Answers</h2>
                        <span class="heading-line d-none d-md-block"></span>
                    </div>
                    <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                        Here are some of the most commonly asked questions by our prospective students.
                    </p>
                </div>

                <!-- Q&A Content Row -->
                <div class="row g-5 align-items-center">
                    <!-- Left Column: Image with Badges -->
                    <div class="col-lg-5">
                        <img src="{{ asset('assets/images/qa-img.png') }}" alt="">
                    </div>

                    <!-- Right Column: Question Cards -->
                    <div class="col-lg-7">
                        <!-- Card 1 -->
                        <div class="qa-right-card-box-main">
                            <div class="qa-question-card">
                                <h3 class="qa-question-text">Can I compare universities and courses on Enrollzy?</h3>
                                <p class="qa-answer-text">
                                    Yes, students can compare universities based on fees, placements, rankings,
                                    approvals,
                                    scholarships, course structure, and career opportunities before making a decision.
                                </p>
                            </div>
                            <!-- Card 2 -->
                            <div class="qa-right-card-box">
                                <div class="qa-question-card">
                                    <h3 class="qa-question-text">Can I compare universities and courses on Enrollzy?
                                    </h3>
                                    <p class="qa-answer-text">
                                        Yes, students can compare universities based on fees, placements, rankings,
                                        approvals,
                                        scholarships, course structure, and career opportunities before making a
                                        decision.
                                    </p>
                                </div>
                                <!-- Card 3 -->
                                <div class="qa-right-card-box">
                                    <div class="qa-question-card">
                                        <h3 class="qa-question-text">Can I compare universities and courses on Enrollzy?
                                        </h3>
                                        <p class="qa-answer-text">
                                            Yes, students can compare universities based on fees, placements, rankings,
                                            approvals,
                                            scholarships, course structure, and career opportunities before making a
                                            decision.
                                        </p>
                                    </div>
                                    <!-- Card 4 (Collapsed) -->
                                    <div class="qa-right-card-box">
                                        <div class="qa-question-card">
                                            <h3 class="qa-question-text">Can I compare universities and courses on
                                                Enrollzy?</h3>
                                            <p class="qa-answer-text">
                                                Yes, students can compare universities based on fees, placements,
                                                rankings, approvals,
                                                scholarships, course structure, and career opportunities before making a
                                                decision.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Card 5 (Collapsed) -->
                                    <div class="qa-right-card-box">
                                        <div class="qa-question-card">
                                            <h3 class="qa-question-text">Can I compare universities and courses on
                                                Enrollzy?</h3>
                                            <p class="qa-answer-text">
                                                Yes, students can compare universities based on fees, placements,
                                                rankings, approvals,
                                                scholarships, course structure, and career opportunities before making a
                                                decision.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Card 6 (Collapsed) -->
                                    <div class="qa-right-card-box">
                                        <div class="qa-question-card">
                                            <h3 class="qa-question-text">Can I compare universities and courses on
                                                Enrollzy?</h3>
                                            <p class="qa-answer-text">
                                                Yes, students can compare universities based on fees, placements,
                                                rankings, approvals,
                                                scholarships, course structure, and career opportunities before making a
                                                decision.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Card 7 (Collapsed) -->
                                    <div class="qa-right-card-box">
                                        <div class="qa-question-card">
                                            <h3 class="qa-question-text">Can I compare universities and courses on
                                                Enrollzy?</h3>
                                            <p class="qa-answer-text">
                                                Yes, students can compare universities based on fees, placements,
                                                rankings, approvals,
                                                scholarships, course structure, and career opportunities before making a
                                                decision.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Book Now Button -->
                        </div>

                    </div>
                    <div class="col-md-12"></div>
                    <div class="text-center mt-5">
                        <a href="#" class="btn btn-enrollzy btn-enrollzy-lg">
                            Book Now
                            <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Latest Blog Section -->
        <section class="blog-section ptb-70">
            <div class="container">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                        <span class="heading-line d-none d-md-block"></span>
                        <h2 class="section-title mb-0">Our Latest Blog</h2>
                        <span class="heading-line d-none d-md-block"></span>
                    </div>
                    <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                        What our students and parents have to say about their experience with us.
                    </p>
                </div>

                <!-- Blog Grid -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
                    <!-- Blog 1 -->
                    <div class="col">
                        <div class="blog-card">
                            <div class="blog-img-wrapper">
                                <img src="{{ asset('assets/images/blog-img-1.png') }}" alt="BBA vs BCom vs BA" class="blog-img">
                            </div>
                            <div class="blog-card-body">
                                <div>
                                    <span class="blog-tag">Technology</span>
                                    <h3 class="blog-title">BBA vs BCom vs BA: Which Course is Better for Your Care...
                                    </h3>
                                </div>
                                <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                                    Read more
                                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog 2 -->
                    <div class="col">
                        <div class="blog-card">
                            <div class="blog-img-wrapper">
                                <img src="{{ asset('assets/images/blog-img-2.png') }}" alt="Best Online Courses" class="blog-img">
                            </div>
                            <div class="blog-card-body">
                                <div>
                                    <span class="blog-tag">Technology</span>
                                    <h3 class="blog-title">Best Online Courses After Graduation for High Salary Ca...
                                    </h3>
                                </div>
                                <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                                    Read more
                                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog 3 -->
                    <div class="col">
                        <div class="blog-card">
                            <div class="blog-img-wrapper">
                                <img src="{{ asset('assets/images/blog-img-3.png') }}" alt="Best AI Courses" class="blog-img">
                            </div>
                            <div class="blog-card-body">
                                <div>
                                    <span class="blog-tag">Technology</span>
                                    <h3 class="blog-title">Best AI Courses After 12th?</h3>
                                </div>
                                <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                                    Read more
                                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog 4 -->
                    <div class="col">
                        <div class="blog-card">
                            <div class="blog-img-wrapper">
                                <img src="{{ asset('assets/images/blog-img-4.png') }}" alt="Online MBA in India" class="blog-img">
                            </div>
                            <div class="blog-card-body">
                                <div>
                                    <span class="blog-tag">Technology</span>
                                    <h3 class="blog-title">Online MBA in India: Complete Guide 2026 (Fees, College...
                                    </h3>
                                </div>
                                <a href="#" class="btn btn-enrollzy btn-enrollzy-md w-100">
                                    Read more
                                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View More Button -->
                <div class="text-center">
                    <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                        View More
                        <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                    </button>
                </div>
            </div>
        </section>
    </div>

    <!-- Testimonials Section -->
    <section class="testimonials-section ptb-70" style="background-color: #FFFCF8;">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Testimonials</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    What our students and parents have to say about their experience with us.
                </p>
            </div>

            <!-- Video Cards Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
                <!-- Video 1 -->
                <div class="col">
                    <div class="testimonial-card" style="background-image: url('{{ asset('assets/images/mentor_1.png') }}');">
                        <div class="testimonial-overlay"></div>
                        <button class="play-icon-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                            </svg>
                        </button>
                        <div class="testimonial-card-body">
                            <h3 class="testimonial-name">Abhishek sharma</h3>
                            <p class="testimonial-sub">PHD Admission Success</p>
                            <div class="testimonial-rating">★★★★★</div>
                        </div>
                    </div>
                </div>
                <!-- Video 2 -->
                <div class="col">
                    <div class="testimonial-card" style="background-image: url('{{ asset('assets/images/mentor_2.png') }}');">
                        <div class="testimonial-overlay"></div>
                        <button class="play-icon-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                            </svg>
                        </button>
                        <div class="testimonial-card-body">
                            <h3 class="testimonial-name">Abhishek sharma</h3>
                            <p class="testimonial-sub">PHD Admission Success</p>
                            <div class="testimonial-rating">★★★★★</div>
                        </div>
                    </div>
                </div>
                <!-- Video 3 -->
                <div class="col">
                    <div class="testimonial-card" style="background-image: url('{{ asset('assets/images/mentor_3.png') }}');">
                        <div class="testimonial-overlay"></div>
                        <button class="play-icon-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                            </svg>
                        </button>
                        <div class="testimonial-card-body">
                            <h3 class="testimonial-name">Abhishek sharma</h3>
                            <p class="testimonial-sub">PHD Admission Success</p>
                            <div class="testimonial-rating">★★★★★</div>
                        </div>
                    </div>
                </div>
                <!-- Video 4 -->
                <div class="col">
                    <div class="testimonial-card" style="background-image: url('{{ asset('assets/images/mentor_4.png') }}');">
                        <div class="testimonial-overlay"></div>
                        <button class="play-icon-btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                            </svg>
                        </button>
                        <div class="testimonial-card-body">
                            <h3 class="testimonial-name">Abhishek sharma</h3>
                            <p class="testimonial-sub">PHD Admission Success</p>
                            <div class="testimonial-rating">★★★★★</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center" style="margin-top:76px;">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Student Insights & Feedback Section -->
    <section class="feedback-section ptb-70" style="background:#FFFCF8;">
        <div class="container">
            <div class="text-center mb-5">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Student Insights & Feedback</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    What our students and parents have to say about their experience with us.
                </p>
            </div>

            <!-- Section Header + Nav Buttons -->
            <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">

                <div class="carousel-nav-container"
                    style="width: 100%;justify-content:space-between;padding:0px 50px 0px 50px;">
                    <a href="#" class="carousel-nav-btn feedback-prev-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                    </a>
                    <a href="#" class="carousel-nav-btn feedback-next-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Feedback Cards Swiper -->
            <div class="swiper feedback-swiper" style="overflow: hidden;padding:0px 50px 100px 50px;">
                <div class="swiper-wrapper">
                    <!-- Feedback 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="feedback-card">
                            <div>
                                <div class="feedback-rating">★★★★★</div>
                                <p class="feedback-text">
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                            <div class="feedback-author-row">
                                <img src="{{ asset('assets/images/mentor_2.png') }}" alt="User Profile" class="feedback-avatar">
                                <div>
                                    <h4 class="feedback-author-name">Serhiy Hipskyy</h4>
                                    <span class="feedback-author-title">CEO Universal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="feedback-card">
                            <div>
                                <div class="feedback-rating">★★★★★</div>
                                <p class="feedback-text">
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                            <div class="feedback-author-row">
                                <img src="{{ asset('assets/images/mentor_3.png') }}" alt="User Profile" class="feedback-avatar">
                                <div>
                                    <h4 class="feedback-author-name">Justus Menke</h4>
                                    <span class="feedback-author-title">CEO Eronaman</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="feedback-card">
                            <div>
                                <div class="feedback-rating">★★★★★</div>
                                <p class="feedback-text">
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                            <div class="feedback-author-row">
                                <img src="{{ asset('assets/images/mentor_4.png') }}" alt="User Profile" class="feedback-avatar">
                                <div>
                                    <h4 class="feedback-author-name">Britain Eriksen</h4>
                                    <span class="feedback-author-title">CEO Universal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="feedback-card">
                            <div>
                                <div class="feedback-rating">★★★★★</div>
                                <p class="feedback-text">
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                            <div class="feedback-author-row">
                                <img src="{{ asset('assets/images/mentor_2.png') }}" alt="User Profile" class="feedback-avatar">
                                <div>
                                    <h4 class="feedback-author-name">Serhiy Hipskyy</h4>
                                    <span class="feedback-author-title">CEO Universal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="feedback-card">
                            <div>
                                <div class="feedback-rating">★★★★★</div>
                                <p class="feedback-text">
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                            <div class="feedback-author-row">
                                <img src="{{ asset('assets/images/mentor_3.png') }}" alt="User Profile" class="feedback-avatar">
                                <div>
                                    <h4 class="feedback-author-name">Justus Menke</h4>
                                    <span class="feedback-author-title">CEO Eronaman</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="feedback-card">
                            <div>
                                <div class="feedback-rating">★★★★★</div>
                                <p class="feedback-text">
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                            <div class="feedback-author-row">
                                <img src="{{ asset('assets/images/mentor_4.png') }}" alt="User Profile" class="feedback-avatar">
                                <div>
                                    <h4 class="feedback-author-name">Britain Eriksen</h4>
                                    <span class="feedback-author-title">CEO Universal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Find The Perfect University For You Section -->
    <section class="perfect-university-section ptb-70" style="padding-bottom: 27px;">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-4">
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Find The Perfect University For You</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    Discover top universities, exams, and opportunities in your preferred field.
                </p>
            </div>

            <!-- Category Tabs Navigation -->
            <div class="mb-5 m-auto">
                <ul class="perfect-univ-tabs nav  m-auto" role="tablist" id="perfectUnivTabs">
                    <li role="presentation"><a href="#tab-medical" class="perfect-univ-tab active" data-bs-toggle="tab"
                            role="tab" aria-selected="true">&lt; Medical</a></li>
                    <li role="presentation"><a href="#tab-science" class="perfect-univ-tab" data-bs-toggle="tab"
                            role="tab" aria-selected="false">Science</a></li>
                    <li role="presentation"><a href="#tab-hotel" class="perfect-univ-tab" data-bs-toggle="tab"
                            role="tab" aria-selected="false">Hotel Management</a></li>
                    <li role="presentation"><a href="#tab-it" class="perfect-univ-tab" data-bs-toggle="tab" role="tab"
                            aria-selected="false">Information Technology</a></li>
                    <li role="presentation"><a href="#tab-arts" class="perfect-univ-tab" data-bs-toggle="tab" role="tab"
                            aria-selected="false">Arts & Humanities</a></li>
                    <li role="presentation"><a href="#tab-agri" class="perfect-univ-tab" data-bs-toggle="tab" role="tab"
                            aria-selected="false">Agriculture</a></li>
                    <li role="presentation"><a href="#tab-law" class="perfect-univ-tab" data-bs-toggle="tab" role="tab"
                            aria-selected="false">Law</a></li>
                    <li role="presentation"><a href="#tab-pharmacy" class="perfect-univ-tab" data-bs-toggle="tab"
                            role="tab" aria-selected="false">Pharmacy</a></li>
                    <li role="presentation"><a href="#tab-education" class="perfect-univ-tab" data-bs-toggle="tab"
                            role="tab" aria-selected="false">Education &gt;</a></li>
                </ul>
            </div>

            <!-- Perfect Match Box Grid -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-medical" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid"
                                        style="padding: 10px 12px;border-radius: 10px;background-color: #fff;border: 1px solid #DDDDDD;">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header" style="margin-bottom:10px;">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid"
                                        style="padding: 10px 12px;border-radius: 10px;background-color: #fff;border: 1px solid #DDDDDD;">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-science" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-hotel" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-it" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-arts" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-agri" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-law" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pharmacy" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-education" role="tabpanel">
                    <div class="row row-cols-1 row-cols-lg-3 g-4">
                        <!-- Column 1: Featured Colleges -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Featured Colleges</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">Chitkara University</span>
                                    <span class="badge-univ-pill">Parul University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">K.R. Mangalam University</span>
                                    <span class="badge-univ-pill">Chandigarh University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Important Exams & Top States -->
                        <div class="col">
                            <div class="d-flex flex-column gap-4 h-100">
                                <!-- Box A: Important Exams -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Important Exams</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">JEE Main</span>
                                        <span class="badge-univ-pill">JEE Advanced</span>
                                        <span class="badge-univ-pill">EAMCET</span>
                                        <span class="badge-univ-pill">WBJEE</span>
                                    </div>
                                </div>
                                <!-- Box B: Top States -->
                                <div class="perfect-match-box" style="flex: 1;">
                                    <div class="perfect-match-header">
                                        <h3 class="perfect-match-title mb-0">Top States</h3>
                                        <a href="#" class="btn-view-all-link">View all</a>
                                    </div>
                                    <div class="perfect-badges-grid">
                                        <span class="badge-univ-pill">Maharashtra</span>
                                        <span class="badge-univ-pill">Tamilnadu</span>
                                        <span class="badge-univ-pill">Uttar Pradesh</span>
                                        <span class="badge-univ-pill">Punjab</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3: Related Courses -->
                        <div class="col">
                            <div class="perfect-match-box">
                                <div class="perfect-match-header">
                                    <h3 class="perfect-match-title mb-0">Related Courses</h3>
                                    <a href="#" class="btn-view-all-link">View all</a>
                                </div>
                                <div class="perfect-badges-grid">
                                    <span class="badge-univ-pill">B tech</span>
                                    <span class="badge-univ-pill">M tech</span>
                                    <span class="badge-univ-pill">Bachelor of Engineering</span>
                                    <span class="badge-univ-pill">Civil Engineering</span>
                                    <span class="badge-univ-pill">Lovely University</span>
                                    <span class="badge-univ-pill">Sanskriti University</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="compare-banner">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-8 d-flex align-items-center gap-4 flex-wrap flex-md-nowrap">
                    <div class="qa-avatars-row">
                        <img src="{{ asset('assets/images/compare-banner-img.png') }}" alt="">
                    </div>
                    <div>
                        <h3 class="compare-banner-heading">Confused Between Colleges?</h3>
                        <p class="compare-banner-sub mb-0">Compare fees, placements & courses in one-click!</p>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="#" class="btn btn-enrollzy btn-enrollzy-white btn-enrollzy-md">
                        Compare Now
                        <i class="fa-solid fa-arrow-right-long" style="color: #000;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Compare Banner & Trending Courses Section -->
    <section class="compare-courses-section ptb-70">
        <div class="container">
            <!-- Part A: Confused Between Colleges Banner -->


            <!-- Part B: Trending Courses -->
            <div class="text-center" style="margin-bottom: 57px;">
                <span class="marketplace-badge mb-3">Trending Courses</span>
                <div class="heading-with-lines d-flex align-items-center justify-content-center gap-3 mb-3">
                    <span class="heading-line d-none d-md-block"></span>
                    <h2 class="section-title mb-0">Build skills employers actually want</h2>
                    <span class="heading-line d-none d-md-block"></span>
                </div>
                <p class="section-subtitle mx-auto text-muted" style="max-width: 900px;">
                    Prepare for the top competitive exams in the country.
                </p>
            </div>

            <!-- Course Cards Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3 mb-5">
                <!-- Course 1 -->
                <div class="col">
                    <div class="course-card">
                        <img src="{{ asset('assets/images/training-course-img.png') }}" alt="Course circular icon"
                            class="course-img-circular">
                        <h3 class="course-title">AI & Machine Learning</h3>
                        <span class="course-instructor">Andrew Ng · Coursera</span>
                        <div class="course-footer">
                            <span class="star-rating">★★★★★ <span class="text-dark">4.9</span></span>
                            <span class="text-primary">₹3,499</span>
                        </div>
                    </div>
                </div>
                <!-- Course 2 -->
                <div class="col">
                    <div class="course-card">
                        <img src="{{ asset('assets/images/training-course-img.png') }}" alt="Course circular icon"
                            class="course-img-circular">
                        <h3 class="course-title">Full Stack Web Dev</h3>
                        <span class="course-instructor">Andrew Ng · Coursera</span>
                        <div class="course-footer">
                            <span class="star-rating">★★★★★ <span class="text-dark">4.9</span></span>
                            <span class="text-primary">₹3,499</span>
                        </div>
                    </div>
                </div>
                <!-- Course 3 -->
                <div class="col">
                    <div class="course-card">
                        <img src="{{ asset('assets/images/training-course-img.png') }}" alt="Course circular icon"
                            class="course-img-circular">
                        <h3 class="course-title">Full Stack Web Dev</h3>
                        <span class="course-instructor">Andrew Ng · Coursera</span>
                        <div class="course-footer">
                            <span class="star-rating">★★★★★ <span class="text-dark">4.9</span></span>
                            <span class="text-primary">₹3,499</span>
                        </div>
                    </div>
                </div>
                <!-- Course 4 -->
                <div class="col">
                    <div class="course-card">
                        <img src="{{ asset('assets/images/training-course-img.png') }}" alt="Course circular icon"
                            class="course-img-circular">
                        <h3 class="course-title">UI/UX Design</h3>
                        <span class="course-instructor">Andrew Ng · Coursera</span>
                        <div class="course-footer">
                            <span class="star-rating">★★★★★ <span class="text-dark">4.9</span></span>
                            <span class="text-primary">₹3,499</span>
                        </div>
                    </div>
                </div>
                <!-- Course 5 -->
                <div class="col">
                    <div class="course-card">
                        <img src="{{ asset('assets/images/training-course-img.png') }}" alt="Course circular icon"
                            class="course-img-circular">
                        <h3 class="course-title">Digital Marketing</h3>
                        <span class="course-instructor">Andrew Ng · Coursera</span>
                        <div class="course-footer">
                            <span class="star-rating">★★★★★ <span class="text-dark">4.9</span></span>
                            <span class="text-primary">₹3,499</span>
                        </div>
                    </div>
                </div>
                <!-- Course 6 -->
                <div class="col">
                    <div class="course-card">
                        <img src="{{ asset('assets/images/training-course-img.png') }}" alt="Course circular icon"
                            class="course-img-circular">
                        <h3 class="course-title">AI & Machine Learning</h3>
                        <span class="course-instructor">Andrew Ng · Coursera</span>
                        <div class="course-footer">
                            <span class="star-rating">★★★★★ <span class="text-dark">4.9</span></span>
                            <span class="text-primary">₹3,499</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Button -->
            <div class="text-center">
                <button class="btn btn-enrollzy btn-enrollzy-lg" type="button">
                    View More
                    <i class="fa-solid fa-arrow-right-long" style="color: #fff;"></i>
                </button>
            </div>
        </div>
    </section>


    <!-- Let's Get in Touch Section -->

    <section class="contact-section ptb-70">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Left Column: Sliced Photo + Overlays -->
                <div class="col-lg-5">
                    <div class="contact-sliced-container">
                        <img src="{{ asset('assets/images/get-in-touch-img.png') }}" alt="">
                    </div>
                </div>

                <!-- Right Column: Let's Get in Touch Form -->
                <div class="col-lg-7">
                    <div class="contact-form-wrapper p-4 p-md-5 rounded-4 shadow-sm border">
                        <h2 class="section-title mb-2 text-start" style="font-size: 2.2rem;">Let’s Get in Touch</h2>
                        <p class="text-muted mb-4">Leave us a message and our advisors will get back to you shortly.
                        </p>

                        <form>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="studentName" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="studentName"
                                        placeholder="Enter your name">
                                </div>
                                <div class="col-md-6">
                                    <label for="studentPhone" class="form-label">Student Phone Number</label>
                                    <input type="tel" class="form-control" id="studentPhone"
                                        placeholder="Enter your Phone Number">
                                </div>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="lookingFor" class="form-label">I'm looking for</label>
                                    <select class="form-select" id="lookingFor">
                                        <option selected>School Admission</option>
                                        <option value="1">Coaching Institutes</option>
                                        <option value="2">Scholarships Info</option>
                                        <option value="3">1:1 Mentorship</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="sessionTime" class="form-label">Preferred session time</label>
                                    <select class="form-select" id="sessionTime">
                                        <option selected>Today, 3PM - 5PM</option>
                                        <option value="1">Tomorrow, 10AM - 12PM</option>
                                        <option value="2">Tomorrow, 3PM - 5PM</option>
                                        <option value="3">Saturday, 11AM - 1PM</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" text-center">
                                <button type="submit" class="btn btn-enrollzy btn-enrollzy-lg">
                                    Book my free session
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Curved Footer Section -->
    <footer class="footer-gradient-wrapper ptb-70 ">


        <!-- Floating Asterisk Shape -->


        <div class="container">
            <div class="footer-card">
                <div class="row g-5">
                    <!-- Left Column: Branding, Contact & Socials -->
                    <div class="col-lg-4">
                        <!-- Brand Logo -->
                        <a href="#" class="d-flex align-items-center mb-3 text-decoration-none">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="" style="    width: 246px;">
                        </a>
                        <!-- Tech description -->
                        <p class="text-muted mb-4"
                            style="font-size: 14px; line-height: 1.5; font-weight: 500;color: #777777 !important;">
                            Enrollzy, a DPIIT-recognized education technology platform, enables students to explore,
                            compare, and access quality education opportunities with transparency and confidence.
                        </p>

                        <!-- Contact lists -->
                        <div class="footer-contact-item">
                            <span class="footer-contact-label">CONTACT US:</span>
                            <a href="mailto:info@enrollzy.com"
                                class="footer-contact-value text-decoration-none">info@enrollzy.com</a>
                        </div>
                        <div class="footer-contact-item d-flex align-items-start">
                            <span class="footer-contact-label mt-1">OUR ADDRESS:</span>
                            <span class="footer-contact-value" style="max-width: 220px; line-height: 1.4;">
                                Workaholics Workzone, SCO 364-365-366 Second Floor, Sector 34A, Chandigarh, 160022
                            </span>
                        </div>

                        <!-- Socials -->
                        <div class="footer-contact-item d-flex align-items-center gap-2 mt-4">
                            <span class="footer-contact-label">CONNECT US:</span>
                            <div class="social-icons-list">
                                <a href="#" class="social-icon-circle social-twitter">
                                    <img src="{{ asset('assets/images/twitter-icon.png') }}" alt="">
                                </a>
                                <a href="#" class="social-icon-circle social-instagram">
                                    <img src="{{ asset('assets/images/footer-insta-icon.png') }}" alt="">
                                </a>
                                <a href="#" class="social-icon-circle social-facebook">
                                    <img src="{{ asset('assets/images/footer-facebook-icon.png') }}" alt="">
                                </a>
                                <a href="#" class="social-icon-circle social-linkedin">
                                    <img src="{{ asset('assets/images/footer-linkdin-icon.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Banner & link directory -->
                    <div class="col-lg-8">
                        <!-- Top Banner SVG illustration -->
                        <div class="footer-banner-box">
                            <img src="{{ asset('assets/images/footer-rect-img.png') }}" alt="" style="width: 100%;">
                        </div>

                        <!-- 4 columns directories -->
                        <div class="row row-cols-2 row-cols-sm-4 g-4">
                            <!-- Col 1 -->
                            <div class="col">
                                <h3 class="footer-link-heading mb-3">
                                    Universities <span class="footer-heading-line"></span>
                                </h3>
                                <ul class="footer-links">
                                    <li><a href="#">Partner Universities</a></li>
                                    <li><a href="#">Online Universities</a></li>
                                    <li><a href="#">Top Ranked Universities</a></li>
                                    <li><a href="#">University Comparison</a></li>
                                    <li><a href="#">Trending Programs</a></li>
                                </ul>
                            </div>
                            <!-- Col 2 -->
                            <div class="col">
                                <h3 class="footer-link-heading mb-3">
                                    Student Support <span class="footer-heading-line"></span>
                                </h3>
                                <ul class="footer-links">
                                    <li><a href="#">Partner Universities</a></li>
                                    <li><a href="#">Online Universities</a></li>
                                    <li><a href="#">Top Ranked Universities</a></li>
                                    <li><a href="#">University Comparison</a></li>
                                    <li><a href="#">Trending Programs</a></li>
                                </ul>
                            </div>
                            <!-- Col 3 -->
                            <div class="col">
                                <h3 class="footer-link-heading mb-3">
                                    Student Support <span class="footer-heading-line"></span>
                                </h3>
                                <ul class="footer-links">
                                    <li><a href="#">Partner Universities</a></li>
                                    <li><a href="#">Online Universities</a></li>
                                    <li><a href="#">Top Ranked Universities</a></li>
                                    <li><a href="#">University Comparison</a></li>
                                    <li><a href="#">Trending Programs</a></li>
                                </ul>
                            </div>
                            <!-- Col 4 -->
                            <div class="col">
                                <h3 class="footer-link-heading mb-3">
                                    Universities <span class="footer-heading-line"></span>
                                </h3>
                                <ul class="footer-links">
                                    <li><a href="#">Partner Universities</a></li>
                                    <li><a href="#">Online Universities</a></li>
                                    <li><a href="#">Top Ranked Universities</a></li>
                                    <li><a href="#">University Comparison</a></li>
                                    <li><a href="#">Trending Programs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Divider -->
                <div class="footer-divider"></div>

                <!-- Copyright row -->
                <p class="footer-copyright">
                    © 2026 Uniband8 Education Technology Pvt. Ltd. <br> All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>
    <div class="footer-vector">
        <img src="{{ asset('assets/images/footer-vector.png') }}" alt="">
    </div>
    <div class="bottom-gradient-div ptb-70 pt-0"></div>
    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Swiper Slider JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hero Image Swiper
            const heroSwiper = new Swiper('.hero-swiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.carousel-dots',
                    bulletClass: 'dot',
                    bulletActiveClass: 'active',
                    clickable: true,
                }
            });

            // Student Insights & Feedback Swiper
            const feedbackSwiper = new Swiper('.feedback-swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    nextEl: '.feedback-next-btn',
                    prevEl: '.feedback-prev-btn',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    }
                }
            });
        });
        (function () {
            const slider = document.getElementById('perfectUnivTabs');
            let isDown = false;
            let startX;
            let scrollLeft;
            let moved = false;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                moved = false;
                slider.classList.add('dragging');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });

            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('dragging');
            });

            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('dragging');
            });

            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = x - startX;
                if (Math.abs(walk) > 5) moved = true; // threshold so clicks still register as clicks
                slider.scrollLeft = scrollLeft - walk;
            });

            // Prevent tab click from firing right after a drag
            slider.addEventListener('click', (e) => {
                if (moved) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }, true);
        })();
        (function () {
            const megaMenu = document.querySelector('.mega-menu-wrapper');
            if (!megaMenu) return;

            const triggerItems = document.querySelectorAll('.nav-item[data-tab-trigger]');
            let hideTimeout;

            function showMenu(tabId) {
                clearTimeout(hideTimeout);
                megaMenu.classList.add('show-mega');

                // Switch tab sidebar and content panel
                const sidebarItem = megaMenu.querySelector(`.mega-sidebar-item[data-mega-tab="${tabId}"]`);
                if (sidebarItem) {
                    // Remove active classes
                    megaMenu.querySelectorAll('.mega-sidebar-item').forEach(i => i.classList.remove('active'));
                    megaMenu.querySelectorAll('.mega-tab-content').forEach(pane => pane.classList.remove('active'));

                    // Set active
                    sidebarItem.classList.add('active');
                    const targetPane = megaMenu.querySelector('#' + tabId);
                    if (targetPane) {
                        targetPane.classList.add('active');
                    }
                }
            }

            function hideMenu() {
                hideTimeout = setTimeout(() => {
                    megaMenu.classList.remove('show-mega');
                }, 150); // delay to allow moving between trigger and menu
            }

            triggerItems.forEach(item => {
                item.addEventListener('mouseenter', function () {
                    const tabId = this.getAttribute('data-tab-trigger');
                    showMenu(tabId);
                });

                item.addEventListener('mouseleave', function () {
                    hideMenu();
                });
            });

            megaMenu.addEventListener('mouseenter', function () {
                clearTimeout(hideTimeout);
            });

            megaMenu.addEventListener('mouseleave', function () {
                hideMenu();
            });

            // Mega Menu inner sidebar tab switching on hover
            const sidebarItems = megaMenu.querySelectorAll('.mega-sidebar-item');
            sidebarItems.forEach(item => {
                item.addEventListener('mouseenter', function () {
                    // Remove active classes inside menu
                    megaMenu.querySelectorAll('.mega-sidebar-item').forEach(i => i.classList.remove('active'));
                    megaMenu.querySelectorAll('.mega-tab-content').forEach(pane => pane.classList.remove('active'));

                    // Set active
                    this.classList.add('active');
                    const targetTabId = this.getAttribute('data-mega-tab');
                    const targetPane = megaMenu.querySelector('#' + targetTabId);
                    if (targetPane) {
                        targetPane.classList.add('active');
                    }
                });
            });
        })();
    </script>
</body>

</html>