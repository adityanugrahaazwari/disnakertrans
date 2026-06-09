<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use App\Models\JobVacancyImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class JobVacancyController extends Controller
{
    public function index(): View
    {
        $vacancies = JobVacancy::with('images')->latest()->paginate(10);
        return view('admin.jobs.index', compact('vacancies'));
    }

    public function create(): View
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'requirements' => 'required|string',
            'deadline' => 'nullable|date',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $jobVacancy = JobVacancy::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('job-vacancies', 'public');
                $jobVacancy->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.job-vacancies.index')->with('success', 'Job vacancy added successfully.');
    }

    public function edit(JobVacancy $job_vacancy): View
    {
        $job_vacancy->load('images');
        return view('admin.jobs.edit', compact('job_vacancy'));
    }

    public function update(Request $request, JobVacancy $job_vacancy): RedirectResponse
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'requirements' => 'required|string',
            'deadline' => 'nullable|date',
            'is_verified' => 'boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['is_verified'] = $request->has('is_verified');

        $job_vacancy->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('job-vacancies', 'public');
                $job_vacancy->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.job-vacancies.index')->with('success', 'Job vacancy updated successfully.');
    }

    public function destroy(JobVacancy $job_vacancy): RedirectResponse
    {
        foreach ($job_vacancy->images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        $job_vacancy->delete();
        return redirect()->route('admin.job-vacancies.index')->with('success', 'Job vacancy deleted successfully.');
    }

    public function destroyImage(JobVacancyImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return back()->with('success', 'Photo deleted successfully.');
    }
}
