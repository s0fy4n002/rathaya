@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Create Village';
    $description = 'Create Village.';
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
<script src="/th/be/js/forms/frmbe_villages.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Create Village</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Village</a></li>
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
                                    <form id="frmPermission" class="tooltip-label-end" action="{{ route('villages.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">District*</label>
                                            <select id="select2Villages" name="district_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" {{ (collect(old('district_id'))->contains($district->id)) ? 'selected':'' }}>{{$district->id}} - {{$district->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-text">Input <strong>4 characters numeric.</strong></div>
                                            @error('district_id')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">ID*</label>
                                            <input type="text" class="form-control" name="id" value="{{ old('id') }}" required />
                                            <div class="form-text">Input <strong>9 characters numeric.</strong></div>
                                            @error('id')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('name')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name (UPPER)*</label>
                                            <input type="text" class="form-control" name="nameupper" value="{{ old('nameupper') }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('nameupper')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Create Village</span><i data-acorn-icon="chevron-right"></i></button>
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