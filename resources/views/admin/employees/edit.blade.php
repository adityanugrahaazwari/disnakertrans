@extends('layouts.admin')

@section('header_title', 'Edit Pegawai')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Data: {{ $structure->nama }}</h3>
    
    <form action="{{ route('admin.profile.structure.update', $structure->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                <input type="text" name="nama" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" value="{{ old('nama', $structure->nama) }}">
                @error('nama') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIP (Opsional)</label>
                <input type="text" name="nip" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" value="{{ old('nip', $structure->nip) }}">
                @error('nip') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Jabatan</label>
                <input type="text" name="jabatan" required placeholder="Contoh: Kepala Dinas" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" value="{{ old('jabatan', $structure->jabatan) }}">
                @error('jabatan') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Atasan Langsung</label>
                <select name="parent_id" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">-- Paling Atas (Root) --</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $structure->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->jabatan }} - {{ $parent->nama }}</option>
                    @endforeach
                </select>
                @error('parent_id') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div class="form-group">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Foto Pegawai</label>
                <input type="file" name="foto" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px;">
                @error('foto') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
                @if($structure->foto)
                    <div style="margin-top: 10px;">
                        <img src="{{ asset('storage/'.$structure->foto) }}" alt="Foto" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 1px solid #e5e7eb;">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', $structure->order) }}" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                @error('order') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Data
            </button>
            <a href="{{ route('admin.profile.structure.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
