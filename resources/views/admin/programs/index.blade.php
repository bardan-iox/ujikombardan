@extends('layouts.admin')
@section('title', 'Program Keahlian')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Program Keahlian</h5>
    <a href="{{ route('admin.programs.create') }}" class="btn btn-navy btn-sm"><i class="bi bi-plus-lg"></i> Tambah Program</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Nama</th><th>Deskripsi Singkat</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($programs as $i => $program)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="fw-semibold">{{ $program->name }}</td>
                    <td class="small text-muted">{{ Str::limit($program->short_description, 60) }}</td>
                    <td>
                        <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus program ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
