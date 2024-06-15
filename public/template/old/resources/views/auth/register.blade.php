@extends('fe.layouts.app')
@section('content')
    <section class="grid lg:grid-cols-2 grid-cols-1">
        <div class="py-24 lg:px-32 px-10 min-h-[40rem]">
            <p class="font-semibold text-3xl">{{ __('fe06reg.title') }}</p>
            <form action="{{ route('register') }}" method="post" class="mt-4 flex flex-col gap-4">
                @csrf
                <div class="form-auth">
                    <label for="name">{{ __('fe06reg.fldName') }}</label>
                    <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                </div>
                <div class="form-auth">
                    <label for="email">{{ __('fe06reg.fldEmail') }}</label>
                    <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                </div>
                <div class="form-auth">
                    <label for="">{{ __('fe06reg.fldPassword') }}</label>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror">
                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                </div>
                <div class="form-auth">
                    <label for="password_confirmation">{{ __('fe06reg.fldConfirmPassword') }}</label>
                    <input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                </div>
                <div class="mt-4 w-full">
                    <button href=""
                        class="bg-primary akm-btn text-white rounded inline-flex justify-center w-full">Submit</button>
                </div>
            </form>
        </div>
        {{-- <img src="{{ asset('imgfe/img-reg.jpg') }}" alt="" class="w-full h-full object-cover lg:block hidden"> --}}
        <img src="{{ asset('imgfe/img-reg.jpg') }}" alt="" class="w-full h-full object-cover lg:block">
    </section>
@endsection
