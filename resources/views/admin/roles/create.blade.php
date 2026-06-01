@extends('layouts.admin')

@section('header_title', 'Buat Role Baru')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Tambah Role & Hak Akses</h3>
    
    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Role</label>
            <input type="text" name="name" required placeholder="Contoh: Admin Berita" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 15px; font-weight: bold;">Pilih Hak Akses (Permissions)</label>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px;">
                @foreach($permissions as $permission)
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="p-{{ $permission->id }}" style="width: 18px; height: 18px;">
                        <label for="p-{{ $permission->id }}" style="font-size: 0.9rem; cursor: pointer;">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn-login" style="width: auto; padding: 10px 25px;">Simpan Role</button>
            <a href="{{ route('admin.roles.index') }}" style="padding: 10px 25px; text-decoration: none; color: #6b7280; border: 1px solid #d1d5db; border-radius: 6px;">Batal</a>
        </div>
    </form>
</div>
@endsection
