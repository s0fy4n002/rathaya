@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Edit Province';
    $description = 'Edit Province.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
<script src="/th/be/js/vendor/jquery.validate/jquery.validate.min.js"></script> {{-- validation tooltip required --}}
@endsection

@section('js_page')
<script src="/th/be/js/forms/frmbe_provinces.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Edit Province</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Province</a></li>
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
                                    <form id="frmPermission" class="tooltip-label-end" action="{{ route('provinces.update', $province->id) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">ID*</label>
                                            <input type="text" class="form-control" name="id" value="{{ $province->id }}" required />
                                            <div class="form-text">Input <strong>2 characters numeric.</strong></div>
                                            @error('id')
                                                <div class="form-text">{{ $message }}</div>
                                                <!-- <div class="form-text">Input <strong>2 characters numeric.</strong></div> -->
                                            @enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ $province->name }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('name')<div class="form-text">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name (UPPER)*</label>
                                            <input type="text" class="form-control" name="nameupper" value="{{ $province->nameupper }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('nameupper')<div class="form-text">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Short (UPPER)*</label>
                                            <input type="text" class="form-control" name="short" value="{{ $province->short }}" required />
                                            <div class="form-text">Input <strong>minimum 3 characters.</strong></div>
                                            @error('nameupper')<div class="form-text">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label d-block">PG Location*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="f_pg" id="inlineRadio1" value="1" {{ ($province->f_pg=="1")? "checked" : "" }} required />
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="f_pg" id="inlineRadio2" value="0" {{ ($province->f_pg=="0")? "checked" : "" }} />
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Update Province</span><i data-acorn-icon="chevron-right"></i></button>
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