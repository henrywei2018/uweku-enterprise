<?php

namespace App\Livewire\Frontend;

use App\Traits\HasHeroBanner;
use Livewire\Component;

class AboutPage extends Component
{
    use HasHeroBanner;

    public function mount()
    {
        $this->loadBanner('about');
    }
    public function render()
    {
        return view('livewire.frontend.about-page')->layout('components.layouts.public');
    }
}
