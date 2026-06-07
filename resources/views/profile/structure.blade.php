@extends('layouts.public')

@section('title', 'Struktur Organisasi - Disnakertrans Kabupaten Banjar')

@section('extra_css')
<style>
    /* Compact Hybrid Org Chart */
    .org-container {
        width: 100%;
        overflow-x: auto;
        padding: 40px 0;
        background: white;
    }

    .org-tree {
        display: inline-block;
        min-width: 100%;
        text-align: center;
    }

    .org-tree ul {
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
        display: flex;
        justify-content: center;
        list-style: none;
        margin: 0;
    }

    .org-tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 10px 0 10px;
        transition: all 0.5s;
    }

    /* Connectors */
    .org-tree li::before, .org-tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 2px solid #cbd5e1;
        width: 50%;
        height: 20px;
    }

    .org-tree li::after {
        right: auto;
        left: 50%;
        border-left: 2px solid #cbd5e1;
    }

    .org-tree li:only-child::after, .org-tree li:only-child::before {
        display: none;
    }

    .org-tree li:only-child { padding-top: 0; }
    .org-tree li:first-child::before, .org-tree li:last-child::after { border: 0 none; }
    .org-tree li:last-child::before { border-right: 2px solid #cbd5e1; border-radius: 0 5px 0 0; }
    .org-tree li:first-child::after { border-radius: 5px 0 0 0; }

    .org-tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 2px solid #cbd5e1;
        width: 0;
        height: 20px;
    }

    /* Node Styles */
    .node-box {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        width: 180px;
        display: inline-block;
        position: relative;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        transition: 0.3s;
    }

    .node-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        border-color: var(--accent);
    }

    .node-header {
        height: 100px;
        background: #f8fafc;
        border-radius: 11px 11px 0 0;
        overflow: hidden;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .node-header img { width: 100%; height: 100%; object-fit: cover; }
    .node-header i { font-size: 2.5rem; color: #cbd5e1; }

    .node-body { padding: 12px; }
    .node-role { font-size: 0.65rem; font-weight: 700; color: var(--accent); text-transform: uppercase; display: block; margin-bottom: 5px; }
    .node-name { font-size: 0.8rem; font-weight: 800; color: var(--primary); line-height: 1.3; margin: 0; }
    .node-nip { font-size: 0.6rem; color: var(--text-light); margin-top: 5px; display: block; }

    /* Vertical List for Sub-units */
    .vertical-stack {
        margin-top: 15px;
        text-align: left;
        padding-left: 10px;
        border-left: 2px solid #e2e8f0;
    }

    .stack-item {
        position: relative;
        padding: 10px 0 10px 15px;
    }

    .stack-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 20px;
        width: 10px;
        height: 2px;
        background: #e2e8f0;
    }

    .stack-card {
        background: #f8fafc;
        border-radius: 8px;
        padding: 8px 12px;
        border: 1px solid #f1f5f9;
    }

    .stack-role { font-size: 0.55rem; font-weight: 700; color: var(--accent); text-transform: uppercase; }
    .stack-name { font-size: 0.75rem; font-weight: 800; color: var(--primary); display: block; margin: 2px 0; }

    /* Staff List */
    .staff-list {
        margin-top: 5px;
        padding-left: 10px;
        border-left: 1px dashed #cbd5e1;
    }
    .staff-mini { font-size: 0.65rem; color: var(--text-light); padding: 2px 0; display: block; font-weight: 500; }

    /* Level Colors */
    .level-0 .node-box { border-top: 4px solid var(--primary); width: 220px; }
    .level-1-support .node-box { border-top: 4px solid #f59e0b; }
    .level-1-op .node-box { border-top: 4px solid var(--accent); }

    /* Scrollbar */
    .org-container::-webkit-scrollbar { height: 6px; }
    .org-container::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
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

<div class="org-container">
    @if($employees->count() > 0)
        @php
            $kadis = $employees->where('parent_id', null)->first();
        @endphp

        <div class="org-tree">
            @if($kadis)
                <ul>
                    <li class="level-0">
                        <div class="node-box">
                            <div class="node-header" style="height: 140px;">
                                @if($kadis->foto)
                                    <img src="{{ asset('storage/'.$kadis->foto) }}" alt="{{ $kadis->nama }}">
                                @else
                                    <i class="fas fa-user-tie"></i>
                                @endif
                            </div>
                            <div class="node-body">
                                <span class="node-role">{{ $kadis->jabatan }}</span>
                                <h4 class="node-name">{{ $kadis->nama }}</h4>
                                <span class="node-nip">NIP. {{ $kadis->nip }}</span>
                            </div>
                        </div>

                        @php
                            $level1 = $employees->where('parent_id', $kadis->id)->sortBy('order');
                        @endphp

                        @if($level1->count() > 0)
                            <ul>
                                @foreach($level1 as $l1)
                                    @php 
                                        $isSupport = (strpos(strtolower($l1->jabatan), 'sekretaris') !== false || strpos(strtolower($l1->jabatan), 'bendahara') !== false);
                                    @endphp
                                    <li class="{{ $isSupport ? 'level-1-support' : 'level-1-op' }}">
                                        <div class="node-box">
                                            <div class="node-header">
                                                @if($l1->foto)
                                                    <img src="{{ asset('storage/'.$l1->foto) }}" alt="{{ $l1->nama }}">
                                                @else
                                                    <i class="fas fa-user"></i>
                                                @endif
                                            </div>
                                            <div class="node-body">
                                                <span class="node-role">{{ $l1->jabatan }}</span>
                                                <h4 class="node-name">{{ $l1->nama }}</h4>
                                                <span class="node-nip">NIP. {{ $l1->nip }}</span>

                                                <!-- Level 2 & 3 (Vertical Stack) -->
                                                @php
                                                    $level2 = $employees->where('parent_id', $l1->id)->sortBy('order');
                                                @endphp

                                                @if($level2->count() > 0)
                                                    <div class="vertical-stack">
                                                        @foreach($level2 as $l2)
                                                            <div class="stack-item">
                                                                <div class="stack-card">
                                                                    <span class="stack-role">{{ $l2->jabatan }}</span>
                                                                    <span class="stack-name">{{ $l2->nama }}</span>
                                                                    
                                                                    @php $staffs = $employees->where('parent_id', $l2->id)->sortBy('order'); @endphp
                                                                    @if($staffs->count() > 0)
                                                                        <div class="staff-list">
                                                                            @foreach($staffs as $staff)
                                                                                <span class="staff-mini">• {{ $staff->nama }}</span>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                </ul>
            @endif
        </div>
    @else
        <div style="text-align: center; padding: 100px 0;">
            <i class="fas fa-users fa-4x" style="color: #e2e8f0; margin-bottom: 20px;"></i>
            <p style="color: var(--text-light); font-weight: 600;">Data sedang diperbarui.</p>
        </div>
    @endif
</div>

@if($profile->struktur_organisasi)
<section class="section" style="background: #f8fafc; border-top: 1px solid #e2e8f0;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;">
            <span style="display: inline-block; padding: 8px 20px; background: var(--accent-soft); color: var(--accent); border-radius: 50px; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px;">Bagan Visual</span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary);">Bagan Struktur Organisasi</h2>
        </div>
        <div style="background: white; padding: 30px; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
            <img src="{{ asset('storage/'.$profile->struktur_organisasi) }}" alt="Bagan Struktur Organisasi" style="width: 100%; border-radius: 15px;">
        </div>
    </div>
</section>
@endif
@endsection
