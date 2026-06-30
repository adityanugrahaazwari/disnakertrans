@extends('layouts.admin')

@section('header_title', 'Manajemen Permission')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin:0;">Daftar Permission (Hak Akses)</h3>
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Permission
        </a>
    </div>

    @if(session('success'))
        <div style="padding: 10px; background: #dcfce7; color: #166534; border-radius: 6px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9fafb; text-align: left;">
                    <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Nama Permission</th>
                    <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Grup</th>
                    <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Guard</th>
                    <th style="padding: 12px; border-bottom: 2px solid #e5e7eb; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                            <code style="background: #eff6ff; color: var(--accent); padding: 4px 8px; border-radius: 6px; font-weight: 600;">{{ $permission->name }}</code>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                            @if($permission->permissionGroup)
                                <span class="badge badge-info">{{ $permission->permissionGroup->name }}</span>
                            @else
                                <span style="color: var(--text-muted); font-style: italic;">Tanpa Grup</span>
                            @endif
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-size: 0.8rem; color: var(--text-muted);">{{ $permission->guard_name }}</span>
                        </td>
                        <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-outline btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" onsubmit="return confirm('Hapus permission ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 32px;">
        {{ $permissions->links() }}
    </div>
</div>
@endsection
