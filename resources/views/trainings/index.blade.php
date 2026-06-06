@extends('layouts.public')

@section('title', 'Program Pelatihan - Disnakertrans Kabupaten Banjar')

@section('extra_css')
<style>
    .page-hero {
        background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), 
                    url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        padding: 200px 8% 120px;
        text-align: center;
        color: white;
    }

    .page-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1.5px;
    }

    .page-hero p {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.7);
        max-width: 800px;
        margin: 0 auto;
    }

    .filter-section {
        margin-top: -50px;
        position: relative;
        z-index: 10;
        display: flex;
        justify-content: center;
    }

    .filter-container {
        background: white;
        padding: 15px;
        border-radius: 100px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        display: inline-flex;
        gap: 10px;
        max-width: 90%;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .filter-container::-webkit-scrollbar { display: none; }

    .filter-link {
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 700;
        white-space: nowrap;
        transition: 0.3s;
    }

    .filter-link.active {
        background: var(--accent);
        color: white;
    }

    .filter-link:not(.active) {
        color: var(--text-light);
    }

    .filter-link:not(.active):hover {
        background: var(--accent-soft);
        color: var(--accent);
    }

    .training-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        margin-top: 80px;
    }

    .modern-card {
        background: white;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .modern-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 40px 80px -15px rgba(15, 23, 42, 0.15);
    }

    .image-box {
        height: 250px;
        position: relative;
        overflow: hidden;
    }

    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }

    .modern-card:hover .image-box img {
        transform: scale(1.1);
    }

    .category-tag {
        position: absolute;
        top: 25px;
        left: 25px;
        background: var(--accent);
        color: white;
        padding: 6px 18px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .content-box {
        padding: 35px;
    }

    .training-info {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-light);
    }

    .training-info span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .training-info i {
        color: var(--accent);
    }

    .training-name {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .training-summary {
        color: var(--text-light);
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 30px;
        height: 3.4em;
        overflow: hidden;
    }

    .footer-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .quota-badge {
        background: var(--accent-soft);
        color: var(--accent);
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 0.85rem;
        font-weight: 800;
    }

    .btn-action {
        background: var(--primary);
        color: white;
        padding: 12px 25px;
        border-radius: 15px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .btn-action:hover {
        background: var(--accent);
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<header class="page-hero">
    <div class="container" style="max-width: 1200px;">
        <div class="breadcrumb" style="color: rgba(255,255,255,0.6); margin-bottom: 25px;">
            <a href="/" style="color: white;">Beranda</a>
            <span style="margin: 0 10px;">/</span>
            <span>Program Pelatihan</span>
        </div>
        <h1>Temukan Masa Depanmu</h1>
        <p>Pilih dari berbagai program pelatihan keahlian yang dirancang untuk membantumu menguasai skill baru dan siap terjun ke industri profesional.</p>
    </div>
</header>

<div class="filter-section">
    <div class="filter-container">
        <a href="{{ route('trainings.index') }}" class="filter-link {{ !request('category') ? 'active' : '' }}">
            Semua Program
        </a>
        @foreach($categories as $category)
            <a href="{{ route('trainings.index', ['category' => $category->slug]) }}" class="filter-link {{ request('category') == $category->slug ? 'active' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>

<section class="section">
    <div class="container" style="max-width: 1200px;">
        <div class="training-grid">
            @forelse($trainings as $training)
                <div class="modern-card">
                    <div class="image-box">
                        @if($training->image)
                            <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #f8fafc; color: #cbd5e1;">
                                <i class="fas fa-graduation-cap" style="font-size: 5rem;"></i>
                            </div>
                        @endif
                        @if($training->category)
                            <div class="category-tag">{{ $training->category->name }}</div>
                        @endif
                    </div>
                    
                    <div class="content-box">
                        <div class="training-info">
                            <span><i class="far fa-calendar-alt"></i> {{ $training->start_date ? $training->start_date->format('d M Y') : 'Coming Soon' }}</span>
                            <span><i class="fas fa-certificate"></i> Sertifikat</span>
                        </div>
                        
                        <h3 class="training-name">{{ $training->title }}</h3>
                        <p class="training-summary">{{ $training->description }}</p>
                        
                        <div class="footer-box">
                            <div class="quota-badge">
                                <i class="fas fa-users" style="margin-right: 8px;"></i> {{ $training->quota }} Peserta
                            </div>
                            <a href="#" class="btn-action">Detail Program</a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                    <img src="https://illustrations.popsy.co/white/searching.svg" alt="Not Found" style="width: 250px; margin-bottom: 30px;">
                    <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--primary);">Program tidak ditemukan</h3>
                    <p style="color: var(--text-light); margin-top: 10px;">Belum ada jadwal pelatihan untuk kategori yang Anda pilih.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 80px; display: flex; justify-content: center;">
            {{ $trainings->links() }}
        </div>
    </div>
</section>

<section class="section" style="background: #0f172a; color: white; padding: 100px 8%; border-radius: 60px;">
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 50px; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <h2 style="font-size: 2.8rem; font-weight: 800; margin-bottom: 20px; letter-spacing: -1px;">Ingin info lebih lanjut?</h2>
            <p style="font-size: 1.1rem; color: #94a3b8; line-height: 1.8;">Hubungi layanan informasi kami atau datang langsung ke Gedung BLK Kabupaten Banjar untuk berkonsultasi mengenai program yang paling tepat untukmu.</p>
        </div>
        <div style="display: flex; gap: 20px;">
            <a href="/#pengaduan" style="background: var(--accent); color: white; padding: 18px 40px; border-radius: 20px; text-decoration: none; font-weight: 800; transition: 0.3s; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);">
                Hubungi Kami
            </a>
            <a href="{{ route('downloads.index') }}" style="background: rgba(255,255,255,0.05); color: white; padding: 18px 40px; border-radius: 20px; text-decoration: none; font-weight: 800; transition: 0.3s; border: 1px solid rgba(255,255,255,0.1);">
                Unduh Brosur
            </a>
        </div>
    </div>
</section>
@endsection
