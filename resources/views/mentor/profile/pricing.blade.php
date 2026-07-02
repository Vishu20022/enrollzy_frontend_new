@extends('mentor.layouts.app')

@section('title', 'Pricing & Pro-bono')

@section('mentor_content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <h3 class="mb-2 fw-bold">Pricing & pro-bono</h3>
        <p class="text-muted mb-4 pb-3 border-bottom">Transparent pricing reduces drop-off. Mentors with listed fees get 2.4x more booking requests.</p>

        @if(empty($pricing->payout_method) || ($pricing->payout_method == 'UPI' && empty($pricing->upi_id)))
        <div class="alert alert-warning d-flex align-items-center mb-4" style="background-color: #fffbeb; border-color: #fef3c7; color: #b45309;" role="alert">
            <i class="bi bi-exclamation-triangle-fill fs-5 me-3"></i>
            <div>
                Your payout is not set up. You won't receive payments until this is configured.
            </div>
        </div>
        @endif

        <form action="{{ route('mentor.profile.pricing.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="form-label fw-bold text-dark mb-1">30-min session fee <span class="text-danger">*</span></label>
                <div class="input-group" style="max-width: 250px;">
                    <span class="input-group-text bg-light fw-bold fs-5 border-end-0">₹</span>
                    <input type="number" class="form-control form-control-lg fs-5 border-start-0 ps-0" id="fee_30_min" name="fee_30_min" min="0" value="{{ old('fee_30_min', $pricing->fee_30_min) }}" placeholder="500">
                </div>
                <small class="text-muted d-block mt-2" id="commission-text-30">Platform commission: {{ $commissionRate }}%. You receive ₹425 per 30-min session.</small>
            </div>

            <div class="mb-4 pb-4 border-bottom">
                <label class="form-label fw-bold text-dark mb-1">60-min session fee</label>
                <div class="input-group" style="max-width: 250px;">
                    <span class="input-group-text bg-light fw-bold fs-5 border-end-0">₹</span>
                    <input type="number" class="form-control form-control-lg fs-5 border-start-0 ps-0" id="fee_60_min" name="fee_60_min" min="0" value="{{ old('fee_60_min', $pricing->fee_60_min) }}" placeholder="900">
                </div>
                <small class="text-muted d-block mt-2" id="commission-text-60"></small>
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Offer free first session</h6>
                    <small class="text-muted">15-min intro call at no charge. Strongly recommended for new mentors.</small>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="checkbox" role="switch" name="offer_free_first_session" value="1" {{ old('offer_free_first_session', $pricing->offer_free_first_session) ? 'checked' : '' }} style="cursor: pointer;">
                </div>
            </div>

            <div class="mb-4 pb-4 border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Pro-bono sessions</h6>
                    <small class="text-muted">Number of free sessions you offer per month.</small>
                </div>
                <div style="max-width: 100px;">
                    <input type="number" class="form-control form-control-lg fs-6 text-center" name="pro_bono_sessions" min="0" value="{{ old('pro_bono_sessions', $pricing->pro_bono_sessions ?? 2) }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-dark mb-1">Payout method <span class="text-danger">*</span></label>
                <div style="max-width: 300px;">
                    <select class="form-select form-select-lg fs-6" id="payout_method" name="payout_method">
                        <option value="" disabled {{ empty($pricing->payout_method) ? 'selected' : '' }}>Select method</option>
                        <option value="UPI" {{ old('payout_method', $pricing->payout_method) == 'UPI' ? 'selected' : '' }}>UPI</option>
                        <option value="Bank Transfer" {{ old('payout_method', $pricing->payout_method) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    </select>
                </div>
                <small class="text-warning fw-bold mt-2 d-flex align-items-center gap-1">
                    <i class="bi bi-info-circle"></i> Required before your first paid session can be processed.
                </small>
            </div>

            <div class="mb-5 {{ old('payout_method', $pricing->payout_method) != 'UPI' ? 'd-none' : '' }}" id="upi-container">
                <label class="form-label fw-bold text-dark mb-1">UPI ID</label>
                <div style="max-width: 300px;">
                    <input type="text" class="form-control form-control-lg fs-6" name="upi_id" id="upi_id" value="{{ old('upi_id', $pricing->upi_id) }}" placeholder="yourname@upi">
                </div>
                <div class="mt-3" style="max-width: 300px;">
                    <label class="form-label fw-bold text-dark mb-1">UPI QR Code</label>
                    <input type="file" class="form-control form-control-lg fs-6" name="upi_qr_code" id="upi_qr_code" accept="image/*">
                    @if($pricing->upi_qr_code)
                        <div class="mt-2">
                            <img src="{{ asset($pricing->upi_qr_code) }}" alt="QR Code" style="max-width: 150px; border-radius: 8px; border: 1px solid #ddd;">
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-5 {{ old('payout_method', $pricing->payout_method) != 'Bank Transfer' ? 'd-none' : '' }}" id="bank-container">
                <div class="row g-3" style="max-width: 500px;">
                    <div class="col-12">
                        <label class="form-label fw-bold text-dark mb-1">Account Holder Name</label>
                        <input type="text" class="form-control form-control-lg fs-6" name="bank_account_holder_name" id="bank_account_holder_name" value="{{ old('bank_account_holder_name', $pricing->bank_account_holder_name) }}" placeholder="John Doe">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold text-dark mb-1">Account Number</label>
                        <input type="text" class="form-control form-control-lg fs-6" name="bank_account_number" id="bank_account_number" value="{{ old('bank_account_number', $pricing->bank_account_number) }}" placeholder="0123456789">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold text-dark mb-1">Bank Name</label>
                        <input type="text" class="form-control form-control-lg fs-6" name="bank_name" id="bank_name" value="{{ old('bank_name', $pricing->bank_name) }}" placeholder="HDFC Bank">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold text-dark mb-1">IFSC Code</label>
                        <input type="text" class="form-control form-control-lg fs-6" name="bank_ifsc_code" id="bank_ifsc_code" value="{{ old('bank_ifsc_code', $pricing->bank_ifsc_code) }}" placeholder="HDFC0001234">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <div class="text-muted small">
                    <i class="bi bi-shield-check"></i> Changes auto-saved as draft &middot; last saved just now
                </div>
                <div>
                    <a href="{{ route('mentor.profile.pricing') }}" class="btn btn-light border px-4 py-2 me-2 fw-bold" style="color: #374151;">Discard changes</a>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fee30 = document.getElementById('fee_30_min');
        const text30 = document.getElementById('commission-text-30');
        
        const fee60 = document.getElementById('fee_60_min');
        const text60 = document.getElementById('commission-text-60');
        
        const payoutMethod = document.getElementById('payout_method');
        const upiContainer = document.getElementById('upi-container');
        
        const commissionRate = {{ $commissionRate }} / 100;

        function calculatePayout(amount) {
            if (!amount || amount <= 0) return 0;
            return Math.floor(amount - (amount * commissionRate));
        }

        function updateCommissionText(input, textEl, label) {
            const val = parseFloat(input.value);
            if (!isNaN(val) && val > 0) {
                const payout = calculatePayout(val);
                textEl.textContent = `Platform commission: {{ $commissionRate }}%. You receive ₹${payout} per ${label} session.`;
                textEl.style.display = 'block';
            } else {
                textEl.style.display = 'none';
            }
        }

        fee30.addEventListener('input', () => updateCommissionText(fee30, text30, '30-min'));
        fee60.addEventListener('input', () => updateCommissionText(fee60, text60, '60-min'));

        // Init initial values
        updateCommissionText(fee30, text30, '30-min');
        updateCommissionText(fee60, text60, '60-min');

        const bankContainer = document.getElementById('bank-container');

        payoutMethod.addEventListener('change', function() {
            if (this.value === 'UPI') {
                upiContainer.classList.remove('d-none');
                bankContainer.classList.add('d-none');
            } else if (this.value === 'Bank Transfer') {
                upiContainer.classList.add('d-none');
                bankContainer.classList.remove('d-none');
            } else {
                upiContainer.classList.add('d-none');
                bankContainer.classList.add('d-none');
                document.getElementById('upi_id').value = '';
            }
        });
    });
</script>
@endsection

