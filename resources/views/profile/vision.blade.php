@extends('layouts.public')

@section('title', 'Visi & Misi - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <div class="container">
        <h1>Visi & Misi</h1>
        <div class="breadcrumb">
            <a href="/">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span>Visi & Misi</span>
        </div>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="background: white; padding: 50px; border-radius: 24px; box-shadow: var(--shadow-soft); border: 1px solid #f1f5f9;">
            <div style="margin-bottom: 60px; text-align: center;">
                <span style="color: var(--accent); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; display: block; margin-bottom: 15px;">Tujuan Utama Kami</span>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 30px;">Visi</h2>
                <div style="font-size: 1.5rem; color: var(--text-dark); font-style: italic; line-height: 1.6; max-width: 800px; margin: 0 auto; position: relative; padding: 0 40px;">
                    <i class="fas fa-quote-left" style="position: absolute; top: -10px; left: 0; opacity: 0.1; font-size: 3rem;"></i>
                    "{{ $profile->vision ?? 'Terwujudnya Tenaga Kerja yang Kompeten, Produktif, dan Sejahtera.' }}"
                    <i class="fas fa-quote-right" style="position: absolute; bottom: -10px; right: 0; opacity: 0.1; font-size: 3rem;"></i>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #f1f5f9; margin: 60px 0;">

            <div>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 40px; text-align: center;">Misi</h2>
                <div style="display: grid; gap: 20px;">
                    @php
                        $misiPoints = explode("\n", $profile->mission ?? '');
                    @endphp
                    @foreach($misiPoints as $index => $point)
                        @if(trim($point))
                            <div style="display: flex; gap: 20px; align-items: flex-start; background: #f8fafc; padding: 25px; border-radius: 16px; border-left: 5px solid var(--accent);">
                                <div style="width: 40px; height: 40px; background: var(--accent); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">
                                    {{ $index + 1 }}
                                </div>
                                <p style="font-size: 1.1rem; color: var(--text-dark); line-height: 1.6; margin: 0;">{{ trim($point) }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
