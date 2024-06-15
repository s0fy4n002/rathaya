@extends('fe.layouts.app')
@section('content')
    <section class="py-10 akm-container">
        <div class="grid grid-cols-12 gap-4 min-h-[26rem]">
            <div class="border lg:col-span-4 col-span-full hidden p-8 lg:flex flex-col justify-between max-h-[26rem]">
                <div class="flex flex-col text-center justify-center items-center gap-3">
                    {{-- <img src="{{ asset('atr/'.Auth::user()->avatar) }}" class="w-20 h-20 rounded-full object-cover" alt=""> --}}
                    <img src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" class="w-20 h-20 rounded-full object-cover" alt="">
                    {{-- <img src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" class="w-20 h-20 rounded-full object-cover" alt=""> --}}
                    {{-- <img src="{{ Auth::user()->avatar <> '' ? asset('atr/'. Auth::user()->avatar) : asset('atr/empty.jpg') }}" class="w-full h-full object-cover" alt=""> --}}
                    <p class="font-semibold">{{ Auth::user()->name }}</p>
                </div>
                <div class="text-center flex flex-col">
                    <a href="{{ route('member_dashboard') }}" class="hover:underline"   >{{ __('fe00menu.mnuMDashboard') }}</a>
                    <a href="{{ route('member_profile') }}" class="hover:underline"     >{{ __('fe00menu.mnuMPicprofile') }}</a>
                    <a href="{{ route('member_firm') }}" class="hover:underline"        >{{ __('fe00menu.mnuMFirmprofile') }}</a>
                    <a href="{{ route('member_product_index') }}" class="hover:underline">{{ __('fe00menu.mnuMProduct') }}</a>
                    <a href="{{ route('member_password') }}" class="hover:underline"    >{{ __('fe00menu.mnuMCpassword') }}</a>
                    <div class="mt-10">
                        {{-- <a href="{{ route('logout') }}" class="">Keluar</a> --}}
                        <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                        <span class="align-middle">{{ __('fe00menu.mnuLogout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="border lg:col-span-8 col-span-full p-8">
                @yield('panel')
            </div>
        </div>
    </section>
@endsection
