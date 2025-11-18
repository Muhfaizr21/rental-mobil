<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $brand
 * @property string $model
 * @property string $plate_number
 * @property int $year
 * @property int $price_per_day
 * @property string $status
 * @property string $color
 * @property string $fuel_type
 * @property string $transmission
 * @property int $seat_capacity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $full_name
 * @property string $formatted_price
 * @property string $status_badge
 */
class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand',
        'model',
        'plate_number',
        'year',
        'price_per_day',
        'status',
        'color',
        'fuel_type',
        'transmission',
        'seat_capacity'
    ];

    protected $casts = [
        'year' => 'integer',
        'price_per_day' => 'integer',
        'seat_capacity' => 'integer'
    ];

    /**
     * Relationships
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Accessors
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->brand} {$this->model} ({$this->year})";
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price_per_day, 0, ',', '.');
    }

    public function getStatusBadgeAttribute(): string
    {
        $statuses = [
            'available' => ['label' => '✓ Tersedia', 'class' => 'success'],
            'rented' => ['label' => '⏱ Sedang Disewa', 'class' => 'warning'],
            'maintenance' => ['label' => '🔧 Maintenance', 'class' => 'danger']
        ];

        $status = $statuses[$this->status] ?? ['label' => $this->status, 'class' => 'secondary'];

        return '<span class="badge badge-' . $status['class'] . '">' . $status['label'] . '</span>';
    }

    /**
     * Scopes
     */
    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('status', 'available');
    }

    public function scopeRented(Builder $query): Builder
    {
        return $query->where('status', 'rented');
    }

    public function scopeMaintenance(Builder $query): Builder
    {
        return $query->where('status', 'maintenance');
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($q) use ($search) {
            $q->where('brand', 'like', "%{$search}%")
                ->orWhere('model', 'like', "%{$search}%")
                ->orWhere('plate_number', 'like', "%{$search}%")
                ->orWhere('color', 'like', "%{$search}%");
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereNull('deleted_at');
    }

    /**
     * Business Logic
     */
    public function isAvailable(): bool
    {
        return $this->status === 'available' && !$this->trashed();
    }

    public function canBeRented(): bool
    {
        return $this->isAvailable() && $this->status !== 'maintenance';
    }

    public function activeBookings(): HasMany
    {
        return $this->bookings()->whereIn('status', ['pending', 'approved']);
    }

    /**
     * Check if car is available for given dates
     */
    public function isAvailableForDates($startDate, $endDate): bool
    {
        $conflictingBooking = $this->bookings()
            ->where('status', 'approved')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })->exists();

        return !$conflictingBooking && $this->isAvailable();
    }
}
