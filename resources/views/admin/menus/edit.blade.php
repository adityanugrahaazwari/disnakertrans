@extends('layouts.admin')

@section('header_title', 'Edit Menu')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Perbarui Menu Navigasi: {{ $menu->title }}</h3>
    
    <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Judul Menu</label>
                <input type="text" name="title" value="{{ $menu->title }}" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Icon (FontAwesome)</label>
                <input type="text" name="icon" value="{{ $menu->icon }}" placeholder="fas fa-home" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">URL / Route</label>
            <input type="text" name="url" value="{{ $menu->url }}" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Menu Induk (Parent)</label>
                <select name="parent_id" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">-- Paling Atas (Root) --</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Syarat Permission</label>
                <select name="permission_id" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">-- Tanpa Syarat (Semua Bisa Lihat) --</option>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}" {{ $menu->permission_id == $permission->id ? 'selected' : '' }}>{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Urutan (Order)</label>
                <input type="number" name="order" value="{{ $menu->order }}" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Status</label>
                <select name="is_active" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="1" {{ $menu->is_active ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$menu->is_active ? 'selected' : '' }}>Non-Aktif</option>
                </select>
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn-login" style="width: auto; padding: 10px 25px;">Update Menu</button>
            <a href="{{ route('admin.menus.index') }}" style="padding: 10px 25px; text-decoration: none; color: #6b7280; border: 1px solid #d1d5db; border-radius: 6px;">Batal</a>
        </div>
    </form>
</div>
@endsection
