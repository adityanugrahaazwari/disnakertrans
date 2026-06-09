@extends('layouts.admin')

@section('header_title', 'Edit Lowongan Kerja')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Ubah Lowongan: {{ $job_vacancy->perusahaan }}</h3>
    
    <form action="{{ route('admin.job-vacancies.update', $job_vacancy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Perusahaan</label>
                <input type="text" name="perusahaan" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('perusahaan', $job_vacancy->perusahaan) }}">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Posisi / Jabatan</label>
                <input type="text" name="posisi" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('posisi', $job_vacancy->posisi) }}">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Batas Akhir (Deadline)</label>
                <input type="date" name="deadline" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('deadline', $job_vacancy->deadline ? $job_vacancy->deadline->format('Y-m-d') : '') }}">
            </div>
            <div style="display: flex; align-items: flex-end; padding-bottom: 12px;">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" name="is_verified" value="1" {{ $job_vacancy->is_verified ? 'checked' : '' }} style="margin-right: 10px; width: 20px; height: 20px;">
                    <span style="font-weight: bold;">Verifikasi Lowongan Ini</span>
                </label>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tambah Foto / Poster (Bisa banyak)</label>
            <input type="file" name="images[]" multiple style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        @if($job_vacancy->images->count() > 0)
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; font-weight: bold;">Foto Terpasang:</label>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 15px;">
                @foreach($job_vacancy->images as $image)
                    <div style="position: relative; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; background: #f9fafb;">
                        <img src="{{ asset('storage/'.$image->path) }}" alt="Poster" style="width: 100%; height: 150px; object-fit: cover;">
                        <button type="button" onclick="deleteImage({{ $image->id }})" style="position: absolute; top: 5px; right: 5px; background: #ef4444; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 12px;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Syarat & Deskripsi Pekerjaan</label>
            <textarea name="syarat" rows="6" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('syarat', $job_vacancy->syarat) }}</textarea>
            @error('syarat') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui Lowongan
            </button>
            <a href="{{ route('admin.job-vacancies.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>

<form id="delete-image-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
function deleteImage(id) {
    if (confirm('Yakin ingin menghapus foto ini?')) {
        const form = document.getElementById('delete-image-form');
        let url = "{{ route('admin.job-vacancies.images.destroy', ':id') }}";
        form.action = url.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
