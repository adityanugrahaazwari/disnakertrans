@extends('layouts.admin')

@section('header_title', 'Tambah Pelatihan')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Buat Program Pelatihan Baru</h3>
    
    <form action="{{ route('admin.trainings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Judul Pelatihan</label>
                <input type="text" name="title" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('title') }}">
                @error('title')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Kategori</label>
                <select name="category_id" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Kuota Peserta</label>
                <input type="number" name="quota" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('quota') }}">
                @error('quota')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tanggal Mulai</label>
                <input type="date" name="start_date" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('start_date') }}">
                @error('start_date')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tanggal Selesai</label>
                <input type="date" name="end_date" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('end_date') }}">
                @error('end_date')
                    <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Foto / Banner Pelatihan</label>
            <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('image')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi Pelatihan</label>
            <textarea name="description" rows="6" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('description') }}</textarea>
            @error('description')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Pelatihan
            </button>
            <a href="{{ route('admin.trainings.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
