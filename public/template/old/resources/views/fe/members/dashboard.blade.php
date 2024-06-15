@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem00dash.welcome') }} {{ Auth::user()->name }}.</p>
    {{-- <p class="font-semibold"></p> --}}
    {{-- <div class="grid lg:grid-cols-2 grid-cols-1 gap-4">

    </div> --}}
    <div class="mt-4 flex flex-col gap-4">
        <p class="p-4 bg-slate-200 rounded text-sm">{{ __('fem00dash.loged_role') }}
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    {{-- <label class="badge badge-success">{{ $v }}</label> --}}
                    <span class="uppercase font-bold">{{ $v }}</span>.
                @endforeach
            @endif
            @if(!auth()->user()->hasRole('Admin|Staff|Member'))
                <span class="uppercase font-bold">{{ Config::get('app.locale') == "id" ? 'Tamu' : 'Guest' }}</span>.
            @endif
            {{ __('fem00dash.loged_time') }} {{ Auth::user()->last_login_at }} {{ __('fem00dash.loged_ip') }} {{ Auth::user()->last_login_ip }}.
        </p>
        @if($pic == null)
                <p class="p-4 bg-slate-200 rounded text-sm">{!! __('fem00dash.pic_empty') !!}</p>
            @elseif($pic->verification_id == 0)
                <p class="p-4 bg-slate-200 rounded text-sm">{!! __('fem00dash.pic_process') !!}</p>
            @else
                <p class="p-4 bg-slate-200 rounded text-sm">{{ __('fem00dash.pic_verified') }}</p>
        @endif
        @if($firm == null)
                <p class="p-4 bg-slate-200 rounded text-sm">{!! __('fem00dash.firm_empty') !!}</p>
            @elseif($firm->verification_id == 0)
                <p class="p-4 bg-slate-200 rounded text-sm">{!! __('fem00dash.firm_process') !!}</p>
            @else
                <p class="p-4 bg-slate-200 rounded text-sm">{{ __('fem00dash.firm_verified') }}</p>
        @endif
        {{-- <p class="p-4 bg-slate-200 rounded text-sm">{{ $pic }}</p>
        <p class="p-4 bg-slate-200 rounded text-sm">{{ $firm }}</p> --}}
        {{-- <p class="p-4 bg-slate-200 rounded text-sm">Silahkan lakukan pengisian <a href="{{ route('member_profile') }}" class="hover:underline">data profil diri anda.</a></p> --}}

    </div>
    <div class="mt-4 flex flex-col items-center justify-center">
        <img src="{{ asset('imgfe/img-reg.jpg') }}" alt="" class="object-cover lg:block">
    </div>
@endsection
