<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'home')->name('landing.home');
    Route::get('/pricing', 'pricing')->name('landing.pricing');
    Route::get('/car/{id}', 'detail')->name('landing.detail');
    Route::get('/contact', 'contact')->name('landing.contact');
    Route::post('/contact', 'contactStore')->name('landing.contact.store');
});

/*
|--------------------------------------------------------------------------
| CHATBOT
|--------------------------------------------------------------------------
*/
Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage'])
    ->middleware('throttle:10,1')
    ->name('chatbot.send');

/*
|--------------------------------------------------------------------------
| ADMIN AREA (secured)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // Cars - dengan rate limiting
        Route::resource('cars', CarController::class)->middleware('throttle:30,1');
        Route::post('cars/{car}/status', [CarController::class, 'updateStatus'])
            ->name('cars.updateStatus')
            ->middleware('throttle:20,1');
        Route::get('cars/trashed/list', [CarController::class, 'trashed'])
            ->name('cars.trashed')
            ->middleware('throttle:20,1');
        Route::post('cars/{id}/restore', [CarController::class, 'restore'])
            ->name('cars.restore')
            ->middleware('throttle:10,1');
        Route::delete('cars/{id}/force-delete', [CarController::class, 'forceDelete'])
            ->name('cars.forceDelete')
            ->middleware('throttle:10,1');

        // Bookings - dengan rate limiting
        Route::resource('bookings', BookingController::class)->middleware('throttle:30,1');
        Route::post('bookings/{booking}/status', [BookingController::class, 'updateStatus'])
            ->name('bookings.updateStatus')
            ->middleware('throttle:20,1');
        Route::post('bookings/calculate-price', [BookingController::class, 'calculatePrice'])
            ->name('bookings.calculatePrice')
            ->middleware('throttle:30,1');

        // Contacts - FIXED: Tambahkan route yang missing
        Route::resource('contacts', ContactController::class)->middleware('throttle:30,1');
        Route::post('contacts/{contact}/mark-as-read', [ContactController::class, 'markAsRead'])
            ->name('contacts.markAsRead')
            ->middleware('throttle:20,1');
        Route::patch('contacts/{contact}/status', [ContactController::class, 'updateStatus'])
            ->name('contacts.updateStatus')
            ->middleware('throttle:20,1');
        Route::post('contacts/mark-all-read', [ContactController::class, 'markAllRead'])
            ->name('contacts.markAllRead')
            ->middleware('throttle:10,1');
        Route::post('contacts/bulk-action', [ContactController::class, 'bulkAction'])
            ->name('contacts.bulkAction')
            ->middleware('throttle:10,1');

        // Reports - dengan rate limiting
        Route::get('reports', [ReportController::class, 'index'])
            ->name('reports.index')
            ->middleware('throttle:20,1');
        Route::post('reports/generate-pdf', [ReportController::class, 'generatePDF'])
            ->name('reports.generatePDF')
            ->middleware('throttle:10,1');
        Route::post('reports/export-excel', [ReportController::class, 'exportExcel'])
            ->name('reports.exportExcel')
            ->middleware('throttle:10,1');
    });

/*
|--------------------------------------------------------------------------
| USER PROFILE - dengan security enhancement
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Hapus password.confirm untuk kemudahan user, atau tambahkan hanya untuk sensitive actions
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit')
        ->middleware('throttle:10,1');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update')
        ->middleware('throttle:10,1');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy')
        ->middleware('throttle:5,1');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| LOCAL TEST ONLY - dengan security
|--------------------------------------------------------------------------
*/
if (app()->environment('local')) {
    Route::get('/test', fn() => 'OK')->middleware('throttle:10,1');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/debug/routes', function() {
            $routes = collect(Route::getRoutes())->map(function ($route) {
                return [
                    'method' => $route->methods(),
                    'uri' => $route->uri(),
                    'name' => $route->getName(),
                    'action' => $route->getActionName(),
                ];
            });
            return response()->json($routes);
        })->name('debug.routes');
    });
}
