@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem03prod.titleC') }}</p>
    <form id="frmData" class="tooltip-label-end" action="{{ route('member_product_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-4 flex flex-col gap-4">
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldName') }}</label>
                <div class="input-group">
                    <input type="text" class="form-akm @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldCategory') }}</label>
                <div class="input-group">
                    <select type="text" class="form-akm select2 @error('commoditycat_id') is-invalid @enderror" name="commoditycat_id">
                        <option value="">{{ __('fem03prod.cbo') }}</option>
                        @foreach($commoditycats as $commoditycat)
                            <option value="{{$commoditycat->id}}" {{ old('commoditycat_id') == $commoditycat->id ? "selected" : "" }} {{ ( $commoditycat->f_active <> 1) ? 'disabled' : '' }}>{{ Config::get('app.locale') == "id" ? $commoditycat->name_lid : $commoditycat->name_len }}</option>
                        @endforeach
                    </select>
                    @error('commoditycat_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldPricer') }}</label>
                <div class="input-group">
                    <input type="number" class="form-akm @error('priceretailer') is-invalid @enderror" name="priceretailer" value="{{ old('priceretailer') }}">
                    @error('priceretailer')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldAvg') }}</label>
                <div class="input-group">
                    <input type="number" class="form-akm @error('avgsoldmonth') is-invalid @enderror" name="avgsoldmonth" value="{{ old('avgsoldmonth') }}">
                    @error('avgsoldmonth')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldPriceg') }}</label>
                <div class="input-group">
                    <input type="number" class="form-akm @error('pricewholesaler') is-invalid @enderror" name="pricewholesaler" value="{{ old('pricewholesaler') }}">
                    @error('pricewholesaler')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldMin') }}</label>
                <div class="input-group">
                    <input type="number" class="form-akm @error('minpurchasewholesaler') is-invalid @enderror" name="minpurchasewholesaler" value="{{ old('minpurchasewholesaler') }}">
                    @error('minpurchasewholesaler')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem03prod.fldDesc') }} (ID)</label>
                <div class="input-group">
                    <textarea type="text" class="form-akm @error('description_lid') is-invalid @enderror" name="description_lid">{{ old('description_lid') }}</textarea>
                    @error('description_lid')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel !items-start">
                <label for="">{{ __('fem03prod.fldDesc') }} (EN)</label>
                <div class="input-group">
                    <textarea type="text" class="form-akm @error('description_len') is-invalid @enderror" name="description_len">{{ old('description_len') }}</textarea>
                    @error('description_len')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldImage1') }}</label>
                <div class="input-group">
                    <input type="file" class="form-akm @error('photo1') is-invalid @enderror" name="photo1">
                    <small class="italic">{{ __('fem03prod.fldImage9') }}</small>
                    @error('photo1')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem03prod.fldImage2') }}</label>
                <div class="input-group">
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <div class="input-group mb-4">
                                <input type="file" class="form-akm @error('photo2') is-invalid @enderror" name="photo2">
                                <small class="italic">{{ __('fem03prod.fldImage9') }}</small>
                                @error('photo2')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-group mb-4">
                                <input type="file" class="form-akm @error('photo3') is-invalid @enderror" name="photo3">
                                <small class="italic">{{ __('fem03prod.fldImage9') }}</small>
                                @error('photo3')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-group mb-4">
                                <input type="file" class="form-akm @error('photo4') is-invalid @enderror" name="photo4">
                                <small class="italic">{{ __('fem03prod.fldImage9') }}</small>
                                @error('photo4')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-end mt-4">
            <button class="akm-btn bg-primary rounded text-white mt-4">{{ __('fem03prod.btnSave') }}</button>
        </div>
    </form>
@endsection
