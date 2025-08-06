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
        
        try {
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
                'status' => 'new',
            ]);
            
            // Flash success message
            session()->flash('success', 'Thank you for your message! We will contact you soon.');
            
            // Reset form fields
            $this->reset(['firstname', 'lastname', 'email', 'phone', 'company', 'employees', 'title', 'message']);
            
        } catch (\Exception $e) {
            // Handle error
            session()->flash('error', 'Sorry, there was an error sending your message. Please try again.');
            \Log::error('Contact form submission error: ' . $e->getMessage());
        }
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
        
        // Get banner slides dari kategori 'hero' atau 'main-banner' - SINKRONISASI DENGAN BACKEND
        $heroBanners = Banner::byCategory('hero')
            ->active()
            ->ordered()
            ->get();
            
        // Jika tidak ada di kategori 'hero', coba 'main-banner'
        if ($heroBanners->isEmpty()) {
            $heroBanners = Banner::byCategory('main-banner')
                ->active()
                ->ordered()
                ->get();
        }
        
        // Jika masih kosong, coba 'homepage'
        if ($heroBanners->isEmpty()) {
            $heroBanners = Banner::byCategory('homepage')
                ->active()
                ->ordered()
                ->get();
        }
        
        return view('livewire.frontend.home-page', [
            'featuredCategories' => $featuredCategories,
            'products' => $products,
            'categories' => $categories,
            'banners' => $heroBanners,
        ])->layout('components.layouts.public');
    }
}