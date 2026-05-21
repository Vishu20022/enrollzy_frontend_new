@extends('admin.layouts.master')

@section('title', 'Edit Slot')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Edit Availability Slot</h5>
                    <a href="{{ route('expert.slots.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('expert.slots.update', $slot->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Date <span class="text-danger">*</span></label>
                            <input type="date" name="date" class="form-control" required min="{{ date('Y-m-d') }}" value="{{ old('date', $slot->date->format('Y-m-d')) }}">
                            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Start Time <span class="text-danger">*</span></label>
                                <input type="time" name="start_time" class="form-control" required value="{{ old('start_time', $slot->start_time) }}">
                                @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">End Time <span class="text-danger">*</span></label>
                                <input type="time" name="end_time" class="form-control" required value="{{ old('end_time', $slot->end_time) }}">
                                @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Cost (₹) <span class="text-danger">*</span></label>
                                <input type="number" name="cost" class="form-control" required min="0" step="0.01" value="{{ old('cost', $slot->cost) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Session Mode <span class="text-danger">*</span></label>
                                <select name="mode" class="form-select" required>
                                    <option value="video" {{ old('mode', $slot->mode) == 'video' ? 'selected' : '' }}>Video Call</option>
                                    <option value="audio" {{ old('mode', $slot->mode) == 'audio' ? 'selected' : '' }}>Audio Call</option>
                                    <option value="chat" {{ old('mode', $slot->mode) == 'chat' ? 'selected' : '' }}>Chat</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select">
                                <option value="available" {{ $slot->status == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="blocked" {{ $slot->status == 'blocked' ? 'selected' : '' }}>Blocked</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <i class="fas fa-save me-2"></i> Update Slot
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
