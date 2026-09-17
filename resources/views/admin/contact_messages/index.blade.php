@extends('layouts.admin')
@section('title', 'Pesan Masuk')

@section('content')
<h5 class="mb-3">Pesan Masuk</h5>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Nama</th><th>Email</th><th>Subjek</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($messages as $i => $msg)
                <tr class="{{ $msg->is_read ? '' : 'fw-semibold' }}">
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->subject ?? '-' }}</td>
                    <td>
                        @if($msg->is_read)
                            <span class="badge bg-secondary-subtle text-secondary-emphasis">Dibaca</span>
                        @else
                            <span class="badge bg-warning-subtle text-warning-emphasis">Baru</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada pesan masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
