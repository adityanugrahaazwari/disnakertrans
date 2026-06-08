@extends('layouts.admin')

@section('header_title', 'Edit Pegawai')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Data: {{ $employee->nama }}</h3>
    
    <form action="{{ route('admin.profile.structure.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nama Lengkap</label>
                <input type="text" name="nama" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" value="{{ old('nama', $employee->nama) }}">
            </div>
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">NIP (Opsional)</label>
                <input type="text" name="nip" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" value="{{ old('nip', $employee->nip) }}">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Jabatan</label>
                <input type="text" name="jabatan" required placeholder="Contoh: Kepala Dinas" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" value="{{ old('jabatan', $employee->jabatan) }}">
            </div>
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Atasan Langsung</label>
                <select name="parent_id" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">-- Paling Atas (Root) --</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $employee->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->jabatan }} - {{ $parent->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div class="form-group">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Foto Pegawai</label>
                <input type="file" name="foto" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px;">
                @if($employee->foto)
                    <div style="margin-top: 10px;">
                        <img src="{{ asset('storage/'.$employee->foto) }}" alt="Foto" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 1px solid #e5e7eb;">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', $employee->order) }}" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Data
            </button>
            <a href="{{ route('admin.employees.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
