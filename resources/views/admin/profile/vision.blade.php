@extends('layouts.admin')

@section('header_title', 'Visi & Misi')

@section('content')
<div class="card">
    <h3 style="margin-top:0;">Pengaturan Visi & Misi</h3>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.vision.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Visi</label>
            <textarea name="visi" required style="width: 100%; height: 100px; padding: 15px; border: 1px solid #d1d5db; border-radius: 6px; font-family: inherit; font-size: 15px; line-height: 1.5; box-sizing: border-box;">{{ old('visi', $profile->visi ?? '') }}</textarea>
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold;">Misi</label>
            <textarea name="misi" required style="width: 100%; height: 250px; padding: 15px; border: 1px solid #d1d5db; border-radius: 6px; font-family: inherit; font-size: 15px; line-height: 1.5; box-sizing: border-box;" placeholder="Gunakan poin-poin...">{{ old('misi', $profile->misi ?? '') }}</textarea>
            <p style="font-size: 12px; color: #6b7280; margin-top: 5px;">* Tuliskan setiap poin misi dalam baris baru.</p>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
