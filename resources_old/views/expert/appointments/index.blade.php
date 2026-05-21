@extends('admin.layouts.master')

@section('title', 'Manage Appointments')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Appointments</h1>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Upcoming Appointments</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3 border-0">Student</th>
                            <th class="border-0">Schedule</th>
                            <th class="border-0">Message</th>
                            <th class="border-0" style="width: 150px;">Status</th>
                            <th class="text-end pe-3 border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-3 text-white d-flex align-items-center justify-content-center bg-primary rounded-circle" style="width: 35px; height: 35px;">
                                            {{ substr($appointment->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $appointment->user->name }}</div>
                                            <div class="small text-muted">{{ $appointment->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark">{{ \Carbon\Carbon::parse($appointment->availability_slot->date)->format('M d, Y') }}</div>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($appointment->availability_slot->start_time)->format('h:i A') }} - 
                                        {{ \Carbon\Carbon::parse($appointment->availability_slot->end_time)->format('h:i A') }}
                                    </small>
                                </td>
                                <td>
                                    <small class="text-muted fst-italic">"{{ Str::limit($appointment->description, 30) }}"</small>
                                </td>
                                <td>
                                    <span class="badge {{ $appointment->status == 'confirmed' ? 'bg-success' : ($appointment->status == 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                    @if($appointment->meeting_link)
                                        <div class="mt-1">
                                            <a href="{{ $appointment->meeting_link }}" target="_blank" class="small text-primary text-decoration-none">
                                                <i class="fas fa-video me-1"></i> Join Meeting
                                            </a>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-end pe-3">
                                    <div class="btn-group">
                                        <a href="{{ route('expert.appointments.edit', $appointment->id) }}" class="btn btn-sm btn-outline-primary" title="Edit Booking">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#viewLead-{{ $appointment->id }}" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Detail Modal -->
                            <div class="modal fade" id="viewLead-{{ $appointment->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg">
                                        <div class="modal-header border-bottom-0 pb-0">
                                            <h5 class="modal-title fw-bold">Appointment Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card bg-light border-0 mb-3">
                                                <div class="card-body">
                                                    <label class="text-muted small text-uppercase fw-bold mb-1">Student Contact</label>
                                                    <div class="h5 fw-bold mb-0 text-dark">{{ $appointment->user->name }}</div>
                                                    <div class="text-muted">{{ $appointment->user->email }}</div>
                                                    <div class="text-primary mt-1"><i class="fas fa-phone-alt me-1"></i> {{ $appointment->user->mobile }}</div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-muted small text-uppercase fw-bold mb-2">Message</label>
                                                <div class="p-3 bg-white border rounded">
                                                    {{ $appointment->description ?: 'No message provided.' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-3 py-3">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
