@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem01pic.titleS') }}</p>
    <div class="mt-4 flex flex-col gap-4">
        <div class="form-panel">
            <label for="">{{ __('fem01pic.name') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->name }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.idnum') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->idnumber }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for=""><i>{{ __('fem01pic.email') }}</i></label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->email }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.gender') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($genders as $gender)
                        <option value="{{$gender->id}}" {{ ( $data->gender_id == $gender->id) ? 'selected' : '' }} disabled>{{$gender->id}} - {{ Config::get('app.locale') == "id" ? $gender->name_lid : $gender->name_len }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.address') }}</label>
            <div class="input-group">
                <textarea type="text" class="form-akm" disabled>{{ $data->address }}</textarea>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.province') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}" {{ ( $data->province_id == $province->id) ? 'selected' : '' }} disabled>{{$province->id}} - {{$province->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.regency') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($regencies as $regency)
                        <option value="{{$regency->id}}" {{ ( $data->regency_id == $regency->id) ? 'selected' : '' }} disabled>{{$regency->id}} - {{$regency->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.district') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($districts as $district)
                        <option value="{{$district->id}}" {{ ( $data->district_id == $district->id) ? 'selected' : '' }} disabled>{{$district->id}} - {{$district->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.village') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->villagename }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem01pic.photo') }}</label>
            <div class="input-group">
                <img src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" class="bg-primary rounded w-[150px] h-[150px] block" alt="">
            </div>
        </div>
    </div>
    <div class="w-full flex justify-end">
        <a href="{{ route('member_profile_edit') }}">
            <button class="akm-btn bg-primary rounded text-white mt-4">{{ __('fem01pic.btnEdit') }}</button>
        </a>
    </div>
@endsection
