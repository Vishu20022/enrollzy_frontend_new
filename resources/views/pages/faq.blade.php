@extends('layouts.master')

@section('title', 'Frequently Asked Questions')

@section('content')

<div class="saas-faq-page">
    <!-- Header -->
    <div class="saas-faq-header border-bottom">
        <div class="saas-faq-container py-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h1 class="saas-title mb-1">Frequently Asked Questions</h1>
                    <p class="saas-subtitle mb-0">Find answers to common questions about our platform and services.</p>
                </div>
                <div class="saas-search-wrapper">
                    <i class="fas fa-search saas-search-icon"></i>
                    <input type="text" id="saas-search-input" class="saas-search-input" placeholder="Search questions...">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="saas-faq-container py-4">
        <div class="saas-layout-grid">
            <!-- Sidebar -->
            <aside class="saas-sidebar d-none d-lg-block">
                <div class="sticky-top" style="top: 24px; z-index: 10;">
                    <div class="d-flex align-items-center mb-3 px-2">
                        <i class="fas fa-layer-group text-muted me-2" style="font-size: 14px;"></i>
                        <h6 class="mb-0 fw-semibold text-dark" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Categories</h6>
                    </div>
                    
                    <div class="saas-sidebar-tree">
                        @include('pages.partials.faq-category-tree', ['categories' => $categories, 'level' => 0])
                    </div>
                    
                    @if($categories->isEmpty())
                        <p class="text-muted small px-2 mt-2">No categories found.</p>
                    @endif
                </div>
            </aside>

            <!-- Mobile Category Toggle (Only visible on small screens) -->
            <div class="d-block d-lg-none mb-4">
                <button class="saas-btn-outline w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileCategories" aria-controls="mobileCategories">
                    <span><i class="fas fa-layer-group me-2"></i> Browse Categories</span>
                    <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                </button>
                
                <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileCategories" aria-labelledby="mobileCategoriesLabel">
                    <div class="offcanvas-header border-bottom">
                        <h6 class="offcanvas-title fw-bold" id="mobileCategoriesLabel">Categories</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="saas-sidebar-tree">
                            @include('pages.partials.faq-category-tree', ['categories' => $categories, 'level' => 0])
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <main class="saas-content">
                @foreach($allCategories as $category)
                    <div class="saas-content-pane" id="content-{{ $category->id }}" style="display: none;">
                        
                        <div class="saas-pane-header mb-4">
                            <h2 class="saas-pane-title">{{ $category->name }}</h2>
                            <p class="saas-pane-subtitle">Find answers to common questions &bull; {{ $category->faqs->count() }} Questions Available</p>
                        </div>
                        
                        @if($category->faqs->count() > 0)
                            <div class="saas-accordion" id="accordion-{{ $category->id }}">
                                @foreach($category->faqs as $index => $faq)
                                    <div class="saas-accordion-item faq-search-item">
                                        <button class="saas-accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                            <span class="faq-question-text pe-3">{{ $faq->question }}</span>
                                            <div class="saas-icon-box">
                                                <i class="fas fa-plus open-icon"></i>
                                                <i class="fas fa-minus close-icon"></i>
                                            </div>
                                        </button>
                                        <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordion-{{ $category->id }}">
                                            <div class="saas-accordion-body faq-answer-text">
                                                {!! nl2br(e($faq->answer)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="saas-empty-state">
                                <i class="fas fa-inbox mb-3 text-muted" style="font-size: 32px; opacity: 0.5;"></i>
                                <h5 class="fw-medium text-dark">No questions yet</h5>
                                <p class="text-muted small mb-0">This category is currently empty.</p>
                            </div>
                        @endif

                    </div>
                @endforeach
                
                <div id="faq-empty-state" style="display: none;">
                    <div class="saas-empty-state">
                        <i class="fas fa-mouse-pointer mb-3 text-muted" style="font-size: 32px; opacity: 0.5;"></i>
                        <h5 class="fw-medium text-dark">Select a category</h5>
                        <p class="text-muted small mb-0">Choose a category from the sidebar to view its FAQs.</p>
                    </div>
                </div>

                <div id="search-no-results" style="display: none;">
                    <div class="saas-empty-state">
                        <i class="fas fa-search-minus mb-3 text-muted" style="font-size: 32px; opacity: 0.5;"></i>
                        <h5 class="fw-medium text-dark">No results found</h5>
                        <p class="text-muted small mb-0">We couldn't find any questions matching your search.</p>
                        <button id="clear-search-btn" class="saas-btn-outline mt-3">Clear Search</button>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const navBtns = document.querySelectorAll('.faq-tree-btn');
    const contentPanes = document.querySelectorAll('.saas-content-pane');
    const emptyState = document.getElementById('faq-empty-state');
    const searchInput = document.getElementById('saas-search-input');
    const noResults = document.getElementById('search-no-results');
    const clearSearchBtn = document.getElementById('clear-search-btn');
    
    function activateCategory(categoryId) {
        navBtns.forEach(btn => {
            btn.classList.remove('active');
        });
        
        const activeBtns = document.querySelectorAll('#tab-' + categoryId);
        activeBtns.forEach(activeBtn => {
            activeBtn.classList.add('active');
            
            const icon = activeBtn.querySelector('.category-toggle');
            if(icon) {
                if(icon.classList.contains('fa-chevron-right')) {
                    icon.classList.remove('fa-chevron-right');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-right');
                }
            }
        });
        
        let found = false;
        contentPanes.forEach(pane => {
            pane.style.display = 'none';
            if(pane.id === 'content-' + categoryId) {
                pane.style.display = 'block';
                found = true;
            }
        });
        
        noResults.style.display = 'none';
        
        if(!found) {
            emptyState.style.display = 'block';
        } else {
            emptyState.style.display = 'none';
        }
    }

    if(navBtns.length > 0) {
        const firstId = navBtns[0].getAttribute('data-category-id');
        activateCategory(firstId);
    } else {
        emptyState.style.display = 'block';
    }

    navBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if(searchInput && searchInput.value !== '') {
                searchInput.value = '';
                resetSearch();
            }

            const categoryId = this.getAttribute('data-category-id');
            
            // Handle multiple occurrences for desktop/mobile views
            const collapseTargets = document.querySelectorAll('#collapse-category-' + categoryId);
            collapseTargets.forEach(collapseTarget => {
                const bsCollapse = new bootstrap.Collapse(collapseTarget, { toggle: false });
                if(collapseTarget.classList.contains('show')) {
                    bsCollapse.hide();
                } else {
                    bsCollapse.show();
                }
            });
            
            activateCategory(categoryId);
            
            // Close offcanvas on mobile when clicking a category
            const offcanvasEl = document.getElementById('mobileCategories');
            if (offcanvasEl) {
                const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasEl);
                if (offcanvasInstance) {
                    offcanvasInstance.hide();
                }
            }
        });
    });

    function resetSearch() {
        document.querySelectorAll('.faq-search-item').forEach(item => {
            item.style.display = 'block';
        });
        
        const activeBtn = document.querySelector('.faq-tree-btn.active');
        if(activeBtn) {
            activateCategory(activeBtn.getAttribute('data-category-id'));
        }
    }

    if(searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            
            if(query === '') {
                resetSearch();
                return;
            }

            navBtns.forEach(btn => btn.classList.remove('active'));
            emptyState.style.display = 'none';
            
            let totalFound = 0;

            contentPanes.forEach(pane => {
                let paneHasMatch = false;
                const items = pane.querySelectorAll('.faq-search-item');
                
                items.forEach(item => {
                    const qText = item.querySelector('.faq-question-text').textContent.toLowerCase();
                    const aText = item.querySelector('.faq-answer-text').textContent.toLowerCase();
                    
                    if(qText.includes(query) || aText.includes(query)) {
                        item.style.display = 'block';
                        paneHasMatch = true;
                        totalFound++;
                        
                        const btn = item.querySelector('.saas-accordion-button');
                        const collapse = item.querySelector('.accordion-collapse');
                        if(btn.classList.contains('collapsed')) {
                            btn.classList.remove('collapsed');
                            btn.setAttribute('aria-expanded', 'true');
                            collapse.classList.add('show');
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });

                if(paneHasMatch) {
                    pane.style.display = 'block';
                } else {
                    pane.style.display = 'none';
                }
            });

            if(totalFound === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        });
    }

    if(clearSearchBtn) {
        clearSearchBtn.addEventListener('click', function() {
            if(searchInput) searchInput.value = '';
            resetSearch();
        });
    }
});
</script>
@endpush

