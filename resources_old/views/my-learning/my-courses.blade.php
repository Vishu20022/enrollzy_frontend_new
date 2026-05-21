@php
$courses = [
    [
        'title' => 'B.Tech Computer Science',
        'semester' => 'Semester 3',
        'progress' => 65,
        'status' => 'In Progress',
    ],
    [
        'title' => 'B.Sc Data Science',
        'semester' => 'Semester 2',
        'progress' => 42,
        'status' => 'In Progress',
    ],
    [
        'title' => 'MBA Business Analytics',
        'semester' => 'Trimester 1',
        'progress' => 80,
        'status' => 'Almost Done',
    ],
    [
        'title' => 'AI & Machine Learning',
        'semester' => 'Certificate Program',
        'progress' => 100,
        'status' => 'Completed',
    ],
];
@endphp

<section class="my-courses">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h3 class="section-title main-heading">
                    My <span class="theme">Courses</span>
                </h3>
                <p class="section-subtitle">
                    Continue your enrolled programs and track your learning progress.
                </p>
            </div>
        </div>

        <div class="row g-4">

            @foreach($courses as $course)
                <div class="col-lg-3 col-md-6">

                    <div class="course-card">

                        <div class="course-header">
                            <span class="course-status {{ strtolower(str_replace(' ', '-', $course['status'])) }}">
                                {{ $course['status'] }}
                            </span>
                        </div>

                        <h5>{{ $course['title'] }}</h5>

                        <p class="semester">
                            {{ $course['semester'] }} • {{ $course['progress'] }}% Completed
                        </p>

                        <div class="progress">
                            <div class="progress-bar"
                                 style="width: {{ $course['progress'] }}%">
                            </div>
                        </div>

                        <a href="#" class="btn btn-theme-one btn-sm mt-3">
                            {{ $course['progress'] == 100 ? 'View Certificate' : 'Continue Learning' }}
                        </a>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
