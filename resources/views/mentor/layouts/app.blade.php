@extends('layouts.master')

@section('content')
<div class="container-fluid py-5 mt-5" style="background-color: #fafbfc; min-height: 100vh;">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="mb-4">
                    <h3 style="font-weight: 700; color: #1f2937;">Edit mentor profile</h3>
                    <p class="text-muted" style="font-size: 0.9rem;">{{ $user->name }} &middot; last saved just now</p>
                </div>
                
                <div class="card border-0 shadow-sm rounded-4" style="background: transparent; box-shadow: none !important;">
                    <div class="card-body p-0">
                        <ul class="nav flex-column nav-pills" id="mentor-sidebar">
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.edit') ? 'active' : '' }}" href="{{ route('mentor.profile.edit') }}" style="{{ request()->routeIs('mentor.profile.edit') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-person me-2"></i> Basic profile
                                    <span class="float-end text-success" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.education') ? 'active' : '' }}" href="{{ route('mentor.profile.education') }}" style="{{ request()->routeIs('mentor.profile.education') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-book me-2"></i> Education
                                    <span class="float-end text-success" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.professional') ? 'active' : '' }}" href="{{ route('mentor.profile.professional') }}" style="{{ request()->routeIs('mentor.profile.professional') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-briefcase me-2"></i> Professional
                                    <span class="float-end text-success" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.mentorship') ? 'active' : '' }}" href="{{ route('mentor.profile.mentorship') }}" style="{{ request()->routeIs('mentor.profile.mentorship') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-stars me-2"></i> Mentorship
                                    <span class="float-end text-success" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.availability') ? 'active' : '' }}" href="{{ route('mentor.profile.availability') }}" style="{{ request()->routeIs('mentor.profile.availability') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-calendar-event me-2"></i> Availability
                                    <span class="float-end text-warning" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.pricing') ? 'active' : '' }}" href="{{ route('mentor.profile.pricing') }}" style="{{ request()->routeIs('mentor.profile.pricing') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-currency-rupee me-2"></i> Pricing
                                    <span class="float-end text-warning" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.verification') ? 'active' : '' }}" href="{{ route('mentor.profile.verification') }}" style="{{ request()->routeIs('mentor.profile.verification') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-shield-check me-2"></i> Verification
                                    <span class="float-end text-warning" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link {{ request()->routeIs('mentor.profile.preferences') ? 'active' : '' }}" href="{{ route('mentor.profile.preferences') }}" style="{{ request()->routeIs('mentor.profile.preferences') ? 'background-color: #f3f0ff; color: #5b21b6; font-weight: 600; border-radius: 8px;' : 'color: #4b5563;' }}">
                                    <i class="bi bi-gear me-2"></i> Preferences
                                    <span class="float-end text-success" style="font-size: 0.7rem; margin-top: 5px;">●</span>
                                </a>
                            </li>
                        </ul>
                        
                        <div class="mt-4 p-3 rounded" style="font-size: 0.85rem; background-color: #fefce8; border: 1px solid #fef08a;">
                            <span class="text-warning">○ Needs attention</span> <br>
                            <span class="text-success">○ Complete</span>
                        </div>
                        
                        <form action="{{ route('mentor.logout') }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @yield('mentor_content')
            </div>
        </div>
    </div>
</div>

<style>
    .nav-pills .nav-link {
        transition: all 0.2s ease;
        padding: 10px 15px;
    }
    .nav-pills .nav-link:hover {
        background-color: #f3f4f6;
    }
</style>
@endsection
