@php
$certificates = [
    [
        'title' => 'Python for Data Science',
        'status' => 'Completed',
        'date' => 'Aug 2024',
        'issuer' => 'School of Computer Science',
        'skills' => ['Python', 'Data Analysis', 'Pandas'],
    ],
    [
        'title' => 'Machine Learning Fundamentals',
        'status' => 'Completed',
        'date' => 'Jan 2025',
        'issuer' => 'AI & Research Department',
        'skills' => ['ML', 'Scikit-learn', 'AI'],
    ],
    [
        'title' => 'Web Development Bootcamp',
        'status' => 'Completed',
        'date' => 'Mar 2025',
        'issuer' => 'Engineering Faculty',
        'skills' => ['HTML', 'CSS', 'JavaScript'],
    ],
    [
        'title' => 'Business Analytics Essentials',
        'status' => 'Completed',
        'date' => 'Jun 2025',
        'issuer' => 'Management Studies',
        'skills' => ['Analytics', 'Excel', 'Decision Making'],
    ],
];
@endphp

<section class="certificates">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h3 class="section-title main-heading">
                    Certificates & <span class="theme">Achievements</span>
                </h3>
                <p class="section-subtitle">
                    Celebrate your learning milestones and professional achievements.
                </p>
            </div>
        </div>

        <div class="row g-4">

            @foreach($certificates as $cert)
                <div class="col-lg-3 col-md-6">

                    <div class="certificate-card">

                        <div class="certificate-badge">
                            🎓
                        </div>

                        <h5>{{ $cert['title'] }}</h5>

                        <span class="status">
                            {{ $cert['status'] }} • {{ $cert['date'] }}
                        </span>

                        <p class="issuer">
                            Issued by {{ $cert['issuer'] }}
                        </p>

                        <div class="skills">
                            @foreach($cert['skills'] as $skill)
                                <span>{{ $skill }}</span>
                            @endforeach
                        </div>

                        <a href="#" class="view-link">
                            View Certificate →
                        </a>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
