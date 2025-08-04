<!-- resources/views/livewire/frontend/about-page.blade.php -->

<div class="bg-[#f3f8f5] ">
    <!-- Hero Section with Background Image -->
    <x-hero-banner :banner="$banner" title="about" breadcrumbItem="About" />
    <section class="wrapper !bg-[#ffffff] relative  border-0 before:top-[-4rem] before:border-l-transparent before:border-r-[100vw] before:border-t-[4rem] before:border-[#fefefe] before:content-[''] before:block before:absolute before:z-0 before:!border-y-transparent before:border-0 before:border-solid before:right-0 after:bottom-[-4rem] after:border-l-transparent after:border-r-[100vw] after:border-b-[4rem] after:border-[#fefefe] after:content-[''] after:block after:absolute after:z-0 after:!border-y-transparent after:border-0 after:border-solid after:right-0">
        <div class="container py-[4.5rem] xl:!py-24 lg:!py-24 md:!py-24">
            <!-- Company Overview Section -->
            <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] mt-[-50px] !mb-[4.5rem] xl:!mb-[7rem] lg:!mb-[7rem] md:!mb-[7rem] items-center">
                <!-- Images Column -->
                <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] mt-[50px] max-w-full !relative xl:!order-2 lg:!order-2">
                    <div class="shape bg-dot primary bg-[radial-gradient(#fab758_2px,transparent_2.5px)] rellax !w-[6rem] !h-[10rem] absolute z-[1] opacity-50" data-rellax-speed="1" style="top: 3rem; left: 5.5rem"></div>

                    <div class="flex flex-wrap !relative overlap-grid-2">
                        <div class="item xl:w-[70%] xl:z-[3] xl:ml-[30%] xl:mt-0 lg:w-[70%] lg:z-[3] lg:ml-[30%] lg:mt-0 md:w-[70%] md:z-[3] md:ml-[30%] md:mt-0">
                            <figure class="!rounded-[.4rem] shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] relative">
                                <img class="!rounded-[.4rem]" src="{{ asset('assets/img/photos/about2.jpg') }}" alt="Company Image 1">
                            </figure>
                        </div>
                        <div class="item xl:w-[55%] xl:mt-[-45%] xl:z-[4] xl:ml-0 lg:w-[55%] lg:mt-[-45%] lg:z-[4] lg:ml-0 md:w-[55%] md:mt-[-45%] md:z-[4] md:ml-0">
                            <figure class="!rounded-[.4rem] shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] relative">
                                <img class="!rounded-[.4rem]" src="{{ asset('assets/img/photos/about3.jpg') }}" alt="Company Image 2">
                            </figure>
                        </div>
                    </div>
                </div>

                <!-- Text Column -->
                <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] mt-[50px] max-w-full">
                    <img src="{{ asset('assets/img/icons/lineal/megaphone.svg') }}" class="svg-inject icon-svg icon-svg-md !w-[2.6rem] !h-[2.6rem] mb-4" alt="icon">

                    <h2 class="text-[calc(1.305rem_+_0.66vw)] font-bold xl:text-[1.8rem] leading-[1.3] !mb-3">Who Are We?</h2>

                    <p class="lead !text-[1.05rem] !leading-[1.6] font-medium">
                        We are a leading export-import company dedicated to connecting global markets with premium products and exceptional service.
                    </p>

                    <p class="!mb-6">
                        Founded with a vision to simplify international trade, our company has grown from a small startup to a trusted global trading partner. We understand the complexities of cross-border commerce and have built a robust network of suppliers and logistics experts.
                    </p>

                    <div class="flex flex-wrap mx-[-15px] mt-[-15px] xl:mx-[-20px]">
                        <div class="xl:w-6/12 w-full flex-[0_0_auto] mt-[15px] xl:px-[20px] px-[15px] max-w-full">
                            <ul class="pl-0 list-none bullet-bg bullet-soft-primary !mb-0">
                                <li class="relative pl-6">
                                    <span>
                                        <i class="uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center bg-[#dce7f9] text-[#3f78e0] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell absolute left-0"></i>
                                    </span>
                                    <span>Quality Product Sourcing</span>
                                </li>
                                <li class="relative pl-6 mt-3">
                                    <span>
                                        <i class="uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center bg-[#dce7f9] text-[#3f78e0] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell absolute left-0"></i>
                                    </span>
                                    <span>Global Logistics Management</span>
                                </li>
                            </ul>
                        </div>
                        <div class="xl:w-6/12 w-full flex-[0_0_auto] mt-[15px] xl:px-[20px] px-[15px] max-w-full">
                            <ul class="pl-0 list-none bullet-bg bullet-soft-primary !mb-0">
                                <li class="relative pl-6">
                                    <span>
                                        <i class="uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center bg-[#dce7f9] text-[#3f78e0] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell absolute left-0"></i>
                                    </span>
                                    <span>International Trade Expertise</span>
                                </li>
                                <li class="relative pl-6 mt-3">
                                    <span>
                                        <i class="uil uil-check w-4 h-4 text-[0.8rem] leading-none tracking-[normal] !text-center flex justify-center items-center bg-[#dce7f9] text-[#3f78e0] rounded-[100%] top-[0.2rem] before:content-['\e9dd'] before:align-middle before:table-cell absolute left-0"></i>
                                    </span>
                                    <span>Customer-Centric Approach</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Process Section -->
            <div class="flex flex-wrap mx-[-15px] mb-5">
                <div class="md:w-10/12 lg:w-10/12 xl:w-8/12 xxl:w-7/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto !text-center">
                    <img src="{{ asset('assets/img/icons/lineal/list.svg') }}" class="svg-inject icon-svg icon-svg-md !w-[2.6rem] !h-[2.6rem] mb-4 m-[0_auto]" alt="list icon">

                    <h2 class="text-[calc(1.305rem_+_0.66vw)] font-bold xl:text-[1.8rem] !leading-[1.3] mb-4 xl:!px-[4.5rem] lg:!px-[4.5rem]">
                        Our Business Process: From Concept to Delivery
                    </h2>
                </div>
            </div>

            <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] mt-[-50px] items-center">
                <!-- Process Steps Column -->
                <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] mt-[50px] max-w-full xl:!order-2 lg:!order-2">
                    <div class="card xl:!mr-6 lg:!mr-6">
                        <div class="card-body p-6">
                            <div class="flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-4 xl:text-[1.3rem] !w-12 !h-12 text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none !p-0 !rounded-[100%]">
                                        <span class="number table-cell text-center align-middle text-[1.1rem] font-bold m-[0_auto]">01</span>
                                    </span>
                                </div>
                                <div>
                                    <h4 class="!mb-1">Product Sourcing</h4>
                                    <p class="!mb-0">Identify and select high-quality products from trusted manufacturers.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-6 xl:!ml-16 lg:!ml-16">
                        <div class="card-body p-6">
                            <div class="flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-4 xl:text-[1.3rem] !w-12 !h-12 text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none !p-0 !rounded-[100%]">
                                        <span class="number table-cell text-center align-middle text-[1.1rem] font-bold m-[0_auto]">02</span>
                                    </span>
                                </div>
                                <div>
                                    <h4 class="!mb-1">Quality Control</h4>
                                    <p class="!mb-0">Rigorous inspection and verification of product standards.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-6 xl:mx-6 lg:mx-6">
                        <div class="card-body p-6">
                            <div class="flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary pointer-events-none !mr-4 xl:text-[1.3rem] !w-12 !h-12 text-[calc(1.255rem_+_0.06vw)] inline-flex items-center justify-center leading-none !p-0 !rounded-[100%]">
                                        <span class="number table-cell text-center align-middle text-[1.1rem] font-bold m-[0_auto]">03</span>
                                    </span>
                                </div>
                                <div>
                                    <h4 class="!mb-1">Global Delivery</h4>
                                    <p class="!mb-0">Efficient logistics and international shipping solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Process Description Column -->
                <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] mt-[50px] max-w-full">
                    <h2 class="text-[calc(1.265rem_+_0.18vw)] font-bold xl:text-[1.4rem] leading-[1.35] !mb-3">How We Work</h2>

                    <p class="lead text-[1rem] xl:pr-5 lg:pr-5">
                        Our comprehensive approach ensures smooth, efficient, and reliable international trade solutions.
                    </p>

                    <p>
                        We've developed a streamlined process that addresses every aspect of international trade. From initial product sourcing to final delivery, our team manages each step with precision and care.
                    </p>

                    <p class="!mb-6">
                        Our expertise lies in understanding market dynamics, building strong supplier relationships, and providing end-to-end support for our clients' import-export needs.
                    </p>

                    <a href="{{ route('contact') }}" class="btn btn-primary text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(92,140,229,1)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] !mb-0 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>