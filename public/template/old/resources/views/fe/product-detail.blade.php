@extends('fe.layouts.app')
@section('content')
    <section class="py-20 akm-container">
        <h3 class="font-bold text-3xl mb-8">{{ __('fe05prod.title1') }}</h3>
        <div class="grid grid-cols-12 gap-4">
            <div class="lg:col-span-5 col-span-12">
                <div id="sync1" class="owl-carousel owl-theme owl style-3">
                    <div class="item" data-te-lightbox-init>
                        <img src="/imgproducts/{{ $product->photo1 }}" data-te-img="/imgproducts/{{ $product->photo1 }}" alt=""
                            class="object-cover w-full h-full  cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto">
                    </div>
                    <div class="item" data-te-lightbox-init>
                        <img src="/imgproducts/{{ $product->photo2 }}" data-te-img="/imgproducts/{{ $product->photo2 }}" alt=""
                            class="object-cover w-full h-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto">
                    </div>
                    @if($jmlgbr>=3)
                        <div class="item" data-te-lightbox-init>
                            <img src="/imgproducts/{{ $product->photo3 }}" data-te-img="/imgproducts/{{ $product->photo3 }}" alt=""
                                class="object-cover w-full h-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto">
                        </div>
                    @endif
                    @if($jmlgbr==4)
                        <div class="item" data-te-lightbox-init>
                            <img src="/imgproducts/{{ $product->photo4 }}" data-te-img="/imgproducts/{{ $product->photo4 }}" alt=""
                                class="object-cover w-full h-full cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto">
                        </div>
                    @endif
                </div>

                <div id="sync2" class="owl-carousel owl-theme owl style-3">
                    <div class="item">
                        <div class="container-content-carousel">
                            <img src="/imgproducts/{{ $product->photo1 }}" alt="" class="object-cover w-full h-full">
                        </div>
                    </div>
                    <div class="item">
                        <div class="container-content-carousel">
                            <img src="/imgproducts/{{ $product->photo2 }}" alt="" class="object-cover w-full h-full">
                        </div>
                    </div>
                    @if($jmlgbr>=3)
                        <div class="item">
                            <div class="container-content-carousel">
                                <img src="/imgproducts/{{ $product->photo3 }}" alt="" class="object-cover w-full h-full">
                            </div>
                        </div>
                    @endif
                    @if($jmlgbr==4)
                        <div class="item">
                            <div class="container-content-carousel">
                                <img src="/imgproducts/{{ $product->photo4 }}" alt="" class="object-cover w-full h-full">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="border p-4 lg:col-span-7 col-span-12">
                <h3 class="font-bold text-2xl mb-4">{{ __('fe05prod.title2') }}</h3>
                <div class="flex flex-col gap-2">
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldName') }}</p>
                        <p class="content-product">{{ $product->name }}</p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldCategory') }}</p>
                        <p class="content-product">{{ Config::get('app.locale') == "id" ? $product->commoditycat->name_lid : $product->commoditycat->name_len }}</p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldPricer') }}</p>
                        <p class="content-product">Rp. {{ number_format($product->priceretailer,0,",",".") }},-</p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldAvg') }}</p>
                        <p class="content-product">{{ number_format($product->avgsoldmonth,0,",",".") }} unit</p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldPriceg') }}</p>
                        <p class="content-product">Rp. {{ number_format($product->pricewholesaler,0,",",".") }},-</p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldMin') }}</p>
                        <p class="content-product">{{ number_format($product->minpurchasewholesaler,0,",",".") }} unit</p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product">{{ __('fe05prod.fldDesc') }}</p>
                        <p class="content-product">
                            {{ $product->description_lid }}
                        </p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product">{{ __('fe05prod.fldBusiness') }}</p>
                        <p class="content-product"><a href='{{route('firms_show',$firm['name_slug'])}}'>{{ $firm->name }}</a></p>
                    </div>
                    <div class="description-product">
                        <p class="tag-product"> {{ __('fe05prod.fldContact') }}</p>
                        <p class="content-product">{{ $product->pic->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = {{ $jmlgbr }}; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                // navText: [
                //     '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                //     '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                // ],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    nav: false,
                    dots: false,
                    margin: 10,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    </script>
@endpush
