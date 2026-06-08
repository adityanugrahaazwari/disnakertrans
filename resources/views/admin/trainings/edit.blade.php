@extends('layouts.admin')

@section('header_title', 'Edit Pelatihan')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Pelatihan: {{ $training->title }}</h3>
    
    <form action="{{ route('admin.trainings.update', $training->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Judul Pelatihan</label>
                <input type="text" name="title" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('title', $training->title) }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Kategori</label>
                <select name="category_id" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $training->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Kuota Peserta</label>
                <input type="number" name="quota" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('quota', $training->quota) }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tanggal Mulai</label>
                <input type="date" name="start_date" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('start_date', $training->start_date ? $training->start_date->format('Y-m-d') : '') }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tanggal Selesai</label>
                <input type="date" name="end_date" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('end_date', $training->end_date ? $training->end_date->format('Y-m-d') : '') }}">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Foto / Banner Pelatihan</label>
                <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                @if($training->image)
                    <div style="margin-top: 10px;">
                        <img src="{{ asset('storage/'.$training->image) }}" alt="Preview" style="max-height: 100px; border-radius: 4px;">
                    </div>
                @endif
            </div>
            <div style="display: flex; align-items: flex-end; padding-bottom: 12px;">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ $training->is_active ? 'checked' : '' }} style="margin-right: 10px; width: 20px; height: 20px;">
                    <span style="font-weight: bold;">Pelatihan Masih Dibuka</span>
                </label>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi Pelatihan</label>
            <textarea name="description" rows="6" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('description', $training->description) }}</textarea>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Pelatihan
            </button>
            <a href="{{ route('admin.trainings.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
