<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('order')->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'color' => 'required|string|max:20',
            'url' => 'nullable|string|max:255',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        Department::create($validated);

        return redirect()->route('admin.departments.index')->with('success', 'Bidang berhasil ditambahkan.');
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'color' => 'required|string|max:20',
            'url' => 'nullable|string|max:255',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $department->update($validated);

        return redirect()->route('admin.departments.index')->with('success', 'Bidang berhasil diperbarui.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Bidang berhasil dihapus.');
    }
}
