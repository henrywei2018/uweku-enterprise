<!-- resources/views/livewire/frontend/header.blade.php -->
<header class="relative wrapper bg-[#f3f8f5] pb-8">
  <nav class="navbar navbar-expand-lg extended extended-alt navbar-light !bg-[#ffffff] lg:[background:0_0!important] xl:[background:0_0!important]">
    <div class="container xl:flex-col lg:flex-col">
      <div class="topbar flex flex-row lg:!justify-center xl:!justify-center items-center">
        <div class="navbar-brand">
          <a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo-dark.png') }}" srcset="{{ asset('assets/img/logo-dark@2x.png') }} 2x" alt="{{ config('app.name') }}">
          </a>
        </div>
      </div>
      <!-- /.flex -->
      <div class="navbar-collapse-wrapper bg-[rgba(255,255,255)] opacity-100 flex flex-row items-center justify-between">
        <div class="navbar-other w-full hidden lg:block xl:block">
          <nav class="nav social social-muted">
            <a class="m-[0_.7rem_0_0] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 hover:translate-y-[-0.15rem]" href="#"><i class="uil uil-twitter before:content-['\ed59'] text-[1rem] text-[#5daed5]"></i></a>
            <a class="m-[0_.7rem_0_0] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 hover:translate-y-[-0.15rem]" href="#"><i class="uil uil-facebook-f before:content-['\eae2'] text-[1rem] text-[#4470cf]"></i></a>
            <a class="m-[0_.7rem_0_0] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 hover:translate-y-[-0.15rem]" href="#"><i class="uil uil-instagram before:content-['\eb9c'] text-[1rem] text-[#d53581]"></i></a>
          </nav>
          <!-- /.social -->
        </div>
        <!-- /.navbar-other -->
        <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
          <div class="offcanvas-header xl:hidden lg:hidden flex items-center justify-between flex-row p-6">
            <h3 class="text-white xl:text-[1.5rem] !text-[calc(1.275rem_+_0.3vw)] !mb-0">{{ config('app.name') }}</h3>
            <button type="button" class="btn-close btn-close-white mr-[-0.75rem] m-0 p-0 leading-none text-[#343f52] transition-all duration-[0.2s] ease-in-out border-0 motion-reduce:transition-none before:text-[1.05rem] before:content-['\ed3b'] before:w-[1.8rem] before:h-[1.8rem] before:leading-[1.8rem] before:shadow-none before:transition-[background] before:duration-[0.2s] before:ease-in-out before:flex before:justify-center before:items-center before:m-0 before:p-0 before:rounded-[100%] hover:no-underline bg-inherit before:bg-[rgba(255,255,255,.08)] before:font-Unicons hover:before:bg-[rgba(0,0,0,.11)] focus:outline-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body flex flex-col !h-full">
          <ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link hover:!text-[#fab758] {{ request()->routeIs('home') ? 'active text-[#fab758]' : '' }}" 
       href="{{ route('home') }}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link hover:!text-[#fab758] {{ request()->routeIs('products') || request()->routeIs('products.show') ? 'active text-[#fab758]' : '' }}" 
       href="{{ route('products') }}">Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link hover:!text-[#fab758] {{ request()->routeIs('products') || request()->routeIs('products.show') ? 'active text-[#fab758]' : '' }}" 
       href="{{ route('blog') }}">News</a>
  </li>
  <li class="nav-item">
    <a class="nav-link hover:!text-[#fab758] {{ request()->routeIs('about') ? 'active text-[#fab758]' : '' }}" 
       href="{{ route('about') }}">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link hover:!text-[#fab758] {{ request()->routeIs('contact') ? 'active text-[#fab758]' : '' }}" 
       href="{{ route('contact') }}">Contact</a>
  </li>
</ul>
            <!-- /.navbar-nav -->
          <div class="offcanvas-footer xl:hidden lg:hidden">
            <div>
              <a href="mailto:info@yourcompany.com" class="link-inverse">info@yourcompany.com</a>
              <br> +1 (234) 567-8900 <br>
              <nav class="nav social social-white mt-4">
              <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" href="#"><i class="uil uil-twitter before:content-['\ed59'] !text-white text-[1rem]"></i></a>
              <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" href="#"><i class="uil uil-facebook-f before:content-['\eae2'] !text-white text-[1rem]"></i></a>
              <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" href="#"><i class="uil uil-instagram before:content-['\eb9c'] !text-white text-[1rem]"></i></a>
              </nav>
              <!-- /.social -->
            </div>
          </div>
            <!-- /.offcanvas-footer -->
          </div>
        </div>
        <!-- /.navbar-collapse -->
        <div class="navbar-other w-full flex">
          <ul class="navbar-nav !flex-row !items-center !ml-auto">
            <li class="nav-item"><a class="nav-link hover:!text-[#fab758] focus:!text-[#fab758]" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-info"><i class="uil uil-info-circle before:content-['\eb99'] !text-[1.1rem]"></i></a></li>
            <li class="nav-item xl:hidden lg:hidden">
              <button class="hamburger offcanvas-nav-btn"><span></span></button>
            </li>
          </ul>
          <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-other -->
      </div>
      <!-- /.navbar-collapse-wrapper -->
    </div>
    <!-- /.container -->
  </nav>
  <!-- /.navbar -->
  
  <div class="offcanvas offcanvas-end text-inverse !text-[#cacaca] opacity-100" id="offcanvas-info" data-bs-scroll="true">
    <div class="offcanvas-header flex flex-row items-center justify-between p-[1.5rem]">
      <h3 class="text-white xl:!text-[1.5rem] text-[calc(1.275rem_+_0.3vw)] !leading-[1.4] mb-0">{{ config('app.name') }}</h3>
      <button type="button" class="btn-close btn-close-white mr-[-0.5rem] m-0 p-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body !pb-[1.5rem]">
      <div class="widget mb-8">
        <p>Your trusted partner for international trade with premium products.</p>
      </div>
      <!-- /.widget -->
      <div class="widget mb-8">
        <h4 class="widget-title text-white mb-[0.75rem] !text-[1rem] tracking-[normal] font-semibold !leading-[1.45]">Contact Info</h4>
        <address class="not-italic leading-[inherit] mb-[1rem]">123 Export Street<br>Your City, Country</address>
        <a class="text-[#cacaca] hover:!text-[#fab758]" href="mailto:info@yourcompany.com">info@yourcompany.com</a><br> +1 (234) 567-8900
      </div>
      <!-- /.widget -->
      <div class="widget mb-8">
        <h4 class="widget-title text-white mb-[0.75rem] !text-[1rem] tracking-[normal] font-semibold !leading-[1.45]">Learn More</h4>
        <ul class="list-unstyled pl-0">
          <li><a class="text-[#cacaca] hover:!text-[#fab758]" href="{{ route('about') }}">Our Story</a></li>
          <li class="mt-[.35rem]"><a class="text-[#cacaca] hover:!text-[#fab758]" href="#">Terms of Use</a></li>
          <li class="mt-[.35rem]"><a class="text-[#cacaca] hover:!text-[#fab758]" href="#">Privacy Policy</a></li>
          <li class="mt-[.35rem]"><a class="text-[#cacaca] hover:!text-[#fab758]" href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
      <!-- /.widget -->
      <div class="widget">
        <h4 class="widget-title text-white mb-[0.75rem] !text-[1rem] tracking-[normal] font-semibold !leading-[1.45]">Follow Us</h4>
        <nav class="nav social social-white">
          <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" href="#"><i class="uil uil-twitter before:content-['\ed59'] !text-white text-[1rem]"></i></a>
          <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" href="#"><i class="uil uil-facebook-f before:content-['\eae2'] !text-white text-[1rem]"></i></a>
          <a class="text-[#cacaca] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 motion-reduce:transition-none hover:translate-y-[-0.15rem] m-[0_.7rem_0_0]" href="#"><i class="uil uil-instagram before:content-['\eb9c'] !text-white text-[1rem]"></i></a>
        </nav>
        <!-- /.social -->
      </div>
      <!-- /.widget -->
    </div>
    <!-- /.offcanvas-body -->
  </div>
  <!-- /.offcanvas -->
</header>
<!-- /header -->