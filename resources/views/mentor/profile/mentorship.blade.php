@extends('mentor.layouts.app')

@section('title', 'Mentorship Details')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Mentorship details</h3>
        <p class="text-muted mb-4 pb-3 border-bottom">Tell students exactly what you can help with and how you mentor.</p>

        <form action="{{ route('mentor.profile.mentorship.store') }}" method="POST" id="mentorship-form">
            @csrf
            
            <div class="mb-4 pb-2 border-bottom">
                <label class="form-label text-muted small fw-bold">Areas of mentorship <span class="text-danger">*</span></label>
                <div class="border rounded-3 p-3 bg-white" id="tags-container" style="min-height: 100px; cursor: text;">
                    <div id="tags-wrapper" class="d-flex flex-wrap gap-2 mb-2">
                        <!-- Tags will be dynamically injected here -->
                    </div>
                    <input type="text" id="tag-input" class="form-control border-0 p-0 shadow-none" placeholder="+ add area" style="width: 150px;">
                </div>
                <!-- Hidden input to store JSON array of tags -->
                <input type="hidden" name="areas_of_mentorship" id="hidden-tags" value="{{ json_encode(old('areas_of_mentorship', $mentorship->areas_of_mentorship ?? [])) }}">
                <small class="text-muted mt-2 d-block">Add up to 8. Specific tags ("GMAT prep") outperform generic ones ("career guidance") in search.</small>
            </div>

            @php
                $levels = old('target_mentee_levels', $mentorship->target_mentee_levels ?? []);
                $formats = old('session_formats', $mentorship->session_formats ?? []);
                $durations = old('session_durations', $mentorship->session_durations ?? []);
            @endphp

            <div class="mb-4 pb-2 border-bottom">
                <label class="form-label text-muted small fw-bold mb-3">Target mentee level <span class="text-danger">*</span></label>
                <div class="d-flex flex-wrap gap-4 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="target_mentee_levels[]" value="High school" id="level_high" {{ in_array('High school', $levels) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="level_high">High school</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="target_mentee_levels[]" value="Undergraduate" id="level_undergrad" {{ in_array('Undergraduate', $levels) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="level_undergrad">Undergraduate</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="target_mentee_levels[]" value="Postgraduate" id="level_postgrad" {{ in_array('Postgraduate', $levels) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="level_postgrad">Postgraduate</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="target_mentee_levels[]" value="PhD" id="level_phd" {{ in_array('PhD', $levels) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="level_phd">PhD</label>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-4 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="target_mentee_levels[]" value="Early career (0-3 yrs)" id="level_early" {{ in_array('Early career (0-3 yrs)', $levels) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="level_early">Early career (0-3 yrs)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="target_mentee_levels[]" value="Mid career" id="level_mid" {{ in_array('Mid career', $levels) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="level_mid">Mid career</label>
                    </div>
                </div>
            </div>

            <div class="mb-4 pb-2 border-bottom">
                <label class="form-label text-muted small fw-bold mb-3">Session format</label>
                <div class="d-flex flex-wrap gap-4 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_formats[]" value="1:1 sessions" id="format_1_1" {{ in_array('1:1 sessions', $formats) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="format_1_1">1:1 sessions</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_formats[]" value="Group sessions (<=5)" id="format_group" {{ in_array('Group sessions (<=5)', $formats) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="format_group">Group sessions (<=5)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_formats[]" value="Webinars / open sessions" id="format_webinar" {{ in_array('Webinars / open sessions', $formats) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="format_webinar">Webinars / open sessions</label>
                    </div>
                </div>
            </div>

            <div class="mb-4 pb-2 border-bottom">
                <label class="form-label text-muted small fw-bold mb-3">Session duration offered</label>
                <div class="d-flex flex-wrap gap-4 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_durations[]" value="15 min (quick chat)" id="dur_15" {{ in_array('15 min (quick chat)', $durations) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="dur_15">15 min (quick chat)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_durations[]" value="30 min" id="dur_30" {{ in_array('30 min', $durations) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="dur_30">30 min</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_durations[]" value="60 min" id="dur_60" {{ in_array('60 min', $durations) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="dur_60">60 min</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="session_durations[]" value="90 min" id="dur_90" {{ in_array('90 min', $durations) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="dur_90">90 min</label>
                    </div>
                </div>
            </div>

            <div class="mb-4 pb-2 border-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label text-muted small fw-bold">Preferred platform</label>
                        <select class="form-select form-select-lg fs-6" name="preferred_platform">
                            <option value="Google Meet" {{ old('preferred_platform', $mentorship->preferred_platform) == 'Google Meet' ? 'selected' : '' }}>Google Meet</option>
                            <option value="Zoom" {{ old('preferred_platform', $mentorship->preferred_platform) == 'Zoom' ? 'selected' : '' }}>Zoom</option>
                            <option value="Microsoft Teams" {{ old('preferred_platform', $mentorship->preferred_platform) == 'Microsoft Teams' ? 'selected' : '' }}>Microsoft Teams</option>
                            <option value="Skype" {{ old('preferred_platform', $mentorship->preferred_platform) == 'Skype' ? 'selected' : '' }}>Skype</option>
                            <option value="Phone Call" {{ old('preferred_platform', $mentorship->preferred_platform) == 'Phone Call' ? 'selected' : '' }}>Phone Call</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label text-muted small fw-bold">Mentoring style (optional)</label>
                <textarea class="form-control form-control-lg fs-6" name="mentoring_style" rows="4" placeholder="Describe how you typically run sessions — e.g. structured agenda, open Q&A, resource sharing, mock drills...">{{ old('mentoring_style', $mentorship->mentoring_style) }}</textarea>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <div class="text-muted small">
                    <i class="bi bi-shield-check"></i> Changes auto-saved as draft &middot; last saved just now
                </div>
                <div>
                    <a href="{{ route('mentor.profile.mentorship') }}" class="btn btn-light border px-4 py-2 me-2 fw-bold" style="color: #374151;">Discard changes</a>
                    <button type="submit" class="btn btn-dark px-4 py-2 fw-bold">Save &amp; publish <i class="bi bi-arrow-up-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .mentor-tag {
        background-color: #f3f0ff;
        color: #5b21b6;
        border: 1px solid #ddd6fe;
        border-radius: 20px;
        padding: 5px 12px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .mentor-tag .remove-tag {
        cursor: pointer;
        color: #4c1d95;
        font-weight: bold;
    }
    .mentor-tag .remove-tag:hover {
        color: #ef4444;
    }
    .form-check-input:checked {
        background-color: #5b21b6;
        border-color: #5b21b6;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tagsContainer = document.getElementById('tags-container');
        const tagsWrapper = document.getElementById('tags-wrapper');
        const tagInput = document.getElementById('tag-input');
        const hiddenTagsInput = document.getElementById('hidden-tags');
        const form = document.getElementById('mentorship-form');
        
        // Initialize existing tags
        let tags = [];
        try {
            const rawValue = hiddenTagsInput.value;
            if (rawValue) {
                tags = JSON.parse(rawValue);
            }
        } catch (e) {
            tags = [];
        }

        function renderTags() {
            tagsWrapper.innerHTML = '';
            tags.forEach((tag, index) => {
                const tagEl = document.createElement('div');
                tagEl.className = 'mentor-tag';
                tagEl.innerHTML = `
                    ${tag}
                    <span class="remove-tag" data-index="${index}">&times;</span>
                `;
                tagsWrapper.appendChild(tagEl);
            });
            hiddenTagsInput.value = JSON.stringify(tags);
        }

        renderTags();

        // Focus input when clicking anywhere in container
        tagsContainer.addEventListener('click', () => {
            tagInput.focus();
        });

        // Add tag on Enter or Comma
        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                addTag(this.value);
            }
        });

        function addTag(value) {
            const tagText = value.trim();
            if (tagText && tags.length < 8 && !tags.includes(tagText)) {
                tags.push(tagText);
                renderTags();
                tagInput.value = '';
            } else if (tags.length >= 8) {
                alert('You can only add up to 8 areas of mentorship.');
            }
            tagInput.value = '';
        }

        // Remove tag
        tagsWrapper.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) {
                const index = e.target.getAttribute('data-index');
                tags.splice(index, 1);
                renderTags();
            }
        });

        // Add remaining text in input on form submit just in case user forgot to press enter
        form.addEventListener('submit', function() {
            if (tagInput.value.trim() !== '') {
                addTag(tagInput.value);
            }
        });
    });
</script>
@endsection
