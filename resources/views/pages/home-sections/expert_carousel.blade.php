<section class="expert-section py-5 bg-white">
    <div class="container text-center mb-5">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
            <h2 class="fw-bolder text-dark mb-0" style="font-size: 32px;">
                {!! $section->title ?? 'Expert Mentors' !!}
            </h2>
            <span class="orange-line d-none d-md-inline-block" style="width: 45px; height: 1.5px; background-color: #f97316;"></span>
        </div>
        
        <p class="text-muted mx-auto" style="max-width: 800px; font-size: 15px;">
            @if($section->subtitle)
                {{ $section->subtitle }}
            @else
                Learn from experienced professionals, industry leaders, and academic mentors dedicated to student success.
            @endif
        </p>
    </div>

    <div class="container pb-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            @foreach ($experts->take(4) as $expert)
                @php
                    $imgUrl = str_starts_with($expert->profile_photo, 'http')
                        ? $expert->profile_photo
                        : asset($expert->profile_photo);
                @endphp
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden custom-expert-card" style="border: 1px solid #e2e8f0 !important; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                        
                        <!-- Top Image Container -->
                        <div class="position-relative w-100" style="aspect-ratio: 1/1; background-color: #f1f5f9;">
                            <a href="{{ route('pages.experts.detail', $expert->id) }}">
                                <img src="{{ $imgUrl }}" alt="{{ $expert->first_name . ' ' . $expert->last_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <!-- Eye Icon Badge -->
                            <div class="position-absolute d-flex justify-content-center align-items-center bg-dark text-white rounded-circle shadow-sm" style="top: 12px; right: 12px; width: 28px; height: 28px; opacity: 0.85;">
                                <i class="fas fa-eye" style="font-size: 12px;"></i>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-3 d-flex flex-column text-center bg-white">
                            <!-- Name -->
                            <h5 class="fw-bold text-dark mb-1" style="font-size: 1.15rem;">
                                <a href="{{ route('pages.experts.detail', $expert->id) }}" class="text-decoration-none text-dark">{{ $expert->first_name . ' ' . $expert->last_name }}</a>
                            </h5>
                            
                            <!-- Headline -->
                            <p class="text-muted mb-2 text-truncate w-100" style="font-size: 0.75rem;">
                                {{ $expert->professional_headline ?: 'Expert Mentor' }} 
                                {{ ($expert->educations->first() ? ' · ' . $expert->educations->first()->degree_type : '') }}
                            </p>

                            <!-- Tags/Pills (Mocked as per design) -->
                            <div class="d-flex flex-wrap justify-content-center gap-1 mb-3">
                                <span class="badge fw-medium rounded-pill px-2 py-1" style="background-color: #eff6ff; color: #3b82f6; font-size: 0.65rem;">MBA Prep</span>
                                <span class="badge fw-medium rounded-pill px-2 py-1" style="background-color: #fef3c7; color: #d97706; font-size: 0.65rem;">Product</span>
                                <span class="badge fw-medium rounded-pill px-2 py-1" style="background-color: #dcfce7; color: #16a34a; font-size: 0.65rem;">Startups</span>
                            </div>

                            <!-- Rating -->
                            <div class="d-flex align-items-center justify-content-center gap-1 mb-3" style="font-size: 0.75rem;">
                                <div class="text-warning">
                                    <i class="fas fa-star" style="font-size: 11px;"></i>
                                    <i class="fas fa-star" style="font-size: 11px;"></i>
                                    <i class="fas fa-star" style="font-size: 11px;"></i>
                                    <i class="fas fa-star" style="font-size: 11px;"></i>
                                    <i class="fas fa-star-half-alt" style="font-size: 11px;"></i>
                                </div>
                                <span class="fw-bold ms-1 text-dark">{{ $expert->rating ?? '4.9' }}</span>
                                <span class="text-muted ms-auto">280 sessions</span>
                            </div>

                            <!-- Price & Button -->
                            <div class="mt-auto d-flex align-items-center justify-content-between pt-2 border-top border-light">
                                <div class="fw-bolder text-dark" style="font-size: 1.1rem;">
                                    ₹500<span class="text-muted fw-normal" style="font-size: 0.7rem;">/ min</span>
                                </div>
                                
                                <button class="btn btn-primary btn-sm rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-1 btn-book-session" style="font-size: 0.75rem; background-color: #3b82f6; border-color: #3b82f6;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#bookingModal" data-provider-id="{{ $expert->id }}"
                                    data-provider-type="expert" data-provider-name="{{ $expert->first_name . ' ' . $expert->last_name }}"
                                    data-provider-role="{{ $expert->professional_headline }}" data-provider-img="{{ $imgUrl }}">
                                    Book session <i class="fas fa-arrow-right ms-1" style="font-size: 10px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5 mb-2">
            <a href="{{ route('pages.experts') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" style="background-color: #3b82f6; border-color: #3b82f6; font-size: 15px;">
                View More <i class="fas fa-arrow-right ms-1" style="font-size: 13px;"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .custom-expert-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.1) !important;
    }
</style>
