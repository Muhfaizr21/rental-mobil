<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    // Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->brand} {$this->model}";
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_day, 0, ',', '.');
    }

    public function getStatusBadgeAttribute()
    {
        $statuses = [
            'available' => ['label' => '✓ Tersedia', 'class' => 'success'],
            'rented' => ['label' => '⏱ Sedang Disewa', 'class' => 'warning'],
            'maintenance' => ['label' => '🔧 Maintenance', 'class' => 'danger']
        ];

        $status = $statuses[$this->status] ?? ['label' => $this->status, 'class' => 'secondary'];

        return '<span class="badge badge-' . $status['class'] . '">' . $status['label'] . '</span>';
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeRented($query)
    {
        return $query->where('status', 'rented');
    }

    public function scopeMaintenance($query)
    {
        return $query->where('status', 'maintenance');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('brand', 'like', "%{$search}%")
              ->orWhere('model', 'like', "%{$search}%")
              ->orWhere('plate_number', 'like', "%{$search}%");
        });
    }

    // Business Logic
    public function isAvailable()
    {
        return $this->status === 'available';
    }

    public function canBeRented()
    {
        return $this->isAvailable() && !$this->trashed();
    }

    public function activeBookings()
    {
        return $this->bookings()->whereIn('status', ['pending', 'approved']);
    }
}
