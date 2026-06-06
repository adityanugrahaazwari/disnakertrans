@extends('layouts.public')

@section('title', 'Bidang Tenaga Kerja - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <h1>Bidang Tenaga Kerja</h1>
    <div class="breadcrumb">
        <a href="/">Beranda</a>
        <span>/</span>
        <a href="#">Bidang</a>
        <span>/</span>
        <span>Tenaga Kerja</span>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="background: white; padding: 40px; border-radius: var(--radius-md); box-shadow: var(--shadow-soft);">
            <div style="display: flex; gap: 40px; align-items: flex-start; margin-bottom: 40px;">
                <div style="width: 80px; height: 80px; background: var(--accent-soft); color: var(--accent); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; flex-shrink: 0;">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h2 style="margin-bottom: 15px; color: var(--primary);">Tugas Pokok & Fungsi</h2>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        Bidang Tenaga Kerja mempunyai tugas mengelola data ketenagakerjaan, memfasilitasi penempatan tenaga kerja dalam dan luar negeri, serta mengawasi perlindungan tenaga kerja dan perluasan kesempatan kerja.
                    </p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Kartu Kuning (AK-1)</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Layanan pendaftaran pencari kerja dan penerbitan kartu tanda bukti pendaftaran (AK-1).</p>
                </div>
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Bursa Kerja (BKK)</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Pengelolaan informasi lowongan kerja dan fasilitasi pertemuan antara perusahaan dan pencari kerja.</p>
                </div>
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Pekerja Migran</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Layanan perlindungan dan pendampingan bagi Calon Pekerja Migran Indonesia (CPMI).</p>
                </div>
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Perluasan Kerja</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Program pemberdayaan tenaga kerja mandiri dan penciptaan wirausaha baru.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
