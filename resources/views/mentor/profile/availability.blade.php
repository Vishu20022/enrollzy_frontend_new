@extends('mentor.layouts.app')

@section('title', 'Availability & Scheduling')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Availability & scheduling</h3>
        <p class="text-muted mb-4 pb-3 border-bottom">Students check availability before reaching out. Empty slots = zero bookings.</p>

        @php
            $hasAnySlots = false;
            $savedSlots = $availability->slots ?? [];
            if (is_string($savedSlots)) {
                $savedSlots = json_decode($savedSlots, true);
            }
            if (is_array($savedSlots)) {
                foreach ($savedSlots as $daySlots) {
                    if (!empty($daySlots)) {
                        $hasAnySlots = true;
                        break;
                    }
                }
            }
        @endphp

        @if(!$hasAnySlots)
        <div class="alert alert-warning d-flex align-items-center mb-4" style="background-color: #fffbeb; border-color: #fef3c7; color: #b45309;" role="alert">
            <i class="bi bi-exclamation-triangle-fill fs-5 me-3"></i>
            <div>
                You have not set any available time slots. Students will not be able to book sessions with you.
            </div>
        </div>
        @endif

        <form action="{{ route('mentor.profile.availability.store') }}" method="POST" id="availability-form">
            @csrf
            
            <div class="mb-4 pb-4 border-bottom">
                <label class="form-label fw-bold text-dark mb-1">Timezone <span class="text-danger">*</span></label>
                <div class="input-group">
                    <select class="form-select form-select-lg fs-6 border" name="timezone">
                        <option value="Asia/Kolkata" {{ old('timezone', $availability->timezone) == 'Asia/Kolkata' ? 'selected' : '' }}>IST — India Standard Time (UTC+5:30)</option>
                        <option value="America/New_York" {{ old('timezone', $availability->timezone) == 'America/New_York' ? 'selected' : '' }}>EST — Eastern Standard Time (UTC-5:00)</option>
                        <option value="Europe/London" {{ old('timezone', $availability->timezone) == 'Europe/London' ? 'selected' : '' }}>GMT — Greenwich Mean Time (UTC+0:00)</option>
                        <option value="America/Los_Angeles" {{ old('timezone', $availability->timezone) == 'America/Los_Angeles' ? 'selected' : '' }}>PST — Pacific Standard Time (UTC-8:00)</option>
                        <option value="Asia/Singapore" {{ old('timezone', $availability->timezone) == 'Asia/Singapore' ? 'selected' : '' }}>SGT — Singapore Time (UTC+8:00)</option>
                    </select>
                </div>
            </div>

            <div class="mb-4 pb-4 border-bottom">
                @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    $predefinedSlots = [
                        '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM',
                        '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM',
                        '5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM', '9:00 PM'
                    ];
                    $savedSlots = old('slots', $availability->slots ?? []);
                    if (is_string($savedSlots)) {
                        $savedSlots = json_decode($savedSlots, true);
                    }
                @endphp

                <!-- Hidden input to store JSON string of slots -->
                <input type="hidden" name="slots" id="slots-hidden" value="{{ json_encode($savedSlots) }}">

                @foreach($days as $day)
                <div class="mb-4">
                    <label class="form-label fw-bold mb-2">{{ $day }}</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($predefinedSlots as $slot)
                            @php
                                $isActive = isset($savedSlots[$day]) && in_array($slot, (array)$savedSlots[$day]);
                            @endphp
                            <button type="button" class="btn slot-btn {{ $isActive ? 'slot-active' : 'slot-inactive' }}" 
                                    data-day="{{ $day }}" data-slot="{{ $slot }}">
                                {{ $slot }}
                            </button>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <small class="text-muted mt-2 d-block">Click slots to toggle availability. Purple = available.</small>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-dark mb-1">Advance booking notice</label>
                <div style="max-width: 300px;">
                    <select class="form-select form-select-lg fs-6" name="advance_notice">
                        <option value="At least 24 hours before" {{ old('advance_notice', $availability->advance_notice) == 'At least 24 hours before' ? 'selected' : '' }}>At least 24 hours before</option>
                        <option value="At least 48 hours before" {{ old('advance_notice', $availability->advance_notice) == 'At least 48 hours before' ? 'selected' : '' }}>At least 48 hours before</option>
                        <option value="At least 72 hours before" {{ old('advance_notice', $availability->advance_notice) == 'At least 72 hours before' ? 'selected' : '' }}>At least 72 hours before</option>
                        <option value="1 week before" {{ old('advance_notice', $availability->advance_notice) == '1 week before' ? 'selected' : '' }}>1 week before</option>
                    </select>
                </div>
            </div>

            <div class="mb-4 pb-4 border-bottom">
                <label class="form-label fw-bold text-dark mb-1">Maximum sessions per week</label>
                <div style="max-width: 150px;">
                    <input type="number" class="form-control form-control-lg fs-6" name="max_sessions" min="0" value="{{ old('max_sessions', $availability->max_sessions) }}" placeholder="e.g. 6">
                </div>
            </div>

            <div class="mb-5 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Pause all bookings</h6>
                    <small class="text-muted">Temporarily stop new bookings without hiding your profile.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="pause_bookings" value="1" {{ old('pause_bookings', $availability->pause_bookings) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <div class="text-muted small">
                    <i class="bi bi-shield-check"></i> Changes auto-saved as draft &middot; last saved just now
                </div>
                <div>
                    <a href="{{ route('mentor.profile.availability') }}" class="btn btn-light border px-4 py-2 me-2 fw-bold" style="color: #374151;">Discard changes</a>
                    <button type="submit" class="btn btn-dark px-4 py-2 fw-bold">Save &amp; publish <i class="bi bi-arrow-up-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .slot-btn {
        min-width: 100px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 8px 16px;
        transition: all 0.2s;
    }
    .slot-inactive {
        background-color: #fafafa;
        border: 1px solid #e5e5e5;
        color: #525252;
    }
    .slot-inactive:hover {
        background-color: #f5f5f5;
        border-color: #d4d4d4;
    }
    .slot-active {
        background-color: #f3f0ff;
        border: 1px solid #ddd6fe;
        color: #5b21b6;
    }
    .slot-active:hover {
        background-color: #ede9fe;
        border-color: #c4b5fd;
        color: #5b21b6;
    }
    
    .form-switch .form-check-input:checked {
        background-color: #10b981;
        border-color: #10b981;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slotsHiddenInput = document.getElementById('slots-hidden');
        let selectedSlots = {};

        try {
            const rawVal = slotsHiddenInput.value;
            if (rawVal) {
                selectedSlots = JSON.parse(rawVal);
                // If PHP passed an empty array '[]', convert it to an object '{}'
                if (Array.isArray(selectedSlots)) {
                    selectedSlots = {};
                }
            }
        } catch(e) {
            selectedSlots = {};
        }

        const slotButtons = document.querySelectorAll('.slot-btn');
        slotButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const day = this.getAttribute('data-day');
                const slot = this.getAttribute('data-slot');

                if (!selectedSlots[day]) {
                    selectedSlots[day] = [];
                }

                if (this.classList.contains('slot-active')) {
                    // Remove
                    this.classList.remove('slot-active');
                    this.classList.add('slot-inactive');
                    selectedSlots[day] = selectedSlots[day].filter(s => s !== slot);
                } else {
                    // Add
                    this.classList.remove('slot-inactive');
                    this.classList.add('slot-active');
                    if (!selectedSlots[day].includes(slot)) {
                        selectedSlots[day].push(slot);
                    }
                }

                // Update hidden input
                slotsHiddenInput.value = JSON.stringify(selectedSlots);
            });
        });
    });
</script>
@endsection
