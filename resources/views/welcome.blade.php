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
            --bg-glass: rgba(255, 255, 255, 0.95);
            --radius-lg: 30px;
            --radius-md: 20px;
            --shadow-soft: 0 10px 30px rgba(0, 0, 0, 0.05);
            --header-height: 90px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: var(--text-dark); line-height: 1.6; background-color: #ffffff; overflow-x: hidden; }

        /* Navigation */
        nav { position: fixed; top: 0; width: 100%; z-index: 2000; padding: 0 8%; display: flex; justify-content: space-between; align-items: center; background: var(--bg-glass); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); height: var(--header-height); transition: 0.4s; }
        .logo { display: flex; align-items: center; gap: 14px; text-decoration: none; }
        .logo-icon { width: 45px; height: 45px; background: var(--accent); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 22px; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3); }
        .logo-text h1 { font-size: 1.1rem; font-weight: 800; color: var(--primary); letter-spacing: -0.5px; line-height: 1; }
        .logo-text span { font-size: 0.75rem; color: var(--text-light); text-transform: uppercase; font-weight: 600; letter-spacing: 1px; }
        
        .mobile-menu-btn { display: none; background: none; border: none; font-size: 1.8rem; color: var(--primary); cursor: pointer; }
        .nav-links { display: flex; gap: 2.5rem; list-style: none; align-items: center; }
        .nav-links a { text-decoration: none; color: var(--text-dark); font-weight: 700; font-size: 0.95rem; transition: 0.3s; display: flex; align-items: center; gap: 8px; }
        .nav-links a:hover { color: var(--accent); }
        
        .nav-item { position: relative; }
        .dropdown-menu { position: absolute; top: 100%; left: 0; background: white; min-width: 240px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border-radius: 16px; padding: 15px; opacity: 0; visibility: hidden; transform: translateY(15px); transition: 0.3s; list-style: none; border: 1px solid rgba(0,0,0,0.05); }
        .nav-item:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); }
        .dropdown-item { padding: 12px 18px; border-radius: 10px; font-size: 0.9rem; color: var(--text-dark); text-decoration: none; display: block; transition: 0.2s; font-weight: 600; }
        .dropdown-item:hover { background: var(--accent-soft); color: var(--accent); padding-left: 25px; }
        .btn-portal { background: var(--primary); color: white !important; padding: 12px 28px; border-radius: 50px; box-shadow: 0 10px 20px rgba(15, 23, 42, 0.2); }
        .btn-portal:hover { background: var(--accent); transform: translateY(-2px); }

        /* Sections General */
        .section { padding: 120px 8%; position: relative; }
        .section-header { text-align: center; margin-bottom: 80px; max-width: 800px; margin-left: auto; margin-right: auto; }
        .section-tag { color: var(--accent); text-transform: uppercase; font-weight: 800; font-size: 0.85rem; letter-spacing: 3px; margin-bottom: 15px; display: block; }
        .section-title { font-size: clamp(2rem, 5vw, 3rem); font-weight: 800; color: var(--primary); letter-spacing: -1.5px; line-height: 1.1; }

        /* Hero */
        .hero-container { padding: calc(var(--header-height) + 40px) 8% 100px; background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 60%); min-height: 90vh; display: flex; align-items: center; }
        .hero-grid { max-width: 1300px; margin: 0 auto; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 80px; align-items: center; width: 100%; }
        .badge-hero { display: inline-block; background: var(--accent-soft); color: var(--accent); padding: 10px 25px; border-radius: 50px; font-size: 0.85rem; font-weight: 800; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 1px; }
        .hero h2 { font-size: clamp(2.5rem, 6vw, 4.5rem); line-height: 1.1; font-weight: 800; color: var(--primary); margin-bottom: 30px; letter-spacing: -3px; }
        .hero p { font-size: clamp(1.1rem, 2vw, 1.3rem); color: var(--text-light); margin-bottom: 45px; max-width: 650px; line-height: 1.7; }
        .hero-btns { display: flex; gap: 20px; margin-top: 20px; margin-bottom: 60px; }
        .btn { display: inline-flex; align-items: center; gap: 12px; padding: 18px 36px; border-radius: 16px; font-weight: 800; text-decoration: none; transition: 0.4s; font-size: 1rem; cursor: pointer; border: none; }
        .btn-accent { background: var(--accent); color: white; box-shadow: 0 15px 35px rgba(59, 130, 246, 0.25); }
        .btn-accent:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3); }
        .btn-outline { border: 2px solid #e2e8f0; color: var(--text-dark); background: white; }
        .btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-5px); }
        
        .hero-stats { display: flex; gap: 50px; border-top: 1px solid #f1f5f9; padding-top: 40px; }
        .stat-item h4 { font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 5px; }
        .stat-item p { font-size: 0.9rem; font-weight: 700; color: var(--text-light); margin: 0; }

        /* Grid Layouts */
        .responsive-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; }
        
        /* Cards */
        .card-modern { padding: 50px 40px; border-radius: var(--radius-lg); background: #f8fafc; border: 1px solid #f1f5f9; transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%; text-decoration: none; color: inherit; display: block; position: relative; overflow: hidden; }
        .card-modern:hover { transform: translateY(-15px); background: white; box-shadow: 0 30px 60px rgba(15, 23, 42, 0.1); border-color: var(--accent-soft); }
        
        /* Training Cards */
        .training-card { background: white; border-radius: var(--radius-lg); overflow: hidden; border: 1px solid #f1f5f9; transition: 0.4s; display: flex; flex-direction: column; height: 100%; }
        .training-card:hover { transform: translateY(-15px); box-shadow: 0 30px 60px rgba(0,0,0,0.08); }
        .training-img { height: 260px; position: relative; overflow: hidden; }
        .training-img img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .training-card:hover .training-img img { transform: scale(1.1); }
        .training-badge { position: absolute; top: 25px; left: 25px; background: var(--accent); color: white; padding: 6px 16px; border-radius: 8px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; z-index: 10; }

        /* Footer */
        footer { background: #020617; color: white; padding: 120px 8% 50px; }
        .footer-grid { display: grid; grid-template-columns: 1.5fr 0.8fr 0.8fr 1.2fr; gap: 80px; margin-bottom: 80px; }
        .footer-col h4 { margin-bottom: 30px; font-size: 1.2rem; font-weight: 800; color: white; }
        .footer-col ul { list-style: none; }
        .footer-col li { margin-bottom: 18px; }
        .footer-col a { color: #94a3b8; text-decoration: none; transition: 0.3s; font-weight: 500; }
        .footer-col a:hover { color: white; padding-left: 8px; }
        .social-links { display: flex; gap: 15px; margin-top: 30px; }
        .social-btn { width: 45px; height: 45px; border-radius: 12px; background: rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s; font-size: 1.2rem; }
        .social-btn:hover { background: var(--accent); transform: translateY(-5px); }

        /* Responsive Breakpoints */
        @media (max-width: 1200px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 60px; }
        }

        @media (max-width: 1024px) {
            nav { padding: 0 5%; }
            .hero-grid { grid-template-columns: 1fr; text-align: center; gap: 60px; }
            .hero-content { order: 2; }
            .hero-illustration { order: 1; max-width: 500px; margin: 0 auto; }
            .hero-btns, .hero-stats { justify-content: center; }
            .hero h2 { font-size: 3.5rem; }
            .section { padding: 100px 5%; }
        }

        @media (max-width: 768px) {
            nav { height: 80px; }
            .mobile-menu-btn { display: block; }
            .nav-links { position: fixed; top: 80px; left: -100%; width: 100%; height: calc(100vh - 80px); background: white; flex-direction: column; padding: 50px 40px; transition: 0.5s cubic-bezier(0.4, 0, 0.2, 1); align-items: flex-start; overflow-y: auto; z-index: 1999; box-shadow: 20px 0 40px rgba(0,0,0,0.1); }
            .nav-links.active { left: 0; }
            .nav-item { width: 100%; border-bottom: 1px solid #f1f5f9; padding-bottom: 15px; }
            .dropdown-menu { position: static; opacity: 1; visibility: visible; transform: none; box-shadow: none; padding: 15px 0 0 20px; display: none; border: none; }
            .nav-item.active .dropdown-menu { display: block; }
            .hero-btns { flex-direction: column; width: 100%; }
            .btn { width: 100%; justify-content: center; }
            .hero-stats { flex-wrap: wrap; gap: 30px; }
            .hero h2 { font-size: 2.8rem; letter-spacing: -1.5px; }
            .footer-grid { grid-template-columns: 1fr; gap: 50px; }
            .grid-special { grid-template-columns: 1fr !important; }
        }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="logo">
            <div class="logo-icon"><i class="fas fa-building-columns"></i></div>
            <div class="logo-text"><h1>DISNAKERTRANS</h1><span>KABUPATEN BANJAR</span></div>
        </a>
        <button class="mobile-menu-btn"><i class="fas fa-bars"></i></button>
        <ul class="nav-links">
            <li><a href="/">Beranda</a></li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="dropdown-trigger">Profil <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile.history') }}" class="dropdown-item">Tentang Kami</a></li>
                    <li><a href="{{ route('profile.vision') }}" class="dropdown-item">Visi & Misi</a></li>
                    <li><a href="{{ route('profile.structure') }}" class="dropdown-item">Struktur Organisasi</a></li>
                    <li><a href="{{ route('profile.maklumat') }}" class="dropdown-item">Maklumat Pelayanan</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="dropdown-trigger">Bidang <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    @foreach($departments as $dept)
                        <li><a href="{{ $dept->url ?? '#' }}" class="dropdown-item">{{ $dept->title }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="dropdown-trigger">Publikasi <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('posts.index') }}" class="dropdown-item">Berita & Artikel</a></li>
                    <li><a href="{{ route('jobs.index') }}" class="dropdown-item">Bursa Kerja (Loker)</a></li>
                    <li><a href="{{ route('trainings.index') }}" class="dropdown-item">Pusat Pelatihan</a></li>
                </ul>
            </li>
            <li><a href="{{ route('downloads.index') }}">Unduhan</a></li>
            <li><a href="#pengaduan">Kontak</a></li>
            <li><a href="/dashboard" class="btn-portal">Portal Admin</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero-container">
        <div class="hero-grid">
            <div class="hero-content">
                <span class="badge-hero">{{ $hero->badge_text ?? 'Pusat Ketenagakerjaan Resmi' }}</span>
                <h2>{!! $hero->title ?? 'Masa Depan Karirmu <br><span style="color: var(--accent);">Mulai di Sini.</span>' !!}</h2>
                <p>{{ $hero->subtitle ?? 'Kami menjembatani pencari kerja dengan peluang terbaik dan meningkatkan kompetensi tenaga kerja Kabupaten Banjar melalui pelatihan profesional.' }}</p>
                <div class="hero-btns">
                    <a href="{{ $hero->button_url ?? route('jobs.index') }}" class="btn btn-accent">{{ $hero->button_text ?? 'Cari Lowongan' }} <i class="fas fa-search"></i></a>
                    <a href="{{ $hero->button_url_2 ?? route('trainings.index') }}" class="btn btn-outline">{{ $hero->button_text_2 ?? 'Ikuti Pelatihan' }}</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item"><h4>{{ $hero->stat_1_count ?? '500+' }}</h4><p>{{ $hero->stat_1_text ?? 'Lowongan Aktif' }}</p></div>
                    <div class="stat-item"><h4>{{ $hero->stat_2_count ?? '50+' }}</h4><p>{{ $hero->stat_2_text ?? 'Program Pelatihan' }}</p></div>
                    <div class="stat-item"><h4>{{ $hero->stat_3_count ?? '10k+' }}</h4><p>{{ $hero->stat_3_text ?? 'Tenaga Terampil' }}</p></div>
                </div>
            </div>
            <div class="hero-illustration">
                <img src="{{ $hero->image ? asset('storage/'.$hero->image) : 'https://illustrations.popsy.co/white/work-from-home.svg' }}" alt="Hero" style="width: 100%; height: auto; filter: drop-shadow(0 30px 50px rgba(0,0,0,0.12));">
            </div>
        </div>
    </div>

    <!-- Bidang Section -->
    <section class="section">
        <div class="section-header">
            <span class="section-tag">Struktur Organisasi</span>
            <h2 class="section-title">Bidang Layanan Kami</h2>
            <p style="color: var(--text-light); margin-top: 25px; font-size: 1.15rem;">Mengenal lebih dekat pembagian tugas dan fungsi utama di Disnakertrans Kabupaten Banjar.</p>
        </div>
        <div class="responsive-grid">
            @foreach($departments as $dept)
                <a href="{{ $dept->url ?? '#' }}" class="card-modern">
                    <div style="width: 70px; height: 70px; background: white; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 30px; color: {{ $dept->color }}; font-size: 1.8rem; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;"><i class="{{ $dept->icon }}"></i></div>
                    <h3 style="font-size: 1.4rem; font-weight: 800; margin-bottom: 20px; color: var(--primary);">{{ $dept->title }}</h3>
                    <p style="font-size: 1rem; color: var(--text-light); line-height: 1.7;">{{ $dept->description }}</p>
                    <div style="margin-top: 30px; font-weight: 800; color: {{ $dept->color }}; font-size: 0.9rem; display: flex; align-items: center; gap: 10px;">Lihat Detail Bidang <i class="fas fa-arrow-right" style="font-size: 0.75rem;"></i></div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Sambutan Section -->
    @if($footerProfile->sambutan_kepala)
    <section class="section" style="background: #f8fafc; border-radius: 60px 60px 0 0;">
        <div class="hero-grid grid-special" style="display: grid; grid-template-columns: 0.8fr 1.2fr; gap: 100px; align-items: center;">
            <div style="position: relative;">
                <div style="position: absolute; width: 100%; height: 100%; border: 3px solid var(--accent); border-radius: 40px; top: 30px; left: 30px; z-index: 1;"></div>
                <div style="position: relative; z-index: 2; border-radius: 40px; overflow: hidden; box-shadow: 0 30px 60px rgba(15, 23, 42, 0.15);">
                    <img src="{{ $footerProfile->foto_kepala ? asset('storage/' . $footerProfile->foto_kepala) : 'https://via.placeholder.com/500x650' }}" style="width: 100%; height: auto; display: block;">
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 40px; background: linear-gradient(to top, rgba(15, 23, 42, 0.9), transparent); color: white;">
                        <h4 style="font-size: 1.4rem; font-weight: 800; margin: 0;">{{ $footerProfile->nama_kepala }}</h4>
                        <p style="font-size: 0.95rem; opacity: 0.9; margin: 8px 0 0; font-weight: 600;">{{ $footerProfile->jabatan_kepala }}</p>
                    </div>
                </div>
            </div>
            <div>
                <div style="width: 70px; height: 5px; background: var(--accent); margin-bottom: 40px; border-radius: 10px;"></div>
                <span class="section-tag" style="text-align: left;">Sambutan Hangat</span>
                <h2 class="section-title" style="margin-bottom: 35px;">Selamat Datang di Portal Resmi Disnakertrans</h2>
                <div style="color: var(--text-light); font-size: 1.15rem; line-height: 1.9; margin-bottom: 45px;">
                    {!! nl2br(e($footerProfile->sambutan_kepala)) !!}
                </div>
                <div style="display: flex; align-items: center; gap: 25px; padding: 25px; background: white; border-radius: 24px; border: 1px solid #f1f5f9; box-shadow: 0 15px 30px rgba(0,0,0,0.03);">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--accent-soft); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;"><i class="fas fa-quote-right"></i></div>
                    <p style="font-style: italic; color: var(--primary); font-weight: 700; font-size: 1.1rem; margin: 0;">"Melayani dengan Hati, Membangun Negeri."</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Steps Section -->
    <section class="section">
        <div class="section-header">
            <span class="section-tag">Panduan Karir</span>
            <h2 class="section-title">Cara Mudah Dapatkan Pekerjaan</h2>
            <p style="color: var(--text-light); margin-top: 20px; font-size: 1.1rem;">Ikuti langkah-langkah strategis ini untuk membangun masa depan profesional Anda.</p>
        </div>
        <div class="responsive-grid">
            @php $illustrations = ['https://illustrations.popsy.co/white/personal-data.svg', 'https://illustrations.popsy.co/white/student-going-to-school.svg', 'https://illustrations.popsy.co/white/celebration.svg']; @endphp
            @foreach($careerSteps as $index => $step)
                <div style="text-align: center; padding: 20px;">
                    <div style="height: 220px; margin-bottom: 35px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ $step->image ? asset('storage/' . $step->image) : $illustrations[$index % 3] }}" style="max-height: 100%; width: auto; filter: drop-shadow(0 15px 30px rgba(0,0,0,0.05));">
                    </div>
                    <div style="width: 45px; height: 45px; background: var(--accent); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; font-weight: 800; font-size: 1.2rem; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);">{{ $index + 1 }}</div>
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--primary); margin-bottom: 20px;">{{ $step->title }}</h3>
                    <p style="color: var(--text-light); font-size: 1.05rem; line-height: 1.7;">{{ $step->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" style="background: #f8fafc; border-radius: 60px;">
        <div class="section-header">
            <span class="section-tag">Program & Layanan</span>
            <h2 class="section-title">Layanan Unggulan Kami</h2>
        </div>
        <div class="responsive-grid">
            @foreach($services as $service)
                <div class="card-modern" style="padding: 40px; background: white;">
                    <div style="width: 65px; height: 60px; background: var(--accent-soft); color: var(--accent); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 25px;"><i class="{{ $service->icon }}"></i></div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; margin-bottom: 15px;">{{ $service->title }}</h3>
                    <p style="color: var(--text-light); font-size: 0.95rem; line-height: 1.7;">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Training Section -->
    <section class="section">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 80px; gap: 40px; flex-wrap: wrap;">
            <div style="max-width: 600px;">
                <span class="section-tag" style="text-align: left;">Pusat Pelatihan</span>
                <h2 class="section-title">Program Kompetensi Terbaru</h2>
            </div>
            <a href="{{ route('trainings.index') }}" class="btn btn-accent">Jelajahi Semua Pelatihan <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="responsive-grid">
            @foreach($latestTrainings as $training)
                <div class="training-card">
                    <div class="training-img">
                        <span class="training-badge">{{ $training->category->name ?? 'Umum' }}</span>
                        <img src="{{ $training->image ? asset('storage/'.$training->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $training->title }}">
                    </div>
                    <div style="padding: 35px; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--primary); margin-bottom: 20px; line-height: 1.3;">{{ Str::limit($training->title, 50) }}</h3>
                        <p style="color: var(--text-light); font-size: 1rem; margin-bottom: 30px; flex-grow: 1;">{{ Str::limit($training->description, 100) }}</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 25px; border-top: 1px solid #f1f5f9;">
                            <span style="font-weight: 700; color: var(--accent);"><i class="fas fa-users-viewfinder"></i> {{ $training->quota }} Kuota</span>
                            <a href="{{ route('trainings.index') }}" style="color: var(--primary); font-weight: 800; text-decoration: none;">Detail <i class="fas fa-chevron-right" style="font-size: 0.8rem;"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Jobs Section -->
    <section class="section" style="background: #0f172a; color: white; border-radius: 60px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 80px; flex-wrap: wrap; gap: 40px;">
            <div style="max-width: 600px;">
                <span class="section-tag" style="color: var(--accent);">Bursa Kerja</span>
                <h2 class="section-title" style="color: white;">Lowongan Kerja Terkini</h2>
            </div>
            <a href="{{ route('jobs.index') }}" class="btn btn-accent">Lihat Semua Loker <i class="fas fa-briefcase"></i></a>
        </div>
        <div class="responsive-grid">
            @foreach($latestJobs as $job)
                <a href="{{ route('jobs.show', $job->id) }}" class="card-modern" style="background: rgba(255,255,255,0.03); border-color: rgba(255,255,255,0.08); padding: 35px;">
                    <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 25px;">
                        <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--accent); font-size: 1.5rem;"><i class="fas fa-building"></i></div>
                        <div>
                            <h4 style="color: white; font-size: 1.15rem; font-weight: 800; margin: 0;">{{ Str::limit($job->posisi, 30) }}</h4>
                            <p style="color: #94a3b8; font-size: 0.85rem; margin: 5px 0 0;">{{ $job->perusahaan }}</p>
                        </div>
                    </div>
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 25px;">
                        <span style="background: rgba(59, 130, 246, 0.15); color: var(--accent); padding: 5px 12px; border-radius: 8px; font-size: 0.75rem; font-weight: 700;">Full Time</span>
                        <span style="background: rgba(255, 255, 255, 0.05); color: #94a3b8; padding: 5px 12px; border-radius: 8px; font-size: 0.75rem; font-weight: 700;">Kab. Banjar</span>
                    </div>
                    <span style="color: var(--accent); font-weight: 800; font-size: 0.9rem;">Lamar Sekarang <i class="fas fa-arrow-right" style="margin-left: 8px;"></i></span>
                </a>
            @endforeach
        </div>
    </section>

    <!-- News Section -->
    <section class="section">
        <div class="section-header">
            <span class="section-tag">Update Terbaru</span>
            <h2 class="section-title">Berita & Informasi</h2>
        </div>
        <div class="responsive-grid">
            @foreach($latestPosts as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="card-modern" style="padding: 0; overflow: hidden; border-radius: 30px;">
                    <div style="height: 240px; overflow: hidden;">
                        <img src="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/600x350' }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 35px;">
                        <span style="color: var(--accent); font-weight: 800; font-size: 0.75rem; text-transform: uppercase;">{{ $post->category->name ?? 'Update' }}</span>
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary); margin: 15px 0; line-height: 1.4;">{{ Str::limit($post->title, 60) }}</h3>
                        <p style="color: var(--text-light); font-size: 0.9rem; font-weight: 600;"><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Maps Section -->
    @if($footerProfile->google_maps_url)
    <section style="padding: 100px 8% 0; background: white;">
        <div class="hero-grid grid-special" style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 80px; align-items: center;">
            <div>
                <span class="section-tag" style="text-align: left;">Kunjungi Kami</span>
                <h3 style="font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 30px; line-height: 1.2;">{{ $footerProfile->nama_dinas }}</h3>
                <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--accent-soft); color: var(--accent); display: flex; align-items: center; justify-content: center; flex-shrink: 0;"><i class="fas fa-map-marker-alt"></i></div>
                    <p style="color: var(--text-light); font-size: 1.05rem; line-height: 1.7;">{{ $footerProfile->alamat }}</p>
                </div>
                <div style="padding: 30px; background: #f8fafc; border-radius: 24px; border: 1px solid #f1f5f9;">
                    <p style="margin-bottom: 15px; display: flex; align-items: center; gap: 15px;"><strong>Email:</strong> <span style="color: var(--text-light);">{{ $footerProfile->email }}</span></p>
                    <p style="display: flex; align-items: center; gap: 15px;"><strong>Telepon:</strong> <span style="color: var(--text-light);">{{ $footerProfile->telepon }}</span></p>
                </div>
            </div>
            <div class="google-maps-container" style="border-radius: 40px; overflow: hidden; height: 450px; box-shadow: 0 30px 60px rgba(0,0,0,0.1); border: 1px solid #f1f5f9;">
                {!! $footerProfile->google_maps_url !!}
            </div>
        </div>
        <style>.google-maps-container iframe { width: 100% !important; height: 100% !important; border:0; }</style>
    </section>
    @endif

    <!-- Contact Form Section -->
    <section class="section" id="pengaduan">
        <div class="hero-grid grid-special" style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 100px; align-items: center;">
            <div>
                <span class="section-tag" style="text-align: left;">Hubungi Kami</span>
                <h2 class="section-title" style="margin-bottom: 30px;">Layanan Pengaduan & Aspirasi</h2>
                <p style="color: var(--text-light); font-size: 1.15rem; line-height: 1.8; margin-bottom: 40px;">Sampaikan saran, keluhan, atau aspirasi Anda secara langsung melalui formulir resmi kami. Tim kami akan segera menindaklanjuti laporan Anda.</p>
                @if($footerProfile->pengaduan_wa)
                    <a href="https://wa.me/62{{ $footerProfile->pengaduan_wa }}" target="_blank" class="btn" style="background: #25d366; color: white; padding: 20px 40px; border-radius: 20px;"><i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i> Konsultasi via WhatsApp</a>
                @endif
            </div>
            <div class="card-modern" style="padding: 50px; background: white; border: none; box-shadow: 0 40px 100px rgba(0,0,0,0.06);">
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 25px;">
                        <label style="font-weight: 700; font-size: 0.9rem; margin-bottom: 10px; display: block;">Nama Lengkap</label>
                        <input type="text" name="name" required placeholder="Masukkan nama Anda" style="width:100%; padding: 16px 20px; border-radius: 14px; border: 1px solid #e2e8f0; background: #f8fafc; font-family: inherit;">
                    </div>
                    <div style="margin-bottom: 25px;">
                        <label style="font-weight: 700; font-size: 0.9rem; margin-bottom: 10px; display: block;">Email Aktif</label>
                        <input type="email" name="email" required placeholder="alamat@email.com" style="width:100%; padding: 16px 20px; border-radius: 14px; border: 1px solid #e2e8f0; background: #f8fafc; font-family: inherit;">
                    </div>
                    <div style="margin-bottom: 35px;">
                        <label style="font-weight: 700; font-size: 0.9rem; margin-bottom: 10px; display: block;">Isi Pesan / Aduan</label>
                        <textarea name="message" required rows="5" placeholder="Tuliskan detail aspirasi Anda di sini..." style="width:100%; padding: 16px 20px; border-radius: 14px; border: 1px solid #e2e8f0; background: #f8fafc; font-family: inherit; resize: none;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-accent" style="width:100%; justify-content: center; padding: 20px;">Kirim Pesan Sekarang <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <div class="logo" style="margin-bottom: 30px;">
                    <div class="logo-icon" style="background: white; color: var(--primary);"><i class="fas fa-building-columns"></i></div>
                    <div class="logo-text"><h1 style="color: white;">DISNAKERTRANS</h1><span style="color: #94a3b8;">KABUPATEN BANJAR</span></div>
                </div>
                <p style="color: #94a3b8; font-size: 1rem; line-height: 1.8;">{{ $footerProfile->footer_description ?? 'Membangun masyarakat Kabupaten Banjar yang sejahtera melalui pelayanan ketenagakerjaan yang profesional dan akuntabel.' }}</p>
                <div class="social-links">
                    @if($footerProfile->facebook_url)<a href="{{ $footerProfile->facebook_url }}" target="_blank" class="social-btn"><i class="fab fa-facebook-f"></i></a>@endif
                    @if($footerProfile->instagram_url)<a href="{{ $footerProfile->instagram_url }}" target="_blank" class="social-btn"><i class="fab fa-instagram"></i></a>@endif
                    @if($footerProfile->youtube_url)<a href="{{ $footerProfile->youtube_url }}" target="_blank" class="social-btn"><i class="fab fa-youtube"></i></a>@endif
                </div>
            </div>
            <div class="footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="{{ route('profile.vision') }}">Profil Dinas</a></li>
                    <li><a href="{{ route('profile.structure') }}">Struktur Organisasi</a></li>
                    <li><a href="{{ route('posts.index') }}">Berita Terkini</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Layanan Link</h4>
                <ul>
                    <li><a href="{{ route('jobs.index') }}">Bursa Kerja</a></li>
                    <li><a href="{{ route('trainings.index') }}">Pusat Pelatihan</a></li>
                    <li><a href="{{ route('downloads.index') }}">Pusat Unduhan</a></li>
                    <li><a href="#pengaduan">Layanan Pengaduan</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.7; margin-bottom: 25px;">
                    <i class="fas fa-map-marker-alt" style="color: var(--accent); margin-right: 10px;"></i> {{ $footerProfile->alamat }}
                </p>
                <p style="color: #94a3b8; font-size: 0.95rem; margin-bottom: 15px;"><i class="fas fa-envelope" style="color: var(--accent); margin-right: 10px;"></i> {{ $footerProfile->email }}</p>
                <p style="color: #94a3b8; font-size: 0.95rem;"><i class="fas fa-phone" style="color: var(--accent); margin-right: 10px;"></i> {{ $footerProfile->telepon }}</p>
            </div>
        </div>
        <div style="text-align: center; padding-top: 50px; border-top: 1px solid rgba(255,255,255,0.05); color: #64748b; font-size: 0.9rem;">
            <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Banjar. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        const menuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        const triggers = document.querySelectorAll('.dropdown-trigger');
        
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            menuBtn.querySelector('i').classList.toggle('fa-bars');
            menuBtn.querySelector('i').classList.toggle('fa-times');
        });

        triggers.forEach(t => {
            t.addEventListener('click', () => {
                if(window.innerWidth <= 768) {
                    const parent = t.parentElement;
                    parent.classList.toggle('active');
                }
            });
        });

        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.height = '80px';
                nav.style.background = 'white';
                nav.style.boxShadow = '0 10px 30px rgba(0,0,0,0.08)';
            } else {
                nav.style.height = '90px';
                nav.style.background = 'var(--bg-glass)';
                nav.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>
