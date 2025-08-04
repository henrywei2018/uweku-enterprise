<?php

namespace App\Livewire\Frontend;

use App\Models\Blog\Post;
use App\Models\Blog\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Request;

class BlogList extends Component
{
    use WithPagination;
    
    public $categorySlug = null;
    public $search = '';
    
    protected $paginationTheme = 'tailwind';
    
    // Set up listeners for URL changes
    protected $listeners = ['urlChanged' => 'onUrlChange'];
    
    /**
     * Initialize component for first render
     */
    public function mount($category_slug = null)
    {
        if ($category_slug) {
            $this->categorySlug = $category_slug;
        }
        
        // Get the page from the URL if available
        $page = Request::query('page');
        if ($page) {
            session(['blog_page' => $page]);
        }
    }
    
    /**
     * Update search and reset pagination
     */
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    /**
     * Handle URL changes
     */
    public function onUrlChange()
    {
        // Update component properties from URL params
        $page = Request::query('page');
        if ($page) {
            session(['blog_page' => $page]);
        }
    }
    
    /**
     * Main render function
     */
    public function render()
    {
        // Get active categories
        $categories = Category::where('is_active', true)->get();
        
        // Get recent posts
        $recentPosts = Post::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(5)
            ->get();
        
        // Base query for posts
        $query = Post::with('category')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at');
        
        // Apply category filter if selected
        if ($this->categorySlug) {
            $category = Category::where('slug', $this->categorySlug)->first();
            if ($category) {
                $query->where('blog_category_id', $category->id);
            }
        }
        
        // Apply search filter if provided
        if (!empty($this->search)) {
            $search = '%' . $this->search . '%';
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', $search)
                  ->orWhere('content_overview', 'like', $search)
                  ->orWhere('content', 'like', $search);
            });
        }
        
        // Get the stored page from session
        $currentPage = session('blog_page', 1);
        
        // Get posts with pagination
        $posts = $query->paginate(6, ['*'], 'page', $currentPage);
        
        // Update URL with current page if not already there
        if ($currentPage != Request::query('page')) {
            $urlPageParam = Request::query('page');
            if ($urlPageParam != $currentPage) {
                $this->redirect(Request::url() . '?page=' . $currentPage);
            }
        }
        
        return view('livewire.frontend.blog-list', [
            'posts' => $posts,
            'categories' => $categories,
            'recentPosts' => $recentPosts,
            'currentCategory' => $this->categorySlug ? Category::where('slug', $this->categorySlug)->first() : null
        ])->layout('components.layouts.public');
    }
    
    /**
     * Custom method to set the current page
     */
    public function gotoPage($page)
    {
        $this->setPage($page);
        session(['blog_page' => $page]);
    }
}