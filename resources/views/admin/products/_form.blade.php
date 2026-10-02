@php($p = $product ?? null)
<div class="mb-3">
    <label class="form-label fw-semibold">Nama Produk / Karya</label>
    <input type="text" name="title" value="{{ old('title', $p->title ?? '') }}" class="form-control" required placeholder="">
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Siswa/Siswi</label>
        <input type="text" name="student_name" value="{{ old('student_name', $p->student_name ?? '') }}" class="form-control" placeholder="Nama Lengkap" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Kelas / Jurusan</label>
        <input type="text" name="class_name" value="{{ old('class_name', $p->class_name ?? '') }}" class="form-control" placeholder="">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi Produk</label>
    <textarea name="description" rows="4" class="form-control" placeholder="Jelaskan produk/karya ini secara singkat...">{{ old('description', $p->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Foto Produk</label>
    <input type="file" name="image" class="form-control">
    @if($p && $p->image)
        <img src="{{ asset('storage/' . $p->image) }}" class="mt-2 rounded" style="height:80px;">
    @endif
</div>