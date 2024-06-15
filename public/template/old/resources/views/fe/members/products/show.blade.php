@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem03prod.titleS') }}</p>
    <div class="mt-4 flex flex-col gap-4">
        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldName') }}</label>
            <div class="input-group">
                <input type="text" class="form-akm" value="{{ $data->name }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldCategory') }}</label>
            <div class="input-group">
                <select type="text" class="form-akm select2">
                    @foreach($commoditycats as $commoditycat)
                        <option value="{{$commoditycat->id}}" {{ ( $data->commoditycat_id == $commoditycat->id) ? 'selected' : '' }} disabled>{{ Config::get('app.locale') == "id" ? $commoditycat->name_lid : $commoditycat->name_len }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldPricer') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->priceretailer }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldAvg') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->avgsoldmonth }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldPriceg') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->pricewholesaler }}" disabled>
            </div>
        </div>
        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldMin') }}</label>
            <div class="input-group">
                <input type="number" class="form-akm" value="{{ $data->minpurchasewholesaler }}" disabled>
            </div>
        </div>
        <div class="form-panel !items-start">
            <label for="">{{ __('fem03prod.fldDesc') }} (ID)</label>
            <div class="input-group">
                <textarea type="text" class="form-akm" disabled>{{ $data->description_lid }}</textarea>
            </div>
        </div>
        <div class="form-panel !items-start">
            <label for="">{{ __('fem03prod.fldDesc') }} (EN)</label>
            <div class="input-group">
                <textarea type="text" class="form-akm" disabled>{{ $data->description_len }}</textarea>
            </div>
        </div>

        <div class="form-panel">
            <label for="">{{ __('fem03prod.fldImage') }}</label>
            <div class="input-group">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <div><img src="{{ asset('imgproducts/'. $data->photo1 ) }}" class="rounded w-full h-full object-cover" alt=""></div>
                    {{-- <div><img src="{{ asset('imgproducts/'. $data->photo1 ) }}" class="aspect-square object-center w-100 h-100" alt=""></div> --}}
                    @if($data->photo2 <> null)<div><img src="{{ asset('imgproducts/'. $data->photo2 ) }}" class="rounded w-full h-full object-cover" alt=""></div>@endif
                    @if($data->photo3 <> null)<div><img src="{{ asset('imgproducts/'. $data->photo3 ) }}" class="rounded w-full h-full object-cover" alt=""></div>@endif
                    @if($data->photo4 <> null)<div><img src="{{ asset('imgproducts/'. $data->photo4 ) }}" class="rounded w-full h-full object-cover" alt=""></div>@endif
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-end">
        <a href="{{ route('member_product_edit', ['id' => $data->id]) }}">
            <button class="akm-btn bg-primary rounded text-white mt-4">{{ __('fem03prod.btnEdit') }}</button>
        </a>
    </div>
@endsection
