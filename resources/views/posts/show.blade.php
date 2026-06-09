@extends('layouts.public')

@section('title', $post->title . ' - Disnakertrans Kabupaten Banjar')

@section('extra_css')
<style>
    .post-container { display: grid; grid-template-columns: 1fr 350px; gap: 60px; }
    
    .post-header-content { margin-bottom: 40px; }
    .post-category { display: inline-block; background: var(--accent-soft); color: var(--accent); padding: 5px 15px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; margin-bottom: 20px; }
    .post-meta { display: flex; align-items: center; gap: 20px; color: var(--text-light); font-size: 0.9rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 25px; margin-bottom: 30px; }
    .post-meta span { display: flex; align-items: center; gap: 8px; }

    .post-featured-image { width: 100%; height: 500px; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
    .post-featured-image img { width: 100%; height: 100%; object-fit: cover; }

    .post-content { font-size: 1.15rem; color: #334155; line-height: 1.8; text-align: justify; }
    .post-content p { margin-bottom: 25px; }

    .post-tags { margin-top: 50px; display: flex; flex-wrap: wrap; gap: 10px; border-top: 1px solid #f1f5f9; padding-top: 30px; }
    .tag-item { background: #f1f5f9; color: var(--text-light); padding: 5px 15px; border-radius: 8px; font-size: 0.85rem; text-decoration: none; transition: 0.2s; }
    .tag-item:hover { background: var(--accent); color: white; }

    /* Sidebar */
    .sidebar-widget { margin-bottom: 50px; background: white; padding: 30px; border-radius: var(--radius-md); border: 1px solid #f1f5f9; box-shadow: var(--shadow-soft); }
    .widget-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 25px; border-left: 4px solid var(--accent); padding-left: 15px; color: var(--primary); }
    
    .related-post-card { display: flex; gap: 15px; margin-bottom: 20px; text-decoration: none; color: inherit; }
    .related-img { width: 80px; height: 80px; border-radius: 10px; overflow: hidden; flex-shrink: 0; }
    .related-img img { width: 100%; height: 100%; object-fit: cover; }
    .related-info h4 { font-size: 0.95rem; font-weight: 700; line-height: 1.4; margin-bottom: 5px; color: var(--primary); transition: 0.2s; }
    .related-post-card:hover h4 { color: var(--accent); }
    .related-date { font-size: 0.75rem; color: var(--text-light); }

    @media (max-width: 1024px) {
        .post-container { grid-template-columns: 1fr; }
        .post-featured-image { height: 350px; }
    }
</style>
@endsection

@section('content')
<header class="page-header">
    <div class="container">
        <h1 style="font-size: 2.5rem;">News Detail</h1>
        <div class="breadcrumb">
            <a href="/">Home</a>
            <span>/</span>
            <a href="{{ route('posts.index') }}">News</a>
            <span>/</span>
            <span>Detail</span>
        </div>
    </div>
</header>

<section class="section">
    <div class="container" style="max-width: 1200px;">
        <div class="post-container">
            <main>
                <article>
                    <div class="post-header-content">
                        <span class="post-category">{{ $post->category?->name }}</span>
                        <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary); line-height: 1.2; margin-bottom: 25px;">{{ $post->title }}</h2>
                        <div class="post-meta">
                            <span><i class="far fa-user"></i> {{ $post->user?->name }}</span>
                            <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</span>
                            <span><i class="far fa-folder"></i> {{ $post->category?->name }}</span>
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
                        <h3 class="widget-title">Related News</h3>
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
                    <h3 class="widget-title">Contact Us</h3>
                    <div style="font-size: 0.95rem; color: var(--text-dark); line-height: 1.7;">
                        <p style="margin-bottom: 20px; display: flex; gap: 15px;">
                            <i class="fas fa-map-marker-alt" style="color: var(--accent); margin-top: 5px;"></i>
                            <span>{{ $footerProfile->address }}</span>
                        </p>
                        <p style="margin-bottom: 20px; display: flex; gap: 15px;">
                            <i class="fas fa-phone" style="color: var(--accent);"></i>
                            <span>{{ $footerProfile->phone }}</span>
                        </p>
                        <p style="display: flex; gap: 15px;">
                            <i class="fas fa-envelope" style="color: var(--accent);"></i>
                            <span>{{ $footerProfile->email }}</span>
                        </p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
