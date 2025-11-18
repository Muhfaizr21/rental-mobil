@extends('layouts.admin')

@section('title', 'Detail Mobil - ' . $car->brand . ' ' . $car->model)

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-header-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="page-title mb-2">
                                <i class="fas fa-car me-3"></i>Detail Mobil
                            </h1>
                            <p class="page-subtitle mb-0">Informasi lengkap kendaraan {{ $car->brand }} {{ $car->model }}
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.cars.edit', $car) }}" class="btn-edit">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                            <a href="{{ route('admin.cars.index') }}" class="btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
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

        <div class="row">
            <!-- Main Information -->
            <div class="col-lg-8">
                <!-- Car Images Card -->
                @if($car->image || ($car->images && count($car->images) > 0))
                    <div class="card-custom mb-4">
                        <div class="card-header-custom">
                            <div class="d-flex align-items-center">
                                <div class="header-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">Galeri Mobil</h5>
                                    <p class="mb-0 text-muted small">Foto kendaraan</p>
                                </div>
                            </div>
                            <div class="image-count">
                                <i class="fas fa-camera me-1"></i>
                                {{ $car->image ? 1 : 0 }}{{ $car->images ? ' + ' . count($car->images) : '' }} gambar
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <!-- Main Image -->
                            @if($car->image)
                                <div class="main-image-section mb-4">
                                    <h6 class="section-title mb-3">Gambar Utama</h6>
                                    <div class="main-image-container">
                                        @if(file_exists(public_path('storage/cars/' . $car->image)))
                                            <img src="{{ url('storage/cars/' . $car->image) }}"
                                                alt="{{ $car->brand }} {{ $car->model }}" class="main-image"
                                                onclick="openImageModal('{{ url('storage/cars/' . $car->image) }}')">
                                        @elseif(file_exists(public_path('storage/' . $car->image)))
                                            <img src="{{ url('storage/' . $car->image) }}" alt="{{ $car->brand }} {{ $car->model }}"
                                                class="main-image" onclick="openImageModal('{{ url('storage/' . $car->image) }}')">
                                        @else
                                            <div class="no-image-placeholder">
                                                <i class="fas fa-car fa-3x"></i>
                                                <p>Gambar tidak ditemukan</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Gallery Images -->
                            @if($car->images && count($car->images) > 0)
                                <div class="gallery-section">
                                    <h6 class="section-title mb-3">Galeri Gambar</h6>
                                    <div class="gallery-grid">
                                        @foreach($car->images as $index => $galleryImage)
                                            <div class="gallery-item">
                                                @if(file_exists(public_path('storage/cars/gallery/' . $galleryImage)))
                                                    <img src="{{ url('storage/cars/gallery/' . $galleryImage) }}"
                                                        alt="Gallery image {{ $index + 1 }}" class="gallery-image"
                                                        onclick="openImageModal('{{ url('storage/cars/gallery/' . $galleryImage) }}')">
                                                @elseif(file_exists(public_path('storage/' . $galleryImage)))
                                                    <img src="{{ url('storage/' . $galleryImage) }}" alt="Gallery image {{ $index + 1 }}"
                                                        class="gallery-image"
                                                        onclick="openImageModal('{{ url('storage/' . $galleryImage) }}')">
                                                @else
                                                    <div class="no-image-placeholder small">
                                                        <i class="fas fa-image"></i>
                                                        <p>Image {{ $index + 1 }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <!-- No Images Card -->
                    <div class="card-custom mb-4">
                        <div class="card-header-custom">
                            <div class="d-flex align-items-center">
                                <div class="header-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">Galeri Mobil</h5>
                                    <p class="mb-0 text-muted small">Foto kendaraan</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body-custom text-center">
                            <div class="no-images-placeholder">
                                <i class="fas fa-camera fa-4x mb-3"></i>
                                <h5>Belum ada gambar</h5>
                                <p class="text-muted">Tidak ada gambar yang diupload untuk mobil ini</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Car Details Card -->
                <div class="card-custom mb-4">
                    <div class="card-header-custom">
                        <div class="d-flex align-items-center">
                            <div class="header-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Informasi Kendaraan</h5>
                                <p class="mb-0 text-muted small">Detail lengkap mobil</p>
                            </div>
                        </div>
                        <div class="status-badge status-{{ $car->status }}">
                            @if($car->status == 'available')
                                ✓ Tersedia
                            @elseif($car->status == 'rented')
                                ⏱ Sedang Disewa
                            @else
                                🔧 Maintenance
                            @endif
                        </div>
                    </div>
                    <div class="card-body-custom">
                        <div class="row">
                            <!-- Basic Info -->
                            <div class="col-md-6">
                                <div class="info-section">
                                    <h6 class="section-title">Informasi Dasar</h6>
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-tag me-2"></i>Brand
                                            </div>
                                            <div class="info-value">{{ $car->brand }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-car-side me-2"></i>Model
                                            </div>
                                            <div class="info-value">{{ $car->model }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-id-card me-2"></i>Plat Nomor
                                            </div>
                                            <div class="info-value">
                                                <span class="plate-badge">{{ $car->plate_number }}</span>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-calendar me-2"></i>Tahun
                                            </div>
                                            <div class="info-value">{{ $car->year }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Specifications -->
                            <div class="col-md-6">
                                <div class="info-section">
                                    <h6 class="section-title">Spesifikasi</h6>
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-palette me-2"></i>Warna
                                            </div>
                                            <div class="info-value">{{ $car->color ?? '-' }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-gas-pump me-2"></i>Bahan Bakar
                                            </div>
                                            <div class="info-value">
                                                @if($car->fuel_type == 'petrol') Bensin
                                                @elseif($car->fuel_type == 'diesel') Solar
                                                @elseif($car->fuel_type == 'electric') Listrik
                                                @elseif($car->fuel_type == 'hybrid') Hybrid
                                                @else -
                                                @endif
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-cogs me-2"></i>Transmisi
                                            </div>
                                            <div class="info-value">
                                                @if($car->transmission == 'manual') Manual
                                                @elseif($car->transmission == 'automatic') Automatic
                                                @else -
                                                @endif
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-users me-2"></i>Kapasitas
                                            </div>
                                            <div class="info-value">
                                                {{ $car->seat_capacity ? $car->seat_capacity . ' Kursi' : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Card -->
                <div class="card-custom">
                    <div class="card-header-custom">
                        <div class="d-flex align-items-center">
                            <div class="header-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Informasi Harga</h5>
                                <p class="mb-0 text-muted small">Detail biaya rental</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom">
                        <div class="pricing-info">
                            <div class="price-main">
                                <div class="price-label">Harga per Hari</div>
                                <div class="price-amount">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</div>
                            </div>
                            <div class="price-breakdown">
                                <div class="breakdown-item">
                                    <span>Per Minggu (7 hari):</span>
                                    <strong>Rp {{ number_format($car->price_per_day * 7, 0, ',', '.') }}</strong>
                                </div>
                                <div class="breakdown-item">
                                    <span>Per Bulan (30 hari):</span>
                                    <strong>Rp {{ number_format($car->price_per_day * 30, 0, ',', '.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Status & Actions Card -->
                <div class="card-custom mb-4">
                    <div class="card-header-custom">
                        <div class="d-flex align-items-center">
                            <div class="header-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Status & Aksi</h5>
                                <p class="mb-0 text-muted small">Kelola kendaraan</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom">
                        <!-- Status Update Form -->
                        <form action="{{ route('admin.cars.updateStatus', $car) }}" method="POST" class="status-form">
                            @csrf
                            <div class="form-group-custom mb-3">
                                <label class="form-label-custom">Ubah Status</label>
                                <select name="status" onchange="this.form.submit()"
                                    class="status-select status-{{ $car->status }}">
                                    <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>
                                        ✓ Tersedia
                                    </option>
                                    <option value="rented" {{ $car->status == 'rented' ? 'selected' : '' }}>
                                        ⏱ Sedang Disewa
                                    </option>
                                    <option value="maintenance" {{ $car->status == 'maintenance' ? 'selected' : '' }}>
                                        🔧 Maintenance
                                    </option>
                                </select>
                            </div>
                        </form>

                        <!-- Action Buttons -->
                        <div class="action-buttons-vertical">
                            <a href="{{ route('admin.cars.edit', $car) }}" class="btn-action btn-edit-full">
                                <i class="fas fa-edit me-2"></i>Edit Mobil
                            </a>
                            <a href="#" class="btn-action btn-info-full" onclick="showCarQR()">
                                <i class="fas fa-qrcode me-2"></i>Generate QR Code
                            </a>
                            <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="w-100">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete-full w-100"
                                    onclick="return confirm('Yakin ingin menghapus mobil ini? Tindakan ini tidak dapat dibatalkan.')">
                                    <i class="fas fa-trash me-2"></i>Hapus Mobil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="card-custom">
                    <div class="card-header-custom">
                        <div class="d-flex align-items-center">
                            <div class="header-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Statistik</h5>
                                <p class="mb-0 text-muted small">Riwayat penggunaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom">
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-icon stat-primary">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">{{ $car->bookings->count() }}</div>
                                    <div class="stat-label">Total Booking</div>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon stat-success">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">{{ $car->bookings->where('status', 'completed')->count() }}
                                    </div>
                                    <div class="stat-label">Selesai</div>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon stat-warning">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">
                                        {{ $car->bookings->whereIn('status', ['pending', 'approved'])->count() }}
                                    </div>
                                    <div class="stat-label">Aktif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Card -->
                <div class="card-custom mt-4">
                    <div class="card-header-custom">
                        <div class="d-flex align-items-center">
                            <div class="header-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Timeline</h5>
                                <p class="mb-0 text-muted small">Riwayat aktivitas</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Mobil Ditambahkan</div>
                                    <div class="timeline-date">{{ $car->created_at->format('d M Y H:i') }}</div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <div class="timeline-title">Terakhir Diupdate</div>
                                    <div class="timeline-date">{{ $car->updated_at->format('d M Y H:i') }}</div>
                                </div>
                            </div>
                            @if($car->bookings->count() > 0)
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Booking Terakhir</div>
                                        <div class="timeline-date">{{ $car->bookings->last()->created_at->format('d M Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- QR Code Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">QR Code Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="qrcode" class="mb-3"></div>
                    <p class="text-muted small">
                        {{ $car->brand }} {{ $car->model }}<br>
                        {{ $car->plate_number }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="printQRCode()">
                        <i class="fas fa-print me-2"></i>Print
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="#" id="downloadImage" class="btn btn-primary" download>
                        <i class="fas fa-download me-2"></i>Download
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Page Header */
        .page-header-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
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
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .page-subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }

        .btn-back {
            background: white;
            color: #667eea;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-edit {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-back:hover,
        .btn-edit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* Alert Custom */
        .alert-custom {
            border: none;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-left: 5px solid;
        }

        .alert-success-custom {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            border-left-color: #4ade80;
        }

        .alert-icon {
            margin-right: 1rem;
        }

        .alert-heading {
            font-weight: 700;
        }

        /* Card Custom */
        .card-custom {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-header-custom {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem 2rem;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.9rem;
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
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .image-count {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .card-body-custom {
            padding: 2rem;
        }

        /* Image Gallery Styles */
        .main-image-section,
        .gallery-section {
            margin-bottom: 2rem;
        }

        .main-image-section:last-child,
        .gallery-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-weight: 700;
            color: #1a1b2e;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .main-image-container {
            text-align: center;
        }

        .main-image {
            max-width: 100%;
            max-height: 400px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .main-image:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .gallery-item {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        /* No Image Placeholder */
        .no-image-placeholder {
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 10px;
            color: #6c757d;
            text-align: center;
        }

        .no-image-placeholder.small {
            padding: 1rem;
        }

        .no-images-placeholder {
            padding: 3rem;
            color: #6c757d;
        }

        /* Info Sections */
        .info-section {
            margin-bottom: 2rem;
        }

        .info-section:last-child {
            margin-bottom: 0;
        }

        .info-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-label {
            display: flex;
            align-items: center;
            color: #64748b;
            font-weight: 600;
        }

        .info-value {
            font-weight: 700;
            color: #1a1b2e;
        }

        .plate-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        /* Pricing Info */
        .pricing-info {
            text-align: center;
        }

        .price-main {
            margin-bottom: 2rem;
        }

        .price-label {
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 0.5rem;
        }

        .price-amount {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a1b2e;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .price-breakdown {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        /* Status Form */
        .status-form {
            margin-bottom: 1.5rem;
        }

        .status-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
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
            transform: scale(1.02);
        }

        /* Action Buttons */
        .action-buttons-vertical {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .btn-action {
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-edit-full {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            color: white;
        }

        .btn-info-full {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .btn-delete-full {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Statistics */
        .stats-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .stat-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-success {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
        }

        .stat-warning {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a1b2e;
            line-height: 1;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 600;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 2rem;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-marker {
            position: absolute;
            left: -2rem;
            top: 0.25rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #667eea;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #667eea;
        }

        .timeline-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: -1.7rem;
            top: 1.2rem;
            bottom: -1.5rem;
            width: 2px;
            background: #e5e7eb;
        }

        .timeline-title {
            font-weight: 600;
            color: #1a1b2e;
            margin-bottom: 0.25rem;
        }

        .timeline-date {
            color: #64748b;
            font-size: 0.875rem;
        }

        /* Image Modal */
        #modalImage {
            max-width: 100%;
            max-height: 70vh;
            border-radius: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header-card>div {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .btn-back,
            .btn-edit {
                width: 100%;
                justify-content: center;
            }

            .card-header-custom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .status-badge,
            .image-count {
                align-self: center;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .breakdown-item {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-image {
                max-height: 300px;
            }
        }

        @media (max-width: 576px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .main-image {
                max-height: 250px;
            }

            .price-amount {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <!-- QR Code Library -->
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>

    <script>
        // QR Code Generation
        function showCarQR() {
            const carInfo = `RentGoid - {{ $car->brand }} {{ $car->model }}\nPlat: {{ $car->plate_number }}\nHarga: Rp {{ number_format($car->price_per_day, 0, ',', '.') }}/hari`;

            // Clear previous QR code
            document.getElementById('qrcode').innerHTML = '';

            // Generate new QR code
            QRCode.toCanvas(document.getElementById('qrcode'), carInfo, {
                width: 200,
                height: 200,
                colorDark: '#667eea',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.H
            }, function (error) {
                if (error) {
                    console.error(error);
                    alert('Gagal generate QR code');
                }
            });

            // Show modal
            const qrModal = new bootstrap.Modal(document.getElementById('qrModal'));
            qrModal.show();
        }

        function printQRCode() {
            const printWindow = window.open('', '_blank');
            const qrContent = document.getElementById('qrcode').innerHTML;

            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>QR Code - {{ $car->brand }} {{ $car->model }}</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            text-align: center;
                            padding: 2rem;
                        }
                        .car-info {
                            margin: 1rem 0;
                            font-size: 1.2rem;
                            font-weight: bold;
                        }
                        .print-btn { display: none; }
                    </style>
                </head>
                <body>
                    <h2>QR Code Mobil</h2>
                    <div class="car-info">
                        {{ $car->brand }} {{ $car->model }}<br>
                        {{ $car->plate_number }}
                    </div>
                    ${qrContent}
                    <div style="margin-top: 1rem; color: #666;">
                        Scan untuk info mobil - RentGoid
                    </div>
                    <button class="print-btn" onclick="window.print()">Print</button>
                    <script>
                        window.onload = function() {
                            window.print();
                            setTimeout(function() {
                                window.close();
                            }, 1000);
                        }
                    <\/script>
                </body>
                </html>
            `);
            printWindow.document.close();
        }

        // Image Modal Functionality
        function openImageModal(imageUrl) {
            const modalImage = document.getElementById('modalImage');
            const downloadLink = document.getElementById('downloadImage');

            modalImage.src = imageUrl;
            downloadLink.href = imageUrl;
            downloadLink.download = '{{ $car->brand }}_{{ $car->model }}_{{ $car->plate_number }}.jpg';

            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        }

        // Auto-dismiss alerts
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);

            // Animate cards on load
            const cards = document.querySelectorAll('.card-custom');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Animate images on load
            const images = document.querySelectorAll('.main-image, .gallery-image');
            images.forEach((img, index) => {
                img.style.opacity = '0';
                img.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    img.style.transition = 'all 0.5s ease';
                    img.style.opacity = '1';
                    img.style.transform = 'scale(1)';
                }, index * 100 + 300);
            });
        });
    </script>
@endsection