<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Post;
use App\Models\Service;
use App\Models\Training;
use App\Models\JobVacancy;
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

        $latestTrainings = Training::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $latestJobs = JobVacancy::where('is_verified', true)
            ->where('deadline', '>=', now())
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('hero', 'services', 'latestPosts', 'latestTrainings', 'latestJobs'));
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

    public function maklumat()
    {
        $profile = \App\Models\Profile::first();
        return view('profile.maklumat', compact('profile'));
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

    public function industrialRelations()
    {
        return view('departments.hi');
    }

    public function laborForce()
    {
        return view('departments.tk');
    }

    public function trainingDept()
    {
        $trainings = Training::where('is_active', true)->latest()->paginate(9);
        return view('departments.training', compact('trainings'));
    }

    public function allJobs()
    {
        $jobs = JobVacancy::where('is_verified', true)
            ->where('deadline', '>=', now())
            ->latest()
            ->paginate(12);
        return view('jobs.index', compact('jobs'));
    }

    public function showJob($id)
    {
        $job = JobVacancy::with('images')
            ->where('is_verified', true)
            ->findOrFail($id);

        $otherJobs = JobVacancy::where('id', '!=', $id)
            ->where('is_verified', true)
            ->where('deadline', '>=', now())
            ->latest()
            ->take(3)
            ->get();

        return view('jobs.show', compact('job', 'otherJobs'));
    }

    public function allTrainings()
    {
        $trainings = Training::where('is_active', true)
            ->latest()
            ->paginate(12);
        return view('trainings.index', compact('trainings'));
    }

    public function downloads()
    {
        $categories = [
            'Formulir' => [
                ['title' => 'Formulir Pendaftaran Kartu Kuning (AK-1)', 'type' => 'PDF', 'size' => '245 KB'],
                ['title' => 'Formulir Pendaftaran Pelatihan Kerja BLK', 'type' => 'PDF', 'size' => '320 KB'],
                ['title' => 'Format Surat Pengaduan Hubungan Industrial', 'type' => 'DOCX', 'size' => '45 KB'],
            ],
            'Regulasi' => [
                ['title' => 'Peraturan Daerah No. 12 Tahun 2024 tentang Ketenagakerjaan', 'type' => 'PDF', 'size' => '890 KB'],
                ['title' => 'Keputusan Bupati tentang UMK Tahun 2025', 'type' => 'PDF', 'size' => '1.1 MB'],
            ],
            'Laporan' => [
                ['title' => 'Laporan Tahunan Ketenagakerjaan 2024', 'type' => 'PDF', 'size' => '5.4 MB'],
                ['title' => 'Statistik Pencari Kerja Triwulan I 2025', 'type' => 'PDF', 'size' => '2.1 MB'],
            ]
        ];
        return view('downloads.index', compact('categories'));
    }
}
