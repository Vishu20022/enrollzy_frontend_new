<section class="compare-banner-new py-4 my-5" style="background: linear-gradient(90deg, #fdf8e1 0%, #e8edf6 50%, #c8def4 100%); border-radius: 12px;">
    <div class="container">
        <div class="row align-items-center justify-content-between px-3">
            
            <!-- Left: Avatars -->
            <div class="col-lg-3 col-md-4 text-center text-md-start mb-3 mb-md-0 ps-lg-4">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start position-relative">
                    <!-- Overlapping avatars, these can be generic memojis or illustrations -->
                    <img src="https://api.dicebear.com/7.x/micah/svg?seed=Felix&backgroundColor=f8fafc" class="rounded-circle shadow-sm border border-2 border-white" style="width: 75px; height: 75px; object-fit: cover; z-index: 1;">
                    <img src="https://api.dicebear.com/7.x/micah/svg?seed=Aneka&backgroundColor=fef08a" class="rounded-circle shadow-sm border border-2 border-white" style="width: 75px; height: 75px; object-fit: cover; margin-left: -25px; z-index: 2;">
                    <img src="https://api.dicebear.com/7.x/micah/svg?seed=Oliver&backgroundColor=f8fafc" class="rounded-circle shadow-sm border border-2 border-white" style="width: 75px; height: 75px; object-fit: cover; margin-left: -25px; z-index: 3;">
                </div>
            </div>

            <!-- Middle: Text -->
            <div class="col-lg-6 col-md-5 text-center text-md-start mb-4 mb-md-0 pe-lg-5">
                <h2 class="fw-bolder text-dark mb-1" style="font-size: 32px; letter-spacing: -0.5px;">
                    {!! $section->title ?? 'Confused Between Colleges?' !!}
                </h2>
                <p class="text-dark mb-0 fw-semibold" style="font-size: 16px; opacity: 0.9;">
                    {{ $section->subtitle ?? 'Compare fees, placements & courses in one-click!' }}
                </p>
            </div>

            <!-- Right: Button -->
            <div class="col-lg-3 col-md-3 text-center text-md-end pe-lg-4">
                <button type="button" class="btn bg-white rounded-pill px-4 py-2 fw-bold shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#courseSelectionModal" style="color: #0f172a; border: 1px solid #e2e8f0; font-size: 15px; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                    Compare Now <i class="fas fa-arrow-right" style="font-size: 13px;"></i>
                </button>
            </div>
            
        </div>
    </div>
</section>

<!-- Include the Unified Selection Modal here so it works on the homepage -->
@include('partials.compare-modal')

<style>
    .compare-banner-new {
        transition: transform 0.3s ease;
    }
    .compare-banner-new .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1) !important;
    }
</style>
