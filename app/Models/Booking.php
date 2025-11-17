<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'customer_name',
        'customer_phone',
        'start_date',
        'end_date',
        'total_price',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_price' => 'decimal:2'
    ];

    /**
     * Get the car that owns the booking
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Get booking duration in days
     */
    public function getDurationAttribute()
    {
        return $this->start_date->diffInDays($this->end_date) + 1;
    }

    /**
     * Check if booking is active
     */
    public function getIsActiveAttribute()
    {
        return $this->status === 'approved' &&
               $this->start_date <= now() &&
               $this->end_date >= now();
    }
}
