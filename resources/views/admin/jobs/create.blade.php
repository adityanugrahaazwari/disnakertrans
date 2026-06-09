@extends('layouts.admin')

@section('header_title', 'Add Job Vacancy')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Create New Job Vacancy</h3>
    
    <form action="{{ route('admin.job-vacancies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Company Name</label>
                <input type="text" name="company" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('company') }}">
                @error('company') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Position / Job Title</label>
                <input type="text" name="position" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('position') }}">
                @error('position') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deadline</label>
                <input type="date" name="deadline" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;" value="{{ old('deadline') }}">
                @error('deadline') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: bold;">Vacancy Photos / Posters (Multiple allowed)</label>
                <input type="file" name="images[]" multiple style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
                @error('images') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Requirements & Job Description</label>
            <textarea name="requirements" rows="6" required style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">{{ old('requirements') }}</textarea>
            @error('requirements') <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Vacancy
            </button>
            <a href="{{ route('admin.job-vacancies.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
