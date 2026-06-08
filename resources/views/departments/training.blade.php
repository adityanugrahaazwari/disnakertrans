@extends('layouts.public')

@section('title', 'Bidang Pelatihan - Disnakertrans Kabupaten Banjar')

@section('extra_css')
<style>
    .training-hero {
        background: linear-gradient(135deg, var(--primary) 0%, #1e293b 100%);
        padding: 180px 8% 100px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .training-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://www.transparenttextures.com/patterns/cubes.png');
        opacity: 0.1;
    }

    .training-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1.5px;
        position: relative;
    }

    .training-hero p {
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto 30px;
        color: #94a3b8;
        line-height: 1.8;
        position: relative;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 50px;
        position: relative;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        padding: 25px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: 0.3s;
    }

    .stat-card:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-5px);
    }

    .stat-card h3 {
        font-size: 2rem;
        font-weight: 800;
        color: var(--accent);
        margin-bottom: 5px;
    }

    .stat-card p {
        font-size: 0.9rem;
        color: #94a3b8;
        margin: 0;
    }

    .category-filter {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 50px;
        padding: 10px;
        background: #f8fafc;
        border-radius: 100px;
        display: inline-flex;
        margin-left: 50%;
        transform: translateX(-50%);
    }

    .filter-btn {
        padding: 12px 28px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 700;
        transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        cursor: pointer;
    }

    .filter-btn.active {
        background: var(--accent);
        color: white;
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
    }

    .filter-btn:not(.active) {
        background: transparent;
        color: var(--text-light);
    }

    .filter-btn:not(.active):hover {
        background: white;
        color: var(--accent);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .training-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f1f5f9;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .training-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 30px 60px -12px rgba(15, 23, 42, 0.12);
        border-color: var(--accent-soft);
    }

    .card-image-wrapper {
        height: 240px;
        overflow: hidden;
        position: relative;
    }

    .training-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.6s;
    }

    .training-card:hover img {
        transform: scale(1.1);
    }

    .card-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(5px);
        padding: 6px 16px;
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card-content {
        padding: 30px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .card-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-light);
    }

    .card-meta i {
        color: var(--accent);
    }

    .training-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 15px;
        line-height: 1.3;
        transition: 0.3s;
    }

    .training-card:hover .training-title {
        color: var(--accent);
    }

    .training-desc {
        color: var(--text-light);
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .card-footer {
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .quota-info {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        font-size: 0.85rem;
        color: var(--success);
    }

    .btn-detail {
        width: 45px;
        height: 45px;
        background: var(--accent-soft);
        color: var(--accent);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-detail:hover {
        background: var(--accent);
        color: white;
        transform: rotate(-45deg);
    }

    .empty-state {
        text-align: center;
        padding: 100px 20px;
        background: #f8fafc;
        border-radius: 32px;
        grid-column: 1/-1;
    }

    .empty-state i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 25px;
    }
</style>
@endsection

@section('content')
<header class="training-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom: 30px; color: #94a3b8;">
            <a href="/" style="color: var(--accent);">Beranda</a>
            <span style="margin: 0 10px; opacity: 0.5;">/</span>
            <span>Pelatihan</span>
        </div>
        <h1>Upgrade Keahlianmu Bersama BLK</h1>
        <p>Tingkatkan kompetensi dan daya saing di dunia kerja melalui program pelatihan berbasis kompetensi yang kami selenggarakan secara profesional dan terukur.</p>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ count($categories) }}+</h3>
                <p>Kejuruan Unggulan</p>
            </div>
            <div class="stat-card">
                <h3>{{ \App\Models\Training::where('is_active', true)->count() }}</h3>
                <p>Program Aktif</p>
            </div>
            <div class="stat-card">
                <h3>100%</h3>
                <p>Instruktur Ahli</p>
            </div>
            <div class="stat-card">
                <h3>FREE</h3>
                <p>Biaya Pelatihan</p>
            </div>
        </div>
    </div>
</header>

