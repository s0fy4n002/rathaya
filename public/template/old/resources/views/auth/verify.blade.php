@extends('fe.layouts.app')

@section('content')
<section class="grid lg:grid-cols-2 grid-cols-1">
    <div class="py-24 lg:px-32 px-10 min-h-[40rem]">


        <p class="font-semibold text-3xl">{{ __('regverify.title') }}</p>

        <p class="mt-2">{{ __('regverify.msg1') }} {{ __('regverify.msg2') }},</p>
        <form class="mt-4 flex flex-col gap-4" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="bg-primary akm-btn text-white rounded inline-flex justify-center w-full">{{ __('regverify.another') }}</button>.
        </form>

        @if (session('resent'))
            <div class="alert alert-success mt-3" role="alert">
                <p>{{ __('regverify.resent') }}</p>
            </div>
        @endif
    </div>
    <img src="{{ asset('imgfe/img-login.jpg') }}" alt="" class="w-full h-full object-cover lg:block hidden">
</section>
@endsection
