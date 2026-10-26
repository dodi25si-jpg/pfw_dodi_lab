@extends('layouts.admin.app')
@section('title', 'Data Customer')
@section('page-title', 'Manajemen Customer')
@section('page-subtitle', 'Kelola data pelanggan kantin kamu.')
@section('page-action')
  <a href="{{ route('customer.create') }}" class="btn btn-primary rounded-pill px-4">
    <i class="bi bi-plus-lg me-1"></i> Tambah Customer
  </a>
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title mb-0">Daftar Customer</h2>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0" id="data-table">
        <thead class="table-light">
          <tr>
            <th class="ps-4">No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th class="text-end pe-4">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($dataCustomer as $item)
            <tr class="data-row">
              <td class="ps-4 fw-semibold">{{ $loop->iteration }}</td>
              <td class="fw-bold text-dark">{{ $item->first_name }}</td>
              <td>{{ $item->last_name }}</td>
              <td>{{ $item->birthday ? \Carbon\Carbon::parse($item->birthday)->format('d-m-Y') : '-' }}</td>
              <td><span class="badge bg-secondary">{{ $item->gender ?? '-' }}</span></td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone ?? '-' }}</td>
              <td class="text-end pe-4">
                <a href="{{ route('customer.edit', $item->customer_id) }}" class="btn btn-info btn-sm">
                  <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <form action="{{ route('customer.destroy', $item->customer_id) }}" method="POST" style="display:inline"
                  onsubmit="return confirm('Yakin ingin menghapus customer ini?')">
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
              <td colspan="8" class="text-center py-4 text-muted">
                <i class="bi bi-people fs-2 d-block mb-2"></i>
                Belum ada data customer tersedia.
              </td>
            </tr>
          @endforelse
          <tr id="no-result-row" class="d-none">
            <td colspan="8" class="text-center py-4 text-muted">
              <i class="bi bi-search fs-2 d-block mb-2"></i>
              Customer tidak ditemukan.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
