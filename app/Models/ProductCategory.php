<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

class ProductCategory extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the products for the category.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category_image')
            ->singleFile();
    }

    /**
     * Register media conversions
     */
    public function registerMediaConversions(?Media $media = null): void
{
    // Small square thumbnail for listings/sidebar
    $this->addMediaConversion('thumb')
        ->fit(Fit::Crop, 100, 100)
        ->sharpen(10);
        
    // Medium size for cards - make it match the aspect ratio in your screenshot
    $this->addMediaConversion('medium')
        ->fit(Fit::Crop, 400, 300) // Using 4:3 aspect ratio to match your screenshot
        ->sharpen(10);
        
    // Large size for detail pages
    $this->addMediaConversion('large')
        ->fit(Fit::Crop, 800, 600) // Keeping the same 4:3 ratio
        ->sharpen(10);
}

    /**
     * Get category image URL or placeholder
     *
     * @param string $conversion
     * @return string
     */
    public function getCategoryImageUrl(string $conversion = ''): string
    {
        if ($this->hasMedia('category_image')) {
            return $this->getFirstMediaUrl('category_image', $conversion);
        }
        
        // Return appropriate placeholder based on conversion
        return match ($conversion) {
            'thumb' => asset('assets/img/placeholders/category-thumb.jpg'),
            'medium' => asset('assets/img/placeholders/category-medium.jpg'),
            'large' => asset('assets/img/placeholders/category-large.jpg'),
            default => asset('assets/img/placeholders/category-default.jpg'),
        };
    }
}