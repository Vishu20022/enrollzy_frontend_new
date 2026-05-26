    <section class="featured-section">

        <div class="container text-center">

            <h2 class="featured-title main-heading">
                {!! $section->title ?? 'Comparison' !!}
            </h2>

            @if($section->subtitle)
            <p class="featured-desc">
                {{ $section->subtitle }}
            </p>
        @else
            <p class="featured-desc">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's
            </p>
        @endif

            <div class="title-line"></div>

        </div>

    </section>

    <section class="compare-section">

        <div class="container">
            <div class="compare-bg">

                <div class="container">

                    <div class="row g-4 justify-content-center">

                        @for ($i = 1; $i <= 3; $i++)
                            <div class="col-lg-4 col-md-6">

                                <div class="compare-card" data-slot-card="{{ $i }}">

                                    <div class="card-top">

                                        <span class="option-tag">
                                            OPTION {{ $i }}
                                        </span>

                                        <img src="{{ asset('images/Vector.svg') }}" alt="img">

                                    </div>


                                    <div class="field">

                                        <label>
                                            UNIVERSITY
                                        </label>

                                        <select class="form-select org-selector" data-slot="{{ $i }}">

                                            <option value="">
                                                Choose Institution
                                            </option>
                                            @foreach ($organisations as $org)
                                                <option value="{{ $org->id }}">{{ $org->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>


                                    <div class="field">

                                        <label>
                                            Program
                                        </label>

                                        <select class="form-select course-selector" data-slot="{{ $i }}"
                                            disabled>

                                            <option value="">
                                                Select Course
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>
                        @endfor

                    </div>

                </div>

            </div>

            <!-- Parameters Quick Access -->
            <div id="paramTabs" class="param-tabs-wrapper mb-4 mt-4 d-none">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-filter me-2 text-primary"></i>
                    <span class="fw-bold small text-uppercase">Quick Jump</span>
                </div>
                <div class="param-tabs-scroll d-flex gap-2"
                    style="overflow-x: auto; white-space: nowrap; padding-bottom: 10px;">
                    <!-- Tabs will be injected here -->
                </div>
            </div>

            <!-- Comparison Matrix -->
            <div id="comparisonResults"
                class="comparison-matrix-wrapper d-none shadow-premium rounded-4 overflow-hidden border-0 mt-4 bg-white p-3">
                <div class="table-responsive">
                    <table class="table comparison-matrix-table mb-0">
                        <thead>
                            <tr id="matrixHead">
                                <th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>
                                <!-- Slot headers injected here -->
                            </tr>
                        </thead>
                        <tbody id="matrixBody">
                            <!-- Comparison rows injected here -->
                        </tbody>
                    </table>
                </div>

                <div class="text-center py-4 bg-light border-top mt-3">
                    <button id="resetComparison" class="btn btn-dark rounded-pill px-5 py-2 shadow-sm">
                        <i class="fas fa-undo me-2"></i> Reset Comparison
                    </button>
                </div>
            </div>

            <div id="emptyMessage"></div>

        </div>

    </section>



