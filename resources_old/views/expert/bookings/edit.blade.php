@extends('admin.layouts.master')

@section('title', 'Manage Booking')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Manage Booking #{{ $booking->booking_id }}</h5>
                    <a href="{{ route('expert.bookings.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <!-- Booking Details Summary -->
                    <div class="alert alert-light border mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="small text-muted fw-bold text-uppercase">Student</label>
                                <div class="fw-bold">{{ $booking->user->name ?? 'Unknown' }}</div>
                                <div class="small">{{ $booking->user->email ?? '' }}</div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="small text-muted fw-bold text-uppercase">Session</label>
                                <div>{{ $booking->slot ? $booking->slot->date->format('d M, Y') : 'N/A' }}</div>
                                <div class="small">
                                    {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->start_time)->format('h:i A') : '' }} - 
                                    {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->end_time)->format('h:i A') : '' }}
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="small text-muted fw-bold text-uppercase">Notes / Purpose</label>
                                <div class="p-2 bg-white border rounded">
                                    {{ $booking->notes ?: 'No notes provided.' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('expert.bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label class="form-label fw-bold">Booking Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="no-show" {{ $booking->status == 'no-show' ? 'selected' : '' }}>No Show</option>
                            </select>
                            <div class="form-text">Update the status based on the session progress.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Meeting Link (Zoom/Meet)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                <input type="url" name="meeting_link" class="form-control" placeholder="https://meet.google.com/..." value="{{ old('meeting_link', $booking->meeting_link) }}">
                            </div>
                            <div class="form-text">Share the meeting link with the student (only visible after confirmation).</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <i class="fas fa-save me-2"></i> Update Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
