<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public function index(): View
    {
        $permissions = Permission::with('permissionGroup')->paginate(15);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create(): View
    {
        $groups = PermissionGroup::orderBy('order')->get();
        return view('admin.permissions.create', compact('groups'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'permission_group_id' => 'nullable|exists:permission_groups,id',
        ]);

        Permission::create([
            'name' => $request->name,
            'permission_group_id' => $request->permission_group_id,
            'guard_name' => 'web'
        ]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission berhasil dibuat.');
    }

    public function edit(Permission $permission): View
    {
        $groups = PermissionGroup::orderBy('order')->get();
        return view('admin.permissions.edit', compact('permission', 'groups'));
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'permission_group_id' => 'nullable|exists:permission_groups,id',
        ]);

        $permission->update([
            'name' => $request->name,
            'permission_group_id' => $request->permission_group_id,
        ]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission berhasil diperbarui.');
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission berhasil dihapus.');
    }
}
