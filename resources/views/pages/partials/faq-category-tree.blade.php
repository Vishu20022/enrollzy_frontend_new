@foreach($categories as $category)
    <div class="faq-tree-item" style="margin-top: 4px;">
        <button class="faq-tree-btn d-flex align-items-center justify-content-between w-100" 
                id="tab-{{ $category->id }}" 
                data-category-id="{{ $category->id }}"
                type="button" role="tab"
                style="padding-left: calc({{ $level }} * 16px + 12px);">
            
            <div class="d-flex align-items-center overflow-hidden">
                @if($category->allChildren->count() > 0)
                    <i class="fas fa-chevron-right category-toggle transition-all" style="font-size: 10px; width: 14px; color: #94a3b8; text-align: left;"></i>
                @else
                    <span style="width: 14px; display: inline-block;"></span>
                @endif
                <span class="category-name text-truncate" title="{{ $category->name }}">{{ $category->name }}</span>
            </div>

            @if($category->faqs->count() > 0)
                <span class="faq-badge flex-shrink-0 ms-2">{{ $category->faqs->count() }}</span>
            @endif
        </button>
        
        @if($category->allChildren->count() > 0)
            <div class="collapse category-children" id="collapse-category-{{ $category->id }}">
                <div class="faq-tree-children">
                    @include('pages.partials.faq-category-tree', ['categories' => $category->allChildren, 'level' => $level + 1])
                </div>
            </div>
        @endif
    </div>
@endforeach
