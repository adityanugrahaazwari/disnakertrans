@extends('layouts.admin')

@section('header_title', 'Head of Department Greeting')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Greeting Settings</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Manage the greeting data from the Head of Department displayed on the homepage.</p>
    </div>

    <form action="{{ route('admin.profile.greeting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label>Head Name</label>
                <input type="text" name="head_name" value="{{ old('head_name', $profile->head_name ?? '') }}" placeholder="Enter full name with titles">
                @error('head_name')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label>Position</label>
                <input type="text" name="head_position" value="{{ old('head_position', $profile->head_position ?? 'Head of Department') }}" placeholder="Example: Head of the Department of Manpower and Transmigration">
                @error('head_position')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="margin-bottom: 24px;">
            <label>Greeting Text</label>
            <textarea name="head_greeting" rows="8" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit;" placeholder="Enter the warm greeting text from the Head of Department">{{ old('head_greeting', $profile->head_greeting ?? '') }}</textarea>
            @error('head_greeting')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label>Head Photo</label>
            @if($profile && $profile->head_photo)
                <div style="margin-bottom: 15px;">
                    <img src="{{ asset('storage/' . $profile->head_photo) }}" alt="Head of Department" style="width: 200px; border-radius: 12px; border: 1px solid #f1f5f9; box-shadow: var(--shadow-sm);">
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px;">* Current photo</p>
                </div>
            @endif
            <input type="file" name="head_photo" style="padding: 10px; background: #f8fafc; border: 2px dashed #e2e8f0;">
            @error('head_photo')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Recommended size: 500x700px (Portrait). Format: JPG, PNG, WEBP. Max: 2MB.</small>
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
