<?php

namespace App\Livewire\Frontend;

use App\Models\Blog\Post;
use App\Models\Blog\Category;
use Livewire\Component;

class BlogDetail extends Component
{
    public $post;
    public $relatedPosts;
    public $category;
    
    public function mount($post_slug)
    {
        // Find the post by slug
        $this->post = Post::where('slug', $post_slug)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();
        
        // Increment view count
        $this->post->increment('view_count');
        
        // Set category if exists
        if ($this->post->blog_category_id) {
            $this->category = Category::find($this->post->blog_category_id);
        }
        
        // Get related posts from the same category
        $this->relatedPosts = Post::where('blog_category_id', $this->post->blog_category_id)
            ->where('id', '!=', $this->post->id)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->limit(3)
            ->get();
    }
    
    public function render()
    {
        // Get categories for sidebar
        $categories = Category::where('is_active', true)->get();
        
        // Get recent posts for sidebar
        $recentPosts = Post::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $this->post->id)
            ->latest('published_at')
            ->take(5)
            ->get();
        
        return view('livewire.frontend.blog-detail', [
            'categories' => $categories,
            'recentPosts' => $recentPosts,
        ])->layout('components.layouts.public');
    }
}