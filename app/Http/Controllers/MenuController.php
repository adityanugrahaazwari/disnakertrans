<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MenuController extends Controller
{
    public function index(): View
    {
        $menus = Menu::with(['parent', 'permission'])->orderBy('order')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create(): View
    {
        $parents = Menu::whereNull('parent_id')->get();
        $permissions = Permission::all();
        return view('admin.menus.create', compact('parents', 'permissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'order' => 'integer',
        ]);

        Menu::create($request->all());

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dibuat.');
    }

    public function edit(Menu $menu): View
    {
        $parents = Menu::whereNull('parent_id')->where('id', '!=', $menu->id)->get();
        $permissions = Permission::all();
        return view('admin.menus.edit', compact('menu', 'parents', 'permissions'));
    }

    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'order' => 'integer',
        ]);

        $menu->update($request->all());

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
