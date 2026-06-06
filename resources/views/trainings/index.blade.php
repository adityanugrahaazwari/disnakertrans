@extends('layouts.public')

@section('title', 'Program Pelatihan - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <h1>Program Pelatihan Kerja</h1>
    <div class="breadcrumb">
        <a href="/">Beranda</a>
        <span>/</span>
        <span>Pelatihan</span>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            @forelse($trainings as $training)
                <div style="background: white; border-radius: var(--radius-md); overflow: hidden; border: 1px solid #f1f5f9; box-shadow: var(--shadow-soft);">
                    <div style="height: 220px; background: #f1f5f9;">
                        @if($training->image)
                            <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                                <i class="fas fa-graduation-cap" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                    </div>
                    <div style="padding: 25px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <span style="display: inline-block; padding: 4px 12px; background: var(--accent-soft); color: var(--accent); border-radius: 50px; font-size: 0.75rem; font-weight: 700;">
                                Kuota: {{ $training->quota }} Peserta
                            </span>
                        </div>
                        <h3 style="font-size: 1.2rem; margin-bottom: 15px; font-weight: 700; color: var(--primary); line-height: 1.4;">{{ $training->title }}</h3>
                        <p style="color: var(--text-light); font-size: 0.9rem; margin-bottom: 20px; line-height: 1.6; height: 3.2em; overflow: hidden;">{{ $training->description }}</p>
                        
                        <div style="display: flex; gap: 15px; font-size: 0.85rem; color: var(--text-light); margin-bottom: 25px;">
                            <span><i class="far fa-calendar-alt" style="margin-right: 6px; color: var(--accent);"></i> {{ $training->start_date ? $training->start_date->format('d M Y') : '-' }}</span>
                        </div>
                        
                        <a href="#" style="display: block; text-align: center; background: white; border: 2px solid var(--accent); color: var(--accent); text-decoration: none; padding: 12px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; transition: 0.3s;">
                            Detail Pelatihan
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: #f8fafc; border-radius: 16px;">
                    <i class="fas fa-calendar-times" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                    <p style="color: #64748b;">Belum ada jadwal pelatihan terbaru saat ini.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 50px;">
            {{ $trainings->links() }}
        </div>
    </div>
</section>
@endsection
