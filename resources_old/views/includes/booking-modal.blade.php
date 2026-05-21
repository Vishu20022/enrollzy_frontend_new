<!-- Global Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="bookingModalLabel">Book Your Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div id="bookingProviderInfo" class="mb-4 d-flex align-items-center">
                    <img id="providerImg" src="" alt="" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                    <div>
                        <h6 id="providerName" class="mb-0 fw-bold">Provider Name</h6>
                        <small id="providerRole" class="text-muted">Role</small>
                    </div>
                </div>

                <form id="bookingForm">
                    @csrf
                    <input type="hidden" id="providerId" name="provider_id">
                    <input type="hidden" id="providerType" name="provider_type">
                    <input type="hidden" id="selectedSlotId" name="slot_id">

                    <!-- Slots Container -->
                    <div id="slotsLoading" class="text-center py-4" style="display: none;">
                        <div class="spinner-border text-primary" role="status"></div>
                        <p class="mt-2 text-muted small">Checking availability...</p>
                    </div>

                    <div id="slotsSection" class="mb-4">
                        <label class="form-label fw-semibold">Select an Available Slot</label>
                        <div id="slotsGrid" class="d-flex flex-wrap gap-2" style="max-height: 250px; overflow-y: auto;">
                            <!-- Slots injected here -->
                        </div>
                        <div id="noSlotsMsg" class="alert alert-warning d-none mt-2">
                            <small><i class="fas fa-calendar-times me-1"></i> No available slots found for the upcoming dates.</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Session Purpose / Notes</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Briefly describe what you want to discuss..." required></textarea>
                    </div>

                    <!-- Booking Summary for Experts -->
                    <div id="bookingSummary" class="alert alert-info border-0 mb-3" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-uppercase fw-bold text-muted">Session Mode</span>
                            <span id="summaryMode" class="fw-bold text-dark"></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="small text-uppercase fw-bold text-muted">Session Fee</span>
                            <span id="summaryCost" class="fw-bold text-primary fs-5"></span>
                        </div>
                    </div>

                    @auth
                        <button type="submit" id="submitBooking" class="btn btn-primary w-100 py-3 fw-bold shadow-sm" style="border-radius: 12px;" disabled>
                            Confirm Booking
                        </button>
                    @else
                        <div class="alert alert-info py-2" style="border-radius: 10px;">
                            <small><i class="fas fa-info-circle me-1"></i> Please <a href="{{ route('login') }}" class="fw-bold">Login</a> to book a session.</small>
                        </div>
                        <button type="button" class="btn btn-primary w-100 py-3 fw-bold shadow-sm disabled" style="opacity: 0.7; border-radius: 12px;">
                            Login to Book
                        </button>
                    @endauth
                </form>
                <div id="bookingResponse" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const bookingModal = document.getElementById('bookingModal');
    if (!bookingModal) return;

    const slotsRouteTemplate = "{{ route('api.slots', ['type' => ':type', 'id' => ':id']) }}";

    // Handle modal trigger buttons
    document.querySelectorAll('.btn-book-session').forEach(button => {
        button.addEventListener('click', function() {
            const providerId = this.dataset.providerId;
            const providerType = this.dataset.providerType;
            const providerName = this.dataset.providerName;
            const providerImg = this.dataset.providerImg;
            const providerRole = this.dataset.providerRole;

            // Fill basic info
            document.getElementById('providerName').innerText = providerName;
            document.getElementById('providerRole').innerText = providerRole;
            document.getElementById('providerImg').src = providerImg;
            document.getElementById('providerId').value = providerId;
            document.getElementById('providerType').value = providerType;
            
            // Reset state
            document.getElementById('selectedSlotId').value = '';
            document.getElementById('bookingSummary').style.display = 'none';
            document.getElementById('slotsGrid').innerHTML = '';
            document.getElementById('noSlotsMsg').classList.add('d-none');
            const submitBtn = document.getElementById('submitBooking');
            if(submitBtn) submitBtn.disabled = true;

            // Fetch slots
            const loading = document.getElementById('slotsLoading');
            const slotsSection = document.getElementById('slotsSection');
            
            loading.style.display = 'block';
            slotsSection.style.opacity = '0.5';

            const fetchUrl = slotsRouteTemplate.replace(':type', providerType).replace(':id', providerId);

            fetch(fetchUrl)
                .then(response => response.json())
                .then(data => {
                    loading.style.display = 'none';
                    slotsSection.style.opacity = '1';
                    const grid = document.getElementById('slotsGrid');
                    
                    if (data.length > 0) {
                        data.forEach(slot => {
                            const date = new Date(slot.date);
                            const dateStr = date.toLocaleDateString('en-US', { day: 'numeric', month: 'short', weekday: 'short' });
                            const timeStr = formatTime(slot.start_time) + ' - ' + formatTime(slot.end_time);
                            
                            // Expert vs Alumni logic
                            const hasDetails = slot.cost !== undefined && slot.mode !== undefined;
                            const cost = hasDetails ? parseFloat(slot.cost).toFixed(2) : '0.00';
                            const mode = hasDetails ? slot.mode : 'Video Call';
                            const modeIcon = mode === 'video' ? 'video' : (mode === 'audio' ? 'microphone' : 'comments');

                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.className = 'btn btn-outline-primary text-start p-2 position-relative slot-btn flex-grow-1';
                            btn.style.minWidth = '140px';
                            
                            let detailsHtml = '';
                            if (hasDetails) {
                                detailsHtml = `
                                    <div class="d-flex justify-content-between align-items-center mt-1 text-muted border-top pt-1">
                                        <span class="fs-xs"><i class="fas fa-${modeIcon}"></i> ${mode}</span>
                                        <span class="fs-xs fw-bold">₹${cost}</span>
                                    </div>
                                `;
                            }

                            btn.innerHTML = `
                                <div class="fw-bold small">${dateStr}</div>
                                <div class="small">${timeStr}</div>
                                ${detailsHtml}
                            `;
                            
                            btn.onclick = function() {
                                selectSlot(this, slot, cost, mode);
                            };
                            grid.appendChild(btn);
                        });
                    } else {
                        document.getElementById('noSlotsMsg').classList.remove('d-none');
                    }
                })
                .catch(error => {
                    console.error('Error fetching slots:', error);
                    loading.style.display = 'none';
                    slotsSection.style.opacity = '1';
                    document.getElementById('noSlotsMsg').classList.remove('d-none');
                    document.getElementById('noSlotsMsg').innerHTML = '<small class="text-danger">Error loading slots. Please refresh.</small>';
                });
        });
    });

    function formatTime(timeString) {
        if(!timeString) return '';
        const [hour, minute] = timeString.split(':');
        const h = parseInt(hour);
        const ampm = h >= 12 ? 'PM' : 'AM';
        const h12 = h % 12 || 12;
        return `${h12}:${minute} ${ampm}`;
    }

    function selectSlot(element, slot, cost, mode) {
        // Visual selection
        document.querySelectorAll('.slot-btn').forEach(btn => btn.classList.remove('active', 'bg-primary', 'text-white'));
        element.classList.add('active', 'bg-primary', 'text-white');
        
        // Update Inputs
        document.getElementById('selectedSlotId').value = slot.id;
        const submitBtn = document.getElementById('submitBooking');
        if(submitBtn) submitBtn.disabled = false;

        // Show Summary if expert (or if cost > 0)
        // For Alumni/Free sessions, we might just hide the fee part or show "Free"
        const summary = document.getElementById('bookingSummary');
        
        if (cost !== undefined && cost > 0) {
            document.getElementById('summaryCost').textContent = '₹' + cost;
            document.getElementById('summaryMode').textContent = mode.charAt(0).toUpperCase() + mode.slice(1);
            summary.style.display = 'block';
        } else {
            summary.style.display = 'none';
        }
    }

    // Handle form submission
    const bookingForm = document.getElementById('bookingForm');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const responseDiv = document.getElementById('bookingResponse');
            const submitBtn = document.getElementById('submitBooking');
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Booking...';
            
            const formData = new FormData(this);
            
            fetch("{{ route('appointments.book') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    responseDiv.innerHTML = `<div class="alert alert-success mt-2">${data.success}</div>`;
                    setTimeout(() => {
                        window.location.href = "{{ route('appointments.mine') }}";
                    }, 1500);
                } else {
                    responseDiv.innerHTML = `<div class="alert alert-danger mt-2">${data.error || 'Something went wrong.'}</div>`;
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Confirm Booking';
                }
            })
            .catch(error => {
                console.error('Error submitting booking:', error);
                responseDiv.innerHTML = `<div class="alert alert-danger mt-2">Error submitting booking. Please try again.</div>`;
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Confirm Booking';
            });
        });
    }
});
</script>
@endpush
