@extends('layouts.admin')

@section('header_title', 'Pesan & Pengaduan')

@section('content')
<div class="card">
    <div style="margin-bottom: 30px;">
        <h3 style="margin:0; font-size: 1.25rem; font-weight: 700; color: var(--primary);">Kotak Masuk</h3>
        <p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--text-muted);">Kelola pesan dan pengaduan yang masuk dari portal publik.</p>
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
                    <th>Pengirim</th>
                    <th>Perihal / Subjek</th>
                    <th>Waktu Masuk</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr style="{{ $message->is_read ? 'opacity: 0.8;' : 'background: #f8fafc;' }}">
                    <td style="padding: 20px 16px;">
                        <div style="font-weight: 700; color: var(--primary); margin-bottom: 2px;">{{ $message->name }}</div>
                        <div style="font-size: 0.75rem; color: var(--accent); font-weight: 600;">{{ $message->email }}</div>
                    </td>
                    <td>
                        <div style="font-weight: {{ $message->is_read ? '500' : '700' }}; color: var(--text-main);">{{ $message->subject }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;">{{ $message->message }}</div>
                    </td>
                    <td>
                        <div style="font-size: 0.85rem; font-weight: 600;">{{ $message->created_at->diffForHumans() }}</div>
                        <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $message->created_at->format('d/m/Y H:i') }}</div>
                    </td>
                    <td style="text-align: center;">
                        @if($message->is_read)
                            <span class="badge" style="background: #f1f5f9; color: #94a3b8;">Dibaca</span>
                        @else
                            <span class="badge badge-info"><i class="fas fa-envelope" style="margin-right: 4px;"></i> Baru</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn" style="background: var(--accent); color: white; padding: 8px 16px; border-radius: 8px; font-size: 0.8rem;">
                                <i class="fas fa-folder-open"></i> Buka
                            </a>
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
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
                    <td colspan="5" style="padding: 40px; text-align: center; color: var(--text-muted);">
                        <div style="font-size: 3rem; margin-bottom: 16px; opacity: 0.2;"><i class="fas fa-inbox"></i></div>
                        <p style="font-weight: 500;">Kotak masuk Anda kosong.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 32px;">
        {{ $messages->links() }}
    </div>
</div>
@endsection
