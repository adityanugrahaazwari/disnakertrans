@extends('layouts.public')

@section('title', 'Pusat Unduhan - Disnakertrans Kabupaten Banjar')

@section('content')
<header class="page-header">
    <h1>Pusat Unduhan</h1>
    <div class="breadcrumb">
        <a href="/">Beranda</a>
        <span>/</span>
        <span>Unduhan</span>
    </div>
</header>

<section class="section">
    <div class="container">
        <div style="background: white; padding: 40px; border-radius: var(--radius-md); box-shadow: var(--shadow-soft);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
                <h2 style="font-size: 1.5rem; color: var(--primary);">Dokumen & Formulir</h2>
                <div style="position: relative;">
                    <input type="text" id="docSearch" placeholder="Cari dokumen..." style="padding: 10px 20px 10px 45px; border-radius: 50px; border: 1px solid #f1f5f9; background: #f8fafc; font-size: 0.9rem;">
                    <i class="fas fa-search" style="position: absolute; left: 18px; top: 12px; color: #cbd5e1;"></i>
                </div>
            </div>

            <!-- Category Tabs -->
            <div style="display: flex; gap: 10px; margin-bottom: 40px; border-bottom: 1px solid #f1f5f9; padding-bottom: 20px; overflow-x: auto;">
                <button onclick="filterCategory('all')" class="cat-btn active" style="padding: 10px 25px; border-radius: 50px; border: none; cursor: pointer; font-weight: 700; font-size: 0.9rem; transition: 0.3s; white-space: nowrap;">
                    Semua
                </button>
                @foreach($categories as $categoryName => $docs)
                    <button onclick="filterCategory('{{ Str::slug($categoryName) }}')" class="cat-btn" style="padding: 10px 25px; border-radius: 50px; border: none; background: #f8fafc; color: var(--text-light); cursor: pointer; font-weight: 700; font-size: 0.9rem; transition: 0.3s; white-space: nowrap;">
                        {{ $categoryName }}
                    </button>
                @endforeach
            </div>

            <div id="docsList">
                @foreach($categories as $categoryName => $docs)
                    <div class="category-section" id="cat-{{ Str::slug($categoryName) }}" style="margin-bottom: 40px;">
                        <h3 style="font-size: 1.1rem; color: var(--accent); margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-folder-open"></i> {{ $categoryName }}
                        </h3>
                        <div style="display: flex; flex-direction: column; gap: 15px;">
                            @foreach($docs as $file)
                                <div class="doc-item" data-title="{{ strtolower($file['title']) }}" style="display: flex; align-items: center; justify-content: space-between; padding: 20px; border: 1px solid #f1f5f9; border-radius: 12px; transition: 0.3s; background: white;">
                                    <div style="display: flex; align-items: center; gap: 20px;">
                                        <div style="width: 50px; height: 50px; background: {{ $file['type'] == 'PDF' ? '#fef2f2' : '#eff6ff' }}; color: {{ $file['type'] == 'PDF' ? '#ef4444' : '#3b82f6' }}; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                                            <i class="fas {{ $file['type'] == 'PDF' ? 'fa-file-pdf' : 'fa-file-word' }}"></i>
                                        </div>
                                        <div>
                                            <h4 style="margin-bottom: 5px; font-size: 1rem; color: var(--primary);">{{ $file['title'] }}</h4>
                                            <span style="font-size: 0.8rem; color: var(--text-light);">{{ $file['type'] }} • {{ $file['size'] }}</span>
                                        </div>
                                    </div>
                                    <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: var(--accent); color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;" title="Unduh File">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="noResults" style="display: none; text-align: center; padding: 60px; color: #64748b;">
                <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 20px; color: #cbd5e1;"></i>
                <p>Dokumen yang Anda cari tidak ditemukan.</p>
            </div>
        </div>
    </div>
</section>

@section('extra_css')
<style>
    .cat-btn.active {
        background: var(--accent) !important;
        color: white !important;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }
    .doc-item:hover {
        border-color: var(--accent) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
</style>
@endsection

@section('extra_js')
<script>
    function filterCategory(slug) {
        // Update buttons
        document.querySelectorAll('.cat-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.style.background = '#f8fafc';
            btn.style.color = 'var(--text-light)';
        });
        event.target.classList.add('active');
        event.target.style.background = 'var(--accent)';
        event.target.style.color = 'white';

        // Filter sections
        const sections = document.querySelectorAll('.category-section');
        if (slug === 'all') {
            sections.forEach(s => s.style.display = 'block');
        } else {
            sections.forEach(s => {
                if (s.id === 'cat-' + slug) {
                    s.style.display = 'block';
                } else {
                    s.style.display = 'none';
                }
            });
        }
    }

    // Live Search
    document.getElementById('docSearch').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.doc-item');
        const sections = document.querySelectorAll('.category-section');
        let hasResults = false;

        items.forEach(item => {
            const title = item.getAttribute('data-title');
            if (title.includes(term)) {
                item.style.display = 'flex';
                hasResults = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Hide empty sections during search
        sections.forEach(section => {
            const visibleItems = section.querySelectorAll('.doc-item[style="display: flex;"]');
            section.style.display = (visibleItems.length > 0 || term === '') ? 'block' : 'none';
        });

        document.getElementById('noResults').style.display = hasResults ? 'none' : 'block';
    });
</script>
@endsection
@endsection
