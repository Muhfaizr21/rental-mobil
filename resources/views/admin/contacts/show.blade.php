@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')

{{-- Header Section --}}
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-1 fw-bold text-dark">Detail Pesan</h1>
            <p class="text-muted mb-0">Informasi lengkap pesan dari pengunjung</p>
        </div>
        <div class="d-flex gap-2">
            @if($contact->status == 'unread')
            <form action="{{ route('admin.contacts.markAsRead', $contact) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check me-2"></i>
                    Tandai Dibaca
                </button>
            </form>
            @endif
            <a href="{{ route('admin.contacts.index') }}"
               class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

{{-- Success/Error Messages --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center">
        <i class="fas fa-check-circle me-3"></i>
        <div>{{ session('success') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center">
        <i class="fas fa-exclamation-circle me-3"></i>
        <div>{{ session('error') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row g-3">
    {{-- Main Message Content --}}
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 h-100">
            {{-- Card Header --}}
            <div class="card-header-gradient p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle">
                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold text-white">{{ $contact->name }}</h5>
                            <small class="text-white-50">
                                <i class="fas fa-envelope me-1"></i>
                                {{ $contact->email }}
                            </small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="purpose-badge purpose-{{ $contact->purpose }} mb-2">
                            <i class="fas fa-{{ $contact->purpose_icon }} me-1"></i>
                            {{ $contact->purpose_label }}
                        </span>
                        <div class="status-badge status-{{ $contact->status }} mt-1">
                            @if($contact->status == 'unread')
                                <i class="fas fa-eye-slash me-1"></i>Belum Dibaca
                            @elseif($contact->status == 'read')
                                <i class="fas fa-eye me-1"></i>Sudah Dibaca
                            @else
                                <i class="fas fa-reply me-1"></i>Sudah Dibalas
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="card-body p-4">
                <div class="mb-4">
                    <h6 class="text-muted mb-3 d-flex align-items-center">
                        <i class="fas fa-comment-dots me-2 text-primary"></i>
                        Isi Pesan
                    </h6>
                    <div class="message-box">
                        <p class="mb-0 text-dark">{{ $contact->message }}</p>
                    </div>
                </div>

                <div class="message-meta">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="meta-item">
                                <i class="fas fa-calendar text-primary me-2"></i>
                                <span class="text-muted">Tanggal:</span>
                                <strong>{{ $contact->created_at->format('d F Y') }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="meta-item">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <span class="text-muted">Waktu:</span>
                                <strong>{{ $contact->created_at->format('H:i') }} WIB</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="meta-item">
                                <i class="fas fa-phone text-success me-2"></i>
                                <span class="text-muted">Telepon:</span>
                                <strong>{{ $contact->phone }}</strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="meta-item">
                                <i class="fas fa-envelope text-info me-2"></i>
                                <span class="text-muted">Email:</span>
                                <strong>{{ $contact->email }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar Actions --}}
    <div class="col-lg-4">
        <div class="row g-3">
            {{-- Status Management --}}
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header card-header-gradient">
                        <h6 class="mb-0 text-white">
                            <i class="fas fa-tags me-2"></i>
                            Kelola Status
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ route('admin.contacts.show', $contact) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label small text-muted">Status Saat Ini</label>
                                <div class="current-status status-{{ $contact->status }} p-2 rounded text-center mb-3">
                                    @if($contact->status == 'unread')
                                        <i class="fas fa-eye-slash me-2"></i>Belum Dibaca
                                    @elseif($contact->status == 'read')
                                        <i class="fas fa-eye me-2"></i>Sudah Dibaca
                                    @else
                                        <i class="fas fa-reply me-2"></i>Sudah Dibalas
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label small text-muted">Ubah Status</label>
                                <select name="status" id="status" class="form-select" onchange="updateButtonText(this)">
                                    <option value="unread" {{ $contact->status == 'unread' ? 'selected' : '' }}>📥 Belum Dibaca</option>
                                    <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>👁️ Sudah Dibaca</option>
                                    <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>✅ Sudah Dibalas</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-gradient w-100" id="statusButton">
                                <i class="fas fa-sync me-2"></i>
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">
                            <i class="fas fa-bolt me-2"></i>
                            Aksi Cepat
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="d-grid gap-2">
                            @if($contact->status == 'unread')
                            <form action="{{ route('admin.contacts.markAsRead', $contact) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-check me-2"></i>
                                    Tandai Dibaca
                                </button>
                            </form>
                            @endif

                            <a href="https://wa.me/{{ $contact->phone }}?text=Halo%20{{ urlencode($contact->name) }},%20terima%20kasih%20telah%20menghubungi%20kami.%20Bagaimana%20bisa%20kami%20membantu%20Anda%20terkait%20{{ urlencode($contact->purpose_label) }}%3F"
                               target="_blank"
                               class="btn btn-success">
                                <i class="fab fa-whatsapp me-2"></i>
                                Balas WhatsApp
                            </a>

                            <a href="mailto:{{ $contact->email }}?subject=Balasan:%20{{ urlencode($contact->purpose_label) }}%20-%20Rental%20Mobil&body=Yth.%20{{ urlencode($contact->name) }},%0A%0ATerima%20kasih%20telah%20menghubungi%20kami%20melalui%20website%20rental%20mobil.%0A%0ABerikut%20adalah%20balasan%20kami%20terkait%20{{ urlencode($contact->purpose_label) }}%20yang%20Anda%20tanyakan:%0A%0A%0A%0AHormat%20kami,%0ATim%20Rental%20Mobil"
                               class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>
                                Balas Email
                            </a>

                            <button type="button"
                                    class="btn btn-outline-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-2"></i>
                                Hapus Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Timeline --}}
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-info text-white">
                        <h6 class="mb-0">
                            <i class="fas fa-history me-2"></i>
                            Timeline
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <small class="text-muted">Pesan Diterima</small>
                                    <div class="fw-bold">{{ $contact->created_at->format('d M Y H:i') }}</div>
                                </div>
                            </div>
                            @if($contact->status != 'unread')
                            <div class="timeline-item">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <small class="text-muted">Pesan Dibaca</small>
                                    <div class="fw-bold">{{ $contact->updated_at->format('d M Y H:i') }}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning border-0">
                    <div class="d-flex">
                        <i class="fas fa-exclamation-circle fa-2x text-warning me-3"></i>
                        <div>
                            <h6 class="alert-heading mb-2">Peringatan!</h6>
                            <p class="mb-0">Anda akan menghapus pesan dari <strong>{{ $contact->name }}</strong>. Tindakan ini tidak dapat dibatalkan dan semua data pesan akan hilang permanen.</p>
                        </div>
                    </div>
                </div>
                <div class="message-preview bg-light p-3 rounded small">
                    <strong>Preview Pesan:</strong><br>
                    {{ Str::limit($contact->message, 150) }}
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Hapus Permanen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced Card Header Gradient */
.card-header-gradient {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
    border: none !important;
}

/* Avatar Circle */
.avatar-circle {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

/* Message Box */
.message-box {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid #dee2e6;
    border-radius: 12px;
    padding: 1.5rem;
    white-space: pre-wrap;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Purpose Badges */
.purpose-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
}

.purpose-booking { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
.purpose-info { background: linear-gradient(135deg, #10b981 0%, #047857 100%); }
.purpose-partnership { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
.purpose-complaint { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
.purpose-other { background: linear-gradient(135deg, #6b7280 0%, #374151 100%); }

/* Status Badges */
.status-badge {
    display: inline-block;
    padding: 0.4rem 0.8rem;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
}

.status-unread {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: white;
}
.status-read {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
    color: white;
}
.status-replied {
    background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
    color: white;
}

.current-status {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.875rem;
}

/* Message Meta */
.message-meta {
    border-top: 1px solid #e9ecef;
    padding-top: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.meta-item i {
    width: 20px;
    text-align: center;
}

/* Timeline */
.timeline {
    position: relative;
    padding-left: 2rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 1rem;
}

.timeline-marker {
    position: absolute;
    left: -2rem;
    top: 0.25rem;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 0 0 2px #e9ecef;
}

.timeline-content {
    margin-left: 0;
}

/* Button Gradient */
.btn-gradient {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    border: none;
    color: white;
    font-weight: 600;
}

.btn-gradient:hover {
    background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .avatar-circle {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }

    .card-header-gradient .d-flex {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 1rem;
    }

    .card-header-gradient .text-end {
        text-align: left !important;
        width: 100%;
    }

    .message-box {
        padding: 1rem;
        font-size: 0.9rem;
    }
}
</style>

<script>
// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    // Update button text based on status selection
    window.updateButtonText = function(select) {
        const button = document.getElementById('statusButton');
        const statusText = select.options[select.selectedIndex].text;
        button.innerHTML = `<i class="fas fa-sync me-2"></i>Update ke: ${statusText}`;
    };

    // Initialize button text
    const statusSelect = document.getElementById('status');
    if (statusSelect) {
        updateButtonText(statusSelect);
    }
});

// Enhanced delete confirmation
document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function() {
            // Add any additional logic when modal opens
        });
    }
});
</script>
@endsection
