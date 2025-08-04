<!-- resources/views/livewire/frontend/home-page.blade.php -->
<div class="bg-[#f3f8f5]">
    <!-- Hero Section -->
    <section class="section-frame xl:mx-6 xl:rounded-[1rem] lg:mx-6 lg:rounded-[1rem] md:mx-6 md:rounded-[1rem] xxl:!mx-12 overflow-hidden opacity-100">
      <div class="swiper-container swiper-thumbs-container swiper-fullscreen nav-dark relative z-10" data-margin="0" data-autoplay="true" data-autoplaytime="7000" data-nav="true" data-dots="false" data-items="1" data-thumbs="true">
        <div class="swiper">
        <div class="swiper-wrapper">
                @foreach($banners as $banner)
                <div class="swiper-slide bg-[#ecedef] opacity-100 bg-image !bg-cover !bg-[center_center] before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 " 
                     @if($banner->getMedia('banner')->count() > 0)
                         data-image-src="{{ $banner->getFirstMediaUrl('banner') }}"
                     @elseif($banner->image_url)
                         data-image-src="{{ $banner->image_url }}"
                     @else
                         data-image-src="./assets/img/photos/bg28.jpg"
                     @endif
                >
                </div>
                @endforeach
            </div>
          <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
        <div class="swiper swiper-thumbs">
        <div class="swiper-wrapper">
                @foreach($banners as $banner)
                <div class="swiper-slide">
                    @if($banner->getMedia('banner')->count() > 0)
                        <img src="{{ $banner->getFirstMediaUrl('banner', 'preview') }}" alt="{{ $banner->title }}">
                    @elseif($banner->image_url)
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}">
                    @else
                        <img src="./assets/img/photos/bg28-th.jpg" alt="thumbnail">
                    @endif
                </div>
                @endforeach
            </div>
            
          <!--/.swiper-wrapper -->
        </div>
        <a href="{{ route('contact') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(250,183,88,0.5)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] !mb-3 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)] animate__animated animate__fadeInUp animate__delay-3s">
                            Contact Us Today
                        </a>
        <!-- /.swiper -->
        <div class="swiper-static">
          <div class="container !h-full flex items-center justify-center">
            <div class="flex flex-wrap mx-[-15px]">
            <div class="lg:w-8/12 xl:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto mt-[-2.5rem] !text-center">
            
                    </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
        </div>
        <!-- /.swiper-static -->
      </div>
      <!-- /.swiper-container -->
    </section>
    <!-- /section -->

    <!-- Categories Section -->
    <section id="services">
        <div class="wrapper bg-[#f3f8f5]">
            <div class="container py-[1rem] xl:!py-[1rem] lg:!py-[1rem] md:!py-[1rem]">
                <div class="flex flex-wrap mx-[-15px] xl:mx-0 lg:mx-0 mt-[-50px] items-center">
                    <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:px-0 lg:px-0 mt-[50px]">
                        <div class="flex flex-wrap pt-[4rem] pb-6 mx-[-15px] mt-[-40px] !text-center">
                            @foreach($featuredCategories as $index => $category)
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[30px]">
                                <div class="card !shadow-[0_0.25rem_1.75rem_rgba(30,34,40,0.07)] !mb-6">
                                    <figure class="card-img-top overlay overlay-1 group relative overflow-hidden" style="height: 200px;">
                                        <a href="{{ route('products.category', ['category_slug' => $category->slug]) }}" class="block h-full">
                                            <img
                                                class="w-full h-full object-cover absolute inset-0"
                                                src="{{ $category->getCategoryImageUrl('medium') }}"
                                                alt="{{ $category->name }}">
                                        </a>
                                        <figcaption class="group-hover:opacity-100 absolute w-full h-full opacity-0 text-center px-4 py-3 inset-0 z-[5] pointer-events-none p-2">
                                            <h5 class="from-top !mb-0 absolute w-full translate-y-[-80%] px-4 py-3 left-0 top-2/4 group-hover:-translate-y-2/4">View Products</h5>
                                        </figcaption>
                                    </figure>
                                    <div class="card-body p-4">
                                        <h3 class="h4 !mb-0">{{ $category->name }}</h3>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            @endforeach
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /column -->
                    <div class="xl:w-5/12 lg:w-5/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:!ml-[8.33333333%] lg:!ml-[8.33333333%] xl:px-0 lg:px-0 mt-[50px]">
                        <h2 class="xl:text-[1.7rem] text-[calc(1.295rem_+_0.54vw)] !leading-[1.25] !font-semibold !mb-3">Our Products</h2>
                        <p class="lead !text-[1.1rem] !leading-[1.55] font-medium">We offer a wide range of high-quality products for import and export, connecting global markets with premium goods.</p>
                        <p>Our company specializes in sourcing and distributing products that meet international standards. We work directly with manufacturers to ensure quality control and competitive pricing for our clients worldwide.</p>
                        <a href="{{ route('products') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] !mt-2 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">View All Products</a>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /section -->

    <!-- resources/views/livewire/frontend/home-page.blade.php (continued) -->
    <!-- Banner Section -->
    <div class="wrapper image-wrapper bg-image bg-overlay text-white !bg-fixed bg-no-repeat bg-[center_center] bg-cover relative z-0 before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 before:bg-[rgba(30,34,40,.5)]" style="background-image: url('{{ asset('assets/img/photos/bg34.jpg') }}')">
        <div class="container py-[6rem] xl:!py-[9rem] lg:!py-[9rem] md:!py-[9rem] !text-center">
            <h2 class="xl:text-[2.5rem] text-[calc(1.375rem_+_1.5vw)] !leading-[1.15] font-semibold text-white !mb-0">Your trusted partner in global trade <br class="hidden xl:block lg:block md:block"> connecting markets worldwide</h2>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->

    <!-- Products Section -->
    <section id="portfolio">
        <div class="wrapper bg-[rgba(246,247,249,1)]">
            <div class="container py-20 xl:!py-[7rem] lg:!py-[7rem] md:!py-[7rem] !text-center">
                <div class="flex flex-wrap mx-[-15px]">
                    <div class="lg:w-10/12 xl:w-8/12 xxl:w-7/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto !mb-8">
                        <h2 class="xl:text-[1.7rem] text-[calc(1.295rem_+_0.54vw)] !leading-[1.25] !font-semibold !mb-3">Our Products</h2>
                        <p class="lead !text-[1.1rem] !leading-[1.55] font-medium">Explore our wide range of high-quality products for global markets.</p>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="itemgrid grid-view projects-masonry">
                    <div class="isotope-filter !relative z-[5] filter mb-10">
                        <ul class="inline m-0 p-0 list-none">
                            <li class="inline"><a class="filter-item uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] cursor-pointer hover:text-[#fab758] active" data-filter="*">All Categories</a></li>
                            @foreach($categories as $category)
                            <li class="inline before:content-[''] before:inline-block before:w-[0.2rem] before:h-[0.2rem] before:ml-2 before:mr-[0.8rem] before:my-0 before:rounded-[100%] before:bg-[rgba(30,34,40,.2)] before:align-[.15rem]">
                                <a class="filter-item uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#aab0bc] cursor-pointer hover:text-[#fab758]" data-filter=".category-{{ $category->id }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="flex flex-wrap mx-[-15px] md:mx-[-15px] mt-[-30px] isotope">
                        @foreach($products as $product)
                        <div class="project item xl:w-4/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] mt-[30px] max-w-full category-{{ $product->product_category_id }}">
                            <figure class="overlay overlay-1 rounded group relative" style="height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <a class="relative block z-[3] cursor-pointer w-full h-full" href="{{ route('products.show', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}">
                                    @if($product->image)
                                    <img
                                        src="{{ Storage::url($product->image) }}"
                                        alt="{{ $product->name }}"
                                        style="min-height: 100%; min-width: 100%; object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    @else
                                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background-color: #edf2f7;">
                                        <span style="color: #a0aec0;">No image</span>
                                    </div>
                                    @endif
                                </a>
                                <figcaption class="group-hover:opacity-100 absolute w-full h-full opacity-0 text-center px-4 py-3 inset-0 z-[5] pointer-events-none p-2">
                                    <h5 class="from-top !mb-0 absolute w-full translate-y-[-80%] px-4 py-3 left-0 top-2/4 group-hover:-translate-y-2/4">{{ $product->name }}</h5>
                                </figcaption>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.grid -->
                <div class="mt-10">
                    <a href="{{ route('products') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] !mt-2 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">View All Products</a>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /section -->

    <!-- About Section -->
    <section id="about">
        <div class="wrapper bg-[rgba(246,247,249,1)]">
            <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
                <div class="flex flex-wrap mx-[-15px] md:mx-[-20px] lg:mx-[-20px] xl:mx-[-35px] mt-[-30px] items-center">
                    <div class="md:w-8/12 lg:w-6/12 xl:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:!order-2 lg:!order-2 !mx-auto md:px-[20px] lg:px-[20px] xl:px-[35px] mt-[30px]">
                        <div class="img-mask mask-2">
                            <img src="{{ asset('assets/img/photos/about30.jpg') }}" alt="About Us">
                        </div>
                    </div>
                    <!--/column -->
                    <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full md:px-[20px] lg:px-[20px] xl:px-[35px] mt-[30px]">
                        <h2 class="xl:text-[1.7rem] text-[calc(1.295rem_+_0.54vw)] !leading-[1.25] !font-semibold !mb-3">About Us</h2>
                        <p class="lead !text-[1.1rem] !leading-[1.55] font-medium">We are a leading export-import company specializing in quality products for global markets.</p>
                        <p>Our mission is to connect buyers and sellers across borders with reliable, high-quality products. With years of experience in international trade, we understand the complexities of global commerce and work to simplify the process for our clients.</p>
                        <p>We pride ourselves on our commitment to quality control, competitive pricing, and excellent customer service. Our extensive network of suppliers and logistics partners enables us to deliver products efficiently to destinations worldwide.</p>
                        <a href="{{ route('about') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] !mt-2 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">Learn More</a>
                    </div>
                    <!--/column -->
                </div>
                <!-- /.row -->
                <div class="flex flex-wrap mx-[-15px] md:mx-[-20px] lg:mx-[-20px] xl:mx-[-35px] mt-10 xl:!mt-16 lg:!mt-16 md:!mt-16">
                    <div class="xl:w-4/12 lg:w-4/12 w-full flex-[0_0_auto] px-[15px] max-w-full md:px-[20px] lg:px-[20px] xl:px-[35px]">
                        <h2 class="xl:text-[1.7rem] text-[calc(1.295rem_+_0.54vw)] !leading-[1.25] !font-semibold !mb-3">Our Services</h2>
                        <p>We offer comprehensive export-import services to meet your international trade needs. From product sourcing to customs clearance, we handle every aspect of the process.</p>
                    </div>
                    <!-- /column -->
                    <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full md:px-[20px] lg:px-[20px] xl:px-[35px]">
                        <div class="flex flex-wrap mx-[-15px] mt-[-30px] md:mx-[-20px] lg:mx-[-20px] xl:mx-[-35px]">
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[30px] md:px-[20px] lg:px-[20px] xl:px-[35px]">
                                <div class="flex flex-row">
                                    <div>
                                        <span class="icon btn btn-circle btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] pointer-events-none !mr-4 mt-1 !w-[2.2rem] !h-[2.2rem] !inline-flex !items-center !justify-center !text-[1rem] !leading-none !p-0 !rounded-[100%]"><span class="number text-[0.9rem] table-cell text-center align-middle font-bold mx-auto my-0">1</span></span>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Product Sourcing</h4>
                                        <p class="!mb-0">We identify and source high-quality products from reliable manufacturers worldwide.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[30px] md:px-[20px] lg:px-[20px] xl:px-[35px]">
                                <div class="flex flex-row">
                                    <div>
                                        <span class="icon btn btn-circle btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] pointer-events-none !mr-4 mt-1 !w-[2.2rem] !h-[2.2rem] !inline-flex !items-center !justify-center !text-[1rem] !leading-none !p-0 !rounded-[100%]"><span class="number text-[0.9rem] table-cell text-center align-middle font-bold mx-auto my-0">2</span></span>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Quality Control</h4>
                                        <p class="!mb-0">We ensure all products meet international standards and specifications before shipping.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[30px] md:px-[20px] lg:px-[20px] xl:px-[35px]">
                                <div class="flex flex-row">
                                    <div>
                                        <span class="icon btn btn-circle btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] pointer-events-none !mr-4 mt-1 !w-[2.2rem] !h-[2.2rem] !inline-flex !items-center !justify-center !text-[1rem] !leading-none !p-0 !rounded-[100%]"><span class="number text-[0.9rem] table-cell text-center align-middle font-bold mx-auto my-0">3</span></span>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Logistics</h4>
                                        <p class="!mb-0">We manage all aspects of international shipping, documentation, and customs clearance.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[30px] md:px-[20px] lg:px-[20px] xl:px-[35px]">
                                <div class="flex flex-row">
                                    <div>
                                        <span class="icon btn btn-circle btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] pointer-events-none !mr-4 mt-1 !w-[2.2rem] !h-[2.2rem] !inline-flex !items-center !justify-center !text-[1rem] !leading-none !p-0 !rounded-[100%]"><span class="number text-[0.9rem] table-cell text-center align-middle font-bold mx-auto my-0">4</span></span>
                                    </div>
                                    <div>
                                        <h4 class="!mb-1">Trade Consulting</h4>
                                        <p class="!mb-0">We provide expert advice on international trade regulations, taxes, and compliance.</p>
                                    </div>
                                </div>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /section -->

    <!-- Contact Section -->
    <section id="contact">
        <div class="wrapper image-wrapper bg-image bg-overlay bg-fixed bg-no-repeat bg-[center_center] bg-cover relative z-0 before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 before:bg-[rgba(30,34,40,.5)]" style="background-image: url('{{ asset('assets/img/photos/bg36.jpg') }}')">
            <div class="container py-[5rem] xl:!py-[7rem] lg:!py-[7rem] md:!py-[7rem]">
                <div class="flex flex-wrap mx-[-15px]">
                    <div class="xl:w-9/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto">
                        <div class="card border-0 !bg-[rgba(255,255,255,.9)]">
                            <div class="card-body xl:!py-16 xl:!px-24 lg:!py-16 lg:!px-24 p-[40px]">
                                <h2 class="xl:text-[1.7rem] text-[calc(1.295rem_+_0.54vw)] !leading-[1.25] !font-semibold mb-3 !text-center">Contact Us</h2>
                                <p class="lead !text-[1.1rem] !leading-[1.55] font-medium mb-10">Have questions or ready to start working with us? Get in touch using the form below:</p>
                                <form wire:submit.prevent="submitForm">
                                    <div class="flex flex-wrap mx-[-10px]">
                                        <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                            <div class="form-floating relative !mb-4">
                                                <input id="firstname" type="text" wire:model="firstname" class="form-control bg-[rgba(255,255,255,.7)] border-0 relative block w-full text-[.75rem] font-medium text-[#60697b] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.7)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]" placeholder="First Name" required>
                                                <label for="firstname" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">First Name *</label>
                                                @error('firstname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                            <div class="form-floating relative !mb-4">
                                                <input id="lastname" type="text" wire:model="lastname" class="form-control bg-[rgba(255,255,255,.7)] border-0 relative block w-full text-[.75rem] font-medium text-[#60697b] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.7)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]" placeholder="Last Name" required>
                                                <label for="lastname" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Last Name *</label>
                                                @error('lastname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                            <div class="form-floating relative !mb-4">
                                                <input id="email" type="email" wire:model="email" class="form-control bg-[rgba(255,255,255,.7)] border-0 relative block w-full text-[.75rem] font-medium text-[#60697b] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.7)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]" placeholder="Email" required>
                                                <label for="email" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Email *</label>
                                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                            <div class="form-floating relative !mb-4">
                                                <input id="company" type="text" wire:model="company" class="form-control bg-[rgba(255,255,255,.7)] border-0 relative block w-full text-[.75rem] font-medium text-[#60697b] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.7)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]" placeholder="Company">
                                                <label for="company" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Company</label>
                                                @error('company') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="w-full flex-[0_0_auto] px-[15px] max-w-full">
                                            <div class="form-floating relative !mb-4">
                                                <input id="title" type="text" wire:model="title" class="form-control bg-[rgba(255,255,255,.7)] border-0 relative block w-full text-[.75rem] font-medium text-[#60697b] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.7)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]" placeholder="Subject" required>
                                                <label for="title" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Subject *</label>
                                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="w-full flex-[0_0_auto] px-[15px] max-w-full">
                                            <div class="form-floating relative !mb-4">
                                                <textarea id="message" wire:model="message" class="form-control bg-[rgba(255,255,255,.7)] border-0 relative block w-full text-[.75rem] font-medium text-[#60697b] bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.7)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-0 focus-visible:!border-0 focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] min-h-[150px] leading-[1.25]" placeholder="Your message" style="height: 150px" required></textarea>
                                                <label for="message" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Message *</label>
                                                @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="w-full flex-[0_0_auto] px-[15px] max-w-full !text-center">
                                            <button type="submit" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] btn-send" wire:loading.attr="disabled" wire:loading.class="opacity-75">
                                                <span wire:loading.remove>Send Message</span>
                                                <span wire:loading>Sending...</span>
                                            </button>
                                        </div>
                                        <!-- /column -->
                                    </div>
                                    <!-- /.row -->
                                </form>
                                <!-- /form -->

                                @if(session()->has('success'))
                                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /section -->
</div>