@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Show Product';
    $description = 'Edit Product.';
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
                                <h1 class="mb-0 pb-0 display-4" id="title">Show Product</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Show</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}

                        {{-- Basic Start --}}
                        <section class="scroll-section" id="basic">
                            {{-- <h2 class="small-title">Form Input</h2> --}}
                            <div class="card mb-5">
                                <div class="card-body">
                                {{-- tooltip-label-end inputs should be wrapped in form-group class --}}
                                    {{-- <form id="frmData" class="tooltip-label-end" action="{{ route('products.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT") --}}
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Person In Charge*</label>
                                            <select id="select2One" name="pic_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($pics as $pic)
                                                    <option value="{{$pic->id}}" {{ ( $pic->id == $data->pic_id) ? 'selected' : '' }}>{{$pic->id}} - {{$pic->name}} (User ID : {{$pic->user_id}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="mb-3 position-relative form-group">
                                            <label class="form-label">User ID*</label>
                                            <input type="text" class="form-control" name="user_id" value="{{ $data->user_id }}" disabled />
                                        </div> --}}
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Product Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="" value="{{ $data->name_slug }}" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Retailer Price*</label>
                                            <input type="number" class="form-control" name="priceretailer" value="{{ $data->priceretailer }}" min="0" max="100000000" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Average Sold Item(s) per Month*</label>
                                            <input type="number" class="form-control" name="avgsoldmonth" value="{{ $data->avgsoldmonth }}" min="0" max="100000000" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Wholesaler Price*</label>
                                            <input type="number" class="form-control" name="pricewholesaler" value="{{ $data->pricewholesaler }}" min="0" max="100000000" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Wholesaler Minimum Items Purchase*</label>
                                            <input type="number" class="form-control" name="minpurchasewholesaler" value="{{ $data->minpurchasewholesaler }}" min="0" max="100000000" disabled />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Description (ID)*</label>
                                            {{-- <input type="text" class="form-control" name="description_lid" value="{{ $data->description_lid }}" required /> --}}
                                            <textarea class="form-control" name="description_lid" rows="3" cols="50" disabled>{{ $data->description_lid }} </textarea>
                                            @error('description_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Description (EN)*</label>
                                            {{-- <input type="text" class="form-control" name="description_len" value="{{ $data->description_len }}" required /> --}}
                                            <textarea class="form-control" name="description_len" rows="3" cols="50" disabled>{{ $data->description_len }}</textarea>
                                            @error('description_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Commodity Category*</label>
                                            <select id="select2Two" name="commoditycat_id" disabled>
                                                <option >Please choose one...</option>
                                                @foreach($commcats as $commcat)
                                                    <option value="{{$commcat->id}}" {{ ( $commcat->id == $data->commoditycat_id) ? 'selected' : '' }}>{{$commcat->id}} - {{$commcat->name_len}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo (main)</label>
                                            <div class="form-text"><img src="/imgproducts/{{ $data->photo1 <> '' ? $data->photo1 : 'empty.jpg' }}" class="mt-2 img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="photo1 image" style="max-width:100px;width:100%"/></div>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #2</label>
                                            <div class="form-text"><img src="/imgproducts/{{ $data->photo2 <> '' ? $data->photo2 : 'empty.jpg' }}" class="mt-2 img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="photo2 image" style="max-width:100px;width:100%"/></div>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #3</label>
                                            <div class="form-text"><img src="/imgproducts/{{ $data->photo3 <> '' ? $data->photo3 : 'empty.jpg' }}" class="mt-2 img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="photo3 image" style="max-width:100px;width:100%"/></div>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo #4</label>
                                            @if($data->photo4)
                                                <div class="form-text"><img src="/imgproducts/{{ $data->photo4 <> '' ? $data->photo4 : 'empty.jpg' }}" class="mt-2 img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="photo4 image" style="max-width:100px;width:100%"/></div>
                                                {{-- <div class="form-text">Delete photo : <strong><a href="{{ route('delete_photo', [$data->id, 4])}}">click here</a></strong></div> --}}
                                                @else
                                                <div class="form-text">No photo</div>
                                            @endif
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label d-block">Active*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="f_active" id="inlineRadio1" value="1" checked {{ ($data->f_active=="0")? "checked" : "" }} disabled />
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="f_active" id="inlineRadio2" value="2" {{ ($data->f_active=="2")? "checked" : "" }} />
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Update</span><i data-acorn-icon="chevron-right"></i></button> --}}
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
