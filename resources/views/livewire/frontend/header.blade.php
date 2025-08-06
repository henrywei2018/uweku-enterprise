<!-- resources/views/livewire/frontend/header.blade.php -->
<header class="relative wrapper !bg-[#f2f3fb]">
  <!-- Optional Alert Bar (bisa dikonfigurasi dari settings) -->
  @if(config('app.show_alert_bar', false))
  <div class="alert !bg-[#747ed1] !text-white fade show !rounded-none !border-0 !mb-1 !text-center" role="alert">
    <div class="container">
      <div class="alert-inner flex justify-center items-center !p-0">
        <p class="!mb-0">{{ config('app.alert_message', 'Special announcement here') }}</p>
      </div>
    </div>
  </div>
  @endif
  
  <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
    <div class="container xl:flex-row lg:flex-row !flex-nowrap items-center">
      
      <!-- Logo Section -->
      <div class="navbar-brand w-full">
        <a href="{{ route('home') }}" class="flex items-center">
          <img src="{{ $logoUrl }}" 
               alt="{{ $brandName }}"
               class="h-auto w-auto max-w-[120px] transition-all duration-300 object-contain"
               style="max-height: {{ $logoHeight }}; max-width: 120px;"
               onerror="this.onerror=null; this.src='{{ asset('assets/img/logo-dark.png') }}';">
          
          <!-- Optional: Show brand name next to logo on larger screens -->
          @if(config('app.show_brand_name', false))
            <span class="ml-3 text-xl font-bold text-gray-800 hidden md:block">
              {{ $brandName }}
            </span>
          @endif
        </a>
      </div>
      
      <!-- Navigation Menu -->
      <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
        <div class="offcanvas-header xl:hidden lg:hidden flex items-center justify-between flex-row p-6">
          <h3 class="text-white xl:text-[1.5rem] !text-[calc(1.275rem_+_0.3vw)] !mb-0">{{ $brandName }}</h3>
          <button type="button"
            class="btn-close btn-close-white mr-[-0.75rem] m-0 p-0 leading-none text-[#343f52] transition-all duration-[0.2s] ease-in-out border-0 motion-reduce:transition-none before:text-[1.05rem] before:content-['\ed3b'] before:w-[1.8rem] before:h-[1.8rem] before:leading-[1.8rem] before:shadow-none before:transition-[background] before:duration-[0.2s] before:ease-in-out before:flex before:justify-center before:items-center before:m-0 before:p-0 before:rounded-[100%] hover:no-underline bg-inherit before:bg-[rgba(255,255,255,.08)] before:font-Unicons hover:before:bg-[rgba(0,0,0,.11)] focus:outline-0"
            data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        
        <div class="offcanvas-body xl:!ml-auto lg:!ml-auto flex flex-col !h-full">
          <ul class="navbar-nav">
            @foreach($navigationItems as $item)
              <li class="nav-item">
                <a class="nav-link font-bold tracking-[-0.01rem] hover:!text-[#fab758] {{ $item['active'] ? 'active !text-[#fab758]' : '' }}" 
                   href="{{ $item['url'] }}">
                   {{ $item['name'] }}
                </a>
              </li>
            @endforeach
            
            <!-- Products dengan Dropdown jika ada kategori -->
            @if($productCategories->count() > 0)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle font-bold tracking-[-0.01rem] hover:!text-[#fab758] {{ request()->routeIs('products*') ? 'active !text-[#fab758]' : '' }}" 
                 href="#" data-bs-toggle="dropdown">Products</a>
              <ul class="dropdown-menu">
                @foreach($productCategories as $category)
                  <li class="nav-item">
                    <a class="dropdown-item hover:!text-[#fab758]" 
                       href="{{ route('products.category', $category->slug) }}">
                       {{ $category->name }}
                    </a>
                  </li>
                @endforeach
                <li class="nav-item">
                  <a class="dropdown-item hover:!text-[#fab758]" 
                     href="{{ route('products') }}">
                     View All Products
                  </a>
                </li>
              </ul>
            </li>
            @endif
          </ul>
          
          <!-- Mobile Footer -->
          <div class="offcanvas-footer xl:hidden lg:hidden">
            <div>
              <a href="mailto:{{ $contactInfo['email'] }}" class="link-inverse">{{ $contactInfo['email'] }}</a>
              <br> {{ $contactInfo['phone'] }} <br>
              <nav class="nav social social-white mt-4">
                @foreach($socialLinks as $social)
                  <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" 
                     href="{{ $social['url'] }}">
                     <i class="uil {{ $social['icon'] }} before:content-['\ed59'] !text-white text-[1rem]"></i>
                  </a>
                @endforeach
              </nav>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Side Actions -->
      <div class="navbar-other w-full !flex !ml-auto">
        <ul class="navbar-nav !flex-row !items-center !ml-auto">
          <li class="nav-item hidden xl:block lg:block md:block">
            <a href="{{ route('contact') }}"
              class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(250,183,88,0.5)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem]">Get
              Quote</a>
          </li>
          <li class="nav-item xl:hidden lg:hidden">
            <button class="hamburger offcanvas-nav-btn"><span></span></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>