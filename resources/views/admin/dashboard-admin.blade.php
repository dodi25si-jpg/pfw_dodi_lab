@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'An easy way to manage sales with care and precision.')

@section('page-action')
      <button class="btn-date-picker" type="button" id="date-picker-trigger">
        <i class="bi bi-calendar4-event"></i>
        <span id="selected-date-range">January 12, 2026 - January 23, 2026</span>
        <i class="bi bi-chevron-down ms-1"></i>
      </button>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets-admin/libs/apexcharts/apexcharts.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/libs/flatpickr/flatpickr.min.css') }}">
@endpush

@section('content')
    <!-- START: Top Stats Cards Row -->
    <div class="row g-4 mb-4">
      <!-- Stat Card 1: Green Alert Banner -->
      <div class="col-xl-4 col-md-4">
        <div class="card alert-green-card h-100 mb-0">
          <div class="position-relative z-index-2">
            <span class="alert-green-badge">Update</span>
            <div class="alert-green-date">Feb 14th 2026</div>
            <div class="alert-green-text">Sales revenue increased 40% in 1 week</div>
          </div>
          <a href="#" class="alert-green-link z-index-2" id="alert-link-statistics">
            <span>See Statistics</span>
            <i class="bi bi-arrow-right"></i>
          </a>

          <svg class="alert-green-bg-shape" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(50,50)">
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" />
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(60)" />
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(120)" />
            </g>
          </svg>
        </div>
      </div>

      <!-- Stat Card 2: Net Income -->
      <div class="col-xl-4 col-md-4">
        <div class="card card-stat d-flex flex-column justify-content-between h-100 mb-0">
          <div>
            <div class="card-header">
              <span class="stat-label">Net Income</span>
              <div class="dropdown">
                <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                  aria-label="More Options" id="btn-more-income">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-repeat"></i> Refresh</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Export Report</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-eye-slash"></i> Hide Details</a></li>
                </ul>
              </div>
            </div>
            <div class="stat-value">$196.000</div>
            <div class="trend-badge trend-up">
              <i class="bi bi-arrow-up-right"></i>
              <span>+35% from last month</span>
            </div>
          </div>
          <div class="sparkline-container sparkline-card-footer">
            <div id="income-sparkline"></div>
          </div>
        </div>
      </div>

      <!-- Stat Card 3: Total Return -->
      <div class="col-xl-4 col-md-4">
        <div class="card card-stat d-flex flex-column justify-content-between h-100 mb-0">
          <div>
            <div class="card-header">
              <span class="stat-label">Total Return</span>
              <div class="dropdown">
                <button class="card-more-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                  aria-label="More Options" id="btn-more-return">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-repeat"></i> Refresh</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-arrow-down"></i> Export Report</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-eye-slash"></i> Hide Details</a></li>
                </ul>
              </div>
            </div>
            <div class="stat-value">$32.000</div>
            <div class="trend-badge trend-down">
              <i class="bi bi-arrow-down-left"></i>
              <span>-24% from last month</span>
            </div>
          </div>
          <div class="sparkline-container sparkline-card-footer">
            <div id="return-sparkline"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Top Stats Cards Row -->

    <!-- START: Middle Area (Revenue Chart & Total View Performance) -->
    <div class="row g-4 mb-4">
      <div class="col-xl-9 col-lg-8">
        <div class="card h-100 mb-0">
          <div class="card-header mb-2">
            <h2 class="card-title">Revenue</h2>
            <div class="d-flex gap-3 align-items-center">
              <div class="chart-legend-item">
                <span class="legend-dot bg-forest-medium"></span>
                <span class="chart-legend-label">Income</span>
              </div>
              <div class="chart-legend-item">
                <span class="legend-dot bg-lime-accent"></span>
                <span class="chart-legend-label">Expenses</span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-baseline gap-2 mb-3">
            <span class="stat-value-amount">$196.000</span>
            <span class="trend-badge trend-up fs-xs">+35% from last month</span>
          </div>
          <div id="revenue-chart"></div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4">
        <div class="card h-100 d-flex flex-column justify-content-between mb-0">
          <div class="card-header mb-1">
            <h2 class="card-title">Total View Performance</h2>
          </div>
          <div id="views-chart"></div>
          <div class="chart-legends-container">
            <div class="chart-legend-item">
              <span class="legend-dot bg-lime-accent"></span>
              <span class="text-muted-green">View Count</span>
            </div>
            <div class="chart-legend-item">
              <span class="legend-dot bg-forest-medium"></span>
              <span class="text-muted-green">Percentage</span>
            </div>
            <div class="chart-legend-item">
              <span class="legend-dot bg-brand-orange"></span>
              <span class="text-muted-green">Sales</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Middle Area -->

    <!-- START: Bottom Cards Row (Transaction, Product Overview, Promo Banner) -->
    <div class="row g-4">
      <!-- 1. Transaction Card -->
      <div class="col-xl-4 col-lg-6">
        <div class="card h-100 mb-0">
          <div class="card-header mb-3">
            <h2 class="card-title">Transaction</h2>
            <button class="card-more-btn" type="button" aria-label="More Options">
              <i class="bi bi-three-dots"></i>
            </button>
          </div>
          <div class="transaction-list">
            <div class="transaction-item">
              <div class="transaction-icon bg-forest-medium text-white">
                <i class="bi bi-spotify"></i>
              </div>
              <div class="transaction-info">
                <div class="transaction-name text-truncate">Spotify Subscription</div>
                <div class="transaction-date">Feb 14, 2026 • 12:40 PM</div>
              </div>
              <div class="transaction-amount text-dark ms-auto">-$15.00</div>
            </div>

            <div class="transaction-item">
              <div class="transaction-icon bg-forest-medium text-white">
                <i class="bi bi-paypal"></i>
              </div>
              <div class="transaction-info">
                <div class="transaction-name text-truncate">Paypal Transfer</div>
                <div class="transaction-date">Feb 13, 2026 • 08:15 AM</div>
              </div>
              <div class="transaction-amount trend-up ms-auto">+$1,250.00</div>
            </div>

            <div class="transaction-item">
              <div class="transaction-icon bg-forest-medium text-white">
                <i class="bi bi-stripe"></i>
              </div>
              <div class="transaction-info">
                <div class="transaction-name text-truncate">Stripe Payout</div>
                <div class="transaction-date">Feb 11, 2026 • 04:30 PM</div>
              </div>
              <div class="transaction-amount trend-up ms-auto">+$3,400.00</div>
            </div>

            <div class="transaction-item">
              <div class="transaction-icon bg-forest-medium text-white">
                <i class="bi bi-slack"></i>
              </div>
              <div class="transaction-info">
                <div class="transaction-name text-truncate">Slack Pro Workspace</div>
                <div class="transaction-date">Feb 09, 2026 • 09:20 AM</div>
              </div>
              <div class="transaction-amount text-dark ms-auto">-$45.00</div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Product Overview Card -->
      <div class="col-xl-5 col-lg-6">
        <div class="card h-100 mb-0">
          <div class="card-header mb-3">
            <h2 class="card-title">Product Overview</h2>
            <button class="card-more-btn" type="button" aria-label="More Options">
              <i class="bi bi-three-dots"></i>
            </button>
          </div>

          <div class="progress-container">
            <div class="progress-label-row">
              <span class="progress-label">Product Launched</span>
              <span class="progress-value">233</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-lime-accent w-65" role="progressbar"></div>
            </div>
          </div>

          <div class="progress-container">
            <div class="progress-label-row">
              <span class="progress-label">Ongoing Product</span>
              <span class="progress-value">23</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-lime-accent w-38" role="progressbar"></div>
            </div>
          </div>

          <div class="progress-container">
            <div class="progress-label-row">
              <span class="progress-label">Product Sold</span>
              <span class="progress-value">482</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-lime-accent w-85" role="progressbar"></div>
            </div>
          </div>

          <div class="progress-container">
            <div class="progress-label-row">
              <span class="progress-label">Product Returned</span>
              <span class="progress-value">8</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-brand-orange w-38" role="progressbar"></div>
            </div>
          </div>

          <div class="progress-container">
            <div class="progress-label-row">
              <span class="progress-label">Product In Stock</span>
              <span class="progress-value">1,420</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-lime-accent w-75" role="progressbar"></div>
            </div>
          </div>

          <div class="progress-container mb-0">
            <div class="progress-label-row">
              <span class="progress-label">Pending Shipment</span>
              <span class="progress-value">64</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-lime-accent w-45" role="progressbar"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- 3. Promo Banner Card -->
      <div class="col-xl-3 col-lg-12">
        <div class="promo-banner-card h-100 mb-0">
          <h3 class="promo-title">Level up your sales managing to the next level.</h3>
          <p class="promo-desc">An easy way to manage sales with care and precision.</p>
          <button class="btn-promo" type="button">Check the updates now</button>

          <svg class="promo-banner-bg-shape" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(50,50)">
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" />
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(60)" />
              <rect x="-6" y="-45" width="12" height="90" rx="6" ry="6" fill="#B4F105" transform="rotate(120)" />
            </g>
          </svg>
        </div>
      </div>
    </div>
    <!-- END: Bottom Cards Row -->
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      
      // 1. Sparkline Chart - Net Income (Garis Hijau)
      const incomeSparklineOptions = {
        series: [{ data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 98, 70, 85] }],
        chart: { type: 'area', height: 50, sparkline: { enabled: true } },
        stroke: { curve: 'smooth', width: 2 },
        colors: ['#22C55E'],
        fill: {
          type: 'gradient',
          gradient: { opacityFrom: 0.3, opacityTo: 0.0 }
        },
        tooltip: { enabled: false }
      };
      if (document.querySelector("#income-sparkline")) {
        new ApexCharts(document.querySelector("#income-sparkline"), incomeSparklineOptions).render();
      }

      // 2. Sparkline Chart - Total Return (Garis Merah)
      const returnSparklineOptions = {
        series: [{ data: [65, 59, 80, 81, 56, 55, 40, 35, 42, 30, 20, 15] }],
        chart: { type: 'area', height: 50, sparkline: { enabled: true } },
        stroke: { curve: 'smooth', width: 2 },
        colors: ['#EF4444'],
        fill: {
          type: 'gradient',
          gradient: { opacityFrom: 0.3, opacityTo: 0.0 }
        },
        tooltip: { enabled: false }
      };
      if (document.querySelector("#return-sparkline")) {
        new ApexCharts(document.querySelector("#return-sparkline"), returnSparklineOptions).render();
      }

      // 3. Bar Chart - Revenue (Batang Hijau Tua & Hijau Muda)
      const revenueChartOptions = {
        series: [
          { name: 'Income', data: [35, 45, 30, 50, 40, 60, 55, 70, 65, 80] },
          { name: 'Expenses', data: [15, 20, 10, 25, 20, 30, 20, 35, 30, 40] }
        ],
        chart: {
          type: 'bar',
          height: 280,
          toolbar: { show: false }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '40%',
            borderRadius: 4
          }
        },
        dataLabels: { enabled: false },
        colors: ['#0ba165', '#6b8f07'],
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
          axisBorder: { show: false },
          axisTicks: { show: false }
        },
        grid: {
          borderColor: '#E9EFEF',
          strokeDashArray: 4
        },
        legend: { show: false }
      };
      if (document.querySelector("#revenue-chart")) {
        new ApexCharts(document.querySelector("#revenue-chart"), revenueChartOptions).render();
      }

      // 4. Donut Chart - Total View Performance
      const viewsChartOptions = {
        series: [45, 35, 20],
        chart: {
          type: 'donut',
          height: 260
        },
        labels: ['View Count', 'Percentage', 'Sales'],
        colors: ['#B4F105', '#072F1F', '#F97316'],
        legend: { show: false },
        dataLabels: { enabled: false },
        plotOptions: {
          pie: {
            donut: {
              size: '75%',
              labels: {
                show: true,
                total: {
                  show: true,
                  label: 'Total Count',
                  formatter: () => '565K'
                }
              }
            }
          }
        }
      };
      if (document.querySelector("#views-chart")) {
        new ApexCharts(document.querySelector("#views-chart"), viewsChartOptions).render();
      }

    });
  </script>
@endpush
