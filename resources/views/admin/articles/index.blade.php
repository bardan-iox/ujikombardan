@extends('layouts.admin')
@section('title', 'Artikel / Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Daftar Artikel</h5>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-navy btn-sm"><i class="bi bi-plus-lg"></i> Tambah Artikel</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr><th>#</th><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($articles as $i => $article)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="fw-semibold">{{ Str::limit($article->title, 50) }}</td>
                    <td><span class="badge bg-secondary-subtle text-secondary-emphasis">{{ $article->category ?? '-' }}</span></td>
                    <td class="small text-muted">{{ optional($article->published_at)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?')">
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
