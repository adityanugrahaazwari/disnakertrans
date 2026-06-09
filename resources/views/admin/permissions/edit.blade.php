@extends('layouts.admin')

@section('header_title', 'Edit Permission')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Perbarui Hak Akses</h3>
    
    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Permission</label>
            <input type="text" name="name" value="{{ old('name', $permission->name) }}" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('name')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Grup Permission</label>
            <select name="permission_group_id" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                <option value="">-- Pilih Grup --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ old('permission_group_id', $permission->permission_group_id) == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
            @error('permission_group_id')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Permission
            </button>
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
