@php
$assignments = [
    [
        'title' => 'Data Structures Assignment',
        'course' => 'B.Tech Computer Science',
        'due' => '25 Sep 2025',
        'status' => 'Pending',
        'weight' => '10%',
    ],
    [
        'title' => 'AI Project Proposal',
        'course' => 'B.Sc Data Science',
        'due' => '30 Sep 2025',
        'status' => 'Pending',
        'weight' => '20%',
    ],
    [
        'title' => 'Database Management Quiz',
        'course' => 'B.Tech IT',
        'due' => '05 Oct 2025',
        'status' => 'Upcoming',
        'weight' => '5%',
    ],
    [
        'title' => 'Machine Learning Case Study',
        'course' => 'MBA Analytics',
        'due' => '10 Oct 2025',
        'status' => 'Upcoming',
        'weight' => '15%',
    ],
];
@endphp

<section class="assignments">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h3 class="section-title main-heading">
                    Upcoming <span class="theme">Assignments</span>
                </h3>
                <p class="section-subtitle">
                    Stay on track with your coursework and never miss a deadline.
                </p>
            </div>
        </div>

        <div class="row g-3">

            @foreach($assignments as $task)
                <div class="col-lg-6">

                    <div class="assignment-card">

                        <div class="assignment-info">
                            <h5>{{ $task['title'] }}</h5>
                            <span class="course">
                                {{ $task['course'] }}
                            </span>
                        </div>

                        <div class="assignment-meta">
                            <span class="due">
                                ⏰ Due: {{ $task['due'] }}
                            </span>

                            <span class="weight">
                                📊 Weightage: {{ $task['weight'] }}
                            </span>

                            <span class="status {{ strtolower($task['status']) }}">
                                {{ $task['status'] }}
                            </span>
                        </div>

                        <div class="assignment-action">
                            <a href="#" class="btn btn-theme-two btn-sm">
                                View / Submit
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
