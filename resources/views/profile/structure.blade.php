@extends('layouts.public')

@section('title', 'Struktur Organisasi - Disnakertrans Kabupaten Banjar')

@section('extra_css')
<style>
    .employee-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
        border: 1px solid #f1f5f9;
        text-align: center;
        transition: 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .employee-card:hover {
        transform: translateY(-5px);
        border-color: var(--accent);
    }

    .employee-img {
        width: 100%;
        height: 250px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .employee-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .employee-info {
        padding: 25px;
        flex-grow: 1;
    }

    .employee-info h4 {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 8px;
    }

    .employee-info .jabatan {
        color: var(--accent);
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        display: block;
    }

    .employee-info .nip {
        font-size: 0.85rem;
        color: var(--text-light);
        display: block;
    }

    .hierarchy-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .hierarchy-row {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        width: 100%;
    }
</style>
@endsection

@section('content')
<header class="page-header">
    <div class="container">
        <h1>Struktur Organisasi</h1>
        <div class="breadcrumb">
            <a href="/">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span>Struktur Organisasi</span>
        </div>
    </div>
</header>

<section class="section">
    <div class="container">
        @if($employees->count() > 0)
            @php
                $rootEmployees = $employees->where('parent_id', null);
            @endphp

            <div class="hierarchy-container">
                @foreach($rootEmployees as $root)
                    <div style="max-width: 300px; width: 100%;">
                        <div class="employee-card">
                            <div class="employee-img">
                                @if($root->foto)
                                    <img src="{{ asset('storage/'.$root->foto) }}" alt="{{ $root->nama }}">
                                @else
                                    <i class="fas fa-user" style="font-size: 5rem; color: #cbd5e1;"></i>
                                @endif
                            </div>
                            <div class="employee-info">
                                <span class="jabatan">{{ $root->jabatan }}</span>
                                <h4>{{ $root->nama }}</h4>
                                @if($root->nip)
                                    <span class="nip">NIP. {{ $root->nip }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($root->children->count() > 0)
                        <div style="width: 2px; height: 50px; background: #e2e8f0;"></div>
                        
                        <div class="hierarchy-row">
                            @foreach($root->children as $child)
                                <div style="max-width: 280px; flex: 1; min-width: 250px;">
                                    <div class="employee-card">
                                        <div class="employee-img" style="height: 220px;">
                                            @if($child->foto)
                                                <img src="{{ asset('storage/'.$child->foto) }}" alt="{{ $child->nama }}">
                                            @else
                                                <i class="fas fa-user" style="font-size: 4rem; color: #cbd5e1;"></i>
                                            @endif
                                        </div>
                                        <div class="employee-info" style="padding: 20px;">
                                            <span class="jabatan" style="font-size: 0.8rem;">{{ $child->jabatan }}</span>
                                            <h4 style="font-size: 1rem;">{{ $child->nama }}</h4>
                                            @if($child->nip)
                                                <span class="nip" style="font-size: 0.8rem;">NIP. {{ $child->nip }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    @if($child->children->count() > 0)
                                        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 30px; gap: 20px;">
                                            @foreach($child->children as $grandChild)
                                                <div style="width: 100%; background: #f8fafc; padding: 15px; border-radius: 12px; border-left: 4px solid var(--accent); display: flex; align-items: center; gap: 15px;">
                                                    <div style="width: 45px; height: 45px; background: white; border-radius: 10px; overflow: hidden; flex-shrink: 0; border: 1px solid #f1f5f9;">
                                                        @if($grandChild->foto)
                                                            <img src="{{ asset('storage/'.$grandChild->foto) }}" alt="{{ $grandChild->nama }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                        @else
                                                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #f1f5f9; color: #cbd5e1;">
                                                                <i class="fas fa-user" style="font-size: 1.2rem;"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h5 style="margin: 0; font-size: 0.95rem; font-weight: 700;">{{ $grandChild->nama }}</h5>
                                                        <span style="font-size: 0.75rem; color: var(--accent); font-weight: 600;">{{ $grandChild->jabatan }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 60px; background: #f8fafc; border-radius: 24px; color: var(--text-light);">
                <div style="width: 80px; height: 80px; background: white; color: #cbd5e1; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 24px; box-shadow: var(--shadow-soft);">
                    <i class="fas fa-users-slash"></i>
                </div>
                <h3>Data Belum Tersedia</h3>
                <p>Data struktur organisasi sedang dalam proses pembaruan.</p>
            </div>
        @endif

        @if($profile->struktur_organisasi)
            <div style="margin-top: 80px; text-align: center;">
                <h3 style="margin-bottom: 30px; font-weight: 800;">Bagan Struktur Organisasi</h3>
                <div style="background: white; padding: 20px; border-radius: 24px; box-shadow: var(--shadow-soft); border: 1px solid #f1f5f9;">
                    <img src="{{ asset('storage/'.$profile->struktur_organisasi) }}" alt="Bagan Struktur Organisasi" style="max-width: 100%; border-radius: 12px;">
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
