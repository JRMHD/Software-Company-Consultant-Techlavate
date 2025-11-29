<x-admin-layout>
    <div class="profile-page">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.users.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div class="flex-grow-1">
                    <h1 class="page-title mb-1">User Profile</h1>
                    <p class="page-subtitle mb-0">View detailed user information</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn-modern btn-primary">
                        <i class="fa-solid fa-pen"></i>
                        <span class="d-none d-sm-inline">Edit</span>
                    </a>
                    @if($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-modern btn-danger">
                                <i class="fa-solid fa-trash"></i>
                                <span class="d-none d-sm-inline">Delete</span>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Profile Card -->
            <div class="col-lg-4">
                <div class="modern-card">
                    <div class="profile-header">
                        <div class="profile-avatar" style="background: linear-gradient(135deg, {{ $user->isAdmin() ? '#dc2626' : '#4E2FDA' }} 0%, {{ $user->isAdmin() ? '#ef4444' : '#7c3aed' }} 100%);">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <h2 class="profile-name">{{ $user->name }}</h2>
                        <p class="profile-email">{{ $user->email }}</p>
                        
                        <div class="profile-badges">
                            <span class="badge-modern badge-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                <i class="fa-solid fa-{{ $user->role === 'admin' ? 'shield-halved' : 'user' }}"></i>
                                {{ ucfirst($user->role) }}
                            </span>
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
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="modern-card mt-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Quick Stats</h3>
                    </div>
                    <div class="stats-list">
                        <div class="stat-item">
                            <div class="stat-item-icon bg-primary">
                                <i class="fa-solid fa-calendar-plus"></i>
                            </div>
                            <div class="stat-item-content">
                                <div class="stat-item-label">Member Since</div>
                                <div class="stat-item-value">{{ $user->created_at->format('M d, Y') }}</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-item-icon bg-success">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="stat-item-content">
                                <div class="stat-item-label">Last Active</div>
                                <div class="stat-item-value">
                                    @if($user->last_seen_at)
                                        {{ $user->last_seen_at->diffForHumans() }}
                                    @else
                                        Never
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-item-icon bg-info">
                                <i class="fa-solid fa-fingerprint"></i>
                            </div>
                            <div class="stat-item-content">
                                <div class="stat-item-label">User ID</div>
                                <div class="stat-item-value">#{{ $user->id }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Card -->
            <div class="col-lg-8">
                <div class="modern-card">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Account Information</h3>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Full Name</div>
                                <div class="info-value">{{ $user->name }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Email Address</div>
                                <div class="info-value">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Role</div>
                                <div class="info-value">{{ ucfirst($user->role) }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Account Status</div>
                                <div class="info-value">
                                    @if($user->isOnline())
                                        <span class="text-success fw-semibold">Active Now</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-calendar"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Created At</div>
                                <div class="info-value">{{ $user->created_at->format('F d, Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Last Updated</div>
                                <div class="info-value">{{ $user->updated_at->format('F d, Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Timeline -->
                <div class="modern-card mt-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Activity Timeline</h3>
                    </div>
                    <div class="timeline">
                        @if($user->last_seen_at)
                            <div class="timeline-item">
                                <div class="timeline-dot bg-success"></div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Last Activity</div>
                                    <div class="timeline-time">{{ $user->last_seen_at->diffForHumans() }}</div>
                                    <div class="timeline-desc">{{ $user->last_seen_at->format('F d, Y \a\t h:i A') }}</div>
                                </div>
                            </div>
                        @endif
                        <div class="timeline-item">
                            <div class="timeline-dot bg-primary"></div>
                            <div class="timeline-content">
                                <div class="timeline-title">Account Created</div>
                                <div class="timeline-time">{{ $user->created_at->diffForHumans() }}</div>
                                <div class="timeline-desc">{{ $user->created_at->format('F d, Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-page {
            padding: 0;
        }

        .btn-back {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1px solid #e5e7eb;
            color: #6b7280;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #f9fafb;
            color: #111827;
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
            padding: 12px 20px;
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

        .btn-modern.btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-modern.btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .modern-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-header {
            padding: 40px 32px;
            text-align: center;
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 48px;
            margin: 0 auto 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .profile-name {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .profile-email {
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .profile-badges {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
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
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
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
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .card-header-simple {
            padding: 24px 32px;
            border-bottom: 1px solid #f3f4f6;
        }

        .card-title-simple {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .stats-list {
            padding: 24px 32px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .stat-item:last-child {
            border-bottom: none;
        }

        .stat-item-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            flex-shrink: 0;
        }

        .stat-item-icon.bg-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
        }

        .stat-item-icon.bg-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .stat-item-icon.bg-info {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .stat-item-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .stat-item-value {
            font-size: 15px;
            font-weight: 600;
            color: #111827;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            padding: 32px;
        }

        .info-item {
            display: flex;
            gap: 16px;
        }

        .info-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 18px;
            flex-shrink: 0;
        }

        .info-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #111827;
        }

        .timeline {
            padding: 32px;
        }

        .timeline-item {
            display: flex;
            gap: 20px;
            padding-bottom: 24px;
            position: relative;
        }

        .timeline-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 40px;
            bottom: 0;
            width: 2px;
            background: #e5e7eb;
        }

        .timeline-dot {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .timeline-dot.bg-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .timeline-dot.bg-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
        }

        .timeline-title {
            font-size: 15px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 4px;
        }

        .timeline-time {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .timeline-desc {
            font-size: 12px;
            color: #9ca3af;
        }

        /* Dark Mode */
        body.dark-mode .btn-back {
            background: #1f2937;
            border-color: #374151;
            color: #9ca3af;
        }

        body.dark-mode .btn-back:hover {
            background: #374151;
            color: #f3f4f6;
        }

        body.dark-mode .page-title {
            color: #f3f4f6;
        }

        body.dark-mode .page-subtitle {
            color: #9ca3af;
        }

        body.dark-mode .modern-card {
            background: #1f2937;
        }

        body.dark-mode .profile-header {
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        }

        body.dark-mode .profile-name,
        body.dark-mode .card-title-simple,
        body.dark-mode .stat-item-value,
        body.dark-mode .info-value,
        body.dark-mode .timeline-title {
            color: #f3f4f6;
        }

        body.dark-mode .profile-email,
        body.dark-mode .stat-item-label,
        body.dark-mode .info-label,
        body.dark-mode .timeline-time {
            color: #9ca3af;
        }

        body.dark-mode .card-header-simple {
            border-color: #374151;
        }

        body.dark-mode .stat-item {
            border-color: #374151;
        }

        body.dark-mode .info-icon {
            background: #111827;
            color: #9ca3af;
        }

        body.dark-mode .timeline-item:not(:last-child)::before {
            background: #374151;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }

            .profile-name {
                font-size: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 24px;
            }

            .stats-list,
            .timeline {
                padding: 24px;
            }
        }
    </style>
</x-admin-layout>
