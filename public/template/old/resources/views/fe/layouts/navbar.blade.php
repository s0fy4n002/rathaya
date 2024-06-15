<div class="sticky z-10 top-0 bg-white" x-data="{ open: false }">
    <nav class="flex lg:justify-between md:flex-nowrap flex-wrap text-[16px] border-b">
        <div class="md:flex lg:w-auto w-full">
            <div class="flex justify-between md:w-fit w-full">
                <a href="/" class="flex items-center">
                    <div class="bg-primary w-[56px] h-[56px] flex justify-center items-center ">
                        <img src="{{ asset('imgfe/logo.png') }}" class="h-[35px]" alt="Logo" />
                    </div>
                    <p class="font-bold ml-4 w-max">pantau gambut</p>
                </a>
                <button @click="open = !open" class="md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="relative">
                <div :class="{ 'block': open, 'hidden': !open }"
                    class="absolute bg-white md:flex justify-between lg:w-auto w-full lg:ml-10 p-4 lg:border-0 border">
                    <ul class="md:flex md:items-center md:space-x-5 md:space-y-0 space-y-4 md:my-0 relative">
                        {{-- <li class="nav-item"><a href="{{ route('frontpage') }}" class="nav-link"        >{{ __('fe00menu.mnuHome') }}</a></li>
                        <li class="nav-item"><a href="{{ route('about_index') }}" class="nav-link"      >{{ __('fe00menu.mnuAbout') }}</a></li>
                        <li class="nav-item"><a href="{{ route('firms_index') }}" class="nav-link"      >{{ __('fe00menu.mnuFirm') }}</a></li>
                        <li class="nav-item"><a href="{{ route('enablers_index') }}" class="nav-link"   >{{ __('fe00menu.mnuEnabler') }}</a></li> --}}
                        <li class="nav-item"><a href="{{ __('fe00menu.urlHome') }}" class="nav-link"    >{{ __('fe00menu.mnuHome') }}</a></li>
                        <li class="nav-item"><a href="{{ __('fe00menu.urlAbout') }}" class="nav-link"   >{{ __('fe00menu.mnuAbout') }}</a></li>
                        <li class="nav-item"><a href="{{ __('fe00menu.urlFirm') }}" class="nav-link"    >{{ __('fe00menu.mnuFirm') }}</a></li>
                        <li class="nav-item"><a href="{{ __('fe00menu.urlEnabler') }}" class="nav-link" >{{ __('fe00menu.mnuEnabler') }}</a></li>
                        <li class="nav-item"><a href="{{ __('fe00menu.urlSearch') }}" class="nav-link"  >{{ __('fe00menu.mnuSearch') }}</a></li>
                        <li class="nav-item md:!hidden block">
                            <div class="radio-bilingual" style="width: 90px;">
                                <div>
                                    <input type="radio" value="id" name="bilingual2" id="radio-one2" {{ ( Config::get('app.locale') == 'id') ? 'checked' : '' }}
                                        onchange="document.location.href = '/lang/' + this.value">
                                    <label for="radio-one2">ID</label>
                                </div>
                                <div>
                                    <input type="radio" value="en" name="bilingual2" id="radio-two2" {{ ( Config::get('app.locale') == 'en') ? 'checked' : '' }}
                                        onchange="document.location.href = '/lang/' + this.value">
                                    <label for="radio-two2">EN</label>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item space-y-4 md:!hidden block"> {{-- UNTUK MOBILE MENU --}}

                            @auth {{-- Menu IF LOGED MOBILE --}}
                                <div class="rounded bg-slate-100 p-4 ">
                                    <div class="flex flex-col justify-center items-center">
                                        @if(Auth::user()->avatar <> null)
                                                <img src="{{ asset('atr/'.Auth::user()->avatar) }}" class="h-12 w-12 rounded-full" alt="">
                                            @else
                                                <img src="{{ asset('atr/empty.jpg') }}" class="h-12 w-12 rounded-full" alt="">
                                        @endif
                                        <p class="text-center mt-4 text-lg font-semibold mb-4">{{ Auth::user()->name }}</p>
                                    </div>
                                    <ul class=" flex flex-col gap-2">
                                        @if(auth()->user()->hasRole('Admin|Staff'))
                                            <li class="p-2 text-center bg-slate-50"><a href="{{ route('adm_home') }}" class="hover:underline">{{ __('fe00menu.mnuMDashboard') }} Admin</a></li>
                                            <li class="p-2 text-center bg-slate-50">
                                                <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                                                <span class="align-middle">{{ __('fe00menu.mnuLogout') }}</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        @elseif(auth()->user()->hasRole('Member'))
                                            <li class="p-2 text-center bg-slate-50"><a href="{{ route('member_dashboard') }}" class="hover:underline">{{ __('fe00menu.mnuMDashboard') }}</a></li>
                                            <li class="!bg-transparent">
                                                <ul class="[&>li]:p-2 [&>li]:bg-slate-50 grid grid-cols-2 gap-2 rounded">
                                                    <li>
                                                        <a href="{{ route('member_profile') }}" class="hover:underline">{{ __('fe00menu.mnuMPicprofile') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('member_firm') }}" class="hover:underline">{{ __('fe00menu.mnuMFirmprofile') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('member_product_index') }}" class="hover:underline">{{ __('fe00menu.mnuMProduct') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('member_password') }}" class="hover:underline">{{ __('fe00menu.mnuMCpassword') }}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="p-2 text-center bg-slate-50">
                                                <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                                                <span class="align-middle">{{ __('fe00menu.mnuLogout') }}</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                            <li class="p-2 text-center bg-slate-50"><a href="{{ route('member_dashboard') }}" class="hover:underline">{{ __('fe00menu.mnuMDashboard') }}</a></li>
                                            <li class="p-2 text-center bg-slate-50">
                                                <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                                                <span class="align-middle">{{ __('fe00menu.mnuLogout') }}</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            @endauth
                            @guest
                                <div class="md:hidden items-center grid grid-cols-2 gap-4">
                                    <div>
                                        <a href="/login"
                                            class="hover:font-semibold py-2 px-6 text-white rounded-full bg-primary inline-block w-full text-center">{{ __('fe00menu.mnuLogin') }}</a>
                                    </div>
                                    <a href="/register"
                                        class="py-2 px-6 text-white rounded-full bg-primary inline-block w-full text-center">{{ __('fe00menu.mnuRegister') }}</a>
                                </div>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @auth {{-- INI BAGI PENGUNJUNG YANG LOGIN ntah guest atau admin --}}
            <div class="md:flex items-center hidden space-x-4 mr-4">
                <div class="radio-bilingual">
                    <div>
                        <input type="radio" value="id" name="bilingual" id="radio-one" {{ ( Config::get('app.locale') == 'id') ? 'checked' : '' }}
                            onchange="document.location.href = '/lang/' + this.value">
                        <label for="radio-one">ID</label>
                    </div>
                    <div>
                        <input type="radio" value="en" name="bilingual" id="radio-two" {{ ( Config::get('app.locale') == 'en') ? 'checked' : '' }}
                            onchange="document.location.href = '/lang/' + this.value">
                        <label for="radio-two">EN</label>
                    </div>
                </div>

                @if(auth()->user()->hasRole('Admin|Staff'))
                    <a href="{{ route('adm_home') }}" class="flex items-center gap-4">
                        {{-- <img src="{{ asset('atr/'.Auth::user()->avatar) }}" class="w-8 h-8 rounded-full" alt=""> --}}
                        <img class="w-8 h-8 rounded-full" alt="" src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" />
                        <p>{{ Auth::user()->name }}</p>
                    </a>
                @elseif(auth()->user()->hasRole('Member'))
                    <a href="{{ route('member_dashboard') }}" class="flex items-center gap-4">
                        <img class="w-8 h-8 rounded-full" alt="" src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" />
                        <p>{{ Auth::user()->name }}</p>
                    </a>
                @else
                    <a href="{{ route('member_dashboard') }}" class="flex items-center gap-4">
                        {{-- <img src="{{ asset('atr/'.Auth::user()->avatar) }}" class="w-8 h-8 rounded-full" alt=""> --}}
                        <img class="w-8 h-8 rounded-full" alt="" src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" />
                        <p>{{ Auth::user()->name }}</p>
                    </a>
                @endif
            </div>
        @endauth
        @guest {{-- INI BAGI PENGUNJUNG TANPA LOGIN --}}
            <div class="md:flex items-center hidden ">
                <div class="radio-bilingual">
                    <div>
                        <input type="radio" value="id" name="bilingual" id="radio-one"  {{ ( Config::get('app.locale') == 'id') ? 'checked' : '' }}
                            onchange="document.location.href = '/lang/' + this.value">
                        <label for="radio-one">ID</label>
                    </div>
                    <div>
                        <input type="radio" value="en" name="bilingual" id="radio-two"  {{ ( Config::get('app.locale') == 'en') ? 'checked' : '' }}
                            onchange="document.location.href = '/lang/' + this.value">
                        <label for="radio-two">EN</label>
                    </div>
                </div>
                <div class="space-x-4 mr-4">
                    <a href="/login" class="hover:font-semibold">{{ __('fe00menu.mnuLogin') }}</a>
                    <a href="/register" class="py-1 px-6 text-white rounded-full bg-primary">{{ __('fe00menu.mnuRegister') }}</a>
                </div>
            </div>
        @endguest
    </nav>
</div>

<script>
    // Untuk dropdown
    const dropdown = document.querySelectorAll('.dropdown');

    dropdown.forEach((item) => {
        let isDropdownVisible = false;
        item.addEventListener('mouseenter', (event) => {
            const list = item.querySelector('ul');
            list.classList.add('!block');
        });

        item.addEventListener('mouseleave', (event) => {
            const list = item.querySelector('ul');
            list.classList.remove('!block');
        });
        item.addEventListener('click', (event) => {
            const list = item.querySelector('ul');
            if (!isDropdownVisible) {
                list.classList.add('!block');
            } else {
                list.classList.remove('!block');
            }
            isDropdownVisible = !isDropdownVisible;
        });
    });
</script>
