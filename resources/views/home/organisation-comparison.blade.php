<section class="comparison-section overflow-hidden py-5">
    <div class="container py-4">

        <!-- Heading -->
        <div class="text-center mb-5 position-relative">
            <div class="comparison-badge mb-3">
                <span class="badge bg-soft-primary px-4 py-2 rounded-pill shadow-sm">
                    <i class="fas fa-columns me-2"></i> Course Comparison Tool
                </span>
            </div>
            <h2 class="display-5 fw-bold main-heading mb-3">
                <span class="text-gradient">Find the Best</span> Course for Your Career
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Make an informed decision by comparing up to 4 universities side-by-side. 
                Focus on fees, ratings, placements, and more.
            </p>
        </div>

        @if($organisations->count() > 0)
            <!-- Selection Grid -->
            <div class="row g-4 mb-5">
                @for($i = 1; $i <= 4; $i++)
                    <div class="col-lg-3 col-md-6">
                        <div class="comparison-slot-card p-4 h-100">
                            <div class="slot-header mb-4 d-flex align-items-center justify-content-between">
                                <span class="slot-tag">Option {{ $i }}</span>
                                <div class="slot-icon-box">
                                    <i class="fas fa-university"></i>
                                </div>
                            </div>
                            
                            <div class="selection-controls">
                                <div class="mb-4 custom-select-group">
                                    <label class="form-label text-uppercase small ls-1 fw-bold text-muted mb-2">University</label>
                                    <select class="form-select org-selector" data-slot="{{ $i }}">
                                        <option value="">Choose Institution</option>
                                        @foreach($organisations as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-0 custom-select-group">
                                    <label class="form-label text-uppercase small ls-1 fw-bold text-muted mb-2">Program</label>
                                    <select class="form-select course-selector" data-slot="{{ $i }}" disabled>
                                        <option value="">Select Course</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Parameters Quick Access -->
            <div id="paramTabs" class="param-tabs-wrapper mb-4 d-none">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-filter me-2 text-primary"></i>
                    <span class="fw-bold small text-uppercase">Quick Jump</span>
                </div>
                <div class="param-tabs-scroll d-flex gap-2">
                    <!-- Tabs will be injected here -->
                </div>
            </div>

            <!-- Comparison Matrix -->
            <div id="comparisonResults" class="comparison-matrix-wrapper d-none shadow-premium rounded-4 overflow-hidden border-0">
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
                
                <div class="text-center py-5 bg-light-soft border-top">
                    <button id="resetComparison" class="btn btn-dark rounded-pill px-5 py-2 shadow-sm">
                        <i class="fas fa-undo me-2"></i> Reset Comparison
                    </button>
                    <p class="mt-3 mb-0 small text-muted">Changed your mind? Start a new comparison instantly.</p>
                </div>
            </div>

            <!-- Empty State -->
            <!-- <div id="emptyMessage" class="empty-comparison-state py-5 text-center">
                <div class="icon-pulse mb-4 mx-auto">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h4 class="fw-bold">Ready to Compare?</h4>
                <p class="text-muted mx-auto" style="max-width: 400px;">
                    Select universities and courses from the cards above to generate a side-by-side comparison report.
                </p>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <div class="selection-hint"><i class="fas fa-check-circle me-1"></i> Transparent Fees</div>
                    <div class="selection-hint"><i class="fas fa-check-circle me-1"></i> Verified Ratings</div>
                </div>
            </div> -->
            <div id="emptyMessage">
                
            </div>

        @else
            <div class="text-center py-5">
                <div class="spinner-grow text-primary mb-3" role="status"></div>
                <p class="text-muted fw-500">Updating our university database...</p>
            </div>
        @endif

    </div>
</section>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #805cd8 0%, #6e34ff 100%);
        --soft-primary: rgba(128, 92, 216, 0.08);
        --premium-shadow: 0 15px 35px rgba(128, 92, 216, 0.1);
        --bg-light-soft: #fcfdfe;
    }

    .comparison-section {
        background: 
            radial-gradient(circle at 10% 20%, rgba(128, 92, 216, 0.05) 0%, transparent 40%),
            radial-gradient(circle at 90% 80%, rgba(110, 52, 255, 0.05) 0%, transparent 40%),
            linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%);
        border: 2px solid var(--themeprimaryclr);
        position: relative;
    }

    .comparison-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, rgba(128, 92, 216, 0.02), transparent);
    }

    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .bg-soft-primary {
        background: var(--soft-primary);
        color: #805cd8;
        border: 1px solid rgba(128, 92, 216, 0.2);
    }

    /* Selection Cards */
    .comparison-slot-card {
        background: rgba(255, 255, 255, 0.9);
        border: 2px dashed #e2e8f0;
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .comparison-slot-card::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .comparison-slot-card:hover {
        transform: translateY(-10px);
        border-color: rgba(128, 92, 216, 0.3);
        box-shadow: var(--premium-shadow);
    }

    .comparison-slot-card.active-slot {
        background: #fff;
        border: 2px solid #805cd8;
        border-bottom-width: 6px;
    }

    .comparison-slot-card.active-slot::after {
        transform: scaleX(1);
    }

    .slot-tag {
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #805cd8;
        background: rgba(128, 92, 216, 0.1);
        padding: 5px 15px;
        border-radius: 50px;
    }

    .slot-icon-box {
        width: 40px;
        height: 40px;
        background: #f1f5f9;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .active-slot .slot-icon-box {
        background: var(--primary-gradient);
        color: #fff;
        transform: rotate(360deg);
    }

    .form-select.org-selector, .form-select.course-selector {
        border-radius: 15px;
        padding: 12px 18px;
        font-size: 0.95rem;
        border: 2px solid #f1f5f9;
        background-color: #f8fafc;
        transition: all 0.2s;
        font-weight: 500;
    }

    .form-select:focus {
        border-color: #805cd8;
        box-shadow: 0 0 0 4px rgba(128, 92, 216, 0.15);
        background: #fff;
    }

    /* Tabs */
    .param-tabs-scroll::-webkit-scrollbar { height: 0; }
    
    .param-tab-btn {
        background: #fff;
        border: 1px solid #e2e8f0;
        padding: 10px 24px;
        border-radius: 100px;
        font-size: 0.85rem;
        font-weight: 700;
        color: #64748b;
        cursor: pointer;
        transition: all 0.3s;
        white-space: nowrap;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .param-tab-btn:hover {
        background: var(--primary-gradient);
        border-color: transparent;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(128, 92, 216, 0.3);
    }

    /* Matrix Table */
    .comparison-matrix-wrapper {
        background: #fff;
        border: 1px solid #e2e8f0 !important;
    }

    .comparison-matrix-table thead th {
        border-bottom: 0;
        background: #1e293b;
        color: #fff;
        vertical-align: middle;
    }

    .params-column {
        min-width: 300px;
        background: #fff !important;
        position: sticky;
        left: 0;
        z-index: 5;
        border-right: 2px solid #f1f5f9;
    }

    .matrix-org-header {
        min-width: 280px;
        padding: 30px 24px;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,0.1);
        background: var(--primary-gradient) !important;
    }

    .matrix-org-badge {
        font-size: 1.2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 8px;
        line-height: 1.2;
    }

    .matrix-course-badge {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        background: rgba(255, 255, 255, 0.15);
        padding: 4px 14px;
        border-radius: 6px;
        display: inline-block;
        backdrop-filter: blur(4px);
    }

    .comparison-matrix-table tbody tr {
        transition: all 0.3s;
    }

    .comparison-matrix-table tbody tr:nth-child(even) {
        background: #f8fafc;
    }

    .comparison-matrix-table tbody tr:hover {
        background: rgba(128, 92, 216, 0.03);
    }

    .comparison-matrix-table td {
        padding: 24px;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
        color: #334155;
        font-size: 1rem;
    }

    .matrix-label {
        color: #0f172a;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.75px;
    }

    .matrix-value-card {
        padding: 0;
        background: transparent;
        border: none;
    }

    .matrix-value {
        font-weight: 600;
        color: #334155;
    }

    /* Rating stars */
    .rating-box {
        display: inline-flex;
        align-items: center;
        background: #fff;
        padding: 6px 14px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
    }

    /* Empty State */
    .icon-pulse {
        width: 100px;
        height: 100px;
        background: var(--soft-primary);
        color: #805cd8;
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        animation: pulse 2.5s infinite;
        transform: rotate(-10deg);
    }

    @keyframes pulse {
        0% { transform: scale(1) rotate(-10deg); box-shadow: 0 0 0 0 rgba(128, 92, 216, 0.4); }
        70% { transform: scale(1.05) rotate(-5deg); box-shadow: 0 0 0 30px rgba(128, 92, 216, 0); }
        100% { transform: scale(1) rotate(-10deg); box-shadow: 0 0 0 0 rgba(128, 92, 216, 0); }
    }

    .shadow-premium {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 991px) {
        .params-column {
            position: relative;
            min-width: 200px;
        }
    }
</style>

@push('js')
    @php
        $compData = $organisations->mapWithKeys(function($org) {
            return [$org->id => [
                'name' => $org->name,
                'courses' => $org->courses->map(function($c) {
                    return [
                        'id' => $c->id,
                        'name' => $c->course->name ?? 'N/A',
                        'fee' => $c->fees ?? 'N/A',
                        'mode' => $c->mode ?? 'N/A',
                        'duration' => $c->duration ?? 'N/A',
                        'rating' => $c->rating ?? 0,
                        'placement' => strip_tags($c->placement_details) ?: 'N/A',
                        'eligibility' => strip_tags($c->eligibility) ?: 'N/A',
                        'admission' => strip_tags($c->admission_process) ?: 'N/A',
                        'roi' => $c->roi ?: 'N/A',
                        'industrial' => strip_tags($c->industrial_collaboration) ?: 'N/A',
                        'internship' => $c->internship_ranking ?: 'N/A'
                    ];
                })
            ]];
        });
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const orgData = @json($compData);

            const orgSelectors = document.querySelectorAll('.org-selector');
            const courseSelectors = document.querySelectorAll('.course-selector');
            const resultsDiv = document.getElementById('comparisonResults');
            const emptyMessage = document.getElementById('emptyMessage');
            const paramTabs = document.getElementById('paramTabs');
            const matrixHead = document.getElementById('matrixHead');
            const matrixBody = document.getElementById('matrixBody');
            const resetBtn = document.getElementById('resetComparison');

            const params = [
                { label: 'Mode of Study', key: 'mode', icon: 'fas fa-laptop-house' },
                { label: 'Total Fees', key: 'fee', icon: 'fas fa-money-bill-wave' },
                { label: 'Duration', key: 'duration', icon: 'fas fa-clock' },
                { label: 'Rating', key: 'rating', isRating: true, icon: 'fas fa-star' },
                { label: 'Eligibility', key: 'eligibility', icon: 'fas fa-user-check' },
                { label: 'Admission Process', key: 'admission', icon: 'fas fa-file-signature' },
                { label: 'Placement', key: 'placement', icon: 'fas fa-briefcase' },
                { label: 'ROI', key: 'roi', icon: 'fas fa-chart-line' },
                { label: 'Ind. Collaboration', key: 'industrial', icon: 'fas fa-handshake' },
                { label: 'Internship Rank', key: 'internship', icon: 'fas fa-medal' }
            ];

            let selections = { 1: null, 2: null, 3: null, 4: null };

            orgSelectors.forEach(select => {
                select.addEventListener('change', function () {
                    const slot = this.getAttribute('data-slot');
                    const orgId = this.value;
                    const courseSelect = document.querySelector(`.course-selector[data-slot="${slot}"]`);
                    
                    courseSelect.innerHTML = '<option value="">Select Course</option>';
                    selections[slot] = null;

                    if (orgId && orgData[orgId]) {
                        courseSelect.disabled = false;
                        this.closest('.comparison-slot-card').classList.add('active-slot');
                        
                        orgData[orgId].courses.forEach(course => {
                            const option = document.createElement('option');
                            option.value = course.id;
                            option.textContent = course.name;
                            courseSelect.appendChild(option);
                        });
                    } else {
                        courseSelect.disabled = true;
                        this.closest('.comparison-slot-card').classList.remove('active-slot');
                    }
                    
                    updateComparison();
                });
            });

            courseSelectors.forEach(select => {
                select.addEventListener('change', function () {
                    const slot = this.getAttribute('data-slot');
                    const courseId = this.value;
                    const orgId = document.querySelector(`.org-selector[data-slot="${slot}"]`).value;

                    if (courseId && orgId) {
                        const courseData = orgData[orgId].courses.find(c => c.id == courseId);
                        selections[slot] = { 
                            orgName: orgData[orgId].name, 
                            ...courseData 
                        };
                    } else {
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
                params.forEach(p => {
                    const btn = document.createElement('div');
                    btn.className = 'param-tab-btn';
                    btn.innerHTML = `<i class="${p.icon} me-1 small"></i> ${p.label}`;
                    btn.onclick = () => {
                        const target = document.getElementById('row-' + p.key);
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            target.style.backgroundColor = 'rgba(128, 92, 216, 0.05)';
                            setTimeout(() => target.style.backgroundColor = '', 2000);
                        }
                    };
                    scrollContainer.appendChild(btn);
                });
            }

            function renderMatrix(data) {
                let headHtml = `<th class="params-column py-4 ps-4">
                                    <div class="fs-5 fw-bold text-dark">Comparison</div>
                                    <div class="small text-muted fw-normal">Key Performance Indicators</div>
                                </th>`;
                data.forEach(item => {
                    headHtml += `
                        <th class="matrix-org-header">
                            <div class="matrix-org-badge text-truncate px-2">${item.orgName}</div>
                            <div class="matrix-course-badge text-truncate px-2">${item.name}</div>
                        </th>`;
                });
                matrixHead.innerHTML = headHtml;

                let bodyHtml = '';
                params.forEach(p => {
                    bodyHtml += `<tr id="row-${p.key}">
                        <td class="params-column ps-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle me-3 bg-light text-primary d-none d-lg-flex" style="width:30px;height:30px;border-radius:50%;align-items:center;justify-content:center;font-size:0.8rem;">
                                    <i class="${p.icon}"></i>
                                </div>
                                <div class="matrix-label">${p.label}</div>
                            </div>
                        </td>`;
                    data.forEach(item => {
                        let val = item[p.key] || 'N/A';
                        if (p.isRating) {
                            const starCount = Math.round(val);
                            let stars = '';
                            for(let i=1; i<=5; i++) {
                                stars += `<i class="fa${i <= starCount ? 's' : 'r'} fa-star text-warning"></i>`;
                            }
                            val = `<div class="rating-box">${stars} <span class="ms-1 text-dark fw-bold">${val}</span></div>`;
                        }
                        bodyHtml += `<td>
                            <div class="matrix-value-card">
                                <div class="matrix-value">${val}</div>
                            </div>
                        </td>`;
                    });
                    bodyHtml += '</tr>';
                });
                matrixBody.innerHTML = bodyHtml;
            }

            resetBtn.addEventListener('click', function() {
                orgSelectors.forEach(s => s.value = '');
                courseSelectors.forEach(s => {
                    s.innerHTML = '<option value="">Select Course</option>';
                    s.disabled = true;
                });
                document.querySelectorAll('.comparison-slot-card').forEach(c => c.classList.remove('active-slot'));
                selections = { 1: null, 2: null, 3: null, 4: null };
                updateComparison();
            });
        });
    </script>
@endpush