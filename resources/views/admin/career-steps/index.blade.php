@extends('layouts.admin')

@section('header_title', 'Panduan Karir')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Langkah Panduan Karir</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola langkah-langkah strategis yang tampil di bagian "Panduan Karir".</p>
        </div>
        <a href="{{ route('admin.career-steps.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Langkah
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
                    <th>Ilustrasi</th>
                    <th>Judul & Deskripsi</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($steps as $step)
                    <tr>
                        <td style="text-align: center; font-weight: 700;">{{ $step->order }}</td>
                        <td style="text-align: center;">
                            @if($step->image)
                                <img src="{{ asset('storage/' . $step->image) }}" alt="{{ $step->title }}" style="height: 60px; width: auto; border-radius: 8px;">
                            @else
                                <div style="height: 60px; width: 60px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-image" style="color: #cbd5e1;"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div style="font-weight: 700; color: var(--primary); margin-bottom: 4px;">{{ $step->title }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); max-width: 500px;">{{ Str::limit($step->description, 150) }}</div>
                        </td>
                        <td style="text-align: center;">
                            @if($step->is_active)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Non-aktif</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('admin.career-steps.edit', $step) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.career-steps.destroy', $step) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus langkah ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #fee2e2; color: var(--danger); padding: 8px 12px; border-radius: 8px;" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 40px; text-align: center;">
                            <p style="color: var(--text-muted); font-weight: 500;">Belum ada data panduan karir.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
