@extends('layouts.admin')

@section('header_title', 'Tambah Permission')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Buat Hak Akses (Permission) Baru</h3>
    
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Permission</label>
            <input type="text" name="name" required placeholder="Contoh: hapus-berita" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('name') }}">
            @error('name')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: #6b7280;">Gunakan format huruf kecil dan tanda hubung (kebab-case).</small>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Grup Permission</label>
            <select name="permission_group_id" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                <option value="">-- Pilih Grup --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ old('permission_group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
            @error('permission_group_id')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
            <br>
            <small style="color: #6b7280;">Digunakan untuk mengelompokkan permission di halaman manajemen role.</small>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Permission
            </button>
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
