@extends('layouts.public')

@section('title', 'Sejarah - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <div class="container">
        <h1>Sejarah</h1>
        <div class="breadcrumb">
            <a href="/">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span>Sejarah</span>
        </div>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="background: white; padding: 50px; border-radius: 24px; box-shadow: var(--shadow-soft); border: 1px solid #f1f5f9;">
            <div style="text-align: center; margin-bottom: 50px;">
                <div style="width: 80px; height: 80px; background: var(--accent-soft); color: var(--accent); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 24px;">
                    <i class="fas fa-landmark"></i>
                </div>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary);">Jejak Langkah Kami</h2>
            </div>

            <div style="font-size: 1.15rem; color: var(--text-dark); line-height: 1.8; text-align: justify;">
                @if($profile->history)
                    {!! nl2br(e($profile->history)) !!}
                @else
                    <div style="text-align: center; padding: 40px; background: #f8fafc; border-radius: 16px; color: var(--text-light);">
                        <p>Konten sejarah sedang dalam tahap penyusunan. Silakan kembali lagi nanti.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
