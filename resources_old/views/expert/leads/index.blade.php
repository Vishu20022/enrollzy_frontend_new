@extends('admin.layouts.master')

@section('title', 'My Leads')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 text-dark fw-bold">My Leads</h4>
    </div>

    <!-- Leads Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Inquiries & potential students</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-uppercase small text-muted">
                            <th class="ps-4">Lead ID</th>
                            <th>Student Details</th>
                            <th>Message</th>
                            <th>Received At</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td class="ps-4 text-primary fw-bold">#LD-{{ str_pad($lead->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-primary-subtle text-primary me-3 fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($lead->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $lead->name }}</div>
                                            <div class="small text-muted">{{ $lead->email }}</div>
                                            <div class="small text-muted">{{ $lead->phone }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark mb-1">{{ $lead->subject }}</div>
                                    <div class="text-muted small text-truncate" style="max-width: 300px;" title="{{ $lead->message }}">
                                        {{ $lead->message }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        <div>
                                            <div>{{ $lead->created_at->format('d M, Y') }}</div>
                                            <small>{{ $lead->created_at->format('h:i A') }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge rounded-pill {{ 
                                        $lead->status == 'New' ? 'bg-primary' : 
                                        ($lead->status == 'Contacted' ? 'bg-info' : 
                                        ($lead->status == 'Converted' ? 'bg-success' : 'bg-danger')) 
                                    }} px-3 py-2">
                                        {{ $lead->status }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Manage
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><h6 class="dropdown-header">Update Status</h6></li>
                                            <li>
                                                <form action="{{ route('expert.leads.status', $lead->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="Contacted">
                                                    <button class="dropdown-item" type="submit"><i class="fas fa-phone-alt me-2 text-info"></i> Mark Contacted</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('expert.leads.status', $lead->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="Converted">
                                                    <button class="dropdown-item" type="submit"><i class="fas fa-check-circle me-2 text-success"></i> Mark Converted</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('expert.leads.status', $lead->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="Rejected">
                                                    <button class="dropdown-item" type="submit"><i class="fas fa-times-circle me-2 text-danger"></i> Mark Rejected</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 text-secondary opacity-50"></i>
                                        <p class="mb-0">No leads found yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 pt-3">
             {{ $leads->links() }}
        </div>
    </div>
</div>
@endsection
