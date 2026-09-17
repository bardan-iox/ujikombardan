@php($p = $program ?? null)
<div class="mb-3">
    <label class="form-label fw-semibold">Nama Program</label>
    <input type="text" name="name" value="{{ old('name', $p->name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Icon (Bootstrap Icons, contoh: "code-slash")</label>
    <input type="text" name="icon" value="{{ old('icon', $p->icon ?? '') }}" class="form-control" placeholder="code-slash">
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi Singkat</label>
    <textarea name="short_description" rows="2" class="form-control" required>{{ old('short_description', $p->short_description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi Lengkap</label>
    <textarea name="description" rows="5" class="form-control">{{ old('description', $p->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Gambar</label>
    <input type="file" name="image" class="form-control">
    @if($p && $p->image)
        <img src="{{ asset('storage/' . $p->image) }}" class="mt-2 rounded" style="height:80px;">
    @endif
</div>
