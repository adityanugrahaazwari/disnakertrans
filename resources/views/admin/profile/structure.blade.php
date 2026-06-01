@extends('layouts.admin')
@section('header_title', 'Struktur Organisasi')
@section('content')
<div class="card">
    <h3 style="margin-top:0;">Gambar Struktur Organisasi</h3>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 20px; border: 2px dashed #d1d5db; padding: 40px; text-align: center; border-radius: 8px;">
            <i class="fas fa-image fa-3x" style="color: #9ca3af; margin-bottom: 15px;"></i>
            <p style="color: #6b7280;">Belum ada gambar yang diunggah.</p>
            <input type="file" style="margin-top: 10px;">
        </div>
        <button type="submit" class="btn-login" style="width: auto; padding: 10px 25px;">Unggah Struktur</button>
    </form>
</div>
@endsection
