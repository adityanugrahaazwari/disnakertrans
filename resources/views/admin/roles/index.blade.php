@extends('layouts.admin')

@section('header_title', 'Manajemen Role (RBAC)')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin:0;">Daftar Role (Peran)</h3>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Role
        </a>
    </div>

    @if(session('success'))
        <div style="padding: 10px; background: #dcfce7; color: #166534; border-radius: 6px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9fafb; text-align: left;">
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb; width: 200px;">Nama Role</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Hak Akses (Permissions)</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb; text-align: center; width: 100px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                        <strong>{{ $role->name }}</strong>
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                        @foreach($role->permissions as $permission)
                            <span style="background: #f3f4f6; color: #4b5563; padding: 2px 8px; border-radius: 12px; font-size: 0.7rem; margin-right: 5px; display: inline-block; margin-bottom: 5px;">
                                {{ $permission->name }}
                            </span>
                        @endforeach
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 8px;">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-outline btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($role->name !== 'Super Admin')
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Hapus role ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 32px;">
        {{ $roles->links() }}
    </div>
</div>
@endsection
