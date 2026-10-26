<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Produk Baru - Spark Admin</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/images/favicon.ico') }}">

  <!-- Local Third-Party Libraries -->
  <link rel="stylesheet" href="{{ asset('assets-admin/libs/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/libs/bootstrap-icons/bootstrap-icons.css') }}">

  <!-- Main Design System & Custom Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/main.css') }}">
</head>

<body>

  <!-- ==========================================
         START: Sidebar Component
         ========================================== -->
  <div class="sidebar-wrapper" id="sidebar">
    <a href="/Admin" class="sidebar-brand">
      <i class="bi bi-asterisk"></i>
      <span>Spark Admin</span>
    </a>

    <div class="flex-grow-1 overflow-y-auto">
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">MENU</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="/Admin" class="sidebar-menu-link" title="Overview">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('product.index') }}" class="sidebar-menu-link active" title="Data Produk">
              <i class="bi bi-box-seam-fill"></i>
              <span>Data Produk</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="sidebar-profile">
      <img src="{{ asset('assets-admin/images/kantinku.png') }}" alt="Administrator" class="sidebar-profile-img"
        onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
      <div class="sidebar-profile-info">
        <div class="sidebar-profile-name">Administrator</div>
        <div class="sidebar-profile-email">admin@email.com</div>
      </div>
    </div>
  </div>
  <!-- ==========================================
         END: Sidebar Component
         ========================================== -->

  <!-- ==========================================
         START: Main Content Area
         ========================================== -->
  <div class="main-wrapper">

    <!-- Top Navbar -->
    <header class="navbar-custom">
      <div class="navbar-left">
        <button class="sidebar-toggle-btn me-2" id="sidebar-toggle">
          <i class="bi bi-list"></i>
        </button>
      </div>
      <div class="navbar-actions ms-auto">
        <span class="navbar-profile-name fw-semibold">Administrator</span>
      </div>
    </header>

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1 class="page-title">Tambah Produk Baru</h1>
        <p class="page-subtitle">Isi form di bawah ini untuk menambahkan barang ke kantin.</p>
      </div>
    </div>

    <!-- Main Card Form -->
    <div class="card mb-4 col-md-8">
      <div class="card-body">
        
        <form action="{{ route('product.store') }}" method="POST">
  @csrf

          <!-- Nama Produk -->
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Produk</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama produk">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Harga -->
          <div class="mb-3">
            <label for="price" class="form-label fw-bold">Harga (Rp)</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Masukkan harga">
            @error('price')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Stok -->
          <div class="mb-3">
            <label for="stock" class="form-label fw-bold">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="Masukkan stok">
            @error('stock')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Kategori -->
          <div class="mb-3">
            <label for="category" class="form-label fw-bold">Kategori</label>
            <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
              <option value="">-- Pilih Kategori --</option>
              <option value="Makanan" {{ old('category') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
              <option value="Minuman" {{ old('category') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
              <option value="Snack" {{ old('category') == 'Snack' ? 'selected' : '' }}>Snack</option>
            </select>
            @error('category')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Tombol Aksi -->
          <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan Produk</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>