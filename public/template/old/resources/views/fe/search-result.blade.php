@extends('fe.layouts.app')
@section('content')
    <section class="grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1">
        <div>
            <img src="{{ asset('imgfe/img-login.jpg') }}" alt="" class="w-full h-full object-cover lg:block hidden">
        </div>
        <div class="pt-10 lg:px-32 px-10 min-h-[40rem]">
            <p class="font-semibold text-3xl">{{ __('fe08search.title2') }}</p>
            @if ($resultcount>0)
                        <h4 class="mt-4 leading-tight">Hasil pencarian menemukan {{ $resultcount }} data.</h4>
                        <h3 class="font-bold mt-4 leading-tight text-primary">{{ __('fe08search.title3') }}</h3>
                        <p class="mt-2">
                            @if(empty($firms))
                                    {{ __('fe08search.notfind') }}
                                @else
                                    <ol>
                                        @foreach($firms as $firm)
                                            <li><a href='{{ __('fe00menu.urlFirm').'/detail/'.$firm['name_slug'] }}'>{{ Config::get('app.locale') == "id" ? $firm->name : $firm->name }}</a></li>
                                        @endforeach
                                    </ol>
                            @endif
                        </p>
                        <h3 class="font-bold mt-4 leading-tight text-primary"> {{ __('fe08search.title4') }}</h3>
                        <p class="mt-2">
                            @if(empty($products))
                                    {{ __('fe08search.notfind') }}
                                @else
                                    <ol class="list-decimal list-inside">
                                        @foreach($products as $product)
                                            <li>{{ Config::get('app.locale') == "id" ? $product->name : $product->name }}</li>
                                        @endforeach
                                    </ol>
                            @endif
                        </p>
                    @else
                        <h4 class="mt-4 leading-tight">Tidak ditemukan.</h4>
                        <h5>Maaf, kami tidak dapat menemukan apa yang Anda cari.
                            Silahkan mencoba kata kunci lain atau kunjungi tautan Pantau Gambut lainnya:
                            Kabar, Pelajari, Pantau Komitmen</h5>
                @endif
        </div>
        
    </section>
@endsection
