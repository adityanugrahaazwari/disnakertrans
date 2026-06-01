@extends('layouts.admin')

@section('header_title', 'Manajemen Menu')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin:0;">Struktur Menu Navigasi Admin</h3>
        <a href="{{ route('admin.menus.create') }}" class="btn-login" style="width: auto; padding: 8px 15px; text-decoration: none; font-size: 0.9rem;">+ Tambah Menu</a>
    </div>

    @if(session('success'))
        <div style="padding: 10px; background: #dcfce7; color: #166534; border-radius: 6px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9fafb; text-align: left;">
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Judul Menu</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">URL / Route</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Icon</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Parent</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Permission</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb; text-align: center;">Urutan</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                        @if($menu->parent_id) <span style="margin-left: 20px; color: #9ca3af;">—</span> @endif
                        {{ $menu->title }}
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; font-family: monospace; font-size: 0.85rem;">{{ $menu->url }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;"><i class="{{ $menu->icon }}"></i></td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $menu->parent->title ?? '-' }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                        <span style="font-size: 0.75rem; color: #6b7280;">{{ $menu->permission->name ?? 'None' }}</span>
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: center;">{{ $menu->order }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 8px;">
                            <a href="{{ route('admin.menus.edit', $menu) }}" style="color: #3b82f6;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
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
