@extends('layouts.master')

@section('title', 'Compare Campuses & Courses')

@push('css')
<link rel="stylesheet" href="{{ asset('css/home/organisation-comparison.css') }}">
@endpush

@section('content')
    <div class="breadcrumb-area py-4 bg-light">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold mb-0 fs-3">Compare Courses</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compare</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="compare-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Make an Informed Decision</h2>
                <p class="text-muted">Select up to 4 courses from different campuses and departments to compare them side-by-side.</p>
            </div>

            <div class="compare-bg">
                <div class="row g-4 justify-content-center">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-lg-3 col-md-6">
                            <div class="compare-card" data-slot-card="{{ $i }}">
                                <div class="card-top">
                                    <span class="option-tag">OPTION {{ $i }}</span>
                                    <i class="fas fa-university text-muted fs-4"></i>
                                </div>

                                <div class="field">
                                    <label>Campus</label>
                                    <select class="form-select campus-selector" data-slot="{{ $i }}">
                                        <option value="">Select Campus</option>
                                        @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Department</label>
                                    <select class="form-select dept-selector" data-slot="{{ $i }}" disabled>
                                        <option value="">Select Department</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Course</label>
                                    <select class="form-select course-selector" data-slot="{{ $i }}" disabled>
                                        <option value="">Select Course</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Parameters Quick Access -->
            <div id="paramTabs" class="param-tabs-wrapper mb-4 mt-4 d-none">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-filter me-2 text-primary"></i>
                    <span class="fw-bold small text-uppercase">Quick Jump</span>
                </div>
                <div class="param-tabs-scroll d-flex gap-2" style="overflow-x: auto; padding-bottom: 10px;"></div>
            </div>

            <!-- Comparison Matrix -->
            <div id="comparisonResults" class="comparison-matrix-wrapper d-none mt-4 p-3">
                <div class="table-responsive">
                    <table class="table comparison-matrix-table mb-0">
                        <thead>
                            <tr id="matrixHead">
                                <th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="matrixBody"></tbody>
                    </table>
                </div>
                <div class="text-center py-4 bg-light border-top mt-3">
                    <button id="resetComparison" class="btn btn-dark rounded-pill px-5 py-2 shadow-sm">
                        <i class="fas fa-undo me-2"></i> Reset Comparison
                    </button>
                </div>
            </div>

            <div id="emptyMessage" class="text-center py-5 mt-4">
                <i class="fas fa-columns fa-3x text-light mb-3" style="color: #e2e8f0 !important;"></i>
                <h4 class="text-muted fw-bold">Select courses to compare</h4>
                <p class="text-muted">Your comparison results will appear here automatically.</p>
            </div>
        </div>
    </section>
@endsection

