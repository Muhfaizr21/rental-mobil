@extends('layouts.admin')

@section('title', 'Manajemen Booking')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title mb-2">
                            <i class="fas fa-calendar-check me-3"></i>Manajemen Booking
                        </h1>
                        <p class="page-subtitle mb-0">Kelola semua pemesanan kendaraan dengan mudah</p>
                    </div>
                    <a href="{{ route('admin.bookings.create') }}" class="btn-add-booking">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Booking
                    </a>
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
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->total ?? 0 }}</h3>
                    <p>Total Booking</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-warning">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->pending ?? 0 }}</h3>
                    <p>Pending</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-success">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->approved ?? 0 }}</h3>
                    <p>Approved</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-info">
                <div class="stat-icon">
                    <i class="fas fa-flag-checkered"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->completed ?? 0 }}</h3>
                    <p>Completed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="card-custom mb-4">
        <div class="card-header-custom">
            <h5 class="mb-0">
                <i class="fas fa-filter me-2"></i>Filter Booking
            </h5>
        </div>
        <div class="card-body-custom">
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="{{ route('admin.bookings.index') }}"
                       class="filter-btn {{ !request('status') ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $stats->total ?? 0 }}</h4>
                            <span>Semua</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}"
                       class="filter-btn {{ request('status') == 'pending' ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $stats->pending ?? 0 }}</h4>
                            <span>Pending</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.bookings.index', ['status' => 'approved']) }}"
                       class="filter-btn {{ request('status') == 'approved' ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $stats->approved ?? 0 }}</h4>
                            <span>Approved</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}"
                       class="filter-btn {{ request('status') == 'completed' ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-flag-checkered"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $stats->completed ?? 0 }}</h4>
                            <span>Completed</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Table -->
    <div class="card-custom">
        <div class="card-header-custom">
            <h5 class="mb-0">
                <i class="fas fa-list-ul me-2"></i>Daftar Booking
            </h5>
            <div class="card-header-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari booking..." class="form-control">
                </div>
            </div>
        </div>
        <div class="card-body-custom">
            <div class="table-responsive">
                <table class="table-custom" id="bookingsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Mobil</th>
                            <th>Periode</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr class="booking-row">
                            <td>
                                <div class="row-number">{{ $loop->iteration + ($bookings->currentPage() - 1) * $bookings->perPage() }}</div>
                            </td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">
                                        {{ strtoupper(substr($booking->customer_name, 0, 1)) }}
                                    </div>
                                    <div class="customer-details">
                                        <div class="customer-name">{{ $booking->customer_name }}</div>
                                        <div class="customer-phone">{{ $booking->customer_phone }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($booking->car)
                                <div class="car-info">
                                    <div class="car-brand">{{ $booking->car->brand }}</div>
                                    <div class="car-model">{{ $booking->car->model }}</div>
                                    <div class="car-plate">{{ $booking->car->plate_number }}</div>
                                </div>
                                @else
                                <div class="car-missing">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>Mobil Dihapus</span>
                                    <small>ID: {{ $booking->car_id }}</small>
                                </div>
                                @endif
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="date-start">
                                        <i class="fas fa-play text-success me-1"></i>
                                        {{ $booking->start_date->format('d M Y') }}
                                    </div>
                                    <div class="date-end">
                                        <i class="fas fa-flag text-danger me-1"></i>
                                        {{ $booking->end_date->format('d M Y') }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="duration-badge">
                                    <i class="fas fa-calendar-day me-1"></i>
                                    {{ $booking->duration }} hari
                                </div>
                            </td>
                            <td>
                                <div class="price-tag">
                                    <span class="price-label">Rp</span>
                                    <span class="price-value">{{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST" class="status-form">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()"
                                        class="status-select status-{{ $booking->status }}">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                        <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>
                                            Approved
                                        </option>
                                        <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>
                                            Rejected
                                        </option>
                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.bookings.show', $booking) }}" class="btn-action btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn-action btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus booking ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-calendar-times fa-4x mb-3"></i>
                                    <h5>Belum ada data booking</h5>
                                    <p class="text-muted">Mulai dengan membuat booking baru</p>
                                    <a href="{{ route('admin.bookings.create') }}" class="btn-add-booking mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Tambah Booking
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($bookings->hasPages())
            <div class="pagination-wrapper">
                <nav>
                    <ul class="pagination-custom">
                        {{-- Previous Page Link --}}
                        @if($bookings->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">
                                    <i class="fas fa-chevron-left me-2"></i>Previous
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $bookings->previousPageUrl() }}">
                                    <i class="fas fa-chevron-left me-2"></i>Previous
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                            @if($page == $bookings->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if($bookings->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $bookings->nextPageUrl() }}">
                                    Next<i class="fas fa-chevron-right ms-2"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">
                                    Next<i class="fas fa-chevron-right ms-2"></i>
                                </span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endif
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

.btn-add-booking {
    background: white;
    color: #1e3c72;
    border: none;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 700;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-add-booking:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    color: #2a5298;
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

.stat-warning {
    border-color: rgba(251, 191, 36, 0.2);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
}

.stat-success {
    border-color: rgba(74, 222, 128, 0.2);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
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

/* Filter Section */
.filter-btn {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: white;
    border-radius: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid #e5e7eb;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.filter-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: #1e3c72;
}

.filter-active {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    border-color: #1e3c72;
    color: white;
}

.filter-active .filter-content h4,
.filter-active .filter-content span {
    color: white;
}

.filter-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.filter-active .filter-icon {
    background: white;
    color: #1e3c72;
}

.filter-content h4 {
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0;
    color: #1a1b2e;
}

.filter-content span {
    color: #64748b;
    font-weight: 600;
}

.filter-active .filter-content h4,
.filter-active .filter-content span {
    color: white;
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

.search-box {
    position: relative;
    width: 300px;
}

.search-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
}

.search-box input {
    padding-left: 45px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.search-box input:focus {
    border-color: #1e3c72;
    box-shadow: 0 0 0 4px rgba(30, 60, 114, 0.1);
}

.card-body-custom {
    padding: 2rem;
}

/* Table Custom */
.table-custom {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 0.75rem;
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

.booking-row {
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.booking-row:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.booking-row td {
    padding: 1.25rem 1.5rem;
    border: none;
    vertical-align: middle;
}

.booking-row td:first-child {
    border-radius: 12px 0 0 12px;
}

.booking-row td:last-child {
    border-radius: 0 12px 12px 0;
}

.row-number {
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.customer-avatar {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}

.customer-name {
    font-weight: 700;
    color: #1a1b2e;
    margin-bottom: 0.25rem;
}

.customer-phone {
    color: #64748b;
    font-size: 0.875rem;
}

.car-info {
    min-width: 150px;
}

.car-brand {
    font-weight: 700;
    color: #1a1b2e;
}

.car-model {
    color: #64748b;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

.car-plate {
    background: #f1f5f9;
    padding: 0.25rem 0.5rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    color: #475569;
    display: inline-block;
}

.car-missing {
    color: #ef4444;
    font-size: 0.875rem;
}

.car-missing small {
    display: block;
    color: #94a3b8;
    margin-top: 0.25rem;
}

.date-info {
    min-width: 120px;
}

.date-start,
.date-end {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

.duration-badge {
    background: linear-gradient(135deg, #22d3ee 0%, #0ea5e9 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
}

.price-tag {
    display: flex;
    align-items: baseline;
    gap: 0.25rem;
}

.price-label {
    color: #64748b;
    font-size: 0.875rem;
    font-weight: 600;
}

.price-value {
    color: #1a1b2e;
    font-size: 1.1rem;
    font-weight: 800;
}

/* Status Select */
.status-select {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    border: 2px solid;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    background: white;
    min-width: 120px;
}

.status-pending {
    border-color: #fbbf24;
    color: #f59e0b;
}

.status-approved {
    border-color: #4ade80;
    color: #22c55e;
}

.status-rejected {
    border-color: #ef4444;
    color: #dc2626;
}

.status-completed {
    border-color: #22d3ee;
    color: #0ea5e9;
}

.status-select:hover {
    transform: scale(1.05);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-action {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.btn-view {
    background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
    color: white;
}

.btn-edit {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.btn-action:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Empty State */
.empty-state {
    padding: 3rem;
    color: #64748b;
    text-align: center;
}

.empty-state i {
    color: #cbd5e1;
}

/* Pagination Custom */
.pagination-wrapper {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

.pagination-custom {
    display: flex;
    gap: 0.5rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

.page-item .page-link {
    padding: 0.75rem 1.25rem;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    color: #64748b;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.page-item .page-link:hover {
    background: #1e3c72;
    color: white;
    border-color: #1e3c72;
    transform: translateY(-2px);
}

.page-item.active .page-link {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    border-color: #1e3c72;
}

.page-item.disabled .page-link {
    background: #f8f9fa;
    color: #94a3b8;
    border-color: #e5e7eb;
    cursor: not-allowed;
    transform: none;
}

/* Responsive */
@media (max-width: 1200px) {
    .table-responsive {
        font-size: 0.875rem;
    }

    .customer-info {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
}

@media (max-width: 768px) {
    .page-header-card > div {
        flex-direction: column;
        text-align: center;
    }

    .btn-add-booking {
        margin-top: 1rem;
    }

    .search-box {
        width: 100%;
        margin-top: 1rem;
    }

    .card-header-custom {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .action-buttons {
        flex-direction: column;
    }

    .status-select {
        min-width: 100px;
    }

    .filter-btn {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
// Search functionality
document.getElementById('searchInput')?.addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('.booking-row');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});

// Smooth animations on load
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.stat-mini-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Animate table rows
    const rows = document.querySelectorAll('.booking-row');
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-20px)';
        setTimeout(() => {
            row.style.transition = 'all 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, index * 50 + 300);
    });
});
</script>
@endsection
