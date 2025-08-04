<!-- resources/views/livewire/frontend/blog-detail.blade.php -->
<div>
    <!-- Hero Section with Background Image -->
    <section class="wrapper bg-[#f3f8f5] image-wrapper bg-image bg-overlay bg-overlay-400 text-white bg-no-repeat bg-[center_center] bg-cover relative z-0 !bg-fixed before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 before:bg-[rgba(30,34,40,.4)]" data-image-src="{{ $post->hasMedia('featured_image') ? $post->getFirstMediaUrl('featured_image', 'large') : asset('assets/img/photos/bg3.jpg') }}">
        <div class="container pt-28 pb-40 xl:pt-36 lg:pt-36 md:pt-36 xl:pb-[12.5rem] lg:pb-[12.5rem] md:pb-[12.5rem] !text-center">
            <div class="flex flex-wrap mx-[-15px]">
                <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto">
                    <h1 class="text-[calc(1.365rem_+_1.38vw)] font-bold leading-[1.2] xl:text-[2.4rem] mb-3 text-white">
                        {{ $post->title }}
                    </h1>
                    <nav class="inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb flex flex-wrap bg-[none] p-0 !rounded-none list-none mb-[20px]">
                            <li class="breadcrumb-item flex text-[#60697b]"><a class="text-white hover:text-white" href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons">
                                <a class="text-white hover:text-white" href="{{ route('blog') }}">Blog</a>
                            </li>
                            @if($category)
                            <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons">
                                <a class="text-white hover:text-white" href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                            @endif
                            <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons active" aria-current="page">
                                {{ Str::limit($post->title, 30) }}
                            </li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                    <!-- Post meta information -->
                    <div class="flex justify-center items-center text-white/90 space-x-4">
                        <div class="flex items-center">
                            <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem] before:content-['\e9ba']"></i>
                            <span>{{ $post->published_at->format('d M Y') }}</span>
                        </div>
                        @if($post->author)
                        <div class="flex items-center">
                            <i class="uil uil-user pr-[0.2rem] align-[-.05rem] before:content-['\ed6f']"></i>
                            <span>{{ $post->author->firstname }} {{ $post->author->lastname }}</span>
                        </div>
                        @endif
                        <div class="flex items-center">
                            <i class="uil uil-eye pr-[0.2rem] align-[-.05rem] before:content-['\eb61']"></i>
                            <span>{{ $post->view_count }} views</span>
                        </div>
                    </div>
                </div>
                <!-- /column -->
            </div>
            <!-- /.container -->
    </section>
    <!-- /section -->

    <div class="wrapper !bg-[#ffffff]">
        <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
            <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px]">
            <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full md:px-[20px] lg:px-[20px] xl:px-[35px]">
                    <!-- Blog Post Content -->
                    <div class="blog single">
                        <article class="post">
                            <div class="card">
                                <!-- Gallery Images (if any) - Now at the top -->
                                @if($post->hasGalleryImages())
                                <div class="swiper-container dots-over relative !z-10" data-margin="5" data-nav="true" data-dots="true">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($post->getGalleryImages() as $galleryImage)
                                            <div class="swiper-slide group">
                                                <figure class="rounded-[0.4rem]">
                                                    <img class="rounded-[0.4rem] w-full h-[400px] object-cover" src="{{ Storage::url($galleryImage) }}" alt="{{ $post->title }}">
                                                    <a class="item-link absolute w-[2.2rem] h-[2.2rem] leading-[2.2rem] z-[1] transition-all duration-[0.3s] ease-in-out opacity-0 text-[#343f52] shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.02)] text-[1rem] flex items-center justify-center rounded-[100%] right-0 bottom-4 bg-[rgba(255,255,255,.7)] hover:bg-[rgba(255,255,255,.9)] hover:!text-[#343f52] group-hover:opacity-100 group-hover:right-[1rem]"
                                                       href="{{ Storage::url($galleryImage) }}"
                                                       data-glightbox="title: {{ $post->title }}; description: {{ $post->content_overview }}"
                                                       data-gallery="gallery-group">
                                                       <i class="uil uil-focus-add before:content-['\eb22']"></i>
                                                    </a>
                                                </figure>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--/.swiper-wrapper -->
                                    </div>
                                    <!-- /.swiper -->
                                </div>
                                <!-- /.swiper-container -->
                                @elseif($post->hasMedia('featured_image'))
                                <figure class="rounded-[0.4rem]">
                                    <img class="rounded-[0.4rem] w-full h-[400px] object-cover" src="{{ $post->getFirstMediaUrl('featured_image', 'large') }}" alt="{{ $post->title }}">
                                    <a class="item-link absolute w-[2.2rem] h-[2.2rem] leading-[2.2rem] z-[1] transition-all duration-[0.3s] ease-in-out opacity-0 text-[#343f52] shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.02)] text-[1rem] flex items-center justify-center rounded-[100%] right-0 bottom-4 bg-[rgba(255,255,255,.7)] hover:bg-[rgba(255,255,255,.9)] hover:!text-[#343f52] group-hover:opacity-100 group-hover:right-[1rem]"
                                       href="{{ $post->getFirstMediaUrl('featured_image', 'large') }}"
                                       data-glightbox="title: {{ $post->title }}; description: {{ $post->content_overview }}"
                                       data-gallery="featured-image">
                                       <i class="uil uil-focus-add before:content-['\eb22']"></i>
                                    </a>
                                </figure>
                                @endif
                                
                                <div class="card-body flex-[1_1_auto] p-[40px] xl:p-[2.5rem_2.5rem_1.25rem] lg:p-[2.5rem_2.5rem_1.25rem] md:p-[2.5rem_2.5rem_1.25rem] sm:pb-4 xsm:pb-4">
                                    <!-- Content Overview / Excerpt -->
                                    @if($post->content_overview)
                                        <div class="border-l-4 border-[#fab758] pl-4 italic mb-6 text-gray-700">
                                            {{ $post->content_overview }}
                                        </div>
                                    @endif

                                    <!-- Main Content -->
                                    <div class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-800 prose-p:text-gray-600 prose-a:text-[#fab758] prose-a:no-underline hover:prose-a:text-[#fab758]/80">
                                        {!! Str::markdown($post->content) !!}
                                    </div>
                                </div>
                                <!--/.card-body -->

                                <div class="card-footer xl:p-[1.25rem_2.5rem_1.25rem] lg:p-[1.25rem_2.5rem_1.25rem] md:p-[1.25rem_2.5rem_1.25rem] p-[18px_40px]">
                                    <!-- Tags -->
                                    @if($post->tags->count() > 0)
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span class="font-semibold text-gray-700">Tags:</span>
                                        @foreach($post->tags as $tag)
                                        <a href="{{ route('blog', ['tag' => $tag->name]) }}" class="inline-block bg-gray-100 hover:bg-[#fab758] hover:text-white text-gray-700 text-sm px-3 py-1 rounded-full transition-colors">
                                            {{ $tag->name }}
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif

                                    <!-- Post meta -->
                                    <ul class="text-[0.7rem] text-[#aab0bc] m-0 p-0 list-none flex !mb-0 mt-3">
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
                                            <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="#comments">
                                                <i class="uil uil-comment pr-[0.2rem] align-[-.05rem] before:content-['\ea54']"></i>
                                                <span>Comments</span>
                                            </a>
                                        </li>
                                        <li class="post-likes !ml-auto inline-block">
                                            <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="#">
                                                <i class="uil uil-eye pr-[0.2rem] align-[-.05rem] before:content-['\eb61']"></i>
                                                {{ $post->view_count }}
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
                    </div>
                    <!-- /.blog -->

                    <!-- Author Bio -->
                    @if($post->author)
                    <div class="card mt-8 shadow-[0_0_1.25rem_rgba(30,34,40,0.04)]">
                        <div class="card-body p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-400 overflow-hidden">
                                    @if($post->author->getFirstMediaUrl('avatar'))
                                    <img src="{{ $post->author->getFirstMediaUrl('avatar') }}" alt="{{ $post->author->firstname }} {{ $post->author->lastname }}" class="w-full h-full object-cover">
                                    @else
                                    <i class="uil uil-user pr-[0.2rem] align-[-.05rem] before:content-['\ed6f'] text-4xl"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $post->author->firstname }} {{ $post->author->lastname }}</h3>
                                    <p class="text-sm text-gray-600">{{ $post->author->bio ?? 'Author' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Related Posts -->
                    @if($relatedPosts->count() > 0)
                    <div class="blog mt-8">
                        <h3 class="text-2xl font-semibold mb-6">Related Posts</h3>
                        <div class="blog itemgrid grid-view">
                            <div class="flex flex-wrap mx-[-15px] isotope xl:mx-[-20px] lg:mx-[-20px] md:mx-[-20px] mt-[-40px] !mb-8">
                                @foreach($relatedPosts as $related)
                                <article class="item post xl:w-4/12 lg:w-4/12 md:w-6/12 w-full flex-[0_0_auto] xl:px-[20px] lg:px-[20px] md:px-[20px] mt-[40px] px-[15px] max-w-full">
                                    <div class="card">
                                        <figure class="card-img-top overlay overlay-1 hover-scale group">
                                            <a href="{{ route('blog.show', $related->slug) }}">
                                                @if($related->hasMedia('featured_image'))
                                                <img class="!transition-all !duration-[0.35s] !ease-in-out group-hover:scale-105" src="{{ $related->getFirstMediaUrl('featured_image', 'medium') }}" alt="{{ $related->title }}">
                                                @else
                                                <img class="!transition-all !duration-[0.35s] !ease-in-out group-hover:scale-105" src="{{ asset('assets/img/placeholders/blog-medium.jpg') }}" alt="{{ $related->title }}">
                                                @endif
                                            </a>
                                            <figcaption class="group-hover:opacity-100 absolute w-full h-full opacity-0 text-center px-4 py-3 inset-0 z-[5] pointer-events-none p-2">
                                                <h5 class="from-top !mb-0 absolute w-full translate-y-[-80%] p-[.75rem_1rem] left-0 top-2/4">Read More</h5>
                                            </figcaption>
                                        </figure>
                                        <div class="card-body flex-[1_1_auto] p-[40px] xl:p-[1.75rem_1.75rem_1rem_1.75rem] lg:p-[1.75rem_1.75rem_1rem_1.75rem] md:p-[1.75rem_1.75rem_1rem_1.75rem] sm:pb-4 xsm:pb-4">
                                            <div class="post-header !mb-[.9rem]">
                                                @if($related->category)
                                                <div class="inline-flex mb-[.4rem] uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] relative align-top pl-[1.4rem] before:content-[''] before:absolute before:inline-block before:translate-y-[-60%] before:w-3 before:h-[0.05rem] before:left-0 before:top-2/4 before:bg-[#fab758]">
                                                    <a href="{{ route('blog.category', $related->category->slug) }}" class="hover:text-[#fab758]">{{ $related->category->name }}</a>
                                                </div>
                                                @endif
                                                <h2 class="post-title h3 !mt-1 !mb-3">
                                                    <a class="text-[#343f52] hover:text-[#fab758]" href="{{ route('blog.show', $related->slug) }}">
                                                        {{ Str::limit($related->title, 40) }}
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                        <!--/.card-body -->
                                        <div class="card-footer xl:p-[1.25rem_1.75rem_1.25rem] lg:p-[1.25rem_1.75rem_1.25rem] md:p-[1.25rem_1.75rem_1.25rem] p-[18px_40px]">
                                            <ul class="text-[0.7rem] text-[#aab0bc] m-0 p-0 list-none flex !mb-0">
                                                <li class="post-date inline-block">
                                                    <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem] before:content-['\e9ba']"></i>
                                                    <span>{{ $related->published_at->format('d M Y') }}</span>
                                                </li>
                                                <li class="post-comments inline-block before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem] before:opacity-50 before:m-[0_.6rem_0] before:rounded-[100%] before:align-[.15rem] before:bg-[#aab0bc]">
                                                    <a class="text-[#aab0bc] hover:text-[#fab758] hover:border-[#fab758]" href="{{ route('blog.show', $related->slug) }}#comments">
                                                        <i class="uil uil-eye pr-[0.2rem] align-[-.05rem] before:content-['\eb61']"></i>{{ $related->view_count }}
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- /.post-meta -->
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </article>
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.blog -->
                    </div>
                    @endif

                    <!-- Comments Section Placeholder -->
                    <div id="comments" class="mt-8">
                        <h3 class="text-2xl font-semibold mb-6">Comments</h3>
                        <div class="comments">
                            <p class="text-gray-500">Comments functionality coming soon.</p>
                        </div>
                    </div>
                </div>
                <!-- /column -->

                <!-- Sidebar -->
                <aside class="xl:w-4/12 lg:w-4/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] max-w-full sidebar mt-8 xl:!mt-6 lg:!mt-6">
                    <!-- Search Widget -->
                    <div class="widget">
                        <form class="search-form relative before:content-['\eca5'] before:block before:absolute before:-translate-y-2/4 before:text-[0.9rem] before:text-[#959ca9] before:z-[9] before:right-3 before:top-2/4 font-Unicons" action="{{ route('blog') }}">
                            <div class="form-floating relative !mb-0">
                                <input id="search-form" type="text" name="search"
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
                                                <i class="uil uil-eye pr-[0.2rem] align-[-.05rem] before:content-['\eb61']"></i>
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
                                <a class="text-inherit hover:text-[#fab758]" href="{{ route('blog') }}">
                                    All Posts ({{ \App\Models\Blog\Post::whereNotNull('published_at')->where('published_at', '<=', now())->count() }})
                                </a>
                            </li>
                            @foreach($categories as $cat)
                            <li class="relative pl-[1rem] before:absolute before:top-[-0.15rem] before:text-[1rem] before:content-['\2022'] before:left-0 before:font-SansSerif mt-[.35rem]">
                                <a class="text-inherit hover:text-[#fab758] {{ $category && $category->id === $cat->id ? 'text-[#fab758] font-semibold' : '' }}" href="{{ route('blog.category', $cat->slug) }}">
                                    {{ $cat->name }} ({{ $cat->posts()->whereNotNull('published_at')->where('published_at', '<=', now())->count() }})
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

                    <!-- Share Widget -->
                    <div class="widget mt-[40px]">
                        <h4 class="widget-title !mb-3">Share This Post</h4>
                        <div class="flex space-x-4">
                            <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-[#4470cf] hover:text-[#4470cf]/80 transition-colors" aria-label="Share on Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-[#5daed5] hover:text-[#5daed5]/80 transition-colors" aria-label="Share on Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post->slug)) }}&title={{ urlencode($post->title) }}" target="_blank" class="text-[#0077b5] hover:text-[#0077b5]/80 transition-colors" aria-label="Share on LinkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                                </svg>
                            </a>
                            <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode(route('blog.show', $post->slug)) }}" class="text-gray-600 hover:text-gray-800 transition-colors" aria-label="Share via Email">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </a>
                        </div>
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