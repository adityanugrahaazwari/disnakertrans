@extends('layouts.admin')

@section('header_title', 'Hero Section')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Pengaturan Hero Section</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola banner utama yang tampil di halaman depan website.</p>
    </div>

    @if(session('success'))
        <div style="padding: 16px; background: #dcfce7; color: #166534; border-radius: 10px; margin-bottom: 24px; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-check-circle"></i>
            <span style="font-weight: 600; font-size: 0.9rem;">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.heroes.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 24px;">
            <label>Judul Hero (Opsional)</label>
            <input type="text" name="title" value="{{ old('title', $hero->title) }}" placeholder="Masukkan judul utama banner">
            @error('title') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Subtitle (Opsional)</label>
            <textarea name="subtitle" rows="3" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit;" placeholder="Masukkan penjelasan singkat banner">{{ old('subtitle', $hero->subtitle) }}</textarea>
            @error('subtitle') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label>Teks Tombol (Opsional)</label>
                <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}" placeholder="Contoh: Jelajahi Layanan">
                @error('button_text') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label>URL Tombol (Opsional)</label>
                <input type="text" name="button_url" value="{{ old('button_url', $hero->button_url) }}" placeholder="Contoh: /services atau #layanan">
                @error('button_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <div style="margin-bottom: 32px;">
            <label>Gambar Banner</label>
            @if($hero->image)
                <div style="margin-bottom: 15px;">
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Current Hero" style="width: 100%; max-width: 400px; border-radius: 12px; border: 1px solid #f1f5f9; box-shadow: var(--shadow-sm);">
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px;">* Gambar saat ini</p>
                </div>
            @endif
            <input type="file" name="image" style="padding: 10px; background: #f8fafc; border: 2px dashed #e2e8f0;">
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Rekomendasi ukuran: 1920x800px. Format: JPG, PNG, WEBP. Maks: 2MB.</small>
            @error('image') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
