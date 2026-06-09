@extends('layouts.admin')

@section('header_title', 'Tambah User')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Tambah Pengguna Baru</h3>
    
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('name')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('email')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Password</label>
            <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('password')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; font-weight: bold;">Pilih Role</label>
            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                @foreach($roles as $role)
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" id="role-{{ $role->id }}" {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
                        <label for="role-{{ $role->id }}" style="cursor: pointer;">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
            @error('roles')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan User
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
