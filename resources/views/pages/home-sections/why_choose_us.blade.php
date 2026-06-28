    <section class="why-choose-section pt-1 pb-5 bg-white overflow-hidden" style="background-color: #fafafa !important;">
        <div class="container-fluid px-4 px-lg-5">
            <div class="text-center mb-3 fade-in-up">
                <span class="text-primary fw-bold text-uppercase tracking-wider mb-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">WHY CHOOSE ENROLLZY</span>
                <h2 class="fw-bolder text-dark mb-3" style="font-family: 'Outfit', sans-serif;">
                    {!! $section->title ?? 'Why Choose enrollzy' !!}
                </h2>
                <div class="mx-auto" style="width: 40px; height: 3px; background-color: #ffc107;"></div>
                <p class="section-desc mt-3 text-muted">
                    We assist you with the right guidance for a successful career ahead.
                </p>
            </div>
            
            <div class="wavy-roadmap-wrapper position-relative mx-auto mt-2" style="max-width: 1600px; height: 450px;">
                
                @php 
                    $count = count($home_services);
                    $totalCols = $count + 1; // +1 for Title Block
                    $totalWidth = $totalCols * 100;
                    
                    // Track starts straight through Title Block
                    $pathD = "M 0,100 L 100,100 ";
                    
                    foreach($home_services as $index => $service) {
                        $startX = ($index + 1) * 100; 
                        $midX = $startX + 50;
                        $endX = $startX + 100;
                        
                        if ($index % 2 == 0) {
                            // Arch (perfectly symmetrical bezier)
                            $pathD .= "C " . ($startX + 25) . ",100 " . ($startX + 25) . ",20 " . $midX . ",20 ";
                            $pathD .= "C " . ($midX + 25) . ",20 " . ($midX + 25) . ",100 " . $endX . ",100 ";
                        } else {
                            // Valley (perfectly symmetrical bezier)
                            $pathD .= "C " . ($startX + 25) . ",100 " . ($startX + 25) . ",180 " . $midX . ",180 ";
                            $pathD .= "C " . ($midX + 25) . ",180 " . ($midX + 25) . ",100 " . $endX . ",100 ";
                        }
                    }
                @endphp
                
                <!-- LAYER 1: CARDS (Bottom) -->
                <div class="row m-0 position-absolute top-0 start-0 w-100 h-100" style="z-index: 1;">
                    <!-- Title Block Space -->
                    <div class="col px-1 px-xl-2 h-100 d-none d-lg-block"></div>
                    
                    @forelse($home_services as $index => $service)
                        @php 
                            $isArch = $index % 2 == 0;
                            $gradients = [
                                'linear-gradient(135deg, #1e40af, #3b82f6)',
                                'linear-gradient(135deg, #c2410c, #f97316)',
                                'linear-gradient(135deg, #5b21b6, #8b5cf6)',
                                'linear-gradient(135deg, #0f766e, #14b8a6)',
                            ];
                            $bgGradient = $gradients[$index % 4];
                        @endphp
                        
                        <div class="col px-1 px-xl-2 position-relative h-100">
                            <!-- Card perfectly tucked behind the track -->
                            <div class="position-absolute w-100 roadmap-card-wrapper" style="left: 0; padding: 0 10px; {{ $isArch ? 'top: calc(50% - 40px); height: 265px;' : 'bottom: calc(50% - 40px); height: 265px;' }}">
                                <div class="card border-0 shadow-sm h-100 text-white w-100" style="background: {{ $bgGradient }}; border-radius: 24px; {{ $isArch ? 'padding: 60px 15px 15px 15px;' : 'padding: 15px 15px 60px 15px;' }}">
                                    @if($service->image)
                                        <div class="text-center mb-3">
                                            <img src="{{ rtrim(env('BACKEND_URL'), '/') . '/' . ltrim($service->image, '/') }}" alt="{{ $service->title }}" class="img-fluid rounded bg-white p-1" style="max-height: 45px; object-fit: contain;">
                                        </div>
                                    @endif
                                    <h5 class="fw-bold mb-2" style="font-family: 'Outfit', sans-serif; font-size: 1rem;">{{ $service->title }}</h5>
                                    <div class="text-white-50 roadmap-text" style="font-size: 0.75rem; line-height: 1.4;">
                                        {!! $service->description !!}
                                    </div>
                                    @if ($service->footer_text)
                                        <div class="mt-auto pt-2 border-top border-light border-opacity-25">
                                            <span class="fw-bold text-white" style="font-size: 0.65rem; letter-spacing: 1px; text-transform: uppercase;">{{ $service->footer_text }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col text-center text-muted py-5"><p>Services will appear here.</p></div>
                    @endforelse
                </div>

                <!-- LAYER 2: SVG TRACK (Middle) -->
                <svg width="100%" height="200" viewBox="0 0 {{ $totalWidth }} 200" preserveAspectRatio="none" class="position-absolute start-0" style="top: calc(50% - 100px); z-index: 2; pointer-events: none; overflow: visible;">
                    <path d="{{ $pathD }}" stroke="#374151" stroke-width="32" vector-effect="non-scaling-stroke" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <!-- LAYER 3: TITLE BLOCK & NODES (Top) -->
                <div class="row m-0 position-absolute top-0 start-0 w-100 h-100" style="z-index: 3; pointer-events: none;">
                    
                    <!-- Title Block -->
                    <div class="col px-1 px-xl-2 position-relative h-100 d-none d-lg-block">
                        <div class="position-absolute w-100" style="top: calc(50% - 150px); height: 140px; left: 0;">
                            <div class="position-relative w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <h2 class="fw-bolder text-dark mb-0 text-center" style="font-family: 'Outfit', sans-serif; font-size: 2rem; line-height: 1.15;">
                                    Career<br>Roadmap<br><span style="color: #1e3a8a;">2026</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    
                    @foreach($home_services as $index => $service)
                        @php 
                            $isArch = $index % 2 == 0;
                            $colors = ['#2563eb', '#ea580c', '#7c3aed', '#0d9488'];
                            $nodeBorder = $colors[$index % 4];
                        @endphp
                        
                        <div class="col px-1 px-xl-2 position-relative h-100">
                            <!-- Node -->
                            <div class="position-absolute translate-middle" style="left: 50%; pointer-events: auto; {{ $isArch ? 'top: calc(50% - 80px);' : 'top: calc(50% + 80px);' }}">
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center shadow-sm" style="width: 52px; height: 52px; border: 6px solid {{ $nodeBorder }};">
                                    <span class="fs-5 fw-bolder" style="color: {{ $nodeBorder }}; font-family: 'Outfit', sans-serif;">{{ $index + 1 }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>

    @push('css')
    <style>
        .roadmap-card-wrapper {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .roadmap-card-wrapper:hover {
            transform: translateY(-8px);
        }

        /* Rich text formatting inside the card */
        .roadmap-text ul {
            padding-left: 1.2rem;
            margin-bottom: 0;
            color: rgba(255,255,255,0.9);
        }
        .roadmap-text li {
            margin-bottom: 0.5rem;
        }
        .roadmap-text p {
            margin-bottom: 0.5rem;
            color: rgba(255,255,255,0.9);
        }
        .roadmap-text *:last-child {
            margin-bottom: 0;
        }
    </style>
    @endpush



