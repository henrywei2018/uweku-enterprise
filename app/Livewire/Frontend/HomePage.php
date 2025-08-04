<?php

namespace App\Livewire\Frontend;

use App\Models\Banner;
use App\Models\BannerCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ContactUs;
use Livewire\Component;

class HomePage extends Component
{
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $phone = '';
    public $company = '';
    public $employees = '';
    public $title = '';
    public $message = '';
    
    protected $rules = [
        'firstname' => 'required|min:2',
        'lastname' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'company' => 'nullable|string',
        'employees' => 'nullable|string',
        'title' => 'required|min:3',
        'message' => 'required|min:10',
    ];
    
    public function submitForm()
    {
        $this->validate();
        
        // Create new contact request in the database
        ContactUs::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
            'employees' => $this->employees,
            'title' => $this->title,
            'message' => $this->message,
            'status' => 'new', // Mark as new for the admin to see
        ]);
        
        // Flash success message
        session()->flash('success', 'Thank you for your message! We will contact you soon.');
        
        // Reset form fields
        $this->reset(['firstname', 'lastname', 'email', 'phone', 'company', 'employees', 'title', 'message']);
    }

    public function render()
    {
        // Get featured categories
        $featuredCategories = ProductCategory::where('is_active', true)
            ->take(4)
            ->get();
            
        // Get all products for portfolio section (limited to 12)
        $products = Product::where('is_active', true)
            ->take(12)
            ->get();
            
        // Get all categories for filter
        $categories = ProductCategory::where('is_active', true)->get();
        
        // Get banner slides from category with slug 'main-banner'
        $bannerCategory = BannerCategory::where('slug', 'main-banner')
            ->where('is_active', true)
            ->first();
            
        $banners = collect();
        
        if ($bannerCategory) {
            $banners = Banner::where('banner_category_id', $bannerCategory->id)
                ->where('is_visible', true)
                ->whereDate('start_date', '<=', now())
                ->where(function($query) {
                    $query->whereDate('end_date', '>=', now())
                          ->orWhereNull('end_date');
                })
                ->orderBy('sort')
                ->get();
        }
        
        return view('livewire.frontend.home-page', [
            'featuredCategories' => $featuredCategories,
            'products' => $products,
            'categories' => $categories,
            'banners' => $banners
        ])->layout('components.layouts.public');
    }
}