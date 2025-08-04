<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;
use Spatie\Image\Enums\Fit;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia, HasTags, HasUlids;

    /**
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_author_id',
        'blog_category_id',
        'title',
        'slug',
        'content',
        'content_overview',
        'published_at',
        'seo_title',
        'seo_description',
        'is_featured',
        'view_count',
        'image',          // For backward compatibility
        'gallery_images'  // New field for gallery images as JSON
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_featured' => 'boolean',
        'view_count' => 'integer',
        'gallery_images' => 'array'
    ];

    /**
     * Register media collections for single featured image
     */
    public function registerMediaCollections(): void
    {
        // Featured image collection (single image)
        $this->addMediaCollection('featured_image')
            ->singleFile();
    }

    /**
     * Register media conversions
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        // Thumbnail for listings
        $this->addMediaConversion('thumb')
            ->fit(Fit::Crop, 300, 200)
            ->sharpen(10);
            
        // Medium size for cards
        $this->addMediaConversion('medium')
            ->fit(Fit::Crop, 800, 450)
            ->sharpen(10);
            
        // Large size for detail pages
        $this->addMediaConversion('large')
            ->fit(Fit::Crop, 1200, 600)
            ->sharpen(10);
    }

    /**
     * Get featured image URL or placeholder
     *
     * @param string $conversion
     * @return string
     */
    public function getFeaturedImageUrl(string $conversion = ''): string
    {
        if ($this->hasMedia('featured_image')) {
            return $this->getFirstMediaUrl('featured_image', $conversion);
        } elseif ($this->image) {
            return $this->image;
        }
        
        // Return appropriate placeholder based on conversion
        return match ($conversion) {
            'thumb' => asset('assets/img/placeholders/blog-thumb.jpg'),
            'medium' => asset('assets/img/placeholders/blog-medium.jpg'),
            'large' => asset('assets/img/placeholders/blog-large.jpg'),
            default => asset('assets/img/placeholders/blog-default.jpg'),
        };
    }

    /**
     * Get gallery images
     * 
     * @return array
     */
    public function getGalleryImages(): array
    {
        if (!empty($this->gallery_images) && is_array($this->gallery_images)) {
            return $this->gallery_images;
        }
        
        return [];
    }

    /**
     * Check if post has gallery images
     * 
     * @return bool
     */
    public function hasGalleryImages(): bool
    {
        return !empty($this->gallery_images) && is_array($this->gallery_images) && count($this->gallery_images) > 0;
    }

    /**
     * Increment view count
     */
    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }

    /** @return BelongsTo<User,self> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'blog_author_id');
    }

    /** @return BelongsTo<Category,self> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }
}