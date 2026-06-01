@extends('layouts.admin')

@section('header_title', 'Kelola Berita')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Daftar Berita & Artikel</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola semua konten publikasi yang tampil di website.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div style="padding: 16px; background: #dcfce7; color: #166534; border-radius: 10px; margin-bottom: 24px; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-check-circle"></i>
            <span style="font-weight: 600; font-size: 0.9rem;">{{ session('success') }}</span>
        </div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Judul & Penulis</th>
                    <th>Kategori & Tag</th>
                    <th style="text-align: center;">Status</th>
                    <th>Tanggal</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>
                            <div style="font-weight: 700; color: var(--primary); margin-bottom: 4px;">{{ $post->title }}</div>
                            <div style="display: flex; align-items: center; gap: 6px; font-size: 0.75rem; color: var(--text-muted);">
                                <i class="fas fa-user-circle"></i> {{ $post->user->name }}
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-info" style="margin-bottom: 6px;">{{ $post->category->name }}</span>
                            <div style="display: flex; flex-wrap: wrap; gap: 4px;">
                                @foreach($post->tags as $tag)
                                    <span style="font-size: 0.7rem; color: var(--text-light); background: #f1f5f9; padding: 2px 6px; border-radius: 4px;">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td style="text-align: center;">
                            @if($post->status == 'published')
                                <span class="badge badge-success">Diterbitkan</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div style="font-size: 0.85rem; font-weight: 500;">{{ $post->created_at->format('d M Y') }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $post->created_at->format('H:i') }} WIB</div>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;" title="Edit Berita">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #fee2e2; color: var(--danger); padding: 8px 12px; border-radius: 8px;" title="Hapus Berita">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 40px; text-align: center;">
                            <img src="https://illustrations.popsy.co/slate/shaking-hands.svg" alt="Empty" style="width: 120px; opacity: 0.5; margin-bottom: 16px;">
                            <p style="color: var(--text-muted); font-weight: 500;">Belum ada data berita yang tersedia.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 32px;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
