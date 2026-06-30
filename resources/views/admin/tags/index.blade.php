@extends('layouts.admin')

@section('header_title', 'Tag Berita')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Manajemen Tag</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Gunakan tag untuk mempermudah pencarian topik berita terkait.</p>
        </div>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Tag
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
                    <th style="width: 80px;">No</th>
                    <th>Nama Tag</th>
                    <th>Slug</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $index => $tag)
                <tr>
                    <td style="font-weight: 600; color: var(--text-light);">{{ $tags->firstItem() + $index }}</td>
                    <td>
                        <div style="font-weight: 700; color: var(--primary); display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-hashtag" style="color: var(--accent); font-size: 0.8rem;"></i>
                            {{ $tag->name }}
                        </div>
                    </td>
                    <td><code style="background: #f1f5f9; padding: 4px 8px; border-radius: 6px; color: var(--accent); font-size: 0.85rem;">{{ $tag->slug }}</code></td>
                    <td style="text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 8px;">
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-outline btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tag ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 40px; text-align: center; color: var(--text-muted);">Belum ada data tag.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 32px;">
        {{ $tags->links() }}
    </div>
</div>
@endsection
