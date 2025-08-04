<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\HomePage;
use App\Livewire\Frontend\ProductList;
use App\Livewire\Frontend\ProductDetail;
use App\Livewire\Frontend\AboutPage;
use App\Livewire\Frontend\ContactPage;
use App\Livewire\Frontend\BlogList;
use App\Livewire\Frontend\BlogDetail;

// Public routes using Livewire components
Route::get('/', HomePage::class)->name('home');
Route::get('/products', ProductList::class)->name('products');
Route::get('/products/{category_slug}', ProductList::class)->name('products.category');
Route::get('/products/{category_slug}/{product_slug}', ProductDetail::class)->name('products.show');

Route::get('/blog', BlogList::class)->name('blog');
Route::get('/blog/category/{category_slug}', BlogList::class)->name('blog.category');
Route::get('/blog/{post_slug}', BlogDetail::class)->name('blog.show');

Route::get('/about', AboutPage::class)->name('about');
Route::get('/contact', ContactPage::class)->name('contact');