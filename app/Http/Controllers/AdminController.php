<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $stats = [
            'posts' => \App\Models\Post::count(),
            'employees' => \App\Models\Employee::count(),
            'trainings' => \App\Models\Training::where('is_active', true)->count(),
            'messages' => \App\Models\Message::where('is_read', false)->count(),
            'jobs' => \App\Models\JobVacancy::count(),
            'services' => \App\Models\Service::where('is_active', true)->count(),
        ];

        $latestPosts = \App\Models\Post::with('category')->latest()->take(5)->get();
        $latestMessages = \App\Models\Message::latest()->take(5)->get();
        $categories = \App\Models\Category::withCount('posts')->get();
        
        return view('admin.dashboard', compact('stats', 'latestPosts', 'latestMessages', 'categories'));
    }

    /**
     * This method can be called from a View Composer or directly in layout
     */
    public static function getMenus()
    {
        return Menu::with('children')
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->filter(function ($menu) {
                // If menu has a permission, check if user has it
                if ($menu->permission_id) {
                    $permissionName = $menu->permission->name;
                    return auth()->user()->can($permissionName);
                }
                return true;
            });
    }
}
