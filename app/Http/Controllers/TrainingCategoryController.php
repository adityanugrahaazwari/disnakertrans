<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingCategoryController extends Controller
{
    public function index()
    {
        $categories = TrainingCategory::all();
        return view('admin.training-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.training-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:training_categories,name',
        ]);

        TrainingCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.training-categories.index')->with('success', 'Kategori pelatihan berhasil ditambahkan.');
    }

    public function edit(TrainingCategory $trainingCategory)
    {
        $category = $trainingCategory;
        return view('admin.training-categories.edit', compact('category'));
    }

    public function update(Request $request, TrainingCategory $trainingCategory)
    {
        $request->validate([
            'name' => 'required|unique:training_categories,name,' . $trainingCategory->id,
        ]);

        $trainingCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.training-categories.index')->with('success', 'Kategori pelatihan berhasil diperbarui.');
    }

    public function destroy(TrainingCategory $trainingCategory)
    {
        $trainingCategory->delete();
        return redirect()->route('admin.training-categories.index')->with('success', 'Kategori pelatihan berhasil dihapus.');
    }
}
