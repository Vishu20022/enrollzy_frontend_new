<section class="department-nav">
    <div class="container position-relative">

        <!-- LEFT ARROW -->
        <button class="nav-arrow left-arrow">
            ‹
        </button>

        <!-- NAV ITEMS -->
        <div class="department-scroll">
            <ul class="department-list">
                <li class="{{ !request('category') ? 'active' : '' }}">
                    <a href="{{ route('pages.students.community') }}" class="text-decoration-none {{ !request('category') ? '' : 'text-dark' }}">All</a>
                </li>
                @foreach($categories as $category)
                <li class="{{ request('category') == $category->slug ? 'active' : '' }}">
                    <a href="{{ route('pages.students.community', ['category' => $category->slug]) }}" 
                       class="text-decoration-none {{ request('category') == $category->slug ? '' : 'text-dark' }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- RIGHT ARROW -->
        <button class="nav-arrow right-arrow">
            ›
        </button>

    </div>
</section>
