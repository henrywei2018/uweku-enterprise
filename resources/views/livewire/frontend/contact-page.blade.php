<!-- resources/views/livewire/frontend/contact-page.blade.php -->
<div>
    <!-- Hero Section with Background Image -->
    <x-hero-banner :banner="$banner" title="contact" breadcrumbItem="Contact" />
    <!-- /section -->

    <!-- Contact Section with Map and Form -->
    <section class="wrapper !bg-[#ffffff] relative border-0 upper-end before:top-[-4rem] before:border-l-transparent before:border-r-[100vw] before:border-t-[4rem] before:border-[#fefefe] before:content-[''] before:block before:absolute before:z-0 before:border-y-transparent before:border-0 before:border-solid before:right-0">
        <div class="container pb-12">
            <div class="flex flex-wrap mx-[-15px] !mb-[4.5rem] md:!mb-24">
                <div class="xl:w-10/12 w-full flex-[0_0_auto] px-[15px] max-w-full !mx-auto mt-[-9rem]">
                    <div class="card">
                        <div class="flex flex-wrap mx-0">
                            <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] max-w-full !self-stretch">
                                <div class="map map-full rounded-t-[0.4rem] rounded-lg-start h-full min-h-[15rem]">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15939.767370096171!2d117.38564355657346!3d2.833077406393867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1754297844801!5m2!1sid!2sid" style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                                </div>
                                
                                <!-- /.map -->
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] max-w-full">
                                <div class="p-10 xl:!p-[4.5rem] lg:!p-[4.5rem] md:!p-12">
                                    <div class="flex flex-row">
                                        <div>
                                            <div class="icon text-[#fab758] xl:text-[1.4rem] text-[calc(1.265rem_+_0.18vw)] !mr-4 mt-[-0.25rem]">
                                                <i class="uil uil-location-pin-alt before:content-['\ebd8']"></i>
                                            </div>
                                        </div>
                                        <div class="!self-start !justify-start">
                                            <h5 class="!mb-1">Address</h5>
                                            <address class="not-italic leading-[inherit] mb-4">Jl. Jelarai Raya, Tj. Selor Hilir<br class="hidden xl:block lg:block md:block">Kabupaten Bulungan, Kalimantan Utara 77215</address>
                                        </div>
                                    </div>
                                    <!--/div -->
                                    <div class="flex flex-row">
                                        <div>
                                            <div class="icon text-[#fab758] xl:text-[1.4rem] text-[calc(1.265rem_+_0.18vw)] !mr-4 mt-[-0.25rem]">
                                                <i class="uil uil-envelope before:content-['\eac8']"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="!mb-1">E-mail</h5>
                                            <p class="!mb-0"><a href="mailto:info@yourcompany.com" class="text-[#60697b]">ptuweindokuenterprize@gmail.com</a></p>
                                        </div>
                                    </div>
                                    <!--/div -->
                                </div>
                                <!--/div -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->

            <div class="flex flex-wrap mx-[-15px]">
                <div class="xl:w-8/12 xl:!ml-[16.66666667%] lg:w-10/12 lg:!ml-[8.33333333%] w-full flex-[0_0_auto] px-[15px] max-w-full">
                    <h2 class="text-[calc(1.305rem_+_0.66vw)] font-bold xl:text-[1.8rem] leading-[1.3] mb-3 !text-center">Drop Us a Line</h2>
                    <p class="lead leading-[1.65] text-[0.9rem] font-medium !text-center mb-10">Reach out to us from our contact form and we will get back to you shortly.</p>
                    
                    <!-- Contact Form -->
                    <form wire:submit.prevent="submitForm" class="contact-form">
                        @if(session()->has('success'))
                            <div class="alert-success bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="flex flex-wrap mx-[-10px]">
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                <div class="form-floating relative !mb-4">
                                    <input id="firstname" type="text" wire:model="firstname"
                                        class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]"
                                        placeholder="Jane" required>
                                    <label for="firstname" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">First Name *</label>
                                    @error('firstname') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                <div class="form-floating relative !mb-4">
                                    <input id="lastname" type="text" wire:model="lastname"
                                        class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]"
                                        placeholder="Doe" required>
                                    <label for="lastname" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Last Name *</label>
                                    @error('lastname') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                <div class="form-floating relative !mb-4">
                                    <input id="email" type="email" wire:model="email"
                                        class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]"
                                        placeholder="jane.doe@example.com" required>
                                    <label for="email" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Email *</label>
                                    @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full">
                                <div class="form-floating relative !mb-4">
                                    <input id="company" type="text" wire:model="company"
                                        class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]"
                                        placeholder="Your Company">
                                    <label for="company" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Company</label>
                                    @error('company') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="w-full flex-[0_0_auto] px-[15px] max-w-full">
                                <div class="form-floating relative !mb-4">
                                    <input id="title" type="text" wire:model="title"
                                        class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]"
                                        placeholder="Subject" required>
                                    <label for="title" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Subject *</label>
                                    @error('title') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="w-full flex-[0_0_auto] px-[15px] max-w-full">
                                <div class="form-floating relative !mb-4">
                                    <textarea id="message" wire:model="message"
                                        class="form-control relative block w-full text-[.75rem] font-medium text-[#60697b] bg-[#fefefe] bg-clip-padding border shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] rounded-[0.4rem] border-solid border-[rgba(8,60,130,0.07)] transition-[border-color] duration-[0.15s] ease-in-out focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] focus:!border-[rgba(250,183,88,0.5)] focus-visible:!border-[rgba(250,183,88,0.5)] focus-visible:!outline-0 placeholder:text-[#959ca9] placeholder:opacity-100 m-0 !pr-9 p-[.6rem_1rem] h-[calc(2.5rem_+_2px)] min-h-[calc(2.5rem_+_2px)] leading-[1.25]"
                                        style="height: 150px" placeholder="Your message" required></textarea>
                                    <label for="message" class="text-[#959ca9] mb-2 inline-block text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none border origin-[0_0] px-4 py-[0.6rem] border-solid border-transparent left-0 top-0 font-Manrope">Message *</label>
                                    @error('message') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="w-full flex-[0_0_auto] px-[15px] max-w-full !text-center">
                                <button type="submit" 
                                        class="btn btn-yellow text-white !bg-[#fab758] border-[#fab758] hover:text-white hover:bg-[#fab758] hover:border-[#fab758] focus:shadow-[rgba(250,183,88,0.5)] active:text-white active:bg-[#fab758] active:border-[#fab758] disabled:text-white disabled:bg-[#fab758] disabled:border-[#fab758] !rounded-[50rem] !mb-3 hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]"
                                        wire:loading.attr="disabled"
                                        wire:loading.class="opacity-75">
                                    <span wire:loading.remove>Send Message</span>
                                    <span wire:loading>Sending...</span>
                                </button>
                                <p class="text-[#aab0bc]"><strong>*</strong> These fields are required.</p>
                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /form -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</div>