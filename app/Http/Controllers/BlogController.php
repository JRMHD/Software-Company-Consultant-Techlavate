<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('is_published', true)
            ->whereNotNull('published_at')
            ->with(['author', 'category', 'tags']);

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('body', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $posts = $query->latest('published_at')->paginate(12)->withQueryString();
        $categories = Category::has('posts')->get();
            
        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('slug', $slug)
            ->with(['author', 'category', 'tags'])
            ->firstOrFail();
        
        // Increment views
        $post->increment('views');
        
        // Get related posts from same category
        $relatedPosts = Post::where('is_published', true)
            ->whereNotNull('published_at')
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();
            
        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
