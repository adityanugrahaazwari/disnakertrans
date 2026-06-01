@extends('layouts.admin')

@section('header_title', 'Edit User')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Data Pengguna: {{ $user->name }}</h3>
    
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Password Baru</label>
            <input type="password" name="password" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            <small style="color: #6b7280;">Kosongkan jika tidak ingin mengubah password.</small>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; font-weight: bold;">Pilih Role</label>
            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                @foreach($roles as $role)
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" id="role-{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                        <label for="role-{{ $role->id }}" style="cursor: pointer;">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn-login" style="width: auto; padding: 10px 25px;">Perbarui User</button>
            <a href="{{ route('admin.users.index') }}" style="padding: 10px 25px; text-decoration: none; color: #6b7280; border: 1px solid #d1d5db; border-radius: 6px;">Batal</a>
        </div>
    </form>
</div>
@endsection
