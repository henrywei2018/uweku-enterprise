
@props(['banner', 'title', 'breadcrumbItem'])

@php
    $bannerImageUrl = asset('assets/img/photos/bg3.jpg'); // Default fallback image
    
    if ($banner) {
        if ($banner->getMedia('banner')->count() > 0) {
            // Try to get from Spatie Media Library
            $bannerImageUrl = $banner->getFirstMediaUrl('banner');
            
            // Optional: Log for debugging
            // Log::info('Banner ID: ' . $banner->id . ' has media URL: ' . $bannerImageUrl);
        } elseif ($banner->image_url) {
            // Fallback to the image_url field if no media found
            $bannerImageUrl = $banner->image_url;
        }
    }
@endphp

<section class="wrapper bg-[#f3f8f5] image-wrapper bg-image bg-overlay bg-overlay-400 text-white bg-no-repeat bg-[center_center] bg-cover relative z-0 !bg-fixed before:content-[''] before:block before:absolute before:z-[1] before:w-full before:h-full before:left-0 before:top-0 before:bg-[rgba(30,34,40,.4)]" 
    data-image-src="{{ $bannerImageUrl }}">
    <div class="container pt-24 pb-24 xl:pt-24 lg:pt-24 md:pt-24 xl:pb-[7.5rem] lg:pb-[7.5rem] md:pb-[7.5rem] !text-center">
        <div class="flex flex-wrap mx-[-15px]">
            <div class="xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto">
                <h1 class="text-[calc(1.365rem_+_1.38vw)] font-bold leading-[1.2] xl:text-[2.4rem] mb-3 text-white">
                {{ $breadcrumbItem }}
                </h1>
                <nav class="inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb flex flex-wrap bg-[none] p-0 !rounded-none list-none mb-[20px]">
                        <li class="breadcrumb-item flex text-[#60697b]"><a class="text-white hover:text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item flex text-white pl-2 before:font-normal before:flex before:items-center before:text-[rgba(255,255,255,.5)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:pr-2 before:font-Unicons active" aria-current="page">{{ $breadcrumbItem }}</li>
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