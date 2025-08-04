<!-- resources/views/livewire/frontend/footer.blade.php -->
<footer class="bg-[rgba(246,247,249,1)]">
  <div class="container pt-[4rem] pb-7">
    <div class="flex flex-wrap mx-[-15px] xl:mx-0 lg:mx-0 mt-[-30px]">
      <div class="xl:w-4/12 lg:w-4/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:px-0 lg:px-0 mt-[30px]">
        <div class="widget">
          <img class="!mb-4" src="{{ asset('assets/img/logo-dark.png') }}" srcset="{{ asset('assets/img/logo-dark@2x.png') }} 2x" alt="image">
          <p class="lead text-[0.9rem] font-medium leading-[1.65] !mb-0">Your trusted partner in international trade with premium products.</p>
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:!ml-[16.66666667%] lg:!ml-[16.66666667%] xl:px-0 lg:px-0 mt-[30px]">
        <div class="widget">
          <div class="flex flex-row">
            <div>
              <div class="icon text-[#fab758] xl:text-[1.4rem] text-[calc(1.265rem_+_0.18vw)] !mr-4 mt-[-0.25rem]"> <i class="uil uil-phone-volume before:content-['\ec50']"></i> </div>
            </div>
            <div>
              <h5 class="!mb-1">Phone</h5>
              <p class="!mb-0">+1 (234) 567-8900</p>
            </div>
          </div>
          <!--/div -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:px-0 lg:px-0 mt-[30px]">
        <div class="widget">
          <div class="flex flex-row">
            <div>
              <div class="icon text-[#fab758] xl:text-[1.4rem] text-[calc(1.265rem_+_0.18vw)] !mr-4 mt-[-0.25rem]"> <i class="uil uil-location-pin-alt before:content-['\ebd8']"></i> </div>
            </div>
            <div class="!self-start !justify-start">
              <h5 class="!mb-1">Address</h5>
              <address class="not-italic leading-[inherit] mb-4">123 Export Street, Your City, Country</address>
            </div>
          </div>
          <!--/div -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
    </div>
    <!--/.row -->
    <hr class="mt-[3rem] xl:!mt-[3.5rem] lg:!mt-[3.5rem] md:!mt-[3.5rem] mb-7">
    <div class="xl:flex lg:flex md:flex items-center justify-between">
      <p class="mb-2 xl:!mb-0 lg:!mb-0">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
      <nav class="nav social social-muted !mb-0 xl:!text-right lg:!text-right md:!text-right">
        <a class="m-[0_0_0_.7rem] sm:m-[0_.7rem_0_0] xsm:m-[0_.7rem_0_0] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 hover:translate-y-[-0.15rem]" href="#"><i class="uil uil-twitter before:content-['\ed59'] text-[1rem] text-[#5daed5]"></i></a>
        <a class="m-[0_0_0_.7rem] sm:m-[0_.7rem_0_0] xsm:m-[0_.7rem_0_0] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 hover:translate-y-[-0.15rem]" href="#"><i class="uil uil-facebook-f before:content-['\eae2'] text-[1rem] text-[#4470cf]"></i></a>
        <a class="m-[0_0_0_.7rem] sm:m-[0_.7rem_0_0] xsm:m-[0_.7rem_0_0] text-[1rem] transition-all duration-[0.2s] ease-in-out translate-y-0 hover:translate-y-[-0.15rem]" href="#"><i class="uil uil-instagram before:content-['\eb9c'] text-[1rem] text-[#d53581]"></i></a>
      </nav>
      <!-- /.social -->
    </div>
  </div>
  <!-- /.container -->
</footer>