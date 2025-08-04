<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\HasHeroBanner;

class ProductList extends Component
{
    use WithPagination, HasHeroBanner;
    
    public $categorySlug = null;
    
    protected $queryString = [];
    
    public function mount($category_slug = null)
    {
        $this->loadBanner('products');
        if ($category_slug) {
            $this->categorySlug = $category_slug;
        }
        
    }
    
    public function filterByCategory($slug)
    {
        return redirect()->route('products.category', $slug);
    }
    
    public function render()
    {
        $categories = ProductCategory::where('is_active', true)->get();
        
        $query = Product::with('category')->where('is_active', true);
        
        if ($this->categorySlug) {
            $category = ProductCategory::where('slug', $this->categorySlug)->first();
            if ($category) {
                $query->where('product_category_id', $category->id);
            }
        }
        
        $products = $query->paginate(6);
        
        return view('livewire.frontend.product-list', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $this->categorySlug ? ProductCategory::where('slug', $this->categorySlug)->first() : null
        ])->layout('components.layouts.public');
    }
}