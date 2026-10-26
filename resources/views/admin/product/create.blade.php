@extends('layouts.admin.app')
@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk')
@section('page-subtitle', 'Isi form di bawah ini untuk menambahkan produk ke kantin.')
@section('content')
<div class="card mb-4 col-md-8">
  <div class="card-body">
    <form action="{{ route('product.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Nama Produk</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
          value="{{ old('name') }}" placeholder="Masukkan nama produk">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label fw-bold">Kategori</label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
          <option value="">-- Pilih Kategori --</option>
          @foreach($dataCategory as $category)
            <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="price" class="form-label fw-bold">Harga (Rp)</label>
        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
          value="{{ old('price') }}" placeholder="Masukkan harga" min="0">
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="stock" class="form-label fw-bold">Stok</label>
        <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror"
          value="{{ old('stock') }}" placeholder="Masukkan stok" min="0">
        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan Produk</button>
      </div>
    </form>
  </div>
</div>
@endsection
