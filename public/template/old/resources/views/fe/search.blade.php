@extends('fe.layouts.app')
@section('content')
    <section class="grid lg:grid-cols-2 grid-cols-1">
        <div class="py-24 lg:px-32 px-10 min-h-[40rem]">
            <p class="font-semibold text-3xl">{{ __('fe08search.title') }}</p>
            <form action="{{ Config::get('app.locale') == "id" ? route('searchresult_id_index') : route('searchresult_en_index') }}" class="mt-4 flex flex-col gap-4" method="GET">
                <div class="form-auth">
                    <label for="">{{ __('fe08search.fldText') }}</label>
                    <input type="text" name="txtsearch" value="{{ old('txtsearch') }}" class="@error('txtsearch') is-invalid @enderror">
                    @error('txtsearch')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-4 w-full">
                    <button href=""
                        class="bg-primary akm-btn text-white rounded inline-flex justify-center w-full">{{ __('fe08search.btnSearch') }}</button>
                </div>
            </form>
        </div>
        <img src="{{ asset('imgfe/img-login.jpg') }}" alt="" class="w-full h-full object-cover lg:block hidden">
    </section>
@endsection
