<style>
    .searchbtn {
        position: relative;
    }

    .searchbtn input {
        border-radius: 25px !important;
        padding-left: 20px;
        padding-right: 45px;
        border: 1px solid #e2e8f0;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
        height: 40px;
    }
    .searchbtn input:focus {
        box-shadow: 0 4px 12px rgba(128, 92, 216, 0.15);
        border-color: #805CD8;
    }
    .searchbtn button {
        position: absolute;
        top: 50%;
        right: 6px;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        background: linear-gradient(135deg, #805CD8, #6b46c1);
        color: white;
        border: none;
        border-radius: 50%;
        outline: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(128, 92, 216, 0.3);
    }
    .searchbtn button:hover {
        transform: translateY(-50%) scale(1.08);
        box-shadow: 0 4px 8px rgba(128, 92, 216, 0.4);
    }
    .mobile-drawer{

    position:fixed;

    left:-100%;

    top:0;

    width:320px;

    height:100vh;

    transition:.4s ease;

    z-index:9999;

}

.mobile-drawer.open{

    left:0;

}

.mobile-overlay{

    position:fixed;

    inset:0;

    background:rgba(0,0,0,.5);

    opacity:0;

    visibility:hidden;

    transition:.4s;

    z-index:9998;

}

.mobile-overlay.show{

    opacity:1;

    visibility:visible;

}

header .navbar .nav-link {
    color: var(--darkclr);
}

.master-search-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    z-index: 1000;
    max-height: 400px;
    overflow-y: auto;
    display: none;
    margin-top: 5px;
}
.master-search-dropdown .search-category-title {
    font-size: 0.8rem;
    text-transform: uppercase;
    color: #888;
    padding: 8px 15px;
    background: #f8f9fa;
    font-weight: 600;
    border-bottom: 1px solid #eee;
    border-top: 1px solid #eee;
}
.master-search-dropdown .search-category-title:first-child {
    border-top: none;
    border-radius: 8px 8px 0 0;
}
.master-search-dropdown ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.master-search-dropdown ul li a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    font-size: 0.95rem;
    transition: background 0.2s;
}
.master-search-dropdown ul li a:hover {
    background: #f1ecfc;
    color: #805CD8;
}
.master-search-dropdown .no-results {
    padding: 15px;
    text-align: center;
    color: #777;
}

/* ----------------------------------------------------
   SIMPLE DROPDOWN (For 2-level menus)
----------------------------------------------------- */
.simple-dropdown {
    position: absolute;
    left: 0;
    top: 100%;
    min-width: 200px;
    background: #fff;
    padding: 10px 0;
    display: none;
    opacity: 0;
    transform: translateY(10px);
    border-top: 1px solid #eee;
    transition: opacity 0.25s ease, transform 0.25s ease;
    z-index: 1000;
    border-radius: 0 0 8px 8px;
}
.simple-dropdown a {
    text-decoration: none;
    color: #333 !important;
    display: block;
    padding: 8px 20px;
    font-size: 14px;
    transition: background 0.2s, color 0.2s;
}
.simple-dropdown a:hover {
    background: #f1ecfc;
    color: #805CD8 !important;
    padding-left: 25px;
}
/* Removed hover rule in favor of JS click logic */
</style>
@php
    $mainHeaderMenus = \App\Models\HeaderMenu::with('children.children')
        ->whereNull('parent_id')
        ->where('status', 1)
        ->orderBy('sort_order')
        ->get();
