<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Customer - KANTINKU</title>

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
</head>

<body>

  <!-- ==========================================
         START: Sidebar Component
         ========================================== -->
  <div class="sidebar-wrapper" id="sidebar">
    <!-- Brand Logo / Identity -->
    <a href="/Admin" class="sidebar-brand">
      <span>KANTINKU</span>
    </a>

    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">
      <!-- Group: Menu -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">MENU</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="/Admin" class="sidebar-menu-link" id="menu-overview" title="Overview">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('product.index') }}" class="sidebar-menu-link" title="Data Produk">
              <i class="bi bi-box-seam-fill"></i>
              <span>Data Produk</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('customer.profile') }}" class="sidebar-menu-link active" title="Data Customer">
              <i class="bi bi-person-fill"></i>
              <span>Data Customer</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Group: Components -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">COMPONENTS</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link" id="menu-basictables" title="Basic Tables">
              <i class="bi bi-table"></i>
              <span>Basic Tables</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link" id="menu-uiforms" title="Forms and Input">
              <i class="bi bi-input-cursor-text"></i>
              <span>Forms & Input</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link" id="menu-uibuttons" title="Buttons">
              <i class="bi bi-menu-button-wide-fill"></i>
              <span>Buttons & Alerts</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Group: Pages -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">PAGES</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link" id="menu-blankpage" title="Blank Page">
              <i class="bi bi-file-earmark"></i>
              <span>Blank Page</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link" id="menu-loginpage" title="Login Page">
              <i class="bi bi-box-arrow-in-right"></i>
              <span>Login Screen</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="#" class="sidebar-menu-link" id="menu-404" title="404 Page">
              <i class="bi bi-slash-circle"></i>
              <span>Error 404</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Sidebar Profile Card -->
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

    <!-- START: Top Navbar Component -->
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
          <button class="btn-quick-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
            id="quick-actions-dropdown">
            <i class="bi bi-plus-lg"></i>
            <span>Create</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-quick-action" aria-labelledby="quick-actions-dropdown">
            <li class="dropdown-header">Quick Action Shortcuts</li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-plus"></i> New Invoice</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus"></i> New User</a></li>
            <li><a class="dropdown-item" href="{{ route('product.create') }}"><i class="bi bi-box-seam"></i> New Product</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> System Settings</a></li>
          </ul>
        </div>
      </div>

      <div class="navbar-search-wrapper">
        <input type="text" class="navbar-search-input" placeholder="Search anything in Kantinku..." id="main-search">
        <button class="navbar-search-btn" aria-label="Search">
          <i class="bi bi-search"></i>
        </button>
      </div>

      <div class="navbar-actions">
        <button class="navbar-action-btn me-1" aria-label="Toggle Fullscreen" id="btn-fullscreen">
          <i class="bi bi-arrows-fullscreen"></i>
        </button>

        <div class="dropdown">
          <button class="navbar-action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="btn-notifications" data-bs-auto-close="outside">
            <i class="bi bi-bell"></i>
            <span class="navbar-action-badge"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-notification p-0"
            aria-labelledby="btn-notifications">
            <div class="notification-header">
              <h6 class="notification-title">Notifications</h6>
              <button class="btn-clear-all" type="button" id="btn-mark-read">Mark all read</button>
            </div>
            <div class="notification-list">
              <a href="#" class="notification-item">
                <div class="notification-icon bg-success text-white">
                  <i class="bi bi-wallet2"></i>
                </div>
                <div class="notification-content">
                  <p class="notification-text">New sale received: <strong>Rp 150.000</strong></p>
                  <span class="notification-time">2 mins ago</span>
                </div>
                <span class="notification-unread-dot"></span>
              </a>
              <a href="#" class="notification-item">
                <div class="notification-icon bg-primary text-white">
                  <i class="bi bi-person-plus-fill"></i>
                </div>
                <div class="notification-content">
                  <p class="notification-text">New user registered: <strong>John Doe</strong></p>
                  <span class="notification-time">1 hour ago</span>
                </div>
                <span class="notification-unread-dot"></span>
              </a>
              <a href="#" class="notification-item">
                <div class="notification-icon bg-warning text-dark">
                  <i class="bi bi-box-seam-fill"></i>
                </div>
                <div class="notification-content">
                  <p class="notification-text">Stock running low: <strong>Es Teh</strong></p>
                  <span class="notification-time">3 hours ago</span>
                </div>
              </a>
            </div>
            <a href="#" class="notification-footer">View All Notifications</a>
          </div>
        </div>

        <div class="dropdown ms-2">
          <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" id="profile-dropdown">
            <img src="{{ asset('assets-admin/images/kantinku.png') }}" alt="Profile Image" class="navbar-profile-img"
              onerror="this.src='https://via.placeholder.com/40'">
            <span class="navbar-profile-name d-none d-md-inline">Administrator</span>
            <i class="bi bi-chevron-down navbar-profile-caret"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
            <li class="dropdown-header">Welcome !</li>
            <li><a class="dropdown-item" href="{{ route('customer.profile') }}"><i class="bi bi-person"></i> My Account</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-lock"></i> Lock Screen</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </header>
    <!-- END: Top Navbar Component -->

    <!-- START: Page Header -->
    <div class="page-header">
      <div>
        <h1 class="page-title">Profil Customer</h1>
        <p class="page-subtitle">Kelola data diri customer kantin kamu.</p>
      </div>
    </div>
    <!-- END: Page Header -->

    <!-- START: Form Content -->
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-success text-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-person-gear me-2"></i>Edit Profil Customer</h5>
      </div>
      <div class="card-body p-4">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger border-0 shadow-sm">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('customer.profile.update') }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Nama Lengkap</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Email (Readonly)</label>
              <input type="email" class="form-control bg-light" value="{{ $user->email ?? '' }}" readonly>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Nomor Telepon / WA</label>
              <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $customer->phone_number ?? '') }}" placeholder="Contoh: 08123456789">
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold">Jenis Kelamin</label>
              <select name="gender" class="form-select">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('gender', $customer->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender', $customer->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Tanggal Lahir</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $customer->date_of_birth ?? '') }}">
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Alamat Lengkap</label>
            <textarea name="address" class="form-control" rows="3" placeholder="Masukkan alamat lengkap">{{ old('address', $customer->address ?? '') }}</textarea>
          </div>

          <div class="d-flex gap-2 pt-2">
            <button type="submit" class="btn btn-success px-4 fw-bold"><i class="bi bi-check-circle me-1"></i> Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
    <!-- END: Form Content -->

    <!-- START: Footer Component -->
    <footer class="footer-custom mt-4">
      <div class="footer-left">
        <span class="footer-logo"><i class="bi bi-asterisk"></i> KANTINKU</span>
        <span class="footer-separator">|</span>
        <span class="footer-copy">© 2026 KANTINKU • Modul Customer</span>
      </div>
      <div class="footer-right">
        <ul class="footer-links">
          <li><a href="/Admin" class="footer-link">Overview</a></li>
          <li><a href="#" class="footer-link">Statistics</a></li>
          <li><a href="#" class="footer-link">Help & Documentation</a></li>
          <li><a href="#" class="footer-link">Status <span class="status-dot"></span></a></li>
        </ul>
      </div>
    </footer>
    <!-- END: Footer Component -->

  </div>
  <!-- ==========================================
         END: Main Content Area
         ========================================== -->

  <!-- Script Dependencies via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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

      // Mark all notifications as read
      const readBtn = document.getElementById('btn-mark-read');
      if (readBtn) readBtn.addEventListener('click', () => {
        document.querySelectorAll('.notification-unread-dot, .navbar-action-badge').forEach(el => el.remove());
      });
    });
  </script>
</body>

</html>