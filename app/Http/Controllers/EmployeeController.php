<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with('children')
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();
            
        return view('admin.employees.index', compact('employees'));
    }

    public function create(): View
    {
        $parents = Employee::all();
        return view('admin.employees.create', compact('parents'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|unique:employees,nip',
            'jabatan' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:employees,id',
            'order' => 'integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('employees', 'public');
            $validated['foto'] = $path;
        }

        Employee::create($validated);

        return redirect()->route('admin.profile.structure.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Employee $employee): View
    {
        $parents = Employee::where('id', '!=', $employee->id)->get();
        return view('admin.employees.edit', compact('employee', 'parents'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|unique:employees,nip,' . $employee->id,
            'jabatan' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:employees,id',
            'order' => 'integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($employee->foto) {
                Storage::disk('public')->delete($employee->foto);
            }
            $path = $request->file('foto')->store('employees', 'public');
            $validated['foto'] = $path;
        }

        $employee->update($validated);

        return redirect()->route('admin.profile.structure.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        if ($employee->foto) {
            Storage::disk('public')->delete($employee->foto);
        }
        $employee->delete();
        return redirect()->route('admin.profile.structure.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
