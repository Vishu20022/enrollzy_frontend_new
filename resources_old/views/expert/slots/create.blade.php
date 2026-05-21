@extends('admin.layouts.master')

@section('title', 'Create Slot')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Add New Availability Slot</h5>
                    <a href="{{ route('expert.slots.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-fill mb-4" id="slotTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold" id="single-tab" data-bs-toggle="tab" data-bs-target="#single" type="button" role="tab">
                                <i class="fas fa-calendar-day me-2"></i>Single Slot
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="bulk-tab" data-bs-toggle="tab" data-bs-target="#bulk" type="button" role="tab">
                                <i class="fas fa-calendar-alt me-2"></i>Bulk / Recurring
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="slotTabsContent">
                        <!-- Single Slot Form -->
                        <div class="tab-pane fade show active" id="single" role="tabpanel">
                            <form action="{{ route('expert.slots.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="single">
                                
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Date <span class="text-danger">*</span></label>
                                        <input type="date" name="date" class="form-control" required min="{{ date('Y-m-d') }}" value="{{ old('date') }}">
                                        @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Session Mode <span class="text-danger">*</span></label>
                                        <select name="mode" class="form-select" required>
                                            <option value="video" {{ old('mode') == 'video' ? 'selected' : '' }}>Video Call</option>
                                            <option value="audio" {{ old('mode') == 'audio' ? 'selected' : '' }}>Audio Call</option>
                                            <option value="chat" {{ old('mode') == 'chat' ? 'selected' : '' }}>Chat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Start Time <span class="text-danger">*</span></label>
                                        <input type="time" name="start_time" class="form-control" required value="{{ old('start_time') }}">
                                        @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">End Time <span class="text-danger">*</span></label>
                                        <input type="time" name="end_time" class="form-control" required value="{{ old('end_time') }}">
                                        @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Cost (₹) <span class="text-danger">*</span></label>
                                        <input type="number" name="cost" class="form-control" required min="0" step="0.01" value="{{ old('cost', 500) }}">
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary py-2 fw-bold">
                                        <i class="fas fa-save me-2"></i> Save Single Slot
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Bulk Slot Form -->
                        <div class="tab-pane fade" id="bulk" role="tabpanel">
                            <form action="{{ route('expert.slots.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="bulk">

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">From Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start_date" class="form-control" required min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">To Date <span class="text-danger">*</span></label>
                                        <input type="date" name="end_date" class="form-control" required min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Repeat On Days <span class="text-danger">*</span></label>
                                    <div class="d-flex flex-wrap gap-3 p-3 bg-light rounded border">
                                        @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="days[]" value="{{ $day }}" id="day-{{ $day }}">
                                                <label class="form-check-label" for="day-{{ $day }}">{{ $day }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Start Time <span class="text-danger">*</span></label>
                                        <input type="time" name="start_time" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">End Time <span class="text-danger">*</span></label>
                                        <input type="time" name="end_time" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Cost (₹) <span class="text-danger">*</span></label>
                                        <input type="number" name="cost" class="form-control" required min="0" step="0.01" value="500">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Mode <span class="text-danger">*</span></label>
                                        <select name="mode" class="form-select" required>
                                            <option value="video">Video</option>
                                            <option value="audio">Audio</option>
                                            <option value="chat">Chat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success py-2 fw-bold">
                                        <i class="fas fa-magic me-2"></i> Generate Slots
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
