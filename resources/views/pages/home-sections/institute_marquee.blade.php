@if($institute_marquees->count() > 0)
<section class="boarding-school-section py-5" style="background-color: #f0f7ff;">
    <div class="container text-center mb-5">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line" style="display: inline-block; width: 60px; height: 2px; background-color: #f97316;"></span>
            <h2 class="section-title m-0 text-dark fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 28px;">
                {!! $section->title ?? ($institute_marquees->first()->heading ?? 'COACHING INSTITUTES') !!}
            </h2>
            <span class="orange-line" style="display: inline-block; width: 60px; height: 2px; background-color: #f97316;"></span>
        </div>
        
        <p class="section-subtitle text-muted mx-auto" style="max-width: 900px; font-size: 15px; line-height: 1.6;">
            @if($section->subtitle)
                {{ $section->subtitle }}
            @else
                {{ $institute_marquees->first()->subheading ?? 'Discover leading coaching institutes that help students prepare for competitive exams and future success through expert mentorship, structured learning, and proven outcomes.' }}
            @endif
        </p>
    </div>

    <div class="container position-relative">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3 justify-content-center">
            @foreach($institute_marquees->take(6) as $institute)
            <div class="col">
                <div class="school-card bg-white p-3 rounded-4 shadow-sm text-center position-relative h-100 d-flex flex-column align-items-center" style="border: 1px solid #e2e8f0; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                    
                    <!-- Rating Badge -->
                    <div class="position-absolute d-flex align-items-center justify-content-center" style="top: 10px; right: 10px; background-color: #fef08a; color: #854d0e; padding: 2px 6px; border-radius: 4px; font-size: 10px; z-index: 3;">
                        <span class="fw-bold">4.5</span>
                        <i class="fas fa-star text-warning ms-1" style="font-size: 9px;"></i>
                    </div>

                    <!-- Logo Circle -->
                    <div class="logo-circle rounded-circle d-flex align-items-center justify-content-center mb-3 mt-2 position-relative" style="width: 100px; height: 100px; background-color: #0c2444; z-index: 2; border: 4px solid #fff;">
                        @if($institute->logo_url)
                            <a href="{{ $institute->logo_url }}" target="_blank">
                                <img src="{{ env('BACKEND_URL') . '/' . $institute->logo }}" alt="{{ $institute->name }}" class="img-fluid p-1" style="max-width: 80px; max-height: 80px; border-radius: 50%; object-fit: contain;">
                            </a>
                        @else
                            <img src="{{ env('BACKEND_URL') . '/' . $institute->logo }}" alt="{{ $institute->name }}" class="img-fluid p-1" style="max-width: 80px; max-height: 80px; border-radius: 50%; object-fit: contain;">
                        @endif
                    </div>

                    <!-- School Name Pill -->
                    <div class="school-name-pill bg-light text-secondary rounded-pill px-3 py-1 mb-2 fw-bold text-lowercase" style="font-size: 12px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width: 100%; border: 1px solid #f1f5f9;">
                        {{ $institute->name }}
                    </div>

                    <!-- Location & Board -->
                    <div class="school-details text-muted mb-1" style="font-size: 11px;">
                        jaipur, rajasthan &nbsp; CBSE
                    </div>
                    
                    <!-- Grades -->
                    <div class="school-grades text-muted mb-3" style="font-size: 11px;">
                        3rd - 12th
                    </div>

                    <!-- Apply Now Button -->
                    <a href="{{ $institute->logo_url ?: '#' }}" class="btn btn-primary btn-sm rounded-pill w-100 fw-bold mt-auto" style="font-size: 12px; padding: 8px 0; background-color: #0066ff; border-color: #0066ff;">
                        APPLY NOW <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6;">
                View More <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .school-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
    }
</style>
@endif
