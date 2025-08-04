<!-- resources/views/livewire/frontend/product-detail.blade.php -->
<div>
<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white bg-no-repeat bg-[center_center] bg-cover relative z-0 !bg-fixed before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 before:bg-[rgba(30,34,40,.3)]" 
      data-image-src="{{ $category->getFirstMediaUrl('category_image', 'large') ? $category->getFirstMediaUrl('category_image', 'large') : asset('assets/img/photos/bg3.jpg') }}">
      <div class="container pt-24 pb-24 xl:pt-24 lg:pt-24 md:pt-24 xl:pb-[7.5rem] lg:pb-[7.5rem] md:pb-[7.5rem] !text-center">
          <div class="flex flex-wrap mx-[-15px]">
              <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto">
                  <h1 class="text-[calc(1.365rem_+_1.38vw)] font-bold leading-[1.2] xl:text-[2.4rem] mb-3 text-white">
                      {{ $product->name }}
                  </h1>
                  <nav class="inline-block" aria-label="breadcrumb">
                      <ol class="breadcrumb flex flex-wrap bg-[none] p-0 !rounded-none list-none mb-[20px]">
                          <li class="breadcrumb-item flex text-[#60697b]"><a class="text-white hover:text-white" href="{{ route('home') }}">Home</a></li>
                          <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons"><a class="text-white hover:text-white" href="{{ route('products') }}">Products</a></li>
                          <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons"><a class="text-white hover:text-white" href="{{ route('products.category', $category->slug) }}">{{ $category->name }}</a></li>
                          <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons active" aria-current="page">{{ $product->name }}</li>
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
  <section class="wrapper !bg-[#ffffff]">
    <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
      <!-- Breadcrumb -->
      

      <div class="flex flex-wrap mx-[-15px] md:mx-[-20px] lg:mx-[-20px] xl:mx-[-35px] mt-[-40px]">
        <!-- Product Image Section (Left) -->
        <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] px-[15px] xl:px-[35px] lg:px-[20px] mt-[40px] max-w-full">
          <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="true" data-thumbs="true">
            <div class="swiper">
              <div class="swiper-wrapper">
                <!-- Main Product Image -->
                <div class="swiper-slide group">
                  <figure class="rounded-[0.4rem]">
                    @if($product->image)
                    <img class="rounded-[0.4rem]" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                    <a class="item-link absolute w-[2.2rem] h-[2.2rem] leading-[2.2rem] z-[1] transition-all duration-[0.3s] ease-in-out opacity-0 text-[#343f52] shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.02)] text-[1rem] flex items-center justify-center rounded-[100%] right-0 bottom-4 bg-[rgba(255,255,255,.7)] hover:bg-[rgba(255,255,255,.9)] hover:!text-[#343f52] group-hover:opacity-100 group-hover:right-[1rem]"
                      href="{{ Storage::url($product->image) }}"
                      data-glightbox="title: {{ $product->name }}; description: {{ $product->description }}"
                      data-gallery="product-group">
                      <i class="uil uil-focus-add before:content-['\eb22']"></i>
                    </a>
                    @else
                    <div class="rounded-[0.4rem] w-full h-[400px] bg-gray-200 flex items-center justify-center">
                      <span class="text-gray-400">No image available</span>
                    </div>
                    @endif
                  </figure>
                </div>
                <!--/.swiper-slide -->
              </div>
              <!--/.swiper-wrapper -->
            </div>
            <!-- /.swiper -->
          </div>
          <!-- /.swiper-container -->
        </div>
        <!-- /column -->

        <!-- Product Info Section (Right) -->
        <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] px-[15px] xl:px-[35px] lg:px-[20px] mt-[40px] max-w-full">
          <div class="post-header mb-5">
            <h2 class="post-title text-[calc(1.285rem_+_0.42vw)] font-bold xl:text-[1.6rem] leading-[1.3]">
              <a href="{{ route('products.show', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}" class="text-[#343f52] hover:text-[#fab758]">
                {{ $product->name }}
              </a>
            </h2>
            <p class="price text-[1rem] mb-2">
              <span class="amount text-[#fab758] font-bold">${{ number_format($product->price, 2) }}</span>
            </p>
            <div class="inline-block">
              <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                {{ $product->category->name }}
              </span>
            </div>
          </div>
          <!-- /.post-header -->

          <p class="!mb-6">{{ $product->description }}</p>

          <!-- Product Specifications -->
          <div class="mb-6">
            @if($product->weight || $product->origin_country)
            <div class="grid grid-cols-2 gap-4">
              @if($product->weight)
              <div>
                <span class="text-gray-500 block text-sm">Weight</span>
                <span>{{ $product->weight }} kg</span>
              </div>
              @endif

              @if($product->origin_country)
              <div>
                <span class="text-gray-500 block text-sm">Origin</span>
                <span>{{ $product->origin_country }}</span>
              </div>
              @endif
            </div>
            @endif
          </div>

          <!-- Contact Button -->
          <div class="flex flex-wrap mx-[-15px]">
            <div class="xl:w-9/12 lg:w-9/12 w-full flex-[0_0_auto] px-[15px] max-w-full flex flex-row pt-2">
              <div class="grow">
                <a href="{{ route('contact') }}" class="btn btn-primary text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] btn-icon btn-icon-start rounded !w-full grow hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">
                  <i class="uil uil-envelope font-normal mt-[-0.05rem] mr-1 before:content-['\eac8']"></i> Contact About This Product
                </a>
              </div>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->

      <!-- Tabbed Content -->
      <ul class="nav nav-tabs nav-tabs-basic mt-[70px] ">
        <li class="nav-item">
          <a class="nav-link active !text-[#fab758] after:!bg-[#fab758]" data-bs-toggle="tab" href="#tab1-1">Product Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover:!text-[#fab758] focus:!text-[#fab758] after:!bg-[#fab758]" data-bs-toggle="tab" href="#tab1-2">Additional Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover:!text-[#fab758] focus:!text-[#fab758] after:!bg-[#fab758]" data-bs-toggle="tab" href="#tab1-3">How to Order</a>
        </li>
      </ul>

      <!-- /.nav-tabs -->

      <div class="tab-content mt-0 md:!mt-5">
        <div class="tab-pane fade show active" id="tab1-1">
          <p>{{ $product->description }}</p>

          @if($product->weight || $product->origin_country)
          <div class="mt-4">
            <h4 class="mb-3">Specifications</h4>
            <ul>
              @if($product->weight)
              <li><strong>Weight:</strong> {{ $product->weight }} kg</li>
              @endif

              @if($product->origin_country)
              <li><strong>Origin:</strong> {{ $product->origin_country }}</li>
              @endif
            </ul>
          </div>
          @endif
        </div>
        <!--/.tab-pane -->

        <div class="tab-pane fade" id="tab1-2">
          <p>Our products meet the highest quality standards and are sourced from reliable suppliers around the world. Below you'll find additional information about this product:</p>

          <ul>
            <li><strong>Quality Control:</strong> All products undergo strict quality control measures</li>
            <li><strong>Packaging:</strong> Secure packaging to ensure safe delivery</li>
            <li><strong>Shipping:</strong> Available for international shipping</li>
            <li><strong>Returns:</strong> Please contact us for our return policy</li>
          </ul>

          <p>For specific product inquiries, please use the contact button above to reach our sales team.</p>
        </div>
        <!--/.tab-pane -->

        <div class="tab-pane fade" id="tab1-3">
          <h4 class="mb-3">How to Order</h4>
          <p>Ordering our products is simple. Follow these steps:</p>

          <ol>
            <li><strong>Contact Us:</strong> Use the "Contact About This Product" button or visit our contact page</li>
            <li><strong>Request a Quote:</strong> Our team will prepare a detailed quote including shipping costs</li>
            <li><strong>Confirm Order:</strong> Once you approve the quote, we'll confirm your order</li>
            <li><strong>Payment:</strong> We'll provide payment options based on your location</li>
            <li><strong>Shipping:</strong> After payment confirmation, we'll process and ship your order</li>
          </ol>

          <p class="mt-4">For bulk orders or special requirements, please mention these details in your inquiry for customized solutions.</p>

          <div class="mt-6">
            <a href="{{ route('contact') }}" class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] !rounded-[50rem] !mt-3 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">
              Contact Us Now
            </a>
          </div>
        </div>
        <!--/.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->

  <!-- Related Products Section -->
