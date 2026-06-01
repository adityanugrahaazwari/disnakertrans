<tr style="border-bottom: 1px solid #f1f5f9;">
    <td style="padding: 16px; padding-left: {{ 16 + ($level * 32) }}px;">
        <div style="display: flex; align-items: center; gap: 12px;">
            @if($level > 0)
                <span style="color: #cbd5e1; font-weight: 300;">└─</span>
            @endif
            @if($employee->foto)
                <img src="{{ asset('storage/'.$employee->foto) }}" alt="Foto" style="width: 42px; height: 42px; border-radius: 10px; object-fit: cover; border: 2px solid white; box-shadow: var(--shadow-sm);">
            @else
                <div style="width: 42px; height: 42px; border-radius: 10px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 1.1rem; border: 1px dashed #cbd5e1;">
                    <i class="fas fa-user"></i>
                </div>
            @endif
            <div>
                <div style="font-weight: 700; color: var(--primary); font-size: 0.95rem;">{{ $employee->nama }}</div>
                <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500;">NIP: {{ $employee->nip ?? '-' }}</div>
            </div>
        </div>
    </td>
    <td style="padding: 16px;">
        <span class="badge" style="background: #eff6ff; color: #3b82f6; border-radius: 6px;">{{ $employee->jabatan }}</span>
    </td>
    <td style="padding: 16px; text-align: center;">
        <span style="font-weight: 600; color: var(--text-light); font-size: 0.85rem;">#{{ $employee->order }}</span>
    </td>
    <td style="padding: 16px; text-align: center;">
        <div style="display: flex; gap: 8px; justify-content: center;">
            <a href="{{ route('admin.profile.structure.edit', $employee->id) }}" class="btn" style="background: #f1f5f9; color: var(--primary); padding: 8px 12px; border-radius: 8px;" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('admin.profile.structure.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Hapus data pegawai ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="background: #fee2e2; color: var(--danger); padding: 8px 12px; border-radius: 8px;" title="Hapus">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </td>
</tr>

@if($employee->children->count() > 0)
    @foreach($employee->children as $child)
        @include('admin.employees.partials.tree_item', ['employee' => $child, 'level' => $level + 1])
    @endforeach
@endif