@endphp
<header>
    <!-- ========================= -->
    <!--  MOBILE DRAWER OVERLAY   -->
    <!-- ========================= -->
    <div id="mobileMenuOverlay" class="mobile-overlay"></div>

    <!-- ========================= -->
    <!--  MOBILE DRAWER PANEL     -->
    <!-- ========================= -->
    <div id="mobileMenu" class="mobile-drawer">
        <!-- Top Logo + Close -->
        <div class="drawer-header d-flex align-items-center justify-content-between px-3 py-3">
            <a href="{{ route('pages.home') }}" class="fw-bold fs-4 text-primary">
                @if ($site_settings->logo ?? false)
                    <img src="{{ env('BACKEND_URL') . '/' . $site_settings->logo }}"
                        alt="{{ $site_settings->site_name ?? 'Logo' }}" style="max-height: 40px;">
                @else
                    {{ $site_settings->site_name ?? 'YourLogo' }}
                @endif
            </a>
            <button class="btn btn-link text-dark fs-3 p-0" onclick="closeMobileMenu()">
                &times;
            </button>
        </div>

        <!-- Profile Section -->
        @auth
            <a href="{{ route('profile.edit') }}" class="text-decoration-none text-dark w-100">
                <div class="drawer-profile px-3 pb-3 d-flex align-items-center">
                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle me-2" width="40"
                        height="40" />
                    <div>
                        <strong>{{ Auth::user()->name }}</strong><br />
                        <span class="text-muted small">My Learning</span>
                    </div>
                    <span class="ms-auto">&gt;</span>
                </div>
            </a>
        @else
            <a href="{{ route('login-otp') }}" class="text-decoration-none text-dark w-100">
                <div class="drawer-profile px-3 pb-3 d-flex align-items-center">
                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle me-2" width="40"
                        height="40" />
                    <div>
                        <strong>Login / Register</strong><br />
                        <span class="text-muted small">Access your account</span>
                    </div>
                    <span class="ms-auto">&gt;</span>
                </div>
            </a>
        @endauth

        <hr class="my-0" />

        <!-- MENU LINKS -->
        <div class="drawer-menu px-3 py-2">
            @foreach($mainHeaderMenus as $menu)
                @if($menu->children->count() > 0)
                    <div class="drawer-item fw-bold text-primary">{{ $menu->title }}</div>
                    @foreach($menu->children as $child)
                        @if($child->children->count() > 0)
                            <div class="drawer-item ps-3 fw-bold">{{ $child->title }}</div>
                            @foreach($child->children as $grandchild)
                                <a href="{{ $grandchild->url ?: '#' }}" class="text-decoration-none text-dark"><div class="drawer-item ps-4">{{ $grandchild->title }} <span>&gt;</span></div></a>
                            @endforeach
                        @else
                            <a href="{{ $child->url ?: '#' }}" class="text-decoration-none text-dark"><div class="drawer-item ps-3">{{ $child->title }} <span>&gt;</span></div></a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ $menu->url ?: '#' }}" class="text-decoration-none text-dark"><div class="drawer-item">{{ $menu->title }} <span>&gt;</span></div></a>
                @endif
            @endforeach
        </div>

        <hr class="my-0" />

        <div class="drawer-footer px-3 py-2">
            <div class="text-muted small mb-2">Not sure where to begin?</div>
            <div class="drawer-item">Browse free courses</div>
        </div>

        <hr class="my-0" />

        <div class="drawer-bottom px-3 py-3">
            <div class="text-primary fw-bold">Get Coursera PLUS</div>
            <div class="text-muted small">Access 10,000+ courses</div>
        </div>
    </div>

    <!-- ===================================== -->
    <!--   MAIN HEADER NAVBAR (DESKTOP VIEW)   -->
    <!-- ===================================== -->
    <nav class="navbar navbar-expand-lg header-shadow py-2">
        <div class="container ">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('pages.home') }}">
                @if ($site_settings->logo ?? false)
                    <img src="{{ env('BACKEND_URL') . '/' . $site_settings->logo }}"
                        alt="{{ $site_settings->site_name ?? 'Logo' }}" style="max-height: 40px;">
                @else
                    <span class="theme">{{ explode(' ', $site_settings->site_name ?? 'Your Logo')[0] }}</span>
                    <span>{{ implode(' ', array_slice(explode(' ', $site_settings->site_name ?? 'Your Logo'), 1)) }}</span>
                @endif
            </a>

            <!-- Mobile Toggle Button (Custom) -->
            <button class="navbar-toggler" type="button" id="mobileToggleBtn">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- NAV -->
            <div class="collapse navbar-collapse add-flex-props" id="mainNav">
                <!-- LEFT MENU -->
                <ul class="navbar-nav ms-4 add-gap">
                    @foreach($mainHeaderMenus as $menu)
                        @if($menu->children->count() > 0)
                            @php
                                $hasGrandchildren = false;
                                foreach($menu->children as $child) {
                                    if($child->children->count() > 0) {
                                        $hasGrandchildren = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if($hasGrandchildren)
                                <!-- MEGA DROPDOWN -->
                                <li class="nav-item position-static">
                                    <a class="nav-link text-nowrap" href="javascript:void(0)" id="menu-{{ $menu->id }}">{{ $menu->title }} ▾</a>
                                    <div class="mega-menu shadow">
                                        <div class="row">
                                            @foreach($menu->children as $column)
                                                <div class="col-lg-3 col-6 mb-4">
                                                    @if($column->url)
                                                        <a href="{{ $column->url }}" class="mega-title" style="text-decoration:none;">{{ $column->title }}</a>
                                                    @else
                                                        <div class="mega-title">{{ $column->title }}</div>
                                                    @endif
                                                    
                                                    @foreach($column->children as $link)
                                                        <a href="{{ $link->url ?: '#' }}">{{ $link->title }}</a>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @else
                                <!-- SIMPLE DROPDOWN -->
                                <li class="nav-item position-relative">
                                    <a class="nav-link text-nowrap" href="javascript:void(0)" id="menu-{{ $menu->id }}">{{ $menu->title }} ▾</a>
                                    <div class="simple-dropdown shadow">
                                        @foreach($menu->children as $link)
                                            <a href="{{ $link->url ?: '#' }}">{{ $link->title }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @else
                            <!-- SIMPLE LINK -->
                            <li class="nav-item"><a href="{{ $menu->url ?: '#' }}" class="nav-link text-nowrap">{{ $menu->title }}</a></li>
                        @endif
                    @endforeach
                </ul>

                <div class="searchbtn mx-lg-4" style="width: 100%; max-width: 500px;" id="masterSearchContainer">
                    <input type="search" class="form-control" name="search" id="masterSearchInput"
                        placeholder="Search for organisation, exams, etc..." autocomplete="off">
                    <button><i class="fa-solid fa-search"></i></button>
                    
                    <!-- Dropdown Results -->
                    <div class="master-search-dropdown text-start" id="masterSearchDropdown">
                        <!-- Content injected via JS -->
                    </div>
                </div>

                <!-- RIGHT MENU -->
                <ul class="navbar-nav ">

                    <!-- <li class="nav-item"><a class="nav-link text-nowrap" href="#!">Enrollzy For Business</a></li> -->
                    <li class="nav-item auth-dropdown">
                        <a class="nav-link user-icon" href="javascript:void(0)">
                            @auth
                                <span class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-user"></i>
                                    <span class="fs-6">{{ Str::limit(Auth::user()->name, 10) }}</span>
                                </span>
                            @else
                                <i class="fa-regular fa-user"></i>
                            @endauth
                        </a>
                        <div class="auth-popup">
                            @auth
                                <!-- <a href="javascript:void(0)" class="dropdown-header disabled text-muted">
                                        {{ Auth::user()->email }}
                                    </a>
                                    {{-- <a href="{{ route('pages.mylearning') }}">My Learning</a> --}} -->
                                <a href="{{ route('profile.edit') }}">Profile</a>
                                <a href="{{ route('appointments.mine') }}">Appointments</a>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="text-danger">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login-otp') }}">
                                    Login
                                </a>
                                <a href="{{ route('register') }}">
                                    Register
                                </a>
                            @endauth
                        </div>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
    @php
        $headerLinks = \App\Models\HeaderLink::where('status', true)->orderBy('sort_order')->orderBy('title')->get();
    @endphp
    @if ($headerLinks->count() > 0)
        <section class="school-nav">
            <div class="container">
                <ul class="school-list">
                    @foreach ($headerLinks as $link)
                        <li>
                            <a href="{{ $link->url ?? '#' }}">{{ $link->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
</header>

@push('js')
<script>
$(document).ready(function() {
    let searchTimeout;

    $('#masterSearchInput').on('input', function() {
        const query = $(this).val();
        const dropdown = $('#masterSearchDropdown');
        
        if (query.length < 2) {
            dropdown.hide();
            return;
        }

        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            $.ajax({
                url: '/api/master-search',
                type: 'GET',
                data: { query: query },
                success: function(response) {
                    let html = '';
                    let hasResults = false;

                    const cats = {
                        'Organisations': response.organisations,
                        'Exams': response.exams
                    };

                    for (const [category, items] of Object.entries(cats)) {
                        if (items && items.length > 0) {
                            hasResults = true;
                            html += `<div class="search-category-title">${category}</div><ul>`;
                            items.forEach(item => {
                                const regex = new RegExp(`(${query})`, 'gi');
                                const highlightedName = item.name.replace(regex, '<strong>$1</strong>');
                                html += `<li><a href="${item.link}">${highlightedName}</a></li>`;
                            });
                            html += `</ul>`;
                        }
                    }

                    if (!hasResults) {
                        html = `<div class="no-results">No results found for "<b>${query}</b>"</div>`;
                    }

                    dropdown.html(html).show();
                },
                error: function() {
                    dropdown.html(`<div class="no-results text-danger">Error fetching results.</div>`).show();
                }
            });
        }, 300); // 300ms debounce
    });

    // Hide dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#masterSearchContainer').length) {
            $('#masterSearchDropdown').hide();
        }
    });
    
    // Show dropdown again if input is focused and has text
    $('#masterSearchInput').on('focus', function() {
        if ($(this).val().length >= 2) {
            $('#masterSearchDropdown').show();
        }
    });
});
</script>
@endpush
