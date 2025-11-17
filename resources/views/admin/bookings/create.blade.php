@extends('layouts.admin')

@section('title', 'Tambah Booking Baru')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 fw-bold text-dark">Tambah Booking Baru</h1>
            <p class="text-muted mb-0">Isi form berikut untuk membuat booking baru</p>
        </div>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white py-3">
            <h6 class="m-0 fw-bold">
                <i class="fas fa-plus-circle me-2"></i>Form Tambah Booking
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.bookings.store') }}" method="POST" id="bookingForm">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label fw-bold">Nama Customer <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                   id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required
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
                                   id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required
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
                                        {{ old('car_id') == $car->id ? 'selected' : '' }}
                                        data-price="{{ $car->price_per_day }}">
                                        {{ $car->brand }} {{ $car->model }} - {{ $car->plate_number }} (Rp {{ number_format($car->price_per_day, 0, ',', '.') }}/hari)
                                    </option>
                                @endforeach
                            </select>
                            @error('car_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror"
                                    id="status" name="status" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>🏁 Completed</option>
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
                                   id="start_date" name="start_date" value="{{ old('start_date') }}"
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
                                   id="end_date" name="end_date" value="{{ old('end_date') }}"
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
                        <div class="alert alert-info" id="priceInfo" style="display: none;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calculator me-2 fa-lg"></i>
                                <h6 class="mb-0 fw-bold">Detail Perhitungan Harga</h6>
                            </div>
                            <hr>
                            <div id="priceDetails" class="mt-2"></div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="total_price" class="form-label fw-bold">Total Harga (Rp) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('total_price') is-invalid @enderror"
                                   id="total_price" name="total_price" value="{{ old('total_price') }}"
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
                                <i class="fas fa-calculator me-2"></i>Hitung Harga
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan Booking
                    </button>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </form>
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

    // Calculate price when button clicked
    calculateBtn.addEventListener('click', calculatePrice);

    // Auto calculate when dates or car changed
    [carSelect, startDate, endDate].forEach(element => {
        element.addEventListener('change', function() {
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
        .then(response => response.json())
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
            alert('Terjadi kesalahan saat menghitung harga!');
        })
        .finally(() => {
            // Reset button state
            calculateBtn.innerHTML = '<i class="fas fa-calculator me-2"></i>Hitung Harga';
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
});
</script>
@endsection
