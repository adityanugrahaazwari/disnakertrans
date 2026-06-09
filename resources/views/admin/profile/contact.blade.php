@extends('layouts.admin')

@section('header_title', 'Agency Contact')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Contact Information Settings</h3>

    <form action="{{ route('admin.profile.contact.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Full Address</label>
            <textarea name="address" required style="width: 100%; height: 80px; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('address', $profile->address ?? '') }}</textarea>
            @error('address')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Google Maps Iframe</label>
            <textarea name="google_maps_url" style="width: 100%; height: 120px; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; font-family: monospace;" placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'>{{ old('google_maps_url', $profile->google_maps_url ?? '') }}</textarea>
            @error('google_maps_url')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: #6b7280;">Paste the <strong>Embed Map (iframe)</strong> code from Google Maps.</small>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Agency Email</label>
                <input type="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('email', $profile->email ?? '') }}">
                @error('email')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Phone Number</label>
                <input type="text" name="phone" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('phone', $profile->phone ?? '') }}">
                @error('phone')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </form>
</div>
@endsection
