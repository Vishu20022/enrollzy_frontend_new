@php
    $services = \App\Models\HomeService::where('status', true)->orderBy('sort_order')->get();
@endphp

@if($services->count() > 0)
<section class="specialized-courses py-5" style="background-color: #fff;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: #004aad; font-weight: 700; font-size: 2.5rem;">Our Specialized Courses</h2>
        
        <div class="row g-4 justify-content-center">
            @foreach($services as $service)
            <div class="col-lg-3 col-md-6">
                <div class="course-card text-center p-4 d-flex flex-column justify-content-between h-100" 
                     style="background-color: #ffd700; border-radius: 20px; border: none; min-height: 400px; transition: transform 0.3s ease-in-out;">
                    
                    <div>
                        <h3 class="mb-4" style="color: #004aad; font-weight: 800; font-size: 1.5rem; text-decoration: underline;">
                            {!! str_replace(' ', '<br>', $service->title) !!}
                        </h3>
                        
                        <p class="mb-4" style="color: #000; font-size: 0.95rem; line-height: 1.6; font-weight: 500;">
                            {{ $service->description }}
                        </p>
                    </div>

                    @if($service->footer_text)
                    <div class="mt-auto">
                        <h4 style="color: #004aad; font-weight: 800; font-size: 1.1rem; line-height: 1.4;">
                            {{ $service->footer_text }}
                        </h4>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>
@endif
