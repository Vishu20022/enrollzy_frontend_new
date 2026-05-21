@extends('admin.layouts.master')

@section('title', 'Manage Bookings')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Bookings</h1>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Recent Bookings</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3 border-0">Booking ID</th>
                            <th class="border-0">Student</th>
                            <th class="border-0">Session Details</th>
                            <th class="border-0">Amount</th>
                            <th class="border-0">Payment</th>
                            <th class="border-0">Status</th>
                            <th class="text-end pe-3 border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td class="ps-3 fw-bold text-primary">{{ $booking->booking_id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-2 bg-secondary-subtle text-secondary rounded-circle d-flex align-items-center justify-content-center">
                                            {{ strtoupper(substr($booking->user->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark">{{ $booking->user->name ?? 'Unknown User' }}</div>
                                            <div class="small text-muted">{{ $booking->user->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><i class="fas fa-calendar-alt me-1 text-muted"></i> {{ $booking->slot ? $booking->slot->date->format('d M, Y') : 'N/A' }}</div>
                                    <div class="small text-muted">
                                        <i class="fas fa-clock me-1"></i> 
                                        {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->start_time)->format('h:i A') : '' }} - 
                                        {{ $booking->slot ? \Carbon\Carbon::parse($booking->slot->end_time)->format('h:i A') : '' }}
                                    </div>
                                    <div class="small text-muted mt-1">
                                        <i class="fas fa-video me-1"></i> {{ ucfirst($booking->slot->mode ?? 'Video') }}
                                    </div>
                                </td>
                                <td class="fw-bold">
                                    ₹{{ number_format($booking->expert_earning, 2) }}
                                    <small class="d-block text-muted fw-normal fs-xs">Earnings</small>
                                </td>
                                <td>
                                    @if($booking->payment_status == 'paid')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle">Paid</span>
                                    @elseif($booking->payment_status == 'refunded')
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Refunded</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $statusClass = match($booking->status) {
                                            'confirmed' => 'success',
                                            'pending' => 'warning',
                                            'completed' => 'primary',
                                            'cancelled' => 'danger',
                                            'no-show' => 'secondary',
                                            default => 'secondary'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $statusClass }}-subtle text-{{ $statusClass }} border border-{{ $statusClass }}-subtle rounded-pill px-3">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('expert.bookings.edit', $booking->id) }}" class="btn btn-sm btn-light border text-primary">
                                        <i class="fas fa-edit me-1"></i> Manage
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-3 py-3">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
