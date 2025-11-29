<x-admin-layout>
    <div class="dashboard-container">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="page-title mb-1">Dashboard</h1>
                    <p class="page-subtitle mb-0">Welcome back! Here's what's happening with your platform.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn-modern btn-outline" onclick="window.location.reload()">
                        <i class="fa-solid fa-rotate-right"></i> Refresh
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-primary">
                    <div class="stat-card-body">
                        <div class="stat-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-label">Total Users</div>
                            <div class="stat-value">{{ number_format($totalUsers) }}</div>
                            <div class="stat-growth {{ $usersGrowth >= 0 ? 'positive' : 'negative' }}">
                                <i class="fa-solid fa-arrow-{{ $usersGrowth >= 0 ? 'up' : 'down' }}"></i>
                                {{ abs($usersGrowth) }}% this month
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-success">
                    <div class="stat-card-body">
                        <div class="stat-icon">
                            <i class="fa-solid fa-pen-nib"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-label">Blog Posts</div>
                            <div class="stat-value">{{ number_format($totalPosts) }}</div>
                            <div class="stat-growth {{ $postsGrowth >= 0 ? 'positive' : 'negative' }}">
                                <i class="fa-solid fa-arrow-{{ $postsGrowth >= 0 ? 'up' : 'down' }}"></i>
                                {{ abs($postsGrowth) }}% this month
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-warning">
                    <div class="stat-card-body">
                        <div class="stat-icon">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-label">Quote Requests</div>
                            <div class="stat-value">{{ number_format($totalQuotes) }}</div>
                            <div class="stat-growth {{ $quotesGrowth >= 0 ? 'positive' : 'negative' }}">
                                <i class="fa-solid fa-arrow-{{ $quotesGrowth >= 0 ? 'up' : 'down' }}"></i>
                                {{ abs($quotesGrowth) }}% this month
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card stat-card-info">
                    <div class="stat-card-body">
                        <div class="stat-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-label">Contact Messages</div>
                            <div class="stat-value">{{ number_format($totalContacts) }}</div>
                            <div class="stat-growth {{ $contactsGrowth >= 0 ? 'positive' : 'negative' }}">
                                <i class="fa-solid fa-arrow-{{ $contactsGrowth >= 0 ? 'up' : 'down' }}"></i>
                                {{ abs($contactsGrowth) }}% this month
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h3 class="card-title-modern">Activity Overview</h3>
                        <p class="card-subtitle">Last 7 days performance</p>
                    </div>
                    <div class="card-body-modern">
                        <canvas id="activityChart" height="80"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h3 class="card-title-modern">Quick Stats</h3>
                        <p class="card-subtitle">Last 30 days</p>
                    </div>
                    <div class="card-body-modern">
                        <div class="quick-stat-item">
                            <div class="quick-stat-icon bg-primary">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <div class="quick-stat-content">
                                <div class="quick-stat-value">{{ number_format($recentUsers) }}</div>
                                <div class="quick-stat-label">New Users</div>
                            </div>
                        </div>
                        <div class="quick-stat-item">
                            <div class="quick-stat-icon bg-success">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div class="quick-stat-content">
                                <div class="quick-stat-value">{{ number_format($recentPosts) }}</div>
                                <div class="quick-stat-label">New Posts</div>
                            </div>
                        </div>
                        <div class="quick-stat-item">
                            <div class="quick-stat-icon bg-warning">
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <div class="quick-stat-content">
                                <div class="quick-stat-value">{{ number_format($recentQuotes) }}</div>
                                <div class="quick-stat-label">New Quotes</div>
                            </div>
                        </div>
                        <div class="quick-stat-item">
                            <div class="quick-stat-icon bg-info">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="quick-stat-content">
                                <div class="quick-stat-value">{{ number_format($recentContacts) }}</div>
                                <div class="quick-stat-label">New Messages</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row g-4 mb-4">
            <!-- Top Posts -->
            <div class="col-lg-6">
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h3 class="card-title-modern">Top Blog Posts</h3>
                        <p class="card-subtitle">Most viewed posts</p>
                    </div>
                    <div class="card-body-modern p-0">
                        <div class="list-group list-group-flush">
                            @forelse($topPosts as $post)
                                <div class="list-group-item-modern">
                                    <div class="d-flex align-items-center gap-3">
                                        @if($post->featured_image)
                                            <img src="{{ Storage::url($post->featured_image) }}" alt="" class="post-thumb-small">
                                        @else
                                            <div class="post-thumb-small-placeholder">
                                                <i class="fa-solid fa-image"></i>
                                            </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <div class="item-title">{{ Str::limit($post->title, 50) }}</div>
                                            <div class="item-meta">
                                                <span><i class="fa-solid fa-eye"></i> {{ number_format($post->views) }} views</span>
                                                <span><i class="fa-solid fa-calendar"></i> {{ $post->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn-icon">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="list-group-item-modern text-center py-4">
                                    <i class="fa-solid fa-inbox text-muted" style="font-size: 32px;"></i>
                                    <p class="text-muted mt-2 mb-0">No blog posts yet</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="col-lg-6">
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h3 class="card-title-modern">Recent Activity</h3>
                        <p class="card-subtitle">Latest platform updates</p>
                    </div>
                    <div class="card-body-modern p-0">
                        <div class="activity-timeline">
                            @forelse($recentActivity as $activity)
                                <div class="activity-item">
                                    <div class="activity-icon bg-{{ $activity['color'] }}">
                                        <i class="fa-solid {{ $activity['icon'] }}"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-message">{{ $activity['message'] }}</div>
                                        <div class="activity-time">{{ $activity['time']->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <i class="fa-solid fa-clock text-muted" style="font-size: 32px;"></i>
                                    <p class="text-muted mt-2 mb-0">No recent activity</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Users & Quotes -->
        <div class="row g-4">
            <!-- Latest Users -->
            <div class="col-lg-6">
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h3 class="card-title-modern">Latest Users</h3>
                        <p class="card-subtitle">Recently registered</p>
                    </div>
                    <div class="card-body-modern p-0">
                        <div class="table-responsive">
                            <table class="modern-table-compact">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestUsers as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="user-avatar-small">{{ substr($user->name, 0, 1) }}</div>
                                                    <span>{{ $user->name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span class="badge-role">{{ ucfirst($user->role) }}</span>
                                            </td>
                                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <i class="fa-solid fa-users text-muted" style="font-size: 32px;"></i>
                                                <p class="text-muted mt-2 mb-0">No users yet</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest Quote Requests -->
            <div class="col-lg-6">
                <div class="modern-card">
                    <div class="card-header-modern">
                        <h3 class="card-title-modern">Latest Quote Requests</h3>
                        <p class="card-subtitle">Recent inquiries</p>
                    </div>
                    <div class="card-body-modern p-0">
                        <div class="table-responsive">
                            <table class="modern-table-compact">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestQuotes as $quote)
                                        <tr>
                                            <td>{{ $quote->name }}</td>
                                            <td>{{ $quote->email }}</td>
                                            <td>{{ Str::limit($quote->service ?? 'N/A', 20) }}</td>
                                            <td>{{ $quote->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <i class="fa-solid fa-file-invoice text-muted" style="font-size: 32px;"></i>
                                                <p class="text-muted mt-2 mb-0">No quote requests yet</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <script>
        // Activity Chart
        const ctx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($last7Days) !!},
                datasets: [
                    {
                        label: 'Users',
                        data: {!! json_encode($usersChartData) !!},
                        borderColor: '#4E2FDA',
                        backgroundColor: 'rgba(78, 47, 218, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Posts',
                        data: {!! json_encode($postsChartData) !!},
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Quotes',
                        data: {!! json_encode($quotesChartData) !!},
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(245, 158, 11, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Messages',
                        data: {!! json_encode($contactsChartData) !!},
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 15,
                            font: {
                                family: 'Sora',
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            family: 'Sora',
                            size: 13
                        },
                        bodyFont: {
                            family: 'Sora',
                            size: 12
                        },
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            font: {
                                family: 'Sora'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                family: 'Sora'
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>

    <style>
        .dashboard-container { padding: 0; }
        .page-title { font-size: 28px; font-weight: 700; color: #111827; }
        .page-subtitle { color: #6b7280; font-size: 14px; }

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s;
            position: relative;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.1);
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }
        .stat-card-primary::before { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); }
        .stat-card-success::before { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-card-warning::before { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .stat-card-info::before { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }

        .stat-card-body {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .stat-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            flex-shrink: 0;
        }
        .stat-card-primary .stat-icon { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); }
        .stat-card-success .stat-icon { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-card-warning .stat-icon { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .stat-card-info .stat-icon { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }

        .stat-content { flex: 1; }
        .stat-label { font-size: 13px; color: #6b7280; font-weight: 500; margin-bottom: 4px; }
        .stat-value { font-size: 32px; font-weight: 700; color: #111827; margin-bottom: 6px; }
        .stat-growth {
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .stat-growth.positive { color: #059669; }
        .stat-growth.negative { color: #dc2626; }

        /* Modern Card */
        .modern-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
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
        .card-subtitle {
            font-size: 13px;
            color: #6b7280;
            margin: 4px 0 0 0;
        }
        .card-body-modern {
            padding: 24px;
        }

        /* Quick Stats */
        .quick-stat-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .quick-stat-item:last-child {
            border-bottom: none;
        }
        .quick-stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }
        .quick-stat-icon.bg-primary { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); }
        .quick-stat-icon.bg-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .quick-stat-icon.bg-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .quick-stat-icon.bg-info { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }

        .quick-stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
        }
        .quick-stat-label {
            font-size: 13px;
            color: #6b7280;
        }

        /* List Items */
        .list-group-item-modern {
            padding: 16px 24px;
            border-bottom: 1px solid #f3f4f6;
        }
        .list-group-item-modern:last-child {
            border-bottom: none;
        }
        .post-thumb-small {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            object-fit: cover;
        }
        .post-thumb-small-placeholder {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
        }
        .item-title {
            font-weight: 600;
            color: #111827;
            font-size: 14px;
            margin-bottom: 4px;
        }
        .item-meta {
            font-size: 12px;
            color: #9ca3af;
            display: flex;
            gap: 12px;
        }
        .item-meta i {
            margin-right: 4px;
        }

        /* Activity Timeline */
        .activity-timeline {
            padding: 16px 24px;
        }
        .activity-item {
            display: flex;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            flex-shrink: 0;
        }
        .activity-icon.bg-primary { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); }
        .activity-icon.bg-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .activity-icon.bg-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .activity-icon.bg-info { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }

        .activity-message {
            font-size: 14px;
            color: #374151;
            font-weight: 500;
        }
        .activity-time {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 2px;
        }

        /* Compact Table */
        .modern-table-compact {
            width: 100%;
            border-collapse: collapse;
        }
        .modern-table-compact th {
            padding: 12px 24px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            color: #6b7280;
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }
        .modern-table-compact td {
            padding: 14px 24px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 13px;
            color: #374151;
        }
        .modern-table-compact tr:hover {
            background: #f9fafb;
        }

        .user-avatar-small {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
        }

        .badge-role {
            background: #eff6ff;
            color: #2563eb;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .btn-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-modern.btn-outline {
            background: white;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }
        .btn-modern.btn-outline:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(78, 47, 218, 0.1);
            color: #4E2FDA;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-icon:hover {
            background: #4E2FDA;
            color: white;
        }

        /* Dark Mode */
        body.dark-mode .page-title, body.dark-mode .stat-value, body.dark-mode .card-title-modern, body.dark-mode .item-title, body.dark-mode .activity-message, body.dark-mode .quick-stat-value { color: #f3f4f6; }
        body.dark-mode .page-subtitle, body.dark-mode .stat-label, body.dark-mode .card-subtitle, body.dark-mode .quick-stat-label { color: #9ca3af; }
        body.dark-mode .stat-card, body.dark-mode .modern-card { background: #1f2937; }
        body.dark-mode .card-header-modern { border-color: #374151; }
        body.dark-mode .list-group-item-modern, body.dark-mode .activity-item { border-color: #374151; }
        body.dark-mode .modern-table-compact th { background: #111827; color: #9ca3af; border-color: #374151; }
        body.dark-mode .modern-table-compact td { border-color: #374151; color: #d1d5db; }
        body.dark-mode .modern-table-compact tr:hover { background: #374151; }
        body.dark-mode .post-thumb-small-placeholder { background: #374151; }
        body.dark-mode .quick-stat-item { border-color: #374151; }

        /* Responsive */
        @media (max-width: 768px) {
            .stat-card-body {
                padding: 20px;
                gap: 16px;
            }
            .stat-icon {
                width: 56px;
                height: 56px;
                font-size: 24px;
            }
            .stat-value {
                font-size: 28px;
            }
            .card-body-modern {
                padding: 16px;
            }
        }
    </style>
</x-admin-layout>
