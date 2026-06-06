<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Disnakertrans Kabupaten Banjar - Portal Ketenagakerjaan')</title>
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
            background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px);
            background-size: 30px 30px;
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

        .nav-links a.active {
            color: var(--accent);
        }

        .nav-links a.active::after {
            width: 100%;
        }

        .dropdown-item.active {
            background: var(--accent-soft);
            color: var(--accent);
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

        /* Hero Section Styling (Standard) */
        .page-header {
            padding: 180px 8% 80px;
            background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 50%);
            text-align: center;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
            color: var(--text-light);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--accent);
            text-decoration: none;
        }

        /* Layout Section Styling */
        .section {
            padding: 80px 8% 120px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
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
            .footer-main { grid-template-columns: 1fr 1fr; }
            .nav-links { display: none; }
        }
    </style>
    @yield('extra_css')
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
            <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
            
            <li class="nav-item">
                <a href="#" class="{{ Request::is('profil*') ? 'active' : '' }}">Profil <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile.history') }}" class="dropdown-item {{ Request::routeIs('profile.history') ? 'active' : '' }}"><i class="fas fa-info-circle"></i> Tentang</a></li>
                    <li><a href="{{ route('profile.vision') }}" class="dropdown-item {{ Request::routeIs('profile.vision') ? 'active' : '' }}"><i class="fas fa-eye"></i> Visi & Misi</a></li>
                    <li><a href="{{ route('profile.structure') }}" class="dropdown-item {{ Request::routeIs('profile.structure') ? 'active' : '' }}"><i class="fas fa-sitemap"></i> Struktur Organisasi</a></li>
                    <li><a href="{{ route('profile.maklumat') }}" class="dropdown-item {{ Request::routeIs('profile.maklumat') ? 'active' : '' }}"><i class="fas fa-hand-holding-heart"></i> Maklumat Pelayanan</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="{{ Request::is('bidang*') ? 'active' : '' }}">Bidang <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('departments.hi') }}" class="dropdown-item {{ Request::routeIs('departments.hi') ? 'active' : '' }}"><i class="fas fa-handshake"></i> Hubungan Industrial</a></li>
                    <li><a href="{{ route('departments.tk') }}" class="dropdown-item {{ Request::routeIs('departments.tk') ? 'active' : '' }}"><i class="fas fa-users"></i> Tenaga Kerja</a></li>
                    <li><a href="{{ route('departments.training') }}" class="dropdown-item {{ Request::routeIs('departments.training') ? 'active' : '' }}"><i class="fas fa-tools"></i> Pelatihan</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="{{ Request::is('berita*') || Request::is('lowongan-kerja*') || Request::is('pelatihan*') ? 'active' : '' }}">Publikasi <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('posts.index') }}" class="dropdown-item {{ Request::is('berita*') ? 'active' : '' }}"><i class="fas fa-newspaper"></i> Berita</a></li>
                    <li><a href="{{ route('jobs.index') }}" class="dropdown-item {{ Request::is('lowongan-kerja*') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> Lowongan Kerja</a></li>
                    <li><a href="{{ route('trainings.index') }}" class="dropdown-item {{ Request::is('pelatihan*') ? 'active' : '' }}"><i class="fas fa-graduation-cap"></i> Pelatihan</a></li>
                </ul>
            </li>

            <li><a href="{{ route('downloads.index') }}" class="{{ Request::routeIs('downloads.index') ? 'active' : '' }}">Unduhan</a></li>
            <li><a href="/#pengaduan">Kontak</a></li>
            <li><a href="/dashboard" class="btn-portal">Portal Admin</a></li>
        </ul>
    </nav>

    @yield('content')

    @if($footerProfile->google_maps_url)
    <section style="padding: 0; line-height: 0; overflow: hidden;">
        <div class="google-maps-container" style="width: 100%; height: 400px;">
            {!! $footerProfile->google_maps_url !!}
        </div>
        <style>
            .google-maps-container iframe {
                width: 100% !important;
                height: 100% !important;
                border: 0;
            }
        </style>
    </section>
    @endif

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
                    <li><a href="#">Pengaduan</a></li>
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
    @yield('extra_js')
</body>
</html>
