<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disnakertrans Kabupaten Banjar - Portal Ketenagakerjaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0f172a;
            --accent: #3b82f6;
            --accent-soft: #eff6ff;
            --secondary: #f59e0b;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --bg-glass: rgba(255, 255, 255, 0.8);
            --radius-lg: 24px;
            --radius-md: 16px;
            --shadow-soft: 0 10px 25px -3px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* Modern Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 2000;
            padding: 1.5rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--bg-glass);
            backdrop-filter: blur(12px);
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: var(--accent);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            box-shadow: 0 8px 15px rgba(59, 130, 246, 0.2);
        }

        .logo-text h1 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -0.5px;
            line-height: 1;
        }

        .logo-text span {
            font-size: 0.75rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.95rem;
            transition: 0.3s;
            position: relative;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 220px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 12px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: 0.3s;
            list-style: none;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            color: var(--text-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.2s;
        }

        .dropdown-item:hover {
            background: var(--accent-soft);
            color: var(--accent);
            padding-left: 20px;
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
            font-size: 0.85rem;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .btn-portal {
            background: var(--primary);
            color: white !important;
            padding: 10px 24px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.2);
        }

        .btn-portal:hover {
            transform: translateY(-2px);
            background: var(--accent);
        }

        /* Hero Section Redesign */
        .hero {
            padding: 180px 8% 100px;
            background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 50%);
            position: relative;
            min-height: 85vh;
            display: flex;
            align-items: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.05) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            z-index: -1;
        }

        .hero-content {
            max-width: 800px;
        }

        .badge-hero {
            display: inline-block;
            background: var(--accent-soft);
            color: var(--accent);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero h2 {
            font-size: 4rem;
            line-height: 1.1;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 24px;
            letter-spacing: -2px;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-light);
            margin-bottom: 40px;
            max-width: 600px;
        }

        .hero-btns {
            display: flex;
            gap: 16px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            font-size: 1rem;
        }

        .btn-accent {
            background: var(--accent);
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .btn-outline {
            border: 2px solid #e2e8f0;
            color: var(--text-dark);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* Quick Info Cards */
        .stats-section {
            padding: 0 8%;
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .stat-card {
            background: white;
            padding: 40px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            border: 1px solid rgba(0,0,0,0.03);
            text-align: left;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: var(--accent-soft);
            color: var(--accent);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 24px;
        }

        .stat-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .stat-card p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Layout Section Styling */
        .section {
            padding: 120px 8%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 60px;
        }

        .section-title h4 {
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
            margin-bottom: 12px;
            font-weight: 800;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
        }

        /* News Cards */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .news-card {
            background: white;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 1px solid #f1f5f9;
            transition: 0.3s;
        }

        .news-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .news-img {
            height: 240px;
            background: #f1f5f9;
            position: relative;
        }

        .news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--accent);
            color: white;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .news-content {
            padding: 30px;
        }

        .news-date {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 12px;
            display: block;
        }

        .news-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .news-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Modern Footer */
        footer {
            background: #020617;
            color: white;
            padding: 100px 8% 40px;
        }

        .footer-main {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 60px;
            margin-bottom: 80px;
        }

        .footer-brand h3 {
            font-size: 1.5rem;
            margin-bottom: 24px;
        }

        .footer-brand p {
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.05);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: 0.3s;
        }

        .social-links a:hover {
            background: var(--accent);
        }

        .footer-col h4 {
            font-size: 1.1rem;
            margin-bottom: 24px;
            font-weight: 700;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col li {
            margin-bottom: 12px;
        }

        .footer-col a {
            color: #94a3b8;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-col a:hover {
            color: white;
            padding-left: 5px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.05);
            color: #64748b;
            font-size: 0.9rem;
        }

        @media (max-width: 1024px) {
            .hero h2 { font-size: 3rem; }
            .stats-grid { grid-template-columns: 1fr; }
            .footer-main { grid-template-columns: 1fr 1fr; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="logo">
            <div class="logo-icon">
                <i class="fas fa-building-columns"></i>
            </div>
            <div class="logo-text">
                <h1>DISNAKERTRANS</h1>
                <span>KABUPATEN BANJAR</span>
            </div>
        </a>
        <ul class="nav-links">
            <li><a href="/">Beranda</a></li>
            
            <li class="nav-item">
                <a href="#">Profil <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile.history') }}" class="dropdown-item"><i class="fas fa-info-circle"></i> Tentang</a></li>
                    <li><a href="{{ route('profile.vision') }}" class="dropdown-item"><i class="fas fa-eye"></i> Visi & Misi</a></li>
                    <li><a href="{{ route('profile.structure') }}" class="dropdown-item"><i class="fas fa-sitemap"></i> Struktur Organisasi</a></li>
                    <li><a href="{{ route('profile.maklumat') }}" class="dropdown-item"><i class="fas fa-hand-holding-heart"></i> Maklumat Pelayanan</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#">Bidang <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('departments.hi') }}" class="dropdown-item"><i class="fas fa-handshake"></i> Hubungan Industrial</a></li>
                    <li><a href="{{ route('departments.tk') }}" class="dropdown-item"><i class="fas fa-users"></i> Tenaga Kerja</a></li>
                    <li><a href="{{ route('departments.training') }}" class="dropdown-item"><i class="fas fa-tools"></i> Pelatihan</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#">Publikasi <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('posts.index') }}" class="dropdown-item"><i class="fas fa-newspaper"></i> Berita</a></li>
                    <li><a href="{{ route('jobs.index') }}" class="dropdown-item"><i class="fas fa-briefcase"></i> Lowongan Kerja</a></li>
                    <li><a href="{{ route('trainings.index') }}" class="dropdown-item"><i class="fas fa-graduation-cap"></i> Pelatihan</a></li>
                </ul>
            </li>

            <li><a href="{{ route('downloads.index') }}">Unduhan</a></li>
            <li><a href="#pengaduan">Kontak</a></li>
            <li><a href="/dashboard" class="btn-portal">Portal Admin</a></li>
        </ul>
    </nav>

    <div class="hero-container" style="position: relative; overflow: hidden; margin-top: 100px; background: #ffffff;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 50px; align-items: center; padding: 100px 8% 80px;">
            <div class="hero-content">
                <span class="badge-hero">{{ $hero->badge_text ?? 'Pusat Ketenagakerjaan Resmi' }}</span>
                <h2>{!! $hero->title ?? 'Masa Depan Karirmu <br><span style="color: var(--accent);">Mulai di Sini.</span>' !!}</h2>
                <p>{{ $hero->subtitle ?? 'Kami menjembatani pencari kerja dengan peluang terbaik dan meningkatkan kompetensi tenaga kerja Kabupaten Banjar melalui pelatihan profesional.' }}</p>
                <div class="hero-btns" style="margin-top: 30px;">
                    @if($hero && $hero->button_text)
                        <a href="{{ $hero->button_url ?? '#' }}" class="btn btn-accent">{{ $hero->button_text }} <i class="fas fa-search"></i></a>
                    @else
                        <a href="{{ route('jobs.index') }}" class="btn btn-accent">Cari Lowongan <i class="fas fa-search"></i></a>
                    @endif

                    @if($hero && $hero->button_text_2)
                        <a href="{{ $hero->button_url_2 ?? '#' }}" class="btn btn-outline">{{ $hero->button_text_2 }}</a>
                    @else
                        <a href="{{ route('trainings.index') }}" class="btn btn-outline">Ikuti Pelatihan</a>
                    @endif
                </div>
                
                <div style="margin-top: 50px; display: flex; gap: 40px; border-top: 1px solid #f1f5f9; padding-top: 30px;">
                    <div>
                        <h4 style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $hero->stat_1_count ?? '500+' }}</h4>
                        <p style="font-size: 0.85rem; color: var(--text-light); font-weight: 600;">{{ $hero->stat_1_text ?? 'Lowongan Aktif' }}</p>
                    </div>
                    <div>
                        <h4 style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $hero->stat_2_count ?? '50+' }}</h4>
                        <p style="font-size: 0.85rem; color: var(--text-light); font-weight: 600;">{{ $hero->stat_2_text ?? 'Program Pelatihan' }}</p>
                    </div>
                    <div>
                        <h4 style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $hero->stat_3_count ?? '10k+' }}</h4>
                        <p style="font-size: 0.85rem; color: var(--text-light); font-weight: 600;">{{ $hero->stat_3_text ?? 'Tenaga Terampil' }}</p>
                    </div>
                </div>
            </div>
            <div class="hero-illustration" style="position: relative;">
                <div style="position: absolute; width: 400px; height: 400px; background: var(--accent-soft); border-radius: 50%; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1; opacity: 0.5; filter: blur(50px);"></div>
                @if($hero && $hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Illustration" style="width: 100%; height: auto; position: relative; z-index: 2; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.1));">
                @else
                    <img src="https://illustrations.popsy.co/white/work-from-home.svg" alt="Labor Illustration" style="width: 100%; height: auto; position: relative; z-index: 2; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.1));">
                @endif
            </div>
        </div>
    </div>

    <!-- Bidang Section -->
    <section style="padding: 80px 8%; background: white;">
        <div style="text-align: center; margin-bottom: 50px;">
            <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800;">Struktur Organisasi</h4>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary);">Bidang Layanan Kami</h2>
            <p style="color: var(--text-light); margin-top: 10px;">Mengenal lebih dekat pembagian tugas dan fungsi di Disnakertrans Kabupaten Banjar.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            @foreach($departments as $dept)
                <a href="{{ $dept->url ?? '#' }}" style="text-decoration: none; color: inherit;">
                    <div style="padding: 40px 30px; border-radius: 24px; background: #f8fafc; border: 1px solid #f1f5f9; transition: 0.3s; text-align: center; height: 100%;">
                        <div style="width: 60px; height: 60px; background: white; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; color: {{ $dept->color }}; font-size: 1.5rem; box-shadow: 0 10px 20px rgba(0,0,0,0.05);"><i class="{{ $dept->icon }}"></i></div>
                        <h4 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 15px; color: var(--primary);">{{ $dept->title }}</h4>
                        <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.6;">{{ $dept->description }}</p>
                        <span style="display: inline-block; margin-top: 20px; font-weight: 700; color: {{ $dept->color }}; font-size: 0.85rem;">Lihat Detail <i class="fas fa-arrow-right" style="font-size: 0.7rem; margin-left: 5px;"></i></span>
                    </div>
                </a>
            @endforeach
            
            @if($departments->count() == 0)
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: #f8fafc; border-radius: 24px;">
                    <p style="color: #64748b;">Belum ada data bidang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    @if($footerProfile->sambutan_kepala)
    <section class="section" style="background: white; padding: 100px 8%;">
        <div style="display: grid; grid-template-columns: 0.8fr 1.2fr; gap: 80px; align-items: center;">
            <div style="position: relative;">
                <div style="position: absolute; width: 100%; height: 100%; border: 2px solid var(--accent); border-radius: 24px; top: 20px; left: 20px; z-index: 1;"></div>
                <div style="position: relative; z-index: 2; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                    @if($footerProfile->foto_kepala)
                        <img src="{{ asset('storage/' . $footerProfile->foto_kepala) }}" alt="{{ $footerProfile->nama_kepala }}" style="width: 100%; height: auto; display: block;">
                    @else
                        <div style="width: 100%; height: 500px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                            <i class="fas fa-user" style="font-size: 5rem;"></i>
                        </div>
                    @endif
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 30px; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 700; margin: 0;">{{ $footerProfile->nama_kepala }}</h4>
                        <p style="font-size: 0.9rem; opacity: 0.8; margin: 5px 0 0;">{{ $footerProfile->jabatan_kepala }}</p>
                    </div>
                </div>
            </div>
            <div>
                <div style="width: 60px; height: 4px; background: var(--accent); margin-bottom: 30px;"></div>
                <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800;">Sambutan Hangat</h4>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 30px; line-height: 1.2;">Selamat Datang di Portal Resmi Disnakertrans</h2>
                <div style="color: var(--text-light); font-size: 1.1rem; line-height: 1.8; margin-bottom: 40px;">
                    {!! nl2br(e($footerProfile->sambutan_kepala)) !!}
                </div>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--accent-soft); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p style="font-style: italic; color: var(--primary); font-weight: 600; margin: 0;">"Melayani dengan Hati, Membangun Negeri."</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Steps Section -->
    <section class="section" style="background: white; padding: 120px 8%;">
        <div style="text-align: center; margin-bottom: 80px;">
            <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800;">Panduan Karir</h4>
            <h2 style="font-size: 2.8rem; font-weight: 800; color: var(--primary); letter-spacing: -1px;">Cara Mudah Dapatkan Pekerjaan</h2>
            <p style="color: var(--text-light); max-width: 600px; margin: 20px auto 0;">Ikuti langkah strategis ini untuk membangun karir impian Anda bersama Disnakertrans.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
            @php
                $illustrations = [
                    'https://illustrations.popsy.co/white/personal-data.svg',
                    'https://illustrations.popsy.co/white/student-going-to-school.svg',
                    'https://illustrations.popsy.co/white/celebration.svg'
                ];
            @endphp
            @foreach($careerSteps as $index => $step)
                <div style="text-align: center;">
                    <div style="height: 200px; margin-bottom: 30px; display: flex; align-items: center; justify-content: center;">
                        @if($step->image)
                            <img src="{{ asset('storage/' . $step->image) }}" alt="{{ $step->title }}" style="max-height: 100%; width: auto;">
                        @else
                            <img src="{{ $illustrations[$index % 3] }}" alt="{{ $step->title }}" style="max-height: 100%; width: auto;">
                        @endif
                    </div>
                    <div style="width: 40px; height: 40px; background: var(--accent); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-weight: 800; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);">{{ $index + 1 }}</div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--primary); margin-bottom: 15px;">{{ $step->title }}</h3>
                    <p style="color: var(--text-light); font-size: 0.95rem;">{{ $step->description }}</p>
                </div>
            @endforeach
            
            @if($careerSteps->count() == 0)
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: #f8fafc; border-radius: 24px;">
                    <p style="color: #64748b;">Belum ada langkah panduan karir tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="section" id="layanan" style="background: #f8fafc;">
        <div style="text-align: center; margin-bottom: 60px;">
            <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800;">Program & Layanan</h4>
            <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary);">Layanan Unggulan Kami</h2>
            <div style="width: 50px; height: 3px; background: var(--accent); margin: 20px auto 0;"></div>
        </div>
        
        <div class="stats-grid">
            @forelse($services as $service)
                <div class="stat-card">
                    <div class="stat-icon"><i class="{{ $service->icon }}"></i></div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                    @if($service->url)
                        <a href="{{ $service->url }}" class="news-link" style="margin-top: 15px; font-size: 0.85rem;">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    @endif
                </div>
            @empty
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-info-circle"></i></div>
                    <h3>Layanan Kami</h3>
                    <p>Silakan hubungi kami atau cek secara berkala untuk informasi layanan terbaru.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Pelatihan Kerja Section -->
    <section class="section" id="pelatihan" style="background: linear-gradient(to bottom, #f8fafc, #ffffff); border-radius: 60px 60px 0 0; padding: 120px 8%;">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 80px; gap: 40px; flex-wrap: wrap;">
            <div style="max-width: 600px;">
                <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 3px; font-size: 0.85rem; margin-bottom: 15px; font-weight: 800; display: flex; align-items: center; gap: 10px;">
                    <span style="width: 30px; height: 2px; background: var(--accent);"></span> Program Kompetensi
                </h4>
                <h2 style="font-size: 3rem; font-weight: 800; color: var(--primary); line-height: 1.1; letter-spacing: -1.5px;">Tingkatkan Keahlian, <br><span style="color: var(--accent);">Raih Masa Depan.</span></h2>
                <p style="color: var(--text-light); margin-top: 25px; font-size: 1.1rem; line-height: 1.8;">Kembangkan potensi diri Anda melalui program pelatihan bersertifikat yang dirancang khusus untuk memenuhi standar kebutuhan industri saat ini.</p>
            </div>
            <a href="{{ route('trainings.index') }}" class="btn btn-accent" style="padding: 18px 35px; border-radius: 18px; box-shadow: 0 15px 30px rgba(59, 130, 246, 0.2);">
                Lihat Jadwal Pelatihan <i class="fas fa-calendar-alt" style="margin-left: 10px;"></i>
            </a>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
            @forelse($latestTrainings as $training)
                <div class="training-modern-card" style="background: white; border-radius: 32px; overflow: hidden; border: 1px solid #f1f5f9; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; display: flex; flex-direction: column;">
                    <div style="height: 240px; overflow: hidden; position: relative;">
                        @if($training->image)
                            <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                        @else
                            <div style="width: 100%; height: 100%; background: var(--accent-soft); display: flex; align-items: center; justify-content: center; color: var(--accent);">
                                <i class="fas fa-graduation-cap" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        <div style="position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.9); padding: 8px 15px; border-radius: 12px; font-size: 0.75rem; font-weight: 800; color: var(--primary); backdrop-filter: blur(5px);">
                            <i class="fas fa-users" style="color: var(--accent); margin-right: 5px;"></i> {{ $training->quota }} Kuota
                        </div>
                    </div>
                    <div style="padding: 35px; flex-grow: 1; display: flex; flex-direction: column;">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                            <span style="background: var(--accent-soft); color: var(--accent); padding: 5px 12px; border-radius: 8px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">{{ $training->category->name ?? 'Umum' }}</span>
                            <span style="font-size: 0.8rem; color: var(--text-light); font-weight: 600;">
                                <i class="far fa-calendar" style="margin-right: 5px;"></i> {{ $training->start_date ? $training->start_date->format('d M') : 'Segera' }}
                            </span>
                        </div>
                        <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--primary); margin-bottom: 15px; line-height: 1.3;">{{ Str::limit($training->title, 50) }}</h3>
                        <p style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin-bottom: 30px; flex-grow: 1;">{{ Str::limit($training->description, 100) }}</p>
                        <div style="padding-top: 25px; border-top: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 0.85rem; font-weight: 700; color: var(--accent);">Gratis & Bersertifikat</span>
                            <a href="{{ route('trainings.index') }}" style="width: 45px; height: 45px; background: var(--primary); color: white; border-radius: 14px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;" onmouseover="this.style.background='var(--accent)'" onmouseout="this.style.background='var(--primary)'">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: white; border-radius: 30px; border: 2px dashed #e2e8f0;">
                    <img src="https://illustrations.popsy.co/white/searching.svg" alt="Empty" style="width: 150px; margin-bottom: 20px; opacity: 0.5;">
                    <p style="color: #64748b; font-weight: 600;">Saat ini belum ada jadwal pelatihan yang dibuka.</p>
                </div>
            @endforelse
        </div>
    </section>

    <style>
        .training-modern-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.1);
            border-color: var(--accent-soft);
        }
        .training-modern-card:hover img {
            transform: scale(1.1);
        }
    </style>

    <!-- Lowongan Kerja Section -->
    <section class="section" id="lowongan" style="background: #ffffff; padding-top: 100px;">
        <div style="display: grid; grid-template-columns: 0.7fr 1.3fr; gap: 60px; align-items: center; margin-bottom: 60px;">
            <div>
                <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800;">Bursa Kerja</h4>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); line-height: 1.2;">Temukan Peluang Karir Impianmu</h2>
                <p style="color: var(--text-light); margin: 20px 0 30px; font-size: 1.1rem;">Ratusan perusahaan terpercaya mencari talenta terbaik seperti Anda. Mulai lamar sekarang!</p>
                <a href="{{ route('jobs.index') }}" class="btn btn-accent">Lihat Semua Lowongan <i class="fas fa-briefcase"></i></a>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                @forelse($latestJobs as $job)
                    <div class="news-card" style="border: 1px solid #f1f5f9; box-shadow: 0 4px 15px rgba(0,0,0,0.02); border-radius: 16px; transition: 0.3s; height: fit-content;">
                        <div class="news-content" style="padding: 24px;">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                <div style="width: 40px; height: 40px; background: #f8fafc; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--accent);">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div>
                                    <p style="margin: 0; font-size: 0.75rem; color: var(--text-light); font-weight: 600;">{{ Str::limit($job->perusahaan, 20) }}</p>
                                    @if($job->is_verified)
                                        <span style="font-size: 0.65rem; color: #10b981; font-weight: 700;"><i class="fas fa-check-circle"></i> Terverifikasi</span>
                                    @endif
                                </div>
                            </div>
                            <h3 style="font-size: 1.1rem; margin-bottom: 10px; font-weight: 700;">{{ Str::limit($job->posisi, 30) }}</h3>
                            <div style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 20px;">
                                <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i> Kab. Banjar & Sekitarnya
                            </div>
                            <a href="{{ route('jobs.show', $job->id) }}" class="news-link" style="font-size: 0.85rem;">Detail Loker <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: #f8fafc; border-radius: 16px;">
                        <p style="color: #64748b;">Belum ada lowongan kerja tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section" id="berita" style="background: white; padding: 120px 8%;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 60px;">
            <div>
                <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 3px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800; display: flex; align-items: center; gap: 10px;">
                    <span style="width: 30px; height: 2px; background: var(--accent);"></span> Informasi & Publikasi
                </h4>
                <h2 style="font-size: 2.8rem; font-weight: 800; color: var(--primary); letter-spacing: -1px;">Berita Terbaru</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline" style="border-radius: 14px; padding: 12px 25px;">
                Eksplorasi Berita <i class="fas fa-arrow-right" style="margin-left: 8px; font-size: 0.8rem;"></i>
            </a>
        </div>
        
        <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 40px;">
            @php $mainPost = $latestPosts->first(); @endphp
            @if($mainPost)
                <div class="news-main-card" style="position: relative; border-radius: 30px; overflow: hidden; height: 500px; cursor: pointer; group">
                    @if($mainPost->image)
                        <img src="{{ asset('storage/'.$mainPost->image) }}" alt="{{ $mainPost->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                    @else
                        <div style="width: 100%; height: 100%; background: var(--primary); display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-newspaper" style="font-size: 5rem; opacity: 0.2;"></i>
                        </div>
                    @endif
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 50px; background: linear-gradient(to top, rgba(15, 23, 42, 0.95), transparent); color: white;">
                        <span style="background: var(--accent); color: white; padding: 6px 15px; border-radius: 8px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; margin-bottom: 20px; display: inline-block;">{{ $mainPost->category->name ?? 'Update' }}</span>
                        <h3 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 20px; line-height: 1.2; letter-spacing: -0.5px;">{{ Str::limit($mainPost->title, 80) }}</h3>
                        <div style="display: flex; align-items: center; gap: 20px; font-size: 0.9rem; opacity: 0.8; font-weight: 500;">
                            <span><i class="far fa-calendar-alt" style="margin-right: 8px;"></i> {{ $mainPost->created_at->format('d M Y') }}</span>
                            <span><i class="far fa-user" style="margin-right: 8px;"></i> Admin Disnaker</span>
                        </div>
                        <a href="{{ route('posts.show', $mainPost->slug) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2;"></a>
                    </div>
                </div>
            @endif

            <div style="display: flex; flex-direction: column; gap: 25px;">
                @foreach($latestPosts->skip(1)->take(3) as $post)
                    <div style="display: grid; grid-template-columns: 120px 1fr; gap: 20px; align-items: center; padding: 15px; border-radius: 20px; transition: 0.3s; cursor: pointer; border: 1px solid transparent;" onmouseover="this.style.background='#f8fafc'; this.style.borderColor='#f1f5f9'" onmouseout="this.style.background='transparent'; this.style.borderColor='transparent'">
                        <div style="height: 100px; border-radius: 15px; overflow: hidden;">
                            @if($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="width: 100%; height: 100%; background: var(--accent-soft); display: flex; align-items: center; justify-content: center; color: var(--accent);">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <span style="font-size: 0.75rem; color: var(--accent); font-weight: 700; text-transform: uppercase;">{{ $post->category->name ?? 'Update' }}</span>
                            <h4 style="font-size: 1rem; font-weight: 800; color: var(--primary); margin: 8px 0; line-height: 1.4;">{{ Str::limit($post->title, 60) }}</h4>
                            <span style="font-size: 0.8rem; color: var(--text-light); font-weight: 500;"><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</span>
                        </div>
                        <a href="{{ route('posts.show', $post->slug) }}" style="position: absolute; width: 100%; height: 100%; z-index: 2;"></a>
                    </div>
                @endforeach

                @if($latestPosts->count() == 0)
                    <div style="text-align: center; padding: 40px; background: #f8fafc; border-radius: 20px; border: 1px dashed #e2e8f0;">
                        <p style="color: #64748b; font-weight: 600;">Belum ada berita terbaru saat ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <style>
        .news-main-card:hover img {
            transform: scale(1.05);
        }
        .news-main-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(15, 23, 42, 0.2);
            transition: 0.3s;
        }
        .news-main-card:hover::after {
            background: rgba(15, 23, 42, 0.1);
        }
    </style>

    <section class="section" style="background: white; padding: 80px 8%;">
        <div style="text-align: center; margin-bottom: 50px;">
            <p style="text-transform: uppercase; letter-spacing: 3px; font-size: 0.75rem; font-weight: 800; color: #94a3b8; margin-bottom: 10px;">Bekerja Sama Dengan</p>
            <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--primary);">Ratusan Perusahaan & Instansi</h3>
        </div>
        <div style="display: flex; justify-content: center; gap: 60px; flex-wrap: wrap; opacity: 0.5; filter: grayscale(100%);">
            <div style="display: flex; align-items: center; gap: 10px; font-size: 1.5rem; font-weight: 800; color: #64748b;"><i class="fas fa-industry"></i> MANUFAKTUR</div>
            <div style="display: flex; align-items: center; gap: 10px; font-size: 1.5rem; font-weight: 800; color: #64748b;"><i class="fas fa-microchip"></i> TEKNOLOGI</div>
            <div style="display: flex; align-items: center; gap: 10px; font-size: 1.5rem; font-weight: 800; color: #64748b;"><i class="fas fa-hospital"></i> KESEHATAN</div>
            <div style="display: flex; align-items: center; gap: 10px; font-size: 1.5rem; font-weight: 800; color: #64748b;"><i class="fas fa-hotel"></i> PARIWISATA</div>
            <div style="display: flex; align-items: center; gap: 10px; font-size: 1.5rem; font-weight: 800; color: #64748b;"><i class="fas fa-hard-hat"></i> KONSTRUKSI</div>
        </div>
    </section>

    @if($footerProfile->google_maps_url)
    <section style="padding: 100px 8% 0; background: white;">
        <div style="display: grid; grid-template-columns: 0.8fr 1.2fr; gap: 60px; align-items: center;">
            <div style="padding-right: 20px;">
                <h4 style="color: var(--accent); font-weight: 800; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">Kunjungi Kami</h4>
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--primary); margin-bottom: 20px; line-height: 1.3;">{{ $footerProfile->nama_dinas }}</h3>
                
                <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                    <i class="fas fa-map-marker-alt" style="color: var(--accent); margin-top: 5px;"></i>
                    <p style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin: 0;">{{ $footerProfile->alamat }}</p>
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px; padding-top: 20px; border-top: 1px solid #f1f5f9;">
                    <div style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: var(--text-dark); font-weight: 600;">
                        <i class="fas fa-phone-alt" style="color: var(--accent); width: 16px;"></i> {{ $footerProfile->telepon }}
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: var(--text-dark); font-weight: 600;">
                        <i class="fas fa-envelope" style="color: var(--accent); width: 16px;"></i> {{ $footerProfile->email }}
                    </div>
                </div>
            </div>
            
            <div style="border-radius: 30px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; background: #f8fafc;">
                <div class="google-maps-container" style="width: 100%; height: 400px;">
                    {!! $footerProfile->google_maps_url !!}
                </div>
            </div>
        </div>

        <style>
            .google-maps-container iframe {
                width: 100% !important;
                height: 100% !important;
                border: 0;
            }
            @media (max-width: 992px) {
                section[style*="padding: 100px 8% 0"] > div {
                    grid-template-columns: 1fr !important;
                    gap: 40px !important;
                }
                div[style*="padding-right: 20px"] {
                    padding-right: 0 !important;
                }
            }
        </style>
    </section>
    @endif

    <section class="section" id="pengaduan" style="background: white; padding: 100px 8%;">
        <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 80px; align-items: center;">
            <div>
                <h4 style="color: var(--accent); text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 12px; font-weight: 800;">Hubungi Kami</h4>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 24px;">{{ $footerProfile->pengaduan_title ?? 'Layanan Pengaduan & Aspirasi' }}</h2>
                <p style="color: var(--text-light); font-size: 1.1rem; line-height: 1.8; margin-bottom: 40px;">
                    {{ $footerProfile->pengaduan_description ?? 'Sampaikan keluhan, saran, atau pertanyaan Anda terkait layanan ketenagakerjaan kami. Tim kami akan segera menanggapi setiap laporan yang masuk.' }}
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @if($footerProfile->pengaduan_wa)
                        <a href="https://wa.me/62{{ $footerProfile->pengaduan_wa }}" target="_blank" style="display: flex; align-items: center; gap: 15px; text-decoration: none; color: inherit; background: #25d366; color: white; padding: 15px 25px; border-radius: 12px; width: fit-content; font-weight: 700; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);">
                            <i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i>
                            <span>Chat WhatsApp (+62 {{ $footerProfile->pengaduan_wa }})</span>
                        </a>
                    @endif
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--accent-soft); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p style="margin: 0; font-size: 0.8rem; color: var(--text-light); font-weight: 600;">Email Resmi</p>
                            <p style="margin: 0; font-weight: 700; color: var(--primary);">{{ $footerProfile->email ?? 'disnakertrans@banjarkab.go.id' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="padding: 40px; border: none; box-shadow: 0 20px 50px rgba(0,0,0,0.05); border-radius: 30px;">
                @if(session('success_message'))
                    <div style="padding: 20px; background: #dcfce7; color: #166534; border-radius: 12px; margin-bottom: 30px; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-check-circle" style="font-size: 1.25rem;"></i>
                        <span style="font-weight: 600;">{{ session('success_message') }}</span>
                    </div>
                @endif

                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; display: block;">Nama Lengkap</label>
                            <input type="text" name="name" required placeholder="Masukkan nama Anda" style="padding: 14px 18px; border-radius: 12px; background: #f8fafc; border: 1px solid #f1f5f9;">
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; display: block;">Alamat Email</label>
                            <input type="email" name="email" required placeholder="email@contoh.com" style="padding: 14px 18px; border-radius: 12px; background: #f8fafc; border: 1px solid #f1f5f9;">
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; display: block;">Subjek Pesan</label>
                        <input type="text" name="subject" required placeholder="Contoh: Pertanyaan Layanan AK-1" style="padding: 14px 18px; border-radius: 12px; background: #f8fafc; border: 1px solid #f1f5f9;">
                    </div>
                    <div style="margin-bottom: 30px;">
                        <label style="font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; display: block;">Isi Pesan / Pengaduan</label>
                        <textarea name="message" required rows="5" placeholder="Tuliskan pesan Anda di sini secara detail..." style="padding: 14px 18px; border-radius: 12px; background: #f8fafc; border: 1px solid #f1f5f9; width: 100%; font-family: inherit; resize: none;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px; font-size: 1rem; border-radius: 12px; justify-content: center; gap: 12px;">
                        <i class="fas fa-paper-plane"></i> Kirim Aduan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-main">
            <div class="footer-brand">
                <div class="logo" style="margin-bottom: 25px;">
                    <div class="logo-icon" style="background: white; color: var(--primary);">
                        <i class="fas fa-building-columns"></i>
                    </div>
                    <div class="logo-text">
                        <h1 style="color: white;">DISNAKERTRANS</h1>
                        <span style="color: #94a3b8;">KABUPATEN BANJAR</span>
                    </div>
                </div>
                <p>{{ $footerProfile->footer_description ?? 'Menjadi lembaga yang profesional dalam pelayanan ketenagakerjaan dan transmigrasi guna mewujudkan masyarakat yang sejahtera.' }}</p>
                <div class="social-links">
                    @if($footerProfile->facebook_url)
                        <a href="{{ $footerProfile->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($footerProfile->instagram_url)
                        <a href="{{ $footerProfile->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($footerProfile->youtube_url)
                        <a href="{{ $footerProfile->youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if($footerProfile->twitter_url)
                        <a href="{{ $footerProfile->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($footerProfile->tiktok_url)
                        <a href="{{ $footerProfile->tiktok_url }}" target="_blank"><i class="fab fa-tiktok"></i></a>
                    @endif
                </div>
            </div>
            
            <div class="footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="{{ route('profile.vision') }}">Visi & Misi</a></li>
                    <li><a href="{{ route('profile.structure') }}">Struktur Organisasi</a></li>
                    <li><a href="{{ route('profile.history') }}">Sejarah</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#">Pendaftaran AK-1</a></li>
                    <li><a href="#">Info Pelatihan</a></li>
                    <li><a href="#">Lowongan Kerja</a></li>
                    <li><a href="#pengaduan">Pengaduan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <ul style="color: #94a3b8; font-size: 0.9rem;">
                    <li style="display: flex; gap: 10px;">
                        <i class="fas fa-map-marker-alt" style="margin-top: 5px; color: var(--accent);"></i>
                        {{ $footerProfile->alamat ?? 'Jl. Jenderal Ahmad Yani No. 123, Martapura, Kab. Banjar' }}
                    </li>
                    <li style="display: flex; gap: 10px;">
                        <i class="fas fa-phone" style="margin-top: 5px; color: var(--accent);"></i>
                        {{ $footerProfile->telepon ?? '(0511) 4721XXX' }}
                    </li>
                    <li style="display: flex; gap: 10px;">
                        <i class="fas fa-envelope" style="margin-top: 5px; color: var(--accent);"></i>
                        {{ $footerProfile->email ?? 'disnakertrans@banjarkab.go.id' }}
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Banjar. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.padding = '1rem 8%';
                nav.style.boxShadow = '0 10px 30px rgba(0,0,0,0.08)';
            } else {
                nav.style.padding = '1.5rem 8%';
                nav.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>
