<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome To Kantinku</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/images/favicon.ico') }}">

  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Custom External CSS -->
  <link rel="stylesheet" href="{{ asset('assets-guest/css/main.css') }}">
</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-guest sticky-top">
    <div class="container">
      <a class="brand-logo" href="#">
        <img src="{{ asset('assets-admin/images/kantinku.png') }}" alt="Kantinku Logo" onerror="this.src='https://cdn-icons-png.flaticon.com/512/562/562678.png'">
        <span>Kantinku</span>
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link nav-link-custom active" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#fitur">Layanan Fitur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#tentang">Tentang Portal</a>
          </li>
        </ul>

        <div class="d-flex align-items-center gap-2">
          <a href="/Admin" class="btn btn-pill-outline">Masuk</a>
          <a href="/Admin" class="btn btn-pill-primary">Daftar Akun</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-7">
          <span class="hero-badge">
            <i class="bi bi-stars"></i> Selamat Datang di kantinku
          </span>
          <h1 class="hero-title">Selamat Menikmati Makanan Lezat</h1>
          <p class="hero-desc">
            Platform terintegrasi untuk membantu mengelola data, memantau analitik secara terpusat, dan mempercepat pekerjaan tim kamu secara modern.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="/Admin" class="btn btn-pill-primary px-4 py-3">
              Mulai Sekarang <i class="bi bi-arrow-right ms-1"></i>
            </a>
            <a href="#fitur" class="btn btn-pill-outline px-4 py-3">Pelajari Fitur</a>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="hero-img-card">
            <img src="{{ asset('assets-admin/images/kantinku.png') }}" alt="Kantinku Preview" onerror="this.src='https://cdn-icons-png.flaticon.com/512/562/562678.png'">
            <h5 class="fw-bold text-dark mb-1">Kantinku</h5>
            <p class="text-muted small mb-0">Sistem Manajemen Terintegrasi & Real-time</p>
          </div>
        </div>
      </div>

      <!-- Quick Stats Bar -->
      <div class="stats-container">
        <div class="row text-center g-4">
          <div class="col-md-4 border-end-md">
            <div class="stat-item-number">99.9%</div>
            <p class="stat-item-label">Sistem Uptime & Respon Cepat</p>
          </div>
          <div class="col-md-4 border-end-md">
            <div class="stat-item-number">10k+</div>
            <p class="stat-item-label">Transaksi Terproses Per Bulan</p>
          </div>
          <div class="col-md-4">
            <div class="stat-item-number">4.9 / 5.0</div>
            <p class="stat-item-label">Tingkat Kepuasan Pengguna</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features-section" id="fitur">
    <div class="container">
      <div class="text-center section-header">
        <h2 class="section-title">Layanan & Fitur Unggulan</h2>
        <p class="section-subtitle">Temukan berbagai kemudahan pengolahan data yang kami sediakan untuk kamu</p>
      </div>

      <div class="row g-4">
        <!-- Feature 1 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon-box icon-blue">
              <i class="bi bi-speedometer2"></i>
            </div>
            <h3 class="feature-card-title">Dashboard Analitik</h3>
            <p class="feature-card-desc">
              Pantau perkembangan statistik dan grafik transaksi secara real-time melalui visualisasi yang interaktif.
            </p>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon-box icon-green">
              <i class="bi bi-shield-check"></i>
            </div>
            <h3 class="feature-card-title">Keamanan Terjamin</h3>
            <p class="feature-card-desc">
              Sistem perlindungan enkripsi data yang kuat untuk menjamin seluruh informasi pengguna tetap aman.
            </p>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon-box icon-orange">
              <i class="bi bi-phone"></i>
            </div>
            <h3 class="feature-card-title">Desain Responsif</h3>
            <p class="feature-card-desc">
              Dapat diakses dengan lancar dan nyaman melalui perangkat smartphone, tablet, maupun desktop PC.
            </p>
          </div>
        </div>
      </div>

      <!-- CTA Card Banner -->
      <div class="cta-banner mt-5 text-center" id="tentang">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h3 class="fw-bold mb-3">Siap Tingkatkan Efisiensi Kerja Kamu?</h3>
            <p class="opacity-75 mb-4">Masuk ke Portal Administrator sekarang untuk mengelola data dan memantau performa bisnis secara menyeluruh.</p>
            <a href="/Admin" class="btn btn-pill-primary px-5 py-3">Masuk Portal Admin</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer-guest">
    <div class="container text-center text-md-between d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
      <div class="text-muted small">
        © 2026 <strong>Kantinku Platform</strong>. Hak Cipta Dilindungi.
      </div>
      <div class="d-flex gap-4 small">
        <a href="#" class="text-decoration-none text-muted">Syarat & Ketentuan</a>
        <a href="#" class="text-decoration-none text-muted">Kebijakan Privasi</a>
        <a href="/Admin" class="text-decoration-none text-primary fw-semibold">Login Staf</a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>