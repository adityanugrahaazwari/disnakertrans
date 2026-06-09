@extends('layouts.admin')

@section('header_title', 'Tambah Panduan')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Buat Langkah Panduan Baru</h3>
    </div>
    
    <form action="{{ route('admin.career-steps.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 24px;">
            <label>Judul Langkah <span style="color: var(--danger);">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Daftar Kartu AK-1">
            @error('title') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Deskripsi <span style="color: var(--danger);">*</span></label>
            <textarea name="description" rows="4" required placeholder="Jelaskan langkah ini secara detail">{{ old('description') }}</textarea>
            @error('description') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Ilustrasi (Opsional)</label>
            <input type="file" name="image" style="padding: 10px; background: #f8fafc; border: 2px dashed #e2e8f0;">
            <small style="color: var(--text-muted); display: block; margin-top: 8px;">Format: JPG, PNG, WEBP, SVG. Maks: 2MB.</small>
            @error('image') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
            <div>
                <label>Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" required>
                @error('order') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Status</label>
                <select name="is_active" required>
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non-aktif</option>
                </select>
                @error('is_active') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <style>
            @media (max-width: 768px) {
                .form-grid { grid-template-columns: 1fr !important; }
            }
        </style>

        <div style="display: flex; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 32px;">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.career-steps.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); padding: 12px 32px;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
