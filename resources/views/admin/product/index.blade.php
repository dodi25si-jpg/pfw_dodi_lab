@extends('layouts.admin.app')
@section('page-action')
  <a href="{{ route('product.create') }}" class="btn btn-primary rounded-pill px-4">
    <i class="bi bi-plus-lg me-1"></i> Tambah Produk
  </a>
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title mb-0">Daftar Produk Kantin</h2>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="data-table">
        <thead class="table-light">
          <tr>
            <th class="ps-4">No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th class="text-end pe-4">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($dataProduct as $item)
            <tr class="data-row">
              <td class="ps-4 fw-semibold">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $item->name }}</td>
              <td><span class="badge bg-secondary">{{ $item->category->name ?? '-' }}</span></td>
              <td class="text-success fw-semibold">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
              <td><span class="badge bg-info text-dark">{{ $item->stock }} item</span></td>
              <td class="text-end pe-4">
                <a href="{{ route('product.edit', $item->product_id) }}" class="btn btn-info btn-sm">
                  <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <form action="{{ route('product.destroy', $item->product_id) }}" method="POST" style="display:inline"
                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
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
              <td colspan="6" class="text-center py-4 text-muted">
                <i class="bi bi-box-seam fs-2 d-block mb-2"></i>
                Belum ada data produk tersedia.
              </td>
            </tr>
          @endforelse
          <tr id="no-result-row" class="d-none">
            <td colspan="6" class="text-center py-4 text-muted">
              <i class="bi bi-search fs-2 d-block mb-2"></i>
              Produk tidak ditemukan.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
