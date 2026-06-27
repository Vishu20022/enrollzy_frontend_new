@extends('layouts.master')

@section('title', 'Career Roadmap - Enrollzy')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="career-roadmap-wrapper pb-5 pt-4">
    <div class="container custom-container">
        
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4" id="dynamic-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Career roadmap</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-4">
            <h2 class="fw-bold mb-1 heading-title text-dark" id="dynamic-heading">Select your current class</h2>
            <p class="text-muted fs-6 mb-0">Showing paths for parents — career planning from early stage</p>
        </div>

        <!-- Categories & Stages -->
        <div class="mb-5">
            @foreach($categories as $category)
            <div class="category-section mb-3">
                <div class="d-flex align-items-center mb-3">
                    <span class="category-label fw-bold text-muted text-uppercase">{{ $category->name }}</span>
                    <div class="flex-grow-1 ms-3" style="border-top: 1px solid #e5e7eb;"></div>
                </div>
                
                <div class="d-flex flex-wrap gap-2">
                    @foreach($category->stages as $stage)
                    <button type="button" class="btn btn-stage px-4 py-2" data-stage-id="{{ $stage->id }}" data-stage-title="{{ $stage->title }}">
                        {{ $stage->title }}
                    </button>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Streams Section (Hidden Initially) -->
        <div id="streams-section" class="mb-5 fade-in" style="display: none;">
            <div class="mb-3">
                <h5 class="fw-bold mb-0 text-dark">Choose your stream or interest area</h5>
                <p class="text-muted small mb-0">Select the path you are currently on or planning to pursue</p>
            </div>
            
            <div class="row g-3" id="streams-container">
                <!-- Streams will be injected here via AJAX -->
            </div>
        </div>

        <!-- Timelines Section (Hidden Initially) -->
        <div id="timeline-section" class="fade-in pb-5" style="display: none;">
            
            <!-- Blue Alert Message -->
            <div id="stream-alert" class="alert alert-primary d-flex align-items-center border-0 rounded-3 mb-4" role="alert" style="display: none; background-color: #f0fdfa; color: #0f766e; border: 1px solid #ccfbf1 !important;">
                <i class="fas fa-info-circle fs-5 me-3"></i>
                <div id="stream-alert-text" class="fw-medium small"></div>
            </div>

            <!-- Vertical Timeline container -->
            <div class="timeline-container-wrapper pt-2">
                <div id="timeline-container" class="position-relative" style="border-left: 2px solid #e5e7eb; padding-left: 2rem; margin-left: 0.5rem;">
                    <!-- Timeline Groups will be injected here -->
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .career-roadmap-wrapper {
        font-family: 'Inter', sans-serif;
        min-height: calc(100vh - 80px);
        background-color: #ffffff;
    }
    .custom-container {
        max-width: 800px;
    }
    
    .text-dark { color: #111827 !important; }
    .text-muted { color: #6b7280 !important; }
    
    .breadcrumb { font-size: 0.85rem; }
    .breadcrumb-item a { color: #6b7280; }
    
    .heading-title {
        font-size: 1.5rem;
        letter-spacing: -0.02em;
    }

    .category-label { 
        font-size: 0.7rem; 
        color: #6b7280;
        letter-spacing: 0.05em;
    }

    /* Stages Buttons */
    .btn-stage {
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        color: #374151;
        font-weight: 500;
        font-size: 0.85rem;
        border-radius: 8px;
        transition: all 0.15s ease;
    }
    .btn-stage:hover {
        border-color: #9ca3af;
        background-color: #f9fafb;
    }
    .btn-stage.active {
        background-color: #f3f4f6;
        border-color: #6b7280;
        color: #111827;
        font-weight: 600;
    }

    /* Streams */
    .stream-card {
        cursor: pointer;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all 0.15s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 1.25rem;
    }
    .stream-card:hover {
        border-color: #d1d5db;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
    .stream-card.active {
        background-color: #f0f9ff;
        border-color: #0284c7;
    }
    .stream-card.active .stream-title, .stream-card.active .stream-icon {
        color: #0369a1 !important;
    }
    .stream-icon {
        color: #4b5563;
        font-size: 1.1rem;
        margin-bottom: 0.75rem;
    }
    .stream-title {
        font-size: 0.9rem;
        color: #111827;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    .stream-desc {
        font-size: 0.75rem;
        color: #6b7280;
        line-height: 1.4;
    }

    /* Timeline */
    .timeline-group {
        position: relative;
        margin-bottom: 2.5rem;
    }
    .timeline-group:last-child {
        margin-bottom: 0;
    }
    .timeline-dot {
        position: absolute;
        left: -39px; 
        top: 6px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background-color: #d1d5db;
        border: 2px solid #fff;
        box-shadow: 0 0 0 3px rgba(255,255,255,1);
    }
    .dot-blue { background-color: #3b82f6 !important; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2); }
    .dot-green { background-color: #10b981 !important; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2); }
    .dot-purple { background-color: #8b5cf6 !important; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2); }
    .dot-orange { background-color: #f59e0b !important; box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2); }

    .timeline-group-title {
        font-size: 1rem;
        color: #111827;
    }
    
    .action-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.25rem;
        transition: all 0.15s;
    }
    .action-card:hover {
        border-color: #d1d5db;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
    .action-card.has-children {
        cursor: pointer;
    }
    .action-card.has-children:hover {
        border-color: #0284c7;
        background-color: #f8fafc;
    }
    .action-title {
        font-size: 0.9rem;
        color: #111827;
    }
    .salary-text {
        font-size: 0.75rem;
        color: #1f2937;
        background: #fffbeb;
        border: 1px solid #fde68a;
        padding: 6px 12px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        font-weight: 500;
    }

    /* Badges */
    .badge-soft-primary { background: #eff6ff; color: #2563eb; }
    .badge-soft-success { background: #ecfdf5; color: #059669; }
    .badge-soft-warning { background: #fffbeb; color: #d97706; }
    .badge-soft-purple { background: #f5f3ff; color: #7c3aed; }
    .badge-soft-secondary { background: #f3f4f6; color: #4b5563; border: 1px solid #e5e7eb; font-weight: 500; }

    /* Long Description Content Styling */
    .long-description-content b, 
    .long-description-content strong {
        font-weight: bold !important;
    }
    .long-description-content i, 
    .long-description-content em {
        font-style: italic !important;
    }
    .long-description-content u {
        text-decoration: underline !important;
    }
    .long-description-content p {
        margin-bottom: 0.5rem;
    }
    .long-description-content p:last-child {
        margin-bottom: 0;
    }
    .long-description-content ul, 
    .long-description-content ol {
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
    }
    .long-description-content li {
        margin-bottom: 0.25rem;
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 0.3s ease forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

@push('js')
<script>
    let cardChildrenMap = {};

    window.showNestedRow = function(e, groupId, cardId) {
        e.stopPropagation();
        const data = cardChildrenMap[cardId];
        if(!data || !data.children || !data.children.length) return;

        const container = document.getElementById('group-nested-' + groupId);
        
        // If clicking the same card that is already open, just toggle it
        if (container.dataset.activeCard == cardId && !container.classList.contains('d-none')) {
            container.classList.add('d-none');
            document.querySelector('.toggle-icon-' + cardId).classList.replace('fa-chevron-up', 'fa-chevron-down');
            return;
        }

        // Reset all icons in this group
        document.querySelectorAll(`#group-row-${groupId} .fa-chevron-up`).forEach(icon => {
            icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
        });

        // Set active
        container.dataset.activeCard = cardId;
        container.classList.remove('d-none');
        document.querySelector('.toggle-icon-' + cardId).classList.replace('fa-chevron-down', 'fa-chevron-up');

        let html = `
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-level-down-alt text-primary opacity-50 me-2" style="transform: rotate(180deg) scaleX(-1);"></i>
                <h6 class="fw-bold mb-0 text-dark">Details for: <span class="text-primary">${data.title}</span></h6>
            </div>
            <div class="row g-3">
        `;

        data.children.forEach(sub => {
            let cf = sub.custom_fields;
            if(typeof cf === 'string') {
                try { cf = JSON.parse(cf); } catch(e) { cf = {}; }
            }
            const badge = cf ? cf.Badge : null;
            const salary = cf ? cf.Salary : null;

            let badgeClass = 'badge-soft-primary';
            if(badge) {
                const bLow = badge.toLowerCase();
                if(bLow.includes('prep') || bLow.includes('merit') || bLow.includes('success')) badgeClass = 'badge-soft-success';
                if(bLow.includes('strategy') || bLow.includes('plan')) badgeClass = 'badge-soft-purple';
                if(bLow.includes('exec') || bLow.includes('req') || bLow.includes('gov') || bLow.includes('med') || bLow.includes('date')) badgeClass = 'badge-soft-warning';
            }

            html += `
                <div class="col-md-6 col-lg-4">
                    <div class="action-card d-flex flex-column h-100" style="background-color: #ffffff; border-color: #cbd5e1;">
                        <h6 class="fw-bold mb-2 action-title" style="font-size: 0.95rem;">${sub.title}</h6>
                        <p class="text-muted small mb-3 flex-grow-1" style="line-height: 1.5;">${sub.description || ''}</p>
                        ${sub.long_description ? `<div class="text-dark small mb-3 w-100 long-description-content" style="line-height: 1.6;">${sub.long_description}</div>` : ''}
                        
                        <div class="mt-auto d-flex flex-column align-items-start gap-2">
                            ${badge ? `<span class="badge ${badgeClass} rounded-pill px-3 py-2">${badge}</span>` : ''}
                            ${salary ? `<div class="salary-text mt-2"><i class="fas fa-coins text-warning me-1"></i> <span>${salary}</span></div>` : ''}
                        </div>
                    </div>
                </div>
            `;
        });

        html += `</div>`;
        container.innerHTML = html;
        container.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    };

    document.addEventListener('DOMContentLoaded', function() {
        const stageButtons = document.querySelectorAll('.btn-stage');
        const streamsSection = document.getElementById('streams-section');
        const streamsContainer = document.getElementById('streams-container');
        const timelineSection = document.getElementById('timeline-section');
        const timelineContainer = document.getElementById('timeline-container');
        const streamAlert = document.getElementById('stream-alert');
        const streamAlertText = document.getElementById('stream-alert-text');
        
        const dynamicBreadcrumb = document.getElementById('dynamic-breadcrumb');
        const dynamicHeading = document.getElementById('dynamic-heading');

        let currentStageId = null;
        let currentStageTitle = '';

        stageButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                stageButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                currentStageTitle = this.dataset.stageTitle;
                
                // Update Breadcrumb & Heading
                dynamicBreadcrumb.innerHTML = `
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted" onclick="location.reload();">Career roadmap</a></li>
                    <li class="breadcrumb-item active" aria-current="page">${currentStageTitle}</li>
                `;
                dynamicHeading.innerText = 'Select your current class';

                timelineSection.style.display = 'none';
                streamsSection.style.display = 'block';
                streamsContainer.innerHTML = '<div class="col-12 text-center text-muted py-5"><i class="fas fa-spinner fa-spin fs-4 text-secondary"></i></div>';

                currentStageId = this.dataset.stageId;
                
                setTimeout(() => {
                    streamsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
                
                fetch(`/career-roadmap/api/stage/${currentStageId}`)
                    .then(res => res.json())
                    .then(data => renderStreams(data.streams))
                    .catch(err => console.error(err));
            });
        });

        function renderStreams(streams) {
            streamsContainer.innerHTML = '';
            if(!streams.length) {
                streamsContainer.innerHTML = '<div class="col-12 text-center text-muted py-4 border rounded bg-white">No streams available for this path.</div>';
                return;
            }

            streams.forEach((stream, idx) => {
                const col = document.createElement('div');
                col.className = 'col-md-4 col-sm-6';
                col.style.animationDelay = `${idx * 0.05}s`;
                col.classList.add('fade-in');
                
                let iconClass = 'fas fa-shield-alt';
                const t = stream.title.toLowerCase();
                if(t.includes('defence')) iconClass = 'fas fa-shield-alt';
                else if(t.includes('science') && t.includes('eng')) iconClass = 'fas fa-microchip';
                else if(t.includes('science') && t.includes('med')) iconClass = 'fas fa-stethoscope';
                else if(t.includes('commerce') || t.includes('finance')) iconClass = 'far fa-chart-bar';
                else if(t.includes('art') || t.includes('humanities')) iconClass = 'fas fa-book-open';
                else if(t.includes('law')) iconClass = 'fas fa-balance-scale';
                else if(t.includes('management') || t.includes('mba')) iconClass = 'fas fa-briefcase';
                else if(t.includes('tech') || t.includes('engineer')) iconClass = 'fas fa-laptop-code';
                else if(t.includes('civil') || t.includes('upsc')) iconClass = 'fas fa-landmark';
                else iconClass = 'fas fa-graduation-cap';

                col.innerHTML = `
                    <div class="stream-card" data-stream-id="${stream.id}" data-stream-title="${stream.title}">
                        <div class="stream-icon">
                            <i class="${iconClass}"></i>
                        </div>
                        <div class="stream-title">${stream.title}</div>
                        <div class="stream-desc">${stream.description || 'Explore this career path'}</div>
                    </div>
                `;
                
                col.querySelector('.stream-card').addEventListener('click', function() {
                    document.querySelectorAll('.stream-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    loadStreamDetails(stream.id, stream.title);
                });

                streamsContainer.appendChild(col);
            });
        }

        function loadStreamDetails(streamId, streamTitle) {
            // Update Breadcrumb & Heading dynamically
            dynamicBreadcrumb.innerHTML = `
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted" onclick="location.reload();">Career roadmap</a></li>
                <li class="breadcrumb-item"><span class="text-muted">${currentStageTitle}</span></li>
                <li class="breadcrumb-item active" aria-current="page">${streamTitle}</li>
            `;
            dynamicHeading.innerText = `Career roadmap — ${streamTitle}`;

            timelineSection.style.display = 'block';
            timelineContainer.innerHTML = '<div class="text-center text-muted py-5"><i class="fas fa-spinner fa-spin fs-4 text-secondary"></i></div>';
            streamAlert.style.display = 'none';

            setTimeout(() => {
                timelineSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);

            fetch(`/career-roadmap/api/stream/${streamId}`)
                .then(res => res.json())
                .then(data => renderTimeline(data.stream))
                .catch(err => console.error(err));
        }

        function renderTimeline(stream) {
            timelineContainer.innerHTML = '';
            cardChildrenMap = {}; // reset map
            
            let cf = stream.custom_fields;
            if(typeof cf === 'string') {
                try { cf = JSON.parse(cf); } catch(e) { cf = {}; }
            }
            if(cf && cf.alert_message) {
                streamAlertText.innerHTML = cf.alert_message;
                streamAlert.style.display = 'flex';
            } else {
                streamAlert.style.display = 'none';
            }

            const groups = stream.children || [];
            if(!groups.length) {
                timelineContainer.innerHTML = '<div class="text-muted py-4">No detailed timeline available for this path.</div>';
                return;
            }

            const dotColors = ['dot-blue', 'dot-green', 'dot-purple', 'dot-orange'];

            groups.forEach((group, index) => {
                let groupCf = group.custom_fields;
                if(typeof groupCf === 'string') {
                    try { groupCf = JSON.parse(groupCf); } catch(e) { groupCf = {}; }
                }
                const groupBadge = groupCf ? groupCf.Badge : null;
                const dotColor = dotColors[index % dotColors.length];

                const groupDiv = document.createElement('div');
                groupDiv.className = 'timeline-group fade-in';
                groupDiv.style.animationDelay = `${index * 0.1}s`;
                
                let groupHtml = `
                    <div class="timeline-dot ${dotColor}"></div>
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="fw-bold mb-0 me-3 timeline-group-title">${group.title}</h5>
                        ${groupBadge ? `<span class="badge badge-soft-secondary rounded-pill px-3 py-1">${groupBadge}</span>` : ''}
                    </div>
                    <div class="row g-3" id="group-row-${group.id}">
                `;

                const cards = group.children || [];
                cards.forEach(card => {
                    let cardCf = card.custom_fields;
                    if(typeof cardCf === 'string') {
                        try { cardCf = JSON.parse(cardCf); } catch(e) { cardCf = {}; }
                    }
                    const badge = cardCf ? cardCf.Badge : null;
                    const salary = cardCf ? cardCf.Salary : null;

                    const hasChildren = card.children && card.children.length > 0;
                    if(hasChildren) {
                        cardChildrenMap[card.id] = { title: card.title, desc: card.description, children: card.children };
                    }

                    let badgeClass = 'badge-soft-primary';
                    if(badge) {
                        const bLow = badge.toLowerCase();
                        if(bLow.includes('prep') || bLow.includes('merit') || bLow.includes('success')) badgeClass = 'badge-soft-success';
                        if(bLow.includes('strategy') || bLow.includes('plan')) badgeClass = 'badge-soft-purple';
                        if(bLow.includes('exec') || bLow.includes('req') || bLow.includes('gov')) badgeClass = 'badge-soft-warning';
                    }
                    
                    groupHtml += `
                        <div class="col-md-6 col-lg-4">
                            <div class="action-card d-flex flex-column h-100 ${hasChildren ? 'has-children' : ''}" 
                                 ${hasChildren ? `onclick="window.showNestedRow(event, ${group.id}, ${card.id})"` : ''}>
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0 action-title" style="font-size: 0.95rem;">${card.title}</h6>
                                    ${hasChildren ? `<i class="fas fa-chevron-down text-primary opacity-50 ms-2 mt-1 toggle-icon-${card.id}"></i>` : ''}
                                </div>
                                <p class="text-muted small mb-3 flex-grow-1" style="line-height: 1.5;">${card.description || ''}</p>
                                ${card.long_description ? `<div class="text-dark small mb-3 w-100 long-description-content" style="line-height: 1.6;">${card.long_description}</div>` : ''}
                                
                                <div class="mt-auto d-flex flex-column align-items-start gap-2">
                                    ${badge ? `<span class="badge ${badgeClass} rounded-pill px-3 py-2">${badge}</span>` : ''}
                                    ${salary ? `<div class="salary-text mt-2"><i class="fas fa-coins text-warning me-1"></i> <span>${salary}</span></div>` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                });

                groupHtml += `</div>`; // Close row

                // Add the master-detail nested container below the row
                groupHtml += `
                    <div id="group-nested-${group.id}" class="d-none mt-4 p-4 bg-light rounded-4 border border-primary border-opacity-25 nested-master-container"></div>
                `;

                groupDiv.innerHTML = groupHtml;
                timelineContainer.appendChild(groupDiv);
            });
        }
    });
</script>
@endpush
@endsection
