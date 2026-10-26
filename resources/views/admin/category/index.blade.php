@extends('layouts.admin.app')
@section('page-action')
  <a href="{{ route('category.create') }}" class="btn btn-primary rounded-pill px-4">
    <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
  </a>
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title mb-0">Daftar Kategori</h2>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="data-table">
        <thead class="table-light">
          <tr>
            <th class="ps-4">No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Jumlah Produk</th>
            <th class="text-end pe-4">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($dataCategory as $item)
            <tr class="data-row">
              <td class="ps-4 fw-semibold">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $item->name }}</td>
              <td>{{ $item->description ?? '-' }}</td>
              <td><span class="badge bg-info text-dark">{{ $item->products_count }} produk</span></td>
              <td class="text-end pe-4">
                <a href="{{ route('category.edit', $item->category_id) }}" class="btn btn-info btn-sm">
                  <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <form action="{{ route('category.destroy', $item->category_id) }}" method="POST" style="display:inline"
                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash me-1"></i> Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted">
                <i class="bi bi-tags fs-2 d-block mb-2"></i>
                Belum ada data kategori tersedia.
              </td>
            </tr>
          @endforelse
          <tr id="no-result-row" class="d-none">
            <td colspan="5" class="text-center py-4 text-muted">
              <i class="bi bi-search fs-2 d-block mb-2"></i>
              Kategori tidak ditemukan.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
