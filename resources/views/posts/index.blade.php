<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita - Disnakertrans Kabupaten Banjar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0f172a;
            --accent: #3b82f6;
            --accent-soft: #eff6ff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --radius-md: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: var(--text-dark); background: #f8fafc; line-height: 1.6; }
        
        nav {
            padding: 1.5rem 8%;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-icon { width: 40px; height: 40px; background: var(--accent); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; }
        .logo-text h1 { font-size: 1rem; font-weight: 800; color: var(--primary); line-height: 1; }
        .logo-text span { font-size: 0.7rem; color: var(--text-light); text-transform: uppercase; font-weight: 600; }

        .container { padding: 60px 8%; max-width: 1400px; margin: 0 auto; }
        
        .page-header { margin-bottom: 50px; text-align: center; }
        .page-header h2 { font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 10px; }
        .page-header p { color: var(--text-light); font-size: 1.1rem; }

        .news-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }
        .news-card { background: white; border-radius: var(--radius-md); overflow: hidden; border: 1px solid #f1f5f9; transition: 0.3s; }
        .news-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
        .news-img { height: 220px; position: relative; }
        .news-img img { width: 100%; height: 100%; object-fit: cover; }
        .news-tag { position: absolute; top: 15px; left: 15px; background: var(--accent); color: white; padding: 5px 12px; border-radius: 50px; font-size: 0.7rem; font-weight: 700; }
        .news-content { padding: 25px; }
        .news-date { font-size: 0.8rem; color: var(--text-light); margin-bottom: 10px; display: block; }
        .news-content h3 { font-size: 1.2rem; font-weight: 700; margin-bottom: 15px; line-height: 1.4; color: var(--primary); }
        .news-link { color: var(--accent); text-decoration: none; font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; gap: 8px; }

        .pagination { margin-top: 60px; display: flex; justify-content: center; }
        
        footer { background: #020617; color: white; padding: 40px 8%; text-align: center; margin-top: 100px; }
        footer p { font-size: 0.9rem; color: #94a3b8; }

        @media (max-width: 768px) {
            .news-grid { grid-template-columns: 1fr; }
            .page-header h2 { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="logo">
            <div class="logo-icon"><i class="fas fa-building-columns"></i></div>
            <div class="logo-text">
                <h1>DISNAKERTRANS</h1>
                <span>KABUPATEN BANJAR</span>
            </div>
        </a>
        <a href="/" style="text-decoration: none; color: var(--text-dark); font-weight: 600; font-size: 0.9rem;"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2>Berita & Pengumuman</h2>
            <p>Dapatkan informasi terbaru seputar ketenagakerjaan di Kabupaten Banjar.</p>
        </div>

        <div class="news-grid">
            @forelse($posts as $post)
                <div class="news-card">
                    <div class="news-img">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                        @else
                            <div style="width: 100%; height: 100%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        @endif
                        <span class="news-tag">{{ $post->category->name }}</span>
                    </div>
                    <div class="news-content">
                        <span class="news-date">{{ $post->created_at->format('d M Y') }}</span>
                        <h3>{{ Str::limit($post->title, 70) }}</h3>
                        <a href="{{ route('posts.show', $post->slug) }}" class="news-link">Baca Selengkapnya <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                    <i class="fas fa-newspaper fa-4x" style="color: #e2e8f0; margin-bottom: 20px;"></i>
                    <p style="color: var(--text-light); font-weight: 500;">Belum ada berita yang diterbitkan.</p>
                </div>
            @endforelse
        </div>

        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Banjar. Hak Cipta Dilindungi Undang-Undang.</p>
    </footer>
</body>
</html>
