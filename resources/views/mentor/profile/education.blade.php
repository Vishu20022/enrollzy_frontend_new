@extends('mentor.layouts.app')

@section('title', 'Education')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Education</h3>
        <p class="text-muted mb-4 pb-2 border-bottom">Students trust mentors who've been where they want to go. Verified degrees build instant credibility.</p>



        <form action="{{ route('mentor.profile.education.store') }}" method="POST" enctype="multipart/form-data" id="educationForm">
            @csrf
            
            <div id="educations-container">
                @forelse($educations as $index => $education)
                    <div class="education-card card mb-4 border rounded-3 bg-light" data-index="{{ $index }}">
                        <div class="card-body">
                            <input type="hidden" name="educations[{{ $index }}][id]" value="{{ $education->id }}">
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 fw-bold">Degree <span class="degree-number">{{ $index + 1 }}</span></h6>
                                @if($education->is_verified)
                                    <span class="badge bg-success bg-opacity-25 text-success rounded-pill px-3 py-2">Verified</span>
                                @else
                                    <button type="button" class="btn btn-sm btn-link text-danger text-decoration-none remove-degree">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                @endif
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Degree type <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg fs-6" name="educations[{{ $index }}][degree_type]" required>
                                        <option value="" disabled>Select degree type</option>
                                        @foreach($degrees as $deg)
                                            <option value="{{ $deg->name }}" {{ $education->degree_type == $deg->name ? 'selected' : '' }}>{{ $deg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Specialisation</label>
                                    <input type="text" class="form-control form-control-lg fs-6" name="educations[{{ $index }}][specialisation]" value="{{ $education->specialisation }}" placeholder="e.g. Computer Science">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Institution <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-6" name="educations[{{ $index }}][institution]" value="{{ $education->institution }}" required placeholder="e.g. IIT Delhi">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Year of graduation <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-lg fs-6" name="educations[{{ $index }}][year_of_graduation]" value="{{ $education->year_of_graduation }}" required min="1900" max="{{ date('Y') + 5 }}">
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="form-label text-muted small fw-bold">Degree certificate <span class="text-danger">*</span></label>
                                    @if($education->degree_certificate)
                                        <div class="d-flex align-items-center bg-success bg-opacity-10 border border-success border-opacity-25 rounded-3 p-3">
                                            <i class="bi bi-file-earmark-pdf text-success fs-4 me-3"></i>
                                            <div class="flex-grow-1">
                                                <span class="text-success fw-medium d-block mb-1">{{ basename($education->degree_certificate) }}</span>
                                                <a href="{{ asset($education->degree_certificate) }}" target="_blank" class="text-success small fw-bold text-decoration-none me-3"><i class="bi bi-eye"></i> View</a>
                                            </div>
                                            <label class="text-success fw-bold text-decoration-underline mb-0 ms-3" style="cursor: pointer;">
                                                replace
                                                <input type="file" name="certificates[{{ $index }}]" class="d-none" accept=".pdf,.jpg,.jpeg,.png">
                                            </label>
                                        </div>
                                    @else
                                        <input type="file" class="form-control form-control-lg fs-6" name="certificates[{{ $index }}]" accept=".pdf,.jpg,.jpeg,.png">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Initial empty degree card if none exists -->
                    <div class="education-card card mb-4 border rounded-3 bg-light" data-index="0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 fw-bold">Degree <span class="degree-number">1</span></h6>
                                <button type="button" class="btn btn-sm btn-link text-danger text-decoration-none remove-degree d-none">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Degree type <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg fs-6" name="educations[0][degree_type]" required>
                                        <option value="" selected disabled>Select degree type</option>
                                        @foreach($degrees as $deg)
                                            <option value="{{ $deg->name }}">{{ $deg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Specialisation</label>
                                    <input type="text" class="form-control form-control-lg fs-6" name="educations[0][specialisation]" placeholder="e.g. Computer Science">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Institution <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-6" name="educations[0][institution]" required placeholder="e.g. IIT Delhi">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Year of graduation <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-lg fs-6" name="educations[0][year_of_graduation]" required min="1900" max="{{ date('Y') + 5 }}">
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="form-label text-muted small fw-bold">Degree certificate <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control form-control-lg fs-6" name="certificates[0]" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <button type="button" class="btn btn-outline-secondary w-100 py-3 mb-5 border-dashed rounded-3 fw-bold" id="add-degree-btn">
                <i class="bi bi-plus-lg me-2"></i> Add another degree
            </button>

            <!-- Sticky footer mimicking the screenshot -->
            <div class="card border rounded-3 bg-white shadow-sm mt-5">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div class="text-muted small">
                        <i class="bi bi-save me-1"></i> Changes auto-saved as draft · last saved just now
                    </div>
                    <div class="d-flex gap-3">
                        <button type="reset" class="btn btn-light border px-4 py-2 fw-medium">Discard changes</button>
                        <button type="submit" class="btn btn-dark px-4 py-2 fw-medium">Save & publish <i class="bi bi-arrow-up-right ms-1"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<template id="degree-template">
    <div class="education-card card mb-4 border rounded-3 bg-light" data-index="__INDEX__">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0 fw-bold">Degree <span class="degree-number">__NUMBER__</span></h6>
                <button type="button" class="btn btn-sm btn-link text-danger text-decoration-none remove-degree">
                    <i class="bi bi-trash"></i> Remove
                </button>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small fw-bold">Degree type <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg fs-6" name="educations[__INDEX__][degree_type]" required>
                        <option value="" selected disabled>Select degree type</option>
                        @foreach($degrees as $deg)
                            <option value="{{ $deg->name }}">{{ $deg->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted small fw-bold">Specialisation</label>
                    <input type="text" class="form-control form-control-lg fs-6" name="educations[__INDEX__][specialisation]" placeholder="e.g. Computer Science">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted small fw-bold">Institution <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg fs-6" name="educations[__INDEX__][institution]" required placeholder="e.g. IIT Delhi">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-muted small fw-bold">Year of graduation <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-lg fs-6" name="educations[__INDEX__][year_of_graduation]" required min="1900" max="{{ date('Y') + 5 }}">
                </div>
                <div class="col-12 mt-4">
                    <label class="form-label text-muted small fw-bold">Degree certificate <span class="text-danger">*</span></label>
                    <input type="file" class="form-control form-control-lg fs-6" name="certificates[__INDEX__]" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('educations-container');
        const addBtn = document.getElementById('add-degree-btn');
        const template = document.getElementById('degree-template').innerHTML;
        
        let degreeIndex = {{ max(count($educations), 1) }};

        // Add new degree
        addBtn.addEventListener('click', function() {
            const html = template
                .replace(/__INDEX__/g, degreeIndex)
                .replace(/__NUMBER__/g, degreeIndex + 1);
            
            container.insertAdjacentHTML('beforeend', html);
            degreeIndex++;
            updateDegreeNumbers();
        });

        // Remove degree
        container.addEventListener('click', function(e) {
            if (e.target.closest('.remove-degree')) {
                const card = e.target.closest('.education-card');
                if (container.querySelectorAll('.education-card').length > 1) {
                    card.remove();
                    updateDegreeNumbers();
                } else {
                    alert('You must have at least one degree.');
                }
            }
        });

        // Update file input style on change (for new uploads)
        container.addEventListener('change', function(e) {
            if (e.target.type === 'file') {
                const file = e.target.files[0];
                if (file) {
                    // Update styling to mimic "uploaded" state if desired
                    // For now, simple file name display could be added, but standard input is fine.
                }
            }
        });

        function updateDegreeNumbers() {
            const cards = container.querySelectorAll('.education-card');
            cards.forEach((card, i) => {
                const numSpan = card.querySelector('.degree-number');
                if (numSpan) numSpan.textContent = i + 1;
                
                // Show/hide remove button
                const removeBtn = card.querySelector('.remove-degree');
                if (removeBtn) {
                    if (cards.length === 1) {
                        removeBtn.classList.add('d-none');
                    } else {
                        removeBtn.classList.remove('d-none');
                    }
                }
            });
        }
        
        updateDegreeNumbers();
    });
</script>
@endsection
