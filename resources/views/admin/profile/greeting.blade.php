@extends('layouts.admin')

@section('header_title', 'Sambutan Kepala Dinas')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Pengaturan Sambutan</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola data sambutan Kepala Dinas yang tampil di halaman utama.</p>
    </div>

    <form action="{{ route('admin.profile.greeting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label>Nama Kepala Dinas</label>
                <input type="text" name="nama_kepala" value="{{ old('nama_kepala', $profile->nama_kepala ?? '') }}" placeholder="Masukkan nama lengkap beserta gelar">
                @error('nama_kepala')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label>Jabatan</label>
                <input type="text" name="jabatan_kepala" value="{{ old('jabatan_kepala', $profile->jabatan_kepala ?? 'Kepala Dinas') }}" placeholder="Contoh: Kepala Dinas Tenaga Kerja dan Transmigrasi">
                @error('jabatan_kepala')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="margin-bottom: 24px;">
            <label>Teks Sambutan</label>
            <textarea name="sambutan_kepala" rows="8" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit;" placeholder="Masukkan teks sambutan hangat dari Kepala Dinas">{{ old('sambutan_kepala', $profile->sambutan_kepala ?? '') }}</textarea>
            @error('sambutan_kepala')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label>Foto Kepala Dinas</label>
            @if($profile && $profile->foto_kepala)
                <div style="margin-bottom: 15px;">
                    <img src="{{ asset('storage/' . $profile->foto_kepala) }}" alt="Kepala Dinas" style="width: 200px; border-radius: 12px; border: 1px solid #f1f5f9; box-shadow: var(--shadow-sm);">
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px;">* Foto saat ini</p>
                </div>
            @endif
            <input type="file" name="foto_kepala" style="padding: 10px; background: #f8fafc; border: 2px dashed #e2e8f0;">
            @error('foto_kepala')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Rekomendasi ukuran: 500x700px (Portrait). Format: JPG, PNG, WEBP. Maks: 2MB.</small>
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
