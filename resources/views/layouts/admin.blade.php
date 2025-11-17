<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - @yield('title', 'RentGoid Dashboard')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --secondary-gradient: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%);
            --success-gradient: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            --warning-gradient: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            --dark: #0a0f2b;
            --sidebar-width: 280px;
            --navy-primary: #1e3c72;
            --navy-secondary: #2a5298;
            --navy-dark: #0a0f2b;
            --navy-light: #4a6491;
        }

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            overflow-x: hidden;
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.03"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
            z-index: 0;
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            width: var(--sidebar-width);
            background: rgba(10, 15, 43, 0.95);
            backdrop-filter: blur(20px);
            position: fixed;
            box-shadow: 0 0 50px rgba(0,0,0,0.5);
            z-index: 1000;
            border-right: 1px solid rgba(255,255,255,0.1);
            overflow-y: auto;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(30, 60, 114, 0.1) 0%, transparent 100%);
            pointer-events: none;
        }

        .sidebar-brand {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: relative;
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.2) 0%, rgba(42, 82, 152, 0.2) 100%);
        }

        .sidebar-brand .brand-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            background: var(--primary-gradient);
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 8px 20px rgba(30, 60, 114, 0.4);
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .sidebar-brand h4 {
            color: white;
            font-weight: 800;
            margin: 0;
            font-size: 1.5rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .sidebar-brand p {
            color: rgba(255,255,255,0.6);
            font-size: 0.75rem;
            margin: 0;
            font-weight: 500;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 1rem 1.5rem;
            margin: 0.3rem 1rem;
            border-radius: 12px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .sidebar .nav-link:hover {
            color: white;
            transform: translateX(8px);
        }

        .sidebar .nav-link:hover::before {
            left: 0;
        }

        .sidebar .nav-link.active {
            color: white;
            background: var(--primary-gradient);
            box-shadow: 0 8px 25px rgba(30, 60, 114, 0.5);
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            width: 25px;
            margin-right: 12px;
            font-size: 1.15rem;
        }

        .sidebar-footer {
            position: sticky;
            bottom: 0;
            width: 100%;
            padding: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            background: rgba(10, 15, 43, 0.9);
            backdrop-filter: blur(10px);
        }

        /* Main Content Area */
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* Top Navbar */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border-radius: 20px;
            margin: 1.5rem;
            padding: 1rem 2rem;
            border: 1px solid rgba(255,255,255,0.3);
            position: relative;
            overflow: hidden;
        }

        .navbar-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-gradient);
        }

        .navbar-toggler {
            border: none;
            background: var(--primary-gradient);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3); }
            50% { box-shadow: 0 4px 25px rgba(30, 60, 114, 0.6); }
        }

        .user-dropdown .dropdown-toggle {
            border: none;
            background: transparent;
            color: var(--dark);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .user-dropdown .dropdown-toggle:hover {
            background: rgba(30, 60, 114, 0.1);
        }

        /* Content Wrapper */
        .content-wrapper {
            padding: 0 1.5rem 2rem 1.5rem;
        }

        /* Alert Custom */
        .alert-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            margin: 1.5rem;
            backdrop-filter: blur(10px);
            border-left: 4px solid #ffc107;
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .navbar-custom {
                margin: 1rem;
                padding: 1rem;
            }

            .content-wrapper {
                padding: 0 1rem 1rem 1rem;
            }
        }

        /* Dashboard Card Styles */
        .stat-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .stat-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3) !important;
        }

        .stat-icon {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Table Styling */
        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background: var(--primary-gradient);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        .table tbody tr:hover {
            background-color: rgba(30, 60, 114, 0.05);
        }

        /* Status Indicators */
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .status-available { background-color: #28a745; }
        .status-rented { background-color: #ffc107; }
        .status-maintenance { background-color: #dc3545; }

        /* Badge Styles */
        .badge {
            font-weight: 600;
            padding: 0.5rem 0.75rem;
            border-radius: 10px;
        }

        /* Card Header Gradient */
        .card-header-gradient {
            background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
        }

        /* Custom Button Styles */
        .btn-gradient {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
            color: white;
        }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.25);
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .modal-header {
            background: var(--primary-gradient);
            color: white;
            border-radius: 20px 20px 0 0;
            border: none;
        }

        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }

        .page-link {
            border: none;
            border-radius: 10px;
            margin: 0 5px;
            color: #1e3c72;
            font-weight: 600;
        }

        .page-item.active .page-link {
            background: var(--primary-gradient);
            color: white;
        }

        /* Contact Messages Specific Styles */
        .message-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border-left: 4px solid #1e3c72;
        }

        .message-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .message-card.unread {
            border-left-color: #ffc107;
            background: linear-gradient(135deg, #fffbf0 0%, #ffffff 100%);
        }

        .message-card.replied {
            border-left-color: #28a745;
            background: linear-gradient(135deg, #f0fff4 0%, #ffffff 100%);
        }

        .purpose-badge {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .purpose-booking { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; }
        .purpose-info { background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%); color: white; }
        .purpose-complaint { background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white; }
        .purpose-partnership { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; }
        .purpose-other { background: linear-gradient(135deg, #a8c0ff 0%, #3f2b96 100%); color: white; }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .status-unread { background: #fff3cd; color: #856404; }
        .status-read { background: #d1ecf1; color: #0c5460; }
        .status-replied { background: #d4edda; color: #155724; }

        .quick-action-btn {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .stat-item {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6c757d;
            font-weight: 600;
            font-size: 0.9rem;
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-wrapper">
                <div class="logo-icon">
                    <i class="fas fa-car"></i>
                </div>
                <div>
                    <h4>RentGoid</h4>
                    <p>Admin Control Panel</p>
                </div>
            </div>
        </div>

        <div class="sidebar-nav mt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.cars.*') ? 'active' : '' }}"
                       href="{{ route('admin.cars.index') }}">
                        <i class="fas fa-car-side"></i>
                        Manajemen Mobil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}"
                       href="{{ route('admin.bookings.index') }}">
                        <i class="fas fa-calendar-check"></i>
                        Manajemen Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"
                       href="{{ route('admin.contacts.index') }}">
                        <i class="fas fa-envelope"></i>
                        Pesan Masuk
                        @php
                            use Illuminate\Support\Facades\Schema;
                            $unreadCount = 0;
                            try {
                                if (Schema::hasTable('contacts')) {
                                    $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
                                }
                            } catch (Exception $e) {
                                $unreadCount = 0;
                            }
                        @endphp
                        @if($unreadCount > 0)
                            <span class="badge bg-warning ms-2">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}"
                       href="{{ route('admin.reports.index') }}">
                        <i class="fas fa-chart-line"></i>
                        Laporan & Analytics
                    </a>
                </li>
            </ul>

            <div class="mt-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.home') }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            Lihat Website
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sidebar-footer">
            @auth
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="user-avatar me-2">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="text-white small fw-bold">{{ Auth::user()->name }}</div>
                        <div class="text-white-50" style="font-size: 0.75rem;">Administrator</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-white-50 p-0" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
            @else
            <div class="text-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </a>
            </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="navbar-nav ms-auto">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Live Time -->
                        <div class="text-dark fw-bold">
                            <i class="fas fa-clock me-2"></i>
                            <span id="liveTime"></span>
                        </div>

                        <!-- User Dropdown -->
                        @auth
                        <div class="dropdown user-dropdown">
                            <button class="dropdown-toggle d-flex align-items-center" type="button"
                                    data-bs-toggle="dropdown">
                                <div class="user-avatar me-2">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><h6 class="dropdown-header">Akun</h6></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user me-2"></i>Profil
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Guest Alert -->
        @guest
        <div class="alert alert-warning alert-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle me-3 fa-lg"></i>
                <div>
                    <strong>Perhatian!</strong> Anda browsing sebagai guest.
                    <a href="{{ route('login') }}" class="alert-link fw-bold">Login</a> untuk akses penuh.
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endguest

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-3 fa-lg"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-3 fa-lg"></i>
                <div>{{ session('error') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Page Content -->
        <div class="content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Auto-dismiss alerts
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });

        // Close sidebar on link click (mobile)
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    document.getElementById('sidebar').classList.remove('show');
                }
            });
        });

        // Live Time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const timeElement = document.getElementById('liveTime');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }
        updateTime();
        setInterval(updateTime, 1000);

        // Confirm delete
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }

        // Mark as read - PERBAIKAN: Update URL untuk contacts
        function markAsRead(contactId) {
            fetch(`/admin/contacts/${contactId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    status: 'read'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    </script>

    @yield('scripts')
</body>
</html>
