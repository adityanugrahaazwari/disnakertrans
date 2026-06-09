@extends('layouts.admin')

@section('header_title', 'Buat Role Baru')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Tambah Role & Hak Akses</h3>
    
    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Role</label>
            <input type="text" name="name" required placeholder="Contoh: Admin Berita" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('name') }}">
            @error('name')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 15px; font-weight: bold;">Pilih Hak Akses (Permissions)</label>
            @error('permissions')
                <div style="margin-bottom: 10px; color: #ef4444; font-size: 14px;">{{ $message }}</div>
            @enderror
            <div style="display: flex; flex-direction: column; gap: 20px;">
                @foreach($permissions->groupBy(fn($p) => $p->permissionGroup?->name ?? 'Lainnya') as $group => $groupPermissions)
                    <div style="background: #f9fafb; padding: 15px; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <h4 style="margin: 0 0 15px 0; color: var(--primary); font-size: 0.95rem; border-bottom: 1px solid #e5e7eb; padding-bottom: 8px;">{{ $group }}</h4>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 12px;">
                            @foreach($groupPermissions as $permission)
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="p-{{ $permission->id }}" style="width: 18px; height: 18px;" {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                    <label for="p-{{ $permission->id }}" style="font-size: 0.9rem; cursor: pointer;">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Role
            </button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
