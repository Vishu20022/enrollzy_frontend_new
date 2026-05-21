@extends('admin.layouts.master')

@section('title', 'Payouts & Earnings')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Payouts & Wallet</h1>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-white-50 small text-uppercase fw-bold mb-1">Total Earnings</div>
                            <div class="h3 mb-0 fw-bold">₹{{ number_format($totalEarnings, 2) }}</div>
                        </div>
                        <i class="fas fa-wallet fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-white-50 small text-uppercase fw-bold mb-1">Total Paid Out</div>
                            <div class="h3 mb-0 fw-bold">₹{{ number_format($paidOut, 2) }}</div>
                        </div>
                        <i class="fas fa-check-circle fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-dark-50 small text-uppercase fw-bold mb-1">Pending Payout</div>
                            <div class="h3 mb-0 fw-bold">₹{{ number_format($pendingPayout, 2) }}</div>
                        </div>
                        <i class="fas fa-clock fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-white-50 small text-uppercase fw-bold mb-1">Available Balance</div>
                            <div class="h3 mb-0 fw-bold">₹{{ number_format($availableBalance, 2) }}</div>
                        </div>
                        <i class="fas fa-coins fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Payout Request Form -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Request Payout</h5>
                </div>
                <div class="card-body">
                    @if($availableBalance > 100)
                        <form action="{{ route('expert.payouts.request') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Amount to Withdraw (₹)</label>
                                <input type="number" name="amount" class="form-control" max="{{ $availableBalance }}" min="100" required value="{{ floor($availableBalance) }}">
                                <div class="form-text">Available: ₹{{ number_format($availableBalance, 2) }}</div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-2 fw-bold">
                                    <i class="fas fa-paper-plane me-2"></i> Send Request
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-ban fa-3x text-muted mb-3 opacity-25"></i>
                            <h6 class="text-muted">Insufficient Balance</h6>
                            <p class="small text-muted mb-0">Minimum value ₹100 required to request payout.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Payout History -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Payout History</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3 border-0">Reference ID</th>
                                    <th class="border-0">Date</th>
                                    <th class="border-0">Amount</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payouts as $payout)
                                    <tr>
                                        <td class="ps-3 small text-muted font-monospace">{{ $payout->reference_id ?? '-' }}</td>
                                        <td>{{ $payout->created_at->format('d M, Y') }}</td>
                                        <td class="fw-bold">₹{{ number_format($payout->amount, 2) }}</td>
                                        <td>
                                            @if($payout->status == 'processed')
                                                <span class="badge bg-success-subtle text-success">Processed</span>
                                            @elseif($payout->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                                            @else
                                                <span class="badge bg-secondary-subtle text-secondary">{{ ucfirst($payout->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">No payout history found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-3 py-3 border-top">
                    {{ $payouts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
