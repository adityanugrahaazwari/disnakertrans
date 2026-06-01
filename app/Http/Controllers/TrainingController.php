<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index(): View
    {
        $trainings = Training::latest()->paginate(10);
        return view('admin.trainings.index', compact('trainings'));
    }

    public function create(): View
    {
        return view('admin.trainings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quota' => 'required|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('trainings', 'public');
            $validated['image'] = $path;
        }

        Training::create($validated);

        return redirect()->route('admin.trainings.index')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }

    public function edit(Training $training): View
    {
        return view('admin.trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quota' => 'required|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }
            $path = $request->file('image')->store('trainings', 'public');
            $validated['image'] = $path;
        }

        $training->update($validated);

        return redirect()->route('admin.trainings.index')->with('success', 'Data pelatihan berhasil diperbarui.');
    }

    public function destroy(Training $training): RedirectResponse
    {
        if ($training->image) {
            Storage::disk('public')->delete($training->image);
        }
        $training->delete();
        return redirect()->route('admin.trainings.index')->with('success', 'Data pelatihan berhasil dihapus.');
    }
}
