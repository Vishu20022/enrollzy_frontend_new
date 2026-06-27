<!-- Modal for updating user name if not filled -->
<div class="modal fade" id="nameUpdateModal" tabindex="-1" aria-labelledby="nameUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0 justify-content-center">
                <div class="text-center mt-3">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 70px; height: 70px; background-color: #f0f4fc !important;">
                        <i class="fas fa-user-tag text-primary" style="font-size: 2rem; color: #163c97 !important;"></i>
                    </div>
                    <h5 class="modal-title fw-bold" id="nameUpdateModalLabel" style="color: #1a1a1a;">Let's get to know you!</h5>
                </div>
            </div>
            <div class="modal-body px-4 py-3 text-center">
                <p class="text-muted small mb-4">Please enter your name to complete your profile and customize your learning experience.</p>
                
                <form id="nameUpdateForm">
                    @csrf
                    <div class="mb-4">
                        <div class="input-group py-1 px-2 border rounded-3" style="background-color: #fafafa;">
                            <span class="input-group-text border-0 bg-transparent text-muted"><i class="fas fa-user"></i></span>
                            <input type="text" name="name" id="userNameInput" class="form-control border-0 bg-transparent" placeholder="Enter your full name" required style="outline: none; box-shadow: none;">
                        </div>
                        <div id="nameUpdateError" class="text-danger small mt-1 text-start" style="display: none;"></div>
                    </div>
                    
                    <button type="submit" id="submitNameUpdate" class="btn btn-primary w-100 py-2 fw-semibold" style="background-color: #163c97; border-color: #163c97; border-radius: 10px; transition: all 0.3s ease;">
                        Save & Continue
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show modal automatically if name is missing
    const nameUpdateModalEl = document.getElementById('nameUpdateModal');
    if (nameUpdateModalEl) {
        const nameUpdateModal = new bootstrap.Modal(nameUpdateModalEl, {
            backdrop: 'static',
            keyboard: false
        });
        nameUpdateModal.show();

        const form = document.getElementById('nameUpdateForm');
        const submitBtn = document.getElementById('submitNameUpdate');
        const errorDiv = document.getElementById('nameUpdateError');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nameInput = document.getElementById('userNameInput').value.trim();
            if (!nameInput) {
                errorDiv.textContent = 'Name is required.';
                errorDiv.style.display = 'block';
                return;
            }

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
            errorDiv.style.display = 'none';

            const formData = new FormData(this);

            fetch("{{ route('profile.updateName') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw response;
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Page reload to update all name instances in header, dashboard, etc.
                    window.location.reload();
                } else {
                    errorDiv.textContent = data.message || 'Something went wrong.';
                    errorDiv.style.display = 'block';
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Save & Continue';
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Save & Continue';
                
                if (err.json) {
                    err.json().then(errorData => {
                        if (errorData.errors && errorData.errors.name) {
                            errorDiv.textContent = errorData.errors.name[0];
                        } else {
                            errorDiv.textContent = errorData.message || 'An error occurred. Please try again.';
                        }
                        errorDiv.style.display = 'block';
                    });
                } else {
                    errorDiv.textContent = 'An error occurred. Please try again.';
                    errorDiv.style.display = 'block';
                    console.error('Error updating name:', err);
                }
            });
        });
    }
});
</script>
@endpush
