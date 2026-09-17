@php($item = $achievement ?? null)
<div class="mb-3">
    <label class="form-label fw-semibold">Judul Prestasi</label>
    <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" class="form-control" required>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tingkat</label>
        <input type="text" name="level" value="{{ old('level', $item->level ?? '') }}" class="form-control" placeholder="Nasional, Provinsi, dll">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tahun</label>
        <input type="text" name="year" value="{{ old('year', $item->year ?? '') }}" class="form-control" placeholder="2026">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi</label>
    <textarea name="description" rows="3" class="form-control">{{ old('description', $item->description ?? '') }}</textarea>
</div>
