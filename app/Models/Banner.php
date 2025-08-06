<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;

class Banner extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory, HasUlids;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'banner_category_id',
        'sort',
        'title',
        'description',
        'image_url',
        'click_url',
        'click_url_target',
        'is_visible',
        'start_date',
        'end_date',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BannerCategory::class, 'banner_category_id');
    }

    public function registerMediaConversions(Media|null $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
            
        $this
            ->addMediaConversion('hero')
            ->fit(Fit::Crop, 1920, 1080)
            ->optimize()
            ->nonQueued();
            
        $this
            ->addMediaConversion('thumb')
            ->fit(Fit::Crop, 400, 300)
            ->optimize()
            ->nonQueued();
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
    }

    /**
     * Get banner image URL with fallback
     */
    public function getBannerImageUrl(string $conversion = ''): string
    {
        // Prioritas: Media Library > image_url > fallback
        if ($this->hasMedia('banner')) {
            return $conversion 
                ? $this->getFirstMediaUrl('banner', $conversion)
                : $this->getFirstMediaUrl('banner');
        }

        if ($this->image_url) {
            return $this->image_url;
        }

        return asset('assets/img/photos/bg28.jpg');
    }

    /**
     * Get banner thumbnail URL
     */
    public function getThumbnailUrl(): string
    {
        return $this->getBannerImageUrl('thumb');
    }

    /**
     * Get hero size image URL
     */
    public function getHeroImageUrl(): string
    {
        return $this->getBannerImageUrl('hero');
    }

    /**
     * Check if banner is currently active
     */
    public function isActive(): bool
    {
        if (!$this->is_visible) {
            return false;
        }

        $now = now();

        // Check start date
        if ($this->start_date && $this->start_date > $now) {
            return false;
        }

        // Check end date
        if ($this->end_date && $this->end_date < $now) {
            return false;
        }

        return true;
    }

    /**
     * Scope untuk banner yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_visible', true)
                    ->where(function($q) {
                        $q->whereNull('start_date')
                          ->orWhere('start_date', '<=', now());
                    })
                    ->where(function($q) {
                        $q->whereNull('end_date')
                          ->orWhere('end_date', '>=', now());
                    });
    }

    /**
     * Scope untuk ordering by sort field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Scope untuk banner berdasarkan kategori slug
     */
    public function scopeByCategory($query, string $categorySlug)
    {
        return $query->whereHas('category', function($q) use ($categorySlug) {
            $q->where('slug', $categorySlug)->where('is_active', true);
        });
    }

    /**
     * Get button text with fallback
     */
    public function getButtonText(): string
    {
        return $this->button_text ?? 'Learn More';
    }

    /**
     * Get formatted title untuk display
     */
    public function getDisplayTitle(): string
    {
        return $this->title ?? 'Welcome to Our Website';
    }

    /**
     * Get formatted description untuk display
     */
    public function getDisplayDescription(): string
    {
        return $this->description ?? 'Discover our amazing products and services.';
    }

    /**
     * Check if banner has valid click URL
     */
    public function hasClickUrl(): bool
    {
        return !empty($this->click_url) && $this->click_url !== '#';
    }

    /**
     * Get click URL target dengan fallback
     */
    public function getClickTarget(): string
    {
        return $this->click_url_target ?? '_self';
    }
}