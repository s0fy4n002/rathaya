@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem01pic.titleC') }}</p>
    <form id="frmData" class="tooltip-label-end" action="{{ route('member_profile_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-4 flex flex-col gap-4">
            <div class="form-panel">
                <label for="">{{ __('fem01pic.name') }}*</label>
                <div class="input-group">
                    <input type="text" class="form-akm @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name">
                    <small class="italic">{{ __('fem01pic.name2') }} </small>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem01pic.idnum') }}*</label>
                <div class="input-group">
                    <input type="number" class="form-akm @error('idnumber') is-invalid @enderror" value="{{ old('idnumber') }}" name="idnumber">
                    <small class="italic">{{ __('fem01pic.idnum2') }} </small>
                    @error('idnumber')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for=""><i>{{ __('fem01pic.email') }}</i></label>
                <div class="input-group">
                    <input type="text" class="form-akm" value="{{ $user->email }}" disabled>
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem01pic.gender') }}*</label>
                <div class="input-group">
                    <select type="text" name="gender_id" class="form-akm select2 @error('gender_id') is-invalid @enderror">
                        <option value="">{{ __('fem01pic.cbo') }}</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender->id}}" {{ old('gender_id') == $gender->id ? "selected" : "" }} {{ ( $gender->f_active <> 1) ? 'disabled' : '' }}>{{$gender->id}} - {{ Config::get('app.locale') == "id" ? $gender->name_lid : $gender->name_len }}</option>
                        @endforeach
                    </select>
                    @error('gender_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem01pic.address') }}*</label>
                <div class="input-group">
                    <textarea type="text" class="form-akm @error('address') is-invalid @enderror" name="address">{{ old('address') }}</textarea>
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldProvince') }}*</label>
                <div class="input-group">
                        <select type="text" name="province_id" id="cboProvinsi" class="form-akm select2 @error('province_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}" {{ old('province_id') == $province->id ? "selected" : "" }}>{{$province->id}} - {{$province->name}}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldRegency') }}*</label>
                <div class="input-group">
                    <select type="text" name="regency_id" id="cboKota" class="form-akm select2 @error('regency_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        {{-- @foreach($regencies as $regency)
                            <option value="{{$regency->id}}" {{ old('regency_id') == $regency->id ? "selected" : "" }}>{{$regency->id}} - {{$regency->name}}</option>
                        @endforeach --}}
                    </select>
                    @error('regency_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem01pic.district') }}*</label>
                <div class="input-group">
                    <select type="text" name="district_id" id="cboKecamatan" class="form-akm select2 @error('district_id') is-invalid @enderror">
                        <option value="">{{ __('fem01pic.cbo') }}</option>
                        {{-- @foreach($districts as $district)
                            <option value="{{$district->id}}" {{ old('district_id') == $district->id ? "selected" : "" }}>{{$district->id}} - {{$district->name}}</option>
                        @endforeach --}}
                    </select>
                    @error('district_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem01pic.village') }}*</label>
                <div class="input-group">
                    {{-- <select type="text" class="form-akm select2">
                        <option value="">== PILIH SALAH SATU</option>
                    </select> --}}
                    <input type="text" class="form-akm @error('villagename') is-invalid @enderror" value="{{ old('villagename') }}" name="villagename">
                    @error('villagename')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-panel">
                <label for="">{{ __('fem01pic.photo') }}</label>
                <div class="input-group">
                    <input type="file" class="form-akm" name="idphoto" accept="image/jpg, image/jpeg">
                    <small class="italic">{{ __('fem01pic.photo2') }}</small>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-end">
            <button class="akm-btn bg-primary rounded text-white mt-4">{{ __('fem01pic.btnSave') }}</button>
        </div>
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $('#cboProvinsi').on('change', function () {
                var idProvince = this.value;
                $("#cboKota").html('');
                $.ajax({
                    url: "{{url('/fetch-regencies')}}",
                    type: "POST",
                    data: {
                            province_id: idProvince,
                            _token: '{{csrf_token()}}'
                        },
                    dataType: 'json',
                    success: function (resultRegency) {
                        @if(Config::get('app.locale') == "id")
                            $('#cboKota').html('<option value="">Pilih salah satu</option>');
                            $('#cboKecamatan').html('<option value="">Pilih salah satu</option>');
                        @else
                            $('#cboKota').html('<option value="">Choose one</option>');
                            $('#cboKecamatan').html('<option value="">Choose one</option>');
                        @endif
                        $.each(resultRegency.regencies, function (key, value) {
                            $("#cboKota").append('<option value="' + value.id + '">' + value.id + ' - ' + value.name + '</option>');
                        });

                    }
                });
            });

            $('#cboKota').on('change', function () {
                var idRegency = this.value;
                $("#cboKecamatan").html('');
                $.ajax({
                    url: "{{url('/fetch-districts')}}",
                    type: "POST",
                    data: {
                            regency_id: idRegency,
                            _token: '{{csrf_token()}}'
                        },
                    dataType: 'json',
                    success: function (resultDistrict) {
                        @if(Config::get('app.locale') == "id")
                            $('#cboKecamatan').html('<option value="">Pilih salah satu</option>');
                        @else
                            $('#cboKecamatan').html('<option value="">Choose one</option>');
                        @endif
                        $.each(resultDistrict.districts, function (key, value) {
                            $("#cboKecamatan").append('<option value="' + value.id + '">' + value.id + ' - ' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endpush
