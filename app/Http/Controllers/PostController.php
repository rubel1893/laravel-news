<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show all published posts, paginated
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Show single post by slug
    public function show($slug)
{
    $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();

    // Recent posts for sidebar
    $recentPosts = Post::where('id', '!=', $post->id)
                        ->where('is_published', true)
                        ->latest()
                        ->take(5)
                        ->get();

    return view('posts.show', compact('post', 'recentPosts'));
}

}
