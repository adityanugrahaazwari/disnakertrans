@extends('layouts.admin')

@section('header_title', 'Struktur Organisasi')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Data Pegawai & Struktur</h3>
            <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola hierarki organisasi dan profil resmi pegawai dinas.</p>
        </div>
        <a href="{{ route('admin.profile.structure.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Pegawai
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
                    <th>Nama / NIP</th>
                    <th>Jabatan</th>
                    <th style="text-align: center;">Urutan</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    @include('admin.employees.partials.tree_item', ['employee' => $employee, 'level' => 0])
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
