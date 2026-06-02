@extends('layouts.public')

@section('title', 'Maklumat Pelayanan - Disnakertrans Kabupaten Banjar')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Maklumat Pelayanan</h1>
        <div class="breadcrumb">
            <a href="/">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span>Maklumat Pelayanan</span>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="card" style="padding: 60px; border: none; box-shadow: 0 30px 60px rgba(0,0,0,0.05); border-radius: 40px; position: relative; overflow: hidden; background: white;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 8px; background: linear-gradient(to right, var(--accent), var(--primary));"></div>
            
            <div style="text-align: center; margin-bottom: 50px;">
                <div style="width: 80px; height: 80px; background: var(--accent-soft); color: var(--accent); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 25px;">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 1px;">Maklumat Pelayanan</h2>
                <p style="color: var(--text-light); font-weight: 600; margin-top: 10px;">{{ $footerProfile->nama_dinas ?? 'Disnakertrans Kabupaten Banjar' }}</p>
            </div>

            <div style="max-width: 800px; margin: 0 auto; background: #fcfcfd; padding: 40px; border-radius: 24px; border: 1px solid #f1f5f9;">
                <div style="font-size: 1.25rem; color: var(--text-dark); line-height: 2; text-align: center; font-style: italic; font-weight: 500;">
                    {!! nl2br(e($profile->maklumat_pelayanan ?? 'Kami berkomitmen untuk memberikan pelayanan dengan standar yang telah ditetapkan.')) !!}
                </div>
            </div>

            <div style="text-align: center; margin-top: 50px; padding-top: 40px; border-top: 1px dashed #e2e8f0;">
                <p style="color: var(--text-light); font-size: 0.9rem; margin-bottom: 20px;">Ditetapkan di Martapura</p>
                <div style="font-weight: 800; color: var(--primary); font-size: 1.1rem;">
                    KEPALA DINAS TENAGA KERJA DAN TRANSMIGRASI<br>
                    KABUPATEN BANJAR
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
