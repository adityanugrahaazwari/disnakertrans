@extends('layouts.admin')

@section('header_title', 'Edit Job Vacancy')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Update Vacancy: {{ $job_vacancy->company }}</h3>
    
    <form action="{{ route('admin.job-vacancies.update', $job_vacancy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Company Name</label>
                <input type="text" name="company" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('company', $job_vacancy->company) }}">
                @error('company') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Position / Job Title</label>
                <input type="text" name="position" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('position', $job_vacancy->position) }}">
                @error('position') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deadline</label>
                <input type="date" name="deadline" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('deadline', $job_vacancy->deadline ? $job_vacancy->deadline->format('Y-m-d') : '') }}">
                @error('deadline') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div style="display: flex; align-items: flex-end; padding-bottom: 12px;">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" name="is_verified" value="1" {{ old('is_verified', $job_vacancy->is_verified) ? 'checked' : '' }} style="margin-right: 10px; width: 20px; height: 20px;">
                    <span style="font-weight: bold;">Verify This Vacancy</span>
                </label>
                @error('is_verified') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Add Photos / Posters (Multiple allowed)</label>
            <input type="file" name="images[]" multiple style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            @error('images') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        @if($job_vacancy->images->count() > 0)
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; font-weight: bold;">Current Photos:</label>
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
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Requirements & Job Description</label>
            <textarea name="requirements" rows="6" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('requirements', $job_vacancy->requirements) }}</textarea>
            @error('requirements') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Vacancy
            </button>
            <a href="{{ route('admin.job-vacancies.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>

<form id="delete-image-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
function deleteImage(id) {
    if (confirm('Are you sure you want to delete this photo?')) {
        const form = document.getElementById('delete-image-form');
        let url = "{{ route('admin.job-vacancies.images.destroy', ':id') }}";
        form.action = url.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
