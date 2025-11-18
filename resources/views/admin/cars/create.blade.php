@extends('layouts.admin')

@section('title', 'Tambah Mobil Baru')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-header-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="page-title mb-2">
                                <i class="fas fa-plus-circle me-3"></i>Tambah Mobil Baru
                            </h1>
                            <p class="page-subtitle mb-0">Daftarkan kendaraan baru ke dalam sistem</p>
                        </div>
                        <a href="{{ route('admin.cars.index') }}" class="btn-back">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
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
                                <h5 class="mb-0">Informasi Kendaraan</h5>
                                <p class="mb-0 text-muted small">Lengkapi semua data dengan benar</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom">
                        <form action="{{ route('admin.cars.store') }}" method="POST" id="carForm"
                            enctype="multipart/form-data">
                            @csrf

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
                                                class="form-control-custom @error('brand') is-invalid @enderror" id="brand"
                                                name="brand" value="{{ old('brand') }}" placeholder="Contoh: Toyota"
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
                                                class="form-control-custom @error('model') is-invalid @enderror" id="model"
                                                name="model" value="{{ old('model') }}" placeholder="Contoh: Avanza"
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
                                                id="plate_number" name="plate_number" value="{{ old('plate_number') }}"
                                                placeholder="Contoh: B 1234 XYZ" required>
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
                                                class="form-control-custom @error('year') is-invalid @enderror" id="year"
                                                name="year" value="{{ old('year') }}" min="1990" max="{{ date('Y') + 1 }}"
                                                placeholder="Contoh: 2023" required>
                                            @error('year')
                                                <div class="invalid-feedback-custom">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- New Fields: Color, Fuel Type, Transmission, Seat Capacity -->
                                    <div class="col-md-3">
                                        <div class="form-group-custom">
                                            <label for="color" class="form-label-custom">
                                                <i class="fas fa-palette me-2"></i>Warna
                                            </label>
                                            <input type="text"
                                                class="form-control-custom @error('color') is-invalid @enderror" id="color"
                                                name="color" value="{{ old('color') }}" placeholder="Contoh: Putih">
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
                                                id="fuel_type" name="fuel_type">
                                                <option value="" selected>Pilih bahan bakar...</option>
                                                <option value="petrol" {{ old('fuel_type') == 'petrol' ? 'selected' : '' }}>
                                                    Bensin</option>
                                                <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>
                                                    Solar</option>
                                                <option value="electric"
                                                    {{ old('fuel_type') == 'electric' ? 'selected' : '' }}>Listrik</option>
                                                <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>
                                                    Hybrid</option>
                                            </select>
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
                                                id="transmission" name="transmission">
                                                <option value="" selected>Pilih transmisi...</option>
                                                <option value="manual"
                                                    {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                                                <option value="automatic"
                                                    {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automatic
                                                </option>
                                            </select>
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
                                            <input type="number"
                                                class="form-control-custom @error('seat_capacity') is-invalid @enderror"
                                                id="seat_capacity" name="seat_capacity" value="{{ old('seat_capacity') }}"
                                                min="1" max="20" placeholder="Contoh: 5">
                                            @error('seat_capacity')
                                                <div class="invalid-feedback-custom">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Images -->
                            <div class="form-section">
                                <div class="section-header">
                                    <i class="fas fa-images me-2"></i>
                                    <h6 class="mb-0">Gambar Mobil</h6>
                                </div>

                                <div class="row g-4">
                                    <!-- Main Image -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label for="image" class="form-label-custom">
                                                <i class="fas fa-image me-2"></i>Gambar Utama
                                            </label>
                                            <input type="file"
                                                class="form-control-custom @error('image') is-invalid @enderror" id="image"
                                                name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                            <small class="form-text-muted">
                                                Format: JPEG, PNG, JPG, GIF, WEBP (Maksimal 5MB)
                                            </small>
                                            @error('image')
                                                <div class="invalid-feedback-custom">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                            <!-- Image Preview -->
                                            <div class="image-preview mt-3" id="mainImagePreview"></div>
                                        </div>
                                    </div>

                                    <!-- Gallery Images -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label for="images" class="form-label-custom">
                                                <i class="fas fa-images me-2"></i>Galeri Gambar
                                            </label>
                                            <input type="file"
                                                class="form-control-custom @error('images.*') is-invalid @enderror"
                                                id="images" name="images[]" multiple
                                                accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                            <small class="form-text-muted">
                                                Format: JPEG, PNG, JPG, GIF, WEBP (Maksimal 5MB per gambar)
                                            </small>
                                            @error('images.*')
                                                <div class="invalid-feedback-custom">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                            <!-- Gallery Preview -->
                                            <div class="gallery-preview mt-3" id="galleryPreview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 4: Pricing & Status -->
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
                                                    id="price_per_day" name="price_per_day"
                                                    value="{{ old('price_per_day') }}" min="0" step="1000"
                                                    placeholder="300000" required>
                                            </div>
                                            <small class="form-text-muted">Format: tanpa titik atau koma</small>
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
                                                id="status" name="status" required>
                                                <option value="" disabled selected>Pilih status...</option>
                                                <option value="available"
                                                    {{ old('status') == 'available' ? 'selected' : '' }}>
                                                    ✓ Tersedia
                                                </option>
                                                <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>
                                                    ⏱ Sedang Disewa
                                                </option>
                                                <option value="maintenance"
                                                    {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                                                    🔧 Maintenance
                                                </option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback-custom">
                                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="form-actions">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-save me-2"></i>Simpan Mobil
                                </button>
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

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            color: #764ba2;
        }

        /* Card Custom */
        .card-custom {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem 2rem;
            border-bottom: 2px solid #e5e7eb;
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

        /* Invalid Feedback */
        .invalid-feedback-custom {
            display: block;
            margin-top: 0.5rem;
            color: #ef4444;
            font-size: 0.875rem;
            font-weight: 600;
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

        /* Image Preview */
        .image-preview {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .image-preview-item {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image-preview-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .image-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Gallery Preview */
        .gallery-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
        }

        .gallery-preview-item {
            position: relative;
            width: 100%;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .gallery-preview-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .gallery-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header-card>div {
                flex-direction: column;
                text-align: center;
            }

            .btn-back {
                margin-top: 1rem;
            }

            .card-body-custom {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-submit,
            .btn-cancel {
                width: 100%;
                justify-content: center;
            }

            .gallery-preview {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 576px) {
            .gallery-preview {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Auto format price input
            const priceInput = document.getElementById('price_per_day');
            if (priceInput) {
                priceInput.addEventListener('blur', function () {
                    if (this.value) {
                        const value = parseInt(this.value);
                        if (!isNaN(value)) {
                            this.value = Math.round(value / 1000) * 1000;
                        }
                    }
                });
            }

            // Auto uppercase plate number
            const plateInput = document.getElementById('plate_number');
            if (plateInput) {
                plateInput.addEventListener('input', function () {
                    this.value = this.value.toUpperCase();
                });
            }

            // Main image preview
            const mainImageInput = document.getElementById('image');
            const mainImagePreview = document.getElementById('mainImagePreview');

            if (mainImageInput && mainImagePreview) {
                mainImageInput.addEventListener('change', function () {
                    mainImagePreview.innerHTML = '';

                    if (this.files && this.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            const previewItem = document.createElement('div');
                            previewItem.className = 'image-preview-item';

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = 'Preview gambar utama';

                            previewItem.appendChild(img);
                            mainImagePreview.appendChild(previewItem);
                        }

                        reader.readAsDataURL(this.files[0]);
                    }
                });
            }

            // Gallery images preview
            const galleryInput = document.getElementById('images');
            const galleryPreview = document.getElementById('galleryPreview');

            if (galleryInput && galleryPreview) {
                galleryInput.addEventListener('change', function () {
                    galleryPreview.innerHTML = '';

                    if (this.files) {
                        Array.from(this.files).forEach(file => {
                            const reader = new FileReader();

                            reader.onload = function (e) {
                                const previewItem = document.createElement('div');
                                previewItem.className = 'gallery-preview-item';

                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.alt = 'Preview gambar galeri';

                                previewItem.appendChild(img);
                                galleryPreview.appendChild(previewItem);
                            }

                            reader.readAsDataURL(file);
                        });
                    }
                });
            }

            // File size validation
            function validateFileSize(file, maxSizeMB) {
                const maxSizeBytes = maxSizeMB * 1024 * 1024;
                return file.size <= maxSizeBytes;
            }

            // Form validation
            const form = document.getElementById('carForm');
            if (form) {
                form.addEventListener('submit', function (e) {
                    const inputs = form.querySelectorAll('input[required], select[required]');
                    let isValid = true;

                    // Validate required fields
                    inputs.forEach(input => {
                        if (!input.value) {
                            isValid = false;
                            input.classList.add('is-invalid');
                        } else {
                            input.classList.remove('is-invalid');
                        }
                    });

                    // Validate main image file size
                    const mainImage = document.getElementById('image');
                    if (mainImage.files.length > 0) {
                        const mainImageFile = mainImage.files[0];
                        if (!validateFileSize(mainImageFile, 5)) {
                            isValid = false;
                            alert('Ukuran gambar utama melebihi 5MB!');
                        }
                    }

                    // Validate gallery images file sizes
                    const galleryImages = document.getElementById('images');
                    if (galleryImages.files.length > 0) {
                        const galleryFiles = Array.from(galleryImages.files);
                        for (const file of galleryFiles) {
                            if (!validateFileSize(file, 5)) {
                                isValid = false;
                                alert(`Gambar ${file.name} melebihi ukuran maksimal 5MB!`);
                                break;
                            }
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();
                        alert('Mohon lengkapi semua field yang wajib diisi dan periksa ukuran file gambar!');
                    }
                });
            }
        });
    </script>
@endsection