@extends('layouts.admin')

@section('header_title', 'Edit Bidang')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Edit Data Bidang</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Perbarui informasi bidang utama di landing page.</p>
    </div>
    
    <form action="{{ route('admin.departments.update', $department) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 24px;">
            <label>Judul Bidang <span style="color: var(--danger);">*</span></label>
            <input type="text" name="title" value="{{ old('title', $department->title) }}" required placeholder="Contoh: Bidang Tenaga Kerja">
            @error('title') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Deskripsi Singkat <span style="color: var(--danger);">*</span></label>
            <textarea name="description" rows="4" required placeholder="Jelaskan secara singkat mengenai bidang ini">{{ old('description', $department->description) }}</textarea>
            @error('description') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label>Ikon (FontAwesome Class) <span style="color: var(--danger);">*</span></label>
                <input type="text" name="icon" value="{{ old('icon', $department->icon) }}" required placeholder="Contoh: fas fa-users">
                <small style="color: var(--text-muted);">Gunakan class dari FontAwesome 6.</small>
                @error('icon') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label>Warna Ikon (Hex Code) <span style="color: var(--danger);">*</span></label>
                <input type="color" name="color" value="{{ old('color', $department->color) }}" style="height: 45px; padding: 5px;">
                @error('color') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label>Link Tujuan (Opsional)</label>
                <input type="text" name="url" value="{{ old('url', $department->url) }}" placeholder="Contoh: /departments/tk">
                @error('url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label>Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', $department->order) }}" required>
                @error('order') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <div style="margin-bottom: 32px;">
            <label>Status</label>
            <select name="is_active" required>
                <option value="1" {{ old('is_active', $department->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('is_active', $department->is_active) == '0' ? 'selected' : '' }}>Non-aktif</option>
            </select>
            @error('is_active') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="display: flex; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 32px;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.departments.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); padding: 12px 32px;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
