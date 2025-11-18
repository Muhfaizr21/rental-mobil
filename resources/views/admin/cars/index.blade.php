@extends('layouts.admin')

@section('title', 'Manajemen Mobil')

@section('content')
<div class="container-fluid">
    <!-- Page Header with Navy Gradient -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title mb-2">
                            <i class="fas fa-car-side me-3"></i>Manajemen Mobil
                        </h1>
                        <p class="page-subtitle mb-0">Kelola semua kendaraan rental Anda dengan mudah</p>
                    </div>
                    <a href="{{ route('admin.cars.create') }}" class="btn-add-car">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Mobil Baru
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
                    <i class="fas fa-car"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->total }}</h3>
                    <p>Total Mobil</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-success">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->available }}</h3>
                    <p>Tersedia</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-warning">
                <div class="stat-icon">
                    <i class="fas fa-key"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->rented }}</h3>
                    <p>Sedang Disewa</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-mini-card stat-info">
                <div class="stat-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats->maintenance }}</h3>
                    <p>Maintenance</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cars Table Card -->
    <div class="card-custom">
        <div class="card-header-custom">
            <h5 class="mb-0">
                <i class="fas fa-list-ul me-2"></i>Daftar Kendaraan
            </h5>
            <div class="card-header-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari mobil..." class="form-control">
                </div>
            </div>
        </div>
        <div class="card-body-custom">
            <div class="table-responsive">
                <table class="table-custom" id="carsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Kendaraan</th>
                            <th>Detail</th>
                            <th>Harga/Hari</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                        <tr class="car-row">
                            <td>
                                <div class="row-number">{{ $loop->iteration + ($cars->currentPage() - 1) * $cars->perPage() }}</div>
                            </td>
                            <td>
                                <div class="car-image-container">
                                    @if($car->image)
                                        <img src="{{ Storage::disk('public')->url($car->image) }}" 
                                             alt="{{ $car->brand }} {{ $car->model }}" 
                                             class="car-image"
                                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA4MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjgwIiBoZWlnaHQ9IjYwIiBmaWxsPSIjRjNGNEY2Ii8+CjxwYXRoIGQ9Ik00MCAyMEM0My4zMTM3IDIwIDQ2IDIyLjY4NjMgNDYgMjZDNDYgMjkuMzEzNyA0My4zMTM3IDMyIDQwIDMyQzM2LjY4NjMgMzIgMzQgMjkuMzEzNyAzNCAyNkMzNCAyMi42ODYzIDM2LjY4NjMgMjAgNDAgMjBaIiBmaWxsPSIjOTRBM0I4Ii8+CjxwYXRoIGQ9Ik01MiA0MEgyOEMyNi44OTU0IDQwIDI2IDM5LjEwNDYgMjYgMzhWMjJDMjYgMjAuODk1NCAyNi44OTU0IDIwIDI4IDIwSDUyQzUzLjEwNDYgMjAgNTQgMjAuODk1NCA1NCAyMlYzOEM1NCAzOS4xMDQ2IDUzLjEwNDYgNDAgNTIgNDBaIiBmaWxsPSIjOTRBM0I4Ii8+Cjwvc3ZnPgo='">
                                        @if($car->images && count($car->images) > 0)
                                            <div class="gallery-badge" title="{{ count($car->images) }} gambar tambahan">
                                                <i class="fas fa-images"></i>
                                                <span>{{ count($car->images) }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <div class="car-image-placeholder">
                                            <i class="fas fa-car-side"></i>
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="car-info">
                                    <div class="car-brand">{{ $car->brand }}</div>
                                    <div class="car-model">{{ $car->model }}</div>
                                    <div class="car-year">{{ $car->year }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="car-details">
                                    <div class="detail-item">
                                        <i class="fas fa-palette me-2"></i>
                                        <span>{{ $car->color ?? '-' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-gas-pump me-2"></i>
                                        <span>
                                            @if($car->fuel_type)
                                                @switch($car->fuel_type)
                                                    @case('petrol') Bensin @break
                                                    @case('diesel') Solar @break
                                                    @case('electric') Listrik @break
                                                    @case('hybrid') Hybrid @break
                                                    @default {{ $car->fuel_type }}
                                                @endswitch
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-cogs me-2"></i>
                                        <span>
                                            @if($car->transmission)
                                                @switch($car->transmission)
                                                    @case('manual') Manual @break
                                                    @case('automatic') Automatic @break
                                                    @default {{ $car->transmission }}
                                                @endswitch
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-users me-2"></i>
                                        <span>{{ $car->seat_capacity ? $car->seat_capacity . ' Kursi' : '-' }}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="price-tag">
                                    <span class="price-label">Rp</span>
                                    <span class="price-value">{{ number_format($car->price_per_day, 0, ',', '.') }}</span>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.cars.updateStatus', $car) }}" method="POST" class="status-form">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()"
                                        class="status-select status-{{ $car->status }}">
                                        <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>
                                            Tersedia
                                        </option>
                                        <option value="rented" {{ $car->status == 'rented' ? 'selected' : '' }}>
                                            Disewa
                                        </option>
                                        <option value="maintenance" {{ $car->status == 'maintenance' ? 'selected' : '' }}>
                                            Maintenance
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.cars.show', $car) }}" class="btn-action btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn-action btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus mobil ini?')">
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
                                    <i class="fas fa-car-side fa-4x mb-3"></i>
                                    <h5>Belum ada data mobil</h5>
                                    <p class="text-muted">Tambahkan mobil pertama Anda sekarang</p>
                                    <a href="{{ route('admin.cars.create') }}" class="btn-add-car mt-3">
                                        <i class="fas fa-plus-circle me-2"></i>Tambah Mobil
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($cars->hasPages())
            <div class="pagination-wrapper">
                <nav>
                    <ul class="pagination-custom">
                        {{-- Previous Page Link --}}
                        @if($cars->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">
                                    <i class="fas fa-chevron-left me-2"></i>Previous
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $cars->previousPageUrl() }}">
                                    <i class="fas fa-chevron-left me-2"></i>Previous
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                            @if($page == $cars->currentPage())
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
                        @if($cars->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $cars->nextPageUrl() }}">
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

.btn-add-car {
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

.btn-add-car:hover {
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

.car-row {
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.car-row:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.car-row td {
    padding: 1.25rem 1.5rem;
    border: none;
    vertical-align: middle;
}

.car-row td:first-child {
    border-radius: 12px 0 0 12px;
}

.car-row td:last-child {
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

/* Car Image Styles */
.car-image-container {
    position: relative;
    width: 80px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.car-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.car-row:hover .car-image {
    transform: scale(1.1);
}

.car-image-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #94a3b8;
    font-size: 0.7rem;
}

.car-image-placeholder i {
    font-size: 1.2rem;
    margin-bottom: 0.25rem;
}

.gallery-badge {
    position: absolute;
    top: 4px;
    right: 4px;
    background: rgba(0,0,0,0.7);
    color: white;
    border-radius: 6px;
    padding: 2px 6px;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    gap: 2px;
}

.gallery-badge i {
    font-size: 0.6rem;
}

.car-info {
    display: flex;
    flex-direction: column;
    min-width: 120px;
}

.car-brand {
    font-weight: 700;
    color: #1a1b2e;
    font-size: 1rem;
}

.car-model {
    color: #64748b;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

.car-year {
    color: #94a3b8;
    font-size: 0.75rem;
    font-weight: 600;
}

.car-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    min-width: 150px;
}

.detail-item {
    display: flex;
    align-items: center;
    font-size: 0.8rem;
    color: #64748b;
}

.detail-item i {
    width: 16px;
    color: #1e3c72;
}

.plate-badge {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 700;
    color: #1a1b2e;
    border: 2px solid #e5e7eb;
    display: inline-block;
    min-width: 100px;
    text-align: center;
}

.price-tag {
    display: flex;
    align-items: baseline;
    gap: 0.25rem;
    min-width: 120px;
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

.status-available {
    border-color: #4ade80;
    color: #22c55e;
}

.status-rented {
    border-color: #fbbf24;
    color: #f59e0b;
}

.status-maintenance {
    border-color: #ef4444;
    color: #dc2626;
}

.status-select:hover {
    transform: scale(1.05);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    min-width: 120px;
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

    .car-details {
        min-width: 120px;
    }

    .detail-item {
        font-size: 0.75rem;
    }

    .car-image-container {
        width: 70px;
        height: 50px;
    }
}

@media (max-width: 768px) {
    .page-header-card > div {
        flex-direction: column;
        text-align: center;
    }

    .btn-add-car {
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
        min-width: auto;
    }

    .status-select {
        min-width: 100px;
    }

    .car-image-container {
        width: 60px;
        height: 45px;
    }

    .car-image-placeholder {
        font-size: 0.6rem;
    }

    .car-image-placeholder i {
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .car-image-container {
        width: 50px;
        height: 40px;
    }

    .gallery-badge {
        padding: 1px 4px;
        font-size: 0.6rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
// Search functionality
document.getElementById('searchInput')?.addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('.car-row');

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
    const rows = document.querySelectorAll('.car-row');
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

// Image error handling
function handleImageError(img) {
    img.style.display = 'none';
    const placeholder = document.createElement('div');
    placeholder.className = 'car-image-placeholder';
    placeholder.innerHTML = '<i class="fas fa-car-side"></i><span>No Image</span>';
    img.parentNode.appendChild(placeholder);
}
</script>
@endsection