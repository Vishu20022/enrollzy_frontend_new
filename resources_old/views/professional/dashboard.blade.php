@extends('admin.layouts.master')

@section('title', 'Professional Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Availability Slots Management -->
        <div class="col-xl-5">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-calendar-plus text-primary me-2"></i> Add Availability Slot</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('expert.slots.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Date</label>
                            <input type="date" name="date" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col">
                                <label class="form-label fw-bold">Start Time</label>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="form-label fw-bold">End Time</label>
                                <input type="time" name="end_time" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">
                            <i class="fas fa-plus me-2"></i> Create Slot
                        </button>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-clock text-info me-2"></i> Recent Slots</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3 py-3 border-0">Date & Time</th>
                                    <th class="border-0">Status</th>
                                    <th class="text-end pe-3 border-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($slots->take(5) as $slot)
                                    <tr>
                                        <td class="ps-3 py-3">
                                            <div class="fw-semibold text-dark">{{ \Carbon\Carbon::parse($slot->date)->format('d M, Y') }}</div>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}</small>
                                        </td>
                                        <td>
                                            @if($slot->status == 'open' || $slot->status == 'available')
                                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">Open</span>
                                            @elseif($slot->status == 'closed' || $slot->status == 'blocked')
                                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3">Closed</span>
                                            @else
                                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3">Booked</span>
                                            @endif
                                        </td>
                                        <td class="text-end pe-3">
                                            @if($slot->status != 'booked')
                                                <div class="btn-group">
                                                    <a href="{{ route('expert.slots.edit', $slot->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                    <form action="{{ route('expert.slots.destroy', $slot->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Permanently remove this slot?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-light border text-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-muted small italic">Managed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5 text-muted small">
                                            No slots created yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-2 text-center border-top">
                            <a href="{{ route('expert.slots.index') }}" class="small text-decoration-none">View All Slots <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointment Bookings -->
        <div class="col-xl-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-user-graduate text-warning me-2"></i> Student Appointments</h5>
                    <span class="badge bg-light text-dark border">{{ $appointments->count() }} Total</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3 py-3 border-0">Student Profile</th>
                                    <th class="border-0">Schedule</th>
                                    <th class="border-0" style="width: 150px;">Status</th>
                                    <th class="text-end pe-3 border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    @php
                                        // Standardize variables based on model type
                                        $isExpertMode = $isExpert ?? false;
                                        $slotDate = $isExpertMode ? $appointment->slot->date : $appointment->availability_slot->date;
                                        $slotStart = $isExpertMode ? $appointment->slot->start_time : $appointment->availability_slot->start_time;
                                        $description = $isExpertMode ? $appointment->notes : $appointment->description;
                                        $manageRoute = $isExpertMode ? route('expert.bookings.edit', $appointment->id) : route('expert.appointments.edit', $appointment->id);
                                    @endphp
                                    <tr>
                                        <td class="ps-3 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3 text-white d-flex align-items-center justify-content-center bg-primary rounded-circle" style="width: 35px; height: 35px;">
                                                    {{ substr($appointment->user->name ?? 'U', 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $appointment->user->name ?? 'Unknown' }}</div>
                                                    <small class="text-muted">{{ Str::limit($description, 35) }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-dark fw-medium">{{ \Carbon\Carbon::parse($slotDate)->format('M d, Y') }}</div>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($slotStart)->format('h:i A') }}</small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $appointment->status == 'confirmed' ? 'bg-success' : ($appointment->status == 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                            @if($appointment->meeting_link)
                                                <div class="mt-1">
                                                    <a href="{{ $appointment->meeting_link }}" target="_blank" class="small text-primary text-decoration-none">
                                                        <i class="fas fa-video me-1"></i> Join
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-end pe-3">
                                            <a href="{{ $manageRoute }}" class="btn btn-sm btn-outline-primary rounded-pill border-0 bg-primary-subtle text-primary fw-bold">
                                                Manage
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    <!-- Lead Detail Modal -->
                                    <div class="modal fade" id="viewLead-{{ $appointment->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                                                <div class="modal-header border-bottom-0 pb-0">
                                                    <h5 class="modal-title fw-bold">Appointment Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card bg-light border-0 mb-4 rounded-4">
                                                        <div class="card-body">
                                                            <label class="text-muted small text-uppercase fw-bold mb-1">Student Contact</label>
                                                            <div class="h5 fw-bold mb-0 text-dark">{{ $appointment->user->name ?? 'Unknown' }}</div>
                                                            <div class="text-muted small">{{ $appointment->user->email ?? '' }}</div>
                                                            <div class="text-primary fw-bold small mt-1"><i class="fas fa-phone-alt me-1"></i> {{ $appointment->user->mobile ?? 'N/A' }}</div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="text-muted small text-uppercase fw-bold mb-2">Timing</label>
                                                        <div class="d-flex align-items-center">
                                                            <div class="bg-primary-subtle p-2 rounded text-primary me-3">
                                                                <i class="fas fa-calendar-check fa-lg"></i>
                                                            </div>
                                                            <div>
                                                                <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($slotDate)->format('l, d F Y') }}</div>
                                                                <div class="text-muted">{{ \Carbon\Carbon::parse($slotStart)->format('h:i A') }}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-0">
                                                        <label class="text-muted small text-uppercase fw-bold mb-2">Student Message</label>
                                                        <div class="p-4 bg-light rounded-4 border-start border-4 border-primary" style="font-size: 0.95rem; font-style: italic;">
                                                            "{{ $description ?: 'No message provided.' }}"
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0 pt-0">
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <div class="mb-3">
                                                <i class="fas fa-calendar-times fa-3x opacity-25"></i>
                                            </div>
                                            <h6 class="fw-bold">No active bookings</h6>
                                            <small>Once a student books a session, it will appear here.</small>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
