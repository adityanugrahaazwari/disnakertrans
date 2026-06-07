@extends('layouts.admin')

@section('header_title', 'Kelola Bidang')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Daftar Bidang</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola 3 bidang utama yang tampil di landing page.</p>
        </div>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Bidang
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
                    <th>Ikon & Warna</th>
                    <th>Judul & Deskripsi</th>
                    <th>Link</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td style="text-align: center; font-weight: 700;">{{ $department->order }}</td>
                        <td style="text-align: center;">
                            <div style="width: 40px; height: 40px; background: white; color: {{ $department->color }}; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; margin: 0 auto; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
                                <i class="{{ $department->icon }}"></i>
                            </div>
                            <small style="display:block; margin-top:5px; color:var(--text-muted);">{{ $department->color }}</small>
                        </td>
                        <td>
                            <div style="font-weight: 700; color: var(--primary); margin-bottom: 4px;">{{ $department->title }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); max-width: 400px;">{{ Str::limit($department->description, 100) }}</div>
                        </td>
                        <td>
                            <span style="font-size: 0.8rem; color: var(--text-muted);">{{ $department->url ?? '-' }}</span>
                        </td>
                        <td style="text-align: center;">
                            @if($department->is_active)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Non-aktif</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('admin.departments.edit', $department) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;" title="Edit Bidang">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bidang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #fee2e2; color: var(--danger); padding: 8px 12px; border-radius: 8px;" title="Hapus Bidang">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 40px; text-align: center;">
                            <p style="color: var(--text-muted); font-weight: 500;">Belum ada data bidang yang tersedia.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
