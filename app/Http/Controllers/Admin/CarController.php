<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->paginate(10);

        // Hitung statistik dari seluruh database
        $stats = Car::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN status = "available" THEN 1 ELSE 0 END) as available,
            SUM(CASE WHEN status = "rented" THEN 1 ELSE 0 END) as rented,
            SUM(CASE WHEN status = "maintenance" THEN 1 ELSE 0 END) as maintenance
        ')->first();

        return view('admin.cars.index', compact('cars', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255|unique:cars',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'price_per_day' => 'required|numeric|min:0',
            'color' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255|in:petrol,diesel,electric,hybrid',
            'transmission' => 'nullable|string|max:255|in:manual,automatic',
            'seat_capacity' => 'nullable|integer|min:1|max:20',
            'status' => 'required|in:available,rented,maintenance'
        ], [
            'plate_number.unique' => 'Nomor plat sudah terdaftar',
            'price_per_day.min' => 'Harga harus lebih dari 0',
            'year.min' => 'Tahun mobil tidak valid',
            'year.max' => 'Tahun mobil tidak valid'
        ]);

        try {
            Car::create($validated);

            Log::info('New car created', [
                'brand' => $validated['brand'],
                'model' => $validated['model'],
                'plate_number' => $validated['plate_number'],
                'created_by' => auth()->id()
            ]);

            return redirect()->route('admin.cars.index')
                ->with('success', 'Mobil berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Car creation failed: ' . $e->getMessage(), [
                'request_data' => $request->except('_token')
            ]);

            return redirect()->back()
                ->with('error', 'Gagal menambahkan mobil. Silakan coba lagi.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        // Load related bookings
        $bookings = $car->bookings()
            ->with('car')
            ->latest()
            ->paginate(10);

        return view('admin.cars.show', compact('car', 'bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cars')->ignore($car->id)
            ],
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'price_per_day' => 'required|numeric|min:0',
            'color' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255|in:petrol,diesel,electric,hybrid',
            'transmission' => 'nullable|string|max:255|in:manual,automatic',
            'seat_capacity' => 'nullable|integer|min:1|max:20',
            'status' => 'required|in:available,rented,maintenance'
        ], [
            'plate_number.unique' => 'Nomor plat sudah terdaftar',
            'price_per_day.min' => 'Harga harus lebih dari 0',
            'year.min' => 'Tahun mobil tidak valid',
            'year.max' => 'Tahun mobil tidak valid'
        ]);

        try {
            $oldData = $car->toArray();
            $car->update($validated);

            Log::info('Car updated', [
                'car_id' => $car->id,
                'old_data' => $oldData,
                'new_data' => $validated,
                'updated_by' => auth()->id()
            ]);

            return redirect()->route('admin.cars.index')
                ->with('success', 'Data mobil berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Car update failed: ' . $e->getMessage(), [
                'car_id' => $car->id,
                'request_data' => $request->except('_token', '_method')
            ]);

            return redirect()->back()
                ->with('error', 'Gagal memperbarui data mobil. Silakan coba lagi.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
            // Cek apakah mobil memiliki booking aktif
            $hasActiveBookings = $car->bookings()
                ->whereIn('status', ['pending', 'approved'])
                ->exists();

            if ($hasActiveBookings) {
                return redirect()->route('admin.cars.index')
                    ->with('error', 'Tidak dapat menghapus mobil yang memiliki booking aktif!');
            }

            $carName = $car->brand . ' ' . $car->model . ' (' . $car->plate_number . ')';

            // Soft delete
            $car->delete();

            Log::info('Car soft deleted', [
                'car_id' => $car->id,
                'car_name' => $carName,
                'deleted_by' => auth()->id()
            ]);

            return redirect()->route('admin.cars.index')
                ->with('success', 'Mobil berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Car deletion failed: ' . $e->getMessage(), [
                'car_id' => $car->id
            ]);

            return redirect()->route('admin.cars.index')
                ->with('error', 'Gagal menghapus mobil: ' . $e->getMessage());
        }
    }

    /**
     * Quick update status - FIXED: Using POST method
     */
    public function updateStatus(Request $request, Car $car)
    {
        try {
            $request->validate([
                'status' => 'required|in:available,rented,maintenance'
            ]);

            $oldStatus = $car->status;
            $car->update(['status' => $request->status]);

            Log::info('Car status updated', [
                'car_id' => $car->id,
                'car_name' => $car->brand . ' ' . $car->model,
                'from_status' => $oldStatus,
                'to_status' => $request->status,
                'updated_by' => auth()->id()
            ]);

            return back()->with('success', 'Status mobil berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Car status update failed: ' . $e->getMessage(), [
                'car_id' => $car->id,
                'request_data' => $request->all()
            ]);

            return back()->with('error', 'Gagal mengupdate status mobil. Silakan coba lagi.');
        }
    }

    /**
     * Show trashed cars
     */
    public function trashed()
    {
        $cars = Car::onlyTrashed()->latest()->paginate(10);

        // Statistik untuk trashed page
        $stats = Car::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN status = "available" THEN 1 ELSE 0 END) as available,
            SUM(CASE WHEN status = "rented" THEN 1 ELSE 0 END) as rented,
            SUM(CASE WHEN status = "maintenance" THEN 1 ELSE 0 END) as maintenance
        ')->first();

        return view('admin.cars.trashed', compact('cars', 'stats'));
    }

    /**
     * Restore trashed car
     */
    public function restore($id)
    {
        try {
            $car = Car::withTrashed()->findOrFail($id);
            $car->restore();

            Log::info('Car restored', [
                'car_id' => $car->id,
                'car_name' => $car->brand . ' ' . $car->model,
                'restored_by' => auth()->id()
            ]);

            return redirect()->route('admin.cars.index')
                ->with('success', 'Mobil berhasil dipulihkan!');

        } catch (\Exception $e) {
            Log::error('Car restore failed: ' . $e->getMessage(), [
                'car_id' => $id
            ]);

            return redirect()->route('admin.cars.trashed')
                ->with('error', 'Gagal memulihkan mobil: ' . $e->getMessage());
        }
    }

    /**
     * Force delete car permanently
     */
    public function forceDelete($id)
    {
        try {
            $car = Car::withTrashed()->findOrFail($id);

            // Check if car has any bookings
            if ($car->bookings()->count() > 0) {
                return redirect()->route('admin.cars.trashed')
                    ->with('error', 'Tidak dapat menghapus permanen mobil yang memiliki riwayat booking!');
            }

            $carName = $car->brand . ' ' . $car->model . ' (' . $car->plate_number . ')';
            $car->forceDelete();

            Log::warning('Car permanently deleted', [
                'car_id' => $id,
                'car_name' => $carName,
                'deleted_by' => auth()->id()
            ]);

            return redirect()->route('admin.cars.trashed')
                ->with('success', 'Mobil berhasil dihapus permanen!');

        } catch (\Exception $e) {
            Log::error('Car force delete failed: ' . $e->getMessage(), [
                'car_id' => $id
            ]);

            return redirect()->route('admin.cars.trashed')
                ->with('error', 'Gagal menghapus mobil permanen: ' . $e->getMessage());
        }
    }
}
