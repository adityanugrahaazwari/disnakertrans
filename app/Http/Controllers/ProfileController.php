<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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
            'google_maps_url' => 'nullable|string',
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

    public function greeting(): View
    {
        $profile = Profile::first();
        return view('admin.profile.greeting', compact('profile'));
    }

    public function updateGreeting(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_kepala' => 'required|string|max:255',
            'jabatan_kepala' => 'required|string|max:255',
            'sambutan_kepala' => 'required|string',
            'foto_kepala' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);

        if ($request->hasFile('foto_kepala')) {
            if ($profile->foto_kepala) {
                Storage::disk('public')->delete($profile->foto_kepala);
            }
            $path = $request->file('foto_kepala')->store('profile', 'public');
            $validated['foto_kepala'] = $path;
        }

        $profile->update($validated);

        return back()->with('success', 'Sambutan Kepala Dinas berhasil diperbarui.');
    }

    public function complaint(): View
    {
        $profile = Profile::first();
        return view('admin.profile.complaint', compact('profile'));
    }

    public function updateComplaint(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'pengaduan_title' => 'required|string|max:255',
            'pengaduan_description' => 'required|string',
            'pengaduan_wa' => 'nullable|string|max:20',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update($validated);

        return back()->with('success', 'Pengaturan section pengaduan berhasil diperbarui.');
    }

    public function maklumat(): View
    {
        $profile = Profile::first();
        return view('admin.profile.maklumat', compact('profile'));
    }

    public function updateMaklumat(Request $request): RedirectResponse
    {
        $request->validate([
            'maklumat_pelayanan' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update([
            'maklumat_pelayanan' => $request->maklumat_pelayanan,
        ]);

        return back()->with('success', 'Maklumat Pelayanan berhasil diperbarui.');
    }
}
