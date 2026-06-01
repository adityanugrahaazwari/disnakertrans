@extends('layouts.admin')

@section('header_title', 'Detail Pesan')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
        <h3 style="margin: 0;">{{ $message->subject }}</h3>
        <a href="{{ route('admin.messages.index') }}" style="text-decoration: none; color: #3b82f6; font-size: 14px;">&larr; Kembali ke Kotak Masuk</a>
    </div>

    <div style="margin-bottom: 25px; background: #f9fafb; padding: 15px; border-radius: 8px;">
        <div style="display: grid; grid-template-columns: 100px 1fr; gap: 10px; margin-bottom: 8px;">
            <div style="color: #6b7280;">Dari:</div>
            <div style="font-weight: bold;">{{ $message->name }} &lt;{{ $message->email }}&gt;</div>
        </div>
        <div style="display: grid; grid-template-columns: 100px 1fr; gap: 10px;">
            <div style="color: #6b7280;">Tanggal:</div>
            <div>{{ $message->created_at->format('l, d F Y - H:i') }}</div>
        </div>
    </div>

    <div style="line-height: 1.6; color: #374151; white-space: pre-wrap; min-height: 200px;">
        {{ $message->message }}
    </div>

    <div style="margin-top: 40px; border-top: 1px solid #e5e7eb; padding-top: 20px;">
        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: #ef4444; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer;">Hapus Pesan Ini</button>
        </form>
    </div>
</div>
@endsection
