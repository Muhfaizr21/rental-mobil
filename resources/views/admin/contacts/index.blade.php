@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title mb-2">
                            <i class="fas fa-envelope me-3"></i>Pesan Masuk
                        </h1>
                        <p class="page-subtitle mb-0">Kelola semua pesan dari pelanggan dan pengunjung</p>
                    </div>
                    <div class="header-stats">
                        <div class="stat-badge">
                            <i class="fas fa-inbox me-2"></i>
                            Total: {{ $contacts->total() }}
                        </div>
                        <div class="stat-badge unread">
                            <i class="fas fa-eye-slash me-2"></i>
                            Belum Dibaca: {{ $unreadCount }}
                        </div>
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

    <!-- Filter Section -->
    <div class="card-custom mb-4">
        <div class="card-header-custom">
            <h5 class="mb-0">
                <i class="fas fa-filter me-2"></i>Filter Pesan
            </h5>
        </div>
        <div class="card-body-custom">
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="{{ route('admin.contacts.index') }}"
                       class="filter-btn {{ !request('status') ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $totalCount }}</h4>
                            <span>Semua Pesan</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}"
                       class="filter-btn {{ request('status') == 'unread' ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-eye-slash"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $unreadCount }}</h4>
                            <span>Belum Dibaca</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.contacts.index', ['status' => 'read']) }}"
                       class="filter-btn {{ request('status') == 'read' ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $readCount }}</h4>
                            <span>Sudah Dibaca</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.contacts.index', ['status' => 'replied']) }}"
                       class="filter-btn {{ request('status') == 'replied' ? 'filter-active' : '' }}">
                        <div class="filter-icon">
                            <i class="fas fa-reply"></i>
                        </div>
                        <div class="filter-content">
                            <h4>{{ $repliedCount }}</h4>
                            <span>Sudah Dibalas</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacts Table -->
    <div class="card-custom">
        <div class="card-header-custom">
            <h5 class="mb-0">
                <i class="fas fa-list-ul me-2"></i>Daftar Pesan
            </h5>
            <div class="card-header-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari pesan..." class="form-control">
                </div>
            </div>
        </div>
        <div class="card-body-custom">
            <div class="table-responsive">
                <table class="table-custom" id="contactsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pengirim</th>
                            <th>Kontak</th>
                            <th>Keperluan</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                        <tr class="contact-row {{ $contact->status == 'unread' ? 'unread-message' : '' }}">
                            <td>
                                <div class="row-number">{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</div>
                            </td>
                            <td>
                                <div class="sender-info">
                                    <div class="sender-avatar">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                    </div>
                                    <div class="sender-details">
                                        <div class="sender-name">{{ $contact->name }}</div>
                                        <div class="sender-purpose">
                                            <span class="purpose-badge purpose-{{ $contact->purpose }}">
                                                {{ $contact->purpose }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <div class="contact-email">
                                        <i class="fas fa-envelope me-2 text-primary"></i>
                                        {{ $contact->email }}
                                    </div>
                                    <div class="contact-phone">
                                        <i class="fas fa-phone me-2 text-success"></i>
                                        {{ $contact->phone }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="purpose-info">
                                    @if($contact->purpose == 'booking')
                                        <i class="fas fa-calendar-check me-2 text-info"></i>
                                        <span>Booking Mobil</span>
                                    @elseif($contact->purpose == 'info')
                                        <i class="fas fa-info-circle me-2 text-primary"></i>
                                        <span>Informasi</span>
                                    @elseif($contact->purpose == 'partnership')
                                        <i class="fas fa-handshake me-2 text-warning"></i>
                                        <span>Partnership</span>
                                    @elseif($contact->purpose == 'complaint')
                                        <i class="fas fa-exclamation-triangle me-2 text-danger"></i>
                                        <span>Komplain</span>
                                    @else
                                        <i class="fas fa-question-circle me-2 text-secondary"></i>
                                        <span>Lainnya</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="message-preview">
                                    {{ Str::limit($contact->message, 80) }}
                                    @if(strlen($contact->message) > 80)
                                        <span class="read-more" data-bs-toggle="tooltip" title="{{ $contact->message }}">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="status-badge status-{{ $contact->status }}">
                                    @if($contact->status == 'unread')
                                        <i class="fas fa-eye-slash me-1"></i>Belum Dibaca
                                    @elseif($contact->status == 'read')
                                        <i class="fas fa-eye me-1"></i>Sudah Dibaca
                                    @else
                                        <i class="fas fa-reply me-1"></i>Sudah Dibalas
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="date-day">{{ $contact->created_at->format('d M Y') }}</div>
                                    <div class="date-time">{{ $contact->created_at->format('H:i') }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                       class="btn-action btn-view"
                                       title="Lihat Detail"
                                       data-bs-toggle="tooltip">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    @if($contact->status == 'unread')
                                    <form action="{{ route('admin.contacts.markAsRead', $contact) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn-action btn-mark-read" title="Tandai Sudah Dibaca">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    @endif

                                    <a href="mailto:{{ $contact->email }}?subject=Balasan: {{ $contact->purpose }}&body=Halo {{ $contact->name }},"
                                       class="btn-action btn-reply"
                                       title="Balas Email"
                                       data-bs-toggle="tooltip">
                                        <i class="fas fa-reply"></i>
                                    </a>

                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn-action btn-delete"
                                                title="Hapus Pesan"
                                                data-bs-toggle="tooltip"
                                                onclick="return confirm('Yakin ingin menghapus pesan ini?')">
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
                                    <i class="fas fa-envelope-open fa-4x mb-3"></i>
                                    <h5>Tidak ada pesan</h5>
                                    <p class="text-muted">Belum ada pesan yang masuk</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($contacts->hasPages())
            <div class="pagination-wrapper">
                <nav>
                    <ul class="pagination-custom">
                        {{-- Previous Page Link --}}
                        @if($contacts->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">
                                    <i class="fas fa-chevron-left me-2"></i>Previous
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $contacts->previousPageUrl() }}">
                                    <i class="fas fa-chevron-left me-2"></i>Previous
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($contacts->getUrlRange(1, $contacts->lastPage()) as $page => $url)
                            @if($page == $contacts->currentPage())
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
                        @if($contacts->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $contacts->nextPageUrl() }}">
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

.header-stats {
    display: flex;
    gap: 1rem;
}

.stat-badge {
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-size: 0.875rem;
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
}

.stat-badge.unread {
    background: rgba(251, 191, 36, 0.3);
    border: 1px solid rgba(251, 191, 36, 0.5);
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

.contact-row {
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.contact-row:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.contact-row.unread-message {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-left: 4px solid #f59e0b;
}

.contact-row td {
    padding: 1.25rem 1.5rem;
    border: none;
    vertical-align: middle;
}

.contact-row td:first-child {
    border-radius: 12px 0 0 12px;
}

.contact-row td:last-child {
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

.sender-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.sender-avatar {
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

.sender-name {
    font-weight: 700;
    color: #1a1b2e;
    margin-bottom: 0.25rem;
}

.purpose-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: capitalize;
}

.purpose-booking {
    background: #dbeafe;
    color: #1e40af;
}

.purpose-info {
    background: #d1fae5;
    color: #065f46;
}

.purpose-partnership {
    background: #fef3c7;
    color: #92400e;
}

.purpose-complaint {
    background: #fee2e2;
    color: #991b1b;
}

.purpose-other {
    background: #f3f4f6;
    color: #374151;
}

.contact-info {
    min-width: 150px;
}

.contact-email,
.contact-phone {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

.purpose-info {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
    font-weight: 600;
}

.message-preview {
    max-width: 200px;
    font-size: 0.875rem;
    color: #64748b;
}

.read-more {
    color: #1e3c72;
    cursor: pointer;
}

.status-badge {
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
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

.date-info {
    text-align: center;
    min-width: 100px;
}

.date-day {
    font-weight: 600;
    color: #1a1b2e;
    margin-bottom: 0.25rem;
}

.date-time {
    color: #64748b;
    font-size: 0.875rem;
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

.btn-mark-read {
    background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
    color: white;
}

.btn-reply {
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

    .sender-info {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }

    .action-buttons {
        flex-direction: column;
    }
}

@media (max-width: 768px) {
    .page-header-card > div {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .header-stats {
        justify-content: center;
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
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('.contact-row');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchValue) ? '' : 'none';
        });
    });

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    // Smooth animations on load
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

    // Mark as read with loading state
    const markAsReadForms = document.querySelectorAll('form[action*="markAsRead"]');
    markAsReadForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button');
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        });
    });
});
</script>
@endsection
