@extends('admin.layouts.master')

@section('title', 'Manage Availability Slots')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Availability Slots</h1>
        <a href="{{ route('expert.slots.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add New Slot
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Your Slots</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3 border-0">Date</th>
                            <th class="border-0">Time</th>
                            <th class="border-0">Mode</th>
                            <th class="border-0">Cost</th>
                            <th class="border-0">Status</th>
                            <th class="text-end pe-3 border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($slots as $slot)
                            <tr>
                                <td class="ps-3">
                                    <div class="fw-semibold text-dark">{{ \Carbon\Carbon::parse($slot->date)->format('d M, Y') }}</div>
                                    <div class="small text-muted">{{ \Carbon\Carbon::parse($slot->date)->format('l') }}</div>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }} - 
                                    {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="fas fa-{{ $slot->mode == 'video' ? 'video' : ($slot->mode == 'audio' ? 'microphone' : 'comments') }} me-1"></i> 
                                        {{ ucfirst($slot->mode) }}
                                    </span>
                                </td>
                                <td class="fw-bold">₹{{ number_format($slot->cost, 2) }}</td>
                                <td>
                                    @if($slot->status == 'available')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">Available</span>
                                    @elseif($slot->status == 'blocked')
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3">Blocked</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3">Booked</span>
                                    @endif
                                </td>
                                <td class="text-end pe-3">
                                    @if($slot->status != 'booked')
                                        <div class="btn-group">
                                            <a href="{{ route('expert.slots.edit', $slot->id) }}" class="btn btn-sm btn-light border text-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('expert.slots.destroy', $slot->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this slot?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-light border text-danger" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="badge bg-light text-muted border">Booked</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">No availability slots found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-3 py-3">
                {{ $slots->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
