@extends('layouts.admin')

@section('header_title', 'Edit Grup Permission')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Grup: {{ $permissionGroup->name }}</h3>
    
    <form action="{{ route('admin.permission-groups.update', $permissionGroup) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Grup</label>
            <input type="text" name="name" value="{{ old('name', $permissionGroup->name) }}" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi</label>
            <input type="text" name="description" value="{{ old('description', $permissionGroup->description) }}">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Urutan</label>
            <input type="number" name="order" value="{{ old('order', $permissionGroup->order) }}">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Grup
            </button>
            <a href="{{ route('admin.permission-groups.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