@push('js')
    @php
        $maxClassProfileYear = 0;
        $maxPlacementYear = 0;

        $compData = $campuses->mapWithKeys(function($campus) use (&$maxClassProfileYear, &$maxPlacementYear) {
            $cpList = is_array($campus->class_profile) ? $campus->class_profile : [];
            $cp = count($cpList) > 0 ? end($cpList) : [];
            
            $mapped = [$campus->id => [
                'name' => $campus->campus_name,
                'location' => $campus->city . ($campus->state ? ', ' . $campus->state : ''),
                'ownership' => $campus->ownership_model ?? 'N/A',
                'type_of_institute' => $campus->campus_type ?? 'N/A',
                'college_type' => $campus->organisation->org_type ?? 'N/A',
                'establishment_year' => $campus->established_year ?? 'N/A',
                'campus_size' => $campus->campus_area_acres ? $campus->campus_area_acres . ' Acres' : 'N/A',
                'total_courses_offered' => $campus->departments->flatMap->courses->count(),
                'c360_rank' => 'N/A',
                'c360_rating' => 'N/A',
                'nirf_overall' => $campus->organisation->nirf_rank_overall ?? 'N/A',
                'nirf_category' => $campus->organisation->nirf_rank_category ?? 'N/A',
                'approvals' => is_array($campus->organisation->statutory_approvals) ? implode(', ', $campus->organisation->statutory_approvals) : ($campus->organisation->statutory_approvals ?: 'N/A'),
                'accreditations' => $campus->organisation->naac_accredited ? 'NAAC' . ($campus->organisation->naac_grade ? ' (' . $campus->organisation->naac_grade . ')' : '') : 'N/A',
                'total_students' => $cp['total_students'] ?? 'N/A',
                'total_faculty' => $cp['total_faculty'] ?? 'N/A',
                'total_male_students' => $cp['total_male_students'] ?? 'N/A',
                'total_female_students' => $cp['total_female_students'] ?? 'N/A',
                'total_students_outside_state' => $cp['total_outside_state'] ?? 'N/A',
                'facilities' => is_array($campus->facilities) ? $campus->facilities : [],
                'class_profile_year' => $cp['year'] ?? 'N/A',
                'departments' => $campus->departments->mapWithKeys(function($dept) use (&$maxPlacementYear) {
                    $placementStats = is_array($dept->placement_statistics) ? $dept->placement_statistics : [];
                    $latestPlacement = count($placementStats) > 0 
                        ? end($placementStats) 
                        : [];
                        
                    if (isset($latestPlacement['year']) && is_numeric($latestPlacement['year'])) {
                        $maxPlacementYear = max($maxPlacementYear, $latestPlacement['year']);
                    }

                    $reviewsList = is_array($dept->college_reviews) ? $dept->college_reviews : [];
                    $reviews = count($reviewsList) > 0 ? end($reviewsList) : [];
                    return [$dept->id => [
                        'name' => $dept->department_name,
                        'placement_year' => $latestPlacement['year'] ?? 'N/A',
                        'rating_infrastructure' => $reviews['infrastructure'] ?? 'N/A',
                        'rating_campus_life' => $reviews['campus_life'] ?? 'N/A',
                        'rating_academics' => $reviews['academics'] ?? 'N/A',
                        'rating_placements' => $reviews['placements'] ?? 'N/A',
                        'rating_value_for_money' => $reviews['value_for_money'] ?? 'N/A',
                        'total_reviews' => count($reviewsList) > 0 ? count($reviewsList) : 'N/A',
                        'individual_reviews' => [],
                        'dept_students_placed' => $latestPlacement['dept_students_placed'] ?? 'N/A',
                        'dept_graduating_students' => $latestPlacement['dept_graduating_students'] ?? 'N/A',
                        'dept_placement_percentage' => isset($latestPlacement['dept_placement_percentage']) ? $latestPlacement['dept_placement_percentage'] . '%' : 'N/A',
                        'dept_median_salary' => isset($latestPlacement['dept_median_salary']) ? '₹' . $latestPlacement['dept_median_salary'] . ' LPA' : 'N/A',
                        'dept_higher_studies' => $latestPlacement['dept_higher_studies'] ?? 'N/A',
                        'overall_students_placed' => $latestPlacement['overall_students_placed'] ?? 'N/A',
                        'overall_graduating_students' => $latestPlacement['overall_graduating_students'] ?? 'N/A',
                        'overall_placement_percentage' => isset($latestPlacement['overall_placement_percentage']) ? $latestPlacement['overall_placement_percentage'] . '%' : 'N/A',
                        'overall_median_salary' => isset($latestPlacement['overall_median_salary']) ? '₹' . $latestPlacement['overall_median_salary'] . ' LPA' : 'N/A',
                        'overall_higher_studies' => $latestPlacement['overall_higher_studies'] ?? 'N/A',
                        'courses' => $dept->courses->map(function($c) {
                            return [
                                'id' => $c->id,
                                'name' => $c->course->name ?? 'N/A',
                                'course_credential' => $c->programLevel->name ?? ($c->course->programLevel->name ?? 'N/A'),
                                'degree' => $c->course->name ?? 'N/A',
                                'branch' => $c->specialization->name ?? ($c->course->discipline->name ?? 'N/A'),
                                'duration' => $c->duration ? $c->duration . ' Years' : ($c->course->duration ? $c->course->duration . ' Years' : 'N/A'),
                                'mode' => $c->mode ?? 'N/A',
                                'approved_intake' => $c->student_strength ?? 'N/A',
                                'fees' => $c->total_fees ? '₹ ' . $c->total_fees : ($c->fees ? '₹ ' . $c->fees : 'N/A'),
                                'exams_accepted' => $c->entranceExam->name ?? 'N/A',
                                'course_approval' => 'N/A',
                                'admission_details' => strip_tags($c->admission_process) ?: 'N/A',
                                'eligibility_criteria' => strip_tags($c->eligibility) ?: 'N/A',
                                'fees_structure' => strip_tags($c->fees_structure) ?: 'N/A',
                                'curriculum' => strip_tags($c->curriculum) ?: 'N/A',
                                'career_prospects' => strip_tags($c->career_prospects) ?: 'N/A',
                                'placement_details' => strip_tags($c->placement_details) ?: 'N/A',
                                'industrial_collaboration' => strip_tags($c->industrial_collaboration) ?: 'N/A',
                                'internship_ranking' => strip_tags($c->internship_ranking) ?: 'N/A',
                                'total_scholarships' => 'N/A',
                                'highest_scholarship_authority' => 'N/A'
                            ];
                        })
                    ]];
                })
            ]];

            if (isset($cp['year']) && is_numeric($cp['year'])) {
                $maxClassProfileYear = max($maxClassProfileYear, $cp['year']);
            }

            return $mapped;
        });

        $maxClassProfileYear = $maxClassProfileYear ?: 'N/A';
        $maxPlacementYear = $maxPlacementYear ?: 'N/A';
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = @json($compData);

            const campusSelectors = document.querySelectorAll('.campus-selector');
            const deptSelectors = document.querySelectorAll('.dept-selector');
            const courseSelectors = document.querySelectorAll('.course-selector');
            
            const resultsDiv = document.getElementById('comparisonResults');
            const emptyMessage = document.getElementById('emptyMessage');
            const paramTabs = document.getElementById('paramTabs');
            const matrixHead = document.getElementById('matrixHead');
            const matrixBody = document.getElementById('matrixBody');
            const resetBtn = document.getElementById('resetComparison');

            const params = [
                { isSectionHeader: true, label: 'Quick Facts' },
                { label: 'Location', key: 'location', icon: 'fas fa-map-marker-alt' },
                { label: 'Ownership', key: 'ownership', icon: 'fas fa-building' },
                { label: 'Type Of Institute', key: 'type_of_institute', icon: 'fas fa-university' },
                { label: 'College Type', key: 'college_type', icon: 'fas fa-graduation-cap' },
                { label: 'Establishment Year', key: 'establishment_year', icon: 'fas fa-calendar-alt' },
                { label: 'Campus Size', key: 'campus_size', icon: 'fas fa-expand-arrows-alt' },
                { label: 'Total Courses Offered', key: 'total_courses_offered', icon: 'fas fa-book' },
                { isSectionHeader: true, label: 'Ranking & Accreditations' },
                { label: 'University Rank', key: 'c360_rank', icon: 'fas fa-trophy' },
                { label: 'Rating (Engg & Arch)', key: 'c360_rating', icon: 'fas fa-star' },
                { label: 'NIRF Rank (Overall)', key: 'nirf_overall', icon: 'fas fa-award' },
                { label: 'NIRF Rank (Engg & Arch)', key: 'nirf_category', icon: 'fas fa-award' },
                { label: 'Approvals', key: 'approvals', icon: 'fas fa-check-circle' },
                { label: 'Accreditations', key: 'accreditations', icon: 'fas fa-certificate' },
                { isSectionHeader: true, label: 'Placement Statistics', subtitle: `Data presented for the year ${@json($maxPlacementYear)}` },
                { label: 'Data Year', key: 'placement_year', icon: 'fas fa-calendar-alt' },
                { label: 'Total Students Placed (In Engineering and Architecture)', key: 'dept_students_placed', icon: 'fas fa-user-check' },
                { label: 'Graduating Students (In Engineering and Architecture)', key: 'dept_graduating_students', icon: 'fas fa-user-graduate' },
                { label: 'Placement Percentage (In Engineering and Architecture)', key: 'dept_placement_percentage', icon: 'fas fa-percent' },
                { label: 'Median Salary LPA (In Engineering and Architecture)', key: 'dept_median_salary', icon: 'fas fa-rupee-sign' },
                { label: 'Student Going Higher Studies (In Engineering and Architecture)', key: 'dept_higher_studies', icon: 'fas fa-book-reader' },
                { label: 'Graduating Students (overall)', key: 'overall_graduating_students', icon: 'fas fa-user-graduate' },
                { label: 'Total Students Placed (overall)', key: 'overall_students_placed', icon: 'fas fa-user-check' },
                { label: 'Placement Percentage (overall)', key: 'overall_placement_percentage', icon: 'fas fa-percent' },
                { label: 'Median Salary Lpa (overall)', key: 'overall_median_salary', icon: 'fas fa-rupee-sign' },
                { label: 'Student Going Higher Studies (overall)', key: 'overall_higher_studies', icon: 'fas fa-book-reader' },
                { isSectionHeader: true, label: 'Course & Fees Details' },
                { label: 'Course Credential', key: 'course_credential', icon: 'fas fa-graduation-cap' },
                { label: 'Degree', key: 'degree', icon: 'fas fa-user-graduate' },
                { label: 'Branch', key: 'branch', icon: 'fas fa-code-branch' },
                { label: 'Duration', key: 'duration', icon: 'fas fa-clock' },
                { label: 'Mode', key: 'mode', icon: 'fas fa-laptop-house' },
                { label: 'Approved Intake', key: 'approved_intake', icon: 'fas fa-users' },
                { label: 'Fees', key: 'fees', icon: 'fas fa-rupee-sign' },
                { label: 'Exams Accepted', key: 'exams_accepted', icon: 'fas fa-file-alt' },
                { label: 'Course Approval', key: 'course_approval', icon: 'fas fa-check-double' },
                { label: 'Admission Details', key: 'admission_details', icon: 'fas fa-info-circle' },
                { label: 'Eligibility Criteria', key: 'eligibility_criteria', icon: 'fas fa-list-ul' },
                { label: 'Fees Structure', key: 'fees_structure', icon: 'fas fa-file-invoice-dollar' },
                { label: 'Curriculum', key: 'curriculum', icon: 'fas fa-book-open' },
                { label: 'Career Prospects', key: 'career_prospects', icon: 'fas fa-chart-line' },
                { label: 'Placement Details', key: 'placement_details', icon: 'fas fa-user-tie' },
                { label: 'Industrial Collaboration', key: 'industrial_collaboration', icon: 'fas fa-handshake' },
                { label: 'Internship Ranking', key: 'internship_ranking', icon: 'fas fa-medal' },
                { isSectionHeader: true, label: 'Fees' },
                { label: 'Total Fees', key: 'fees', icon: 'fas fa-money-bill-wave' },
                { label: 'Total Scholarships Provided', key: 'total_scholarships', icon: 'fas fa-hand-holding-usd' },
                { label: 'Highest Scholarship Providing Authority', key: 'highest_scholarship_authority', icon: 'fas fa-university' },
                { isSectionHeader: true, label: 'Class Profile', subtitle: `Data presented for the year ${@json($maxClassProfileYear)}` },
                { label: 'Data Year', key: 'class_profile_year', icon: 'fas fa-calendar-alt' },
                { label: 'Total Students', key: 'total_students', icon: 'fas fa-users' },
                { label: 'Total Faculty', key: 'total_faculty', icon: 'fas fa-chalkboard-teacher' },
                { label: 'Total Male Students', key: 'total_male_students', icon: 'fas fa-male' },
                { label: 'Total Female Students', key: 'total_female_students', icon: 'fas fa-female' },
                { label: 'Total Students Outside State', key: 'total_students_outside_state', icon: 'fas fa-globe' },
                { isSectionHeader: true, label: 'Facilities' }
            ];

            const masterFacilities = @json($allFacilities);
            masterFacilities.forEach(f => {
                params.push({
                    label: f.name,
                    key: 'facility_' + f.id,
                    icon: f.icon || 'fas fa-check'
                });
            });

            params.push(
                { isSectionHeader: true, label: 'College Reviews & Perception' },
                { label: 'College Infrastructure', key: 'rating_infrastructure', icon: 'fas fa-building', isRating: true },
                { label: 'Campus Life', key: 'rating_campus_life', icon: 'fas fa-users', isRating: true },
                { label: 'Academics', key: 'rating_academics', icon: 'fas fa-book', isRating: true },
                { label: 'Placements', key: 'rating_placements', icon: 'fas fa-briefcase', isRating: true },
                { label: 'Value for Money', key: 'rating_value_for_money', icon: 'fas fa-wallet', isRating: true },
                { label: 'Total Reviews', key: 'total_reviews', icon: 'fas fa-comment-dots' },
                { label: 'Individual Reviews', key: 'individual_reviews', icon: 'fas fa-comments', isReview: true }
            );

            let selections = { 1: null, 2: null, 3: null, 4: null };

            // 1. Campus Change -> Populate Departments
            campusSelectors.forEach(select => {
                select.addEventListener('change', function () {
                    const slot = this.getAttribute('data-slot');
                    const campusId = this.value;
                    const deptSelect = document.querySelector(`.dept-selector[data-slot="${slot}"]`);
                    const courseSelect = document.querySelector(`.course-selector[data-slot="${slot}"]`);
                    
                    deptSelect.innerHTML = '<option value="">Select Department</option>';
                    courseSelect.innerHTML = '<option value="">Select Course</option>';
                    deptSelect.disabled = true;
                    courseSelect.disabled = true;
                    selections[slot] = null;
                    this.closest('.compare-card').classList.remove('active-slot');

                    if (campusId && data[campusId]) {
                        deptSelect.disabled = false;
                        const depts = data[campusId].departments;
                        Object.keys(depts).forEach(deptId => {
                            const option = document.createElement('option');
                            option.value = deptId;
                            option.textContent = depts[deptId].name;
                            deptSelect.appendChild(option);
                        });
                    }
                    
                    updateComparison();
                });
            });

            // 2. Department Change -> Populate Courses
            deptSelectors.forEach(select => {
                select.addEventListener('change', function () {
                    const slot = this.getAttribute('data-slot');
                    const campusId = document.querySelector(`.campus-selector[data-slot="${slot}"]`).value;
                    const deptId = this.value;
                    const courseSelect = document.querySelector(`.course-selector[data-slot="${slot}"]`);

                    courseSelect.innerHTML = '<option value="">Select Course</option>';
                    courseSelect.disabled = true;
                    selections[slot] = null;
                    this.closest('.compare-card').classList.remove('active-slot');

                    if (campusId && deptId && data[campusId].departments[deptId]) {
                        courseSelect.disabled = false;
                        const courses = data[campusId].departments[deptId].courses;
                        courses.forEach(course => {
                            const option = document.createElement('option');
                            option.value = course.id;
                            option.textContent = course.name;
                            courseSelect.appendChild(option);
                        });
                    }

                    updateComparison();
                });
            });

            // 3. Course Change -> Set Selection
            courseSelectors.forEach(select => {
                select.addEventListener('change', function () {
                    const slot = this.getAttribute('data-slot');
                    const campusId = document.querySelector(`.campus-selector[data-slot="${slot}"]`).value;
                    const deptId = document.querySelector(`.dept-selector[data-slot="${slot}"]`).value;
                    const courseId = this.value;

                    if (campusId && deptId && courseId) {
                        const campus = data[campusId];
                        const dept = campus.departments[deptId];
                        const courseData = dept.courses.find(c => c.id == courseId);
                        
                        this.closest('.compare-card').classList.add('active-slot');
                        let rowData = { 
                            campusName: campus.name,
                            deptName: dept.name,
                            location: campus.location,
                            ownership: campus.ownership,
                            type_of_institute: campus.type_of_institute,
                            college_type: campus.college_type,
                            establishment_year: campus.establishment_year,
                            campus_size: campus.campus_size,
                            total_courses_offered: campus.total_courses_offered,
                            c360_rank: campus.c360_rank,
                            c360_rating: campus.c360_rating,
                            nirf_overall: campus.nirf_overall,
                            nirf_category: campus.nirf_category,
                            approvals: campus.approvals,
                            accreditations: campus.accreditations,
                            class_profile_year: campus.class_profile_year,
                            total_students: campus.total_students,
                            total_faculty: campus.total_faculty,
                            total_male_students: campus.total_male_students,
                            total_female_students: campus.total_female_students,
                            total_students_outside_state: campus.total_students_outside_state,
                            placement_year: dept.placement_year,
                            dept_students_placed: dept.dept_students_placed,
                            dept_graduating_students: dept.dept_graduating_students,
                            dept_placement_percentage: dept.dept_placement_percentage,
                            dept_median_salary: dept.dept_median_salary,
                            dept_higher_studies: dept.dept_higher_studies,
                            overall_students_placed: dept.overall_students_placed,
                            overall_graduating_students: dept.overall_graduating_students,
                            overall_placement_percentage: dept.overall_placement_percentage,
                            overall_median_salary: dept.overall_median_salary,
                            overall_higher_studies: dept.overall_higher_studies,
                            rating_infrastructure: dept.rating_infrastructure,
                            rating_campus_life: dept.rating_campus_life,
                            rating_academics: dept.rating_academics,
                            rating_placements: dept.rating_placements,
                            rating_value_for_money: dept.rating_value_for_money,
                            total_reviews: dept.total_reviews,
                            individual_reviews: dept.individual_reviews,
                            ...courseData 
                        };

                        masterFacilities.forEach(f => {
                            if (campus.facilities && campus.facilities.includes(f.id)) {
                                rowData['facility_' + f.id] = '<i class="fas fa-check text-success fs-5"></i>';
                            } else {
                                rowData['facility_' + f.id] = '';
                            }
                        });

                        selections[slot] = rowData;
                    } else {
                        this.closest('.compare-card').classList.remove('active-slot');
                        selections[slot] = null;
                    }

                    updateComparison();
                });
            });

            function updateComparison() {
                const activeSelections = Object.values(selections).filter(s => s !== null);

                if (activeSelections.length > 0) {
                    emptyMessage.classList.add('d-none');
                    resultsDiv.classList.remove('d-none');
                    paramTabs.classList.remove('d-none');
                    renderTabs();
                    renderMatrix(activeSelections);
                } else {
                    emptyMessage.classList.remove('d-none');
                    resultsDiv.classList.add('d-none');
                    paramTabs.classList.add('d-none');
                }
            }

            function renderTabs() {
                const scrollContainer = paramTabs.querySelector('.param-tabs-scroll');
                scrollContainer.innerHTML = '';
                params.filter(p => !p.isSectionHeader).forEach(p => {
                    const btn = document.createElement('div');
                    btn.className = 'param-tab-btn';
                    btn.innerHTML = `<i class="${p.icon} me-1 small"></i> ${p.label}`;
                    btn.onclick = () => {
                        const target = document.getElementById('row-' + p.key);
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            target.style.backgroundColor = 'rgba(13, 110, 253, 0.05)';
                            setTimeout(() => target.style.backgroundColor = '', 2000);
                        }
                    };
                    scrollContainer.appendChild(btn);
                });
            }

            function renderMatrix(activeData) {
                let headHtml = `<th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>`;
                activeData.forEach(item => {
                    headHtml += `
                        <th class="matrix-org-header" style="min-width: 200px;">
                            <div class="matrix-org-badge text-truncate px-2" title="${item.campusName}">${item.campusName}</div>
                            <div class="matrix-dept-badge text-truncate px-2" title="${item.deptName}">${item.deptName}</div>
                            <div class="matrix-course-badge text-truncate px-2 mt-2" title="${item.name}">${item.name}</div>
                        </th>`;
                });
                matrixHead.innerHTML = headHtml;

                let bodyHtml = '';
                const colSpan = activeData.length + 1;
                params.forEach(p => {
                    if (p.isSectionHeader) {
                        bodyHtml += `<tr class="section-header-row" style="background-color: #f1f5f9;">
                            <td colspan="${colSpan}" class="py-3 ps-4 border-bottom-0">
                                <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">${p.label}</h4>
                                ${p.subtitle ? `<div class="small text-muted mt-1">${p.subtitle}</div>` : ''}
                            </td>
                        </tr>`;
                        return;
                    }

                    bodyHtml += `<tr id="row-${p.key}">
                        <td class="params-column ps-4">
                            <div class="d-flex align-items-center">
                                <div class="param-icon">
                                    <i class="${p.icon}"></i>
                                </div>
                                <div class="matrix-label">${p.label}</div>
                            </div>
                        </td>`;
                    activeData.forEach(item => {
                        let val = item[p.key] || 'N/A';
                        let badgeClass = '';
                        let strVal = String(val);
                        if (val !== 'N/A' && !p.isReview && !p.isRating && (strVal.includes('₹') || strVal.includes('%') || p.key.includes('rank') || p.key.includes('year'))) {
                            badgeClass = p.key.includes('rank') ? 'primary' : (strVal.includes('₹') ? 'success' : 'badge-value');
                            val = `<span class="badge-value ${badgeClass}">${val}</span>`;
                        }
                        if (p.isRating && val !== 'N/A') {
                            const starCount = Math.round(val);
                            let stars = '';
                            for(let i=1; i<=5; i++) {
                                stars += `<i class="fa${i <= starCount ? 's' : 'r'} fa-star text-warning"></i>`;
                            }
                            val = `<div class="rating-box d-flex justify-content-center align-items-center">${stars}</div>`;
                        } else if (p.isReview && Array.isArray(val) && val.length > 0) {
                            const rev = val[0];
                            let stars = '';
                            for(let i=1; i<=5; i++) {
                                stars += `<i class="fa${i <= Math.round(rev.rating || 0) ? 's' : 'r'} fa-star text-warning small"></i>`;
                            }
                            val = `<div class="text-start p-3 bg-light rounded mt-2 border">
                                <div class="mb-2">${stars}</div>
                                <p class="fst-italic mb-1 small fw-bold text-dark">" ${rev.text || ''} "</p>
                                <div class="text-muted" style="font-size: 0.75rem;">posted on ${rev.date || 'unknown'} by <strong class="text-dark">${rev.author || 'Anonymous'}</strong></div>
                                <a href="#" class="d-block mt-3 small fw-bold text-primary text-decoration-none">Read All Reviews</a>
                            </div>`;
                        } else if (p.isReview) {
                            val = '-';
                        }

                        bodyHtml += `<td>
                            <div class="matrix-value-card text-center">
                                <div class="matrix-value">${val}</div>
                            </div>
                        </td>`;
                    });
                    bodyHtml += '</tr>';
                });
                matrixBody.innerHTML = bodyHtml;
            }

            resetBtn.addEventListener('click', function() {
                campusSelectors.forEach(s => s.value = '');
                deptSelectors.forEach(s => { s.innerHTML = '<option value="">Select Department</option>'; s.disabled = true; });
                courseSelectors.forEach(s => { s.innerHTML = '<option value="">Select Course</option>'; s.disabled = true; });
                document.querySelectorAll('.compare-card').forEach(c => c.classList.remove('active-slot'));
                selections = { 1: null, 2: null, 3: null, 4: null };
                updateComparison();
            });
        });
    </script>
@endpush
