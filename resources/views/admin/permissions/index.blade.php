@extends('layouts.admin')

@section('header_title', 'Manajemen Permission')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin:0;">Daftar Permission (Hak Akses)</h3>
        <a href="{{ route('admin.permissions.create') }}" class="btn-login" style="width: auto; padding: 8px 15px; text-decoration: none; font-size: 0.9rem;">+ Tambah Permission</a>
    </div>

    @if(session('success'))
        <div style="padding: 10px; background: #dcfce7; color: #166534; border-radius: 6px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9fafb; text-align: left;">
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Nama Permission</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Guard</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $permission->name }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $permission->guard_name }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 10px;">
                            <a href="{{ route('admin.permissions.edit', $permission) }}" style="color: #3b82f6;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" onsubmit="return confirm('Hapus permission ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
