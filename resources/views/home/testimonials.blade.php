<section class="testimonials-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold main-heading"><span class="theme">What</span> Our Students Say</h2>
            <p class="text-muted">Dynamic feedback from our successful learners</p>
        </div>

        <div class="testimonial-slider row g-4">
            @foreach($testimonials as $testimonial)
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card p-4 h-100 shadow-sm border-0">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                @php
                                    $imgUrl = (str_starts_with($testimonial->image, 'http')) ? $testimonial->image : env('BACKEND_URL') . '/' . $testimonial->image;
                                @endphp
                                <img src="{{ $imgUrl }}" alt="{{ $testimonial->name }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">{{ $testimonial->name }}</h6>
                                <small class="text-muted">{{ $testimonial->role }}</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < $testimonial->rating ? 'text-warning' : 'text-muted opacity-50' }} small"></i>
                            @endfor
                        </div>
                        <p class="mb-0 text-secondary italic">
                            "{{ $testimonial->content }}"
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('css')
<style>
    .testimonial-card {
        background: #fff;
        border-radius: 16px;
        transition: transform 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05) !important;
    }
    .testimonial-card:hover {
        transform: translateY(-5px);
    }
    .testimonial-card p {
        font-style: italic;
        line-height: 1.6;
        color: #555;
    }
</style>
@endpush
