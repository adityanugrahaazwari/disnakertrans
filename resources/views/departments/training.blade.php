@extends('layouts.public')

@section('title', 'Bidang Pelatihan - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <h1>Bidang Pelatihan</h1>
    <div class="breadcrumb">
        <a href="/">Beranda</a>
        <span>/</span>
        <a href="#">Bidang</a>
        <span>/</span>
        <span>Pelatihan</span>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="background: white; padding: 40px; border-radius: var(--radius-md); box-shadow: var(--shadow-soft); margin-bottom: 60px;">
            <div style="display: flex; gap: 40px; align-items: flex-start;">
                <div style="width: 80px; height: 80px; background: var(--accent-soft); color: var(--accent); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; flex-shrink: 0;">
                    <i class="fas fa-tools"></i>
                </div>
                <div>
                    <h2 style="margin-bottom: 15px; color: var(--primary);">Tugas Pokok & Fungsi</h2>
                    <p style="color: var(--text-light); line-height: 1.8;">
                        Bidang Pelatihan mempunyai tugas merencanakan, melaksanakan, dan mengoordinasikan program peningkatan kompetensi tenaga kerja melalui berbagai kejuruan pelatihan kerja untuk mengurangi angka pengangguran di Kabupaten Banjar.
                    </p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary);">Daftar Pelatihan Tersedia</h2>
            <div style="width: 50px; height: 3px; background: var(--accent); margin: 15px auto 30px;"></div>
            
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                <a href="{{ route('departments.training') }}" 
                   style="padding: 8px 20px; border-radius: 50px; text-decoration: none; font-size: 0.9rem; font-weight: 600; {{ !request('category') ? 'background: var(--primary); color: white;' : 'background: #f1f5f9; color: var(--text-light);' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('departments.training', ['category' => $category->slug]) }}" 
                       style="padding: 8px 20px; border-radius: 50px; text-decoration: none; font-size: 0.9rem; font-weight: 600; {{ request('category') == $category->slug ? 'background: var(--primary); color: white;' : 'background: #f1f5f9; color: var(--text-light);' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            @forelse($trainings as $training)
                <div style="background: white; border-radius: var(--radius-md); overflow: hidden; border: 1px solid #f1f5f9; box-shadow: var(--shadow-soft);">
                    <div style="height: 200px; background: #f1f5f9; position: relative;">
                        @if($training->image)
                            <img src="{{ asset('storage/'.$training->image) }}" alt="{{ $training->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #cbd5e1;">
                                <i class="fas fa-graduation-cap" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        @if($training->category)
                            <div style="position: absolute; top: 15px; left: 15px; background: rgba(var(--primary-rgb), 0.9); color: white; padding: 4px 12px; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">
                                {{ $training->category->name }}
                            </div>
                        @endif
                    </div>
                    <div style="padding: 25px;">
                        <span style="display: inline-block; padding: 4px 12px; background: var(--accent-soft); color: var(--accent); border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 15px;">
                            Kuota: {{ $training->quota }} Peserta
                        </span>
                        <h3 style="font-size: 1.25rem; margin-bottom: 15px; font-weight: 700;">{{ $training->title }}</h3>
                        <p style="color: var(--text-light); font-size: 0.9rem; margin-bottom: 20px; line-height: 1.6;">{{ Str::limit($training->description, 100) }}</p>
                        <div style="font-size: 0.85rem; color: var(--text-light); margin-bottom: 20px;">
                            <i class="far fa-calendar-alt" style="margin-right: 8px;"></i> {{ $training->start_date ? $training->start_date->format('d M Y') : 'N/A' }}
                        </div>
                        <a href="#" style="color: var(--accent); text-decoration: none; font-weight: 700; font-size: 0.9rem;">Selengkapnya <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: #f8fafc; border-radius: 16px;">
                    <i class="fas fa-info-circle" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                    <p style="color: #64748b;">Belum ada jadwal pelatihan yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 50px;">
            {{ $trainings->links() }}
        </div>
    </div>
</section>
@endsection
