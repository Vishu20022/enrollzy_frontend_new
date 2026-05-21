@extends('layouts.master')

@section('title', 'My Appointments')

@section('content')
<div class="container py-5" style="min-height: 70vh;">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="fw-bold">My Bookings</h2>
            <p class="text-muted">Track your scheduled sessions with experts and alumni.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Professional</th>
                                    <th>Date & Time</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $booking)
                                    <tr>
                                        <td class="ps-4">
                                            <a href="{{ route('pages.experts.detail', $booking->expert_id) }}" class="text-decoration-none text-dark">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-3">
                                                        @php
                                                            $expert = $booking->expert;
                                                            $imgUrl = $expert->img ? (str_starts_with($expert->img, 'http') ? $expert->img : asset($expert->img)) : 'https://ui-avatars.com/api/?name='.urlencode($expert->name);
                                                        @endphp
                                                        <img src="{{ $imgUrl }}" class="rounded-circle shadow-sm" width="40" height="40" style="object-fit:cover;">
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">{{ $expert->name }}</div>
                                                        <small class="text-muted">{{ $expert->role }}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            @if($booking->slot)
                                                <div class="fw-semibold">{{ $booking->slot->date->format('d M, Y') }}</div>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($booking->slot->start_time)->format('h:i A') }}</small>
                                            @else
                                                <span class="text-muted">Slot Removed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark">₹{{ number_format($booking->amount, 2) }}</div>
                                            @if($booking->payment_status === 'paid')
                                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill" style="font-size: 0.65rem;">Paid</span>
                                            @else
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill" style="font-size: 0.65rem;">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $badgeClass = match($booking->status) {
                                                    'pending' => 'bg-warning-subtle text-warning',
                                                    'confirmed' => 'bg-success-subtle text-success',
                                                    'completed' => 'bg-info-subtle text-info',
                                                    'cancelled' => 'bg-danger-subtle text-danger',
                                                    default => 'bg-secondary-subtle text-secondary'
                                                };
                                            @endphp
                                            <span class="badge {{ $badgeClass }} px-3 rounded-pill">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            @if($booking->meeting_link)
                                                <a href="{{ $booking->meeting_link }}" target="_blank" class="btn btn-sm btn-primary me-2">
                                                    <i class="fas fa-video me-1"></i> Join Meeting
                                                </a>
                                            @endif
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#desc-{{ $booking->id }}">
                                                View Note
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="desc-{{ $booking->id }}">
                                        <td colspan="4" class="px-4 py-3 bg-light-subtle">
                                            <div class="small text-muted mb-1">Your Message:</div>
                                            <div class="p-3 bg-white rounded border small">
                                                {{ $booking->notes }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="fas fa-calendar-alt fa-3x mb-3 d-block opacity-25"></i>
                                            <h5>No appointments booked yet.</h5>
                                            <p>Navigate to our Experts or Alumni section to book a session.</p>
                                            <a href="{{ route('pages.home') }}" class="btn btn-primary mt-2">Browse Professionals</a>
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
