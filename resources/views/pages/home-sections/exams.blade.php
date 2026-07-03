@if ($exams->count() > 0)
<section class="exam-section py-5 bg-white">
    <div class="container text-center mb-5">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
            <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                {!! $section->title ?? 'Top Exams' !!}
            </h2>
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
        </div>
        <p class="text-muted mx-auto" style="max-width: 700px; font-size: 15px;">
            Prepare for the top competitive exams in the country.
        </p>
    </div>

    <div class="container pb-4">
        <!-- 3 Column Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center g-4 g-lg-5 mt-2">
            @foreach ($exams->take(6) as $exam)
                <div class="col text-center">
                    <a href="{{ route('pages.exams.detail', $exam->slug) }}" class="text-decoration-none d-block custom-exam-card">
                        
                        <!-- Floating Icon Circle -->
                        <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center mb-4 bg-white" 
                             style="width: 110px; height: 110px; border: 3px solid #f1f5f9; box-shadow: 0 4px 15px rgba(0,0,0,0.06); transition: transform 0.3s ease, border-color 0.3s ease;">
                            <img src="{{ $exam->logo ? env('BACKEND_URL') . '/' . $exam->logo : asset('images/upsc.jpg') }}" alt="icon" style="max-width: 55px; max-height: 55px; object-fit: contain;">
                        </div>

                        <!-- Exam Title -->
                        <h5 class="fw-bold text-dark mb-2 mx-auto" style="font-size: 1.15rem; line-height: 1.35; max-width: 280px;">
                            {{ $exam->name }}
                        </h5>

                        <!-- Exam Details / Subtext -->
                        <p class="text-muted mx-auto" style="font-size: 0.85rem; line-height: 1.5; max-width: 260px;">
                            @php
                                $cat = is_array($exam->exam_category) ? implode(', ', $exam->exam_category) : $exam->exam_category;
                            @endphp
                            @if($exam->exam_type || $cat)
                                {{ $exam->exam_type }} {{ $exam->exam_type && $cat ? '|' : '' }} {{ $cat }}
                            @else
                                Find your interests and aptitude through guided assessments
                            @endif
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5 mb-2">
            <a href="{{ route('pages.exams.index') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 15px;">
                View More <i class="fas fa-arrow-right ms-1" style="font-size: 13px;"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .custom-exam-card:hover .rounded-circle {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1) !important;
        border-color: #e2e8f0 !important;
    }
    .custom-exam-card:hover h5 {
        color: #3b82f6 !important;
        transition: color 0.3s ease;
    }
</style>
@endif
