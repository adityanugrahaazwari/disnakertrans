<?php

namespace App\Http\Controllers;

use App\Models\PermissionGroup;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionGroupController extends Controller
{
    public function index(): View
    {
        $groups = PermissionGroup::withCount('permissions')->orderBy('order')->get();
        return view('admin.permission-groups.index', compact('groups'));
    }

    public function create(): View
    {
        return view('admin.permission-groups.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:permission_groups,name',
            'order' => 'integer'
        ]);

        PermissionGroup::create($request->all());

        return redirect()->route('admin.permission-groups.index')->with('success', 'Grup Permission berhasil dibuat.');
    }

    public function edit(PermissionGroup $permissionGroup): View
    {
        return view('admin.permission-groups.edit', compact('permissionGroup'));
    }

    public function update(Request $request, PermissionGroup $permissionGroup): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:permission_groups,name,' . $permissionGroup->id,
            'order' => 'integer'
        ]);

        $permissionGroup->update($request->all());

        return redirect()->route('admin.permission-groups.index')->with('success', 'Grup Permission berhasil diperbarui.');
    }

    public function destroy(PermissionGroup $permissionGroup): RedirectResponse
    {
        $permissionGroup->delete();
        return redirect()->route('admin.permission-groups.index')->with('success', 'Grup Permission berhasil dihapus.');
    }
}
