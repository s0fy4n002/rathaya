@extends('fe.layouts.app')
@section('content')
    <section class="pt-10 pb-20 akm-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold text-primary">{{ __('fe10sk.syarat') }}</h3>
                <h3 class="lg:text-5xl text-3xl font-bold mt-4 leading-tight">
                    Syarat dan Ketentuan
                </h3>
                <p class="mt-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio neque ab voluptatibus quo, expedita
                    dolor,
                    eligendi doloribus iure vero sapiente ratione vitae omnis odio blanditiis temporibus quidem harum
                    similique
                    beatae.
                </p>
            </div>
            <div>
                <img src="{{ asset('imgfe/img-about.jpg') }}" class="rounded-3xl" alt="">
            </div>
        </div>
    </section>
@endsection
