@extends('layouts.admin')
@section('title', 'Prestasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Prestasi</h5>
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-navy btn-sm"><i class="bi bi-plus-lg"></i> Tambah Prestasi</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Judul</th><th>Tingkat</th><th>Tahun</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($achievements as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="fw-semibold">{{ $item->title }}</td>
                    <td>{{ $item->level }}</td>
                    <td>{{ $item->year }}</td>
                    <td>
                        <a href="{{ route('admin.achievements.edit', $item) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.achievements.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus prestasi ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
