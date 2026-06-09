@extends('layouts.admin')

@section('header_title', 'Complaint Settings')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Complaint Section Settings</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Manage text content and support contacts for the public complaint section.</p>
    </div>

    <form action="{{ route('admin.profile.complaint.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 24px;">
            <label>Section Title</label>
            <input type="text" name="complaint_title" value="{{ old('complaint_title', $profile->complaint_title ?? 'Complaint & Aspiration Service') }}" placeholder="Enter main title for complaint section">
            @error('complaint_title')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Section Description</label>
            <textarea name="complaint_description" rows="4" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit;" placeholder="Enter a brief explanation about the complaint service">{{ old('complaint_description', $profile->complaint_description ?? 'Submit your complaints, suggestions, or questions regarding our employment services. Our team will respond promptly to every report received.') }}</textarea>
            @error('complaint_description')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label>WhatsApp Support Number (Optional)</label>
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="background: #f1f5f9; padding: 12px; border-radius: 8px; font-weight: 700; border: 1px solid #e2e8f0;">+62</span>
                <input type="text" name="complaint_wa" value="{{ old('complaint_wa', $profile->complaint_wa ?? '') }}" placeholder="Example: 81234567890">
            </div>
            @error('complaint_wa')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Enter number without leading 0. Leave blank to hide WhatsApp button.</small>
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
