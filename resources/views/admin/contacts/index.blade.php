<x-admin-layout>
    <div class="contacts-management">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="page-title mb-1">Contact Messages</h1>
                    <p class="page-subtitle mb-0">View and manage messages from website visitors</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\ContactMessage::count() }}</div>
                        <div class="stat-label">Total Messages</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\ContactMessage::whereDate('created_at', today())->count() }}</div>
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
                        <div class="stat-value">{{ \App\Models\ContactMessage::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</div>
                        <div class="stat-label">This Week</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="modern-card mb-4">
            <div class="card-body-modern p-4">
                <form method="GET" action="{{ route('admin.contacts.index') }}" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-10">
                            <div class="search-input-wrapper">
                                <i class="fa-solid fa-search search-icon"></i>
                                <input type="text" 
                                       name="search" 
                                       class="search-input" 
                                       placeholder="Search by name or email..." 
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn-filter btn-filter-primary flex-1">
                                    <i class="fa-solid fa-search"></i>
                                    Search
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('admin.contacts.index') }}" class="btn-filter btn-filter-secondary" title="Clear search">
                                        <i class="fa-solid fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contacts Table -->
        <div class="modern-card">
            <div class="card-header-modern">
                <h3 class="card-title-modern">
                    All Contact Messages
                    @if(request('search'))
                        <span class="results-count">({{ $contacts->total() }} results)</span>
                    @endif
                </h3>
            </div>
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message Preview</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>
                                    <div class="name-cell">
                                        <div class="name-avatar">
                                            {{ substr($contact->first_name, 0, 1) }}
                                        </div>
                                        <div class="name-info">
                                            <div class="name-value">{{ $contact->first_name }} {{ $contact->last_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="email-cell">{{ $contact->email }}</div>
                                </td>
                                <td>
                                    <div class="phone-cell">{{ $contact->phone }}</div>
                                </td>
                                <td>
                                    <div class="message-preview">
                                        {{ Str::limit($contact->message, 60) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <div>{{ $contact->created_at->format('M d, Y') }}</div>
                                        <div class="text-muted small">{{ $contact->created_at->diffForHumans() }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn-action btn-action-view" title="View Message">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-envelope"></i>
                                        <p>No contact messages found</p>
                                        @if(request('search'))
                                            <a href="{{ route('admin.contacts.index') }}" class="btn-modern btn-secondary mt-3">
                                                <i class="fa-solid fa-times"></i>
                                                Clear Search
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($contacts->hasPages())
                <div class="card-footer-modern">
                    <div class="pagination-info">
                        Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} messages
                    </div>
                    <div class="pagination-wrapper">
                        {{ $contacts->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .contacts-management {
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
            flex: 1;
        }

        .btn-filter-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(78, 47, 218, 0.3);
        }

        .btn-filter-secondary {
            background: #f3f4f6;
            color: #6b7280;
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

        .name-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .name-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
        }

        .name-value {
            font-weight: 600;
            color: #111827;
            font-size: 14px;
        }

        .email-cell,
        .phone-cell {
            color: #6b7280;
            font-size: 14px;
        }

        .message-preview {
            color: #6b7280;
            font-size: 13px;
            max-width: 300px;
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
        body.dark-mode .email-cell,
        body.dark-mode .phone-cell,
        body.dark-mode .message-preview,
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
        body.dark-mode .name-value {
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

        body.dark-mode .search-input {
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
                min-width: 900px;
            }

            .modern-table thead th,
            .modern-table tbody td {
                padding: 12px 16px;
                font-size: 13px;
            }

            .name-avatar {
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
