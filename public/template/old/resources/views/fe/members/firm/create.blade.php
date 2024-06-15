@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem02bus.titleC') }}</p>
    <form id="frmData" class="tooltip-label-end" action="{{ route('member_firm_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-4 flex flex-col gap-4">
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldName') }}*</label>
                <div class="input-group">
                    <input type="text" name="name" class="form-akm @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldBentity') }}*</label>
                <div class="input-group">
                    <select type="text" name="bentity_id" class="form-akm select2 @error('bentity_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($bentities as $bentity)
                            <option value="{{$bentity->id}}" {{ old('bentity_id') == $bentity->id ? "selected" : "" }} {{ ( $bentity->f_active <> 1) ? 'disabled' : '' }}>{{$bentity->id}} - {{ Config::get('app.locale') == "id" ? $bentity->name_lid : $bentity->name_len }}</option>
                        @endforeach
                    </select>
                    @error('bentity_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMobile') }}*</label>
                <div class="input-group">
                    <input type="number" name="wanumber" class="form-akm @error('wanumber') is-invalid @enderror" value="{{ old('wanumber') }}">
                    <small class="italic">{{ __('fem02bus.fldMobile2') }}</small>
                    @error('wanumber')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldAddress') }}*</label>
                <div class="input-group">
                    <input type="text" name="address" class="form-akm @error('address') is-invalid @enderror" value="{{ old('wanumber') }}">
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
                <label for="">{{ __('fem02bus.fldEstablished') }}*</label>
                <div class="input-group">
                    <input type="text" name="established" class="form-akm @error('established') is-invalid @enderror" value="{{ old('established') }}">
                    <small class="italic">{{ __('fem02bus.fldEstablished2') }}</small>
                    @error('established')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldArea') }}*</label>
                <div class="input-group">
                    <input type="number" name="area" class="form-akm @error('area') is-invalid @enderror" value="{{ old('area') }}">
                    <small class="italic">{{ __('fem02bus.fldArea2') }}</small>
                    @error('area')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldEmployee') }}*</label>
                <div class="input-group">
                    <input type="number" name="employee" class="form-akm @error('employee') is-invalid @enderror" value="{{ old('employee') }}">
                    @error('employee')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldBusinesscat') }}*</label>
                <div class="input-group">
                    <select type="text" name="turnovercat_id" class="form-akm select2 @error('turnovercat_id') is-invalid @enderror">
                        <option value="">{{ __('fem02bus.cbo') }}</option>
                        @foreach($tovercats as $tovercat)
                            <option value="{{$tovercat->id}}" {{ old('turnovercat_id') == $tovercat->id ? "selected" : "" }} {{ ( $tovercat->f_active <> 1) ? 'disabled' : '' }}>{{$tovercat->id}} - {{ Config::get('app.locale') == "id" ? $tovercat->name_lid : $tovercat->name_len }}</option>
                        @endforeach
                    </select>
                    @error('turnovercat_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldInv') }}*</label>
                <div class="input-group flex flex-col">
                    @foreach($invneeds as $invneed)
                        <div class="flex">
                            <input type="checkbox" class="form-akm @error('firminv') is-invalid @enderror" name="firminv[]" value="{{ $invneed->id }}" {{ in_array($invneed->id, old('firminv', [])) ? 'checked' : '' }} {{ ( $invneed->f_active <> 1) ? 'disabled' : '' }} />
                            <label for="">{{ Config::get('app.locale') == "id" ? $invneed->name_lid : $invneed->name_len }}</label>
                        </div>
                    @endforeach
                    @error('firminv')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- <div class="form-panel">
                <label for="">{{ __('fem02bus.fldWeb') }}</label>
                <div class="input-group" id="inRows">
                    <div class="input-group flex flex-col">
                        <select type="text" name="wid[]" class="form-akm select2 @error('turnovercat_id') is-invalid @enderror">
                            <option value="">{{ __('fem02bus.cbo') }}</option>
                            @foreach($webcats as $webcat)
                                <option value="{{$webcat->id}}" {{ old('webcat') == $webcat->id ? "selected" : "" }} {{ ( $webcat->f_active <> 1) ? 'disabled' : '' }}>{{$webcat->id}} - {{ $webcat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group flex flex-col">
                    <input class="form-akm" type="text" name="name[]" placeholder="URL">
                    <button class="akm-btn bg-primary rounded text-white mt-4 py-2 px-4 rounded" onclick="removeRow(this.parentNode)">-</button>

                    </div>
                    <div><button class="akm-btn bg-primary rounded text-white mt-4 py-2 px-4 rounded-full" onclick="addRow(); return false">Add Item</button></div>
                </div>
            </div> --}}





            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMedsos') }}</label>
                <div class="input-group">
                    <input type="text" name="urlmedsos" class="form-akm @error('urlmedsos') is-invalid @enderror" value="{{ old('urlmedsos') }}">
                    @error('urlmedsos')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMarket1') }}</label>
                <div class="input-group">
                    <input type="text" name="urlmarket1" class="form-akm @error('urlmarket1') is-invalid @enderror" value="{{ old('urlmarket1') }}">
                    @error('urlmarket1')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldMarket2') }}</label>
                <div class="input-group">
                    <input type="text" name="urlmarket2" class="form-akm @error('urlmarket2') is-invalid @enderror" value="{{ old('urlmarket2') }}">
                    @error('urlmarket2')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldDocument') }}*</label>
                <div name="document" class="input-group">
                    <input type="file" name="document" class="form-akm @error('document') is-invalid @enderror" accept="application/pdf">
                    <small class="italic">{{ __('fem02bus.fldDocument2') }}</small>
                    @error('document')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldDesc') }} (ID)*</label>
                <div class="input-group">
                    <textarea type="text" name="description_lid" class="form-akm @error('description_lid') is-invalid @enderror">{{ old('description_lid') }}</textarea>
                    @error('description_lid')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem02bus.fldDesc') }} (EN)*</label>
                <div class="input-group">
                    <textarea type="text" name="description_len" class="form-akm @error('description_len') is-invalid @enderror">{{ old('description_len') }}</textarea>
                    @error('description_len')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldImage') }}*</label>
                <div class="input-group">
                    <input type="file" name="photo" class="form-akm @error('photo') is-invalid @enderror" name="photo" accept="image/jpg, image/jpeg">
                    <small class="italic">{{ __('fem02bus.fldImage2') }}</small>
                    @error('photo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Cobaaa --}}
            <div class="form-panel">
                <label for="">{{ __('fem02bus.fldWeb') }}</label>
                <div class="flex w-[600px]" id="inRows2">
                    <div class="input-group w-[600px] column">
                        <div class="w-[600px]">
                            <select type="text" name="wid[]" class="form-akm select2 w-[600px] @error('turnovercat_id') is-invalid @enderror">
                                <option value="">{{ __('fem02bus.cbo') }}</option>
                                @foreach($webcats as $webcat)
                                    <option value="{{$webcat->id}}" {{ old('webcat') == $webcat->id ? "selected" : "" }} {{ ( $webcat->f_active <> 1) ? 'disabled' : '' }}>{{$webcat->id}} - {{ $webcat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <input class="form-akm w-5" type="text" name="name[]" placeholder="URL">
                            <button class="akm-btn bg-primary rounded text-white mt-4 py-2 px-4 rounded" onclick="removeRow2(this.parentNode)">-</button>
                        </div>
                        <div class="w-150px">
                            <button class="akm-btn bg-primary rounded text-white mt-4 py-2 px-4 rounded-full" onclick="addRow2(); return false">Add Item</button>
                        </div>
                    </div>
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
        });
    </script>
    <script>
        function addRow() {
          var newColumn = document.createElement('div');
          newColumn.setAttribute("class", "column");
          newColumn.innerHTML = ' <input class="py-2.5 px-3.5 text-sm w-2/5 hover:bg-gray-50 outline-none placeholder-neutral-400 border border-neutral-200 rounded-lg focus-within:border-neutral-600" type="text" name="name[]" placeholder="Name"> <input class="py-2.5 px-3.5 text-sm w-1/6 hover:bg-gray-50 outline-none placeholder-neutral-400 border border-neutral-200 rounded-lg focus-within:border-neutral-600" type="text" name="title[]" placeholder="Job Title"> <button class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="removeRow(this.parentNode)">-</button>';
          document.getElementById('inRows').appendChild(newColumn);

        }
        function removeRow(node) {
            return node.remove()
        }
    </script>

    <script>
        function addRow2() {
          var newColumn = document.createElement('div');
          newColumn.setAttribute("class", "row");
          newColumn.innerHTML = ' <input class="py-2.5 px-3.5 text-sm w-2/5 hover:bg-gray-50 outline-none placeholder-neutral-400 border border-neutral-200 rounded-lg focus-within:border-neutral-600" type="text" name="name[]" placeholder="Name"> <input class="py-2.5 px-3.5 text-sm w-1/6 hover:bg-gray-50 outline-none placeholder-neutral-400 border border-neutral-200 rounded-lg focus-within:border-neutral-600" type="text" name="title[]" placeholder="Job Title"> <button class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="removeRow(this.parentNode)">-</button>';
          document.getElementById('inRows2').appendChild(newColumn);

        }
        function removeRow2(node) {
            return node.remove()
        }
    </script>
@endpush
