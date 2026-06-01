<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first() ?? new Hero();
        return view('admin.heroes.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = Hero::first() ?? new Hero();

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => ($hero->exists ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $path = $request->file('image')->store('heroes', 'public');
            $validated['image'] = $path;
        }

        if ($hero->exists) {
            $hero->update($validated);
        } else {
            $validated['is_active'] = true;
            $validated['order'] = 1;
            Hero::create($validated);
        }

        return redirect()->route('admin.heroes.index')->with('success', 'Hero section berhasil diperbarui.');
    }
}
