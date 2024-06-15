@extends('fe.layouts.app')

@section('content')
<section class="grid lg:grid-cols-2 grid-cols-1">
    <div class="py-24 lg:px-32 px-10 min-h-[40rem]">
        <p class="font-semibold text-3xl mb-3">{{ __('passresetemail.title') }}</p>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-auth">
                <label for="email">{{ __('passreset.email') }}</label>
                <input type="text" name="email" class="@error('email') is-invalid @enderror">
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-auth">
                <label for="email">{{ __('passreset.password') }}</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-auth">
                <label for="password-confirm">{{ __('passreset.confirm') }}</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
            </div>
            <div class="mt-4 w-full">
                <button href=""
                    class="bg-primary akm-btn text-white rounded inline-flex justify-center w-full">{{ __('passreset.button') }}</button>
            </div>
        </form>
        @if (session('status'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <img src="{{ asset('imgfe/img-login.jpg') }}" alt="" class="w-full h-full object-cover lg:block hidden">
</section>
@endsection