<section class="section" style="background: #ffffff;">
    <div class="container" style="max-width: 1200px;">
        <div style="text-align: center; margin-bottom: 60px;">
            <span style="color: var(--accent); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; display: block; margin-bottom: 15px;">Daftar Pelatihan</span>
            <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); letter-spacing: -1px;">Program Pelatihan Tersedia</h2>
            
            <div class="category-filter" style="margin-top: 40px;">
                <a href="{{ route('departments.training') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">
                    Semua Bidang
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('departments.training', ['category' => $category->slug]) }}" class="filter-btn {{ request('category') == $category->slug ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
            @forelse($trainings as $training)
                <div class="training-card">
                    <div class="card-image-wrapper">
                        @if($training->image)
                            <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #f1f5f9; color: #cbd5e1;">
                                <i class="fas fa-graduation-cap" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        @if($training->category)
                            <div class="card-badge">{{ $training->category?->name }}</div>
                        @endif
                    </div>
                    
                    <div class="card-content">
                        <div class="card-meta">
                            <span><i class="far fa-calendar-alt"></i> {{ $training->start_date ? $training->start_date->format('d M Y') : 'Segera Hadir' }}</span>
                            <span style="opacity: 0.3;">|</span>
                            <span><i class="fas fa-clock"></i> Full Day</span>
                        </div>
                        
                        <h3 class="training-title">{{ $training->title }}</h3>
                        <p class="training-desc">{{ Str::limit($training->description, 110) }}</p>
                        
                        <div class="card-footer">
                            <div class="quota-info">
                                <i class="fas fa-user-friends"></i>
                                <span>Kuota {{ $training->quota }} Peserta</span>
                            </div>
                            <a href="#" class="btn-detail" title="Lihat Detail">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h3>Belum ada pelatihan tersedia</h3>
                    <p style="color: var(--text-light); max-width: 400px; margin: 0 auto;">Saat ini belum ada jadwal pelatihan untuk kategori ini. Silakan cek kembali dalam beberapa waktu ke depan.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 80px; display: flex; justify-content: center;">
            {{ $trainings->links() }}
        </div>
    </div>
</section>

<section class="section" style="background: #f8fafc; border-radius: 60px 60px 0 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">
            <div>
                <span style="color: var(--accent); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">Cara Mendaftar</span>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin: 20px 0; line-height: 1.2;">Langkah Mudah Mengikuti Pelatihan</h2>
                
                <div style="margin-top: 40px;">
                    <div style="display: flex; gap: 25px; margin-bottom: 35px;">
                        <div style="width: 50px; height: 50px; background: white; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: var(--accent); box-shadow: 0 10px 20px rgba(0,0,0,0.05); flex-shrink: 0;">01</div>
                        <div>
                            <h4 style="font-size: 1.1rem; margin-bottom: 8px;">Pilih Kejuruan</h4>
                            <p style="color: var(--text-light); font-size: 0.95rem;">Tentukan program pelatihan yang sesuai dengan minat dan bakatmu.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 25px; margin-bottom: 35px;">
                        <div style="width: 50px; height: 50px; background: white; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: var(--accent); box-shadow: 0 10px 20px rgba(0,0,0,0.05); flex-shrink: 0;">02</div>
                        <div>
                            <h4 style="font-size: 1.1rem; margin-bottom: 8px;">Lengkapi Berkas</h4>
                            <p style="color: var(--text-light); font-size: 0.95rem;">Siapkan dokumen pendukung seperti KTP, Ijazah, dan Foto Terbaru.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 25px;">
                        <div style="width: 50px; height: 50px; background: white; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: var(--accent); box-shadow: 0 10px 20px rgba(0,0,0,0.05); flex-shrink: 0;">03</div>
                        <div>
                            <h4 style="font-size: 1.1rem; margin-bottom: 8px;">Daftar Online/Offline</h4>
                            <p style="color: var(--text-light); font-size: 0.95rem;">Lakukan pendaftaran melalui portal ini atau datang langsung ke kantor BLK.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="position: relative;">
                <div style="width: 100%; height: 500px; background: #e2e8f0; border-radius: 40px; overflow: hidden; transform: rotate(3deg);">
                    <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=800&q=80" alt="Training" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="position: absolute; bottom: -30px; left: -30px; background: var(--accent); color: white; padding: 40px; border-radius: 30px; box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3); max-width: 250px;">
                    <i class="fas fa-quote-left" style="font-size: 2rem; opacity: 0.3; margin-bottom: 15px; display: block;"></i>
                    <p style="font-weight: 700; line-height: 1.5; margin: 0;">"Investasi terbaik adalah investasi pada kemampuan diri sendiri."</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

