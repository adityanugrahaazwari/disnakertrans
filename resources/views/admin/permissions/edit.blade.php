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
            <input type="text" name="name" value="{{ $permission->name }}" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Grup Permission</label>
            <select name="permission_group_id" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                <option value="">-- Pilih Grup --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ $permission->permission_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
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
