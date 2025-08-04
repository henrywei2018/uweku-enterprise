<?php

namespace App\Traits;

use App\Models\Banner;
use App\Models\BannerCategory;

trait HasHeroBanner
{
    public $banner = null;
    
    public function loadBanner($routeName)
    {
        // Get the hero banner category
        $bannerCategory = BannerCategory::where('slug', 'hero-banner')
            ->where('is_active', true)
            ->first();
            
        if ($bannerCategory) {
            // Get banner for this specific page based on route name
            $this->banner = Banner::where('banner_category_id', $bannerCategory->id)
                ->where('title', $routeName)  // The banner's title matches the route name
                ->where('is_visible', true)
                ->whereDate('start_date', '<=', now())
                ->where(function($query) {
                    $query->whereDate('end_date', '>=', now())
                          ->orWhereNull('end_date');
                })
                ->first();
        }
    }
}