<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Disnakertrans Kabupaten Banjar</title>
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: var(--text-dark); background: #ffffff; line-height: 1.8; }
        
        nav {
            padding: 1.2rem 8%;
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
        .logo-icon { width: 36px; height: 36px; background: var(--accent); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; }
        .logo-text h1 { font-size: 0.9rem; font-weight: 800; color: var(--primary); line-height: 1; }
        .logo-text span { font-size: 0.65rem; color: var(--text-light); text-transform: uppercase; font-weight: 600; }

        .container { padding: 60px 8%; max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 350px; gap: 60px; }
        
        .post-header { margin-bottom: 40px; }
        .post-category { display: inline-block; background: var(--accent-soft); color: var(--accent); padding: 5px 15px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; margin-bottom: 20px; }
        .post-title { font-size: 2.5rem; font-weight: 800; color: var(--primary); line-height: 1.2; margin-bottom: 25px; }
        .post-meta { display: flex; align-items: center; gap: 20px; color: var(--text-light); font-size: 0.9rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 25px; }
        .post-meta span { display: flex; align-items: center; gap: 8px; }

        .post-featured-image { width: 100%; height: 500px; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 40px; }
        .post-featured-image img { width: 100%; height: 100%; object-fit: cover; }

        .post-content { font-size: 1.1rem; color: #334155; }
        .post-content p { margin-bottom: 25px; }

        .post-tags { margin-top: 50px; display: flex; flex-wrap: wrap; gap: 10px; border-top: 1px solid #f1f5f9; pt: 30px; }
        .tag-item { background: #f1f5f9; color: var(--text-light); padding: 5px 15px; border-radius: 8px; font-size: 0.85rem; text-decoration: none; transition: 0.2s; }
        .tag-item:hover { background: var(--accent); color: white; }

        /* Sidebar */
        .sidebar-widget { margin-bottom: 50px; }
        .widget-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 25px; border-left: 4px solid var(--accent); padding-left: 15px; }
        
        .related-post-card { display: flex; gap: 15px; margin-bottom: 20px; text-decoration: none; color: inherit; }
        .related-img { width: 80px; height: 80px; border-radius: 10px; overflow: hidden; flex-shrink: 0; }
        .related-img img { width: 100%; height: 100%; object-fit: cover; }
        .related-info h4 { font-size: 0.95rem; font-weight: 700; line-height: 1.4; margin-bottom: 5px; color: var(--primary); transition: 0.2s; }
        .related-post-card:hover h4 { color: var(--accent); }
        .related-date { font-size: 0.75rem; color: var(--text-light); }

        footer { background: #020617; color: white; padding: 40px 8%; text-align: center; margin-top: 80px; }

        @media (max-width: 1024px) {
            .container { grid-template-columns: 1fr; }
            .post-featured-image { height: 350px; }
            .post-title { font-size: 2rem; }
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
        <a href="{{ route('posts.index') }}" style="text-decoration: none; color: var(--text-dark); font-weight: 600; font-size: 0.85rem;"><i class="fas fa-th-list"></i> Lihat Semua Berita</a>
    </nav>

    <div class="container">
        <main>
            <article>
                <div class="post-header">
                    <span class="post-category">{{ $post->category->name }}</span>
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <div class="post-meta">
                        <span><i class="far fa-user"></i> {{ $post->user->name }}</span>
                        <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                @if($post->image)
                    <div class="post-featured-image">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                    </div>
                @endif

                <div class="post-content">
                    {!! nl2br(e($post->content)) !!}
                </div>

                @if($post->tags->count() > 0)
                    <div class="post-tags">
                        @foreach($post->tags as $tag)
                            <a href="#" class="tag-item">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif
            </article>
        </main>

        <aside>
            @if($relatedPosts->count() > 0)
                <div class="sidebar-widget">
                    <h3 class="widget-title">Berita Terkait</h3>
                    @foreach($relatedPosts as $related)
                        <a href="{{ route('posts.show', $related->slug) }}" class="related-post-card">
                            <div class="related-img">
                                @if($related->image)
                                    <img src="{{ asset('storage/'.$related->image) }}" alt="{{ $related->title }}">
                                @else
                                    <div style="width: 100%; height: 100%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="related-info">
                                <h4>{{ Str::limit($related->title, 50) }}</h4>
                                <span class="related-date">{{ $related->created_at->format('d M Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="sidebar-widget">
                <h3 class="widget-title">Informasi Kontak</h3>
                <div style="background: #f8fafc; padding: 25px; border-radius: var(--radius-md); font-size: 0.9rem;">
                    <p style="margin-bottom: 15px;"><strong>Alamat:</strong><br>Jl. Jenderal Ahmad Yani No. 123, Martapura, Kab. Banjar</p>
                    <p style="margin-bottom: 15px;"><strong>Telepon:</strong><br>(0511) 4721XXX</p>
                    <p><strong>Email:</strong><br>disnakertrans@banjarkab.go.id</p>
                </div>
            </div>
        </aside>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Banjar. Hak Cipta Dilindungi Undang-Undang.</p>
    </footer>
</body>
</html>
