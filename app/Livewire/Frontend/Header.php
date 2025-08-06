<?php

namespace App\Livewire\Frontend;

use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Header extends Component
{
    public $currentRoute;
    
    public function mount()
    {
        $this->currentRoute = request()->route()->getName();
    }
    
    /**
     * Get navigation menu items
     */
    public function getNavigationItems()
    {
        return [
            [
                'name' => 'Home',
                'route' => 'home',
                'url' => route('home'),
                'active' => $this->isRouteActive('home'),
            ],
            [
                'name' => 'Products',
                'route' => 'products',
                'url' => route('products'),
                'active' => $this->isRouteActive('products*'),
            ],
            [
                'name' => 'News',
                'route' => 'blog',
                'url' => route('blog'),
                'active' => $this->isRouteActive('blog*'),
            ],
            [
                'name' => 'About',
                'route' => 'about',
                'url' => route('about'),
                'active' => $this->isRouteActive('about'),
            ],
            [
                'name' => 'Contact',
                'route' => 'contact',
                'url' => route('contact'),
                'active' => $this->isRouteActive('contact'),
            ],
        ];
    }
    
    /**
     * Check if route is active
     */
    public function isRouteActive($routePattern): bool
    {
        if (str_contains($routePattern, '*')) {
            $baseRoute = str_replace('*', '', $routePattern);
            return str_starts_with($this->currentRoute, $baseRoute);
        }
        
        return $this->currentRoute === $routePattern;
    }
    
    /**
     * Get social media links
     */
    public function getSocialLinks()
    {
        return [
            [
                'name' => 'Twitter',
                'url' => '#',
                'icon' => 'uil-twitter',
                'color' => '#5daed5',
            ],
            [
                'name' => 'Facebook', 
                'url' => '#',
                'icon' => 'uil-facebook-f',
                'color' => '#4470cf',
            ],
            [
                'name' => 'Instagram',
                'url' => '#',
                'icon' => 'uil-instagram',
                'color' => '#d53581',
            ],
        ];
    }
    
    /**
     * Get company contact information
     */
    public function getContactInfo()
    {
        return [
            'email' => 'info@yourcompany.com',
            'phone' => '+1 (234) 567-8900',
            'address' => [
                'street' => '123 Export Street',
                'city' => 'Your City, Country 12345',
            ],
            'description' => 'Your trusted partner for international trade with premium products and exceptional service worldwide.',
        ];
    }
    
    /**
     * Get product categories for dropdown
     */
    public function getProductCategories()
    {
        return \App\Models\ProductCategory::where('is_active', true)
            ->orderBy('name')
            ->take(8)
            ->get();
    }

    public function render()
    {
        // Get logo settings from GeneralSettings
        $settings = app(GeneralSettings::class);
        
        return view('livewire.frontend.header', [
            'navigationItems' => $this->getNavigationItems(),
            'socialLinks' => $this->getSocialLinks(),
            'contactInfo' => $this->getContactInfo(),
            'productCategories' => $this->getProductCategories(),
            'logoUrl' => $settings->brand_logo ? Storage::url($settings->brand_logo) : asset('assets/img/logo-dark.png'),
            'brandName' => $settings->brand_name,
            'logoHeight' => $settings->brand_logoHeight,
        ]);
    }
}