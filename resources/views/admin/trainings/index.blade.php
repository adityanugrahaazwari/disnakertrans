@extends('layouts.admin')

@section('header_title', 'Info Pelatihan')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Program Pelatihan (BLK)</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Daftar pelatihan peningkatan kompetensi masyarakat.</p>
        </div>
        <a href="{{ route('admin.trainings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pelatihan
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
                    <th>Judul Pelatihan</th>
                    <th>Kategori</th>
                    <th>Kapasitas</th>
                    <th>Jadwal Pelaksanaan</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trainings as $training)
                <tr>
                    <td>
                        <div style="font-weight: 700; color: var(--primary); font-size: 1rem;">{{ $training->title }}</div>
                    </td>
                    <td>
                        <span class="badge" style="background: #e2e8f0; color: #475569;">{{ $training->category->name ?? 'N/A' }}</span>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--text-main);">{{ $training->quota }} Peserta</div>
                    </td>
                    <td>
                        @if($training->start_date)
                            <div style="font-size: 0.85rem; color: var(--text-main); font-weight: 500;">
                                <i class="far fa-calendar-check" style="margin-right: 6px; color: var(--accent);"></i>
                                {{ $training->start_date->format('d M') }} - {{ $training->end_date ? $training->end_date->format('d M Y') : 'Selesai' }}
                            </div>
                        @else
                            <span style="color: var(--text-muted); font-style: italic;">Belum diatur</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @if($training->is_active)
                            <span class="badge badge-success">Pendaftaran Buka</span>
                        @else
                            <span class="badge badge-danger">Tutup</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <a href="{{ route('admin.trainings.edit', $training->id) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.trainings.destroy', $training->id) }}" method="POST" onsubmit="return confirm('Hapus data pelatihan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background: #fee2e2; color: var(--danger); padding: 8px 12px; border-radius: 8px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 40px; text-align: center; color: var(--text-muted);">Belum ada data pelatihan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
