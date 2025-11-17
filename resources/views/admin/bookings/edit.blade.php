@extends('layouts.admin')

@section('title', 'Edit Booking - ' . $booking->customer_name)

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 fw-bold text-dark">Edit Booking</h1>
            <p class="text-muted mb-0">Update informasi booking untuk {{ $booking->customer_name }}</p>
        </div>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-edit me-2"></i>Form Edit Booking
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.bookings.update', $booking) }}" method="POST" id="bookingForm">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label fw-bold">Nama Customer <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                   id="customer_name" name="customer_name"
                                   value="{{ old('customer_name', $booking->customer_name) }}" required
                                   placeholder="Masukkan nama customer">
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_phone" class="form-label fw-bold">No. Telepon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('customer_phone') is-invalid @enderror"
                                   id="customer_phone" name="customer_phone"
                                   value="{{ old('customer_phone', $booking->customer_phone) }}" required
                                   placeholder="Masukkan nomor telepon">
                            @error('customer_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="car_id" class="form-label fw-bold">Pilih Mobil <span class="text-danger">*</span></label>
                            <select class="form-select @error('car_id') is-invalid @enderror"
                                    id="car_id" name="car_id" required>
                                <option value="">-- Pilih Mobil --</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}"
                                        {{ old('car_id', $booking->car_id) == $car->id ? 'selected' : '' }}
                                        data-price="{{ $car->price_per_day }}"
                                        data-status="{{ $car->status }}">
                                        {{ $car->brand }} {{ $car->model }} - {{ $car->plate_number }}
                                        (Rp {{ number_format($car->price_per_day, 0, ',', '.') }}/hari)
                                        - {{ strtoupper($car->status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('car_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <small id="carStatus" class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror"
                                    id="status" name="status" required>
                                <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="approved" {{ old('status', $booking->status) == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                <option value="rejected" {{ old('status', $booking->status) == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>🏁 Completed</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="start_date" class="form-label fw-bold">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                   id="start_date" name="start_date"
                                   value="{{ old('start_date', $booking->start_date->format('Y-m-d')) }}"
                                   min="{{ date('Y-m-d') }}" required>
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="end_date" class="form-label fw-bold">Tanggal Selesai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                   id="end_date" name="end_date"
                                   value="{{ old('end_date', $booking->end_date->format('Y-m-d')) }}"
                                   min="{{ date('Y-m-d') }}" required>
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Price Calculation -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="alert alert-info" id="priceInfo"
                             style="{{ $booking->car_id && $booking->start_date && $booking->end_date ? '' : 'display: none;' }}">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calculator me-2 fa-lg"></i>
                                <h6 class="mb-0 fw-bold">Detail Perhitungan Harga</h6>
                            </div>
                            <hr>
                            <div id="priceDetails" class="mt-2">
                                @if($booking->car_id && $booking->start_date && $booking->end_date)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Durasi:</strong> {{ $booking->duration }} hari
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Harga/hari:</strong> Rp {{ number_format($booking->car->price_per_day, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="bg-light p-2 rounded">
                                                <strong class="text-primary">Total: Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="total_price" class="form-label fw-bold">Total Harga (Rp) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('total_price') is-invalid @enderror"
                                   id="total_price" name="total_price"
                                   value="{{ old('total_price', $booking->total_price) }}"
                                   min="0" step="1000" required readonly
                                   placeholder="Harga akan terisi otomatis">
                            @error('total_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">&nbsp;</label>
                            <button type="button" class="btn btn-outline-primary w-100" id="calculatePrice">
                                <i class="fas fa-calculator me-2"></i>Hitung Ulang Harga
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Booking
                    </button>
                    <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-info">
                        <i class="fas fa-eye me-2"></i>Lihat Detail
                    </a>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Booking Info -->
    <div class="card mt-4">
        <div class="card-header bg-light py-3">
            <h6 class="m-0 fw-bold text-dark">
                <i class="fas fa-info-circle me-2"></i>Informasi Booking Saat Ini
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="bg-primary rounded-circle text-white d-inline-flex align-items-center justify-content-center mb-2"
                             style="width: 60px; height: 60px; font-size: 1.5rem;">
                            {{ strtoupper(substr($booking->customer_name, 0, 1)) }}
                        </div>
                        <h6 class="mb-1">{{ $booking->customer_name }}</h6>
                        <small class="text-muted">{{ $booking->customer_phone }}</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        @if($booking->car)
                            <div class="bg-success rounded p-2 mb-2">
                                <i class="fas fa-car text-white fa-2x"></i>
                            </div>
                            <h6 class="mb-1">{{ $booking->car->brand }} {{ $booking->car->model }}</h6>
                            <small class="text-muted">{{ $booking->car->plate_number }}</small>
                        @else
                            <div class="bg-danger rounded p-2 mb-2">
                                <i class="fas fa-exclamation-triangle text-white fa-2x"></i>
                            </div>
                            <h6 class="mb-1 text-danger">Mobil Dihapus</h6>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="bg-info rounded p-2 mb-2">
                            <i class="fas fa-calendar text-white fa-2x"></i>
                        </div>
                        <h6 class="mb-1">{{ $booking->duration }} Hari</h6>
                        <small class="text-muted">
                            {{ $booking->start_date->format('d M Y') }} - {{ $booking->end_date->format('d M Y') }}
                        </small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="
                            @if($booking->status == 'pending') bg-warning
                            @elseif($booking->status == 'approved') bg-success
                            @elseif($booking->status == 'completed') bg-info
                            @else bg-danger @endif rounded p-2 mb-2">
                            <i class="fas
                                @if($booking->status == 'pending') fa-clock
                                @elseif($booking->status == 'approved') fa-check
                                @elseif($booking->status == 'completed') fa-flag-checkered
                                @else fa-times @endif text-white fa-2x"></i>
                        </div>
                        <h6 class="mb-1 text-capitalize">{{ $booking->status }}</h6>
                        <small class="text-muted">Status Saat Ini</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.form-label {
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
    padding: 0.75rem 1rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus, .form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
}

.card {
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.card-header {
    border-radius: 0.5rem 0.5rem 0 0 !important;
}

.btn {
    border-radius: 0.375rem;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
}

.alert {
    border-radius: 0.375rem;
    border: none;
}

.invalid-feedback {
    display: block;
    margin-top: 0.25rem;
    font-size: 0.875rem;
    color: #dc3545;
}

.text-danger {
    color: #dc3545 !important;
}

/* Status badges for car selection */
.car-option-unavailable {
    color: #dc3545 !important;
    text-decoration: line-through;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const calculateBtn = document.getElementById('calculatePrice');
    const carSelect = document.getElementById('car_id');
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const totalPrice = document.getElementById('total_price');
    const priceInfo = document.getElementById('priceInfo');
    const priceDetails = document.getElementById('priceDetails');
    const carStatus = document.getElementById('carStatus');

    // Update car status info
    function updateCarStatus() {
        const selectedOption = carSelect.options[carSelect.selectedIndex];
        if (selectedOption.value) {
            const status = selectedOption.getAttribute('data-status');
            const price = selectedOption.getAttribute('data-price');

            let statusText = '';
            let statusClass = '';

            switch(status) {
                case 'available':
                    statusText = '✅ Mobil tersedia untuk disewa';
                    statusClass = 'text-success';
                    break;
                case 'rented':
                    statusText = '⚠️ Mobil sedang disewa';
                    statusClass = 'text-warning';
                    break;
                case 'maintenance':
                    statusText = '🔧 Mobil sedang dalam perawatan';
                    statusClass = 'text-danger';
                    break;
                default:
                    statusText = '❓ Status mobil tidak diketahui';
                    statusClass = 'text-muted';
            }

            carStatus.className = statusClass;
            carStatus.textContent = statusText + ' - Rp ' + parseInt(price).toLocaleString('id-ID') + '/hari';
        } else {
            carStatus.textContent = '';
        }
    }

    // Initial car status update
    updateCarStatus();

    // Calculate price when button clicked
    calculateBtn.addEventListener('click', calculatePrice);

    // Auto calculate when dates or car changed
    [carSelect, startDate, endDate].forEach(element => {
        element.addEventListener('change', function() {
            updateCarStatus();
            if (carSelect.value && startDate.value && endDate.value) {
                calculatePrice();
            }
        });
    });

    function calculatePrice() {
        const carId = carSelect.value;
        const start = startDate.value;
        const end = endDate.value;

        if (!carId || !start || !end) {
            alert('Harap pilih mobil dan tanggal terlebih dahulu!');
            return;
        }

        if (start >= end) {
            alert('Tanggal selesai harus setelah tanggal mulai!');
            return;
        }

        // Show loading state
        calculateBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menghitung...';
        calculateBtn.disabled = true;

        fetch('{{ route("admin.bookings.calculatePrice") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                car_id: carId,
                start_date: start,
                end_date: end
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            totalPrice.value = data.total_price;
            priceInfo.style.display = 'block';
            priceDetails.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <strong>Durasi:</strong> ${data.days} hari
                    </div>
                    <div class="col-md-6">
                        <strong>Harga/hari:</strong> Rp ${data.price_per_day.toLocaleString('id-ID')}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="bg-light p-2 rounded">
                            <strong class="text-primary">Total: Rp ${data.total_price.toLocaleString('id-ID')}</strong>
                        </div>
                    </div>
                </div>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghitung harga! Pastikan semua data sudah benar.');
        })
        .finally(() => {
            // Reset button state
            calculateBtn.innerHTML = '<i class="fas fa-calculator me-2"></i>Hitung Ulang Harga';
            calculateBtn.disabled = false;
        });
    }

    // Set minimum end date based on start date
    startDate.addEventListener('change', function() {
        if (this.value) {
            endDate.min = this.value;
            if (endDate.value && endDate.value < this.value) {
                endDate.value = '';
            }
        }
    });

    // Auto-calculate on page load if all fields are filled
    if (carSelect.value && startDate.value && endDate.value) {
        calculatePrice();
    }

    // Form validation before submit
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const selectedCarOption = carSelect.options[carSelect.selectedIndex];
        const carStatus = selectedCarOption.getAttribute('data-status');

        if (carStatus !== 'available') {
            const confirmMessage = `Mobil yang dipilih sedang dalam status "${carStatus}". Apakah Anda yakin ingin melanjutkan?`;
            if (!confirm(confirmMessage)) {
                e.preventDefault();
                return false;
            }
        }

        if (!totalPrice.value || totalPrice.value <= 0) {
            alert('Harap hitung harga terlebih dahulu sebelum menyimpan!');
            e.preventDefault();
            return false;
        }
    });
});
</script>
@endsection
