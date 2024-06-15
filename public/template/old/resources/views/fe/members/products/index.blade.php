@extends('fe.members.layouts.panel')
@section('panel')
    <div class="flex lg:flex-row flex-col lg:justify-between justify-start items-start gap-4 lg:items-center">
        <p class="font-semibold text-2xl">{{ __('fem03prod.title') }}</p>
        <div>
            <a href="{{ route('member_product_create') }}" class="akm-btn bg-primary text-white rounded text-sm">{{ __('fem03prod.btnCreate') }}</a>
        </div>
    </div>
    <div class="mt-8 grid lg:grid-cols-4 gap-4">
        {{-- @for ($i = 0; $i < 9; $i++)
            <a href="/panel/produk/1/edit" class="product-business">
                <img src="{{ asset('images/image1.jpg') }}" class="w-full h-full object-cover" alt="">
                <div class="overlay absolute top-0 w-full h-full flex justify-center items-center p-4"> --}}
                    {{-- <div class="bg-black w-full h-full absolute -z-10"></div> --}}
                    {{-- <p class="text-white z-10 text-center">Padi Gambut</p>
                </div>
            </a>
        @endfor --}}
        @foreach ($datas as $data)
            <a href="{{route('member_product_show',$data->id)}}" class="product-business">
                {{-- <img src="{{ asset('imgproducts/'. $data->photo1 ) }}" class="w-full h-full object-cover object-center" alt=""> --}}
                <img src="{{ asset('imgproducts/'. $data->photo1 ) }}" class="w-full h-full object-cover object-center" alt="">
                <div class="overlay absolute top-0 w-full h-full flex justify-center items-center p-4">
                    {{-- <div class="bg-black w-full h-full absolute -z-10"></div> --}}
                    <p class="text-white z-10 text-center">{{ $data->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
