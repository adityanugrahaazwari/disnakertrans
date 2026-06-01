<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::where('is_active', true)
            ->first();

        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        $latestPosts = Post::with('category')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('hero', 'services', 'latestPosts'));
    }

    public function vision()
    {
        $profile = \App\Models\Profile::first();
        return view('profile.vision', compact('profile'));
    }

    public function history()
    {
        $profile = \App\Models\Profile::first();
        return view('profile.history', compact('profile'));
    }

    public function structure()
    {
        $profile = \App\Models\Profile::first();
        $employees = \App\Models\Employee::orderBy('order')->get();
        return view('profile.structure', compact('profile', 'employees'));
    }

    public function allPosts(Request $request)
    {
        $query = Post::with('category')
            ->where('status', 'published');

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->latest()->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::with(['category', 'user', 'tags'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Get related posts from same category
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
