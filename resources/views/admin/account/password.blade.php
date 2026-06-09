@extends('layouts.admin')

@section('header_title', 'Ubah Password')

@section('content')
<div class="card" style="max-width: 600px;">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Keamanan Akun</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Perbarui password Anda secara berkala untuk menjaga keamanan akses dashboard.</p>
    </div>

    <form action="{{ route('admin.account.password.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 24px;">
            <label>Password Saat Ini</label>
            <input type="password" name="current_password" required placeholder="••••••••">
            @error('current_password')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label>Password Baru</label>
            <input type="password" name="password" required placeholder="Min. 8 karakter">
            @error('password')
                <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" required placeholder="Ulangi password baru">
        </div>

        <div style="border-top: 1px solid #f1f5f9; padding-top: 24px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 0.95rem;">
                <i class="fas fa-key"></i> Perbarui Password
            </button>
        </div>
    </form>
</div>
@endsection
