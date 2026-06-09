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
        
        <div class="hero-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div style="grid-column: span 2;">
                <label>Badge Text (Teks Kecil di Atas Judul)</label>
                <input type="text" name="badge_text" value="{{ old('badge_text', $hero->badge_text) }}" placeholder="Contoh: Pusat Ketenagakerjaan Resmi">
                @error('badge_text') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            
            <div style="grid-column: span 2;">
                <label>Judul Hero (Gunakan tag &lt;span style="color: var(--accent);"&gt;...&lt;/span&gt; untuk warna biru)</label>
                <input type="text" name="title" value="{{ old('title', $hero->title) }}" placeholder="Masukkan judul utama banner">
                @error('title') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <style>
            @media (max-width: 768px) {
                .hero-form-grid { grid-template-columns: 1fr !important; }
                .action-btns-grid { grid-template-columns: 1fr !important; }
                .stats-input-grid { grid-template-columns: 1fr !important; }
            }
        </style>

        <div style="margin-bottom: 24px;">
            <label>Subtitle / Deskripsi</label>
            <textarea name="subtitle" rows="3" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: inherit;" placeholder="Masukkan penjelasan singkat banner">{{ old('subtitle', $hero->subtitle) }}</textarea>
            @error('subtitle') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="padding: 20px; background: #f8fafc; border-radius: 12px; margin-bottom: 24px;">
            <h4 style="margin: 0 0 15px; font-size: 1rem;">Tombol Aksi</h4>
            <div class="action-btns-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 15px;">
                <div>
                    <label>Teks Tombol 1 (Utama)</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}" placeholder="Contoh: Cari Lowongan">
                    @error('button_text') <small style="color: var(--danger);">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label>URL Tombol 1</label>
                    <input type="text" name="button_url" value="{{ old('button_url', $hero->button_url) }}" placeholder="Contoh: /jobs">
                    @error('button_url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="action-btns-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                <div>
                    <label>Teks Tombol 2 (Outline)</label>
                    <input type="text" name="button_text_2" value="{{ old('button_text_2', $hero->button_text_2) }}" placeholder="Contoh: Ikuti Pelatihan">
                    @error('button_text_2') <small style="color: var(--danger);">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label>URL Tombol 2</label>
                    <input type="text" name="button_url_2" value="{{ old('button_url_2', $hero->button_url_2) }}" placeholder="Contoh: /trainings">
                    @error('button_url_2') <small style="color: var(--danger);">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <div style="padding: 20px; background: #f8fafc; border-radius: 12px; margin-bottom: 24px;">
            <h4 style="margin: 0 0 15px; font-size: 1rem;">Statistik (Bawah Deskripsi)</h4>
            <div class="stats-input-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 15px;">
                <div>
                    <label>Stat 1 Angka/Jumlah</label>
                    <input type="text" name="stat_1_count" value="{{ old('stat_1_count', $hero->stat_1_count) }}" placeholder="Contoh: 500+">
                    @error('stat_1_count') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label>Stat 1 Teks</label>
                    <input type="text" name="stat_1_text" value="{{ old('stat_1_text', $hero->stat_1_text) }}" placeholder="Contoh: Lowongan Aktif">
                    @error('stat_1_text') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="stats-input-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 15px;">
                <div>
                    <label>Stat 2 Angka/Jumlah</label>
                    <input type="text" name="stat_2_count" value="{{ old('stat_2_count', $hero->stat_2_count) }}" placeholder="Contoh: 50+">
                    @error('stat_2_count') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label>Stat 2 Teks</label>
                    <input type="text" name="stat_2_text" value="{{ old('stat_2_text', $hero->stat_2_text) }}" placeholder="Contoh: Program Pelatihan">
                    @error('stat_2_text') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="stats-input-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                <div>
                    <label>Stat 3 Angka/Jumlah</label>
                    <input type="text" name="stat_3_count" value="{{ old('stat_3_count', $hero->stat_3_count) }}" placeholder="Contoh: 10k+">
                    @error('stat_3_count') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label>Stat 3 Teks</label>
                    <input type="text" name="stat_3_text" value="{{ old('stat_3_text', $hero->stat_3_text) }}" placeholder="Contoh: Tenaga Terampil">
                    @error('stat_3_text') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div style="margin-bottom: 32px;">
            <label>Gambar Ilustrasi Hero (Kanan)</label>
            @if($hero->image)
                <div style="margin-bottom: 15px;">
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Current Hero" style="width: 100%; max-width: 400px; border-radius: 12px; border: 1px solid #f1f5f9; box-shadow: var(--shadow-sm);">
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px;">* Gambar saat ini</p>
                </div>
            @endif
            <input type="file" name="image" style="padding: 10px; background: #f8fafc; border: 2px dashed #e2e8f0;">
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Gunakan gambar ilustrasi (SVG/PNG transparan direkomendasikan). Format: JPG, PNG, WEBP. Maks: 2MB.</small>
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
