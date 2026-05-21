@php
$resources = [
    [
        'title' => 'Recorded Lectures',
        'desc' => 'Access HD video lectures anytime, anywhere.',
        'count' => '120+ Videos',
        'icon' => '🎥'
    ],
    [
        'title' => 'Study Materials',
        'desc' => 'Download notes, slides, and reference PDFs.',
        'count' => '80+ PDFs',
        'icon' => '📘'
    ],
    [
        'title' => 'Assignments',
        'desc' => 'Practice problems and graded assignments.',
        'count' => '45 Tasks',
        'icon' => '📝'
    ],
    [
        'title' => 'Previous Year Papers',
        'desc' => 'Solve past exam papers for better preparation.',
        'count' => '15 Years',
        'icon' => '📄'
    ],
    [
        'title' => 'Live Sessions',
        'desc' => 'Attend live doubt-solving and mentoring sessions.',
        'count' => 'Weekly',
        'icon' => '🎙️'
    ],
    [
        'title' => 'External Resources',
        'desc' => 'Curated links, tools, and learning platforms.',
        'count' => '30+ Links',
        'icon' => '🔗'
    ],
];
@endphp

<section class="learning-resources">
    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h3 class="section-title main-heading">
                    Learning <span class="theme">Resources</span>
                </h3>
                <p class="section-subtitle">
                    All your learning materials, lectures, and practice
                    resources in one place.
                </p>
            </div>
        </div>

        <div class="row g-4">

            @foreach($resources as $resource)
                <div class="col-lg-4 col-md-6">

                    <div class="resource-card">

                        <div class="resource-icon">
                            {{ $resource['icon'] }}
                        </div>

                        <h5>{{ $resource['title'] }}</h5>

                        <p>{{ $resource['desc'] }}</p>

                        <span class="resource-count">
                            {{ $resource['count'] }}
                        </span>

                        <a href="#" class="resource-link">
                            Explore →
                        </a>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
