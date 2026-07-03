<section class="why-choose-new py-5" style="background: linear-gradient(to bottom, #f4f9ff, #fffdf6);">
    <div class="container text-center mb-5">
        <!-- Top Pill Badge -->
        <div class="d-inline-block bg-white text-dark border rounded-pill px-4 py-2 mb-4 fw-semibold shadow-sm" style="font-size: 14px; letter-spacing: 0.5px;">
            Why choose enrollzy
        </div>
        
        <!-- Main Title -->
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line d-none d-md-inline-block" style="width: 50px; height: 1.5px; background-color: #f97316;"></span>
            <h2 class="fw-bolder text-dark mb-0" style="font-family: 'Outfit', sans-serif; font-size: 32px;">
                {!! $section->title ?? 'Your step-by-step journey to success' !!}
            </h2>
            <span class="orange-line d-none d-md-inline-block" style="width: 50px; height: 1.5px; background-color: #f97316;"></span>
        </div>
        
        <!-- Subtitle -->
        <p class="text-muted mx-auto" style="max-width: 700px; font-size: 16px; line-height: 1.6;">
            {{ $section->subtitle ?? 'We guide you from school to your dream career with personalised milestones, resources, and mentors at every stage.' }}
        </p>
    </div>

    <div class="container pb-4">
        <!-- Steps Row -->
        <div class="d-flex flex-wrap flex-lg-nowrap justify-content-center align-items-start gap-2 gap-lg-4">
            @forelse($home_services as $index => $service)
                <!-- Step -->
                <div class="step-card text-center d-flex flex-column align-items-center mb-4" style="flex: 1; min-width: 130px; max-width: 200px;">
                    <div class="step-icon-circle bg-white rounded-circle shadow-sm d-flex justify-content-center align-items-center mb-3" style="width: 85px; height: 85px; border: 2px solid #3b82f6; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        @if($service->image)
                            <img src="{{ rtrim(env('BACKEND_URL'), '/') . '/' . ltrim($service->image, '/') }}" alt="{{ $service->title }}" style="width: 45px; height: 45px; object-fit: contain;">
                        @else
                            <i class="fas fa-rocket text-primary fs-3"></i>
                        @endif
                    </div>
                    <h6 class="fw-bold text-dark mb-2" style="font-size: 15px;">{{ $service->title }}</h6>
                    <p class="text-muted mb-0 px-2" style="font-size: 12px; line-height: 1.4;">
                        {{ Str::limit(strip_tags($service->description), 100) }}
                    </p>
                </div>

                <!-- Arrow Separator -->
                @if(!$loop->last)
                <div class="step-arrow d-none d-lg-flex align-items-center justify-content-center" style="height: 85px; width: 20px;">
                    <i class="fas fa-arrow-right text-secondary opacity-50" style="font-size: 16px;"></i>
                </div>
                @endif
            @empty
                <!-- Mock Fallbacks if no services in DB -->
                @php
                    $mocks = [
                        ['title' => 'Explore & Discover', 'desc' => 'Find your interests and aptitude through guided assessments'],
                        ['title' => 'Choose Institution', 'desc' => 'Compare & apply to best-fit schools, coaching, or colleges'],
                        ['title' => 'Secure Funding', 'desc' => 'Apply for scholarships & financial aid through Enrollzy'],
                        ['title' => 'Skill Up', 'desc' => 'Take certifications and courses alongside academics'],
                        ['title' => 'Get a Mentor', 'desc' => '1:1 sessions with industry experts and alumni'],
                        ['title' => 'Land the Job', 'desc' => 'Internships, placements, and career support on one platform']
                    ];
                @endphp
                @foreach($mocks as $index => $mock)
                <div class="step-card text-center d-flex flex-column align-items-center mb-4" style="flex: 1; min-width: 130px; max-width: 200px;">
                    <div class="step-icon-circle bg-white rounded-circle shadow-sm d-flex justify-content-center align-items-center mb-3" style="width: 85px; height: 85px; border: 2px solid #3b82f6; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <i class="fas fa-check-circle text-primary fs-3"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-2" style="font-size: 15px;">{{ $mock['title'] }}</h6>
                    <p class="text-muted mb-0 px-2" style="font-size: 12px; line-height: 1.4;">
                        {{ $mock['desc'] }}
                    </p>
                </div>
                @if(!$loop->last)
                <div class="step-arrow d-none d-lg-flex align-items-center justify-content-center" style="height: 85px; width: 20px;">
                    <i class="fas fa-arrow-right text-secondary opacity-50" style="font-size: 16px;"></i>
                </div>
                @endif
                @endforeach
            @endforelse
        </div>
        
        <!-- Call to Action Button -->
        <div class="text-center mt-5 mb-3">
            <a href="#" class="btn btn-primary rounded-pill px-5 py-2 shadow-sm fw-semibold hover-lift" style="background-color: #2563eb; border-color: #2563eb; font-size: 15px;">
                Start your Journey <i class="fas fa-arrow-right ms-2" style="font-size: 13px;"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .step-icon-circle:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.15) !important;
    }
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(37, 99, 235, 0.2) !important;
    }
</style>
