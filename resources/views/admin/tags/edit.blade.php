@extends('layouts.admin')

@section('header_title', 'Edit Tag')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Tag: {{ $tag->name }}</h3>
    
    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Tag</label>
            <input type="text" name="name" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('name', $tag->name) }}">
            @error('name')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Tag
            </button>
            <a href="{{ route('admin.tags.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
