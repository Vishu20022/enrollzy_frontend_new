@php
$progress = [
    'overall' => 72,
    'courses_completed' => 3,
    'courses_total' => 6,
    'assignments_done' => 18,
    'assignments_total' => 25,
    'hours_spent' => 146,
];
@endphp

<section class="learning-progress">
    <div class="container">

        <!-- Heading -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h3 class="section-title main-heading">
                    Your <span class="theme">Learning Progress</span>
                </h3>
                <p class="section-subtitle">
                    Track your performance, completion status, and learning journey.
                </p>
            </div>
        </div>

        <div class="row g-4 align-items-center">

            <!-- Overall Progress -->
            <div class="col-lg-4 text-center">
                <div class="progress-circle">
                    <div class="circle">
                        <strong>{{ $progress['overall'] }}%</strong>
                        <span>Overall Completion</span>
                    </div>
                </div>
            </div>

            <!-- Detailed Stats -->
            <div class="col-lg-8">
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="progress-card">
                            <h6>Courses Completed</h6>
                            <p>
                                {{ $progress['courses_completed'] }}
                                / {{ $progress['courses_total'] }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="progress-card">
                            <h6>Assignments Submitted</h6>
                            <p>
                                {{ $progress['assignments_done'] }}
                                / {{ $progress['assignments_total'] }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="progress-card highlight">
                            <h6>Total Learning Hours</h6>
                            <p>
                                {{ $progress['hours_spent'] }}+ Hours Spent Learning
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
