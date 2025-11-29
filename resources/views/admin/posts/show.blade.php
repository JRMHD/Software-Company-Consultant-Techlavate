<x-admin-layout>
    <div class="posts-management">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.posts.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div class="flex-grow-1">
                    <h1 class="page-title mb-1">Post Preview</h1>
                    <p class="page-subtitle mb-0">Preview how your post looks</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn-modern btn-primary">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-modern btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Main Content Preview -->
            <div class="col-lg-8">
                <div class="modern-card overflow-hidden">
                    @if($post->featured_image)
                        <div class="post-hero-image">
                            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
                        </div>
                    @endif
                    
                    <div class="post-content p-5">
                        <div class="post-meta mb-3">
                            @if($post->category)
                                <span class="category-badge">{{ $post->category->name }}</span>
                            @endif
                            <span class="text-muted mx-2">•</span>
                            <span class="text-muted">{{ $post->created_at->format('M d, Y') }}</span>
                            <span class="text-muted mx-2">•</span>
                            <span class="text-muted">By {{ $post->author->name }}</span>
                        </div>

                        <h1 class="post-title-large mb-4">{{ $post->title }}</h1>

                        <div class="post-body">
                            {!! $post->body !!}
                        </div>
                        
                        @if($post->tags->count() > 0)
                            <div class="post-tags mt-5 pt-4 border-top">
                                <span class="text-muted me-2">Tags:</span>
                                @foreach($post->tags as $tag)
                                    <span class="tag-badge">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-4">
                <!-- Status Card -->
                <div class="modern-card p-4 mb-4">
                    <h3 class="section-title mb-3">Status</h3>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted">Status</span>
                        @if($post->is_published)
                            <span class="status-badge status-published">Published</span>
                        @else
                            <span class="status-badge status-draft">Draft</span>
                        @endif
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-muted">Published Date</span>
                        <span class="fw-medium">{{ $post->published_at ? $post->published_at->format('M d, Y H:i') : 'Not scheduled' }}</span>
                    </div>
                </div>

                <!-- SEO Preview -->
                <div class="modern-card p-4">
                    <h3 class="section-title mb-3">SEO Preview</h3>
                    <div class="seo-preview-card">
                        <div class="seo-title">{{ $post->meta_title ?: $post->title }}</div>
                        <div class="seo-url">{{ config('app.url') }}/blog/{{ $post->slug }}</div>
                        <div class="seo-desc">{{ $post->meta_description ?: Str::limit(strip_tags($post->body), 160) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .posts-management { padding: 0; }
        .page-title { font-size: 28px; font-weight: 700; color: #111827; }
        .page-subtitle { color: #6b7280; font-size: 14px; }
        
        .btn-back {
            width: 44px; height: 44px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            background: white; border: 1px solid #e5e7eb; color: #6b7280;
            transition: all 0.2s; text-decoration: none;
        }
        .btn-back:hover { background: #f9fafb; color: #111827; }

        .modern-card { background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .section-title { font-size: 16px; font-weight: 700; color: #111827; margin-bottom: 16px; }

        .post-hero-image { width: 100%; height: 300px; overflow: hidden; }
        .post-hero-image img { width: 100%; height: 100%; object-fit: cover; }
        
        .category-badge { background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .post-title-large { font-size: 32px; font-weight: 800; color: #111827; line-height: 1.3; }
        
        .post-body { font-size: 16px; line-height: 1.8; color: #374151; }
        .post-body h2 { font-size: 24px; font-weight: 700; color: #111827; margin-top: 32px; margin-bottom: 16px; }
        .post-body p { margin-bottom: 24px; }
        .post-body img { max-width: 100%; border-radius: 8px; margin: 24px 0; }
        
        .tag-badge { background: #f3f4f6; color: #4b5563; padding: 4px 12px; border-radius: 20px; font-size: 13px; margin-right: 8px; display: inline-block; }

        .status-badge { padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; }
        .status-published { background: #ecfdf5; color: #059669; }
        .status-draft { background: #fffbeb; color: #d97706; }

        .seo-preview-card { background: #fff; border: 1px solid #e5e7eb; padding: 16px; border-radius: 8px; }
        .seo-title { color: #1a0dab; font-size: 18px; line-height: 1.2; margin-bottom: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; cursor: pointer; }
        .seo-title:hover { text-decoration: underline; }
        .seo-url { color: #006621; font-size: 14px; line-height: 1.3; margin-bottom: 4px; }
        .seo-desc { color: #545454; font-size: 13px; line-height: 1.4; }

        .btn-modern {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 20px; border-radius: 10px; font-weight: 600; font-size: 14px;
            transition: all 0.2s; border: none; cursor: pointer; text-decoration: none;
        }
        .btn-modern.btn-primary { background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); color: white; }
        .btn-modern.btn-danger { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; }
        .btn-modern:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }

        /* Dark Mode */
        body.dark-mode .page-title, body.dark-mode .section-title, body.dark-mode .post-title-large, body.dark-mode .post-body h2 { color: #f3f4f6; }
        body.dark-mode .page-subtitle, body.dark-mode .post-body { color: #9ca3af; }
        body.dark-mode .modern-card { background: #1f2937; }
        body.dark-mode .btn-back { background: #1f2937; border-color: #374151; color: #9ca3af; }
        body.dark-mode .btn-back:hover { background: #374151; color: #f3f4f6; }
        body.dark-mode .category-badge { background: rgba(37, 99, 235, 0.2); color: #60a5fa; }
        body.dark-mode .tag-badge { background: #374151; color: #9ca3af; }
        body.dark-mode .status-published { background: rgba(5, 150, 105, 0.2); color: #34d399; }
        body.dark-mode .status-draft { background: rgba(217, 119, 6, 0.2); color: #fbbf24; }
        body.dark-mode .seo-preview-card { background: #111827; border-color: #374151; }
        body.dark-mode .seo-title { color: #8ab4f8; }
        body.dark-mode .seo-url { color: #34d399; }
        body.dark-mode .seo-desc { color: #9ca3af; }
    </style>
</x-admin-layout>
