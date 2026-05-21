<section class="alumni-section py-5">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold main-heading"><span class="theme">Talk</span> to Our Alumni</h2>
            <p class="text-muted">
                Get real insights from alumni and make informed career decisions.
            </p>
        </div>

        <!-- Alumni Cards -->
        <div class="row g-4">
            @foreach ($site_alumni as $alumnus)
                <div class="col-lg-3 col-md-6">
                    <div class="alumni-card">
                        @php
                            $imgUrl = $alumnus->image ? (str_starts_with($alumnus->image, 'http') ? $alumnus->image : env('BACKEND_URL') . '/' . $alumnus->image) : 'https://ui-avatars.com/api/?name='.urlencode($alumnus->name);
                        @endphp
                        <a href="{{ route('pages.alumni.detail', $alumnus->id) }}">
                            <img src="{{ $imgUrl }}" alt="{{ $alumnus->name }}">
                        </a>

                        <div class="alumni-content">
                            <h5><a href="{{ route('pages.alumni.detail', $alumnus->id) }}" class="text-decoration-none text-dark">{{ $alumnus->name }}</a></h5>
                            <p class="degree">{{ $alumnus->designation }} {{ $alumnus->company ? '@ ' . $alumnus->company : '' }}</p>
                            <p class="exp">{{ $alumnus->experience_years ? $alumnus->experience_years . ' Exp' : '' }}</p>

                            <button type="button" 
                                class="btn btn-theme-one w-100 mt-3 btn-book-session" 
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                data-provider-id="{{ $alumnus->id }}"
                                data-provider-type="alumni"
                                data-provider-name="{{ $alumnus->name }}"
                                data-provider-role="{{ $alumnus->designation }}"
                                data-provider-img="{{ $imgUrl }}">
                                Book Session
                            </button>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@push('js')
@endpush