@extends('fe.layouts.app')
@section('content')
    <section class="grid lg:grid-cols-2 grid-cols-1">
        <div class="py-24 lg:px-32 px-10 min-h-[40rem]">
            <p class="font-semibold text-3xl">{{ __('fe07log.title') }}</p>
            <form action="/login" method="post" class="mt-4 flex flex-col gap-4">
                @csrf
                <div class="form-auth">
                    <label for="">{{ __('fe07log.fldEmail') }}</label>
                    <input type="text" name="email" class="@error('email') is-invalid @enderror">
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-auth">
                    <label for="">{{ __('fe07log.fldPassword') }}</label>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-4 w-full">
                    <button href=""
                        class="bg-primary akm-btn text-white rounded inline-flex justify-center w-full">{{ __('fe07log.btnTitle') }}</button>
                </div>
                <div class="form-auth">
                    <label for=""><a href="/register">{{ __('fe07log.register') }}</a> | <a href="/password/reset">{{ __('fe07log.forgot') }}</a></label>
                </div>
            </form>
        </div>
        <img src="{{ asset('imgfe/img-login.jpg') }}" alt="" class="w-full h-full object-cover lg:block hidden">
    </section>
@endsection
