<div class="admin-sidebar" :class="{ 'active': sidebarOpen }">
    <!-- Sidebar Header / Logo -->
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="logo-container">
            <img src="{{ asset('assets/img/logo/logo1.png') }}" alt="Logo" style="width: 140px; height: auto;">
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-menu">
        <nav class="d-flex flex-column">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge-high"></i> Dashboard
            </a>
            
            <!-- Add more admin links here later -->
            <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Users
                <span class="nav-badge">{{ \App\Models\User::count() }}</span>
            </a>
            <a href="{{ route('admin.quotes.index') }}" class="nav-item {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-invoice"></i> Quote Requests
                <span class="nav-badge">{{ \App\Models\QuoteRequest::count() }}</span>
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="nav-item {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope"></i> Contact Messages
                <span class="nav-badge">{{ \App\Models\ContactMessage::count() }}</span>
            </a>
            <a href="{{ route('admin.posts.index') }}" class="nav-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i class="fa-solid fa-pen-nib"></i> Blog Posts
                <span class="nav-badge">{{ \App\Models\Post::count() }}</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Footer / User Profile -->
    <div class="sidebar-footer" x-data="{ open: false }" style="position: relative;">
        <!-- Dropup Menu -->
        <div x-show="open" 
             @click.outside="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="bg-white shadow-lg rounded-lg border border-gray-100 py-2"
             style="position: absolute; bottom: 100%; left: 10px; right: 10px; margin-bottom: 10px; z-index: 60; display: none;">
            
            <a href="{{ route('admin.users.show', auth()->user()) }}" class="d-block px-3 py-2 text-dark text-decoration-none hover-bg-gray">
                <i class="fa-regular fa-user me-2 text-muted"></i> Profile
            </a>
            
            <div class="border-top my-1"></div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="d-block px-3 py-2 text-danger text-decoration-none hover-bg-gray">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Log Out
                </a>
            </form>
        </div>

        <!-- Trigger -->
        <div class="d-flex align-items-center justify-content-between cursor-pointer" @click="open = !open" style="cursor: pointer;">
            <div class="d-flex align-items-center gap-2">
                <div class="avatar-circle" style="width: 35px; height: 35px; background: #e5e7eb; color: #4b5563; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div style="line-height: 1.2;">
                    <div class="fw-bold text-dark" style="font-size: 14px;">{{ Str::limit(Auth::user()->name, 15) }}</div>
                    <div class="text-muted" style="font-size: 11px;">{{ Str::limit(Auth::user()->email, 18) }}</div>
                </div>
            </div>
            
            <i class="fa-solid fa-angle-up text-muted small" :class="{ 'fa-rotate-180': open }"></i>
        </div>
    </div>
</div>
