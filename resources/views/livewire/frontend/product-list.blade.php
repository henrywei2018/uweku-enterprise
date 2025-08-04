<!-- resources/views/livewire/frontend/product-list.blade.php -->
<div>
    <x-hero-banner :banner="$banner" title="products" breadcrumbItem="Products" />
    <!-- /section -->

    <section class="wrapper !bg-[#ffffff] relative border-0 before:top-[-4rem] before:border-l-transparent before:border-r-[100vw] before:border-t-[4rem] before:border-[#fefefe] before:content-[''] before:block before:absolute before:z-0 before:!border-y-transparent before:border-0 before:border-solid before:right-0 after:bottom-[-4rem] after:border-l-transparent after:border-r-[100vw] after:border-b-[4rem] after:border-[#fefefe] after:content-[''] after:block after:absolute after:z-0 after:!border-y-transparent after:border-0 after:border-solid after:right-0">
        <div class="container pt-9 xl:pt-12 lg:pt-12 md:pt-12 pb-[4.5rem] xl:pb-24 lg:pb-24 md:pb-24">
            <!-- Filter Bar -->
            <div class="isotope-filter !relative z-[5] filter mb-10 text-center">
                <p class="inline m-[0_1rem_0_0] uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc]">Filter:</p>
                <ul class="inline m-0 p-0 list-none">
                    <li class="inline">
                        <a href="{{ route('products') }}"
                            class="filter-item uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] cursor-pointer {{ !$categorySlug ? 'active text-[#fab758]' : 'hover:text-[#fab758]' }}">
                            All
                        </a>
                    </li>
                    @foreach($categories as $category)
                    <li class="inline before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem] before:ml-2 before:mr-[0.8rem] before:my-0 before:rounded-[100%] before:bg-[rgba(30,34,40,.2)] before:align-[.15rem]">
                        <a href="{{ route('products.category', ['category_slug' => $category->slug]) }}"
                            class="filter-item uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] cursor-pointer {{ $categorySlug == $category->slug ? 'active text-[#fab758]' : 'hover:text-[#fab758]' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- End Filter Bar -->

            <div class="projects-overflow mb-10 xl:!mb-20 lg:!mb-20 xl:!mt-10 lg:!mt-10 md:!mt-10">
                @foreach($products as $index => $product)
                <div class="project item category-{{ $product->category->slug }}">
                    <div class="flex flex-wrap mx-[-15px]">
                        <!-- Alternate alignment based on index -->
                        @if($index % 2 == 0)
                        <figure class="lg:w-8/12 xl:w-7/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:!ml-[8.33333333%] rounded">
                            @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                            @else
                            <div class="w-full h-[400px] bg-gray-200 flex items-center justify-center rounded">
                                <span class="text-gray-500">{{ $product->name }}</span>
                            </div>
                            @endif
                        </figure>
                        <div class="project-details flex justify-center flex-col px-[15px]" style="right: 10%; bottom: 25%;">
                            @else
                            <figure class="xl:w-6/12 lg:w-7/12 xl:!ml-[41.66666667%] lg:!ml-[41.66666667%] w-full flex-[0_0_auto] px-[15px] max-w-full rounded">
                                @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                @else
                                <div class="w-full h-[400px] bg-gray-200 flex items-center justify-center rounded">
                                    <span class="text-gray-500">{{ $product->name }}</span>
                                </div>
                                @endif
                            </figure>
                            <div class="project-details flex justify-center flex-col px-[15px]" style="left: 18%; bottom: 25%;">
                                @endif
                                <div class="card shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0">
                                    <div class="card-body flex-[1_1_auto] p-[40px]">
                                        <div class="post-header">
                                            <div class="inline-flex uppercase tracking-[0.02rem] text-[0.7rem] font-bold relative align-top pl-[1.4rem] opacity-100 text-[#fab758] before:content-[''] before:absolute before:inline-block before:translate-y-[-60%] before:w-3 before:h-[0.05rem] before:left-0 before:top-2/4 before:bg-[#fab758] !mb-3">
                                                <a href="{{ route('products.category', ['category_slug' => $product->category->slug]) }}"
                                                    class="filter-item uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] cursor-pointer 
            {{ $categorySlug == $product->category->slug ? 'active text-[#fab758]' : 'hover:text-[#fab758]' }}">
                                                    {{ $product->category->name }}
                                                </a>
                                            </div>
                                            <h2 class="post-title !mb-3 leading-[1.35]">{{ $product->name }}</h2>
                                        </div>
                                        <!-- /.post-header -->
                                        <div class="!relative">
                                            <p>{{ Str::limit($product->description, 120) }}</p>
                                            <div class="flex justify-between items-center mt-4">
                                                <span class="font-bold text-[#fab758] text-xl">${{ number_format($product->price, 2) }}</span>
                                                <a href="{{ route('products.show', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}"
                                                    class="more hover text-[#fab758] focus:text-[#fab758] hover:text-[#fab758]">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.post-content -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.project-details -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.project -->
                    @endforeach
                </div>
                <!-- /.projects-overflow -->

                <!-- No Products Message -->
                @if($products->count() == 0)
                <div class="text-center py-16">
                    <h3 class="text-xl mb-2">No products found</h3>
                    <p class="text-gray-500">Try selecting a different category or browse all products.</p>
                    <a href="{{ route('products') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] !rounded-[50rem] !mt-4">
                        View All Products
                    </a>
                </div>
                @endif

                <!-- Pagination -->
                @if($products->hasPages())
                <nav class="flex justify-center" aria-label="pagination">
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if($products->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="uil uil-arrow-left before:content-['\e949']"></i></span>
                            </a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true"><i class="uil uil-arrow-left before:content-['\e949']"></i></span>
                            </a>
                        </li>
                        @endif

                        <!-- Pagination Elements -->
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        <!-- Next Page Link -->
                        @if($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true"><i class="uil uil-arrow-right before:content-['\e94c']"></i></span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="uil uil-arrow-right before:content-['\e94c']"></i></span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.pagination -->
                </nav>
                @endif
                <!-- /nav -->
            </div>
            <!-- /.container -->
    </section>
    <!-- /section -->
</div>