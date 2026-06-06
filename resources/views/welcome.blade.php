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

    <div class="hero-container" style="position: relative; height: 85vh; overflow: hidden; margin: 100px 0 80px; box-shadow: var(--shadow-soft);">
        @if($hero)
            <header class="hero" 
                style="width: 100%; height: 100%; display: flex; background-image: linear-gradient(to right, rgba(255, 255, 255, 0.9) 30%, rgba(255, 255, 255, 0.2)), url('{{ asset('storage/' . $hero->image) }}'); background-size: cover; background-position: center; padding: 0 8%;">
                <div class="hero-content">
                    <span class="badge-hero">Resmi • Pemerintah Kab. Banjar</span>
                    <h2>{!! nl2br(e($hero->title)) !!}</h2>
                    <p>{{ $hero->subtitle }}</p>
                    <div class="hero-btns">
                        @if($hero->button_text)
                            <a href="{{ $hero->button_url ?? '#' }}" class="btn btn-accent">{{ $hero->button_text }} <i class="fas fa-arrow-right"></i></a>
                        @endif
                        <a href="#layanan" class="btn btn-outline">Tentang Kami</a>
                    </div>
                </div>
            </header>
        @else
            <header class="hero" style="display: flex; width: 100%; height: 100%; background-image: linear-gradient(to right, rgba(255, 255, 255, 0.9) 30%, rgba(255, 255, 255, 0.2)); padding: 0 8%;">
                <div class="hero-content">
                    <span class="badge-hero">Resmi • Pemerintah Kab. Banjar</span>
                    <h2>Masa Depan Kerja <br>Mulai dari Sini.</h2>
                    <p>Kami hadir untuk menciptakan ekosistem ketenagakerjaan yang unggul, kompeten, dan menyejahterakan seluruh masyarakat Kabupaten Banjar.</p>
                    <div class="hero-btns">
                        <a href="#layanan" class="btn btn-accent">Jelajahi Layanan <i class="fas fa-arrow-right"></i></a>
                        <a href="#" class="btn btn-outline">Tentang Kami</a>
                    </div>
                </div>
            </header>
        @endif
    </div>

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
    <section class="section" id="pelatihan" style="background: white;">
        <div class="section-header">
            <div class="section-title">
                <h4>Peningkatan Kompetensi</h4>
                <h2>Pelatihan Kerja Terbaru</h2>
            </div>
            <a href="{{ route('trainings.index') }}" class="news-link">Lihat Semua Pelatihan <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="news-grid">
            @forelse($latestTrainings as $training)
                <div class="news-card">
                    <div class="news-img">
                        @if($training->image)
                            <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}">
                        @else
                            <div style="width: 100%; height: 100%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                                <i class="fas fa-tools" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <span class="news-tag" style="background: var(--secondary);">Kuota: {{ $training->quota }}</span>
                    </div>
                    <div class="news-content">
                        <span class="news-date">
                            <i class="far fa-calendar-alt"></i> 
                            {{ $training->start_date ? $training->start_date->format('d M Y') : '-' }} - 
                            {{ $training->end_date ? $training->end_date->format('d M Y') : '-' }}
                        </span>
                        <h3>{{ Str::limit($training->title, 60) }}</h3>
                        <p style="color: var(--text-light); font-size: 0.9rem; margin-bottom: 20px;">{{ Str::limit($training->description, 100) }}</p>
                        <a href="#" class="news-link">Detail Pelatihan <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: #f8fafc; border-radius: 16px;">
                    <p style="color: #64748b;">Belum ada program pelatihan saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Lowongan Kerja Section -->
    <section class="section" id="lowongan" style="background: #f8fafc;">
        <div class="section-header">
            <div class="section-title">
                <h4>Bursa Kerja</h4>
                <h2>Lowongan Kerja Terkini</h2>
            </div>
            <a href="{{ route('jobs.index') }}" class="news-link">Lihat Semua Lowongan <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="news-grid">
            @forelse($latestJobs as $job)
                <div class="news-card" style="border-top: 4px solid var(--accent);">
                    <div class="news-content">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <span class="news-tag" style="position: static; background: var(--accent-soft); color: var(--accent);">{{ $job->perusahaan }}</span>
                            @if($job->is_verified)
                                <i class="fas fa-check-circle" style="color: #10b981;" title="Verified Company"></i>
                            @endif
                        </div>
                        <h3 style="margin-bottom: 10px;">{{ $job->posisi }}</h3>
                        <div style="font-size: 0.85rem; color: var(--text-light); margin-bottom: 15px;">
                            <i class="fas fa-clock"></i> Deadline: {{ $job->deadline ? $job->deadline->format('d M Y') : 'N/A' }}
                        </div>
                        <div style="font-size: 0.9rem; color: var(--text-dark); margin-bottom: 20px; line-height: 1.5;">
                            {!! Str::limit($job->syarat, 120) !!}
                        </div>
                        <a href="{{ route('jobs.show', $job->id) }}" class="news-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: white; border-radius: 16px;">
                    <p style="color: #64748b;">Belum ada lowongan kerja tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="section" id="berita">
        <div class="section-header">
            <div class="section-title">
                <h4>Berita & Pengumuman</h4>
                <h2>Informasi Terkini</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="news-link">Lihat Semua Berita <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="news-grid">
            @forelse($latestPosts as $post)
                <div class="news-card">
                    <div class="news-img">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                        @endif
                        <span class="news-tag">{{ $post->category->name }}</span>
                    </div>
                    <div class="news-content">
                        <span class="news-date">{{ $post->created_at->format('d M Y') }}</span>
                        <h3>{{ Str::limit($post->title, 60) }}</h3>
                        <a href="{{ route('posts.show', $post->slug) }}" class="news-link">Baca Selengkapnya <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: #f8fafc; border-radius: 16px;">
                    <p style="color: #64748b;">Belum ada berita terbaru saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

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
