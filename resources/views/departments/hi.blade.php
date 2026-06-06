@extends('layouts.public')

@section('title', 'Bidang Hubungan Industrial - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <h1>Bidang Hubungan Industrial</h1>
    <div class="breadcrumb">
        <a href="/">Beranda</a>
        <span>/</span>
        <a href="#">Bidang</a>
        <span>/</span>
        <span>Hubungan Industrial</span>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="background: white; padding: 40px; border-radius: var(--radius-md); box-shadow: var(--shadow-soft);">
            <div style="display: flex; gap: 40px; align-items: flex-start; margin-bottom: 40px;">
                <div style="width: 80px; height: 80px; background: var(--accent-soft); color: var(--accent); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; flex-shrink: 0;">
                    <i class="fas fa-handshake"></i>
                </div>
                <div>
                    <h2 style="margin-bottom: 15px; color: var(--primary);">Tugas Pokok & Fungsi</h2>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        Bidang Hubungan Industrial mempunyai tugas melaksanakan penyiapan perumusan kebijakan teknis, koordinasi, pelaksanaan, pemantauan, evaluasi dan pelaporan di bidang pengupahan, jaminan sosial tenaga kerja, syarat kerja, serta pencegahan dan penyelesaian perselisihan hubungan industrial.
                    </p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Syarat Kerja</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Pendaftaran Perjanjian Kerja Bersama (PKB) dan Pengesahan Peraturan Perusahaan (PP).</p>
                </div>
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Perselisihan</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Mediasi penyelesaian perselisihan hubungan industrial antara pengusaha dan pekerja.</p>
                </div>
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Pengupahan</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Sosialisasi dan pengawasan penerapan Upah Minimum Kabupaten (UMK).</p>
                </div>
                <div style="padding: 30px; border: 1px solid #f1f5f9; border-radius: 16px;">
                    <h3 style="margin-bottom: 15px; font-size: 1.1rem;"><i class="fas fa-check-circle" style="color: var(--accent); margin-right: 10px;"></i> Jamsostek</h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);">Fasilitasi dan koordinasi jaminan sosial bagi tenaga kerja sektor formal dan informal.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
