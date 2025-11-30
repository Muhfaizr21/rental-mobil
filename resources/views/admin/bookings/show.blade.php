@extends('layouts.admin')

@section('title', 'Detail Booking - ' . $booking->customer_name)

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 fw-bold text-dark">Detail Booking</h1>
            <p class="text-muted mb-0">Informasi lengkap booking dari {{ $booking->customer_name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
            <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i> Edit
            </a>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <div>
                    <strong>Sukses!</strong> {{ session('success') }}
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @php
        // PERBAIKAN: Hitung ulang durasi yang benar (tanpa +1)
        $start = \Carbon\Carbon::parse($booking->start_date);
        $end = \Carbon\Carbon::parse($booking->end_date);
        $correctDuration = $start->diffInDays($end); // 30 Nov - 1 Dec = 1 hari
    @endphp

    <div class="row">
        <!-- Customer & Booking Information -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h6 class="m-0 fw-bold">
                        <i class="fas fa-info-circle me-2"></i>Informasi Booking
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Informasi Customer</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary rounded-circle text-white d-flex align-items-center justify-content-center me-3"
                                         style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        {{ strtoupper(substr($booking->customer_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h5 class="mb-1 text-dark">{{ $booking->customer_name }}</h5>
                                        <p class="mb-0 text-muted">
                                            <i class="fas fa-phone me-1"></i>{{ $booking->customer_phone }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Status Booking</h6>
                                <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST" class="d-inline">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()"
                                        class="form-select status-select
                                            @if($booking->status == 'pending') border-warning text-dark
                                            @elseif($booking->status == 'approved') border-success text-dark
                                            @elseif($booking->status == 'completed') border-info text-dark
                                            @else border-danger text-dark @endif">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                        <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                        <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>🏁 Completed</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Detail Waktu</h6>
                                <div class="bg-light rounded p-3">
                                    <div class="text-center mb-3">
                                        <div class="text-primary fw-bold fs-5">{{ $booking->start_date->format('d M Y') }}</div>
                                        <div class="text-muted small">Tanggal Mulai</div>
                                    </div>
                                    <div class="text-center text-muted">
                                        <i class="fas fa-arrow-down"></i>
                                    </div>
                                    <div class="text-center mt-3">
                                        <div class="text-primary fw-bold fs-5">{{ $booking->end_date->format('d M Y') }}</div>
                                        <div class="text-muted small">Tanggal Selesai</div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <span class="badge bg-info fs-6">{{ $correctDuration }} hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Informasi Mobil</h6>
                                @if($booking->car)
                                    <div class="d-flex align-items-center bg-light rounded p-3">
                                        <div class="bg-primary rounded p-3 me-3">
                                            <i class="fas fa-car text-white fa-2x"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 text-dark">{{ $booking->car->brand }} {{ $booking->car->model }}</h5>
                                            <p class="mb-1 text-muted">
                                                <i class="fas fa-tag me-1"></i>Plat: {{ $booking->car->plate_number }}
                                            </p>
                                            <p class="mb-0 text-muted">
                                                <i class="fas fa-money-bill-wave me-1"></i>
                                                Harga per hari: Rp {{ number_format($booking->car->price_per_day, 0, ',', '.') }}
                                            </p>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge
                                                @if($booking->car->status == 'available') bg-success
                                                @elseif($booking->car->status == 'rented') bg-warning
                                                @else bg-danger @endif">
                                                {{ ucfirst($booking->car->status) }}
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <strong>Mobil telah dihapus dari sistem</strong>
                                        <p class="mb-0 mt-1">ID Mobil: {{ $booking->car_id }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pricing & Actions -->
        <div class="col-lg-4">
            <!-- Pricing Card -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white py-3">
                    <h6 class="m-0 fw-bold">
                        <i class="fas fa-money-bill-wave me-2"></i>Informasi Pembayaran
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Harga per hari:</span>
                            <span class="fw-bold">Rp {{ number_format($booking->car->price_per_day ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Durasi:</span>
                            <span class="fw-bold">{{ $correctDuration }} hari</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-dark fw-bold">Total Harga:</span>
                            <span class="text-success fw-bold fs-5">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Card -->
            <div class="card">
                <div class="card-header bg-warning text-dark py-3">
                    <h6 class="m-0 fw-bold">
                        <i class="fas fa-cogs me-2"></i>Aksi
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Booking
                        </a>

                        @if($booking->car)
                            <a href="{{ route('admin.cars.show', $booking->car) }}" class="btn btn-info">
                                <i class="fas fa-car me-2"></i>Lihat Mobil
                            </a>
                        @endif

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#invoiceModal">
                            <i class="fas fa-receipt me-2"></i>Generate Invoice
                        </button>

                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-grid">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Hapus booking ini? Tindakan ini tidak dapat dibatalkan.')">
                                <i class="fas fa-trash me-2"></i>Hapus Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Timeline Card -->
            <div class="card mt-4">
                <div class="card-header bg-info text-white py-3">
                    <h6 class="m-0 fw-bold">
                        <i class="fas fa-history me-2"></i>Timeline
                    </h6>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Booking Dibuat</h6>
                                <small class="text-muted">{{ $booking->created_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        @if($booking->status == 'approved')
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Disetujui</h6>
                                <small class="text-muted">{{ $booking->updated_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        @endif
                        @if($booking->status == 'completed')
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Selesai</h6>
                                <small class="text-muted">{{ $booking->updated_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="invoiceModalLabel">
                    <i class="fas fa-receipt me-2"></i>Invoice Booking
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="invoice-container">
                    <div class="text-center mb-4">
                        <h3 class="text-primary">RentGoid</h3>
                        <p class="text-muted">Invoice Booking #{{ $booking->id }}</p>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <strong>Kepada:</strong>
                            <p class="mb-1">{{ $booking->customer_name }}</p>
                            <p class="mb-0 text-muted">{{ $booking->customer_phone }}</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <strong>Tanggal Invoice:</strong>
                            <p class="mb-0">{{ now()->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $booking->car->brand ?? 'Mobil' }} {{ $booking->car->model ?? '' }}<br>
                                        <small class="text-muted">{{ $booking->car->plate_number ?? 'Plat tidak tersedia' }}</small>
                                    </td>
                                    <td>{{ $correctDuration }} hari</td>
                                    <td>Rp {{ number_format($booking->car->price_per_day ?? 0, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted small">
                            Status:
                            <span class="badge
                                @if($booking->status == 'pending') bg-warning
                                @elseif($booking->status == 'approved') bg-success
                                @elseif($booking->status == 'completed') bg-info
                                @else bg-danger @endif">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="printInvoice()">
                    <i class="fas fa-print me-2"></i>Print
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.status-select {
    min-width: 140px;
    cursor: pointer;
    font-weight: 600;
}

/* Timeline Styles */
.timeline {
    position: relative;
    padding-left: 20px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -20px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 0 0 3px var(--bs-primary);
}

.timeline-content {
    padding-bottom: 10px;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -14px;
    top: 20px;
    bottom: -10px;
    width: 2px;
    background: #e9ecef;
}

/* Invoice Styles */
.invoice-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
}

/* Card Hover Effects */
.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Badge Styles */
.badge {
    font-weight: 600;
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .d-flex.align-items-center {
        flex-direction: column;
        text-align: center;
    }

    .d-flex.align-items-center .me-3 {
        margin-right: 0 !important;
        margin-bottom: 1rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
function printInvoice() {
    const invoiceContent = document.querySelector('.invoice-container').innerHTML;
    const printWindow = window.open('', '_blank');

    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Invoice Booking #{{ $booking->id }}</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
            <style>
                body { padding: 20px; }
                .table { margin-bottom: 0; }
                @media print {
                    body { padding: 0; }
                    .btn { display: none; }
                }
            </style>
        </head>
        <body>
            ${invoiceContent}
            <div class="text-center mt-4">
                <button class="btn btn-primary d-print-none" onclick="window.print()">
                    <i class="fas fa-print me-2"></i>Print
                </button>
                <button class="btn btn-secondary d-print-none ms-2" onclick="window.close()">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
            </div>
        </body>
        </html>
    `);

    printWindow.document.close();
}

// Auto-dismiss alerts
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
</script>
@endsection
