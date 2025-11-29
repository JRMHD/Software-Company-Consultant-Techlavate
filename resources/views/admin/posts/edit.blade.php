<x-admin-layout>
    <div class="posts-management">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.posts.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="page-title mb-1">Edit Post</h1>
                    <p class="page-subtitle mb-0">Update your blog article</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="modern-card p-4 mb-4">
                        <div class="mb-4">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Enter post title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="body" class="form-label">Content</label>
                            <textarea id="editor" name="body">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="excerpt" class="form-label">Excerpt / Summary</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="3" placeholder="Short summary for search results and previews">{{ old('excerpt', $post->excerpt) }}</textarea>
                            <div class="form-text">Brief description of the post (optional)</div>
                        </div>
                    </div>

                    <!-- SEO Section -->
                    <div class="modern-card p-4">
                        <h3 class="section-title mb-3">SEO Settings</h3>
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" placeholder="SEO optimized title">
                            <div class="form-text">Leave blank to use post title</div>
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="2" placeholder="SEO description for search engines">{{ old('meta_description', $post->meta_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Publish Settings -->
                    <div class="modern-card p-4 mb-4">
                        <h3 class="section-title mb-3">Publish</h3>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Publish Immediately</label>
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Schedule Date</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        <hr class="my-3">

                        <button type="submit" class="btn-modern btn-primary w-100">
                            <i class="fa-solid fa-floppy-disk"></i> Update Post
                        </button>
                    </div>

                    <!-- Organization -->
                    <div class="modern-card p-4 mb-4">
                        <h3 class="section-title mb-3">Organization</h3>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select mb-2" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted small">Or</span>
                                <input type="text" class="form-control form-control-sm" name="new_category" placeholder="Type new category name..." value="{{ old('new_category') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <select class="form-select" id="tags" name="tags[]" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">Hold Ctrl/Cmd to select multiple</div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="modern-card p-4">
                        <h3 class="section-title mb-3">Featured Image</h3>
                        <div class="image-upload-area" id="imageUploadArea">
                            <input type="file" id="featured_image" name="featured_image" class="d-none" accept="image/*" onchange="previewImage(this)">
                            
                            <div class="upload-placeholder {{ $post->featured_image ? 'd-none' : '' }}" id="uploadPlaceholder" onclick="document.getElementById('featured_image').click()">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Click to upload image</p>
                            </div>
                            
                            <div class="image-preview {{ $post->featured_image ? '' : 'd-none' }}" id="imagePreview">
                                <img src="{{ $post->featured_image ? Storage::url($post->featured_image) : '' }}" alt="Preview" id="previewImg">
                                <button type="button" class="btn-remove-image" onclick="removeImage()">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });

        // Image Preview Logic
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('uploadPlaceholder').classList.add('d-none');
                    document.getElementById('imagePreview').classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            document.getElementById('featured_image').value = '';
            // If there was an existing image, we might want to handle that differently, 
            // but for now this just clears the preview and shows the upload placeholder.
            // In a real app, you might want a hidden field to flag "remove image" on backend.
            document.getElementById('previewImg').src = '';
            document.getElementById('uploadPlaceholder').classList.remove('d-none');
            document.getElementById('imagePreview').classList.add('d-none');
        }
    </script>

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

        .form-label { font-weight: 500; color: #374151; font-size: 14px; margin-bottom: 8px; }
        .form-control, .form-select {
            border: 1px solid #e5e7eb; border-radius: 8px; padding: 10px 14px;
            font-size: 14px; color: #111827; transition: all 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4E2FDA; box-shadow: 0 0 0 3px rgba(78, 47, 218, 0.1); outline: none;
        }
        .form-control-lg { padding: 12px 16px; font-size: 16px; }
        .form-text { font-size: 12px; color: #9ca3af; margin-top: 6px; }

        .image-upload-area {
            border: 2px dashed #e5e7eb; border-radius: 12px; padding: 20px;
            text-align: center; cursor: pointer; transition: all 0.2s;
            position: relative; min-height: 200px; display: flex; align-items: center; justify-content: center;
        }
        .image-upload-area:hover { border-color: #4E2FDA; background: #f9fafb; }
        .upload-placeholder i { font-size: 32px; color: #9ca3af; margin-bottom: 10px; }
        .upload-placeholder p { color: #6b7280; font-size: 14px; margin: 0; }
        
        .image-preview { width: 100%; height: 100%; position: absolute; top: 0; left: 0; padding: 10px; }
        .image-preview img { width: 100%; height: 100%; object-fit: cover; border-radius: 8px; }
        .btn-remove-image {
            position: absolute; top: 5px; right: 5px;
            width: 24px; height: 24px; border-radius: 50%;
            background: rgba(0,0,0,0.5); color: white; border: none;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 12px;
        }
        .btn-remove-image:hover { background: rgba(239, 68, 68, 0.9); }

        .btn-modern {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 12px 24px; border-radius: 10px; font-weight: 600; font-size: 14px;
            transition: all 0.2s; border: none; cursor: pointer;
        }
        .btn-modern.btn-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%); color: white;
            box-shadow: 0 4px 12px rgba(78, 47, 218, 0.3);
        }
        .btn-modern.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(78, 47, 218, 0.4); }

        /* CKEditor Customization */
        .ck-editor__editable { min-height: 300px; }
        
        /* Dark Mode */
        body.dark-mode .page-title, body.dark-mode .section-title, body.dark-mode .form-label { color: #f3f4f6; }
        body.dark-mode .page-subtitle, body.dark-mode .form-text, body.dark-mode .upload-placeholder p { color: #9ca3af; }
        body.dark-mode .modern-card { background: #1f2937; }
        body.dark-mode .form-control, body.dark-mode .form-select {
            background: #111827; border-color: #374151; color: #f3f4f6;
        }
        body.dark-mode .form-control:focus, body.dark-mode .form-select:focus { border-color: #6366f1; }
        body.dark-mode .btn-back { background: #1f2937; border-color: #374151; color: #9ca3af; }
        body.dark-mode .btn-back:hover { background: #374151; color: #f3f4f6; }
        body.dark-mode .image-upload-area { border-color: #374151; }
        body.dark-mode .image-upload-area:hover { border-color: #6366f1; background: #111827; }
        
        /* CKEditor Dark Mode Overrides (Basic) */
        body.dark-mode .ck.ck-editor__main>.ck-editor__editable { background: #111827; color: #f3f4f6; border-color: #374151; }
        body.dark-mode .ck.ck-toolbar { background: #1f2937; border-color: #374151; }
        body.dark-mode .ck.ck-button { color: #f3f4f6; }
        body.dark-mode .ck.ck-button:hover { background: #374151; }
    </style>
</x-admin-layout>
