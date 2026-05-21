@extends('layouts.master')

@section('title', $organisation->name)

@push('css')
    <link rel="stylesheet" href="{{ asset('css/pages/organisation-detail.css') }}">
@endpush

@section('content')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('orgDetails', () => ({
                tab: 'about',
                selectedCampusId: null,
                selectedCourseId: null,
                campuses: {!! $organisation->campuses->toJson() !!},
                courses: {!! $organisation->courses->toJson() !!},
                languages: {!! json_encode($languages) !!},

                getLanguageName(id) {
                    if (!this.languages) return id;
                    return this.languages[id] || id;
                },
                get selectedCampus() {
                    return this.campuses.find(c => c.id === this.selectedCampusId);
                },
                get selectedCourse() {
                    if (!this.selectedCourseId) return null;
                    return this.courses.find(c => c.id === this.selectedCourseId);
                },
                get filteredCourses() {
                    if (this.selectedCampusId) {
                        return this.courses.filter(c => c.campus_id == this.selectedCampusId);
                    }
                    return this.courses;
                },
                setActiveTab(newTab) {
                    this.tab = newTab;
                    this.selectedCampusId = null;
                    this.selectedCourseId = null;
                },
                selectCampus(id) {
                    this.selectedCampusId = id;
                    this.selectedCourseId = null;
                    this.tab = 'campuses';
                },
                selectCourse(id) {
                    console.log('Selecting course:', id);
                    this.selectedCourseId = id;
                    this.selectedCampusId = null;
                    this.tab = 'courses';
                },
                init() {
                    console.log('Org Details Loaded. Courses:', this.courses.length);
                }
            }));
        });
    </script>
    <div class="organisation-detail-wrapper" x-data="orgDetails">
        <!-- Hero Section -->
        <div class="org-hero"
            style="background-image: url('{{ asset($organisation->cover_image_url ? $organisation->cover_image_url : 'images/default-cover.jpg') }}')">
            <div class="container">
                <div class="org-hero-content">
                    <div class="org-logo-wrapper">
                        <img src="{{ asset($organisation->logo_url ? $organisation->logo_url : 'images/default-org.png') }}"
                            alt="{{ $organisation->name }}" class="org-logo-lg">
                    </div>
                    <div class="org-info">
                        <h1 class="text-white fw-bold mb-2">{{ $organisation->name }}</h1>
                        <p class="text-white-50 mb-0 d-flex align-items-center flex-wrap gap-2">
                            <span><i
                                    class="bi bi-geo-alt-fill me-1"></i>{{ $organisation->head_office_location ?? 'Location not available' }}</span>
                            <span class="vr bg-white-50 mx-1"></span>
                            <span class="badge bg-primary">{{ $organisation->organisationType->title ?? 'N/A' }}</span>
                            @if($organisation->university_type)
                                <span class="badge bg-info text-dark">{{ $organisation->university_type }} University</span>
                            @endif
                            @if($organisation->ownership_type)
                                <span class="badge bg-secondary">{{ $organisation->ownership_type }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sub-Navigation Horizontal Bar -->
        <div class="org-detail-nav shadow-sm">
            <div class="container">
                <div class="d-flex overflow-auto">
                    <div class="nav-link-custom" :class="{ 'active': tab === 'about' }" @click="setActiveTab('about')">
                        Organisation Info</div>
                    <div class="nav-link-custom" :class="{ 'active': tab === 'campuses' }"
                        @click="setActiveTab('campuses')">Campuses</div>
                    <div class="nav-link-custom" :class="{ 'active': tab === 'courses' }" @click="setActiveTab('courses')">
                        Courses</div>
                </div>
            </div>
        </div>

        <div class="container pb-5">
            <div class="row">
                <!-- Sidebar col-md-3 -->
                <div class="col-lg-3 mb-4">
                    <div class="sidebar-wrapper shadow-sm">
                        <!-- About Sidebar (Quick Info) -->
                        <div x-show="tab === 'about'">
                            <h5 class="sidebar-title">Quick Facts</h5>
                            <div class="p-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-3 d-flex align-items-center">
                                        <div class="sidebar-icon bg-light-primary"><i class="bi bi-calendar-event"></i>
                                        </div>
                                        <div class="ms-3">
                                            <small class="text-muted d-block">Established</small>
                                            <span class="fw-bold">{{ $organisation->established_year ?? 'N/A' }}</span>
                                        </div>
                                    </li>
                                    @if($organisation->chancellor_name)
                                        <li class="mb-3 d-flex align-items-center">
                                            <div class="sidebar-icon bg-light-info"><i class="bi bi-person-badge"></i></div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">Chancellor</small>
                                                <span class="fw-bold">{{ $organisation->chancellor_name }}</span>
                                            </div>
                                        </li>
                                    @endif
                                    @if($organisation->degree_awarding_authority)
                                        <li class="mb-3 d-flex align-items-center">
                                            <div class="sidebar-icon bg-light-success"><i class="bi bi-award"></i></div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">Degree Awarding</small>
                                                <span class="badge bg-success">Yes</span>
                                            </div>
                                        </li>
                                    @endif
                                    @if($organisation->naac_grade)
                                        <li class="mb-3 d-flex align-items-center">
                                            <div class="sidebar-icon bg-light-warning"><i class="bi bi-patch-check"></i></div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">NAAC Grade</small>
                                                <span class="fw-bold text-success">{{ $organisation->naac_grade }}</span>
                                            </div>
                                        </li>
                                    @endif
                                    @if($organisation->nirf_rank_overall)
                                        <li class="mb-3 d-flex align-items-center">
                                            <div class="sidebar-icon bg-light-danger"><i class="bi bi-graph-up"></i></div>
                                            <div class="ms-3">
                                                <small class="text-muted d-block">NIRF Rank</small>
                                                <span class="fw-bold">#{{ $organisation->nirf_rank_overall }}</span>
                                            </div>
                                        </li>
                                    @endif
                                    <li class="mb-3 d-flex align-items-center">
                                        <div class="sidebar-icon bg-light-warning"><i class="bi bi-star"></i></div>
                                        <div class="ms-3">
                                            <small class="text-muted d-block">Student Rating</small>
                                            <span class="text-warning fw-bold"><i class="bi bi-star-fill small"></i>
                                                {{ $organisation->average_rating ?? '4.5' }}</span>
                                            <small class="text-muted">({{ $organisation->total_reviews ?? '0' }}
                                                reviews)</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Campuses Sidebar -->
                        <div x-show="tab === 'campuses'">
                            <h5 class="sidebar-title">All Campuses</h5>
                            <ul class="sidebar-list">
                                <template x-for="campus in campuses" :key="campus.id">
                                    <li class="sidebar-item" :class="{ 'active': selectedCampusId === campus.id }"
                                        @click="selectCampus(campus.id)" x-text="campus.campus_name"></li>
                                </template>
                            </ul>
                            <!-- Show Courses List in sidebar when a campus is selected -->
                            <div x-show="selectedCampusId" class="mt-3">
                                <h5 class="sidebar-title bg-secondary">Campus Courses</h5>
                                <ul class="sidebar-list">
                                    <template x-for="course in filteredCourses" :key="course.id">
                                        <li class="sidebar-item" @click="selectCourse(course.id)"
                                            x-text="course.course.name"></li>
                                    </template>
                                </ul>
                                <template x-if="filteredCourses.length === 0">
                                    <div class="p-3 text-muted small">No courses found for this campus.</div>
                                </template>
                            </div>
                        </div>

                        <!-- Courses Sidebar -->
                        <div x-show="tab === 'courses'">
                            <h5 class="sidebar-title">All Courses</h5>
                            <ul class="sidebar-list">
                                <template x-for="course in courses" :key="course.id">
                                    <li class="sidebar-item" :class="{ 'active': selectedCourseId === course.id }"
                                        @click="selectCourse(course.id)" x-text="course.course.name"></li>
                                </template>
                            </ul>
                        </div>
                    </div>

                    <!-- Admission CTA in Sidebar -->
                    <div class="card border-0 shadow-sm bg-primary text-white text-center mt-4 detail-card">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Admission Enquiry</h5>
                            <p class="small mb-4 text-white-50">Get free counseling from our experts.</p>
                            <a href="#" class="btn btn-light w-100 fw-bold">Contact Now</a>
                        </div>
                    </div>
                </div>

                <!-- Main Content col-md-9 -->
                <div class="col-lg-9">
                    <!-- Tab: About -->
                    <div x-show="tab === 'about'" x-transition x-data="{ subtab: 'core' }">
                        <div class="card detail-card p-4">

                            <!-- Sub-Tabs Navigation -->
                            <div class="border-bottom mb-4">
                                <ul class="nav nav-pills pb-3 gap-2 justify-content-start"
                                    style="overflow-x: auto; flex-wrap: nowrap;">
                                    <li class="nav-item">
                                        <button class="nav-link" :class="{ 'active': subtab === 'core' }"
                                            @click="subtab = 'core'">Overview</button>
                                    </li>

                                    @if($organisation->organisation_type_id == 1 || $organisation->organisation_type_id == 2)
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'legal' }"
                                                @click="subtab = 'legal'">Legal & Regulatory</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'governance' }"
                                                @click="subtab = 'governance'">Governance</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'academic' }"
                                                @click="subtab = 'academic'">Academic Scope</button>
                                        </li>
                                    @elseif($organisation->organisation_type_id == 3)
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'legal' }"
                                                @click="subtab = 'legal'">Ownership & Legal</button>
                                        </li>
                                    @elseif($organisation->organisation_type_id == 4)
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'ownership' }"
                                                @click="subtab = 'ownership'">Ownership</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'boards' }"
                                                @click="subtab = 'boards'">Boards & Academic</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'policies' }"
                                                @click="subtab = 'policies'">Policies</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'footprint' }"
                                                @click="subtab = 'footprint'">Footprint</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" :class="{ 'active': subtab === 'seo' }"
                                                @click="subtab = 'seo'">Trust & Reviews</button>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <!-- Content Area -->
                            <div class="tab-content">

                                <!-- 1. CORE IDENTITY (All Types) -->
                                <div x-show="subtab === 'core'" x-transition.opacity>
                                    <h4 class="fw-bold mb-3">Core Identity</h4>

                                    <!-- Common Basic Info -->
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <small class="text-muted d-block">Brand Name</small>
                                            <span
                                                class="fw-bold">{{ $organisation->brand_name ?? $organisation->name }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted d-block">Short Name</small>
                                            <span class="fw-bold">{{ $organisation->short_name ?? '-' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted d-block">Type</small>
                                            <span
                                                class="badge bg-primary me-1">{{ $organisation->organisationType->title ?? 'Organisation' }}</span>
                                            @if($organisation->university_type)
                                                <span
                                                    class="badge bg-info text-dark">{{ $organisation->university_type }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted d-block">Est. Year</small>
                                            <span class="fw-bold">{{ $organisation->established_year ?? '-' }}</span>
                                        </div>
                                    </div>

                                    <!-- About -->
                                    <h5 class="fw-bold mt-4">About the Organisation</h5>
                                    <div class="mb-4 text-muted">
                                        @if($organisation->organisation_type_id == 1 || $organisation->organisation_type_id == 2)
                                            {!! nl2br(e($organisation->about_university)) !!}
                                        @else
                                            {!! nl2br(e($organisation->about_organisation)) !!}
                                        @endif
                                    </div>

                                    <!-- Relation-based Accreditations & Awards (Safety Net) -->
                                    @if($organisation->accreditations->count() > 0 || $organisation->awards->count() > 0)
                                        <hr class="text-muted my-4">

                                        @if($organisation->accreditations->count() > 0)
                                            <h5 class="fw-bold mb-3">Accreditations & Approvals</h5>
                                            <div class="d-flex flex-wrap gap-3 mb-4">
                                                @foreach($organisation->accreditations as $acc)
                                                    <div class="p-2 border rounded-3 bg-light d-flex align-items-center">
                                                        <i class="bi bi-patch-check-fill text-primary me-2"></i>
                                                        <span class="small fw-bold">{{ $acc->name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if($organisation->awards->count() > 0)
                                            <h5 class="fw-bold mb-3">Awards & Achievements</h5>
                                            <ul class="list-unstyled mb-4">
                                                @foreach($organisation->awards as $award)
                                                    <li class="mb-2 d-flex">
                                                        <i class="bi bi-trophy-fill text-warning me-3"></i>
                                                        <span>
                                                            <strong class="d-block">{{ $award->award_name }}</strong>
                                                            <small class="text-muted">{{ $award->award_year }} -
                                                                {{ $award->awarding_body }}</small>
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif

                                    <!-- Vision & Mission -->
                                    @if($organisation->vision_mission)
                                        <h5 class="fw-bold mt-4">Vision & Mission</h5>
                                        <div class="p-3 bg-light rounded text-muted fst-italic">
                                            {!! nl2br(e($organisation->vision_mission)) !!}
                                        </div>
                                    @endif

                                    @if($organisation->core_values && is_array($organisation->core_values) && count($organisation->core_values) > 0)
                                        <h5 class="fw-bold mt-4">Core Values</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($organisation->core_values as $val)
                                                <span
                                                    class="badge bg-soft-primary text-primary border border-primary-subtle px-3 py-2 fw-normal fs-7">{{ $val }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- 2. UNIVERSITY SPECIFIC TABS -->
                                @if($organisation->organisation_type_id == 1 || $organisation->organisation_type_id == 2)
                                    <!-- Legal -->
                                    <div x-show="subtab === 'legal'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Legal & Regulatory</h4>
                                        <div class="row g-4">
                                            <!-- Status Flags -->
                                            <div class="col-md-6">
                                                <ul class="list-group list-group-flush">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>Degree Awarding</span>
                                                        @if($organisation->degree_awarding_authority) <i
                                                        class="bi bi-check-circle-fill text-success"></i> @else <i
                                                            class="bi bi-x-circle text-muted"></i> @endif
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>UGC Recognized</span>
                                                        @if($organisation->ugc_recognized) <i
                                                        class="bi bi-check-circle-fill text-success"></i> @else <i
                                                            class="bi bi-x-circle text-muted"></i> @endif
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>AICTE Approved</span>
                                                        @if($organisation->aicte_approved) <i
                                                        class="bi bi-check-circle-fill text-success"></i> @else <i
                                                            class="bi bi-x-circle text-muted"></i> @endif
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>NAAC Accredited</span>
                                                        @if($organisation->naac_accredited) <i
                                                        class="bi bi-check-circle-fill text-success"></i> @else <i
                                                            class="bi bi-x-circle text-muted"></i> @endif
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Grades & Ranks -->
                                            <div class="col-md-6">
                                                <div class="card bg-light border-0 p-3 h-100">
                                                    <h6 class="fw-bold mb-3">Accreditation Details</h6>
                                                    @if($organisation->naac_grade)
                                                        <div class="mb-2"><strong>NAAC Grade:</strong> <span
                                                                class="badge bg-success">{{ $organisation->naac_grade }}</span>
                                                        </div>
                                                    @endif
                                                    @if($organisation->nirf_rank_overall)
                                                        <div class="mb-2"><strong>NIRF (Overall):</strong>
                                                            #{{ $organisation->nirf_rank_overall }}</div>
                                                    @endif
                                                    @if($organisation->nirf_rank_category)
                                                        <div class="mb-2"><strong>NIRF (Category):</strong>
                                                            #{{ $organisation->nirf_rank_category }}</div>
                                                    @endif
                                                    @if($organisation->ugc_approval_number)
                                                        <div class="mb-2"><small class="text-muted">UGC Approval:</small>
                                                            {{ $organisation->ugc_approval_number }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Recognition Documents -->
                                            @if($organisation->recognition_documents && is_array($organisation->recognition_documents) && count($organisation->recognition_documents) > 0)
                                                <div class="col-12">
                                                    <h6 class="fw-bold">Recognition Documents</h6>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @foreach($organisation->recognition_documents as $doc)
                                                            <a href="{{ asset($doc) }}" target="_blank"
                                                                class="btn btn-sm btn-outline-secondary"><i
                                                                    class="bi bi-file-earmark-text me-1"></i> View Document</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Arrays -->
                                            @if($organisation->international_accreditations && is_array($organisation->international_accreditations) && count($organisation->international_accreditations) > 0)
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold">Intl. Accreditations</h6>
                                                    <p class="mb-0">{{ implode(', ', $organisation->international_accreditations) }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if($organisation->statutory_approvals && is_array($organisation->statutory_approvals) && count($organisation->statutory_approvals) > 0)
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold">Statutory Approvals</h6>
                                                    <p class="mb-0">{{ implode(', ', $organisation->statutory_approvals) }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Governance -->
                                    <div x-show="subtab === 'governance'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Governance Structure</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th class="w-25 bg-light">Governing Body</th>
                                                        <td>{{ $organisation->governing_body_name ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light">Chancellor</th>
                                                        <td>{{ $organisation->chancellor_name ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light">Vice Chancellor</th>
                                                        <td>{{ $organisation->vice_chancellor_name ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light">University Category</th>
                                                        <td>{{ $organisation->university_category ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light">Autonomous Status</th>
                                                        <td>{{ $organisation->autonomous_status ? 'Yes' : 'No' }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-3 text-center">
                                            <div class="col-4 border-end">
                                                <h3 class="fw-bold text-primary">{{ $organisation->number_of_campuses ?? 0 }}
                                                </h3>
                                                <small class="text-muted">Campuses</small>
                                            </div>
                                            <div class="col-4 border-end">
                                                <h3 class="fw-bold text-primary">
                                                    {{ $organisation->number_of_constituent_colleges ?? 0 }}
                                                </h3>
                                                <small class="text-muted">Constituent</small>
                                            </div>
                                            <div class="col-4">
                                                <h3 class="fw-bold text-primary">
                                                    {{ $organisation->number_of_affiliated_colleges ?? 0 }}
                                                </h3>
                                                <small class="text-muted">Affiliated</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Academic -->
                                    <div x-show="subtab === 'academic'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Academic Scope</h4>
                                        @if($organisation->levels_offered && is_array($organisation->levels_offered))
                                            <h6 class="text-muted mb-2">Levels Offered:</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($organisation->levels_offered as $level)
                                                    <span class="badge bg-secondary px-3 py-2">{{ $level }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted">No academic levels specified or invalid format.</p>
                                        @endif
                                    </div>

                                    <!-- 3. INSTITUTE SPECIFIC -->
                                @elseif($organisation->organisation_type_id == 3)
                                    <div x-show="subtab === 'legal'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Ownership & Details</h4>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Ownership Type</th>
                                                    <td>{{ $organisation->ownership_type ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Entity Name</th>
                                                    <td>{{ $organisation->registered_entity_name ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Registration No.</th>
                                                    <td>{{ $organisation->registration_number ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>GST No.</th>
                                                    <td>{{ $organisation->gst_number ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>PAN No.</th>
                                                    <td>{{ $organisation->pan_number ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>GST Registered</th>
                                                    <td>{{ $organisation->gst_registered ? 'Yes' : 'No' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @if($organisation->legal_documents_urls && is_array($organisation->legal_documents_urls) && count($organisation->legal_documents_urls) > 0)
                                            <h6 class="fw-bold mt-4">Legal Documents</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($organisation->legal_documents_urls as $doc)
                                                    <a href="{{ asset($doc) }}" target="_blank" class="btn btn-sm btn-outline-dark"><i
                                                            class="bi bi-file-text me-1"></i> View</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <!-- 4. SCHOOL SPECIFIC -->
                                @elseif($organisation->organisation_type_id == 4)

                                    <!-- Ownership -->
                                    <div x-show="subtab === 'ownership'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Ownership & Management</h4>
                                        <div class="p-3 bg-light rounded border">
                                            <div class="row g-3">
                                                <div class="col-md-6"><strong>Ownership:</strong>
                                                    {{ $organisation->ownership_type ?? '-' }}</div>
                                                <div class="col-md-6"><strong>Trust/Society:</strong>
                                                    {{ $organisation->managing_trust_or_society_name ?? '-' }}</div>
                                                <div class="col-md-6"><strong>Entity Name:</strong>
                                                    {{ $organisation->registered_entity_name ?? '-' }}</div>
                                                <div class="col-md-6"><strong>Reg No:</strong>
                                                    {{ $organisation->registration_number ?? '-' }}</div>
                                                <div class="col-md-6"><strong>Minority Status:</strong>
                                                    {{ $organisation->minority_status ? 'Yes' : 'No' }}</div>
                                                @if($organisation->minority_type)
                                                    <div class="col-md-6"><strong>Minority Type:</strong>
                                                {{ $organisation->minority_type }}</div>@endif
                                            </div>
                                        </div>
                                        @if($organisation->legal_documents_urls && is_array($organisation->legal_documents_urls))
                                            <div class="mt-3">
                                                <strong class="d-block mb-2">Legal Docs:</strong>
                                                @foreach($organisation->legal_documents_urls as $doc)
                                                    <a href="{{ asset($doc) }}" target="_blank"
                                                        class="badge bg-secondary text-decoration-none me-1"><i
                                                            class="bi bi-file-earmark me-1"></i> View</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Boards -->
                                    <div x-show="subtab === 'boards'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Academic & Boards</h4>
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Boards Supported</h6>
                                                <div class="d-flex flex-wrap gap-1">
                                                    @if(is_array($organisation->education_boards_supported))
                                                        @forelse($organisation->education_boards_supported as $brd)
                                                            <span class="badge bg-primary">{{ $brd }}</span>
                                                        @empty <span class="text-muted">-</span> @endforelse
                                                    @else <span
                                                        class="text-muted">{{ $organisation->education_boards_supported }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Medium of Instruction</h6>
                                                <div class="d-flex flex-wrap gap-1">
                                                    @if(is_array($organisation->medium_of_instruction_supported))
                                                        @forelse($organisation->medium_of_instruction_supported as $med)
                                                            <span class="badge bg-info text-dark">{{ $med }}</span>
                                                        @empty <span class="text-muted">-</span> @endforelse
                                                    @else <span
                                                        class="text-muted">{{ $organisation->medium_of_instruction_supported }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <hr class="text-muted">
                                            </div>

                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Education Levels</h6>
                                                <ul class="list-inline mb-0">
                                                    @if(is_array($organisation->education_levels_supported))
                                                        @forelse($organisation->education_levels_supported as $lvl)
                                                            <li class="list-inline-item"><i class="bi bi-check2 text-success"></i>
                                                                {{ $lvl }}</li>
                                                        @empty <li class="text-muted">-</li> @endforelse
                                                    @else <li class="text-muted">{{ $organisation->education_levels_supported }}
                                                    </li> @endif
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold">Streams (Sr. Sec)</h6>
                                                <ul class="list-inline mb-0">
                                                    @if(is_array($organisation->streams_supported))
                                                        @forelse($organisation->streams_supported as $strm)
                                                            <li class="list-inline-item"><i class="bi bi-dot"></i> {{ $strm }}</li>
                                                        @empty <li class="text-muted">-</li> @endforelse
                                                    @else <li class="text-muted">{{ $organisation->streams_supported }}</li>
                                                    @endif
                                                </ul>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <div class="alert alert-light border">
                                                    <strong>Pedagogy Model:</strong>
                                                    {{ $organisation->pedagogy_model ?? 'Standard' }}<br>
                                                    <strong>Focus Areas:</strong>
                                                    {{ is_array($organisation->focus_areas) ? implode(', ', $organisation->focus_areas) : $organisation->focus_areas }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Policies -->
                                    <div x-show="subtab === 'policies'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Policies & Systems</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="text-primary mb-3">Central Systems</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">@if($organisation->centralized_curriculum_framework) <i
                                                    class="bi bi-check-circle-fill text-success me-2"></i> @else <i
                                                            class="bi bi-x-circle text-muted me-2"></i> @endif Centralized
                                                        Curriculum</li>
                                                    <li class="mb-2">@if($organisation->centralized_teacher_training) <i
                                                    class="bi bi-check-circle-fill text-success me-2"></i> @else <i
                                                            class="bi bi-x-circle text-muted me-2"></i> @endif Teacher Training
                                                    </li>
                                                    <li class="mb-2">@if($organisation->centralized_assessment_policy) <i
                                                    class="bi bi-check-circle-fill text-success me-2"></i> @else <i
                                                            class="bi bi-x-circle text-muted me-2"></i> @endif Assessment Policy
                                                    </li>
                                                    <li class="mb-2">@if($organisation->centralized_lms_available) <i
                                                    class="bi bi-check-circle-fill text-success me-2"></i> @else <i
                                                            class="bi bi-x-circle text-muted me-2"></i> @endif LMS Available
                                                    </li>
                                                    <li class="mb-2">@if($organisation->centralized_parent_communication_system)
                                                    <i class="bi bi-check-circle-fill text-success me-2"></i> @else <i
                                                        class="bi bi-x-circle text-muted me-2"></i> @endif Parent App/System
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="text-success mb-3">Safety Standards</h6>
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">@if($organisation->child_safety_policy_available) <i
                                                    class="bi bi-shield-check text-success me-2"></i> @else <i
                                                            class="bi bi-shield-x text-muted me-2"></i> @endif Child Safety
                                                        Policy</li>
                                                    <li class="mb-2">@if($organisation->posco_compliance_policy) <i
                                                    class="bi bi-shield-check text-success me-2"></i> @else <i
                                                            class="bi bi-shield-x text-muted me-2"></i> @endif POSCO Compliant
                                                    </li>
                                                    <li class="mb-2">@if($organisation->anti_bullying_policy) <i
                                                    class="bi bi-shield-check text-success me-2"></i> @else <i
                                                            class="bi bi-shield-x text-muted me-2"></i> @endif Anti-Bullying
                                                    </li>
                                                    <li class="mb-2">@if($organisation->mental_health_policy) <i
                                                    class="bi bi-shield-check text-success me-2"></i> @else <i
                                                            class="bi bi-shield-x text-muted me-2"></i> @endif Mental
                                                        Health/Wellness</li>
                                                    <li class="mb-2">@if($organisation->teacher_background_verification_policy)
                                                    <i class="bi bi-shield-check text-success me-2"></i> @else <i
                                                        class="bi bi-shield-x text-muted me-2"></i> @endif Staff BGV Done
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footprint -->
                                    <div x-show="subtab === 'footprint'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Footprint & Presence</h4>
                                        <div class="row g-4 text-center mb-4">
                                            <div class="col-4">
                                                <div class="p-3 border rounded bg-light">
                                                    <h3 class="fw-bold">{{ $organisation->total_schools_count ?? 0 }}</h3>
                                                    <small class="text-muted">Total Schools</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="p-3 border rounded bg-light">
                                                    <h3 class="fw-bold">@if($organisation->national_presence) Yes @else No
                                                    @endif</h3>
                                                    <small class="text-muted">National</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="p-3 border rounded bg-light">
                                                    <h3 class="fw-bold">@if($organisation->international_presence) Yes @else No
                                                    @endif</h3>
                                                    <small class="text-muted">International</small>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold">Present In:</h6>
                                        <p><strong>Cities:</strong>
                                            {{ is_array($organisation->cities_present_in) ? implode(', ', $organisation->cities_present_in) : $organisation->cities_present_in }}
                                        </p>
                                        <p><strong>States:</strong>
                                            {{ is_array($organisation->states_present_in) ? implode(', ', $organisation->states_present_in) : $organisation->states_present_in }}
                                        </p>
                                        @if($organisation->flagship_schools)
                                            <p><strong>Flagship Schools:</strong>
                                                {{ is_array($organisation->flagship_schools) ? implode(', ', $organisation->flagship_schools) : $organisation->flagship_schools }}
                                            </p>
                                        @endif

                                        <hr>
                                        <h6 class="fw-bold">Digital Assets</h6>
                                        <div class="d-flex gap-3 flex-wrap">
                                            @if($organisation->official_website) <a href="{{ $organisation->official_website }}"
                                            target="_blank" class="btn btn-outline-primary btn-sm">Website</a> @endif
                                            @if($organisation->admission_portal_url) <a
                                                href="{{ $organisation->admission_portal_url }}" target="_blank"
                                            class="btn btn-outline-info btn-sm">Admission Portal</a> @endif
                                            @if($organisation->parent_portal_url) <a
                                                href="{{ $organisation->parent_portal_url }}" target="_blank"
                                            class="btn btn-outline-secondary btn-sm">Parent Portal</a> @endif
                                            @if($organisation->mobile_app_available) <span class="badge bg-success p-2">Mobile
                                            App Available</span> @endif
                                        </div>
                                    </div>

                                    <!-- SEO & Trust -->
                                    <div x-show="subtab === 'seo'" x-transition.opacity style="display: none;">
                                        <h4 class="fw-bold mb-3">Trust & Reviews</h4>
                                        <div class="d-flex align-items-center mb-4">
                                            <h1 class="fw-bold text-warning me-2">{{ $organisation->average_rating ?? '0.0' }}
                                            </h1>
                                            <div>
                                                <div class="text-warning"><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
                                                <small class="text-muted">{{ $organisation->total_reviews ?? 0 }}
                                                    Reviews</small>
                                            </div>
                                        </div>

                                        @if($organisation->awards_and_recognition && is_array($organisation->awards_and_recognition))
                                            <h6 class="fw-bold">Awards & Recognition</h6>
                                            <ul class="list-group list-group-flush">
                                                @foreach($organisation->awards_and_recognition as $award)
                                                    <li class="list-group-item"><i class="bi bi-trophy text-warning me-2"></i>
                                                        {{ $award }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="mt-3">
                                            <small class="text-muted">Page Meta Title: {{ $organisation->meta_title }}</small>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <!-- Tab: Campuses -->
                    <div x-show="tab === 'campuses'" x-transition>
                        <!-- Grid View -->
                        <div x-show="!selectedCampusId">
                            <h3 class="fw-bold mb-4">Our Campuses</h3>
                            <div class="row g-4">
                                <template x-for="campus in campuses" :key="campus.id">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card campus-grid-card h-100 p-3" @click="selectCampus(campus.id)"
                                            style="cursor:pointer">
                                            <div class="text-center mb-3">
                                                <i class="bi bi-building fs-1 text-primary"></i>
                                            </div>
                                            <h5 class="fw-bold text-center" x-text="campus.campus_name"></h5>
                                            <p class="text-center text-muted small"
                                                x-text="campus.city + ', ' + campus.state"></p>
                                            <div class="mt-auto pt-3 border-top text-center">
                                                <span class="text-primary fw-bold">View Details</span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Specific Campus Detail -->
                        <div x-show="selectedCampusId" class="card detail-card p-4" x-data="{ campusTab: 'identity' }">
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                                <div>
                                    <h2 class="fw-bold mb-1" x-text="selectedCampus?.campus_name"></h2>
                                    <span class="badge bg-primary" x-text="selectedCampus?.campus_type"></span>
                                </div>
                                <button class="btn btn-outline-secondary btn-sm" @click="selectedCampusId = null">
                                    <i class="bi bi-arrow-left me-1"></i> Back to All
                                </button>
                            </div>

                            <!-- Campus Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" style="overflow-x: auto; flex-wrap: nowrap;">
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'identity' }"
                                        @click="campusTab = 'identity'">Identity</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'location' }"
                                        @click="campusTab = 'location'">Location</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'infra' }"
                                        @click="campusTab = 'infra'">Infrastructure</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'academic' }"
                                        @click="campusTab = 'academic'">Academic</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'facilities' }"
                                        @click="campusTab = 'facilities'">Facilities</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'transport' }"
                                        @click="campusTab = 'transport'">Transport</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'safety' }"
                                        @click="campusTab = 'safety'">Safety</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" :class="{ 'active': campusTab === 'contact' }"
                                        @click="campusTab = 'contact'">Contact</button>
                                </li>
                            </ul>

                            <!-- Tab Contents -->
                            <div class="tab-content">
                                <!-- Identity -->
                                <div x-show="campusTab === 'identity'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Identity & Status</h5>
                                    <div class="row g-4">
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded">
                                                <small class="text-muted d-block">Established Year</small>
                                                <span class="fw-bold"
                                                    x-text="selectedCampus?.established_year || '-'"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded">
                                                <small class="text-muted d-block">Brand Type</small>
                                                <span class="fw-bold" x-text="selectedCampus?.brand_type || '-'"></span>
                                            </div>
                                        </div>
                                        <!-- Franchise Fields -->
                                        <template x-if="selectedCampus?.brand_type === 'Franchise'">
                                            <div class="col-md-12">
                                                <div class="alert alert-info py-2">
                                                    <div class="row">
                                                        <div class="col-md-4"><strong>Partner:</strong> <span
                                                                x-text="selectedCampus?.franchise_partner_name"></span>
                                                        </div>
                                                        <div class="col-md-4"><strong>Since:</strong> <span
                                                                x-text="selectedCampus?.franchise_start_year"></span></div>
                                                        <div class="col-md-4">
                                                            <strong>Compliance:</strong>
                                                            <span x-show="selectedCampus?.brand_compliance_verified"
                                                                class="badge bg-success">Verified</span>
                                                            <span x-show="!selectedCampus?.brand_compliance_verified"
                                                                class="badge bg-warning text-dark">Pending</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div x-show="campusTab === 'location'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Location Details</h5>
                                    <p class="lead fs-6" x-text="selectedCampus?.full_address"></p>
                                    <div class="row g-3 mt-2">
                                        <div class="col-6 col-md-3"><strong>City:</strong> <br><span
                                                x-text="selectedCampus?.city"></span></div>
                                        <div class="col-6 col-md-3"><strong>State:</strong> <br><span
                                                x-text="selectedCampus?.state"></span></div>
                                        <div class="col-6 col-md-3"><strong>Country:</strong> <br><span
                                                x-text="selectedCampus?.country"></span></div>
                                        <div class="col-6 col-md-3"><strong>Pincode:</strong> <br><span
                                                x-text="selectedCampus?.pincode"></span></div>
                                    </div>
                                    <hr>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <strong>Nearest Transport Hub:</strong> <span
                                                x-text="selectedCampus?.nearest_transport_hub || '-'"></span>
                                        </div>
                                        @if($organisation->organisation_type_id == 4)
                                            <div class="col-md-6">
                                                <strong>Nearest Landmark:</strong> <span
                                                    x-text="selectedCampus?.nearest_landmark || '-'"></span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-3" x-show="selectedCampus?.google_map_url">
                                        <a :href="selectedCampus?.google_map_url" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-geo-alt-fill me-1"></i> View on Google Maps
                                        </a>
                                    </div>
                                </div>

                                <!-- Infrastructure -->
                                <div x-show="campusTab === 'infra'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Infrastructure</h5>
                                    <div class="mb-3">
                                        <span class="badge bg-info text-dark fs-6">
                                            Area: <span x-text="selectedCampus?.campus_area_acres || '0'"></span>
                                            <span x-text="selectedCampus?.campus_area_unit || 'Acres'"></span>
                                        </span>
                                    </div>
                                    <div class="row g-3 text-center mb-4">
                                        <div class="col-4 col-md-3">
                                            <div class="p-2 border rounded">
                                                <h4 class="fw-bold mb-0"
                                                    x-text="selectedCampus?.academic_blocks_count || 0"></h4>
                                                <small class="text-muted d-block">
                                                    @if($organisation->organisation_type_id == 4) Classrooms @else Academic
                                                    Blocks @endif
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-3">
                                            <div class="p-2 border rounded">
                                                <h4 class="fw-bold mb-0" x-text="selectedCampus?.classrooms_count || 0">
                                                </h4>
                                                <small class="text-muted d-block">
                                                    @if($organisation->organisation_type_id == 4) Labs @else Classrooms
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                        @if($organisation->organisation_type_id != 4)
                                            <div class="col-4 col-md-3">
                                                <div class="p-2 border rounded">
                                                    <h4 class="fw-bold mb-0" x-text="selectedCampus?.laboratories_count || 0">
                                                    </h4>
                                                    <small class="text-muted d-block">Labs</small>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-3">
                                                <div class="p-2 border rounded">
                                                    <h4 class="fw-bold mb-0"
                                                        x-text="selectedCampus?.research_centers_count || 0"></h4>
                                                    <small class="text-muted d-block">Research Ctrs</small>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <h6 class="fw-bold">Available Facilities</h6>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge"
                                            :class="selectedCampus?.smart_classrooms ? 'bg-success' : 'bg-secondary bg-opacity-25 text-muted'">
                                            <i class="bi"
                                                :class="selectedCampus?.smart_classrooms ? 'bi-check-circle-fill' : 'bi-x-circle'"></i>
                                            Smart Classrooms
                                        </span>
                                        <span class="badge"
                                            :class="selectedCampus?.library_available ? 'bg-success' : 'bg-secondary bg-opacity-25 text-muted'">
                                            <i class="bi"
                                                :class="selectedCampus?.library_available ? 'bi-check-circle-fill' : 'bi-x-circle'"></i>
                                            Library
                                        </span>
                                        <span class="badge"
                                            :class="selectedCampus?.digital_library_access ? 'bg-success' : 'bg-secondary bg-opacity-25 text-muted'">
                                            <i class="bi"
                                                :class="selectedCampus?.digital_library_access ? 'bi-check-circle-fill' : 'bi-x-circle'"></i>
                                            Digital Library
                                        </span>
                                        @if($organisation->organisation_type_id == 4)
                                            <span class="badge"
                                                :class="selectedCampus?.science_labs_available ? 'bg-success' : 'bg-secondary bg-opacity-25 text-muted'">
                                                <i class="bi"
                                                    :class="selectedCampus?.science_labs_available ? 'bi-check-circle-fill' : 'bi-x-circle'"></i>
                                                Science Labs
                                            </span>
                                            <span class="badge"
                                                :class="selectedCampus?.computer_labs_available ? 'bg-success' : 'bg-secondary bg-opacity-25 text-muted'">
                                                <i class="bi"
                                                    :class="selectedCampus?.computer_labs_available ? 'bi-check-circle-fill' : 'bi-x-circle'"></i>
                                                Computer Labs
                                            </span>
                                            <span class="badge"
                                                :class="selectedCampus?.playground_available ? 'bg-success' : 'bg-secondary bg-opacity-25 text-muted'">
                                                <i class="bi"
                                                    :class="selectedCampus?.playground_available ? 'bi-check-circle-fill' : 'bi-x-circle'"></i>
                                                Playground
                                            </span>
                                        @endif
                                    </div>
                                    <div x-show="selectedCampus?.library_available">
                                        <strong>Library Books:</strong> <span
                                            x-text="selectedCampus?.library_books_count || 0"></span>
                                    </div>
                                </div>

                                <!-- Academic -->
                                <div x-show="campusTab === 'academic'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Academic Focus</h5>

                                    <div class="mb-4">
                                        <h6 class="fw-bold">Exams Prepared For</h6>
                                        <div class="d-flex flex-wrap gap-1">
                                            <template x-for="exam in (selectedCampus?.exams_prepared_for || [])">
                                                <span class="badge bg-primary rounded-pill" x-text="exam"></span>
                                            </template>
                                            <span x-show="!selectedCampus?.exams_prepared_for?.length"
                                                class="text-muted small">No specific exams listed.</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold">Target Classes</h6>
                                        <div class="d-flex flex-wrap gap-1">
                                            <template x-for="cls in (selectedCampus?.target_classes || [])">
                                                <span class="badge bg-info text-dark rounded-pill" x-text="cls"></span>
                                            </template>
                                            <span x-show="!selectedCampus?.target_classes?.length"
                                                class="text-muted small">No target classes listed.</span>
                                        </div>
                                    </div>

                                    <div x-show="selectedCampus?.about_institute">
                                        <h6 class="fw-bold">About Campus</h6>
                                        <div class="bg-light p-3 rounded text-muted"
                                            x-html="selectedCampus?.about_institute"></div>
                                    </div>
                                </div>

                                <!-- Facilities -->
                                <div x-show="campusTab === 'facilities'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Campus Facilities</h5>
                                    <div class="card mb-3 border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="fw-bold"><i class="bi bi-house-door-fill text-primary me-2"></i>
                                                Hostel</h6>
                                            <div class="row mt-2">
                                                <div class="col-6"><strong>Available:</strong> <span
                                                        x-text="selectedCampus?.hostel_available ? 'Yes' : 'No'"></span>
                                                </div>
                                                <div class="col-6"><strong>Type:</strong> <span
                                                        x-text="selectedCampus?.hostel_type || '-'"></span></div>
                                                <div class="col-6 mt-2"><strong>Capacity:</strong> <span
                                                        x-text="selectedCampus?.hostel_capacity || 0"></span></div>
                                                <div class="col-6 mt-2"><strong>Food:</strong> <span
                                                        x-text="selectedCampus?.food_facility || '-'"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="fw-bold"><i class="bi bi-activity text-danger me-2"></i> Medical</h6>
                                        <span x-show="selectedCampus?.medical_facility_available"
                                            class="text-success fw-bold">Available</span>
                                        <span x-show="!selectedCampus?.medical_facility_available" class="text-muted">Not
                                            Available</span>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold"><i class="bi bi-controller text-warning me-2"></i> Sports
                                            Facilities</h6>
                                        <div class="d-flex flex-wrap gap-1 mt-2">
                                            <template x-for="sport in (selectedCampus?.sports_facilities || [])">
                                                <span class="badge bg-secondary" x-text="sport"></span>
                                            </template>
                                            <span x-show="!selectedCampus?.sports_facilities?.length"
                                                class="text-muted small">No specific sports listed.</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transport -->
                                <div x-show="campusTab === 'transport'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Transport & Parking</h5>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge p-2 me-2"
                                            :class="selectedCampus?.transport_available ? 'bg-success' : 'bg-secondary'">
                                            <i class="bi bi-bus-front-fill me-1"></i> Transport <span
                                                x-text="selectedCampus?.transport_available ? 'Available' : 'Unavailable'"></span>
                                        </span>
                                        @if($organisation->organisation_type_id != 4)
                                            <span class="badge p-2 bg-dark ms-2" x-show="selectedCampus?.parking_available">
                                                <i class="bi bi-p-square-fill me-1"></i> Parking Available
                                            </span>
                                        @endif
                                    </div>

                                    @if($organisation->organisation_type_id == 4)
                                        <!-- School Specific Transport -->
                                        <div class="row g-3">
                                            <div class="col-md-6"><strong>Bus Fleet Size:</strong> <span
                                                    x-text="selectedCampus?.bus_fleet_size || 0"></span></div>
                                            <div class="col-md-6"><strong>GPS Enabled:</strong> <span
                                                    x-text="selectedCampus?.gps_enabled_buses ? 'Yes' : 'No'"></span></div>
                                        </div>
                                    @else
                                        <!-- Other Transport -->
                                        <div x-show="selectedCampus?.bus_routes && selectedCampus?.bus_routes.length > 0">
                                            <h6 class="fw-bold mt-3">Bus Routes</h6>
                                            <ul class="list-group list-group-flush">
                                                <template x-for="route in selectedCampus?.bus_routes">
                                                    <li class="list-group-item px-0" x-text="route"></li>
                                                </template>
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <!-- Safety -->
                                <div x-show="campusTab === 'safety'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Safety & Security</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <i class="bi"
                                                        :class="selectedCampus?.cctv_coverage ? 'bi-check-circle-fill text-success' : 'bi-x-circle text-muted'"></i>
                                                    CCTV Coverage
                                                </li>
                                                <li class="mb-2">
                                                    <i class="bi"
                                                        :class="selectedCampus?.fire_safety_certified ? 'bi-check-circle-fill text-success' : 'bi-x-circle text-muted'"></i>
                                                    Fire Safety Certified
                                                </li>
                                                @if($organisation->organisation_type_id == 4)
                                                    <li class="mb-2">
                                                        <i class="bi"
                                                            :class="selectedCampus?.visitor_management_system ? 'bi-check-circle-fill text-success' : 'bi-x-circle text-muted'"></i>
                                                        Visitor Mgmt System
                                                    </li>
                                                @else
                                                    <li class="mb-2">
                                                        <i class="bi"
                                                            :class="selectedCampus?.disaster_management_plan ? 'bi-check-circle-fill text-success' : 'bi-x-circle text-muted'"></i>
                                                        Disaster Mgmt Plan
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold">Security Staff</h6>
                                            <h2 class="text-primary fw-bold"
                                                x-text="selectedCampus?.security_staff_count || 0"></h2>
                                            <small class="text-muted">Guards/Staff</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact -->
                                <div x-show="campusTab === 'contact'" x-transition.opacity>
                                    <h5 class="fw-bold mb-3">Contact Information</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-3 d-flex" x-show="selectedCampus?.campus_email">
                                            <i class="bi bi-envelope-fill text-primary me-3 fs-5"></i>
                                            <div>
                                                <strong class="d-block">Email</strong>
                                                <a :href="'mailto:' + selectedCampus?.campus_email"
                                                    x-text="selectedCampus?.campus_email"
                                                    class="text-decoration-none text-dark"></a>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex" x-show="selectedCampus?.campus_website">
                                            <i class="bi bi-globe text-primary me-3 fs-5"></i>
                                            <div>
                                                <strong class="d-block">Website</strong>
                                                <a :href="selectedCampus?.campus_website" target="_blank"
                                                    x-text="selectedCampus?.campus_website"
                                                    class="text-decoration-none text-dark"></a>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex">
                                            <i class="bi bi-telephone-fill text-primary me-3 fs-5"></i>
                                            <div>
                                                <strong class="d-block">Phone Numbers</strong>
                                                <div class="d-flex flex-column">
                                                    <template
                                                        x-for="phone in (selectedCampus?.campus_contact_numbers || [])">
                                                        <span x-text="phone"></span>
                                                    </template>
                                                    <span x-show="!selectedCampus?.campus_contact_numbers?.length"
                                                        class="text-muted">Not available</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- Tab: Courses -->
                    <div x-show="tab === 'courses'" x-transition>
                        <!-- Grid View -->
                        <div x-show="!selectedCourseId">
                            <h3 class="fw-bold mb-4">Available Courses</h3>
                            <div class="row g-4">
                                <template x-for="course in courses" :key="course.id">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card campus-grid-card h-100 p-3" @click="selectCourse(course.id)"
                                            style="cursor:pointer">
                                            <h5 class="fw-bold" x-text="course.course.name"></h5>
                                            <div class="mt-3">
                                                <small class="text-muted d-block">Duration</small>
                                                <span class="fw-600" x-text="course.duration || 'N/A'"></span>
                                            </div>
                                            <div class="mt-auto pt-3 border-top text-center">
                                                <span class="text-primary fw-bold">Explore Details</span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>



                        <!-- Specific Course Detail -->
                        <div x-show="selectedCourseId" class="card detail-card p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h2 class="fw-bold mb-1"
                                        x-text="selectedCourse?.course?.name || selectedCourse?.academic_unit_name">
                                    </h2>
                                    <template x-if="selectedCourse?.campus">
                                        <small class="text-muted"><i class="bi bi-geo-alt-fill me-1"></i><span
                                                x-text="selectedCourse.campus.campus_name"></span></small>
                                    </template>
                                </div>
                                <div>
                                    <span class="badge bg-primary me-2" x-show="selectedCourse?.status"
                                        x-text="'Active'"></span>
                                    <button class="btn btn-outline-secondary btn-sm" @click="selectedCourseId = null">Back
                                        to All</button>
                                </div>
                            </div>

                            <!-- Tabs for Course Detail -->
                            <div class="nav nav-pills mb-3" id="courseDetailTabs" role="tablist">
                                <button class="nav-link active me-2" data-bs-toggle="pill"
                                    data-bs-target="#course-overview">Overview</button>
                                <button class="nav-link me-2" data-bs-toggle="pill"
                                    data-bs-target="#course-eligibility">Eligibility
                                    & Admission</button>
                                <button class="nav-link me-2" data-bs-toggle="pill" data-bs-target="#course-fees">Fees &
                                    Scholarships</button>
                                <button class="nav-link" data-bs-toggle="pill"
                                    data-bs-target="#course-curriculum">Curriculum &
                                    Career</button>
                            </div>

                            <div class="tab-content border p-4 rounded bg-white shadow-sm">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="course-overview">
                                    <!-- Common Header Stats -->
                                    <div class="row g-3 mb-4">
                                        <!-- Duration - Univ/Inst -->
                                        <template x-if="selectedCourse?.duration">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Duration</small>
                                                <span class="fw-bold fs-5"
                                                    x-text="selectedCourse.duration + ' Years'"></span>
                                            </div>
                                        </template>
                                        <!-- Mode - Univ/Inst -->
                                        <template x-if="selectedCourse?.mode || selectedCourse?.delivery_mode">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Mode</small>
                                                <span class="fw-bold fs-5"
                                                    x-text="selectedCourse.mode || selectedCourse.delivery_mode"></span>
                                            </div>
                                        </template>
                                        <!-- Languages (New) -->
                                        <template x-if="selectedCourse?.course_languages">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Languages</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <template
                                                        x-for="langId in (Array.isArray(selectedCourse.course_languages) ? selectedCourse.course_languages : JSON.parse(selectedCourse.course_languages || '[]'))">
                                                        <span class="badge bg-light text-dark border"><i
                                                                class="bi bi-translate me-1"></i><span
                                                                x-text="getLanguageName(langId)"></span></span>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>
                                        <!-- Specialization (New) -->
                                        <template x-if="selectedCourse?.specialization">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Specialization</small>
                                                <span class="fw-bold fs-5"
                                                    x-text="selectedCourse.specialization.title"></span>
                                            </div>
                                        </template>
                                        <!-- Rating - Univ -->
                                        <template x-if="selectedCourse?.rating">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Rating</small>
                                                <span class="fw-bold fs-5 text-warning"><i class="bi bi-star-fill"></i>
                                                    <span x-text="selectedCourse.rating"></span></span>
                                            </div>
                                        </template>
                                        <!-- ROI - Univ -->
                                        <template x-if="selectedCourse?.roi">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">ROI</small>
                                                <span class="badge bg-success" x-text="selectedCourse.roi"></span>
                                            </div>
                                        </template>

                                        <!-- School Specific Stats -->
                                        <template x-if="selectedCourse?.school_type">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">School Type</small>
                                                <span class="fw-bold" x-text="selectedCourse.school_type"></span>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.education_board">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Board</small>
                                                <span class="fw-bold" x-text="selectedCourse.education_board"></span>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.medium_of_instruction">
                                            <div class="col-md-3 col-6">
                                                <small class="text-muted d-block">Medium</small>
                                                <span class="fw-bold" x-text="selectedCourse.medium_of_instruction"></span>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- Key Highlights / Infrastructure (School/Institute) -->
                                    <div class="row g-3">
                                        <!-- Institute Specific -->
                                        <template x-if="selectedCourse?.total_selections_all_time">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded text-center border">
                                                    <h3 class="fw-bold text-primary mb-0"
                                                        x-text="selectedCourse.total_selections_all_time"></h3>
                                                    <small class="text-muted">Total Selections</small>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.highest_rank_achieved">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded text-center border">
                                                    <h3 class="fw-bold text-success mb-0"
                                                        x-text="selectedCourse.highest_rank_achieved"></h3>
                                                    <small class="text-muted">Highest Rank</small>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.integrated_schooling_available">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded text-center border">
                                                    <i class="bi bi-building-check fs-3 text-info"></i>
                                                    <small class="text-muted d-block">Integrated Schooling</small>
                                                    <span class="badge bg-info">Available</span>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- School Specific -->
                                        <template x-if="selectedCourse?.student_strength">
                                            <div class="col-md-3">
                                                <div class="p-2 border rounded">
                                                    <small class="text-muted d-block">Student Strength</small>
                                                    <strong x-text="selectedCourse.student_strength"></strong>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.average_class_size">
                                            <div class="col-md-3">
                                                <div class="p-2 border rounded">
                                                    <small class="text-muted d-block">Class Size</small>
                                                    <strong x-text="selectedCourse.average_class_size"></strong>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.total_teachers">
                                            <div class="col-md-3">
                                                <div class="p-2 border rounded">
                                                    <small class="text-muted d-block">Teachers</small>
                                                    <strong x-text="selectedCourse.total_teachers"></strong>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.average_board_result_percentage">
                                            <div class="col-md-3">
                                                <div class="p-2 border rounded">
                                                    <small class="text-muted d-block">Avg Board Result</small>
                                                    <strong class="text-success"
                                                        x-text="selectedCourse.average_board_result_percentage + '%'"></strong>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- Institute: Faculty & Batches Details -->
                                    <template x-if="selectedCourse?.total_batches || selectedCourse?.total_faculty_count">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i
                                                    class="bi bi-people-fill me-2 text-primary"></i>Faculty & Batch
                                                Structure</h5>
                                            <div class="row g-3">
                                                <!-- Batch Details -->
                                                <template x-if="selectedCourse?.total_batches">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Total Batches</small>
                                                            <h4 class="fw-bold mb-0" x-text="selectedCourse.total_batches">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.average_batch_size">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Avg Batch Size</small>
                                                            <h4 class="fw-bold mb-0"
                                                                x-text="selectedCourse.average_batch_size"></h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.min_batch_size">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Min Batch</small>
                                                            <h4 class="fw-bold mb-0" x-text="selectedCourse.min_batch_size">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.max_batch_size">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Max Batch</small>
                                                            <h4 class="fw-bold mb-0" x-text="selectedCourse.max_batch_size">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- Faculty Details -->
                                                <template x-if="selectedCourse?.total_faculty_count">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-info bg-opacity-10 rounded border border-info">
                                                            <small class="text-muted d-block">Total Faculty</small>
                                                            <h4 class="fw-bold mb-0 text-info"
                                                                x-text="selectedCourse.total_faculty_count"></h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.senior_faculty_count">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Senior Faculty</small>
                                                            <h4 class="fw-bold mb-0"
                                                                x-text="selectedCourse.senior_faculty_count"></h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.average_faculty_experience_years">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Avg Experience</small>
                                                            <h4 class="fw-bold mb-0"
                                                                x-text="selectedCourse.average_faculty_experience_years + ' Yrs'">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.full_time_faculty_percentage">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Full-Time Faculty</small>
                                                            <h4 class="fw-bold mb-0 text-success"
                                                                x-text="selectedCourse.full_time_faculty_percentage + '%'">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- Batch Flags -->
                                                <div class="col-12 mt-3">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <template x-if="selectedCourse?.separate_batches_for_droppers">
                                                            <span class="badge bg-primary"><i
                                                                    class="bi bi-check-circle me-1"></i>Separate Dropper
                                                                Batches</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.merit_based_batching">
                                                            <span class="badge bg-success"><i
                                                                    class="bi bi-trophy me-1"></i>Merit-Based
                                                                Batching</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.visiting_faculty_available">
                                                            <span class="badge bg-info"><i
                                                                    class="bi bi-person-badge me-1"></i>Visiting
                                                                Faculty</span>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Institute: Study Material & Support -->
                                    <template
                                        x-if="selectedCourse?.study_material_type || selectedCourse?.doubt_solving_mode">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i class="bi bi-book me-2 text-primary"></i>Study
                                                Material & Support</h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.study_material_type">
                                                    <div class="col-md-6">
                                                        <strong>Study Material Type:</strong> <span
                                                            x-text="selectedCourse.study_material_type"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.doubt_solving_mode">
                                                    <div class="col-md-6">
                                                        <strong>Doubt Solving Mode:</strong> <span
                                                            x-text="selectedCourse.doubt_solving_mode"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.tests_per_month">
                                                    <div class="col-md-4">
                                                        <strong>Tests Per Month:</strong> <span
                                                            x-text="selectedCourse.tests_per_month"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.full_syllabus_tests_count">
                                                    <div class="col-md-4">
                                                        <strong>Full Syllabus Tests:</strong> <span
                                                            x-text="selectedCourse.full_syllabus_tests_count"></span>
                                                    </div>
                                                </template>

                                                <!-- Support Flags -->
                                                <div class="col-12 mt-3">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <template x-if="selectedCourse?.dpp_provided">
                                                            <span class="badge bg-primary"><i
                                                                    class="bi bi-file-earmark-text me-1"></i>DPP
                                                                Provided</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.test_series_available">
                                                            <span class="badge bg-success"><i
                                                                    class="bi bi-clipboard-check me-1"></i>Test
                                                                Series</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.online_test_platform_available">
                                                            <span class="badge bg-info"><i
                                                                    class="bi bi-laptop me-1"></i>Online Test
                                                                Platform</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.personal_mentorship_available">
                                                            <span class="badge bg-warning text-dark"><i
                                                                    class="bi bi-person-check me-1"></i>Personal
                                                                Mentorship</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.extra_classes_for_weak_students">
                                                            <span class="badge bg-secondary"><i
                                                                    class="bi bi-plus-circle me-1"></i>Extra
                                                                Classes</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.parent_counselling_available">
                                                            <span class="badge bg-dark"><i
                                                                    class="bi bi-chat-dots me-1"></i>Parent
                                                                Counselling</span>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Institute: Results & Performance -->
                                    <template
                                        x-if="selectedCourse?.selections_last_year || selectedCourse?.average_selection_rate">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i
                                                    class="bi bi-graph-up-arrow me-2 text-success"></i>Results &
                                                Performance</h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.selections_last_year">
                                                    <div class="col-md-4">
                                                        <div
                                                            class="p-3 bg-success bg-opacity-10 rounded border border-success">
                                                            <small class="text-muted d-block">Last Year
                                                                Selections</small>
                                                            <h4 class="fw-bold mb-0 text-success"
                                                                x-text="selectedCourse.selections_last_year"></h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.average_selection_rate">
                                                    <div class="col-md-4">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Selection Rate</small>
                                                            <h4 class="fw-bold mb-0"
                                                                x-text="selectedCourse.average_selection_rate + '%'">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.result_verification_status">
                                                    <div class="col-md-4">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Verification
                                                                Status</small>
                                                            <span class="badge bg-success"
                                                                x-text="selectedCourse.result_verification_status"></span>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.results_years_available">
                                                    <div class="col-12">
                                                        <strong>Results Available For:</strong>
                                                        <div class="d-flex flex-wrap gap-1 mt-2">
                                                            <template
                                                                x-for="year in (Array.isArray(selectedCourse.results_years_available) ? selectedCourse.results_years_available : [])">
                                                                <span class="badge bg-secondary" x-text="year"></span>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Board Affiliation Details -->
                                    <template
                                        x-if="selectedCourse?.board_affiliation_number || selectedCourse?.affiliation_valid_from">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i class="bi bi-award me-2 text-primary"></i>Board
                                                Affiliation</h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.board_affiliation_number">
                                                    <div class="col-md-4">
                                                        <strong>Affiliation Number:</strong> <span
                                                            x-text="selectedCourse.board_affiliation_number"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.affiliation_valid_from">
                                                    <div class="col-md-4">
                                                        <strong>Valid From:</strong> <span
                                                            x-text="selectedCourse.affiliation_valid_from"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.affiliation_valid_to">
                                                    <div class="col-md-4">
                                                        <strong>Valid To:</strong> <span
                                                            x-text="selectedCourse.affiliation_valid_to"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Faculty & Support Staff -->
                                    <template
                                        x-if="selectedCourse?.trained_teachers_percentage || selectedCourse?.student_teacher_ratio">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i
                                                    class="bi bi-person-workspace me-2 text-primary"></i>Faculty &
                                                Support</h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.trained_teachers_percentage">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Trained Teachers</small>
                                                            <h4 class="fw-bold mb-0 text-success"
                                                                x-text="selectedCourse.trained_teachers_percentage + '%'">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.student_teacher_ratio">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Student:Teacher
                                                                Ratio</small>
                                                            <h4 class="fw-bold mb-0"
                                                                x-text="selectedCourse.student_teacher_ratio"></h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div class="col-12 mt-2">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <template x-if="selectedCourse?.special_educator_available">
                                                            <span class="badge bg-primary"><i
                                                                    class="bi bi-mortarboard me-1"></i>Special
                                                                Educator</span>
                                                        </template>
                                                        <template x-if="selectedCourse?.school_counsellor_available">
                                                            <span class="badge bg-info"><i
                                                                    class="bi bi-chat-heart me-1"></i>School
                                                                Counsellor</span>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Academic Policies -->
                                    <template x-if="selectedCourse?.assessment_pattern || selectedCourse?.homework_policy">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i
                                                    class="bi bi-clipboard-data me-2 text-primary"></i>Academic Policies
                                            </h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.assessment_pattern">
                                                    <div class="col-md-6">
                                                        <strong>Assessment Pattern:</strong> <span
                                                            x-text="selectedCourse.assessment_pattern"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.homework_policy">
                                                    <div class="col-md-6">
                                                        <strong>Homework Policy:</strong> <span
                                                            x-text="selectedCourse.homework_policy"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.parent_teacher_meet_frequency">
                                                    <div class="col-md-6">
                                                        <strong>PT Meet Frequency:</strong> <span
                                                            x-text="selectedCourse.parent_teacher_meet_frequency"></span>
                                                    </div>
                                                </template>
                                                <div class="col-12 mt-2">
                                                    <template x-if="selectedCourse?.remedial_classes_available">
                                                        <span class="badge bg-success"><i
                                                                class="bi bi-book me-1"></i>Remedial Classes
                                                            Available</span>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Board Results Details -->
                                    <template x-if="selectedCourse?.board_result_classes || selectedCourse?.highest_score">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i class="bi bi-trophy me-2 text-warning"></i>Board
                                                Results</h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.highest_score">
                                                    <div class="col-md-3">
                                                        <div
                                                            class="p-3 bg-warning bg-opacity-10 rounded border border-warning">
                                                            <small class="text-muted d-block">Highest Score</small>
                                                            <h4 class="fw-bold mb-0 text-warning"
                                                                x-text="selectedCourse.highest_score + '%'"></h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.distinction_percentage">
                                                    <div class="col-md-3">
                                                        <div class="p-3 bg-light rounded border">
                                                            <small class="text-muted d-block">Distinction %</small>
                                                            <h4 class="fw-bold mb-0 text-success"
                                                                x-text="selectedCourse.distinction_percentage + '%'">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.board_result_classes">
                                                    <div class="col-12">
                                                        <strong>Board Results Available For:</strong>
                                                        <div class="d-flex flex-wrap gap-1 mt-2">
                                                            <template
                                                                x-for="cls in (Array.isArray(selectedCourse.board_result_classes) ? selectedCourse.board_result_classes : [])">
                                                                <span class="badge bg-secondary" x-text="cls"></span>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div class="col-12 mt-2">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <template x-if="selectedCourse?.olympiad_participation">
                                                            <span class="badge bg-primary"><i
                                                                    class="bi bi-star me-1"></i>Olympiad
                                                                Participation</span>
                                                        </template>
                                                        <template
                                                            x-if="selectedCourse?.competitive_exam_preparation_support">
                                                            <span class="badge bg-success"><i
                                                                    class="bi bi-pencil-square me-1"></i>Competitive
                                                                Exam Prep</span>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Fee Details -->
                                    <template x-if="selectedCourse?.annual_fee_range || selectedCourse?.admission_fee">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i class="bi bi-cash-stack me-2 text-success"></i>Fee
                                                Breakdown</h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.annual_fee_range">
                                                    <div class="col-md-4">
                                                        <strong>Annual Fee Range:</strong> <span
                                                            x-text="selectedCourse.annual_fee_range"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.admission_fee">
                                                    <div class="col-md-4">
                                                        <strong>Admission Fee:</strong> <span
                                                            x-text="'₹' + selectedCourse.admission_fee"></span>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.fee_payment_frequency">
                                                    <div class="col-md-4">
                                                        <strong>Payment Frequency:</strong> <span
                                                            x-text="selectedCourse.fee_payment_frequency"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Activities & Programs -->
                                    <template x-if="selectedCourse?.sports_offered || selectedCourse?.clubs_and_societies">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i
                                                    class="bi bi-palette me-2 text-danger"></i>Activities & Programs
                                            </h5>
                                            <div class="row g-3">
                                                <template x-if="selectedCourse?.sports_offered">
                                                    <div class="col-12">
                                                        <strong>Sports Offered:</strong>
                                                        <div class="d-flex flex-wrap gap-1 mt-2">
                                                            <template
                                                                x-for="sport in (Array.isArray(selectedCourse.sports_offered) ? selectedCourse.sports_offered : [])">
                                                                <span class="badge bg-primary" x-text="sport"></span>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.clubs_and_societies">
                                                    <div class="col-12">
                                                        <strong>Clubs & Societies:</strong>
                                                        <div class="d-flex flex-wrap gap-1 mt-2">
                                                            <template
                                                                x-for="club in (Array.isArray(selectedCourse.clubs_and_societies) ? selectedCourse.clubs_and_societies : [])">
                                                                <span class="badge bg-info" x-text="club"></span>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="selectedCourse?.annual_events">
                                                    <div class="col-12">
                                                        <strong>Annual Events:</strong>
                                                        <div class="d-flex flex-wrap gap-1 mt-2">
                                                            <template
                                                                x-for="event in (Array.isArray(selectedCourse.annual_events) ? selectedCourse.annual_events : [])">
                                                                <span class="badge bg-warning text-dark"
                                                                    x-text="event"></span>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div class="col-12 mt-2">
                                                    <template x-if="selectedCourse?.arts_music_programs_available">
                                                        <span class="badge bg-danger"><i
                                                                class="bi bi-music-note me-1"></i>Arts & Music
                                                            Programs</span>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- School: Digital Features -->
                                    <template
                                        x-if="selectedCourse?.parent_app_available || selectedCourse?.attendance_tracking_available">
                                        <div class="mt-4">
                                            <h5 class="fw-bold mb-3"><i class="bi bi-phone me-2 text-info"></i>Digital
                                                Features</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                <template x-if="selectedCourse?.parent_app_available">
                                                    <span class="badge bg-primary p-2"><i
                                                            class="bi bi-app-indicator me-1"></i>Parent App
                                                        Available</span>
                                                </template>
                                                <template x-if="selectedCourse?.attendance_tracking_available">
                                                    <span class="badge bg-success p-2"><i
                                                            class="bi bi-calendar-check me-1"></i>Attendance
                                                        Tracking</span>
                                                </template>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Detailed Text Fields (University) -->
                                    <template x-if="selectedCourse?.admission_process">
                                        <div class="mt-4">
                                            <h5 class="fw-bold">Overview</h5>
                                            <div x-html="selectedCourse.admission_process"></div>
                                            <!-- Sometimes used as overview -->
                                        </div>
                                    </template>
                                </div>

                                <!-- Eligibility Tab -->
                                <div class="tab-pane fade" id="course-eligibility">
                                    <h5 class="fw-bold mb-3">Eligibility Criteria</h5>
                                    <template x-if="selectedCourse?.eligibility">
                                        <div x-html="selectedCourse.eligibility"></div>
                                    </template>
                                    <template x-if="!selectedCourse?.eligibility">
                                        <p class="text-muted">Contact institute for detailed eligibility.</p>
                                    </template>

                                    <hr class="my-4">
                                    <h5 class="fw-bold mb-3">Admission Details</h5>
                                    <div class="row g-3">
                                        <template x-if="selectedCourse?.provisional_admission">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                    <span>Provisional Admission Available</span>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.grade_range">
                                            <div class="col-md-6">
                                                <strong>Grades:</strong> <span x-text="selectedCourse.grade_range"></span>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.streams_offered">
                                            <div class="col-12 mt-2">
                                                <strong>Streams:</strong>
                                                <div class="d-flex flex-wrap gap-2 mt-1">
                                                    <template
                                                        x-for="stream in (Array.isArray(selectedCourse.streams_offered) ? selectedCourse.streams_offered : (selectedCourse.streams_offered ? JSON.parse(selectedCourse.streams_offered) : []))">
                                                        <span class="badge bg-secondary" x-text="stream"></span>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Fees Tab -->
                                <div class="tab-pane fade" id="course-fees">
                                    <h5 class="fw-bold mb-3">Fee Structure</h5>
                                    <!-- Total Fees Highlight -->
                                    <template x-if="selectedCourse?.total_fees">
                                        <div class="alert alert-primary d-flex align-items-center mb-4">
                                            <i class="bi bi-cash-coin fs-3 me-3"></i>
                                            <div>
                                                <small>Total Fees (Approx)</small>
                                                <h4 class="mb-0 fw-bold" x-text="'₹' + selectedCourse.total_fees"></h4>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-if="selectedCourse?.fees_structure">
                                        <div x-html="selectedCourse.fees_structure"></div>
                                    </template>
                                    <!-- Institute/School Fee Range -->
                                    <template x-if="selectedCourse?.average_course_fee_range">
                                        <div class="mb-3">
                                            <strong>Average Fee Range:</strong> <span
                                                x-text="selectedCourse.average_course_fee_range"></span>
                                        </div>
                                    </template>

                                    <!-- Facilities Flags -->
                                    <div class="row g-3 mt-3">
                                        <template x-if="selectedCourse?.scholarship_available">
                                            <div class="col-md-6"><i
                                                    class="bi bi-check-lg text-success me-2"></i>Scholarships
                                                Available
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.installment_available">
                                            <div class="col-md-6"><i class="bi bi-check-lg text-success me-2"></i>EMI /
                                                Installments</div>
                                        </template>
                                        <template x-if="selectedCourse?.refund_policy_available">
                                            <div class="col-md-6"><i class="bi bi-check-lg text-success me-2"></i>Refund
                                                Policy Available</div>
                                        </template>
                                        <template x-if="selectedCourse?.transport_fee">
                                            <div class="col-md-6"><i class="bi bi-bus-front text-muted me-2"></i>Transport
                                                Facility</div>
                                        </template>
                                        <template x-if="selectedCourse?.hostel_fee">
                                            <div class="col-md-6"><i class="bi bi-building text-muted me-2"></i>Hostel
                                                Available</div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Curriculum & Career Tab -->
                                <div class="tab-pane fade" id="course-curriculum">
                                    <template x-if="selectedCourse?.curriculum">
                                        <div class="mb-4">
                                            <h5 class="fw-bold mb-3">Syllabus / Curriculum</h5>
                                            <div x-html="selectedCourse.curriculum" class="bg-light p-3 rounded"></div>
                                        </div>
                                    </template>

                                    <div class="row g-4">
                                        <template x-if="selectedCourse?.career_prospects">
                                            <div class="col-md-6">
                                                <h5 class="fw-bold">Career Prospects</h5>
                                                <div x-html="selectedCourse.career_prospects"></div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.placement_details">
                                            <div class="col-md-6">
                                                <h5 class="fw-bold">Placements</h5>
                                                <div x-html="selectedCourse.placement_details"></div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.internship_ranking">
                                            <div class="col-12">
                                                <h5 class="fw-bold">Internship & Ranking</h5>
                                                <div x-html="selectedCourse.internship_ranking"></div>
                                            </div>
                                        </template>
                                        <template x-if="selectedCourse?.industrial_collaboration">
                                            <div class="col-12">
                                                <h5 class="fw-bold">Collaborations</h5>
                                                <div x-html="selectedCourse.industrial_collaboration"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush