@extends('layouts.admin')

@section('header_title', 'Vision & Mission')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Vision & Mission Settings</h3>

    <form action="{{ route('admin.profile.vision.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Vision</label>
            <textarea name="vision" required style="width: 100%; height: 100px; padding: 15px; border: 1px solid #d1d5db; border-radius: 6px; font-family: inherit; font-size: 15px; line-height: 1.5; box-sizing: border-box;">{{ old('vision', $profile->vision ?? '') }}</textarea>
            @error('vision')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Mission</label>
            <textarea name="mission" required style="width: 100%; height: 250px; padding: 15px; border: 1px solid #d1d5db; border-radius: 6px; font-family: inherit; font-size: 15px; line-height: 1.5; box-sizing: border-box;" placeholder="Use bullet points...">{{ old('mission', $profile->mission ?? '') }}</textarea>
            @error('mission')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <p style="font-size: 12px; color: #6b7280; margin-top: 5px;">* Write each mission point on a new line.</p>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </form>
</div>
@endsection
