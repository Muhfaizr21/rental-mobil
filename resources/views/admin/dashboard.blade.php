@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid px-4">
    <!-- Hero Header with Navy Gradient -->
    <div class="position-relative mb-5 overflow-hidden rounded-4" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 3rem 2rem;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.3;"></div>
        <div class="position-relative d-flex justify-content-between align-items-center">
            <div>
                <h1 class="display-4 fw-bold text-white mb-2" style="text-shadow: 0 2px 10px rgba(0,0,0,0.2);">Dashboard Command Center</h1>
                <p class="text-white-50 mb-0 fs-5">Kelola bisnis rental Anda dengan mudah</p>
            </div>
            <div class="text-white text-end">
                <div class="fs-6 opacity-75">{{ date('l') }}</div>
                <div class="fs-3 fw-bold">{{ date('d M Y') }}</div>
                <div class="fs-6 opacity-75" id="liveTime"></div>
            </div>
        </div>
    </div>

    <!-- Animated Stats Grid -->
    <div class="row g-4 mb-5">
        <!-- Total Mobil Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-lg h-100 stat-card" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); overflow: hidden;">
                <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon">
                            <i class="fas fa-car fa-3x text-white opacity-75"></i>
                        </div>
                        <div class="badge bg-white text-primary px-3 py-2">Total</div>
                    </div>
                    <h2 class="display-3 fw-bold text-white mb-2 counter" data-target="{{ \App\Models\Car::count() }}">0</h2>
                    <p class="text-white-50 mb-0 text-uppercase fw-semibold" style="letter-spacing: 1px;">Total Mobil</p>
                </div>
                <div class="card-footer bg-transparent border-0 p-3">
                    <small class="text-white"><i class="fas fa-info-circle me-1"></i>Unit terdaftar dalam sistem</small>
                </div>
            </div>
        </div>

        <!-- Mobil Tersedia Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-lg h-100 stat-card" style="background: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%); overflow: hidden;">
                <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle fa-3x text-white opacity-75"></i>
                        </div>
                        <div class="badge bg-white text-danger px-3 py-2">Ready</div>
                    </div>
                    <h2 class="display-3 fw-bold text-white mb-2 counter" data-target="{{ \App\Models\Car::where('status', 'available')->count() }}">0</h2>
                    <p class="text-white-50 mb-0 text-uppercase fw-semibold" style="letter-spacing: 1px;">Mobil Tersedia</p>
                </div>
                <div class="card-footer bg-transparent border-0 p-3">
                    <small class="text-white"><i class="fas fa-check me-1"></i>Siap disewakan sekarang</small>
                </div>
            </div>
        </div>

        <!-- Booking Pending Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-lg h-100 stat-card" style="background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%); overflow: hidden;">
                <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon">
                            <i class="fas fa-clock fa-3x text-white opacity-75"></i>
                        </div>
                        <div class="badge bg-white text-warning px-3 py-2 pulse">Pending</div>
                    </div>
                    <h2 class="display-3 fw-bold text-white mb-2 counter" data-target="{{ \App\Models\Booking::where('status', 'pending')->count() }}">0</h2>
                    <p class="text-white-50 mb-0 text-uppercase fw-semibold" style="letter-spacing: 1px;">Booking Pending</p>
                </div>
                <div class="card-footer bg-transparent border-0 p-3">
                    <small class="text-white"><i class="fas fa-exclamation-circle me-1"></i>Perlu segera dikonfirmasi</small>
                </div>
            </div>
        </div>

        <!-- Total Booking Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-lg h-100 stat-card" style="background: linear-gradient(135deg, #4a6491 0%, #2a5298 100%); overflow: hidden;">
                <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon">
                            <i class="fas fa-clipboard-list fa-3x text-white opacity-75"></i>
                        </div>
                        <div class="badge bg-white text-info px-3 py-2">All Time</div>
                    </div>
                    <h2 class="display-3 fw-bold text-white mb-2 counter" data-target="{{ \App\Models\Booking::count() }}">0</h2>
                    <p class="text-white-50 mb-0 text-uppercase fw-semibold" style="letter-spacing: 1px;">Total Booking</p>
                </div>
                <div class="card-footer bg-transparent border-0 p-3">
                    <small class="text-white"><i class="fas fa-chart-line me-1"></i>Semua transaksi</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Grid -->
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-header border-0 py-4" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);">
                    <h4 class="mb-0 text-white fw-bold">
                        <i class="fas fa-rocket me-2"></i>Quick Actions
                    </h4>
                </div>
                <div class="card-body p-5" style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('admin.cars.index') }}" class="action-card">
                                <div class="action-inner">
                                    <div class="icon-wrapper mb-3" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
                                        <i class="fas fa-car fa-2x"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Kelola Mobil</h5>
                                    <p class="text-muted small mb-0">Lihat & edit data mobil</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('admin.cars.create') }}" class="action-card">
                                <div class="action-inner">
                                    <div class="icon-wrapper mb-3" style="background: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%);">
                                        <i class="fas fa-plus-circle fa-2x"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Tambah Mobil</h5>
                                    <p class="text-muted small mb-0">Daftarkan mobil baru</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('admin.bookings.index') }}" class="action-card">
                                <div class="action-inner">
                                    <div class="icon-wrapper mb-3" style="background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);">
                                        <i class="fas fa-calendar-check fa-2x"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Kelola Booking</h5>
                                    <p class="text-muted small mb-0">Atur reservasi pelanggan</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('admin.reports.index') }}" class="action-card">
                                <div class="action-inner">
                                    <div class="icon-wrapper mb-3" style="background: linear-gradient(135deg, #4a6491 0%, #2a5298 100%);">
                                        <i class="fas fa-chart-line fa-2x"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Lihat Laporan</h5>
                                    <p class="text-muted small mb-0">Analisis & statistik</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Charts Section -->
    <div class="row g-4 mt-4">
        <!-- Recent Bookings -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg h-100">
                <div class="card-header border-0 py-4" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);">
                    <h4 class="mb-0 text-white fw-bold">
                        <i class="fas fa-history me-2"></i>Recent Bookings
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Mobil</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Booking::latest()->take(5)->get() as $booking)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <span class="text-white fw-bold">{{ substr($booking->customer_name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <div class="fw-semibold">{{ $booking->customer_name }}</div>
                                                <small class="text-muted">{{ $booking->customer_phone }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $car = \App\Models\Car::find($booking->car_id);
                                        @endphp
                                        @if($car)
                                        <div class="fw-semibold">{{ $car->brand }} {{ $car->model }}</div>
                                        <small class="text-muted">{{ $car->plate_number }}</small>
                                        @else
                                        <span class="text-muted">Mobil tidak ditemukan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }}</div>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M') }}</small>
                                    </td>
                                    <td>
                                        @if($booking->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                        @elseif($booking->status == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                        @else
                                        <span class="badge bg-info">{{ ucfirst($booking->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Car Status Overview -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg h-100">
                <div class="card-header border-0 py-4" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);">
                    <h4 class="mb-0 text-white fw-bold">
                        <i class="fas fa-chart-pie me-2"></i>Car Status Overview
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <canvas id="carStatusChart" width="200" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            @php
                                $available = \App\Models\Car::where('status', 'available')->count();
                                $rented = \App\Models\Car::where('status', 'rented')->count();
                                $maintenance = \App\Models\Car::where('status', 'maintenance')->count();
                                $total = $available + $rented + $maintenance;
                            @endphp
                            <div class="status-list">
                                <div class="status-item d-flex align-items-center mb-3">
                                    <div class="status-indicator bg-success me-3"></div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Available</div>
                                        <div class="text-muted small">{{ $available }} mobil</div>
                                    </div>
                                    <div class="fw-bold text-success">{{ $total > 0 ? round(($available/$total)*100) : 0 }}%</div>
                                </div>
                                <div class="status-item d-flex align-items-center mb-3">
                                    <div class="status-indicator bg-warning me-3"></div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Rented</div>
                                        <div class="text-muted small">{{ $rented }} mobil</div>
                                    </div>
                                    <div class="fw-bold text-warning">{{ $total > 0 ? round(($rented/$total)*100) : 0 }}%</div>
                                </div>
                                <div class="status-item d-flex align-items-center">
                                    <div class="status-indicator bg-danger me-3"></div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Maintenance</div>
                                        <div class="text-muted small">{{ $maintenance }} mobil</div>
                                    </div>
                                    <div class="fw-bold text-danger">{{ $total > 0 ? round(($maintenance/$total)*100) : 0 }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.stat-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transform-style: preserve-3d;
}

.stat-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3) !important;
}

.stat-icon {
    animation: float 3s ease-in-out infinite;
}

.pulse {
    animation: pulse 2s ease-in-out infinite;
}

.action-card {
    display: block;
    text-decoration: none;
    color: inherit;
    position: relative;
    overflow: hidden;
}

.action-inner {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    position: relative;
    z-index: 1;
}

.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 0;
    border-radius: 20px;
}

.action-card:hover::before {
    opacity: 0.1;
}

.action-card:hover .action-inner {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.icon-wrapper {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: white;
    transition: all 0.3s ease;
}

.action-card:hover .icon-wrapper {
    transform: rotate(10deg) scale(1.1);
}

.counter {
    transition: all 0.3s ease;
}

.rounded-4 {
    border-radius: 1.5rem !important;
}

.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 14px;
}

.status-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.status-item {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.status-item:last-child {
    border-bottom: none;
}

.table > :not(caption) > * > * {
    padding: 1rem 0.5rem;
}

.bg-primary {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };

        setTimeout(() => updateCounter(), 100);
    });

    // Live Time
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        const timeElement = document.getElementById('liveTime');
        if (timeElement) {
            timeElement.textContent = timeString;
        }
    }
    updateTime();
    setInterval(updateTime, 1000);

    // Car Status Chart
    const ctx = document.getElementById('carStatusChart').getContext('2d');
    const available = {{ \App\Models\Car::where('status', 'available')->count() }};
    const rented = {{ \App\Models\Car::where('status', 'rented')->count() }};
    const maintenance = {{ \App\Models\Car::where('status', 'maintenance')->count() }};

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Available', 'Rented', 'Maintenance'],
            datasets: [{
                data: [available, rented, maintenance],
                backgroundColor: [
                    '#28a745',
                    '#ffc107',
                    '#dc3545'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            cutout: '70%'
        }
    });
});
</script>
@endsection
