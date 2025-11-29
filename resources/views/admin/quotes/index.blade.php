<x-admin-layout>
    <div class="quotes-management">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="page-title mb-1">Quote Requests</h1>
                    <p class="page-subtitle mb-0">Manage and review quote requests from potential clients</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\QuoteRequest::count() }}</div>
                        <div class="stat-label">Total Requests</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\QuoteRequest::whereDate('created_at', today())->count() }}</div>
                        <div class="stat-label">Today</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fa-solid fa-calendar-week"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\QuoteRequest::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</div>
                        <div class="stat-label">This Week</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="modern-card mb-4">
            <div class="card-body-modern p-4">
                <form method="GET" action="{{ route('admin.quotes.index') }}" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <div class="search-input-wrapper">
                                <i class="fa-solid fa-search search-icon"></i>
                                <input type="text" 
                                       name="search" 
                                       class="search-input" 
                                       placeholder="Search by company or email..." 
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="timeline" class="filter-select">
                                <option value="">All Timelines</option>
                                <option value="Immediate" {{ request('timeline') === 'Immediate' ? 'selected' : '' }}>Immediate</option>
                                <option value="1-3 months" {{ request('timeline') === '1-3 months' ? 'selected' : '' }}>1-3 months</option>
                                <option value="3-6 months" {{ request('timeline') === '3-6 months' ? 'selected' : '' }}>3-6 months</option>
                                <option value="6+ months" {{ request('timeline') === '6+ months' ? 'selected' : '' }}>6+ months</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn-filter btn-filter-primary w-100">
                                <i class="fa-solid fa-filter"></i>
                                Filter
                            </button>
                        </div>
                        <div class="col-md-2">
                            @if(request()->hasAny(['search', 'timeline', 'industry']))
                                <a href="{{ route('admin.quotes.index') }}" class="btn-filter btn-filter-secondary w-100">
                                    <i class="fa-solid fa-times"></i>
                                    Clear
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quotes Table -->
        <div class="modern-card">
            <div class="card-header-modern">
                <h3 class="card-title-modern">
                    All Quote Requests
                    @if(request()->hasAny(['search', 'timeline', 'industry']))
                        <span class="results-count">({{ $quotes->total() }} results)</span>
                    @endif
                </h3>
            </div>
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Contact</th>
                            <th>Services</th>
                            <th>Timeline</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotes as $quote)
                            <tr>
                                <td>
                                    <div class="company-cell">
                                        <div class="company-avatar">
                                            {{ substr($quote->company_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="company-name">{{ $quote->company_name }}</div>
                                            <div class="company-meta">{{ $quote->industry }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="contact-cell">
                                        <div>{{ $quote->email }}</div>
                                        <div class="text-muted small">{{ $quote->phone }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="services-cell">
                                        @php
                                            $services = $quote->services;
                                            // If it's already an array from the cast, use it
                                            // Otherwise it might be a string that needs decoding
                                            if (!is_array($services) && is_string($services)) {
                                                $services = json_decode($services, true);
                                            }
                                        @endphp
                                        @if(is_array($services) && count($services) > 0)
                                            <div class="services-list">
                                                @foreach($services as $index => $service)
                                                    @if($index < 2)
                                                        <span class="service-tag">{{ $service }}</span>
                                                    @endif
                                                @endforeach
                                                @if(count($services) > 2)
                                                    <span class="service-more">+{{ count($services) - 2 }} more</span>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-muted">None</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="timeline-badge timeline-{{ strtolower(str_replace([' ', '+'], ['-', 'plus'], $quote->timeline)) }}">
                                        {{ $quote->timeline }}
                                    </span>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <div>{{ $quote->created_at->format('M d, Y') }}</div>
                                        <div class="text-muted small">{{ $quote->created_at->diffForHumans() }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.quotes.show', $quote) }}" class="btn-action btn-action-view" title="View Details">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-file-invoice"></i>
                                        <p>No quote requests found</p>
                                        @if(request()->hasAny(['search', 'timeline', 'industry']))
                                            <a href="{{ route('admin.quotes.index') }}" class="btn-modern btn-secondary mt-3">
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
            
            @if($quotes->hasPages())
                <div class="card-footer-modern">
                    <div class="pagination-info">
                        Showing {{ $quotes->firstItem() }} to {{ $quotes->lastItem() }} of {{ $quotes->total() }} requests
                    </div>
                    <div class="pagination-wrapper">
                        {{ $quotes->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .quotes-management {
            padding: 0;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 14px;
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

        .search-input-wrapper {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
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
        }

        .filter-select:focus {
            outline: none;
            border-color: #4E2FDA;
            box-shadow: 0 0 0 4px rgba(78, 47, 218, 0.1);
        }

        .btn-filter {
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

        .modern-table tbody tr:hover {
            background: #f9fafb;
        }

        .company-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .company-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
        }

        .company-name {
            font-weight: 600;
            color: #111827;
            font-size: 14px;
        }

        .company-meta {
            font-size: 12px;
            color: #9ca3af;
        }

        .contact-cell {
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

        .timeline-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .timeline-immediate {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .timeline-1-3-months {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .timeline-3-6-months {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }

        .timeline-6plus-months {
            background: rgba(107, 114, 128, 0.1);
            color: #6b7280;
        }

        .date-cell {
            color: #6b7280;
            font-size: 14px;
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
            text-decoration: none;
        }

        .btn-action-view {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }

        .btn-action-view:hover {
            background: rgba(59, 130, 246, 0.2);
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
            text-decoration: none;
        }

        .btn-modern.btn-secondary {
            background: #f3f4f6;
            color: #6b7280;
        }

        /* Dark Mode */
        body.dark-mode .page-title {
            color: #f3f4f6;
        }

        body.dark-mode .page-subtitle,
        body.dark-mode .contact-cell,
        body.dark-mode .date-cell,
        body.dark-mode .pagination-info {
            color: #9ca3af;
        }

        body.dark-mode .stat-card,
        body.dark-mode .modern-card {
            background: #1f2937;
        }

        body.dark-mode .stat-value,
        body.dark-mode .card-title-modern,
        body.dark-mode .company-name {
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

            .table-container {
                overflow-x: auto;
            }

            .modern-table {
                min-width: 800px;
            }

            .modern-table thead th,
            .modern-table tbody td {
                padding: 12px 16px;
                font-size: 13px;
            }

            .company-avatar {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .card-footer-modern {
                flex-direction: column;
                align-items: flex-start;
            }

            .pagination-wrapper {
                width: 100%;
            }
        }
    </style>
</x-admin-layout>
