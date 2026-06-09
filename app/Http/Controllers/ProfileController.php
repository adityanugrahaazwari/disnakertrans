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
            'vision' => 'required',
            'mission' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update([
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return back()->with('success', 'Vision & Mission updated successfully.');
    }

    public function history(): View
    {
        $profile = Profile::first();
        return view('admin.profile.history', compact('profile'));
    }

    public function updateHistory(Request $request): RedirectResponse
    {
        $request->validate([
            'history' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update([
            'history' => $request->history,
        ]);

        return back()->with('success', 'History updated successfully.');
    }

    public function contact(): View
    {
        $profile = Profile::first();
        return view('admin.profile.contact', compact('profile'));
    }

    public function updateContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'address' => 'required',
            'google_maps_url' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update($validated);

        return back()->with('success', 'Contact information updated successfully.');
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

        return back()->with('success', 'Footer settings updated successfully.');
    }

    public function greeting(): View
    {
        $profile = Profile::first();
        return view('admin.profile.greeting', compact('profile'));
    }

    public function updateGreeting(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'head_name' => 'required|string|max:255',
            'head_position' => 'required|string|max:255',
            'head_greeting' => 'required|string',
            'head_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);

        if ($request->hasFile('head_photo')) {
            if ($profile->head_photo) {
                Storage::disk('public')->delete($profile->head_photo);
            }
            $path = $request->file('head_photo')->store('profile', 'public');
            $validated['head_photo'] = $path;
        }

        $profile->update($validated);

        return back()->with('success', 'Head of Department greeting updated successfully.');
    }

    public function complaint(): View
    {
        $profile = Profile::first();
        return view('admin.profile.complaint', compact('profile'));
    }

    public function updateComplaint(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'complaint_title' => 'required|string|max:255',
            'complaint_description' => 'required|string',
            'complaint_wa' => 'nullable|string|max:20',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update($validated);

        return back()->with('success', 'Complaint section settings updated successfully.');
    }

    public function maklumat(): View
    {
        $profile = Profile::first();
        return view('admin.profile.maklumat', compact('profile'));
    }

    public function updateMaklumat(Request $request): RedirectResponse
    {
        $request->validate([
            'service_charter' => 'required',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->update([
            'service_charter' => $request->service_charter,
        ]);

        return back()->with('success', 'Service Charter updated successfully.');
    }
}
