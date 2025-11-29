<x-admin-layout>
    <div class="posts-management">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="page-title mb-1">Blog Posts</h1>
                    <p class="page-subtitle mb-0">Manage your blog content and articles</p>
                </div>
                <a href="{{ route('admin.posts.create') }}" class="btn-modern btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    New Post
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\Post::count() }}</div>
                        <div class="stat-label">Total Posts</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-solid fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\Post::where('is_published', true)->count() }}</div>
                        <div class="stat-label">Published</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-value">{{ \App\Models\Post::where('is_published', false)->count() }}</div>
                        <div class="stat-label">Drafts</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search & Filter -->
        <div class="modern-card mb-4">
            <div class="card-header-modern">
                <h3 class="card-title-modern">Search & Filter</h3>
            </div>
            <div class="p-4">
                <form method="GET" action="{{ route('admin.posts.index') }}" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search by title or content..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn-modern btn-primary w-100">
                            <i class="fa-solid fa-filter"></i> Filter
                        </button>
                    </div>
                    @if(request('search') || request('status') || request('category'))
                        <div class="col-12">
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fa-solid fa-rotate-right"></i> Clear Filters
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <!-- Posts Table -->
        <div class="modern-card">
            <div class="card-header-modern">
                <h3 class="card-title-modern">All Posts</h3>
            </div>
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    <div class="post-cell">
                                        @if($post->featured_image)
                                            <img src="{{ Storage::url($post->featured_image) }}" alt="" class="post-thumb">
                                        @else
                                            <div class="post-thumb-placeholder">
                                                <i class="fa-solid fa-image"></i>
                                            </div>
                                        @endif
                                        <div class="post-info">
                                            <div class="post-title">{{ $post->title }}</div>
                                            <div class="post-meta">
                                                <i class="fa-solid fa-eye"></i> {{ number_format($post->views) }} views
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="author-cell">
                                        <div class="author-avatar">
                                            {{ substr($post->author->name, 0, 1) }}
                                        </div>
                                        <span>{{ $post->author->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($post->category)
                                        <span class="category-badge">{{ $post->category->name }}</span>
                                    @else
                                        <span class="text-muted small">Uncategorized</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->is_published)
                                        <span class="status-badge status-published">Published</span>
                                    @else
                                        <span class="status-badge status-draft">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <div>{{ $post->created_at->format('M d, Y') }}</div>
                                        <div class="text-muted small">{{ $post->created_at->diffForHumans() }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.posts.show', $post) }}" class="btn-action btn-action-view" title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn-action btn-action-edit" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-action-delete" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-file-pen"></i>
                                        <p>No posts found. Create your first blog post!</p>
                                        <a href="{{ route('admin.posts.create') }}" class="btn-modern btn-primary mt-3">
                                            Create Post
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($posts->hasPages())
                <div class="card-footer-modern">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>

    <style>
        .posts-management { padding: 0; }
        .page-title { font-size: 28px; font-weight: 700; color: #111827; }
        .page-subtitle { color: #6b7280; font-size: 14px; }
        
        .stat-card {
            background: white; border-radius: 12px; padding: 20px;
            display: flex; align-items: center; gap: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.2s;
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .stat-icon {
            width: 56px; height: 56px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; color: white;
        }
        .stat-icon.bg-primary { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); }
        .stat-icon.bg-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .stat-icon.bg-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .stat-value { font-size: 28px; font-weight: 700; color: #111827; }
        .stat-label { font-size: 13px; color: #6b7280; font-weight: 500; }

        .modern-card { background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header-modern { padding: 24px; border-bottom: 1px solid #f3f4f6; }
        .card-title-modern { font-size: 18px; font-weight: 700; color: #111827; margin: 0; }
        
        .modern-table { width: 100%; border-collapse: collapse; }
        .modern-table th { padding: 16px 24px; text-align: left; font-size: 12px; font-weight: 600; text-transform: uppercase; color: #6b7280; background: #f9fafb; border-bottom: 1px solid #e5e7eb; }
        .modern-table td { padding: 20px 24px; border-bottom: 1px solid #f3f4f6; vertical-align: middle; }
        .modern-table tr:hover { background: #f9fafb; }

        .post-cell { display: flex; align-items: center; gap: 16px; }
        .post-thumb { width: 60px; height: 40px; border-radius: 6px; object-fit: cover; }
        .post-thumb-placeholder { width: 60px; height: 40px; border-radius: 6px; background: #f3f4f6; display: flex; align-items: center; justify-content: center; color: #9ca3af; }
        .post-title { font-weight: 600; color: #111827; font-size: 14px; margin-bottom: 2px; }
        .post-meta { font-size: 12px; color: #9ca3af; }

        .author-cell { display: flex; align-items: center; gap: 10px; font-size: 14px; color: #374151; }
        .author-avatar { width: 28px; height: 28px; border-radius: 50%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; color: #6b7280; }

        .category-badge { background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 500; }
        
        .status-badge { padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .status-published { background: #ecfdf5; color: #059669; }
        .status-draft { background: #fffbeb; color: #d97706; }

        .action-buttons { display: flex; gap: 8px; justify-content: flex-end; }
        .btn-action { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none; }
        .btn-action-view { background: rgba(59, 130, 246, 0.1); color: #2563eb; }
        .btn-action-edit { background: rgba(245, 158, 11, 0.1); color: #d97706; }
        .btn-action-delete { background: rgba(239, 68, 68, 0.1); color: #dc2626; }
        .btn-action:hover { transform: translateY(-1px); }

        .btn-modern { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 10px; font-weight: 600; font-size: 14px; transition: all 0.2s; border: none; text-decoration: none; cursor: pointer; }
        .btn-modern.btn-primary { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); color: white; }
        .btn-modern.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(78, 47, 218, 0.3); }

        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state i { font-size: 48px; color: #d1d5db; margin-bottom: 16px; }
        .empty-state p { color: #9ca3af; font-size: 14px; }

        /* Dark Mode */
        body.dark-mode .page-title, body.dark-mode .stat-value, body.dark-mode .card-title-modern, body.dark-mode .post-title { color: #f3f4f6; }
        body.dark-mode .page-subtitle, body.dark-mode .stat-label, body.dark-mode .author-cell, body.dark-mode .date-cell { color: #9ca3af; }
        body.dark-mode .stat-card, body.dark-mode .modern-card { background: #1f2937; }
        body.dark-mode .modern-table th { background: #111827; color: #9ca3af; border-color: #374151; }
        body.dark-mode .modern-table td { border-color: #374151; }
        body.dark-mode .modern-table tr:hover { background: #374151; }
        body.dark-mode .card-header-modern, body.dark-mode .card-footer-modern { border-color: #374151; }
        body.dark-mode .post-thumb-placeholder { background: #374151; color: #6b7280; }
        body.dark-mode .category-badge { background: rgba(37, 99, 235, 0.2); color: #60a5fa; }
        body.dark-mode .status-published { background: rgba(5, 150, 105, 0.2); color: #34d399; }
        body.dark-mode .status-draft { background: rgba(217, 119, 6, 0.2); color: #fbbf24; }

        @media (max-width: 768px) {
            .table-container { overflow-x: auto; }
            .modern-table { min-width: 800px; }
        }
    </style>
</x-admin-layout>
