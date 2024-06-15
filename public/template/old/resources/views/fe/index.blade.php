@extends('fe.layouts.app')
@section('content')
    <section>
        <div class="owl-carousel owl-theme owl style-1 slider">
            @foreach ($sliders as $slider)
                <div class="item h-[36.5rem] bg-red-500"
                    style="background-image:url({{ asset('imgfe/sliders/' . $slider['image']) }})">
                    <div class="overlay"></div>
                    <div class="container-content-carousel">
                        <div class="body-content-carousel">
                            <h4>{{ Config::get('app.locale') == "id" ? $slider->title_lid : $slider->title_len }}</h4>
                            <a href="/register" class="inline-flex justify-center w-fit items-center mt-7 cta-hero">
                                <p class="register-hero">
                                    {{ Config::get('app.locale') == "id" ? $slider->button_lid : $slider->button_len }}
                                </p>
                                <div class="flex justify-center items-center w-8 h-12 ml-7 bg-primary">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="py-24 akm-container">
        <div class="grid grid-cols-12  mx-auto">
            <img src="{{ asset('imgfe/' . $fp->mission_image) }}" alt=""
                class="w-full max-w-[500px] mx-auto object-cover md:col-span-6 col-span-12 rounded-lg mt-[-2rem]">
            <div class="md:col-span-6 col-span-12 md:ml-6 md:mr-10">
                <p class="mb-4 text-sm font-bold text-second">{{ Config::get('app.locale') == "id" ? $fp->mission_title1_lid : $fp->mission_title1_len }}</p>
                <h3 class="font-semibold text-3xl mb-4 text-primary">
                    {{ Config::get('app.locale') == "id" ? $fp->mission_title2_lid : $fp->mission_title2_len }}
                </h3>
                <p class="text-gray-700">
                    {{ Config::get('app.locale') == "id" ? $fp->mission_decs_lid : $fp->mission_decs_len }}
                </p>
            </div>
        </div>
    </section>
    <section class="py-20 akm-container bg-slate-50">
        <h3 class="font-bold text-3xl text-center mb-16">{{ Config::get('app.locale') == "id" ? $fp->advantage_title_lid : $fp->advantage_title_len }}</h3>
        <div class="grid md:grid-cols-12 grid-cols-1 gap-10 ">
            <div class=" md:col-span-6 lg:col-span-4">
                <div class="card-advantage">
                    <i class="icon-icon-badge"></i>
                    {{-- <img src="{{ asset('images/icon1.png') }}" alt="" class="mb-2"> --}}
                    <h3 class="font-semibold text-lg mb-2 text-center">{{ Config::get('app.locale') == "id" ? $fp->advantage1_title_lid : $fp->advantage1_title_len }}</h3>
                    <p class="text-gray-700">
                        {{ Config::get('app.locale') == "id" ? $fp->advantage1_desc_lid : $fp->advantage1_desc_len }}
                    </p>
                </div>
            </div>
            <div class=" md:col-span-6 lg:col-span-4">
                <div class="card-advantage">
                    <i class="icon-icon-globe"></i>
                    {{-- <img src="{{ asset('images/icon2.png') }}" alt="" class="mb-2"> --}}
                    <p class="font-semibold text-lg mb-2 text-center">{{ Config::get('app.locale') == "id" ? $fp->advantage2_title_lid : $fp->advantage2_title_len }}</p>
                    <p class="text-gray-700">
                        {{ Config::get('app.locale') == "id" ? $fp->advantage2_desc_lid : $fp->advantage2_desc_len }}
                    </p>
                </div>
            </div>
            <div class=" md:col-span-6 lg:col-span-4 ">
                <div class="card-advantage ">
                    <i class="icon-icon-hand"></i>
                    {{-- <img src="{{ asset('images/icon3.png') }}" alt="" class="mb-2"> --}}
                    <p class="font-semibold text-lg mb-2 text-center">{{ Config::get('app.locale') == "id" ? $fp->advantage3_title_lid : $fp->advantage3_title_len }}</p>
                    <p class="text-gray-700">
                        {{ Config::get('app.locale') == "id" ? $fp->advantage3_desc_lid : $fp->advantage3_desc_len }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20">
        <div class="akm-container">
            <p class="font-bold text-sm">{{ Config::get('app.locale') == "id" ? $fp->product_title_lid : $fp->product_title_len }}</p>
            <div class="flex justify-between items-center">
                <h3 class="text-3xl text-primary font-semibold">{{ Config::get('app.locale') == "id" ? $fp->product_popular_title_lid : $fp->product_popular_title_len }}</h3>
                {{-- <a href="#" class="text-primary hover:underline md:block hidden">Lihat semua produk >></a>ini hide pas mobile --}}
            </div>
        </div>
        <div class="owl-carousel owl-theme owl product style-2 akm-container">
            {{-- @for ($i = 0; $i < 6; $i++)
                <div class="item py-10 px-3">
                    <a href="" class="">
                        <div
                            class="h-min-[20rem] rounded-lg shadow-lg p-4 border border-[#00000015] text-black hover:scale-[.95] transition-all duration-300">
                            <img src="{{ asset('imgfe/image1.jpg') }}" class="rounded-lg" alt="">
                            <h3 class="font-bold mt-3">Tanaman Padi</h3>
                            <p class="mt-4">Akmal Riyadi</p>
                            <p>Riau, Kepulauan Riau</p>
                        </div>
                    </a>
                </div>
            @endfor --}}

            @foreach ($products as $product)
                <div class="item py-10 px-3">
                    {{-- <a href="{{route('products_show',$product->name_slug)}}" class=""> --}}
                    <a href="{{ __('fe00menu.urlProduct').'/detail/'.$product->name_slug }}" class="">
                        <div
                            class="h-min-[20rem] rounded-lg shadow-lg p-4 border border-[#00000015] text-black hover:scale-[.95] transition-all duration-300">
                            {{-- <img src="{{ asset('imgproducts/image1.jpg') }}" class="rounded-lg" alt=""> --}}
                            <img src="{{ asset('imgproducts/' . $product->photo1) }}" class="rounded-lg object-cover" alt="">
                            <h3 class="font-bold mt-3">{{ $product->name }}</h3>
                            <p class="mt-4">{{ $product->firm_name }}</p>
                            <p><small class="">{{ $product->kabkota_name }}, {{ $product->prv_name }}</small></p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- ini hide pas mobile --}}
        {{-- <div class="w-full flex justify-center md:hidden">
            <a href="" class="bg-primary text-white px-4 py-2 rounded">Lihat semua produk</a>
        </div> --}}
    </section>
    <section class=" bg-slate-50 container-how overflow-hidden">
        <div class="py-20 akm-container">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
                <div class="lg:mr-16">
                    {{-- <img src="{{ asset('imgfe/petani.webp') }}" class="rounded-full object-cover hidden lg:block" alt=""> --}}
                    <img src="{{ asset('imgfe/' . $fp->work_image) }}" class="rounded-lg object-cover hidden lg:block" alt="">
                </div>
                <div>
                    <h3 class="text-3xl font-semibold mb-8">{{ Config::get('app.locale') == "id" ? $fp->work_title_lid : $fp->work_title_len }}</h3>
                    <div class="flex flex-col gap-5">
                        @foreach ($howweworks as $howwework)
                            <div class="flex gap-7">
                                <div class="md:w-10 w-8 flex-shrink-0">
                                    <p class="text-5xl">{{ $loop->index + 1}}</p>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl text-primary mb-2">{{ Config::get('app.locale') == "id" ? $howwework->title_lid : $howwework->title_len }}</h3>
                                    <p class="text-gray-700">
                                        {{ Config::get('app.locale') == "id" ? $howwework->desc_lid : $howwework->desc_len }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 akm-container">
        <div class="text-center lg:px-36">
            <h3 class="text-3xl font-semibold mb-4">{{ Config::get('app.locale') == "id" ? $fp->study_title_lid : $fp->study_title_len }}</h3>
            <p>
                {{ Config::get('app.locale') == "id" ? $fp->study_decs_lid : $fp->study_decs_len }}
            </p>
        </div>
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 mt-8">
            <a href="{{ $fp->study1_url }}" target="_blank" class="flex gap-4 items-center border p-4">
                <img src="{{ asset('imgfe/leaf.png') }}" class="w-20" alt="">
                <p class="font-semibold">{{ Config::get('app.locale') == "id" ? $fp->study1_title_lid : $fp->study1_title_len }}</p>
            </a>
            <a href="{{ $fp->study2_url }}" class="flex gap-4 items-center border p-4">
                <img src="{{ asset('imgfe/leaf.png') }}" class="w-20" alt="">
                <p class="font-semibold">{{ Config::get('app.locale') == "id" ? $fp->study2_title_lid : $fp->study2_title_len }}</p>
            </a>
            <a href="{{ $fp->study3_url }}" class="flex gap-4 items-center border p-4">
                <img src="{{ asset('imgfe/leaf.png') }}" class="w-20" alt="">
                <p class="font-semibold">{{ Config::get('app.locale') == "id" ? $fp->study3_title_lid : $fp->study3_title_len }}</p>
            </a>
        </div>
    </section>
    <section class="py-20 akm-container bg-slate-50">
        <h3 class="text-center text-3xl font-semibold mb-10">{{ Config::get('app.locale') == "id" ? $fp->partner_title_lid : $fp->partner_title_len }}</h3>
        {{-- <div class="grid lg:grid-cols-3 grid-cols-1 gap-4">
            <div class="img-mitra">
                <img src="{{ asset('images/pertamina.png') }}"  alt="">
            </div>
            <div class="img-mitra">
                <img src="{{ asset('images/kai.png') }}"  alt="">
            </div>
            <div class="img-mitra">
                <img src="{{ asset('images/kfc 1 (1).png') }}" alt="">
            </div>
            <div class="img-mitra">
                <img src="{{ asset('images/mcd.png') }}" alt="">
            </div>
        </div> --}}
        <div class="owl-carousel owl-theme owl product style-2 mitra akm-container">
            {{-- @for ($i = 0; $i < 6; $i++)
                <div class="item px-3 py-10">
                    <div class="img-mitra">
                        <img src="{{ asset('imgpartners/mitra_1.jpg') }}" alt="">
                    </div>
                </div>
            @endfor --}}

            @foreach ($partners as $partner)
                <div class="item px-3 py-10">
                    <div class="img-mitra">
                        <img src="{{ asset('imgpartners/' . $partner['logo']) }}" style="height:100%!important;" alt="">

                    </div>
                </div>
            @endforeach

        </div>

    </section>
    <section class="container-cta">
        <div class="py-20 akm-container">
            <h3 class="font-semibold text-3xl text-center lg:px-[25rem] mx-auto">{{ Config::get('app.locale') == "id" ? $fp->cto_title_lid : $fp->cto_title_len }}</h3>
            <div class="flex justify-center mt-10">
                <a href="/register" class="bg-primary text-white px-4 py-2 rounded">{{ Config::get('app.locale') == "id" ? $fp->cto_button_lid : $fp->cto_button_len }}</a>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $('.slider').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            // items: 1,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        $('.product').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            // margin: 20,
            // stagePadding: 100,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endpush
