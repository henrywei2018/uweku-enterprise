<?php

namespace App\Livewire\Frontend;

use App\Models\ContactUs;
use Livewire\Component;
use App\Traits\HasHeroBanner;

class ContactPage extends Component
{
    use HasHeroBanner;
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $company = '';
    public $title = '';
    public $message = '';
    public $heroBanner = null;

    public function mount()
    {
        $this->loadBanner('contact');
    }
    
    protected $rules = [
        'firstname' => 'required|min:2',
        'lastname' => 'required|min:2',
        'email' => 'required|email',
        'company' => 'nullable|string',
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
            'company' => $this->company,
            'title' => $this->title,
            'message' => $this->message,
            'status' => 'new', // Mark as new for the admin to see
        ]);
        
        // Flash success message
        session()->flash('success', 'Thank you for your message! We will contact you soon.');
        
        // Reset form fields
        $this->reset(['firstname', 'lastname', 'email', 'company', 'title', 'message']);
    }
    protected function fetchHeroBanner()
    {
        // Get the hero banner category
        $heroBannerCategory = BannerCategory::where('slug', 'hero-banner')->first();

        if ($heroBannerCategory) {
            // Find the banner with the title matching the current route name
            $this->heroBanner = Banner::where('banner_category_id', $heroBannerCategory->id)
                ->where('title', request()->route()->getName())
                ->where('is_visible', true)
                ->whereDate('start_date', '<=', now())
                ->where(function($query) {
                    $query->whereDate('end_date', '>=', now())
                          ->orWhereNull('end_date');
                })
                ->first();
        }
    }
    
    public function render()
    {
        return view('livewire.frontend.contact-page', [
            'heroBanner' => $this->heroBanner
        ])
            ->layout('components.layouts.public');
    }
}