@php($a = $article ?? null)
<div class="mb-3">
    <label class="form-label fw-semibold">Judul</label>
    <input type="text" name="title" value="{{ old('title', $a->title ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Kategori</label>
    <input type="text" name="category" value="{{ old('category', $a->category ?? '') }}" class="form-control" placeholder="Prestasi, Kemitraan, dll">
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Ringkasan (Excerpt)</label>
    <textarea name="excerpt" rows="2" class="form-control">{{ old('excerpt', $a->excerpt ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Isi Artikel</label>
    <textarea name="content" rows="6" class="form-control" required>{{ old('content', $a->content ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Cover Image</label>
    <input type="file" name="cover_image" class="form-control">
    @if($a && $a->cover_image)
        <img src="{{ asset('storage/' . $a->cover_image) }}" class="mt-2 rounded" style="height:80px;">
    @endif
</div>
