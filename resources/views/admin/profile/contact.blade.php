@extends('layouts.admin')

@section('header_title', 'Kontak Dinas')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Pengaturan Informasi Kontak</h3>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.contact.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Alamat Lengkap</label>
            <textarea name="alamat" required style="width: 100%; height: 80px; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('alamat', $profile->alamat ?? '') }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Google Maps Iframe</label>
            <textarea name="google_maps_url" style="width: 100%; height: 120px; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; font-family: monospace;" placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'>{{ old('google_maps_url', $profile->google_maps_url ?? '') }}</textarea>
            <small style="color: #6b7280;">Tempelkan kode <strong>Embed Map (iframe)</strong> dari Google Maps. Buka Google Maps, cari lokasi, klik Bagikan > Sematkan peta, lalu salin HTML-nya.</small>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Email Dinas</label>
                <input type="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('email', $profile->email ?? '') }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nomor Telepon</label>
                <input type="text" name="telepon" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('telepon', $profile->telepon ?? '') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
