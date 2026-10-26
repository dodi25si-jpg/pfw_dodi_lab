@extends('layouts.admin.app')
@section('content')
<div class="card mb-4 col-md-8">
  <div class="card-body">
    <form action="{{ route('category.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Nama Kategori</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
          value="{{ old('name') }}" placeholder="Contoh: Makanan">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label fw-bold">Deskripsi <span class="text-muted fw-normal">(opsional)</span></label>
        <textarea name="description" id="description" rows="3"
          class="form-control @error('description') is-invalid @enderror"
          placeholder="Deskripsi singkat kategori">{{ old('description') }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan Kategori</button>
      </div>
    </form>
  </div>
</div>
@endsection
