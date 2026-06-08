@extends('layouts.admin')

@section('header_title', 'Tambah Lowongan Kerja')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Buat Lowongan Kerja Baru</h3>
    
    <form action="{{ route('admin.job-vacancies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Perusahaan</label>
                <input type="text" name="perusahaan" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('perusahaan') }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Posisi / Jabatan</label>
                <input type="text" name="posisi" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('posisi') }}">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Batas Akhir (Deadline)</label>
                <input type="date" name="deadline" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('deadline') }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Foto / Poster Lowongan (Bisa banyak)</label>
                <input type="file" name="images[]" multiple style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Syarat & Deskripsi Pekerjaan</label>
            <textarea name="syarat" rows="6" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('syarat') }}</textarea>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Lowongan
            </button>
            <a href="{{ route('admin.job-vacancies.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
