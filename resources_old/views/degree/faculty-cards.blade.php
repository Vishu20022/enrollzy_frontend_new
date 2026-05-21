@php
$faculty = [
    [
        'name' => 'Dr. Anil Sharma',
        'role' => 'Professor & Program Head',
        'experience' => '18+ Years Experience',
        'industry' => 'Ex–Google, Microsoft (Consultant)',
        'research' => '35+ Research Papers | AI & ML',
        'image' => 'https://i.pravatar.cc/300?img=11'
    ],
    [
        'name' => 'Prof. Neha Verma',
        'role' => 'Associate Professor',
        'experience' => '12+ Years Experience',
        'industry' => 'Industry Mentor – IBM',
        'research' => 'Data Science | 20+ Publications',
        'image' => 'https://i.pravatar.cc/300?img=32'
    ],
    [
        'name' => 'Mr. Rahul Mehta',
        'role' => 'Industry Expert & Mentor',
        'experience' => '10+ Years Industry Experience',
        'industry' => 'Product Lead – Amazon',
        'research' => 'Guest Faculty & Startup Advisor',
        'image' => 'https://i.pravatar.cc/300?img=48'
    ],
];
@endphp

<section class="faculty-section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="main-heading">
                    Learn from <span class="theme">Expert Faculty & Mentors</span>
                </h2>
                <p class="section-subtitle">
                    Our programs are guided by experienced academicians and
                    industry professionals with real-world exposure.
                </p>
            </div>
        </div>

        <div class="row g-4">

            @foreach($faculty as $member)
                <div class="col-lg-4 col-md-6">

                    <div class="faculty-card">

                        <div class="faculty-img">
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                        </div>

                        <div class="faculty-content">
                            <h5>{{ $member['name'] }}</h5>
                            <span class="role">{{ $member['role'] }}</span>

                            <ul class="faculty-meta">
                                <li>🎓 {{ $member['experience'] }}</li>
                                <li>🏢 {{ $member['industry'] }}</li>
                                <li>📚 {{ $member['research'] }}</li>
                            </ul>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
