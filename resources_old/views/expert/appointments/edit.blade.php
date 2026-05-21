@extends('admin.layouts.master')

@section('title', 'Edit Appointment')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Edit Appointment Details</h5>
                    <a href="{{ route('expert.appointments.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <!-- Student Info Summary -->
                    <div class="alert alert-light border d-flex align-items-center gap-3 mb-4">
                        <div class="avatar-sm text-white d-flex align-items-center justify-content-center bg-primary rounded-circle" style="width: 45px; height: 45px; font-size: 1.2rem;">
                            {{ substr($appointment->user->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="fw-bold text-dark">{{ $appointment->user->name }}</div>
                            <div class="small text-muted">
                                <i class="fas fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($appointment->availability_slot->date)->format('M d, Y') }} 
                                <i class="fas fa-clock ms-2 me-1"></i> {{ \Carbon\Carbon::parse($appointment->availability_slot->start_time)->format('h:i A') }}
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('expert.appointments.update', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <div class="form-text">Update the status of this booking.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Meeting Link <span class="badge bg-info-subtle text-info border border-info-subtle">Important</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-video"></i></span>
                                <input type="url" name="meeting_link" class="form-control" placeholder="https://meet.google.com/..." value="{{ old('meeting_link', $appointment->meeting_link) }}">
                            </div>
                            <div class="form-text">Paste the Google Meet or Zoom link here for the student.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Notes / Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Add any notes or agenda for the meeting...">{{ old('description', $appointment->description) }}</textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <i class="fas fa-save me-2"></i> Update Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
