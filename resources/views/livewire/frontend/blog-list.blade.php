<!-- resources/views/livewire/frontend/blog-list.blade.php -->
<div>
    <!-- Hero Section with Background Image -->
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white bg-no-repeat bg-[center_center] bg-cover relative z-0 !bg-fixed before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 before:bg-[rgba(30,34,40,.4)]" style="background-image: url('{{ asset('assets/img/photos/bg3.jpg') }}')">
        <div class="container pt-28 pb-40 xl:pt-36 lg:pt-36 md:pt-36 xl:pb-[12.5rem] lg:pb-[12.5rem] md:pb-[12.5rem] !text-center">
            <div class="flex flex-wrap mx-[-15px]">
                <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto">
                    <h1 class="text-[calc(1.365rem_+_1.38vw)] font-bold leading-[1.2] xl:text-[2.4rem] mb-3 text-white">
                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @else
                            Our Blog
                        @endif
                    </h1>
                    <nav class="inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb flex flex-wrap bg-[none] p-0 !rounded-none list-none mb-[20px]">
                            <li class="breadcrumb-item flex text-[#60697b]"><a class="text-white hover:text-white" href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons active" aria-current="page">
                                @if($currentCategory)
                                    <a class="text-white hover:text-white" href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons active" aria-current="page">
                                    {{ $currentCategory->name }}
                                @else
                                    Blog
                                @endif
                            </li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <div class="wrapper !bg-[#ffffff]">
        <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
            <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px]">
                <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full md:px-[20px] lg:px-[20px] xl:px-[35px]">
                    <div class="blog classic-view">
                        @if($posts->count() > 0)
                            @foreach($posts as $post)
                                <article class="post mb-8">
                                    <div class="card">
                                        <figure class="card-img-top overlay overlay-1 hover-scale group">
                                            <a class="text-[#343f52] hover:text-[#fab758]" href="{{ route('blog.show', $post->slug) }}">
                                                @if($post->hasMedia('featured_image'))
                                                    <img class="!transition-all !duration-[0.35s] !ease-in-out group-hover:scale-105" src="{{ $post->getFirstMediaUrl('featured_image', 'medium') }}" alt="{{ $post->title }}">
                                                @else
                                                    <img class="!transition-all !duration-[0.35s] !ease-in-out group-hover:scale-105" src="{{ asset('assets/img/placeholders/blog-medium.jpg') }}" alt="{{ $post->title }}">
                                                @endif
                                            </a>
                                            <figcaption class="group-hover:opacity-100 absolute w-full h-full opacity-0 text-center px-4 py-3 inset-0 z-[5] pointer-events-none p-2">
                                                <h5 class="from-top !mb-0 absolute w-full translate-y-[-80%] px-4 py-3 left-0 top-2/4 group-hover:-translate-y-2/4">Read More</h5>
                                            </figcaption>
                                        </figure>
                                        <div class="card-body flex-[1_1_auto] p-[40px] xl:p-[2rem_2.5rem_1.25rem] lg:p-[2rem_2.5rem_1.25rem] md:p-[2rem_2.5rem_1.25rem] sm:pb-4 xsm:pb-4">
                                            <div class="post-header !mb-[.9rem]">
                                                @if($post->category)
                                                    <div class="inline-flex mb-[.4rem] uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] relative align-top pl-[1.4rem] before:content-[''] before:absolute before:inline-block before:translate-y-[-60%] before:w-3 before:h-[0.05rem] before:left-0 before:top-2/4 before:bg-[#fab758]">
                                                        <a href="{{ route('blog.category', $post->category->slug) }}" class="hover:text-[#fab758]">{{ $post->category->name }}</a>
                                                    </div>
                                                @endif
                                                <!-- /.post-category -->
                                                <h2 class="post-title mt-1 !leading-[1.35] !mb-0">
                                                    <a class="text-[#343f52] hover:text-[#fab758]" href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h2>
                                            </div>
                                            <!-- /.post-header -->
                                            <div class="!relative">
                                                <p>{{ Str::limit($post->content_overview ?: strip_tags($post->content), 200) }}</p>
                                            </div>
                                            <!-- /.post-content -->
                                        </div>
                                        <!--/.card-body -->
                                        <div class="card-footer xl:p-[1.25rem_2.5rem_1.25rem] lg:p-[1.25rem_2.5rem_1.25rem] md:p-[1.25rem_2.5rem_1.25rem] p-[18px_40px]">
                                            <ul class="text-[0.7rem] text-[#aab0bc] m-0 p-0 list-none flex !mb-0">
                                                <li class="post-date inline-block">
                                                    <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem] before:content-['\e9ba']"></i>
                                                    <span>{{ $post->published_at->format('d M Y') }}</span>
                                                </li>
                                                @if($post->author)
                                                    <li class="post-author inline-block before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem] before:opacity-50 before:m-[0_.6rem_0] before:rounded-[100%] before:align-[.15rem] before:bg-[#aab0bc]">
                                                        <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="#">
                                                            <i class="uil uil-user pr-[0.2rem] align-[-.05rem] before:content-['\ed6f']"></i>
                                                            <span>By {{ $post->author->firstname }} {{ $post->author->lastname }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="post-comments inline-block before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem] before:opacity-50 before:m-[0_.6rem_0] before:rounded-[100%] before:align-[.15rem] before:bg-[#aab0bc]">
                                                    <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="{{ route('blog.show', $post->slug) }}#comments">
                                                        <i class="uil uil-comment pr-[0.2rem] align-[-.05rem] before:content-['\ea54']"></i>
                                                        <span>Comments</span>
                                                    </a>
                                                </li>
                                                <li class="post-likes !ml-auto inline-block">
                                                    <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="#">
                                                        <i class="uil uil-eye pr-[0.2rem] align-[-.05rem] before:content-['\eb60']"></i>{{ $post->view_count }}
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- /.post-meta -->
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </article>
                                <!-- /.post -->
                            @endforeach

                            <!-- Pagination -->
                            @if($posts->hasPages())
                                <nav class="flex justify-center" aria-label="pagination">
                                    <ul class="pagination">
                                        <!-- Previous Page Link -->
                                        @if($posts->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="uil uil-arrow-left before:content-['\e949']"></i></span>
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="?page={{ $posts->currentPage() - 1 }}" wire:navigate aria-label="Previous">
                                                    <span aria-hidden="true"><i class="uil uil-arrow-left before:content-['\e949']"></i></span>
                                                </a>
                                            </li>
                                        @endif

                                        <!-- Pagination Elements -->
                                        @foreach(range(1, $posts->lastPage()) as $page)
                                            <li class="page-item {{ $page == $posts->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="?page={{ $page }}" wire:navigate>{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if($posts->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="?page={{ $posts->currentPage() + 1 }}" wire:navigate aria-label="Next">
                                                    <span aria-hidden="true"><i class="uil uil-arrow-right before:content-['\e94c']"></i></span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link" aria-label="Next">
                                                    <span aria-hidden="true"><i class="uil uil-arrow-right before:content-['\e94c']"></i></span>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                    <!-- /.pagination -->
                                </nav>
                            @endif
                            <!-- Custom styles for pagination -->
<style>
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .pagination .page-item {
        margin: 0 0.25rem;
    }
    
    .pagination .page-item .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        color: #343f52;
        background-color: #fff;
        border: 1px solid #e0e3eb;
        transition: all 0.2s ease-in-out;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #fab758;
        color: white;
        border-color: #fab758;
    }
    
    .pagination .page-item .page-link:hover {
        background-color: #f8f9fa;
        color: #fab758;
    }
    
    .pagination .page-item.disabled .page-link {
        background-color: #f8f9fa;
        color: #aab0bc;
        cursor: not-allowed;
    }
</style>
                            <!-- /nav -->
                        @else
                            <div class="bg-white shadow rounded-lg p-8 text-center">
                                <h3 class="text-xl mb-2">No posts found</h3>
                                <p class="text-gray-600 mb-4">
                                    @if($search)
                                        No posts matching "{{ $search }}" were found. Try a different search term or browse all posts.
                                    @elseif($currentCategory)
                                        No posts in this category yet. Check back soon or browse all posts.
                                    @else
                                        No posts available yet. Check back soon!
                                    @endif
                                </p>
                                @if($search || $currentCategory)
                                    <a href="{{ route('blog') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] !rounded-[50rem] !mt-2 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">View All Posts</a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <!-- /.blog -->
                </div>
                <!-- /column -->

                <!-- Sidebar -->
                <aside class="xl:w-4/12 lg:w-4/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] max-w-full sidebar mt-8 xl:!mt-6 lg:!mt-6">
                    <!-- Search Widget -->
                    <div class="widget">
                        <form class="search-form relative before:content-['\eca5'] before:block before:absolute before:-translate-y-2/4 before:text-[0.9rem] before:text-[#959ca9] before:z-[9] before:right-3 before:top-2/4 font-Unicons" wire:submit.prevent="updatedSearch">
                            <div class="form-floating relative !mb-0">
                                <input id="search-form" type="text" wire:model.live.debounce.300ms="search" 
                                    class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]" 
                                    placeholder="Search blog posts...">
                                <label for="search-form" class="inline-block text-[#959ca9] text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Search</label>
                            </div>
                        </form>
                    </div>
                    <!-- /.widget -->

                    <!-- Popular Posts Widget -->
                    <div class="widget mt-[40px]">
                        <h4 class="widget-title !mb-3">Popular Posts</h4>
                        <ul class="m-0 p-0 after:content-[''] after:block after:h-0 after:clear-both after:invisible">
                            @forelse($recentPosts as $recent)
                                <li class="clear-both block overflow-hidden {{ !$loop->first ? 'mt-4' : '' }}">
                                    <figure class="!rounded-[.4rem] float-left w-14 !h-[4.5rem]">
                                        <a href="{{ route('blog.show', $recent->slug) }}">
                                            @if($recent->hasMedia('featured_image'))
                                                <img class="!rounded-[.4rem]" src="{{ $recent->getFirstMediaUrl('featured_image', 'thumb') }}" alt="{{ $recent->title }}">
                                            @else
                                                <img class="!rounded-[.4rem]" src="{{ asset('assets/img/placeholders/blog-thumb.jpg') }}" alt="{{ $recent->title }}">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="!relative ml-[4.25rem] mb-0">
                                        <h6 class="!mb-2"> 
                                            <a class="text-[#343f52] hover:text-[#fab758]" href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 35) }}</a> 
                                        </h6>
                                        <ul class="text-[0.7rem] text-[#aab0bc] m-0 p-0 list-none">
                                            <li class="post-date inline-block">
                                                <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem] before:content-['\e9ba']"></i>
                                                <span>{{ $recent->published_at->format('d M Y') }}</span>
                                            </li>
                                            <li class="post-comments inline-block before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem] before:opacity-50 before:m-[0_.6rem_0] before:rounded-[100%] before:align-[.15rem] before:bg-[#aab0bc]">
                                                <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="{{ route('blog.show', $recent->slug) }}#comments">
                                                    <i class="uil uil-comment pr-[0.2rem] align-[-.05rem] before:content-['\ea54']"></i>
                                                    <span>{{ $recent->view_count }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- /.post-meta -->
                                    </div>
                                </li>
                            @empty
                                <li class="text-gray-500">No recent posts available.</li>
                            @endforelse
                        </ul>
                        <!-- /.image-list -->
                    </div>
                    <!-- /.widget -->

                    <!-- Categories Widget -->
                    <div class="widget mt-[40px]">
                        <h4 class="widget-title !mb-3">Categories</h4>
                        <ul class="pl-0 list-none bullet-primary !text-inherit">
                            <li class="relative pl-[1rem] before:absolute before:top-[-0.15rem] before:text-[1rem] before:content-['\2022'] before:left-0 before:font-SansSerif">
                                <a class="text-inherit hover:text-[#fab758] {{ !$currentCategory ? 'text-[#fab758] font-semibold' : '' }}" href="{{ route('blog') }}">
                                    All Posts ({{ \App\Models\Blog\Post::whereNotNull('published_at')->where('published_at', '<=', now())->count() }})
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li class="relative pl-[1rem] before:absolute before:top-[-0.15rem] before:text-[1rem] before:content-['\2022'] before:left-0 before:font-SansSerif mt-[.35rem]">
                                    <a class="text-inherit hover:text-[#fab758] {{ $currentCategory && $currentCategory->id === $category->id ? 'text-[#fab758] font-semibold' : '' }}" href="{{ route('blog.category', $category->slug) }}">
                                        {{ $category->name }} ({{ $category->posts()->whereNotNull('published_at')->where('published_at', '<=', now())->count() }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.widget -->

                    <!-- Subscribe Widget -->
                    <div class="widget bg-[#fab758] text-white shadow rounded-lg p-6 mt-[40px]">
                        <h4 class="widget-title text-white border-white !mb-3">Subscribe to Our Newsletter</h4>
                        <p class="mb-4 text-white/90">Get the latest posts and updates delivered to your inbox.</p>
                        <form class="space-y-3">
                            <div class="form-floating relative">
                                <input type="email" id="newsletter-email" placeholder="Email address" class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-white bg-clip-padding border-0 shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]">
                                <label for="newsletter-email" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Your email</label>
                            </div>
                            <button type="submit" class="btn w-full bg-white text-[#fab758] hover:bg-white/90 border-white !rounded-[50rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">Subscribe</button>
                        </form>
                    </div>
                    <!-- /.widget -->

                </aside>
                <!-- /column .sidebar -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /section -->
</div>