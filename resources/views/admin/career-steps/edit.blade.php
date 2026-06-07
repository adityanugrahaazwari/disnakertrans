@extends('layouts.admin')

@section('header_title', 'Edit Panduan')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Edit Langkah Panduan</h3>
    </div>
    
    <form action="{{ route('admin.career-steps.update', $careerStep) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 24px;">
            <label>Judul Langkah <span style="color: var(--danger);">*</span></label>
            <input type="text" name="title" value="{{ old('title', $careerStep->title) }}" required>
            @error('title') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Deskripsi <span style="color: var(--danger);">*</span></label>
            <textarea name="description" rows="4" required>{{ old('description', $careerStep->description) }}</textarea>
            @error('description') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Ilustrasi</label>
            @if($careerStep->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $careerStep->image) }}" alt="Current" style="height: 100px; border-radius: 8px;">
                </div>
            @endif
            <input type="file" name="image" style="padding: 10px; background: #f8fafc; border: 2px dashed #e2e8f0;">
            @error('image') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
            <div>
                <label>Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', $careerStep->order) }}" required>
            </div>
            <div>
                <label>Status</label>
                <select name="is_active" required>
                    <option value="1" {{ old('is_active', $careerStep->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', $careerStep->is_active) == '0' ? 'selected' : '' }}>Non-aktif</option>
                </select>
            </div>
        </div>

        <div style="display: flex; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 32px;">
                <i class="fas fa-save"></i> Perbarui
            </button>
            <a href="{{ route('admin.career-steps.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); padding: 12px 32px;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
