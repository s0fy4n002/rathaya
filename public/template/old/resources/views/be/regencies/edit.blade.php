@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Edit Regency';
    $description = 'Edit Regency.';
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
<script src="/th/be/js/forms/frmbe_regencies.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Edit Regency</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Regency</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Edit</a></li>
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
                                    <form id="frmPermission" class="tooltip-label-end" action="{{ route('regencies.update', $regency->id) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Province* {{ $regency->province_id }}</label>
                                            <select id="select2Provinces" name="province_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($provincies as $province)
                                                    <option value="{{$province->id}}" {{ ( $province->id == $regency->province_id) ? 'selected' : '' }}>{{$province->id}} - {{$province->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-text">Input <strong>2 characters numeric.</strong></div>
                                            @error('province_id')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">ID*</label>
                                            <input type="text" class="form-control" name="id" value="{{ $regency->id }}" required />
                                            <div class="form-text">Input <strong>2 characters numeric.</strong></div>
                                            @error('id')<div class="form-text">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ $regency->name }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('name')<div class="form-text">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name (UPPER)*</label>
                                            <input type="text" class="form-control" name="nameupper" value="{{ $regency->nameupper }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('nameupper')<div class="form-text">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label d-block">Status*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{ ($regency->status=="1")? "checked" : "" }} required />
                                                <label class="form-check-label" for="inlineRadio1">Kabupaten</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="2" {{ ($regency->status=="2")? "checked" : "" }} />
                                                <label class="form-check-label" for="inlineRadio2">Kota</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Update Regency</span><i data-acorn-icon="chevron-right"></i></button>
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