@push('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

    .saas-faq-page {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        color: #1e293b;
        background-color: #ffffff;
        min-height: 100vh;
    }

    /* Layout System */
    .saas-faq-container {
        max-width: 1400px;
        margin: 0 auto;
        padding-left: 24px;
        padding-right: 24px;
    }
    .saas-layout-grid {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 48px;
        align-items: start;
    }
    @media (max-width: 991.98px) {
        .saas-layout-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }
    }

    /* Header */
    .saas-faq-header {
        background-color: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }
    .saas-title {
        font-size: 28px;
        font-weight: 600;
        color: #0f172a;
        letter-spacing: -0.5px;
    }
    .saas-subtitle {
        font-size: 15px;
        color: #64748b;
    }

    /* Search Bar */
    .saas-search-wrapper {
        position: relative;
        width: 100%;
        max-width: 320px;
    }
    .saas-search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 14px;
    }
    .saas-search-input {
        width: 100%;
        padding: 10px 16px 10px 38px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        color: #1e293b;
        background-color: #ffffff;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .saas-search-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Sidebar Tree */
    .faq-tree-btn {
        background: transparent;
        border: none;
        color: #475569;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 12px;
        border-radius: 6px;
        transition: all 0.1s ease;
        margin-bottom: 2px;
    }
    .faq-tree-btn:hover {
        background-color: #f1f5f9;
        color: #0f172a;
    }
    .faq-tree-btn.active {
        background-color: #f1f5f9;
        color: #0f172a;
        font-weight: 600;
        box-shadow: inset 3px 0 0 #3b82f6;
    }
    .faq-badge {
        background-color: #e2e8f0;
        color: #475569;
        font-size: 11px;
        font-weight: 600;
        padding: 2px 8px;
        border-radius: 12px;
    }

    /* Content Area */
    .saas-pane-header {
        margin-bottom: 24px;
    }
    .saas-pane-title {
        font-size: 24px;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 4px;
        letter-spacing: -0.3px;
    }
    .saas-pane-subtitle {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 0;
    }

    /* Accordion */
    .saas-accordion {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .saas-accordion-item {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        overflow: hidden;
        transition: box-shadow 0.2s ease;
    }
    .saas-accordion-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        border-color: #cbd5e1;
    }
    .saas-accordion-button {
        width: 100%;
        text-align: left;
        background: transparent;
        border: none;
        padding: 20px 24px;
        font-size: 15px;
        font-weight: 500;
        color: #0f172a;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .saas-accordion-button:not(.collapsed) {
        color: #2563eb;
    }
    .saas-icon-box {
        position: relative;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
    }
    .saas-icon-box i {
        position: absolute;
        font-size: 12px;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }
    .open-icon { opacity: 1; transform: rotate(0deg); }
    .close-icon { opacity: 0; transform: rotate(-90deg); }
    .saas-accordion-button:not(.collapsed) .open-icon { opacity: 0; transform: rotate(90deg); }
    .saas-accordion-button:not(.collapsed) .close-icon { opacity: 1; transform: rotate(0deg); color: #2563eb; }
    
    .saas-accordion-body {
        padding: 0 24px 24px 24px;
        font-size: 14px;
        line-height: 1.6;
        color: #475569;
    }

    /* Misc */
    .saas-empty-state {
        padding: 48px 24px;
        text-align: center;
        background: #f8fafc;
        border-radius: 12px;
        border: 1px dashed #cbd5e1;
    }
    .saas-btn-outline {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        color: #0f172a;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .saas-btn-outline:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }
</style>
@endpush
