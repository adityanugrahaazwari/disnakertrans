@extends('layouts.admin')

@section('header_title', 'Tambah Permission')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Buat Hak Akses (Permission) Baru</h3>
    
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Permission</label>
            <input type="text" name="name" required placeholder="Contoh: hapus-berita" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            <small style="color: #6b7280;">Gunakan format huruf kecil dan tanda hubung (kebab-case).</small>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn-login" style="width: auto; padding: 10px 25px;">Simpan Permission</button>
            <a href="{{ route('admin.permissions.index') }}" style="padding: 10px 25px; text-decoration: none; color: #6b7280; border: 1px solid #d1d5db; border-radius: 6px;">Batal</a>
        </div>
    </form>
</div>
@endsection
