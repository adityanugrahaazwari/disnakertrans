@extends('layouts.admin')

@section('header_title', 'Edit Layanan')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Perbarui Layanan</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Ubah informasi kartu layanan yang tampil di landing page.</p>
    </div>
    
    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 24px;">
            <label>Judul Layanan <span style="color: var(--danger);">*</span></label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required placeholder="Contoh: Pendaftaran AK-1">
            @error('title') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Deskripsi Singkat <span style="color: var(--danger);">*</span></label>
            <textarea name="description" rows="4" required placeholder="Jelaskan secara singkat mengenai layanan ini">{{ old('description', $service->description) }}</textarea>
            @error('description') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
            <div>
                <label>Ikon (FontAwesome Class) <span style="color: var(--danger);">*</span></label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" required placeholder="Contoh: fas fa-graduation-cap">
                <small style="color: var(--text-muted);">Gunakan class dari <a href="https://fontawesome.com/icons" target="_blank">FontAwesome 6</a>.</small>
                @error('icon') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label>Link Tujuan (Opsional)</label>
                <input type="text" name="url" value="{{ old('url', $service->url) }}" placeholder="Contoh: /pendaftaran-ak1">
                @error('url') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
            <div>
                <label>Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', $service->order) }}" required>
                @error('order') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
            <div>
                <label>Status</label>
                <select name="is_active" required>
                    <option value="1" {{ old('is_active', $service->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', $service->is_active) == '0' ? 'selected' : '' }}>Non-aktif</option>
                </select>
                @error('is_active') <small style="color: var(--danger);">{{ $message }}</small> @enderror
            </div>
        </div>

        <div style="display: flex; gap: 12px; border-top: 1px solid #f1f5f9; pt: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 32px;">
                <i class="fas fa-save"></i> Perbarui Layanan
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); padding: 12px 32px;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
