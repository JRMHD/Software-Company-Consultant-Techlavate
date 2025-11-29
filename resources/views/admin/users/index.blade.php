<x-admin-layout>
    <div class="users-management">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="page-title mb-1">User Management</h1>
                    <p class="page-subtitle mb-0">Manage users, roles, and permissions</p>
                </div>
                <a href="{{ route('admin.users.create') }}" class="btn-modern btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    <span>Add New User</span>
                </a>
            </div>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert-modern alert-success mb-4">
                <i class="fa-solid fa-check-circle"></i>
                <span>{{ session('success') }}</span>
                <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-modern alert-danger mb-4">
                <i class="fa-solid fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
                <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\User::count() }}</div>
                        <div class="stat-label">Total Users</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\User::where('last_seen_at', '>', now()->subMinutes(5))->count() }}</div>
                        <div class="stat-label">Online Now</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
                        <div class="stat-label">Admins</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\User::where('role', 'user')->count() }}</div>
                        <div class="stat-label">Regular Users</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="modern-card mb-4">
            <div class="card-body-modern p-4">
                <form method="GET" action="{{ route('admin.users.index') }}" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="search-input-wrapper">
                                <i class="fa-solid fa-search search-icon"></i>
                                <input type="text" 
                                       name="search" 
                                       class="search-input" 
                                       placeholder="Search by name or email..." 
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="role" class="filter-select">
                                <option value="">All Roles</option>
                                <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="filter-select">
                                <option value="">All Status</option>
                                <option value="online" {{ request('status') === 'online' ? 'selected' : '' }}>Online</option>
                                <option value="offline" {{ request('status') === 'offline' ? 'selected' : '' }}>Offline</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn-filter btn-filter-primary">
                                    <i class="fa-solid fa-filter"></i>
                                    Filter
                                </button>
                                @if(request()->hasAny(['search', 'role', 'status']))
                                    <a href="{{ route('admin.users.index') }}" class="btn-filter btn-filter-secondary" title="Clear filters">
                                        <i class="fa-solid fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="modern-card">
            <div class="card-header-modern">
                <h3 class="card-title-modern">
                    All Users 
                    @if(request()->hasAny(['search', 'role', 'status']))
                        <span class="results-count">({{ $users->total() }} results)</span>
                    @endif
                </h3>
            </div>
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Activity</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar" style="background: linear-gradient(135deg, {{ $user->isAdmin() ? '#dc2626' : '#4E2FDA' }} 0%, {{ $user->isAdmin() ? '#ef4444' : '#7c3aed' }} 100%);">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <div class="user-info">
                                            <div class="user-name">{{ $user->name }}</div>
                                            <div class="user-meta">ID: {{ $user->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="email-cell">{{ $user->email }}</div>
                                </td>
                                <td>
                                    <span class="badge-modern badge-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                        <i class="fa-solid fa-{{ $user->role === 'admin' ? 'shield-halved' : 'user' }}"></i>
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    @if($user->isOnline())
                                        <span class="status-badge status-online">
                                            <span class="status-dot"></span>
                                            Online
                                        </span>
                                    @else
                                        <span class="status-badge status-offline">
                                            <span class="status-dot"></span>
                                            Offline
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="activity-cell">
                                        @if($user->last_seen_at)
                                            <i class="fa-regular fa-clock"></i>
                                            {{ $user->last_seen_at->diffForHumans() }}
                                        @else
                                            <span class="text-muted">Never</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn-action btn-action-view" title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn-action btn-action-edit" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-action-delete" title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-users"></i>
                                        <p>No users found</p>
                                        @if(request()->hasAny(['search', 'role', 'status']))
                                            <a href="{{ route('admin.users.index') }}" class="btn-modern btn-secondary mt-3">
                                                <i class="fa-solid fa-times"></i>
                                                Clear Filters
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($users->hasPages())
                <div class="card-footer-modern">
                    <div class="pagination-info">
                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
                    </div>
                    <div class="pagination-wrapper">
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .users-management {
            padding: 0;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 14px;
        }

        .btn-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-modern.btn-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(78, 47, 218, 0.3);
        }

        .btn-modern.btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 47, 218, 0.4);
        }

        .btn-modern.btn-secondary {
            background: #f3f4f6;
            color: #6b7280;
        }

        .btn-modern.btn-secondary:hover {
            background: #e5e7eb;
            color: #374151;
        }

        .alert-modern {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-modern i:first-child {
            font-size: 20px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-close {
            margin-left: auto;
            background: none;
            border: none;
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.2s;
        }

        .alert-close:hover {
            opacity: 1;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .stat-icon.bg-primary { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); }
        .stat-icon.bg-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-icon.bg-danger { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
        .stat-icon.bg-info { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .stat-label {
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
        }

        .modern-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-body-modern {
            padding: 24px;
        }

        /* Search and Filter Styles */
        .search-form {
            margin: 0;
        }

        .search-input-wrapper {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: #4E2FDA;
            box-shadow: 0 0 0 4px rgba(78, 47, 218, 0.1);
        }

        .filter-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s;
            background: white;
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;
            border-color: #4E2FDA;
            box-shadow: 0 0 0 4px rgba(78, 47, 218, 0.1);
        }

        .btn-filter {
            flex: 1;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-filter-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
            color: white;
        }

        .btn-filter-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(78, 47, 218, 0.3);
        }

        .btn-filter-secondary {
            background: #f3f4f6;
            color: #6b7280;
            flex: 0;
            padding: 12px 16px;
        }

        .btn-filter-secondary:hover {
            background: #e5e7eb;
        }

        .card-header-modern {
            padding: 24px;
            border-bottom: 1px solid #f3f4f6;
        }

        .card-title-modern {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .results-count {
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
        }

        .table-container {
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
        }

        .modern-table thead th {
            padding: 16px 24px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        .modern-table tbody td {
            padding: 20px 24px;
            border-bottom: 1px solid #f3f4f6;
        }

        .modern-table tbody tr {
            transition: background 0.2s;
        }

        .modern-table tbody tr:hover {
            background: #f9fafb;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
        }

        .user-name {
            font-weight: 600;
            color: #111827;
            font-size: 14px;
        }

        .user-meta {
            font-size: 12px;
            color: #9ca3af;
        }

        .email-cell {
            color: #6b7280;
            font-size: 14px;
        }

        .badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-modern.badge-primary {
            background: rgba(78, 47, 218, 0.1);
            color: #4E2FDA;
        }

        .badge-modern.badge-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-online {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .status-offline {
            background: rgba(107, 114, 128, 0.1);
            color: #6b7280;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .activity-cell {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #6b7280;
            font-size: 13px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }

        .btn-action-view {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }

        .btn-action-view:hover {
            background: rgba(59, 130, 246, 0.2);
        }

        .btn-action-edit {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .btn-action-edit:hover {
            background: rgba(245, 158, 11, 0.2);
        }

        .btn-action-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .btn-action-delete:hover {
            background: rgba(239, 68, 68, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 16px;
        }

        .empty-state p {
            color: #9ca3af;
            font-size: 14px;
            margin: 0;
        }

        .card-footer-modern {
            padding: 20px 24px;
            border-top: 1px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .pagination-info {
            font-size: 14px;
            color: #6b7280;
        }

        .pagination-wrapper {
            display: flex;
            gap: 8px;
        }

        /* Dark Mode */
        body.dark-mode .page-title {
            color: #f3f4f6;
        }

        body.dark-mode .page-subtitle,
        body.dark-mode .email-cell,
        body.dark-mode .activity-cell,
        body.dark-mode .pagination-info {
            color: #9ca3af;
        }

        body.dark-mode .stat-card,
        body.dark-mode .modern-card {
            background: #1f2937;
        }

        body.dark-mode .stat-value,
        body.dark-mode .card-title-modern,
        body.dark-mode .user-name {
            color: #f3f4f6;
        }

        body.dark-mode .modern-table thead th {
            background: #111827;
            color: #9ca3af;
        }

        body.dark-mode .modern-table tbody tr:hover {
            background: #374151;
        }

        body.dark-mode .modern-table tbody td {
            border-color: #374151;
        }

        body.dark-mode .card-header-modern,
        body.dark-mode .card-footer-modern {
            border-color: #374151;
        }

        body.dark-mode .search-input,
        body.dark-mode .filter-select {
            background: #111827;
            border-color: #374151;
            color: #f3f4f6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-icon {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }

            .stat-value {
                font-size: 24px;
            }

            .modern-table thead th,
            .modern-table tbody td {
                padding: 12px 16px;
            }

            .user-avatar {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .card-footer-modern {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</x-admin-layout>
