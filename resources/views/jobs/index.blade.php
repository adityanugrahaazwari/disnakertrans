@extends('layouts.public')

@section('title', 'Lowongan Kerja - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <h1>Bursa Lowongan Kerja</h1>
    <div class="breadcrumb">
        <a href="/">Beranda</a>
        <span>/</span>
        <span>Lowongan Kerja</span>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            @forelse($jobs as $job)
                <div style="background: white; border-radius: var(--radius-md); border: 1px solid #f1f5f9; box-shadow: var(--shadow-soft); border-top: 4px solid var(--accent); position: relative; overflow: hidden;">
                    <div style="padding: 30px;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                            <span style="display: inline-block; padding: 6px 15px; background: var(--accent-soft); color: var(--accent); border-radius: 50px; font-size: 0.75rem; font-weight: 700;">{{ $job->perusahaan }}</span>
                            @if($job->is_verified)
                                <i class="fas fa-check-circle" style="color: #10b981;" title="Verified Company"></i>
                            @endif
                        </div>
                        <h3 style="font-size: 1.25rem; margin-bottom: 10px; font-weight: 700; color: var(--primary);">{{ $job->posisi }}</h3>
                        <div style="font-size: 0.85rem; color: var(--text-light); margin-bottom: 20px;">
                            <i class="fas fa-clock" style="margin-right: 8px;"></i> Batas Akhir: {{ $job->deadline ? $job->deadline->format('d M Y') : 'N/A' }}
                        </div>
                        <div style="font-size: 0.9rem; color: var(--text-dark); margin-bottom: 25px; line-height: 1.6; height: 4.8em; overflow: hidden;">
                            {!! $job->syarat !!}
                        </div>
                        <a href="{{ route('jobs.show', $job->id) }}" style="display: flex; align-items: center; justify-content: center; gap: 10px; background: var(--accent); color: white; text-decoration: none; padding: 12px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; transition: 0.3s;">
                            Lihat Detail <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: #f8fafc; border-radius: 16px;">
                    <i class="fas fa-briefcase" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                    <p style="color: #64748b;">Saat ini belum ada lowongan kerja yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 50px;">
            {{ $jobs->links() }}
        </div>
    </div>
</section>
@endsection
