@extends('layouts.admin')

@section('header_title', 'Service Charter')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Service Charter Settings</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Manage the service charter text displayed on the profile page.</p>
    </div>

    <form action="{{ route('admin.profile.maklumat.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 32px;">
            <label>Service Charter Content</label>
            <textarea name="service_charter" rows="15" style="width: 100%; padding: 15px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit; line-height: 1.6;" placeholder="Enter service charter text">{{ old('service_charter', $profile->service_charter ?? '') }}</textarea>
            @error('service_charter')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Tip: Use formal and clear language in accordance with public service standards.</small>
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
