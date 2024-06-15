@extends('fe.layouts.app')
@section('content')
    <section class="py-20 akm-container">
        <h3 class="text-3xl font-semibold">{{ __('fe04enb.enabler') }}</h3>
        <div class="mt-4 ">
            <div class="grid lg:grid-cols-4 grid-cols-1 gap-4">
                {{-- @for ($i = 1; $i <= 9; $i++) --}}
                    {{-- <a href="https://www.facebook.com" class="product-business"> --}}
                        {{-- <img src="{{ asset('images/image1.jpg') }}" class="w-full h-full object-cover" alt=""> --}}
                        {{-- <div class="overlay absolute top-0 w-full h-full flex justify-center items-center p-4"> --}}
                            {{-- <div class="bg-black w-full h-full absolute -z-10"></div> --}}
                            {{-- <p class="text-white z-10 text-center">Padi Gambut</p> --}}
                        {{-- </div> --}}
                    {{-- </a> --}}
                {{-- @endfor --}}
                @foreach ($enablers as $enabler)
                    {{-- <a href="https://www.facebook.com" target="_blank" class="product-business"> --}}
                    <a href="{{ $enabler['website'] }}" target="_blank" class="product-business">
                        <img src="{{ asset('imgenablers/' . $enabler['logo']) }}" class="w-full h-full object-cover" alt="">
                        <div class="overlay absolute top-0 w-full h-full flex justify-center items-center p-4">
                            {{-- <div class="bg-black w-full h-full absolute -z-10"></div> --}}
                            <p class="text-white z-10 text-center">{{ $enabler['name'] }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
@endsection
