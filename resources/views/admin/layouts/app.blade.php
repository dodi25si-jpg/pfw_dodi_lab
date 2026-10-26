<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin') - KANTINKU</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/images/favicon.ico') }}">

  <!-- Local Third-Party Libraries -->
  <link rel="stylesheet" href="{{ asset('assets-admin/libs/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/libs/bootstrap-icons/bootstrap-icons.css') }}">

  <!-- Main Design System & Custom Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/main.css') }}">

  <!-- Fallback toggle sidebar (mobile & minimize desktop) -->
  <style>
    @media (max-width: 1199.98px) {
      .sidebar-wrapper { transition: transform .3s ease; }
      .sidebar-wrapper.show { transform: translateX(0) !important; }
    }
    @media (min-width: 1200px) {
      .sidebar-wrapper { transition: transform .3s ease; }
      .main-wrapper { transition: margin-left .3s ease; }
      body.sidebar-collapsed .sidebar-wrapper { transform: translateX(-100%); }
      body.sidebar-collapsed .main-wrapper { margin-left: 0 !important; }
    }
  </style>
  @stack('styles')
</head>

<body>

  <!-- ================= START: Sidebar ================= -->
  <div class="sidebar-wrapper" id="sidebar">
    <a href="/Admin" class="sidebar-brand">
      <span>KANTINKU</span>
    </a>

    <div class="flex-grow-1 overflow-y-auto">
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">MENU</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="/Admin" class="sidebar-menu-link" title="Dashboard">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('product.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('product.*') ? 'active' : '' }}" title="Data Produk">
              <i class="bi bi-box-seam-fill"></i>
              <span>Data Produk</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('category.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('category.*') ? 'active' : '' }}" title="Data Kategori">
              <i class="bi bi-tags-fill"></i>
              <span>Data Kategori</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('customer.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('customer.*') ? 'active' : '' }}" title="Data Customer">
              <i class="bi bi-person-fill"></i>
              <span>Data Customer</span>
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
  <!-- ================= END: Sidebar ================= -->


  <!-- ================= START: Main Content ================= -->
  <div class="main-wrapper">

    <!-- Top Navbar -->
    <header class="navbar-custom">
      <div class="navbar-left">
        <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
          id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">
          <i class="bi bi-chevron-bar-left"></i>
        </button>
        <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation">
          <i class="bi bi-list"></i>
        </button>

        <div class="dropdown ms-2">
          <button class="btn-quick-action dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="quick-actions-dropdown">
            <i class="bi bi-plus-lg"></i>
            <span>Create</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-quick-action" aria-labelledby="quick-actions-dropdown">
            <li class="dropdown-header">Quick Action Shortcuts</li>
            <li><a class="dropdown-item" href="{{ route('product.create') }}"><i class="bi bi-box-seam"></i> New Product</a></li>
            <li><a class="dropdown-item" href="{{ route('category.create') }}"><i class="bi bi-tag"></i> New Category</a></li>
            <li><a class="dropdown-item" href="{{ route('customer.create') }}"><i class="bi bi-person-plus"></i> New Customer</a></li>
          </ul>
        </div>
      </div>

      <div class="navbar-search-wrapper">
        <input type="text" class="navbar-search-input" placeholder="Cari data di tabel..." id="main-search">
        <button class="navbar-search-btn" aria-label="Search" type="button">
          <i class="bi bi-search"></i>
        </button>
      </div>

      <div class="navbar-actions">
        <button class="navbar-action-btn me-1" aria-label="Toggle Fullscreen" id="btn-fullscreen" type="button">
          <i class="bi bi-arrows-fullscreen"></i>
        </button>

        <div class="dropdown ms-2">
          <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="profile-dropdown">
            <img src="{{ asset('assets-admin/images/kantinku.png') }}" alt="Profile Image" class="navbar-profile-img">
            <span class="navbar-profile-name d-none d-md-inline">Administrator</span>
            <i class="bi bi-chevron-down navbar-profile-caret"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
            <li class="dropdown-header">Welcome !</li>
            <li><a class="dropdown-item" href="/Admin"><i class="bi bi-grid"></i> Dashboard</a></li>
          </ul>
        </div>
      </div>
    </header>

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1 class="page-title">@yield('page-title')</h1>
        <p class="page-subtitle">@yield('page-subtitle')</p>
      </div>
      @yield('page-action')
    </div>

    <!-- Flash Data -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @yield('content')

    <!-- Footer -->
    <footer class="footer-custom mt-4">
      <div class="footer-left">
        <span class="footer-logo"><i class="bi bi-asterisk"></i> KANTINKU</span>
        <span class="footer-separator">|</span>
        <span class="footer-copy">© 2026 KANTINKU</span>
      </div>
      <div class="footer-right">
        <ul class="footer-links">
          <li><a href="/Admin" class="footer-link">Overview</a></li>
        </ul>
      </div>
    </footer>

  </div>
  <!-- ================= END: Main Content ================= -->

  <script src="{{ asset('assets-admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const sidebar = document.getElementById('sidebar');

      // Toggle sidebar (mobile)
      const mobileBtn = document.getElementById('sidebar-toggle');
      if (mobileBtn) mobileBtn.addEventListener('click', () => sidebar.classList.toggle('show'));

      // Minimize sidebar (desktop)
      const desktopBtn = document.getElementById('desktop-sidebar-toggle');
      if (desktopBtn) desktopBtn.addEventListener('click', () => {
        const collapsed = document.body.classList.toggle('sidebar-collapsed');
        const icon = desktopBtn.querySelector('i');
        if (icon) icon.className = collapsed ? 'bi bi-chevron-bar-right' : 'bi bi-chevron-bar-left';
      });

      // Fullscreen
      const fsBtn = document.getElementById('btn-fullscreen');
      if (fsBtn) fsBtn.addEventListener('click', () => {
        if (!document.fullscreenElement) document.documentElement.requestFullscreen();
        else document.exitFullscreen();
      });

      // Live search pada tabel (baris dengan class .data-row)
      const search = document.getElementById('main-search');
      const rows = document.querySelectorAll('#data-table .data-row');
      const noResult = document.getElementById('no-result-row');
      if (search && rows.length) {
        search.addEventListener('input', function () {
          const q = this.value.toLowerCase().trim();
          let visible = 0;
          rows.forEach(row => {
            const show = row.textContent.toLowerCase().includes(q);
            row.classList.toggle('d-none', !show);
            if (show) visible++;
          });
          if (noResult) noResult.classList.toggle('d-none', visible !== 0);
        });
      }
    });
  </script>
  @stack('scripts')
</body>

</html>
