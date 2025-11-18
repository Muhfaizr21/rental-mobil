<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

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
 * @property string|null $image
 * @property array|null $images
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $full_name
 * @property string $formatted_price
 * @property string $status_badge
 * @property string|null $image_url
 * @property array $gallery_urls
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
        'seat_capacity',
        'image',
        'images'
    ];

    protected $casts = [
        'year' => 'integer',
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

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        return Storage::url($this->image);
    }

    public function getGalleryUrlsAttribute(): array
    {
        if (!$this->images) {
            return [];
        }

        return array_map(function ($image) {
            return Storage::url($image);
        }, $this->images);
    }

    public function getMainImageAttribute(): string
    {
        if ($this->image_url) {
            return $this->image_url;
        }

        // Fallback to default car image based on brand
        $brand = strtolower($this->brand);
        $defaultImages = [
            'toyota' => '/images/default/toyota.jpg',
            'honda' => '/images/default/honda.jpg',
            'mitsubishi' => '/images/default/mitsubishi.jpg',
            'suzuki' => '/images/default/suzuki.jpg',
            'daihatsu' => '/images/default/daihatsu.jpg',
            'nissan' => '/images/default/nissan.jpg',
            'wuling' => '/images/default/wuling.jpg',
            'hyundai' => '/images/default/hyundai.jpg',
            'kia' => '/images/default/kia.jpg',
            'mazda' => '/images/default/mazda.jpg',
        ];

        return $defaultImages[$brand] ?? '/images/default/car.jpg';
    }

    public function getFirstGalleryImageAttribute(): ?string
    {
        if (empty($this->gallery_urls)) {
            return null;
        }

        return $this->gallery_urls[0];
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

    public function galleryCount(): int
    {
        return $this->images ? count($this->images) : 0;
    }

    /**
     * Image Management Methods
     */
    public function deleteImage(): bool
    {
        if ($this->image && Storage::exists($this->image)) {
            Storage::delete($this->image);
            $this->update(['image' => null]);
            return true;
        }
        return false;
    }

    public function deleteGalleryImage(string $imagePath): bool
    {
        if ($this->images && in_array($imagePath, $this->images)) {
            // Delete from storage
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            // Remove from array
            $updatedImages = array_values(array_diff($this->images, [$imagePath]));
            $this->update(['images' => $updatedImages]);
            return true;
        }
        return false;
    }

    public function deleteAllImages(): void
    {
        // Delete main image
        if ($this->image) {
            Storage::delete($this->image);
        }

        // Delete gallery images
        if ($this->images) {
            foreach ($this->images as $image) {
                Storage::delete($image);
            }
        }

        // Update model
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

        // Delete images when car is deleted
        static::deleting(function ($car) {
            if ($car->isForceDeleting()) {
                $car->deleteAllImages();
            }
        });

        // Restore logic if needed
        static::restoring(function ($car) {
            // Add any restore logic here if needed
        });
    }
}
