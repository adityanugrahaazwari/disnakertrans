@extends('layouts.admin')

@section('header_title', 'Maklumat Pelayanan')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Pengaturan Maklumat Pelayanan</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola teks maklumat pelayanan yang akan ditampilkan di halaman profil.</p>
    </div>

    <form action="{{ route('admin.profile.maklumat.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 32px;">
            <label>Isi Maklumat Pelayanan</label>
            <textarea name="maklumat_pelayanan" rows="15" style="width: 100%; padding: 15px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit; line-height: 1.6;" placeholder="Masukkan teks maklumat pelayanan">{{ old('maklumat_pelayanan', $profile->maklumat_pelayanan ?? '') }}</textarea>
            @error('maklumat_pelayanan')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Tips: Gunakan bahasa yang resmi dan jelas sesuai dengan standar pelayanan publik.</small>
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
