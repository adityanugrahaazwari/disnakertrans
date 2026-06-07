<?php

namespace App\Http\Controllers;

use App\Models\CareerStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerStepController extends Controller
{
    public function index()
    {
        $steps = CareerStep::orderBy('order')->get();
        return view('admin.career-steps.index', compact('steps'));
    }

    public function create()
    {
        return view('admin.career-steps.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('career-steps', 'public');
            $validated['image'] = $path;
        }

        CareerStep::create($validated);

        return redirect()->route('admin.career-steps.index')->with('success', 'Langkah panduan karir berhasil ditambahkan.');
    }

    public function edit(CareerStep $careerStep)
    {
        return view('admin.career-steps.edit', compact('careerStep'));
    }

    public function update(Request $request, CareerStep $careerStep)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($careerStep->image) {
                Storage::disk('public')->delete($careerStep->image);
            }
            $path = $request->file('image')->store('career-steps', 'public');
            $validated['image'] = $path;
        }

        $careerStep->update($validated);

        return redirect()->route('admin.career-steps.index')->with('success', 'Langkah panduan karir berhasil diperbarui.');
    }

    public function destroy(CareerStep $careerStep)
    {
        if ($careerStep->image) {
            Storage::disk('public')->delete($careerStep->image);
        }
        $careerStep->delete();
        return redirect()->route('admin.career-steps.index')->with('success', 'Langkah panduan karir berhasil dihapus.');
    }
}
