@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem02bus.titleS') }}</p>
    <div class="mt-4 flex flex-col gap-4">
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldName') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->name }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for=""><i>{{ __('fem02bus.fldSlug') }}</i></label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->name_slug }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldBentity') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($bentities as $bentity)
                        <option value="{{$bentity->id}}" {{ ( $data->bentity_id == $bentity->id) ? 'selected' : '' }} disabled>{{$bentity->id}} - {{ Config::get('app.locale') == "id" ? $bentity->name_lid : $bentity->name_len }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldMobile') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->wanumber }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldAddress') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->address }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldProvince') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}" {{ ( $data->province_id == $province->id) ? 'selected' : '' }} disabled>{{$province->id}} - {{$province->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldRegency') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($regencies as $regency)
                        <option value="{{$regency->id}}" {{ ( $data->regency_id == $regency->id) ? 'selected' : '' }} disabled>{{$regency->id}} - {{$regency->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldEstablished') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->established }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldArea') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->area }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldEmployee') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->employee }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldBusinesscat') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($tovercats as $tovercat)
                        <option value="{{$tovercat->id}}" {{ ( $data->turnovercat_id == $tovercat->id) ? 'selected' : '' }} disabled>{{$tovercat->id}} - {{ Config::get('app.locale') == "id" ? $tovercat->name_lid : $tovercat->name_len }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel !items-start">
            <label for="">{{ __('fem02bus.fldInv') }}</label>
            <div class="input-group flex flex-col">
                @foreach($invneeds as $invneed)
                    <div class="flex">
                        {{-- <input type="checkbox" class="form-akm" name="firminv[]"> --}}
                        <input type="checkbox" class="form-akm" name="firminv[]" value="{{ $invneed->id }}" {{ in_array($invneed->id, $selectedInvneeds) ? 'checked' : '' }} disabled />
                        <label for="">{{ Config::get('app.locale') == "id" ? $invneed->name_lid : $invneed->name_len }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldFollowUs') }}</label>
            <div class="input-group">
                @if(strlen($data->urlweb) > 0)
                <div class="input-group flex flex-row space-x-4">
                    <div class="input-group w-[150px]">
                        <select type="text" class="form-akm" disabled>
                            <option value="website">{{ __('fem02bus.fldWeb') }}</option>
                        </select>
                    </div>
                    <div class="input-group grow">
                        <input type="text" class="form-akm follow-us-value" value="{{ $data->urlweb }}" disabled>
                    </div>
                </div>
                @endif
                @if(strlen($data->urlmedsos) > 0)
                <div class="input-group flex flex-row space-x-4 mt-4">
                    <div class="input-group w-[150px]">
                        <select type="text" class="form-akm" disabled>
                            <option value="mediaSos">{{ __('fem02bus.fldMedsos') }}</option>
                        </select>
                    </div>
                    <div class="input-group grow">
                        <input type="text" class="form-akm follow-us-value" value="{{ $data->urlmedsos }}" disabled>
                    </div>
                </div>
                @endif
                @if(strlen($data->urlmarket1) > 0)
                <div class="input-group flex flex-row space-x-4 mt-4">
                    <div class="input-group w-[150px]">
                        <select type="text" class="form-akm" disabled>
                            <option value="mediaSos">{{ __('fem02bus.fldMarket1') }}</option>
                        </select>
                    </div>
                    <div class="input-group grow">
                        <input type="text" class="form-akm follow-us-value" value="{{ $data->urlmarket1 }}" disabled>
                    </div>
                </div>
                @endif
                @if(strlen($data->urlmarket2) > 0)
                <div class="input-group flex flex-row space-x-4 mt-4">
                    <div class="input-group w-[150px]">
                        <select type="text" class="form-akm" disabled>
                            <option value="mediaSos">{{ __('fem02bus.fldMarket2') }}</option>
                        </select>
                    </div>
                    <div class="input-group grow">
                        <input type="text" class="form-akm follow-us-value" value="{{ $data->urlmarket2 }}" disabled>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!--
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldWeb') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->urlweb }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldMedsos') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->urlmedsos }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldMarket1') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->urlmarket1 }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldMarket2') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->urlmarket2 }}" disabled>
            </div>
        </div>
        -->
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldDocument') }}</label>
            <div class="input-group">
                @if($data->document <> null)
                    <a href="/pdffirms/{{ $data->document }}" target="_blank"><u>{{ $data->document }}</u></a>
                @else
                    <label for="">{{ Config::get('app.locale') == "id" ? "Tidak ada." : "None" }}</label>
                @endif
            </div>
        </div>
        <div class="form-panel !items-start">
            <label for="">{{ __('fem02bus.fldDesc') }} (ID)</label>
            <div class="input-group">
                <textarea type="text" class="form-akm" disabled>{{ $data->description_lid }}</textarea>
            </div>
        </div>
        <div class="form-panel !items-start">
            <label for="">{{ __('fem02bus.fldDesc') }} (EN)</label>
            <div class="input-group">
                <textarea type="text" class="form-akm" disabled>{{ $data->description_len }}</textarea>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem02bus.fldImage') }}</label>
            <div class="input-group">
                {{-- <img src="/imgfirms/{{ $data->photo <> '' ? $data->photo : 'empty.jpg' }}" class="bg-primary rounded object-none object-center w-[150px] h-[150px] block" alt=""> --}}
                {{-- <img class="object-cover bg-yellow-300 w-[150px] h-[150px]" src="/imgfirms/{{ $data->photo <> '' ? $data->photo : 'empty.jpg' }}"> --}}
                <img src="/imgfirms/{{ $data->photo <> '' ? $data->photo : 'empty.jpg' }}" class="bg-primary rounded w-[150px] h-[150px] block" alt="">
            </div>
        </div>
    </div>
    <div class="w-full flex justify-end">
        <a href="{{ route('member_firm_edit') }}">
            <button class="akm-btn bg-primary rounded text-white mt-4">Ubah Profil Usaha</button>
        </a>
    </div>
@endsection
