@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Show Business';
    $description = 'Show Business.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/th/be/css/vendor/select2.min.css" />
<link rel="stylesheet" href="/th/be/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
<script src="/th/be/js/vendor/jquery.validate/jquery.validate.min.js"></script> {{-- validation tooltip required --}}
<script src="/th/be/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
<script src="/th/be/js/forms/frmbe_firms.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Show Business</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Business</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Show</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}

                        {{-- Basic Start --}}
                        <section class="scroll-section" id="basic">
                            <h2 class="small-title">Data</h2>
                            <div class="card mb-5">
                                <div class="card-body">
                                {{-- tooltip-label-end inputs should be wrapped in form-group class --}}
                                    {{-- <form id="frmData" class="tooltip-label-end" action="{{ route('firms.update', $data->id) }}" method="post" enctype="multipart/form-data"> --}}
                                        {{-- @csrf --}}
                                        {{-- @method("PUT") --}}
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Person In Charge*</label>
                                            <select id="select2One" name="pic_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($pics as $pic)
                                                    <option value="{{$pic->id}}" {{ ( $pic->id == $data->pic_id) ? 'selected' : '' }}>{{-- $pic->id --}}{{$pic->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="mb-3 position-relative form-group">
                                            <label class="form-label">User ID*</label>
                                            <input type="text" class="form-control" name="user_id" value="{{ $data->user_id }}" disabled />
                                            <div class="form-text">Input <strong>data from PIC.</strong></div>
                                            @error('user_id')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div> --}}
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" disabled />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('name')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="" value="{{ $data->name_slug }}" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Business Entity*</label>
                                            <select id="select2Two" name="bentity_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($bentities as $bentity)
                                                    <option value="{{$bentity->id}}" {{ ( $bentity->id == $data->bentity_id) ? 'selected' : '' }}>{{$bentity->name_len}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">WA Number*</label>
                                            <input type="text" class="form-control" name="wanumber" value="{{ $data->wanumber }}" disabled />
                                            @error('wanumber')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Province*</label>
                                            <select id="select2Three" name="province_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->id}}" {{ ( $province->id == $data->province_id) ? 'selected' : '' }}>{{$province->id}} - {{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Regency*</label>
                                            <select id="select2Four" name="regency_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($regencies as $regency)
                                                    <option value="{{$regency->id}}" {{ ( $regency->id == $data->regency_id) ? 'selected' : '' }}>{{$regency->id}} - {{$regency->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Establish Since*</label>
                                            <input type="text" class="form-control" name="established" value="{{ $data->established }}" disabled />
                                            @error('established')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Area*</label>
                                            <input type="number" class="form-control" name="area" value="{{ $data->area }}" min="0" max="10000" disabled />
                                            @error('area')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Number of Employee*</label>
                                            <input type="number" class="form-control" name="employee" value="{{ $data->employee }}" min="0" max="10000" disabled />
                                            @error('employee')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Turnover Catageory*</label>
                                            <select id="select2Five" name="turnovercat_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($tovercats as $tovercat)
                                                    <option value="{{$tovercat->id}}" {{ ( $tovercat->id == $data->turnovercat_id) ? 'selected' : '' }}>{{$tovercat->id}} - {{$tovercat->name_len}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Website URL*</label>
                                            <input type="text" class="form-control" name="urlweb" value="{{ $data->urlweb }}" disabled />
                                            @error('urlweb')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Social Media URL*</label>
                                            <input type="text" class="form-control" name="urlmedsos" value="{{ $data->urlmedsos }}" disabled />
                                            @error('urlmedsos')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Tokopedia URL*</label>
                                            <input type="text" class="form-control" name="urlmarket1" value="{{ $data->urlmarket1 }}" disabled />
                                            @error('urlmarket1')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Shopee URL*</label>
                                            <input type="text" class="form-control" name="urlmarket2" value="{{ $data->urlmarket2 }}" disabled />
                                            @error('urlmarket2')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo*</label>
                                            {{-- <input type="file" class="form-control" name="photo" accept="image/jpg, image/jpeg" /> --}}
                                            <div class="form-text"><img src="/imgfirms/{{ $data->photo <> '' ? $data->photo : 'empty.jpg' }}" class="mt-2 img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="photo image" style="max-width:100px;width:100%"/></div>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Document*</label>
                                            {{-- <input type="file" class="form-control" name="document" accept="application/pdf" /> --}}
                                            <div class="form-text"><a href="/pdffirms/{{ $data->document }}" target="_blank">{{ $data->document }}</a></div>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <p class="mb-2 text-alternate">Investation Need(s)</p>
                                            @foreach($invneeds as $invneed)
                                                <div class="mb-1">
                                                    <label class="form-check custom-icon mb-0">
                                                        <input type="checkbox" class="form-check-input" name="firminv[]" value="{{ $invneed->id }}" {{ in_array($invneed->id, $selectedInvneeds) ? 'checked' : '' }} disabled />
                                                        <span class="heading mb-1 d-block lh-1-25">{{ $invneed->name_len }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Description (ID)*</label>
                                            {{-- <input type="text" class="form-control" name="description_lid" value="{{ $data->description_lid }}" disabled /> --}}
                                            <textarea class="form-control" name="description_lid" rows="3" cols="50" disabled>{{ $data->description_lid }} </textarea>
                                            @error('description_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Description (EN)*</label>
                                            {{-- <input type="text" class="form-control" name="description_len" value="{{ $data->description_len }}" disabled /> --}}
                                            <textarea class="form-control" name="description_len" rows="3" cols="50" disabled>{{ $data->description_len }}</textarea>
                                            @error('description_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label d-block">Verification*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="verification_id" id="inlineRadio1" value="1" {{ ($data->verification_id == "1")? "checked" : "" }} disabled />
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="verification_id" id="inlineRadio2" value="2" {{ ($data->verification_id == "2")? "checked" : "" }} />
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Create</span><i data-acorn-icon="chevron-right"></i></button> --}}
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </section>
                        {{-- Basic End --}}

                    </div>{{-- Content END --}}
                </div>
            </div>
        </div>
@endsection
