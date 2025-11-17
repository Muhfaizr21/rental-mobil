@extends('layouts.admin')

@section('title', 'Laporan & Statistik')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title mb-2">
                            <i class="fas fa-chart-bar me-3"></i>Laporan & Statistik
                        </h1>
                        <p class="page-subtitle mb-0">Analisis data lengkap sistem rental mobil Anda</p>
                    </div>
                    <div class="header-actions">
                        <span class="last-update">
                            <i class="fas fa-sync-alt me-2"></i>
                            Update: {{ now()->format('d M Y H:i') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert-custom alert-success-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <div class="alert-icon">
                    <i class="fas fa-check-circle fa-2x"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="alert-heading mb-1">Berhasil!</h5>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-custom alert-danger-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <div class="alert-icon">
                    <i class="fas fa-exclamation-circle fa-2x"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="alert-heading mb-1">Error!</h5>
                    <p class="mb-0">{{ session('error') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-primary">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ number_format($stats['total_bookings']) }}</h3>
                    <p>Total Booking</p>
                    <div class="stat-trend">
                        <i class="fas fa-chart-line me-1"></i>
                        {{ $stats['booking_growth'] ?? 0 }}% dari bulan lalu
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-success">
                <div class="stat-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="stat-content">
                    <h3>Rp {{ number_format($stats['total_revenue'] / 1000000, 1) }}JT</h3>
                    <p>Total Pendapatan</p>
                    <div class="stat-trend">
                        <i class="fas fa-wallet me-1"></i>
                        Rp {{ number_format($stats['revenue_growth'] ?? 0, 0, ',', '.') }} vs bulan lalu
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-warning">
                <div class="stat-icon">
                    <i class="fas fa-car"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ number_format($stats['total_cars']) }}</h3>
                    <p>Total Mobil</p>
                    <div class="stat-trend">
                        <i class="fas fa-car-side me-1"></i>
                        {{ $stats['available_cars'] ?? 0 }} tersedia
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-info">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ number_format($stats['total_contacts']) }}</h3>
                    <p>Pesan Masuk</p>
                    <div class="stat-trend">
                        <i class="fas fa-comment me-1"></i>
                        {{ $stats['unread_contacts'] ?? 0 }} belum dibaca
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Section -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-file-pdf me-2"></i>Export Laporan PDF
                    </h5>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('admin.reports.generatePDF') }}" method="POST" class="export-form">
                        @csrf
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="fas fa-chart-pie me-2"></i>Jenis Laporan
                            </label>
                            <select name="type" class="form-select-custom" required>
                                <option value="">Pilih jenis laporan...</option>
                                <option value="bookings">Data Booking</option>
                                <option value="cars">Data Mobil</option>
                                <option value="revenue">Laporan Pendapatan</option>
                                <option value="contacts">Data Kontak</option>
                                <option value="full">Laporan Lengkap</option>
                            </select>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="fas fa-calendar me-2"></i>Periode
                            </label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="date" name="start_date" class="form-control-custom" placeholder="Dari Tanggal">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="end_date" class="form-control-custom" placeholder="Sampai Tanggal">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-export btn-pdf">
                            <i class="fas fa-file-pdf me-2"></i>Generate PDF
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-file-excel me-2"></i>Export Laporan Excel
                    </h5>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('admin.reports.exportExcel') }}" method="POST" class="export-form">
                        @csrf
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="fas fa-chart-bar me-2"></i>Jenis Laporan
                            </label>
                            <select name="type" class="form-select-custom" required>
                                <option value="">Pilih jenis laporan...</option>
                                <option value="bookings">Data Booking</option>
                                <option value="cars">Data Mobil</option>
                                <option value="revenue">Laporan Pendapatan</option>
                                <option value="contacts">Data Kontak</option>
                                <option value="full">Laporan Lengkap</option>
                            </select>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">
                                <i class="fas fa-filter me-2"></i>Filter Tambahan
                            </label>
                            <select name="status" class="form-select-custom">
                                <option value="">Semua Status</option>
                                <option value="completed">Completed Only</option>
                                <option value="pending">Pending Only</option>
                                <option value="approved">Approved Only</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-export btn-excel">
                            <i class="fas fa-file-excel me-2"></i>Export Excel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data Tables -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-clock me-2"></i>Booking Terbaru
                    </h5>
                    <a href="{{ route('admin.bookings.index') }}" class="view-all-link">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table-custom table-mini">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Mobil</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentBookings as $booking)
                                <tr>
                                    <td>
                                        <div class="customer-mini">
                                            <div class="customer-avatar-mini">
                                                {{ strtoupper(substr($booking->customer_name, 0, 1)) }}
                                            </div>
                                            <div class="customer-info-mini">
                                                <div class="customer-name-mini">{{ $booking->customer_name }}</div>
                                                <div class="customer-phone-mini">{{ $booking->customer_phone }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="car-mini">
                                            @if($booking->car)
                                                <div class="car-brand-mini">{{ $booking->car->brand }}</div>
                                                <div class="car-model-mini">{{ $booking->car->model }}</div>
                                            @else
                                                <span class="text-muted">Mobil dihapus</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-mini">
                                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-{{ $booking->status }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-star me-2"></i>Mobil Paling Populer
                    </h5>
                    <a href="{{ route('admin.cars.index') }}" class="view-all-link">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table-custom table-mini">
                            <thead>
                                <tr>
                                    <th>Mobil</th>
                                    <th>Total Booking</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularCars as $car)
                                <tr>
                                    <td>
                                        <div class="car-popular">
                                            <div class="car-icon-popular">
                                                <i class="fas fa-car"></i>
                                            </div>
                                            <div class="car-info-popular">
                                                <div class="car-brand-popular">{{ $car->brand }}</div>
                                                <div class="car-model-popular">{{ $car->model }}</div>
                                                <div class="car-plate-popular">{{ $car->plate_number }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="booking-count">
                                            <span class="count-number">{{ $car->bookings_count }}</span>
                                            <span class="count-label">booking</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-{{ $car->status }}">
                                            {{ $car->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-tachometer-alt me-2"></i>Statistik Cepat
                    </h5>
                </div>
                <div class="card-body-custom">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div class="quick-stat">
                                <div class="quick-stat-icon bg-primary">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="quick-stat-content">
                                    <h4>{{ $stats['completed_bookings'] ?? 0 }}</h4>
                                    <span>Booking Selesai</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="quick-stat">
                                <div class="quick-stat-icon bg-warning">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="quick-stat-content">
                                    <h4>{{ $stats['pending_bookings'] ?? 0 }}</h4>
                                    <span>Booking Pending</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="quick-stat">
                                <div class="quick-stat-icon bg-success">
                                    <i class="fas fa-car-side"></i>
                                </div>
                                <div class="quick-stat-content">
                                    <h4>{{ $stats['available_cars'] ?? 0 }}</h4>
                                    <span>Mobil Tersedia</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="quick-stat">
                                <div class="quick-stat-icon bg-info">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="quick-stat-content">
                                    <h4>{{ $stats['unread_contacts'] ?? 0 }}</h4>
                                    <span>Pesan Baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Page Header */
.page-header-card {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(30, 60, 114, 0.3);
    color: white;
    position: relative;
    overflow: hidden;
}

.page-header-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
}

.page-title {
    font-size: 2rem;
    font-weight: 800;
    text-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.page-subtitle {
    font-size: 1rem;
    opacity: 0.9;
}

.header-actions {
    display: flex;
    align-items: center;
}

.last-update {
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-size: 0.875rem;
    backdrop-filter: blur(10px);
}

/* Alert Custom */
.alert-custom {
    border: none;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-left: 5px solid;
}

.alert-success-custom {
    background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
    border-left-color: #4ade80;
}

.alert-danger-custom {
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    border-left-color: #ef4444;
}

.alert-icon {
    margin-right: 1rem;
}

.alert-heading {
    font-weight: 700;
}

/* Mini Stats Cards */
.stat-mini-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.stat-mini-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.stat-primary {
    border-color: rgba(30, 60, 114, 0.2);
}

.stat-primary .stat-icon {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
}

.stat-success {
    border-color: rgba(74, 222, 128, 0.2);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
}

.stat-warning {
    border-color: rgba(251, 191, 36, 0.2);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
}

.stat-info {
    border-color: rgba(34, 211, 238, 0.2);
}

.stat-info .stat-icon {
    background: linear-gradient(135deg, #22d3ee 0%, #0ea5e9 100%);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.stat-content h3 {
    font-size: 2rem;
    font-weight: 800;
    margin: 0;
    color: #1a1b2e;
}

.stat-content p {
    margin: 0;
    color: #64748b;
    font-weight: 600;
}

.stat-trend {
    font-size: 0.75rem;
    color: #94a3b8;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
}

/* Card Custom */
.card-custom {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    overflow: hidden;
}

.card-header-custom {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 1.5rem 2rem;
    border-bottom: 2px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header-custom h5 {
    font-weight: 700;
    color: #1a1b2e;
}

.view-all-link {
    color: #1e3c72;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.view-all-link:hover {
    color: #2a5298;
    transform: translateX(3px);
}

.card-body-custom {
    padding: 2rem;
}

/* Export Forms */
.export-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-group-custom {
    margin-bottom: 0;
}

.form-label-custom {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #1a1b2e;
    margin-bottom: 0.75rem;
    font-size: 0.95rem;
}

.form-control-custom,
.form-select-custom {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control-custom:focus,
.form-select-custom:focus {
    border-color: #1e3c72;
    box-shadow: 0 0 0 4px rgba(30, 60, 114, 0.1);
    outline: none;
}

.btn-export {
    padding: 1rem 2rem;
    border: none;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-pdf {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.btn-excel {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
    color: white;
}

.btn-export:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

/* Table Custom */
.table-custom {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 0.5rem;
}

.table-custom thead th {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 1rem 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    border: none;
}

.table-custom thead th:first-child {
    border-radius: 12px 0 0 12px;
}

.table-custom thead th:last-child {
    border-radius: 0 12px 12px 0;
}

.table-mini tbody tr {
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    transition: all 0.3s ease;
}

.table-mini tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.table-mini tbody td {
    padding: 1rem 1.5rem;
    border: none;
    vertical-align: middle;
}

.table-mini tbody td:first-child {
    border-radius: 12px 0 0 12px;
}

.table-mini tbody td:last-child {
    border-radius: 0 12px 12px 0;
}

/* Mini Components */
.customer-mini {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.customer-avatar-mini {
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 0.9rem;
}

.customer-name-mini {
    font-weight: 600;
    color: #1a1b2e;
    font-size: 0.875rem;
}

.customer-phone-mini {
    color: #64748b;
    font-size: 0.75rem;
}

.car-mini {
    min-width: 100px;
}

.car-brand-mini {
    font-weight: 600;
    color: #1a1b2e;
    font-size: 0.875rem;
}

.car-model-mini {
    color: #64748b;
    font-size: 0.75rem;
}

.car-popular {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.car-icon-popular {
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.9rem;
}

.car-brand-popular {
    font-weight: 600;
    color: #1a1b2e;
    font-size: 0.875rem;
}

.car-model-popular {
    color: #64748b;
    font-size: 0.75rem;
}

.car-plate-popular {
    background: #f1f5f9;
    padding: 0.125rem 0.375rem;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 600;
    color: #475569;
    display: inline-block;
}

.price-mini {
    font-weight: 700;
    color: #1a1b2e;
    font-size: 0.875rem;
}

.booking-count {
    text-align: center;
}

.count-number {
    font-size: 1.25rem;
    font-weight: 800;
    color: #1e3c72;
}

.count-label {
    font-size: 0.75rem;
    color: #64748b;
    display: block;
}

.status-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
}

.status-completed {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
    color: white;
}

.status-pending {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: white;
}

.status-approved {
    background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
    color: white;
}

.status-available {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
    color: white;
}

.status-rented {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: white;
}

.status-maintenance {
    background: linear-gradient(135deg, #64748b 0%, #475569 100%);
    color: white;
}

/* Quick Stats */
.quick-stat {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.quick-stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.quick-stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.quick-stat-content h4 {
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0;
    color: #1a1b2e;
}

.quick-stat-content span {
    color: #64748b;
    font-size: 0.875rem;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-card > div {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .header-actions {
        justify-content: center;
    }

    .stat-mini-card {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .card-header-custom {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .table-responsive {
        font-size: 0.875rem;
    }

    .customer-mini,
    .car-popular {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }

    .quick-stat {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-update last update time
    function updateLastUpdateTime() {
        const now = new Date();
        const options = {
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        const formattedTime = now.toLocaleDateString('id-ID', options);
        document.querySelector('.last-update').innerHTML =
            `<i class="fas fa-sync-alt me-2"></i>Update: ${formattedTime}`;
    }

    // Update every minute
    setInterval(updateLastUpdateTime, 60000);

    // Smooth animations
    const cards = document.querySelectorAll('.stat-mini-card, .card-custom');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Export form validation
    const exportForms = document.querySelectorAll('.export-form');
    exportForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const select = this.querySelector('select[name="type"]');
            if (!select.value) {
                e.preventDefault();
                select.focus();
                select.style.borderColor = '#ef4444';
                return false;
            }
        });
    });
});
</script>
@endsection
