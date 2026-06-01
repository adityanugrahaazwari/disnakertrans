@extends('layouts.admin')
@section('header_title', 'Manajemen User')
@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin:0;">Daftar Pengguna Sistem</h3>
        <a href="#" class="btn-login" style="width: auto; padding: 8px 15px; text-decoration: none; font-size: 0.9rem;">+ Tambah User</a>
    </div>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9fafb; text-align: left;">
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Nama</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Email</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Role</th>
                <th style="padding: 12px; border-bottom: 2px solid #e5e7eb;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">Super Admin Disnakertrans</td>
                <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">admin@banjarkab.go.id</td>
                <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;"><span style="background: #dbeafe; color: #1e40af; padding: 2px 8px; border-radius: 12px; font-size: 0.75rem;">Super Admin</span></td>
                <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                    <button style="background: none; border: none; color: #3b82f6; cursor: pointer;"><i class="fas fa-edit"></i></button>
                    <button style="background: none; border: none; color: #ef4444; cursor: pointer; margin-left: 10px;"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