@if($relatedProducts->count() > 0)
<section class="wrapper !bg-[#ffffff]">
  <div class="container py-[1.5rem] xl:!py-12 lg:!py-12 md:!py-12">
    <h3 class="h2 !mb-6 !text-center">You Might Also Like</h3>
    <div class="swiper-container blog grid-view shop !mb-6" data-margin="30" data-dots="true" data-items-xl="4" data-items-md="3" data-items-xs="2">
      <div class="swiper">
        <div class="swiper-wrapper">
          @foreach($relatedProducts as $relatedProduct)
          <div class="swiper-slide project item group" style="width: calc((100% - 60px) / 4);">
            <figure class="!rounded-[.4rem] !mb-6">
              @if($relatedProduct->image)
              <img src="{{ Storage::url($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover rounded-[.4rem]">
              @else
              <div class="!rounded-[.4rem] w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">No image</span>
              </div>
              @endif
              <a class="item-view opacity-0 absolute !w-[2.2rem] !h-[2.2rem] leading-[2.2rem] z-[1] transition-all duration-[0.3s] ease-in-out text-[#343f52] hover:!text-[#343f52] shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.02)] text-[1rem] flex items-center justify-center rounded-[100%] right-0 bg-[#ffffff] top-4 group-hover:opacity-100 group-hover:right-4" 
                 href="{{ route('products.show', ['category_slug' => $relatedProduct->category->slug, 'product_slug' => $relatedProduct->slug]) }}" 
                 data-bs-toggle="white-tooltip" 
                 aria-label="View product" 
                 data-bs-original-title="View product">
                <i class="uil uil-eye before:content-['\eb84']"></i>
              </a>
              <a href="{{ route('contact') }}" class="item-cart opacity-0 absolute bottom-[-2rem] w-full h-auto text-white text-center transition-all duration-[0.3s] ease-in-out text-[0.85rem] flex items-center justify-center font-bold m-0 p-[0.8rem] left-0 bg-[rgba(38,43,50,.8)] hover:bg-[rgba(38,43,50,.9)] hover:!text-white group-hover:opacity-100 group-hover:bottom-0">
                <i class="uil uil-envelope font-normal mt-[-0.05rem] mr-1 before:content-['\eac8']"></i> Contact Us
              </a>
            </figure>
            <div class="post-header">
              <div class="flex flex-row items-center justify-between mb-2">
                <div class="uppercase tracking-[0.02rem] text-[0.7rem] font-bold text-[#9499a3] !mb-0">{{ $relatedProduct->category->name }}</div>
              </div>
              <h2 class="post-title h3 text-[1.1rem]">
                <a href="{{ route('products.show', ['category_slug' => $relatedProduct->category->slug, 'product_slug' => $relatedProduct->slug]) }}" class="text-[#343f52] hover:text-[#fab758]">
                  {{ $relatedProduct->name }}
                </a>
              </h2>
              <p class="price !m-0"><span class="amount">${{ number_format($relatedProduct->price, 2) }}</span></p>
            </div>
            <!-- /.post-header -->
          </div>
          <!--/.swiper-slide -->
          @endforeach
        </div>
        <!--/.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
      <div class="swiper-pagination"></div>
    </div>
    <!-- /.swiper-container -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
@endif
  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize GLightbox for product images
      const lightbox = GLightbox({
        selector: '[data-gallery="product-group"]',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
      });
    });
  </script>
  @endpush