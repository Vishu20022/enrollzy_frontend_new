@php
    $segments = request()->segments();
    $url = '';
@endphp

@if(count($segments) > 0)
<div class="breadcrumb-container" style="background-color: #f8f9fa; border-bottom: 1px solid #e9ecef; padding: 12px 0;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.9rem;">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-decoration-none text-primary fw-medium" style="display: inline-flex; align-items: center; gap: 5px;">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                @foreach($segments as $segment)
                    @php 
                        $url .= '/' . $segment;
                        // Format the segment to be human-readable
                        $name = ucwords(str_replace(['-', '_'], ' ', $segment));
                    @endphp
                    
                    @if($loop->last)
                        <li class="breadcrumb-item active fw-medium text-dark" aria-current="page" style="display: inline-flex; align-items: center;">
                            {{ $name }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ url($url) }}" class="text-decoration-none text-primary fw-medium" style="display: inline-flex; align-items: center;">
                                {{ $name }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>

<style>
    .breadcrumb-item + .breadcrumb-item::before {
        content: "\f105"; /* FontAwesome angle-right */
        font-family: "Font Awesome 5 Free", "Font Awesome 6 Free";
        font-weight: 900;
        font-size: 0.8rem;
        color: #adb5bd;
        margin-top: 2px;
    }
</style>
@endif
