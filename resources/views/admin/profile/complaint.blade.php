@extends('layouts.admin')

@section('header_title', 'Pengaturan Pengaduan')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Pengaturan Section Pengaduan</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola konten teks dan kontak bantuan untuk section pengaduan masyarakat.</p>
    </div>

    <form action="{{ route('admin.profile.complaint.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 24px;">
            <label>Judul Section</label>
            <input type="text" name="pengaduan_title" value="{{ old('pengaduan_title', $profile->pengaduan_title ?? 'Layanan Pengaduan & Aspirasi') }}" placeholder="Masukkan judul utama section pengaduan">
            @error('pengaduan_title')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Deskripsi Section</label>
            <textarea name="pengaduan_description" rows="4" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit;" placeholder="Masukkan penjelasan singkat mengenai layanan pengaduan">{{ old('pengaduan_description', $profile->pengaduan_description ?? 'Sampaikan keluhan, saran, atau pertanyaan Anda terkait layanan ketenagakerjaan kami. Tim kami akan segera menanggapi setiap laporan yang masuk.') }}</textarea>
            @error('pengaduan_description')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label>Nomor WhatsApp Bantuan (Opsional)</label>
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="background: #f1f5f9; padding: 12px; border-radius: 8px; font-weight: 700; border: 1px solid #e2e8f0;">+62</span>
                <input type="text" name="pengaduan_wa" value="{{ old('pengaduan_wa', $profile->pengaduan_wa ?? '') }}" placeholder="Contoh: 81234567890">
            </div>
            @error('pengaduan_wa')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Masukkan nomor tanpa angka 0 di depan. Kosongkan jika tidak ingin menampilkan tombol WhatsApp.</small>
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
