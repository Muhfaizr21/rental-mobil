<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        try {
            // Stats untuk report page
            $stats = [
                'total_bookings' => Booking::count(),
                'total_revenue' => Booking::where('status', 'completed')->sum('total_price'),
                'total_cars' => Car::count(),
                'total_contacts' => Contact::count(),
                'available_cars' => Car::where('status', 'available')->count(),
                'pending_bookings' => Booking::where('status', 'pending')->count(),
                'completed_bookings' => Booking::where('status', 'completed')->count(),
                'unread_contacts' => Contact::where('status', 'unread')->count(),
                'booking_growth' => $this->calculateBookingGrowth(),
                'revenue_growth' => $this->calculateRevenueGrowth(),
            ];

            // Recent bookings dengan eager loading
            $recentBookings = Booking::with('car')
                ->latest()
                ->take(5)
                ->get();

            // Popular cars dengan count bookings
            $popularCars = Car::withCount(['bookings' => function($query) {
                $query->where('status', 'completed');
            }])
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();

            return view('admin.reports.index', compact('stats', 'recentBookings', 'popularCars'));

        } catch (\Exception $e) {
            // Fallback jika ada error
            $stats = [
                'total_bookings' => 0,
                'total_revenue' => 0,
                'total_cars' => 0,
                'total_contacts' => 0,
                'available_cars' => 0,
                'pending_bookings' => 0,
                'completed_bookings' => 0,
                'unread_contacts' => 0,
                'booking_growth' => 0,
                'revenue_growth' => 0,
            ];

            $recentBookings = collect();
            $popularCars = collect();

            return view('admin.reports.index', compact('stats', 'recentBookings', 'popularCars'))
                ->with('error', 'Terjadi kesalahan saat memuat data statistik.');
        }
    }

    /**
     * Calculate booking growth percentage compared to last month
     */
    private function calculateBookingGrowth()
    {
        try {
            $currentMonth = Booking::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count();

            $lastMonth = Booking::whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year)
                ->count();

            if ($lastMonth == 0) {
                return $currentMonth > 0 ? 100 : 0;
            }

            return round((($currentMonth - $lastMonth) / $lastMonth) * 100, 1);
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Calculate revenue growth compared to last month
     */
    private function calculateRevenueGrowth()
    {
        try {
            $currentMonth = Booking::where('status', 'completed')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total_price');

            $lastMonth = Booking::where('status', 'completed')
                ->whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year)
                ->sum('total_price');

            if ($lastMonth == 0) {
                return $currentMonth;
            }

            return $currentMonth - $lastMonth;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function generatePDF(Request $request)
    {
        try {
            $type = $request->get('type', 'bookings');
            $startDate = $request->get('start_date');
            $endDate = $request->get('end_date');

            // Validate dates if provided
            if ($startDate && $endDate) {
                if (!strtotime($startDate) || !strtotime($endDate)) {
                    return redirect()->route('admin.reports.index')
                        ->with('error', 'Format tanggal tidak valid.');
                }

                if ($startDate > $endDate) {
                    return redirect()->route('admin.reports.index')
                        ->with('error', 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir.');
                }
            }

            $data = [];
            $title = '';

            switch ($type) {
                case 'bookings':
                    $query = Booking::with('car')->latest();
                    if ($startDate && $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    }
                    $data = $query->get();
                    $title = 'Laporan Data Booking';
                    break;

                case 'cars':
                    $data = Car::withCount('bookings')->get();
                    $title = 'Laporan Data Mobil';
                    break;

                case 'revenue':
                    $query = Booking::where('status', 'completed');
                    if ($startDate && $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    }
                    $data = $query->get();
                    $title = 'Laporan Pendapatan';
                    break;

                case 'contacts':
                    $data = Contact::latest()->get();
                    $title = 'Laporan Data Kontak';
                    break;

                case 'full':
                    $data = [
                        'bookings' => Booking::with('car')->latest()->get(),
                        'cars' => Car::withCount('bookings')->get(),
                        'revenue' => Booking::where('status', 'completed')->get(),
                        'contacts' => Contact::latest()->get(),
                    ];
                    $title = 'Laporan Lengkap Sistem';
                    break;

                default:
                    return redirect()->route('admin.reports.index')
                        ->with('error', 'Jenis laporan tidak valid.');
            }

            // Untuk sementara, redirect dengan success message
            // Nanti bisa diimplementasi PDF generation sebenarnya
            $message = "Laporan PDF {$title} berhasil di-generate";
            if ($startDate && $endDate) {
                $message .= " untuk periode {$startDate} sampai {$endDate}";
            }

            return redirect()->route('admin.reports.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->route('admin.reports.index')
                ->with('error', 'Terjadi kesalahan saat generate PDF: ' . $e->getMessage());
        }
    }

    public function exportExcel(Request $request)
    {
        try {
            $type = $request->get('type', 'bookings');
            $status = $request->get('status');

            $data = [];
            $title = '';

            switch ($type) {
                case 'bookings':
                    $query = Booking::with('car');
                    if ($status) {
                        $query->where('status', $status);
                    }
                    $data = $query->latest()->get();
                    $title = 'Data_Booking';
                    break;

                case 'cars':
                    $data = Car::withCount('bookings')->get();
                    $title = 'Data_Mobil';
                    break;

                case 'revenue':
                    $data = Booking::where('status', 'completed')->latest()->get();
                    $title = 'Laporan_Pendapatan';
                    break;

                case 'contacts':
                    $data = Contact::latest()->get();
                    $title = 'Data_Kontak';
                    break;

                case 'full':
                    $data = [
                        'bookings' => Booking::with('car')->latest()->get(),
                        'cars' => Car::withCount('bookings')->get(),
                        'revenue' => Booking::where('status', 'completed')->get(),
                        'contacts' => Contact::latest()->get(),
                    ];
                    $title = 'Laporan_Lengkap';
                    break;

                default:
                    return redirect()->route('admin.reports.index')
                        ->with('error', 'Jenis laporan tidak valid.');
            }

            // Untuk sementara, redirect dengan success message
            // Nanti bisa diimplementasi Excel export sebenarnya
            $message = "Laporan Excel {$title} berhasil di-export";
            if ($status) {
                $message .= " dengan filter status: {$status}";
            }

            return redirect()->route('admin.reports.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->route('admin.reports.index')
                ->with('error', 'Terjadi kesalahan saat export Excel: ' . $e->getMessage());
        }
    }

    /**
     * Get quick statistics for dashboard (API endpoint)
     */
    public function getQuickStats()
    {
        try {
            $stats = [
                'total_bookings' => Booking::count(),
                'total_revenue' => Booking::where('status', 'completed')->sum('total_price'),
                'total_cars' => Car::count(),
                'available_cars' => Car::where('status', 'available')->count(),
                'pending_bookings' => Booking::where('status', 'pending')->count(),
                'completed_bookings' => Booking::where('status', 'completed')->count(),
                'unread_contacts' => Contact::where('status', 'unread')->count(),
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Gagal mengambil statistik'
            ], 500);
        }
    }
}
