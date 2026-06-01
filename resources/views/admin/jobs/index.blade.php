@extends('layouts.admin')

@section('header_title', 'Lowongan Kerja')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Bursa Lowongan Kerja</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Informasi lowongan dari mitra perusahaan yang telah terverifikasi.</p>
        </div>
        <a href="{{ route('admin.job-vacancies.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Lowongan
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
                    <th style="width: 80px;">Poster</th>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Batas Waktu</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vacancies as $vacancy)
                <tr>
                    <td>
                        @if($vacancy->images->count() > 0)
                            <img src="{{ asset('storage/'.$vacancy->images->first()->path) }}" alt="Poster" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; box-shadow: var(--shadow-sm);">
                        @else
                            <div style="width: 50px; height: 50px; background: #f8fafc; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #cbd5e1; border: 1px dashed #e2e8f0;">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight: 700; color: var(--primary);">{{ $vacancy->perusahaan }}</div>
                    </td>
                    <td><span style="font-weight: 500; color: var(--text-main);">{{ $vacancy->posisi }}</span></td>
                    <td>
                        <div style="font-size: 0.85rem; font-weight: 600; color: {{ $vacancy->deadline && $vacancy->deadline->isPast() ? 'var(--danger)' : 'var(--text-main)' }}">
                            <i class="far fa-calendar-alt" style="margin-right: 4px; opacity: 0.5;"></i>
                            {{ $vacancy->deadline ? $vacancy->deadline->format('d M Y') : 'Tanpa Batas' }}
                        </div>
                    </td>
                    <td style="text-align: center;">
                        @if($vacancy->is_verified)
                            <span class="badge badge-success"><i class="fas fa-check-circle" style="margin-right: 4px;"></i> Verified</span>
                        @else
                            <span class="badge badge-warning">Review</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <a href="{{ route('admin.job-vacancies.edit', $vacancy->id) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.job-vacancies.destroy', $vacancy->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
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
                    <td colspan="6" style="padding: 40px; text-align: center; color: var(--text-muted);">
                        <p style="font-weight: 500;">Belum ada data lowongan kerja.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 32px;">
        {{ $vacancies->links() }}
    </div>
</div>
@endsection
