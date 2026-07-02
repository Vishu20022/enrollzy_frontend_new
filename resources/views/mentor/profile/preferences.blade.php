@extends('mentor.layouts.app')

@section('title', 'Notification Preferences')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Notification preferences</h3>
        <p class="text-muted mb-4 pb-3 border-bottom">Control how and when Enrollzy contacts you.</p>

        <form action="{{ route('mentor.profile.preferences.store') }}" method="POST">
            @csrf

            <!-- New booking request -->
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <div>
                    <h6 class="fw-bold mb-1">New booking request</h6>
                    <small class="text-muted">Notify me when a student requests a session.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="new_booking_request" value="1" {{ old('new_booking_request', $preference->new_booking_request) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <!-- Session reminders -->
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <div>
                    <h6 class="fw-bold mb-1">Session reminders</h6>
                    <small class="text-muted">24 hrs and 1 hr before each scheduled session.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="session_reminders" value="1" {{ old('session_reminders', $preference->session_reminders) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <!-- New review posted -->
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <div>
                    <h6 class="fw-bold mb-1">New review posted</h6>
                    <small class="text-muted">Notify when a student leaves a review.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="new_review_posted" value="1" {{ old('new_review_posted', $preference->new_review_posted) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <!-- Weekly analytics digest -->
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <div>
                    <h6 class="fw-bold mb-1">Weekly analytics digest</h6>
                    <small class="text-muted">Profile views, searches, and booking trends.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="weekly_analytics_digest" value="1" {{ old('weekly_analytics_digest', $preference->weekly_analytics_digest) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <!-- Platform announcements -->
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <div>
                    <h6 class="fw-bold mb-1">Platform announcements</h6>
                    <small class="text-muted">New features, policy updates, opportunities.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="platform_announcements" value="1" {{ old('platform_announcements', $preference->platform_announcements) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <!-- WhatsApp notifications -->
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom mb-4">
                <div>
                    <h6 class="fw-bold mb-1">WhatsApp notifications</h6>
                    <small class="text-muted">Receive booking alerts via WhatsApp in addition to email.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="whatsapp_notifications" value="1" {{ old('whatsapp_notifications', $preference->whatsapp_notifications) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <!-- Notification email -->
            <div class="mb-4">
                <label class="form-label fw-bold text-dark mb-1">Notification email</label>
                <div style="max-width: 400px;">
                    <input type="email" class="form-control form-control-lg fs-6" name="notification_email" value="{{ old('notification_email', $preference->notification_email) }}">
                </div>
            </div>

            <!-- WhatsApp number -->
            <div class="mb-5">
                <label class="form-label fw-bold text-dark mb-1">WhatsApp number</label>
                <div style="max-width: 400px;">
                    <input type="text" class="form-control form-control-lg fs-6" name="whatsapp_number" value="{{ old('whatsapp_number', $preference->whatsapp_number) }}" placeholder="+91 98765 43210">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <div class="text-muted small">
                    <i class="bi bi-shield-check"></i> Changes auto-saved as draft &middot; last saved just now
                </div>
                <div>
                    <a href="{{ route('mentor.profile.preferences') }}" class="btn btn-light border px-4 py-2 me-2 fw-bold" style="color: #374151;">Discard changes</a>
                    <button type="submit" class="btn btn-dark px-4 py-2 fw-bold">Save &amp; publish <i class="bi bi-arrow-up-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .form-switch .form-check-input:checked {
        background-color: #5b21b6;
        border-color: #5b21b6;
    }
</style>
@endsection
