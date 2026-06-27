@extends('admin.layouts.master')

@section('title', 'Add New Testimonial')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light text-primary rounded-3 p-2 me-3" style="background-color: #e6f0fa !important; color: #163c97 !important;">
                            <i class="fas fa-quote-left fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold text-dark">Add New Testimonial</h5>
                            <small class="text-muted">Create student or alumni feedback details</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold text-secondary small text-uppercase">User Name</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Rahul Singh" style="border-radius: 8px; font-size: 0.95rem;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="role" class="form-label fw-bold text-secondary small text-uppercase">Role / Position</label>
                            <input type="text" class="form-control form-control-lg @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}" placeholder="e.g. MBA Student, Alumni, Parent" style="border-radius: 8px; font-size: 0.95rem;">
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="testimonial_content" class="form-label fw-bold text-secondary small text-uppercase">Testimonial Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="testimonial_content" name="content" rows="5" required placeholder="What did they say?" style="width: 100% !important; margin: 0 !important; border-radius: 8px; font-size: 0.95rem; resize: vertical;">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label for="rating" class="form-label fw-bold text-secondary small text-uppercase">Rating (1-5)</label>
                                <select class="form-select form-select-lg @error('rating') is-invalid @enderror" id="rating" name="rating" style="border-radius: 8px; font-size: 0.95rem;">
                                    @for($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label fw-bold text-secondary small text-uppercase">User Photo</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" style="border-radius: 8px; font-size: 0.9rem;">
                                <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Max size: 2MB (JPG, PNG, WEBP)</small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-4">
                            <a href="{{ route('testimonials.index') }}" class="btn btn-light px-4" style="border-radius: 8px; font-weight: 500;">
                                <i class="fas fa-arrow-left me-2"></i>Back to List
                            </a>
                            <button type="submit" class="btn btn-primary px-5" style="background-color: #163c97; border-color: #163c97; border-radius: 8px; font-weight: 600; padding-top: 10px; padding-bottom: 10px;">
                                <i class="fas fa-save me-2"></i>Save Testimonial
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
