@extends('layouts.admin')

@section('header_title', 'Dashboard')

@section('content')
<div style="margin-bottom: 32px;">
    <h3 style="margin: 0 0 8px; font-size: 1.75rem; font-weight: 800; color: var(--primary);">Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋</h3>
    <p style="margin: 0; color: var(--text-muted); font-weight: 500;">Berikut adalah ringkasan aktivitas portal Disnakertrans hari ini.</p>
</div>

<!-- Statistik Utama -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; margin-bottom: 32px;">
    <div class="card" style="padding: 20px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 15px;">
        <div style="width: 44px; height: 44px; background: #eff6ff; color: #3b82f6; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px;"><i class="fas fa-newspaper"></i></div>
        <div><small style="color: var(--text-muted); font-weight: 600; font-size: 0.7rem; text-transform: uppercase;">Berita</small><h4 style="margin: 0; font-size: 1.2rem; font-weight: 800;">{{ $stats['posts'] }}</h4></div>
    </div>
    <div class="card" style="padding: 20px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 15px;">
        <div style="width: 44px; height: 44px; background: #fdf2f8; color: #ec4899; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px;"><i class="fas fa-users"></i></div>
        <div><small style="color: var(--text-muted); font-weight: 600; font-size: 0.7rem; text-transform: uppercase;">Pegawai</small><h4 style="margin: 0; font-size: 1.2rem; font-weight: 800;">{{ $stats['employees'] }}</h4></div>
    </div>
    <div class="card" style="padding: 20px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 15px;">
        <div style="width: 44px; height: 44px; background: #f0fdf4; color: #10b981; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px;"><i class="fas fa-graduation-cap"></i></div>
        <div><small style="color: var(--text-muted); font-weight: 600; font-size: 0.7rem; text-transform: uppercase;">Pelatihan</small><h4 style="margin: 0; font-size: 1.2rem; font-weight: 800;">{{ $stats['trainings'] }}</h4></div>
    </div>
    <div class="card" style="padding: 20px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 15px;">
        <div style="width: 44px; height: 44px; background: #fff7ed; color: #f59e0b; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px;"><i class="fas fa-briefcase"></i></div>
        <div><small style="color: var(--text-muted); font-weight: 600; font-size: 0.7rem; text-transform: uppercase;">Loker</small><h4 style="margin: 0; font-size: 1.2rem; font-weight: 800;">{{ $stats['jobs'] }}</h4></div>
    </div>
    <div class="card" style="padding: 20px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 15px;">
        <div style="width: 44px; height: 44px; background: #f5f3ff; color: #8b5cf6; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px;"><i class="fas fa-envelope-open-text"></i></div>
        <div><small style="color: var(--text-muted); font-weight: 600; font-size: 0.7rem; text-transform: uppercase;">Pesan Baru</small><h4 style="margin: 0; font-size: 1.2rem; font-weight: 800;">{{ $stats['messages'] }}</h4></div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px;">
    <div>
        <!-- Berita Terbaru -->
        <div class="card" style="padding: 24px; margin-bottom: 32px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; font-size: 1.1rem; font-weight: 700; color: var(--primary);">Berita Terbaru</h3>
                <a href="{{ route('admin.posts.index') }}" style="font-size: 0.8rem; color: var(--accent); font-weight: 700; text-decoration: none;">Lihat Semua <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestPosts as $post)
                        <tr>
                            <td style="font-weight: 600; font-size: 0.9rem;">{{ Str::limit($post->title, 45) }}</td>
                            <td><span class="badge" style="background: #f1f5f9; color: #475569;">{{ $post->category->name }}</span></td>
                            <td>
                                @if($post->status == 'published')
                                    <span class="badge" style="background: #dcfce7; color: #166534;">Published</span>
                                @else
                                    <span class="badge" style="background: #fee2e2; color: #991b1b;">Draft</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" style="text-align: center; padding: 20px;">Belum ada konten.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="card" style="padding: 20px; border-left: 4px solid var(--accent);">
                <h4 style="margin: 0 0 15px; font-size: 1rem; font-weight: 700;">Aksi Cepat</h4>
                <div style="display: grid; gap: 10px;">
                    <a href="{{ route('admin.posts.create') }}" style="display: flex; align-items: center; gap: 10px; color: var(--text-dark); text-decoration: none; font-size: 0.85rem; font-weight: 600;"><i class="fas fa-plus-circle" style="color: var(--accent);"></i> Buat Berita Baru</a>
                    <a href="{{ route('admin.job-vacancies.create') }}" style="display: flex; align-items: center; gap: 10px; color: var(--text-dark); text-decoration: none; font-size: 0.85rem; font-weight: 600;"><i class="fas fa-plus-circle" style="color: var(--accent);"></i> Tambah Lowongan</a>
                    <a href="{{ route('admin.trainings.create') }}" style="display: flex; align-items: center; gap: 10px; color: var(--text-dark); text-decoration: none; font-size: 0.85rem; font-weight: 600;"><i class="fas fa-plus-circle" style="color: var(--accent);"></i> Tambah Pelatihan</a>
                </div>
            </div>
            <div class="card" style="padding: 20px; border-left: 4px solid #10b981;">
                <h4 style="margin: 0 0 15px; font-size: 1rem; font-weight: 700;">Statistik Konten</h4>
                <div style="display: grid; gap: 8px;">
                    @foreach($categories->take(4) as $cat)
                    <div style="display: flex; justify-content: space-between; font-size: 0.8rem; font-weight: 600;">
                        <span style="color: var(--text-muted);">{{ $cat->name }}</span>
                        <span style="color: var(--primary);">{{ $cat->posts_count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div>
        <!-- Profile Card -->
        <div class="card" style="padding: 24px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; border: none; margin-bottom: 32px;">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                <div style="width: 45px; height: 44px; border-radius: 12px; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; font-size: 20px;"><i class="fas fa-user-shield"></i></div>
                <div>
                    <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700;">{{ auth()->user()->name }}</h4>
                    <span style="font-size: 0.7rem; opacity: 0.8; font-weight: 600; text-transform: uppercase;">{{ auth()->user()->getRoleNames()->first() ?? 'Administrator' }}</span>
                </div>
            </div>
            <div style="font-size: 0.8rem; opacity: 0.9; margin-bottom: 20px;">
                <div style="margin-bottom: 8px;"><i class="fas fa-envelope" style="width: 20px; opacity: 0.6;"></i> {{ auth()->user()->email }}</div>
                <div><i class="fas fa-clock" style="width: 20px; opacity: 0.6;"></i> {{ now()->translatedFormat('d M Y') }}</div>
            </div>
            <a href="{{ route('admin.account.password') }}" class="btn" style="width: 100%; background: white; color: var(--primary); font-size: 0.85rem; font-weight: 700; border: none;">Edit Profil</a>
        </div>

        <!-- Pesan Masuk -->
        <div class="card" style="padding: 24px;">
            <h3 style="margin: 0 0 20px; font-size: 1.1rem; font-weight: 700; color: var(--primary);">Pesan Masuk</h3>
            <div style="display: flex; flex-direction: column; gap: 15px;">
                @forelse($latestMessages as $msg)
                <div style="display: flex; gap: 12px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9;">
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0; font-size: 12px;"><i class="fas fa-envelope"></i></div>
                    <div style="min-width: 0;">
                        <h5 style="margin: 0; font-size: 0.8rem; font-weight: 700; color: var(--primary); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $msg->name }}</h5>
                        <p style="margin: 2px 0 0; font-size: 0.7rem; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $msg->subject }}</p>
                    </div>
                </div>
                @empty
                <p style="margin: 0; text-align: center; color: var(--text-muted); font-size: 0.85rem;">Tidak ada pesan.</p>
                @endforelse
            </div>
            @if($latestMessages->count() > 0)
            <a href="{{ route('admin.messages.index') }}" style="display: block; text-align: center; margin-top: 15px; font-size: 0.8rem; color: var(--accent); font-weight: 700; text-decoration: none;">Buka Semua Pesan</a>
            @endif
        </div>
    </div>
</div>
@endsection
