@if ($exams->count() > 0)
<section class="exam-section">

            <div class="container">

                <div class="section-heading heading">

                    <h2 class="main-heading">
                {!! $section->title ?? '<span class=\"main-heading\">Top</span> Exams' !!}
            </h2>

                    <p>
                        Prepare for the top competitive exams in the country.
                    </p>

                    <div class="heading-line"></div>

                </div>


                <div class="row justify-content-center g-4">

                    @foreach ($exams->take(6) as $exam)
                        <div class="col-lg-4 col-md-6">

                            <a href="{{ route('pages.exams.detail', $exam->slug) }}" class="text-decoration-none">
                                <div class="exam-card">

                                    <div class="exam-icon">
                                        <img src="{{ $exam->logo ? env('BACKEND_URL') . '/' . $exam->logo : asset('images/upsc.jpg') }}" alt="icon">
                                    </div>

                                    <h3 class="text-dark">
                                        {{ $exam->name }}
                                    </h3>

                                    <p class="text-muted">
                                        {{ $exam->exam_type }} | {{ is_array($exam->exam_category) ? implode(', ', $exam->exam_category) : $exam->exam_category }}
                                    </p>

                                </div>
                            </a>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif
