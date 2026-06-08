@extends('layouts.admin')

@section('header_title', 'Grup Permission')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin:0;">Daftar Grup Hak Akses</h3>
        <a href="{{ route('admin.permission-groups.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Grup
        </a>
    </div>

    @if(session('success'))
        <div style="padding: 10px; background: #dcfce7; color: #166534; border-radius: 6px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">Urutan</th>
                    <th>Nama Grup</th>
                    <th>Deskripsi</th>
                    <th style="text-align: center;">Jumlah Permission</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->order }}</td>
                        <td style="font-weight: 700; color: var(--primary);">{{ $group->name }}</td>
                        <td>{{ $group->description ?: '-' }}</td>
                        <td style="text-align: center;">
                            <span class="badge badge-info">{{ $group->permissions_count }} Permission</span>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('admin.permission-groups.edit', $group) }}" class="btn btn-outline btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.permission-groups.destroy', $group) }}" method="POST" onsubmit="return confirm('Hapus grup ini? Hak akses di dalamnya akan kehilangan grupnya.')">
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
</div>
@endsection
