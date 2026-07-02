@extends('mentor.layouts.app')

@section('title', 'Professional Information')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Professional information</h3>
        <p class="text-muted mb-4 pb-3 border-bottom">Your current role is the single strongest trust signal. Keep it updated.</p>

        <form action="{{ route('mentor.profile.professional.store') }}" method="POST">
            @csrf

            <div id="experiences-container">
                @if($experiences->isEmpty())
                    <!-- Empty State / First Item -->
                    <div class="experience-card border rounded-3 p-4 mb-4 bg-light">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="fw-bold mb-0">Role <span class="experience-number">1</span></h5>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-experience d-none"><i class="bi bi-trash"></i></button>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Job title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg fs-6" name="experiences[0][job_title]" placeholder="e.g. Senior Product Manager" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Company / organisation <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg fs-6" name="experiences[0][company]" placeholder="e.g. Microsoft India" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Industry <span class="text-danger">*</span></label>
                                <select class="form-select form-select-lg fs-6" name="experiences[0][industry]" required>
                                    <option value="" selected disabled>Select industry</option>
                                    @foreach($industries as $ind)
                                        <option value="{{ $ind->name }}">{{ $ind->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Years of experience <span class="text-danger">*</span></label>
                                <select class="form-select form-select-lg fs-6" name="experiences[0][years_of_experience]" required>
                                    <option value="" selected disabled>Select experience</option>
                                    <option value="0-2 years">0-2 years</option>
                                    <option value="3-5 years">3-5 years</option>
                                    <option value="5-10 years">5-10 years</option>
                                    <option value="10+ years">10+ years</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Start year <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-lg fs-6" name="experiences[0][start_year]" min="1900" max="{{ date('Y') }}" placeholder="e.g. 2019" required>
                            </div>
                            <div class="col-md-6 d-flex align-items-center mt-md-4 pt-md-3">
                                <div class="form-check">
                                    <input class="form-check-input is-current-checkbox" type="checkbox" name="experiences[0][is_current]" value="1" checked id="is_current_0">
                                    <label class="form-check-label fw-bold ms-2" for="is_current_0" style="color: #4f46e5;">
                                        Currently working here
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4 end-year-container d-none">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">End year</label>
                                <input type="number" class="form-control form-control-lg fs-6 end-year-input" name="experiences[0][end_year]" min="1900" max="{{ date('Y') }}" placeholder="e.g. 2023">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">LinkedIn profile URL <span class="text-danger">*</span></label>
                            <input type="url" class="form-control form-control-lg fs-6" name="experiences[0][linkedin_url]" placeholder="https://linkedin.com/in/..." required>
                            <small class="text-muted">Used for verification — must match your name and current role.</small>
                        </div>
                        
                        <div class="mb-2">
                            <label class="form-label text-muted small fw-bold">Key achievements (optional)</label>
                            <textarea class="form-control form-control-lg fs-6" name="experiences[0][achievements]" rows="3" placeholder="e.g. Led product team that grew DAU by 3x, launched 2 zero-to-one products..."></textarea>
                            <small class="text-muted">Students find specific achievements 3x more compelling than generic descriptions.</small>
                        </div>
                    </div>
                @else
                    <!-- Populated Items -->
                    @foreach($experiences as $index => $experience)
                        <div class="experience-card border rounded-3 p-4 mb-4 bg-light">
                            <input type="hidden" name="experiences[{{ $index }}][id]" value="{{ $experience->id }}">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="fw-bold mb-0">Role <span class="experience-number">{{ $index + 1 }}</span></h5>
                                <button type="button" class="btn btn-sm btn-outline-danger remove-experience {{ count($experiences) == 1 ? 'd-none' : '' }}"><i class="bi bi-trash"></i></button>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Job title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-6" name="experiences[{{ $index }}][job_title]" value="{{ $experience->job_title }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Company / organisation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-6" name="experiences[{{ $index }}][company]" value="{{ $experience->company }}" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Industry <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg fs-6" name="experiences[{{ $index }}][industry]" required>
                                        <option value="" disabled>Select industry</option>
                                        @foreach($industries as $ind)
                                            <option value="{{ $ind->name }}" {{ $experience->industry == $ind->name ? 'selected' : '' }}>{{ $ind->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Years of experience <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg fs-6" name="experiences[{{ $index }}][years_of_experience]" required>
                                        <option value="" disabled>Select experience</option>
                                        <option value="0-2 years" {{ $experience->years_of_experience == '0-2 years' ? 'selected' : '' }}>0-2 years</option>
                                        <option value="3-5 years" {{ $experience->years_of_experience == '3-5 years' ? 'selected' : '' }}>3-5 years</option>
                                        <option value="5-10 years" {{ $experience->years_of_experience == '5-10 years' ? 'selected' : '' }}>5-10 years</option>
                                        <option value="10+ years" {{ $experience->years_of_experience == '10+ years' ? 'selected' : '' }}>10+ years</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Start year <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-lg fs-6" name="experiences[{{ $index }}][start_year]" value="{{ $experience->start_year }}" min="1900" max="{{ date('Y') }}" required>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mt-md-4 pt-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input is-current-checkbox" type="checkbox" name="experiences[{{ $index }}][is_current]" value="1" {{ $experience->is_current ? 'checked' : '' }} id="is_current_{{ $index }}">
                                        <label class="form-check-label fw-bold ms-2" for="is_current_{{ $index }}" style="color: #4f46e5;">
                                            Currently working here
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-4 end-year-container {{ $experience->is_current ? 'd-none' : '' }}">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">End year</label>
                                    <input type="number" class="form-control form-control-lg fs-6 end-year-input" name="experiences[{{ $index }}][end_year]" value="{{ $experience->end_year }}" min="1900" max="{{ date('Y') }}" {{ !$experience->is_current ? 'required' : '' }}>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label text-muted small fw-bold">LinkedIn profile URL <span class="text-danger">*</span></label>
                                <input type="url" class="form-control form-control-lg fs-6" name="experiences[{{ $index }}][linkedin_url]" value="{{ $experience->linkedin_url }}" required>
                                <small class="text-muted">Used for verification — must match your name and current role.</small>
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label text-muted small fw-bold">Key achievements (optional)</label>
                                <textarea class="form-control form-control-lg fs-6" name="experiences[{{ $index }}][achievements]" rows="3">{{ $experience->achievements }}</textarea>
                                <small class="text-muted">Students find specific achievements 3x more compelling than generic descriptions.</small>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="d-grid mb-5">
                <button type="button" class="btn btn-light border py-2" id="add-experience-btn" style="border-style: dashed !important; color: #4b5563; font-weight: 500;">
                    + Add past experience
                </button>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <div class="text-muted small">
                    <i class="bi bi-shield-check"></i> Changes auto-saved as draft &middot; last saved just now
                </div>
                <div>
                    <a href="{{ route('mentor.profile.professional') }}" class="btn btn-light border px-4 py-2 me-2 fw-bold" style="color: #374151;">Discard changes</a>
                    <button type="submit" class="btn btn-dark px-4 py-2 fw-bold">Save &amp; publish <i class="bi bi-arrow-up-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Template for new experience -->
<template id="experience-template">
    <div class="experience-card border rounded-3 p-4 mb-4 bg-light">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="fw-bold mb-0">Role <span class="experience-number">__NUMBER__</span></h5>
            <button type="button" class="btn btn-sm btn-outline-danger remove-experience"><i class="bi bi-trash"></i></button>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-muted small fw-bold">Job title <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg fs-6" name="experiences[__INDEX__][job_title]" required>
            </div>
            <div class="col-md-6">
                <label class="form-label text-muted small fw-bold">Company / organisation <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg fs-6" name="experiences[__INDEX__][company]" required>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-muted small fw-bold">Industry <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg fs-6" name="experiences[__INDEX__][industry]" required>
                    <option value="" selected disabled>Select industry</option>
                    @foreach($industries as $ind)
                        <option value="{{ $ind->name }}">{{ $ind->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label text-muted small fw-bold">Years of experience <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg fs-6" name="experiences[__INDEX__][years_of_experience]" required>
                    <option value="" selected disabled>Select experience</option>
                    <option value="0-2 years">0-2 years</option>
                    <option value="3-5 years">3-5 years</option>
                    <option value="5-10 years">5-10 years</option>
                    <option value="10+ years">10+ years</option>
                </select>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label text-muted small fw-bold">Start year <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-lg fs-6" name="experiences[__INDEX__][start_year]" min="1900" max="{{ date('Y') }}" required>
            </div>
            <div class="col-md-6 d-flex align-items-center mt-md-4 pt-md-3">
                <div class="form-check">
                    <input class="form-check-input is-current-checkbox" type="checkbox" name="experiences[__INDEX__][is_current]" value="1" id="is_current___INDEX__">
                    <label class="form-check-label fw-bold ms-2" for="is_current___INDEX__" style="color: #4f46e5;">
                        Currently working here
                    </label>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4 end-year-container">
            <div class="col-md-6">
                <label class="form-label text-muted small fw-bold">End year</label>
                <input type="number" class="form-control form-control-lg fs-6 end-year-input" name="experiences[__INDEX__][end_year]" min="1900" max="{{ date('Y') }}" required>
            </div>
        </div>
        
        <div class="mb-4">
            <label class="form-label text-muted small fw-bold">LinkedIn profile URL <span class="text-danger">*</span></label>
            <input type="url" class="form-control form-control-lg fs-6" name="experiences[__INDEX__][linkedin_url]" required>
            <small class="text-muted">Used for verification — must match your name and current role.</small>
        </div>
        
        <div class="mb-2">
            <label class="form-label text-muted small fw-bold">Key achievements (optional)</label>
            <textarea class="form-control form-control-lg fs-6" name="experiences[__INDEX__][achievements]" rows="3"></textarea>
            <small class="text-muted">Students find specific achievements 3x more compelling than generic descriptions.</small>
        </div>
    </div>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('experiences-container');
        const addBtn = document.getElementById('add-experience-btn');
        const template = document.getElementById('experience-template').innerHTML;
        
        let experienceIndex = {{ max(count($experiences), 1) }};

        // Add new experience
        addBtn.addEventListener('click', function() {
            const html = template
                .replace(/__INDEX__/g, experienceIndex)
                .replace(/__NUMBER__/g, experienceIndex + 1);
            
            container.insertAdjacentHTML('beforeend', html);
            experienceIndex++;
            updateExperienceNumbers();
        });

        // Remove experience
        container.addEventListener('click', function(e) {
            if (e.target.closest('.remove-experience')) {
                const card = e.target.closest('.experience-card');
                if (container.querySelectorAll('.experience-card').length > 1) {
                    card.remove();
                    updateExperienceNumbers();
                } else {
                    alert('You must have at least one experience entry.');
                }
            }
        });

        // Toggle End Year based on 'Currently working here' checkbox
        container.addEventListener('change', function(e) {
            if (e.target.classList.contains('is-current-checkbox')) {
                const card = e.target.closest('.experience-card');
                const endYearContainer = card.querySelector('.end-year-container');
                const endYearInput = card.querySelector('.end-year-input');
                
                if (e.target.checked) {
                    endYearContainer.classList.add('d-none');
                    endYearInput.removeAttribute('required');
                    endYearInput.value = ''; // clear value
                } else {
                    endYearContainer.classList.remove('d-none');
                    endYearInput.setAttribute('required', 'required');
                }
            }
        });

        function updateExperienceNumbers() {
            const cards = container.querySelectorAll('.experience-card');
            cards.forEach((card, i) => {
                const numSpan = card.querySelector('.experience-number');
                if (numSpan) numSpan.textContent = i + 1;
                
                // Show/hide remove button
                const removeBtn = card.querySelector('.remove-experience');
                if (removeBtn) {
                    if (cards.length === 1) {
                        removeBtn.classList.add('d-none');
                    } else {
                        removeBtn.classList.remove('d-none');
                    }
                }
            });
        }
        
        updateExperienceNumbers();
    });
</script>
@endsection
