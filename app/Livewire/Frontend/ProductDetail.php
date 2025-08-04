<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $relatedProducts;
    public $category;
    
    public function mount($category_slug, $product_slug)
    {
        $this->category = ProductCategory::where('slug', $category_slug)->firstOrFail();
        $this->product = Product::where('slug', $product_slug)
            ->where('product_category_id', $this->category->id)
            ->where('is_active', true)
            ->firstOrFail();
        
        $this->relatedProducts = Product::where('product_category_id', $this->product->product_category_id)
            ->where('id', '!=', $this->product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();
    }
    
    public function render()
    {
        return view('livewire.frontend.product-detail')
            ->layout('components.layouts.public');
    }
}