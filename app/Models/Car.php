<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

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
        'seat_capacity',
        'image',
        'images'
    ];

    protected $casts = [
        'price_per_day' => 'integer',
        'seat_capacity' => 'integer',
        'images' => 'array'
    ];

    /**
     * Relationships
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Accessors - SIMPLIFIED & FIXED
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->brand} {$this->model} ({$this->year})";
    }

    public function getCleanYearRangeAttribute(): string
    {
        return $this->cleanYearFormat($this->year);
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
     * FIXED: Simple and reliable image URL accessor
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        // Approach 1: Check if it's already a full URL
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // Approach 2: Try Storage URL first (Laravel default)
        try {
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::disk('public')->url($this->image);
            }
        } catch (\Exception $e) {
            // Continue to next approach
        }

        // Approach 3: Try with cars/ prefix
        try {
            if (Storage::disk('public')->exists('cars/' . $this->image)) {
                return Storage::disk('public')->url('cars/' . $this->image);
            }
        } catch (\Exception $e) {
            // Continue to next approach
        }

        // Approach 4: Try asset URL (for public storage)
        $assetPath = 'storage/' . $this->image;
        if (file_exists(public_path($assetPath))) {
            return asset($assetPath);
        }

        // Approach 5: Try with cars/ prefix in asset
        $assetCarsPath = 'storage/cars/' . $this->image;
        if (file_exists(public_path($assetCarsPath))) {
            return asset($assetCarsPath);
        }

        return null;
    }

    /**
     * FIXED: Simple gallery URLs
     */
    public function getGalleryUrlsAttribute(): array
    {
        if (!$this->images) {
            return [];
        }

        $urls = [];
        $galleryImages = is_string($this->images) ? json_decode($this->images, true) : $this->images;

        if (!is_array($galleryImages)) {
            return [];
        }

        foreach ($galleryImages as $image) {
            if (!$image) continue;

            // Use the same logic as image_url
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                $urls[] = $image;
                continue;
            }

            try {
                if (Storage::disk('public')->exists($image)) {
                    $urls[] = Storage::disk('public')->url($image);
                    continue;
                }
            } catch (\Exception $e) {}

            try {
                if (Storage::disk('public')->exists('cars/gallery/' . $image)) {
                    $urls[] = Storage::disk('public')->url('cars/gallery/' . $image);
                    continue;
                }
            } catch (\Exception $e) {}

            $assetPath = 'storage/' . $image;
            if (file_exists(public_path($assetPath))) {
                $urls[] = asset($assetPath);
                continue;
            }

            $assetGalleryPath = 'storage/cars/gallery/' . $image;
            if (file_exists(public_path($assetGalleryPath))) {
                $urls[] = asset($assetGalleryPath);
                continue;
            }
        }

        return $urls;
    }

    public function getGalleryCountAttribute(): int
    {
        if (!$this->images) {
            return 0;
        }

        $galleryImages = is_string($this->images) ? json_decode($this->images, true) : $this->images;
        return is_array($galleryImages) ? count($galleryImages) : 0;
    }

    /**
     * FIXED: Main image with proper fallback
     */
    public function getMainImageAttribute(): string
    {
        // Try image_url first
        if ($this->image_url) {
            return $this->image_url;
        }

        // Try first gallery image
        if (!empty($this->gallery_urls)) {
            return $this->gallery_urls[0];
        }

        // Final fallback - default car image
        return asset('images/default-car.jpg');
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

    public function scopeWithImages(Builder $query): Builder
    {
        return $query->whereNotNull('image')->orWhereNotNull('images');
    }

    public function scopeWithoutImages(Builder $query): Builder
    {
        return $query->whereNull('image')->whereNull('images');
    }

    /**
     * Year Format Methods
     */
    private function cleanYearFormat($year): string
    {
        if (empty($year)) {
            $currentYear = date('Y');
            return $currentYear . ' - ' . $currentYear;
        }

        // Remove unwanted characters, keep only numbers and hyphens
        $cleanYear = preg_replace('/[^0-9\s\-]/', '', $year);
        $cleanYear = trim($cleanYear);

        // Extract all 4-digit years
        preg_match_all('/(\d{4})/', $cleanYear, $matches);
        $years = $matches[1] ?? [];

        if (count($years) >= 2) {
            return $years[0] . ' - ' . end($years);
        } elseif (count($years) === 1) {
            return $years[0] . ' - ' . $years[0];
        }

        $currentYear = date('Y');
        return $currentYear . ' - ' . $currentYear;
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

    public function hasImages(): bool
    {
        return !empty($this->image) || !empty($this->images);
    }

    public function hasGallery(): bool
    {
        return !empty($this->images) && count($this->images) > 0;
    }

    /**
     * Image Management Methods
     */
    public function deleteImage(): bool
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            Storage::disk('public')->delete($this->image);
            $this->update(['image' => null]);
            return true;
        }
        return false;
    }

    public function deleteGalleryImage(string $imagePath): bool
    {
        if ($this->images && in_array($imagePath, $this->images)) {
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $updatedImages = array_values(array_diff($this->images, [$imagePath]));
            $this->update(['images' => $updatedImages]);
            return true;
        }
        return false;
    }

    public function deleteAllImages(): void
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image);
        }
        if ($this->images) {
            foreach ($this->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $this->update([
            'image' => null,
            'images' => null
        ]);
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

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        // Clean year format when creating/updating
        static::saving(function ($car) {
            $car->year = $car->cleanYearFormat($car->year);
        });

        // Delete images when car is deleted
        static::deleting(function ($car) {
            if ($car->isForceDeleting()) {
                $car->deleteAllImages();
            }
        });
    }
}
