@extends('layouts.admin')

@section('title', 'Edit Mobil')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title mb-2">
                            <i class="fas fa-edit me-3"></i>Edit Mobil
                        </h1>
                        <p class="page-subtitle mb-0">Perbarui informasi kendaraan: <strong>{{ $car->brand }} {{ $car->model }}</strong></p>
                    </div>
                    <a href="{{ route('admin.cars.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="info-banner">
                <div class="info-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div>
                    <h6 class="mb-1">Informasi</h6>
                    <p class="mb-0">Pastikan semua data diisi dengan benar. Perubahan akan langsung berlaku setelah disimpan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-12">
            <div class="card-custom">
                <div class="card-header-custom">
                    <div class="d-flex align-items-center">
                        <div class="header-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Form Edit Kendaraan</h5>
                            <p class="mb-0 text-muted small">Update data yang diperlukan</p>
                        </div>
                    </div>
                    <div class="car-preview">
                        <span class="preview-badge">{{ $car->plate_number }}</span>
                    </div>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('admin.cars.update', $car) }}" method="POST" id="carEditForm">
                        @csrf
                        @method('PUT')

                        <!-- Section 1: Basic Info -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-info-circle me-2"></i>
                                <h6 class="mb-0">Informasi Dasar</h6>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="brand" class="form-label-custom">
                                            <i class="fas fa-tag me-2"></i>Brand Mobil
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control-custom @error('brand') is-invalid @enderror"
                                               id="brand"
                                               name="brand"
                                               value="{{ old('brand', $car->brand) }}"
                                               placeholder="Contoh: Toyota"
                                               required>
                                        @error('brand')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="model" class="form-label-custom">
                                            <i class="fas fa-car-side me-2"></i>Model Mobil
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control-custom @error('model') is-invalid @enderror"
                                               id="model"
                                               name="model"
                                               value="{{ old('model', $car->model) }}"
                                               placeholder="Contoh: Avanza"
                                               required>
                                        @error('model')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Vehicle Details -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-cog me-2"></i>
                                <h6 class="mb-0">Detail Kendaraan</h6>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="plate_number" class="form-label-custom">
                                            <i class="fas fa-id-card me-2"></i>Plat Nomor
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control-custom @error('plate_number') is-invalid @enderror"
                                               id="plate_number"
                                               name="plate_number"
                                               value="{{ old('plate_number', $car->plate_number) }}"
                                               placeholder="Contoh: B 1234 XYZ"
                                               required>
                                        @error('plate_number')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="year" class="form-label-custom">
                                            <i class="fas fa-calendar me-2"></i>Tahun Produksi
                                            <span class="required">*</span>
                                        </label>
                                        <input type="number"
                                               class="form-control-custom @error('year') is-invalid @enderror"
                                               id="year"
                                               name="year"
                                               value="{{ old('year', $car->year) }}"
                                               min="1990"
                                               max="{{ date('Y') + 1 }}"
                                               placeholder="Contoh: 2023"
                                               required>
                                        @error('year')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- PERBAIKAN: Ubah value option menjadi lowercase -->
                                <div class="col-md-3">
                                    <div class="form-group-custom">
                                        <label for="color" class="form-label-custom">
                                            <i class="fas fa-palette me-2"></i>Warna
                                        </label>
                                        <select class="form-select-custom @error('color') is-invalid @enderror"
                                                id="color"
                                                name="color">
                                            <option value="">Pilih warna...</option>
                                            <option value="White" {{ old('color', $car->color) == 'White' ? 'selected' : '' }}>Putih</option>
                                            <option value="Black" {{ old('color', $car->color) == 'Black' ? 'selected' : '' }}>Hitam</option>
                                            <option value="Silver" {{ old('color', $car->color) == 'Silver' ? 'selected' : '' }}>Silver</option>
                                            <option value="Gray" {{ old('color', $car->color) == 'Gray' ? 'selected' : '' }}>Abu-abu</option>
                                            <option value="Red" {{ old('color', $car->color) == 'Red' ? 'selected' : '' }}>Merah</option>
                                            <option value="Blue" {{ old('color', $car->color) == 'Blue' ? 'selected' : '' }}>Biru</option>
                                            <option value="Green" {{ old('color', $car->color) == 'Green' ? 'selected' : '' }}>Hijau</option>
                                            <option value="Yellow" {{ old('color', $car->color) == 'Yellow' ? 'selected' : '' }}>Kuning</option>
                                            <option value="Orange" {{ old('color', $car->color) == 'Orange' ? 'selected' : '' }}>Oranye</option>
                                            <option value="Brown" {{ old('color', $car->color) == 'Brown' ? 'selected' : '' }}>Coklat</option>
                                        </select>
                                        <small class="form-text-muted">
                                            Saat ini: <strong>{{ $car->color ?? '-' }}</strong>
                                        </small>
                                        @error('color')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group-custom">
                                        <label for="fuel_type" class="form-label-custom">
                                            <i class="fas fa-gas-pump me-2"></i>Jenis Bahan Bakar
                                        </label>
                                        <select class="form-select-custom @error('fuel_type') is-invalid @enderror"
                                                id="fuel_type"
                                                name="fuel_type">
                                            <option value="">Pilih bahan bakar...</option>
                                            <!-- PERBAIKAN: Ubah value menjadi lowercase -->
                                            <option value="petrol" {{ old('fuel_type', $car->fuel_type) == 'petrol' ? 'selected' : '' }}>Bensin</option>
                                            <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>Solar</option>
                                            <option value="electric" {{ old('fuel_type', $car->fuel_type) == 'electric' ? 'selected' : '' }}>Listrik</option>
                                            <option value="hybrid" {{ old('fuel_type', $car->fuel_type) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        </select>
                                        <small class="form-text-muted">
                                            Saat ini: <strong>
                                                @if($car->fuel_type == 'petrol') Bensin
                                                @elseif($car->fuel_type == 'diesel') Solar
                                                @elseif($car->fuel_type == 'electric') Listrik
                                                @elseif($car->fuel_type == 'hybrid') Hybrid
                                                @else -
                                                @endif
                                            </strong>
                                        </small>
                                        @error('fuel_type')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group-custom">
                                        <label for="transmission" class="form-label-custom">
                                            <i class="fas fa-cogs me-2"></i>Transmisi
                                        </label>
                                        <select class="form-select-custom @error('transmission') is-invalid @enderror"
                                                id="transmission"
                                                name="transmission">
                                            <option value="">Pilih transmisi...</option>
                                            <!-- PERBAIKAN: Sesuaikan dengan controller -->
                                            <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>Manual</option>
                                            <option value="automatic" {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                        </select>
                                        <small class="form-text-muted">
                                            Saat ini: <strong>
                                                @if($car->transmission == 'manual') Manual
                                                @elseif($car->transmission == 'automatic') Automatic
                                                @else -
                                                @endif
                                            </strong>
                                        </small>
                                        @error('transmission')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group-custom">
                                        <label for="seat_capacity" class="form-label-custom">
                                            <i class="fas fa-users me-2"></i>Kapasitas Kursi
                                        </label>
                                        <select class="form-select-custom @error('seat_capacity') is-invalid @enderror"
                                                id="seat_capacity"
                                                name="seat_capacity">
                                            <option value="">Pilih kapasitas...</option>
                                            <option value="2" {{ old('seat_capacity', $car->seat_capacity) == '2' ? 'selected' : '' }}>2 Kursi</option>
                                            <option value="4" {{ old('seat_capacity', $car->seat_capacity) == '4' ? 'selected' : '' }}>4 Kursi</option>
                                            <option value="5" {{ old('seat_capacity', $car->seat_capacity) == '5' ? 'selected' : '' }}>5 Kursi</option>
                                            <option value="7" {{ old('seat_capacity', $car->seat_capacity) == '7' ? 'selected' : '' }}>7 Kursi</option>
                                            <option value="8" {{ old('seat_capacity', $car->seat_capacity) == '8' ? 'selected' : '' }}>8 Kursi</option>
                                        </select>
                                        <small class="form-text-muted">
                                            Saat ini: <strong>{{ $car->seat_capacity ? $car->seat_capacity . ' Kursi' : '-' }}</strong>
                                        </small>
                                        @error('seat_capacity')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 3: Pricing & Status -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="fas fa-dollar-sign me-2"></i>
                                <h6 class="mb-0">Harga & Status</h6>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="price_per_day" class="form-label-custom">
                                            <i class="fas fa-money-bill-wave me-2"></i>Harga per Hari
                                            <span class="required">*</span>
                                        </label>
                                        <div class="input-group-custom">
                                            <span class="input-prefix">Rp</span>
                                            <input type="number"
                                                   class="form-control-custom @error('price_per_day') is-invalid @enderror"
                                                   id="price_per_day"
                                                   name="price_per_day"
                                                   value="{{ old('price_per_day', $car->price_per_day) }}"
                                                   min="0"
                                                   step="1000"
                                                   placeholder="300000"
                                                   required>
                                        </div>
                                        <small class="form-text-muted">
                                            Harga saat ini: <strong>Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</strong>
                                        </small>
                                        @error('price_per_day')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-custom">
                                        <label for="status" class="form-label-custom">
                                            <i class="fas fa-toggle-on me-2"></i>Status Ketersediaan
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-select-custom @error('status') is-invalid @enderror"
                                                id="status"
                                                name="status"
                                                required>
                                            <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>
                                                ✓ Tersedia
                                            </option>
                                            <option value="rented" {{ old('status', $car->status) == 'rented' ? 'selected' : '' }}>
                                                ⏱ Sedang Disewa
                                            </option>
                                            <option value="maintenance" {{ old('status', $car->status) == 'maintenance' ? 'selected' : '' }}>
                                                🔧 Maintenance
                                            </option>
                                        </select>
                                        <small class="form-text-muted">
                                            Status saat ini: <strong class="status-{{ $car->status }}">
                                                @if($car->status == 'available') ✓ Tersedia
                                                @elseif($car->status == 'rented') ⏱ Sedang Disewa
                                                @else 🔧 Maintenance
                                                @endif
                                            </strong>
                                        </small>
                                        @error('status')
                                            <div class="invalid-feedback-custom">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Change Summary -->
                        <div class="change-summary" id="changeSummary" style="display: none;">
                            <div class="summary-header">
                                <i class="fas fa-history me-2"></i>
                                <h6 class="mb-0">Perubahan Terdeteksi</h6>
                            </div>
                            <div class="summary-content" id="summaryContent"></div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save me-2"></i>Update Mobil
                            </button>
                            <a href="{{ route('admin.cars.show', $car) }}" class="btn-info">
                                <i class="fas fa-eye me-2"></i>Lihat Detail
                            </a>
                            <a href="{{ route('admin.cars.index') }}" class="btn-cancel">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                    </form>
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

.btn-back {
    background: white;
    color: #667eea;
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

.btn-back:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    color: #764ba2;
}

/* Info Banner */
.info-banner {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    padding: 1.5rem;
    border-radius: 15px;
    color: white;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 5px 20px rgba(79, 172, 254, 0.3);
}

.info-icon {
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.info-banner h6 {
    font-weight: 700;
    margin: 0;
}

.info-banner p {
    margin: 0;
    opacity: 0.95;
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

.car-preview {
    display: flex;
    align-items: center;
}

.preview-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.9rem;
}

.card-body-custom {
    padding: 2.5rem;
}

/* Form Sections */
.form-section {
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px dashed #e5e7eb;
}

.form-section:last-of-type {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.section-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    border-radius: 12px;
    border-left: 4px solid #667eea;
}

.section-header h6 {
    font-weight: 700;
    color: #1a1b2e;
}

/* Form Groups */
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

.required {
    color: #ef4444;
    margin-left: 0.25rem;
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
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
}

.form-control-custom.is-invalid,
.form-select-custom.is-invalid {
    border-color: #ef4444;
}

.form-control-custom.is-invalid:focus,
.form-select-custom.is-invalid:focus {
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
}

/* Input Group */
.input-group-custom {
    display: flex;
    align-items: center;
    position: relative;
}

.input-prefix {
    position: absolute;
    left: 1.25rem;
    font-weight: 700;
    color: #64748b;
    z-index: 1;
}

.input-group-custom .form-control-custom {
    padding-left: 3rem;
}

.form-text-muted {
    display: block;
    margin-top: 0.5rem;
    color: #64748b;
    font-size: 0.875rem;
}

.status-available {
    color: #22c55e;
}

.status-rented {
    color: #f59e0b;
}

.status-maintenance {
    color: #ef4444;
}

/* Invalid Feedback */
.invalid-feedback-custom {
    display: block;
    margin-top: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
    font-weight: 600;
}

/* Change Summary */
.change-summary {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    border-left: 4px solid #f59e0b;
}

.summary-header {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.summary-header h6 {
    font-weight: 700;
    color: #92400e;
}

.summary-content {
    font-size: 0.9rem;
    color: #78350f;
}

.summary-content ul {
    margin: 0;
    padding-left: 1.5rem;
}

.summary-content li {
    margin-bottom: 0.25rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 2px solid #e5e7eb;
}

.btn-submit {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 1rem 2.5rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    display: inline-flex;
    align-items: center;
}

.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.btn-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
    border: none;
    padding: 1rem 2.5rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-info:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
    color: white;
}

.btn-cancel {
    background: #e5e7eb;
    color: #64748b;
    border: none;
    padding: 1rem 2.5rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-cancel:hover {
    background: #cbd5e1;
    color: #475569;
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-card > div {
        flex-direction: column;
        text-align: center;
    }

    .btn-back {
        margin-top: 1rem;
    }

    .card-header-custom {
        flex-direction: column;
        gap: 1rem;
    }

    .card-body-custom {
        padding: 1.5rem;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-submit,
    .btn-info,
    .btn-cancel {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Original values
    const originalValues = {
        brand: '{{ $car->brand }}',
        model: '{{ $car->model }}',
        plate_number: '{{ $car->plate_number }}',
        year: '{{ $car->year }}',
        color: '{{ $car->color }}',
        fuel_type: '{{ $car->fuel_type }}',
        transmission: '{{ $car->transmission }}',
        seat_capacity: '{{ $car->seat_capacity }}',
        price_per_day: '{{ $car->price_per_day }}',
        status: '{{ $car->status }}'
    };

    // Field name mapping
    const fieldNames = {
        brand: 'Brand',
        model: 'Model',
        plate_number: 'Plat Nomor',
        year: 'Tahun',
        color: 'Warna',
        fuel_type: 'Bahan Bakar',
        transmission: 'Transmisi',
        seat_capacity: 'Kapasitas Kursi',
        price_per_day: 'Harga per Hari',
        status: 'Status'
    };

    // Track changes
    function checkChanges() {
        const changes = [];
        const form = document.getElementById('carEditForm');
        const summary = document.getElementById('changeSummary');
        const summaryContent = document.getElementById('summaryContent');

        Object.keys(originalValues).forEach(key => {
            const input = form.querySelector(`[name="${key}"]`);
            if (input) {
                let currentValue = input.value;

                // Handle select elements
                if (input.tagName === 'SELECT') {
                    const selectedOption = input.options[input.selectedIndex];
                    currentValue = selectedOption ? selectedOption.text : '';
                }

                if (currentValue != originalValues[key]) {
                    changes.push({
                        field: key,
                        oldValue: originalValues[key] || '-',
                        newValue: currentValue || '-'
                    });
                }
            }
        });

        if (changes.length > 0) {
            summary.style.display = 'block';
            let html = '<ul class="mb-0">';
            changes.forEach(change => {
                const fieldName = fieldNames[change.field];
                html += `<li><strong>${fieldName}:</strong> "${change.oldValue}" → "${change.newValue}"</li>`;
            });
            html += '</ul>';
            summaryContent.innerHTML = html;
        } else {
            summary.style.display = 'none';
        }
    }

    // Add event listeners
    document.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', checkChanges);
        input.addEventListener('change', checkChanges);
    });

    // Auto format price input
    const priceInput = document.getElementById('price_per_day');
    if (priceInput) {
        priceInput.addEventListener('blur', function() {
            if (this.value) {
                const value = parseInt(this.value);
                if (!isNaN(value)) {
                    this.value = Math.round(value / 1000) * 1000;
                    checkChanges();
                }
            }
        });
    }

    // Auto uppercase plate number
    const plateInput = document.getElementById('plate_number');
    if (plateInput) {
        plateInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    }

    // Smart brand and model suggestions
    const brandInput = document.getElementById('brand');
    const modelInput = document.getElementById('model');

    const carBrands = ['Toyota', 'Honda', 'Mitsubishi', 'Suzuki', 'Daihatsu', 'Nissan', 'Wuling', 'Hyundai', 'Kia', 'Mazda'];
    const carModels = {
        'Toyota': ['Avanza', 'Innova', 'Fortuner', 'Calya', 'Rush', 'Agya'],
        'Honda': ['Brio', 'HR-V', 'CR-V', 'Mobilio', 'City', 'Civic'],
        'Mitsubishi': ['Xpander', 'Pajero Sport', 'Outlander', 'Triton', 'Mirage'],
        'Suzuki': ['Ertiga', 'Jimny', 'XL7', 'Baleno', 'Ignis'],
        'Daihatsu': ['Terios', 'Ayla', 'Xenia', 'Sigra', 'Gran Max'],
        'Nissan': ['Livina', 'X-Trail', 'March', 'Juke', 'Serena'],
        'Wuling': ['Cortez', 'Almaz', 'Confero'],
        'Hyundai': ['Creta', 'Stargazer', 'Santa Fe', 'Ioniq'],
        'Kia': ['Seltos', 'Sonet', 'Carnival'],
        'Mazda': ['CX-5', 'CX-3', '2', '3']
    };

    if (brandInput) {
        brandInput.addEventListener('input', function() {
            const value = this.value.toLowerCase();
            const suggestions = carBrands.filter(brand =>
                brand.toLowerCase().includes(value)
            );

            // Auto-complete for exact matches
            if (suggestions.length === 1 && value.length > 2) {
                this.value = suggestions[0];
                updateModelSuggestions(suggestions[0]);
                checkChanges();
            }
        });

        brandInput.addEventListener('blur', function() {
            updateModelSuggestions(this.value);
        });
    }

    function updateModelSuggestions(brand) {
        if (modelInput && carModels[brand]) {
            modelInput.setAttribute('placeholder', `Contoh: ${carModels[brand].join(', ')}`);
        }
    }

    // Form validation
    const form = document.getElementById('carEditForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required], select[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi!');
            }
        });
    }

    // Initial check for changes
    checkChanges();
});
</script>
@endsection
