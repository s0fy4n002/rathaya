@extends('fe.layouts.app')
@section('content')
    <section class="pt-10 pb-20 akm-container">
        <h3 class="font-bold text-3xl mb-6">{{ __('fe03bus.title1') }}</h3>
        <div class="border p-8">
            <h3 class="text-center font-bold text-2xl mb-8">{{ __('fe03bus.title2') }}</h3>
            <div class="grid lg:grid-cols-12 grid-cols-1 ">
                <div class="lg:col-span-8 flex flex-col gap-4 lg:mr-10 ">
                    <div class="w-full flex justify-center lg:hidden mb-4">
                        {{-- <img src="{{ asset('imgfe/image3.jpg') }}" class="w-full rounded-lg object-cover " alt=""> --}}
                        <img src="/imgfirms/{{ $data->photo }}" class="w-full rounded-lg object-cover" alt="">
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldName') }}</p>
                        <p class="content-business">{{ $data->name }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldBentity') }}</p>
                        <p class="content-business">{{ $data->bentity->name_lid }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldPic') }}</p>
                        <p class="content-business">{{ $data->pic->name }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldEmail') }}</p>
                        <p class="content-business">{{ $data->user->email }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldMobile') }}</p>
                        <p class="content-business">{{ $data->wanumber }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldAddress') }}</p>
                        <p class="content-business">{{ $data->address }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldProvince') }}</p>
                        <p class="content-business">{{ $data->province->name }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldRegency') }}</p>
                        <p class="content-business">{{ $data->regency->name }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldEstablished') }}</p>
                        <p class="content-business">{{ $data->established }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldArea') }}</p>
                        <p class="content-business">{{ $data->area }} ha</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldEmployee') }}</p>
                        <p class="content-business">{{ $data->employee }} {{ __('fe03bus.fldEmployee2') }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldBusinesscat') }}</p>
                        <p class="content-business">{{ Config::get('app.locale') == "id" ? $data->tovercat->name_lid : $data->tovercat->name_len }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldInvneed') }}</p>
                        <p class="content-business">
                            {{-- <div class="input-group flex flex-col"> --}}
                                @foreach($firminvs as $firminv)
                                    @if($loop->last)
                                        {{ Config::get('app.locale') == "id" ? $firminv->invneed->name_lid : $firminv->invneed->name_len }}
                                    @else
                                        {{ Config::get('app.locale') == "id" ? $firminv->invneed->name_lid : $firminv->invneed->name_len }},
                                    @endif

                                @endforeach
                            {{-- </div> --}}
                        </p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldWeb') }}</p>
                        <p class="content-business"><a href="http://{{ $data->urlweb }}" target="_blank">{{ $data->urlweb }}</a></p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldMedsos') }}</p>
                        <p class="content-business"><a href="http://{{ $data->urlmedsos }}" target="_blank">{{ $data->urlmedsos }}</a></p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldMarket1') }}</p>
                        <p class="content-business"><a href="http://{{ $data->urlmarket1 }}" target="_blank">{{ $data->urlmarket1 }}</a></p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldMarket2') }}</p>
                        <p class="content-business"><a href="http://{{ $data->urlmarket2 }}" target="_blank">{{ $data->urlmarket2 }}</a></p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldDesc') }}</p>
                        <p class="content-business">{{ $data->description_lid }}</p>
                    </div>
                    <div class="business-detail">
                        <p class="tag-business">{{ __('fe03bus.fldDocument') }}</p>
                        <p class="content-business"><a href="/pdffirms/{{ $data->document }}" target="_blank">{{ $data->document }}</a></p>
                    </div>
                </div>
                <div class="lg:col-span-4">
                    {{-- <img src="{{ asset('imgpics/image1.jpg') }}" class="w-full rounded object-cover lg:block hidden" alt=""> --}}
                    {{-- <img src="/imgfirms/{{ $data->photo }}" class="w-full rounded object-cover lg:block hidden" alt=""> --}}
                    <img src="/imgfirms/{{ $data->photo }}" class="w-200 h-200 rounded object-cover lg:block hidden" alt="">
                </div>
            </div>
        </div>
        <div class="mt-4 border p-8">
            <h3 class="font-bold text-2xl mb-4">{{ __('fe03bus.products') }}</h3>
            <div class="grid lg:grid-cols-4 grid-cols-1 gap-4">
                {{-- @for ($i = 0; $i < 8; $i++) --}}
                @foreach ($products as $product)
                    {{-- <a href='{{route('products_show',$product['name_slug'])}}' class="product-business"> --}}
                    <a href='{{ __('fe00menu.urlProduct').'/detail/'.$product['name_slug'] }}' class="product-business">
                        {{-- <img src="{{ asset('images/image1.jpg') }}" class="w-full h-full object-cover" alt=""> --}}
                        <img src="/imgproducts/{{ $product->photo1 }}" class="w-full h-full object-cover" alt="">
                        <div class="overlay absolute top-0 w-full h-full flex justify-center items-center p-4">
                        {{-- <div class="absolute top-0 w-full h-full flex justify-center items-center p-4"> --}}
                            {{-- <div class="bg-black w-full h-full absolute -z-10"></div> --}}
                            <p class="text-white z-10 text-center">{{ $product->name }}</p>
                        </div>
                    </a>
                {{-- @endfor --}}
                {{-- <div class="h-[600px] w-[600px] relative">
                    <img src="/imgproducts/{{ $product->photo1 }}" class="w-full h-full object-cover"alt="">
                    <div class="absolute bottom-0 px-4 py-3 bg-slate-50/[.06] w-full">
                      <h1 class="text-white font-semibold text-4xl"> {{ $product->name }} </h1>
                      <p class="text-gray-200">
                        I love kittens very much. They are amazing.
                      </p>
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
    </section>
@endsection
