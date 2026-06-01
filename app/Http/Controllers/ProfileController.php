<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function vision(): View
    {
        $profile = Profile::first();
        return view('admin.profile.vision', compact('profile'));
    }

    public function updateVision(Request $request): RedirectResponse
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return back()->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    public function history(): View
    {
        $profile = Profile::first();
        return view('admin.profile.history', compact('profile'));
    }

    public function updateHistory(Request $request): RedirectResponse
    {
        $request->validate([
            'sejarah' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update([
            'sejarah' => $request->sejarah,
        ]);

        return back()->with('success', 'Sejarah berhasil diperbarui.');
    }

    public function contact(): View
    {
        $profile = Profile::first();
        return view('admin.profile.contact', compact('profile'));
    }

    public function updateContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update($validated);

        return back()->with('success', 'Informasi kontak berhasil diperbarui.');
    }

    public function footer(): View
    {
        $profile = Profile::first();
        return view('admin.profile.footer', compact('profile'));
    }

    public function updateFooter(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'footer_description' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'tiktok_url' => 'nullable|url',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update($validated);

        return back()->with('success', 'Pengaturan footer berhasil diperbarui.');
    }
}
