@extends('layouts.admin')

@section('header_title', 'Pengaturan Footer')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Pengaturan Footer & Sosial Media</h3>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.footer.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi Footer</label>
            <textarea name="footer_description" style="width: 100%; height: 100px; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" placeholder="Tuliskan deskripsi singkat dinas untuk bagian footer...">{{ old('footer_description', $profile->footer_description ?? '') }}</textarea>
            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 5px;">* Deskripsi ini akan tampil di bawah logo pada bagian footer.</p>
        </div>

        <h4 style="margin-bottom: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">Tautan Sosial Media</h4>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;"><i class="fab fa-facebook" style="color: #1877F2;"></i> Facebook URL</label>
                <input type="url" name="facebook_url" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('facebook_url', $profile->facebook_url ?? '') }}" placeholder="https://facebook.com/username">
                @error('facebook_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;"><i class="fab fa-instagram" style="color: #E4405F;"></i> Instagram URL</label>
                <input type="url" name="instagram_url" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('instagram_url', $profile->instagram_url ?? '') }}" placeholder="https://instagram.com/username">
                @error('instagram_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;"><i class="fab fa-youtube" style="color: #FF0000;"></i> Youtube URL</label>
                <input type="url" name="youtube_url" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('youtube_url', $profile->youtube_url ?? '') }}" placeholder="https://youtube.com/c/channelname">
                @error('youtube_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;"><i class="fab fa-twitter" style="color: #1DA1F2;"></i> Twitter / X URL</label>
                <input type="url" name="twitter_url" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('twitter_url', $profile->twitter_url ?? '') }}" placeholder="https://twitter.com/username">
                @error('twitter_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;"><i class="fab fa-tiktok" style="color: #000000;"></i> TikTok URL</label>
                <input type="url" name="tiktok_url" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('tiktok_url', $profile->tiktok_url ?? '') }}" placeholder="https://tiktok.com/@username">
                @error('tiktok_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width: auto; padding: 12px 30px;">Simpan Perubahan</button>
    </form>
</div>
@endsection
