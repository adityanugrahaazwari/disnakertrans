@extends('layouts.public')

@section('title', 'Semua Berita - Disnakertrans Kabupaten Banjar')

@section('extra_css')
<style>
    .news-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }
    .news-card { background: white; border-radius: var(--radius-md); overflow: hidden; border: 1px solid #f1f5f9; transition: 0.3s; height: 100%; display: flex; flex-direction: column; }
    .news-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
    .news-img { height: 220px; position: relative; }
    .news-img img { width: 100%; height: 100%; object-fit: cover; }
    .news-tag { position: absolute; top: 15px; left: 15px; background: var(--accent); color: white; padding: 5px 12px; border-radius: 50px; font-size: 0.7rem; font-weight: 700; }
    .news-content { padding: 25px; flex-grow: 1; display: flex; flex-direction: column; }
    .news-date { font-size: 0.8rem; color: var(--text-light); margin-bottom: 10px; display: block; }
    .news-content h3 { font-size: 1.2rem; font-weight: 700; margin-bottom: 15px; line-height: 1.4; color: var(--primary); }
    .news-link { color: var(--accent); text-decoration: none; font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; gap: 8px; margin-top: auto; }

    @media (max-width: 768px) {
        .news-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<header class="page-header">
    <div class="container">
        <h1>Berita & Pengumuman</h1>
        <div class="breadcrumb">
            <a href="/">Beranda</a>
            <span>/</span>
            <span>Berita</span>
        </div>
    </div>
</header>

<section class="section">
    <div class="container" style="max-width: 1200px;">
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
                        <span class="news-tag">{{ $post->category?->name }}</span>
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

        <div style="margin-top: 60px; display: flex; justify-content: center;">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
