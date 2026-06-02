@extends('layouts.admin')

@section('header_title', 'Dashboard')

@section('content')
<div style="margin-bottom: 32px;">
    <h3 style="margin: 0 0 8px; font-size: 1.75rem; font-weight: 800; color: var(--primary);">Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋</h3>
    <p style="margin: 0; color: var(--text-muted); font-weight: 500;">Berikut adalah ringkasan aktivitas portal Disnakertrans hari ini.</p>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; margin-bottom: 40px;">
    <!-- Stat Card 1 -->
    <div class="card" style="display: flex; align-items: center; gap: 20px; border: none; position: relative; overflow: hidden;">
        <div style="width: 56px; height: 56px; background: #eff6ff; color: #3b82f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
            <i class="fas fa-newspaper"></i>
        </div>
        <div>
            <h4 style="margin: 0; font-size: 0.875rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Total Berita</h4>
            <p style="margin: 4px 0 0; font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $stats['posts'] }}</p>
        </div>
        <div style="position: absolute; right: -10px; bottom: -10px; font-size: 80px; opacity: 0.03; transform: rotate(-15deg);">
            <i class="fas fa-newspaper"></i>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="card" style="display: flex; align-items: center; gap: 20px; border: none; position: relative; overflow: hidden;">
        <div style="width: 56px; height: 56px; background: #fdf2f8; color: #ec4899; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <h4 style="margin: 0; font-size: 0.875rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Pegawai</h4>
            <p style="margin: 4px 0 0; font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $stats['employees'] }}</p>
        </div>
        <div style="position: absolute; right: -10px; bottom: -10px; font-size: 80px; opacity: 0.03; transform: rotate(-15deg);">
            <i class="fas fa-users"></i>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="card" style="display: flex; align-items: center; gap: 20px; border: none; position: relative; overflow: hidden;">
        <div style="width: 56px; height: 56px; background: #f0fdf4; color: #10b981; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div>
            <h4 style="margin: 0; font-size: 0.875rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Pelatihan Aktif</h4>
            <p style="margin: 4px 0 0; font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $stats['trainings'] }}</p>
        </div>
        <div style="position: absolute; right: -10px; bottom: -10px; font-size: 80px; opacity: 0.03; transform: rotate(-15deg);">
            <i class="fas fa-graduation-cap"></i>
        </div>
    </div>

    <!-- Stat Card 4 -->
    <div class="card" style="display: flex; align-items: center; gap: 20px; border: none; position: relative; overflow: hidden;">
        <div style="width: 56px; height: 56px; background: #fff7ed; color: #f59e0b; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div>
            <h4 style="margin: 0; font-size: 0.875rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Pesan Baru</h4>
            <p style="margin: 4px 0 0; font-size: 1.5rem; font-weight: 800; color: var(--primary);">{{ $stats['messages'] }}</p>
        </div>
        <div style="position: absolute; right: -10px; bottom: -10px; font-size: 80px; opacity: 0.03; transform: rotate(-15deg);">
            <i class="fas fa-envelope-open-text"></i>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px;">
    <div class="card" style="padding: 32px;">
        <h3 style="margin: 0 0 24px; font-size: 1.25rem; font-weight: 700;">Panduan Cepat Admin</h3>
        <div style="display: grid; gap: 20px;">
            <div style="display: flex; gap: 16px;">
                <div style="font-size: 1.25rem; color: var(--accent); margin-top: 3px;"><i class="fas fa-check-circle"></i></div>
                <div>
                    <h5 style="margin: 0 0 4px; font-size: 1rem; font-weight: 700;">Kelola Berita & Pengumuman</h5>
                    <p style="margin: 0; color: var(--text-muted); font-size: 0.875rem;">Pastikan informasi yang diterbitkan sudah valid dan menyertakan gambar pendukung yang relevan.</p>
                </div>
            </div>
            <div style="display: flex; gap: 16px;">
                <div style="font-size: 1.25rem; color: var(--accent); margin-top: 3px;"><i class="fas fa-check-circle"></i></div>
                <div>
                    <h5 style="margin: 0 0 4px; font-size: 1rem; font-weight: 700;">Verifikasi Lowongan Kerja</h5>
                    <p style="margin: 0; color: var(--text-muted); font-size: 0.875rem;">Periksa keabsahan perusahaan sebelum memberikan status 'Terverifikasi' pada postingan lowongan.</p>
                </div>
            </div>
            <div style="display: flex; gap: 16px;">
                <div style="font-size: 1.25rem; color: var(--accent); margin-top: 3px;"><i class="fas fa-check-circle"></i></div>
                <div>
                    <h5 style="margin: 0 0 4px; font-size: 1rem; font-weight: 700;">Pantau Pesan & Pengaduan</h5>
                    <p style="margin: 0; color: var(--text-muted); font-size: 0.875rem;">Segera respon setiap pesan masuk untuk memberikan pelayanan prima kepada masyarakat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="padding: 32px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; border: none;">
        <h3 style="margin: 0 0 12px; font-size: 1.25rem; font-weight: 700;">Profil Akun</h3>
        <p style="margin: 0 0 24px; opacity: 0.7; font-size: 0.875rem;">Informasi akses sistem Anda.</p>
        
        <div style="background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
            <div style="margin-bottom: 16px;">
                <small style="display: block; opacity: 0.5; margin-bottom: 4px; text-transform: uppercase; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;">Level Akses</small>
                <span class="badge" style="background: var(--accent); color: white; border-radius: 6px;">{{ auth()->user()->getRoleNames()->first() ?? 'Staff' }}</span>
            </div>
            <div>
                <small style="display: block; opacity: 0.5; margin-bottom: 4px; text-transform: uppercase; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;">Email Terdaftar</small>
                <span style="font-weight: 600; font-size: 0.95rem;">{{ auth()->user()->email }}</span>
            </div>
        </div>
        
        <a href="{{ route('admin.account.password') }}" class="btn" style="width: 100%; margin-top: 24px; background: rgba(255,255,255,0.1); color: white; font-size: 0.875rem;">Ubah Password</a>
    </div>
</div>
@endsection
