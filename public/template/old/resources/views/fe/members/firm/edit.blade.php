@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem02bus.titleU') }}</p>
    <form id="frmData" class="tooltip-label-end" action="{{ route('member_firm_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mt-4 flex flex-col gap-4">
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldName') }}</label>
                <div class="input-group">
                    <input type="text" name="name" class="form-akm @error('name') is-invalid @enderror" value="{{ $data->name }}">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- <div class="form-panel">
                <label for="">{{ __('fem02bus.fldSlug') }}</label>
                <div class="input-group">
                    <input type="text" name="" class="form-akm" value="{{ $data->name_slug }}" disabled>
                </div>
            </div> --}}
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldBentity') }}</label>
                <div class="input-group">
                    <select type="text" name="bentity_id" class="form-akm select2 @error('bentity_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($bentities as $bentity)
                            <option value="{{$bentity->id}}" {{ ( $data->bentity_id == $bentity->id) ? 'selected' : '' }} {{ ( $bentity->f_active <> 1) ? 'disabled' : '' }}>{{$bentity->id}} - {{ Config::get('app.locale') == "id" ? $bentity->name_lid : $bentity->name_len }}</option>
                        @endforeach
                    </select>
                    @error('bentity_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMobile') }}</label>
                <div class="input-group">
                    <input type="number" name="wanumber" class="form-akm @error('wanumber') is-invalid @enderror" value="{{ $data->wanumber }}">
                    <small class="italic">{{ __('fem02bus.fldMobile2') }}</small>
                    @error('wanumber')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldAddress') }}</label>
                <div class="input-group">
                    <input type="text" name="address" class="form-akm @error('address') is-invalid @enderror" value="{{ $data->address }}">
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldProvince') }}</label>
                <div class="input-group">
                        <select type="text" name="province_id" id="cboProvinsi" class="form-akm select2 @error('province_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}" {{ ( $data->province_id == $province->id) ? 'selected' : '' }}>{{$province->id}} - {{$province->name}}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldRegency') }}</label>
                <div class="input-group">
                    <select id="cboKota" type="text" name="regency_id" class="form-akm select2 @error('regency_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($regencies as $regency)
                            <option value="{{$regency->id}}" {{ ( $data->regency_id == $regency->id) ? 'selected' : '' }}>{{$regency->id}} - {{$regency->name}}</option>
                        @endforeach
                    </select>
                    @error('regency_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldEstablished') }}</label>
                <div class="input-group">
                    <input type="number" name="established" class="form-akm @error('established') is-invalid @enderror" value="{{ $data->established }}">
                    <small class="italic">{{ __('fem02bus.fldEstablished2') }}</small>
                    @error('established')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldArea') }}</label>
                <div class="input-group">
                    <input type="number" name="area" class="form-akm @error('area') is-invalid @enderror" value="{{ $data->area }}">
                    <small class="italic">{{ __('fem02bus.fldArea2') }}</small>
                    @error('area')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldEmployee') }}</label>
                <div class="input-group">
                    <input type="number" name="employee" class="form-akm @error('employee') is-invalid @enderror" value="{{ $data->employee }}">
                    @error('employee')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldBusinesscat') }}</label>
                <div class="input-group">
                    <select type="text" name="turnovercat_id" class="form-akm select2 @error('turnovercat_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($tovercats as $tovercat)
                            <option value="{{$tovercat->id}}" {{ ( $data->turnovercat_id == $tovercat->id) ? 'selected' : '' }} {{ ( $tovercat->f_active <> 1) ? 'disabled' : '' }}>{{$tovercat->id}} - {{ Config::get('app.locale') == "id" ? $tovercat->name_lid : $tovercat->name_len }}</option>
                        @endforeach
                    </select>
                    @error('turnovercat_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldInv') }}</label>
                <div class="input-group flex flex-col">
                    @foreach($invneeds as $invneed)
                        <div class="flex">
                            <input type="checkbox" class="form-akm @error('firminv') is-invalid @enderror" name="firminv[]" value="{{ $invneed->id }}" {{ in_array($invneed->id, $selectedInvneeds) ? 'checked' : '' }} {{ ( $invneed->f_active <> 1) ? 'disabled' : '' }}/>
                            <label for="">{{ Config::get('app.locale') == "id" ? $invneed->name_lid : $invneed->name_len }}</label>
                        </div>
                    @endforeach
                    @error('firminv')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldFollowUs') }}</label>
                <div class="input-group flex flex-col follow-us-rows">
                    <div class="input-group flex flex-row space-x-4 follow-us-row">
                        <div class="input-group">
                            <select type="text" name="followustype[]" class="form-akm @error('followus') is-invalid @enderror">
                                <option value="website">{{ __('fem02bus.fldWeb') }}</option>
                                <option value="mediaSos">{{ __('fem02bus.fldMedsos') }}</option>
                                <option value="market1">{{ __('fem02bus.fldMarket1') }}</option>
                                <option value="market2">{{ __('fem02bus.fldMarket2') }}</option>
                            </select>
                        </div>
                        <div class="input-group grow">
                            <input type="text" name="followusvalue[]" class="form-akm @error('urlweb') is-invalid @enderror follow-us-value" value="{{ $data->urlweb }}">
                            @error('urlweb')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group follow-us-row-btn">
                            <button class="add-row bg-neutral-700 text-white rounded text-xs p-2">{{ __('fem02bus.btnAddRow') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldWeb') }}</label>
                <div class="input-group">
                    <input type="text" name="urlweb" class="form-akm @error('urlweb') is-invalid @enderror" value="{{ $data->urlweb }}">
                    @error('urlweb')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMedsos') }}</label>
                <div class="input-group">
                    <input type="text" name="urlmedsos" class="form-akm @error('urlmedsos') is-invalid @enderror" value="{{ $data->urlmedsos }}">
                    @error('urlmedsos')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMarket1') }}</label>
                <div class="input-group">
                    <input type="text" name="urlmarket1" class="form-akm @error('urlmarket1') is-invalid @enderror" value="{{ $data->urlmarket1 }}">
                    @error('urlmarket1')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMarket2') }}</label>
                <div class="input-group">
                    <input type="text" name="urlmarket2" class="form-akm @error('urlmarket2') is-invalid @enderror" value="{{ $data->urlmarket2 }}">
                    @error('urlmarket2')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            -->
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldDocument') }}</label>
                <div class="input-group">
                    <input type="file" name="document" class="form-akm @error('document') is-invalid @enderror" accept="application/pdf">
                    <small class="italic">{{ __('fem02bus.fldDocument2') }}</small>
                    @error('document')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldDesc') }} (ID)</label>
                <div class="input-group">
                    <textarea type="text" name="description_lid" class="form-akm @error('description_lid') is-invalid @enderror">{{ $data->description_lid }}</textarea>
                    @error('description_lid')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldDesc') }} (EN)</label>
                <div class="input-group">
                    <textarea type="text" name="description_len" class="form-akm @error('description_len') is-invalid @enderror">{{ $data->description_len }}</textarea>
                    @error('description_len')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldImage') }}</label>
                <div class="input-group">
                    <input type="file" class="form-akm @error('photo') is-invalid @enderror" name="photo" accept="image/jpg, image/jpeg">
                    <small class="italic">{{ __('fem02bus.fldImage2') }}</small>
                    @error('photo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="w-full flex justify-end">
            <button class="akm-btn bg-primary rounded text-white mt-4">{{ __('fem02bus.btnSave') }}</button>
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
                        @else
                            $('#cboKota').html('<option value="">Choose one</option>');
                        @endif
                        $.each(resultRegency.regencies, function (key, value) {
                            $("#cboKota").append('<option value="' + value.id + '">' + value.id + ' - ' + value.name + '</option>');
                        });

                    }
                });
            });
            
            $('.add-row').on('click', function() {
                event.preventDefault();
                var rowId = Date.now();
                $( ".follow-us-row" ).clone().addClass('mt-4 row-additional '+rowId).removeClass('follow-us-row').appendTo( ".follow-us-rows" );
                @if(Config::get('app.locale') == "id")
                    var html = '<button class="remove-row">Hapus</button>';
                @else
                    var html = '<button class="remove-row">Remove</button>';
                @endif
                $('.row-additional .follow-us-row-btn').empty().html(html);
                $('.'+rowId+' .follow-us-value').val('');
            });
            
            $('.follow-us-rows').on('click', '.remove-row', function() {
                event.preventDefault();
                $(this).parent().parent().remove();
            });
            
        });
    </script>
@endpush
