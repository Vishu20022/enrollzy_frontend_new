@php
$overviewStats = [
    [
        'title' => 'Enrolled Courses',
        'count' => 6,
        'icon' => '📚',
        'desc' => 'Total active enrollments'
    ],
    [
        'title' => 'Completed Courses',
        'count' => 3,
        'icon' => '✅',
        'desc' => 'Successfully finished'
    ],
    [
        'title' => 'In Progress',
        'count' => 3,
        'icon' => '⏳',
        'desc' => 'Currently learning'
    ],
    [
        'title' => 'Assignments Submitted',
        'count' => 18,
        'icon' => '📝',
        'desc' => 'Out of 25 tasks'
    ],
    [
        'title' => 'Learning Hours',
        'count' => '146+',
        'icon' => '⏱️',
        'desc' => 'Total study time'
    ],
    [
        'title' => 'Certificates Earned',
        'count' => 4,
        'icon' => '🎓',
        'desc' => 'Verified achievements'
    ],
];
@endphp


<section class="learning-overview">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h3 class="section-title main-heading">
                    Learning <span class="theme">Overview</span>
                </h3>
                <p class="section-subtitle">
                    A quick snapshot of your learning journey and achievements.
                </p>
            </div>
        </div>

        <div class="row g-4">

            @foreach($overviewStats as $stat)
                <div class="col-lg-4 col-md-6">

                    <div class="overview-card">

                        <div class="overview-icon">
                            {{ $stat['icon'] }}
                        </div>

                        <div class="overview-content">
                            <h4>{{ $stat['count'] }}</h4>
                            <span class="title">{{ $stat['title'] }}</span>
                            <p class="desc">{{ $stat['desc'] }}</p>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
