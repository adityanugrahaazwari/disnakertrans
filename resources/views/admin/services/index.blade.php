@extends('layouts.admin')

@section('header_title', 'Kelola Layanan')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Daftar Layanan</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola kartu layanan yang tampil di landing page.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Layanan
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
                    <th style="width: 50px;">Order</th>
                    <th>Ikon</th>
                    <th>Judul & Deskripsi</th>
                    <th>Link</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td style="text-align: center; font-weight: 700;">{{ $service->order }}</td>
                        <td style="text-align: center;">
                            <div style="width: 40px; height: 40px; background: var(--accent-soft); color: var(--accent); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; margin: 0 auto;">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight: 700; color: var(--primary); margin-bottom: 4px;">{{ $service->title }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); max-width: 400px;">{{ Str::limit($service->description, 100) }}</div>
                        </td>
                        <td>
                            <span style="font-size: 0.8rem; color: var(--text-muted);">{{ $service->url ?? '-' }}</span>
                        </td>
                        <td style="text-align: center;">
                            @if($service->is_active)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Non-aktif</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;" title="Edit Layanan">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #fee2e2; color: var(--danger); padding: 8px 12px; border-radius: 8px;" title="Hapus Layanan">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 40px; text-align: center;">
                            <p style="color: var(--text-muted); font-weight: 500;">Belum ada data layanan yang tersedia.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
