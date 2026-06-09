@extends('layouts.admin')

@section('header_title', 'Agency History')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">History Settings</h3>

    <form action="{{ route('admin.profile.history.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">History Content</label>
            <textarea name="history" required style="width: 100%; height: 400px; padding: 15px; border: 1px solid #d1d5db; border-radius: 6px; font-family: inherit; font-size: 15px; line-height: 1.6; box-sizing: border-box;">{{ old('history', $profile->history ?? '') }}</textarea>
            @error('history')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="width: auto; padding: 12px 30px;">Save Changes</button>
    </form>
</div>
@endsection
