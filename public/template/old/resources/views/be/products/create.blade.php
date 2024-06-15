@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Create Product';
    $description = 'Create Product.';
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
<script src="/th/be/js/forms/frmbe_products.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Create Product</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Create</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}

                        {{-- Basic Start --}}
                        <section class="scroll-section" id="basic">
                            <h2 class="small-title">Form Input</h2>
                            <div class="card mb-5">
                                <div class="card-body">
                                {{-- tooltip-label-end inputs should be wrapped in form-group class --}}
                                    <form id="frmData" class="tooltip-label-end" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Person In Charge*</label>
                                            <select id="select2One" name="pic_id" required>
                                                <option>Please choose one...</option>
                                                @foreach($pics as $pic)
                                                    <option value="{{$pic->id}}" {{ (collect(old('pic_id'))->contains($pic->id)) ? 'selected':'' }}>{{$pic->id}} - {{$pic->name}} (User ID : {{$pic->user_id}})</option>
                                                @endforeach
                                            </select>
                                            {{-- <div class="form-text">Input <strong>2 characters numeric.</strong></div> --}}
                                            @error('pic_id')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        {{-- <div class="mb-3 position-relative form-group">
                                            <label class="form-label">User ID*</label>
                                            <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}" required />
                                            <div class="form-text">Input <strong>data from PIC.</strong></div>
                                        </div> --}}
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Product Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('name')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Retailer Price*</label>
                                            <input type="number" class="form-control" name="priceretailer" value="{{ old('priceretailer') }}" min="0" max="100000000" required />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Average Sold Item(s) per Month*</label>
                                            <input type="number" class="form-control" name="avgsoldmonth" value="{{ old('avgsoldmonth') }}" min="0" max="100000000" required />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Wholesaler Price*</label>
                                            <input type="number" class="form-control" name="pricewholesaler" value="{{ old('pricewholesaler') }}" min="0" max="100000000" required />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Wholesaler Minimum Items Purchase*</label>
                                            <input type="number" class="form-control" name="minpurchasewholesaler" value="{{ old('minpurchasewholesaler') }}" min="0" max="100000000" required />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Description (ID)*</label>
                                            {{-- <input type="text" class="form-control" name="description_lid" value="{{ old('description_lid') }}" required /> --}}
                                            <textarea class="form-control" name="description_lid" rows="3" cols="50" required>{{ old('description_lid') }} </textarea>
                                            @error('description_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Description (EN)*</label>
                                            {{-- <input type="text" class="form-control" name="description_len" value="{{ old('description_len') }}" required /> --}}
                                            <textarea class="form-control" name="description_len" rows="3" cols="50" required>{{ old('description_len') }}</textarea>
                                            @error('description_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Commodity Category*</label>
                                            <select id="select2Two" name="commoditycat_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($commcats as $commcat)
                                                    <option value="{{$commcat->id}}" {{ (collect(old('commoditycat_id'))->contains($commcat->id)) ? 'selected':'' }}>{{$commcat->name_len}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo (main)*</label>
                                            <input type="file" class="form-control" name="photo1" accept="image/jpg, image/jpeg" required />
                                            <div class="form-text">File : .jpg / .jpeg with dimension min w100xh50 max w500xh500, and max size 1MB. <strong>Tool resize : <a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong></div>
                                            @error('photo1')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #2*</label>
                                            <input type="file" class="form-control" name="photo2" accept="image/jpg, image/jpeg" required />
                                            @error('photo2')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #3*</label>
                                            <input type="file" class="form-control" name="photo3" accept="image/jpg, image/jpeg" required />
                                            @error('photo3')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #4</label>
                                            <input type="file" class="form-control" name="photo4" accept="image/jpg, image/jpeg" />
                                            @error('photo4')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #5</label>
                                            <input type="file" class="form-control" name="photo5" accept="image/jpg, image/jpeg" />
                                            @error('photo5')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label d-block">Active*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="f_active" id="inlineRadio1" value="1" checked {{ old("f_active") == '1' ? 'checked' : '' }} required />
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="f_active" id="inlineRadio2" value="2" {{ old("f_active") == '2' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Create </span><i data-acorn-icon="chevron-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </section>
                        {{-- Basic End --}}

                    </div>{{-- Content END --}}
                </div>
            </div>
        </div>
@endsection
