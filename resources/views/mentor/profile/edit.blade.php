@extends('mentor.layouts.app')

@section('mentor_content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="mb-1" style="font-weight: 600;">Basic profile</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">This is what students see first. Make it count.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="{{ route('mentor.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Profile Photo Section -->
            <div class="p-3 mb-4 rounded" style="background-color: #fafbfc; border: 1px solid #e5e7eb;">
                <div class="d-flex align-items-center">
                    <div class="me-4 d-flex justify-content-center align-items-center rounded-circle" style="width: 80px; height: 80px; background-color: #f3f0ff; color: #5b21b6; font-size: 1.5rem; font-weight: bold; overflow: hidden;">
                        @if($profile->profile_photo)
                            <img src="{{ asset($profile->profile_photo) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span style="color: #6b21a8; font-weight: 700; font-size: 1.5rem;">
                                {{ substr($user->name, 0, 1) }}
                            </span>
                        @endif
                    </div>
                    <div>
                        <h6 class="mb-2" style="font-weight: 600;">Profile photo</h6>
                        <div class="d-flex gap-2 mb-1">
                            <label class="btn btn-sm btn-outline-dark bg-white rounded-3">
                                <i class="bi bi-upload"></i> Upload photo
                                <input type="file" name="profile_photo" class="d-none" accept="image/*">
                            </label>
                            <button type="button" class="btn btn-sm btn-outline-secondary bg-white rounded-3">Remove</button>
                        </div>
                        <small class="text-muted">JPG or PNG &middot; max 2MB &middot; square crop recommended</small>
                    </div>
                </div>
            </div>

            <!-- Name Fields -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">First name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control rounded-3" value="{{ old('first_name', $profile->first_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">Last name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control rounded-3" value="{{ old('last_name', $profile->last_name) }}" required>
                </div>
            </div>

            <!-- Professional Headline -->
            <div class="mb-3">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">Professional headline <span class="text-danger">*</span></label>
                <input type="text" name="professional_headline" class="form-control rounded-3" value="{{ old('professional_headline', $profile->professional_headline) }}" required>
                <small class="text-muted">Shown below your name. Be specific — "PM at Microsoft" converts better than "Tech professional".</small>
            </div>

            <!-- Short Bio -->
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">Short bio <span class="text-danger">*</span></label>
                    <small class="text-muted">400 chars</small>
                </div>
                <textarea name="short_bio" class="form-control rounded-3" rows="4" maxlength="400" required>{{ old('short_bio', $profile->short_bio) }}</textarea>
            </div>

            <!-- Location -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">City <span class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control rounded-3" value="{{ old('city', $profile->city) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">State / country</label>
                    <select name="state_country" class="form-select rounded-3">
                        <option value="">Select State/Country</option>
                        <option value="Karnataka, India" {{ old('state_country', $profile->state_country) == 'Karnataka, India' ? 'selected' : '' }}>Karnataka, India</option>
                        <option value="Maharashtra, India" {{ old('state_country', $profile->state_country) == 'Maharashtra, India' ? 'selected' : '' }}>Maharashtra, India</option>
                        <option value="Delhi, India" {{ old('state_country', $profile->state_country) == 'Delhi, India' ? 'selected' : '' }}>Delhi, India</option>
                        <option value="Other" {{ old('state_country', $profile->state_country) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>

            <!-- Languages -->
            <div class="mb-4">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem;">Languages spoken <span class="text-danger">*</span></label>
                <select name="languages[]" class="form-select rounded-3" multiple required style="min-height: 100px;">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ in_array($language->id, old('languages', $selectedLanguages)) ? 'selected' : '' }}>
                            {{ $language->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple languages.</small>
            </div>

            <hr>

            <!-- Actions -->
            <div class="d-flex justify-content-end gap-3 mt-4">
                <button type="reset" class="btn btn-outline-secondary rounded-3 px-4">Discard changes</button>
                <button type="submit" class="btn btn-dark rounded-3 px-4">Save & publish <i class="bi bi-arrow-up-right ms-1"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection
