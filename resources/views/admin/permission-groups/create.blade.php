@extends('layouts.admin')

@section('header_title', 'Tambah Grup Permission')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Buat Grup Baru</h3>
    
    <form action="{{ route('admin.permission-groups.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Grup</label>
            <input type="text" name="name" required placeholder="Contoh: Manajemen Berita" value="{{ old('name') }}">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi</label>
            <input type="text" name="description" placeholder="Deskripsi singkat tentang grup ini" value="{{ old('description') }}">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Urutan</label>
            <input type="number" name="order" value="{{ old('order', 0) }}">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Grup
            </button>
            <a href="{{ route('admin.permission-groups.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
