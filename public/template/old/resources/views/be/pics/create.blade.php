@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Create Person In Charge';
    $description = 'Create Person In Charge.';
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
<script src="/th/be/js/forms/frmbe_pics.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Create Person In Charge</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Person In Charge</a></li>
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
                                    <form id="frmData" class="tooltip-label-end" action="{{ route('pics.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">User Name*</label>
                                            <select id="select2One" name="user_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}" {{ (collect(old('user_id'))->contains($user->id)) ? 'selected':'' }}>{{$user->id}} - {{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('name')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        {{-- <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Email otomatis dari tabel user</label>
                                            <input type="email" class="form-control" name="name" value="{{ old('name') }}" disabled />
                                        </div> --}}
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Gender*</label>
                                            <select id="select2Two" name="gender_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($genders as $gender)
                                                    <option value="{{$gender->id}}" {{ (collect(old('gender_id'))->contains($gender->id)) ? 'selected':'' }}>{{$gender->id}} - {{$gender->name_len}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">ID Number*</label>
                                            <input type="text" class="form-control" name="idnumber" value="{{ old('idnumber') }}" required />
                                            <div class="form-text">Input <strong>16 characters.</strong></div>
                                            @error('idnumber')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">ID Photo*</label>
                                            <input type="file" class="form-control" name="idphoto" accept="image/jpg, image/jpeg" required />
                                            <div class="form-text">File : .jpg / .jpeg with dimension min w100xh50 max w500xh500, and max size 1MB. <strong>Tool resize : <a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong></div>
                                            @error('idphoto')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Address ID*</label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('address')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Province*</label>
                                            <select id="select2Three" name="province_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->id}}" {{ (collect(old('province_id'))->contains($province->id)) ? 'selected':'' }}>{{$province->id}} - {{$province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">Regency*</label>
                                            <select id="select2Four" name="regency_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($regencies as $regency)
                                                    <option value="{{$regency->id}}" {{ (collect(old('regency_id'))->contains($regency->id)) ? 'selected':'' }}>{{$regency->id}} - {{$regency->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group w-100">
                                            <label class="form-label">District*</label>
                                            <select id="select2Five" name="district_id" required>
                                                <option >Please choose one...</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" {{ (collect(old('district_id'))->contains($district->id)) ? 'selected':'' }}>{{$district->id}} - {{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Village Name*</label>
                                            <input type="text" class="form-control" name="villagename" value="{{ old('villagename') }}" required />
                                            <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                            @error('villagename')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label d-block">Verify*</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="verification_id" id="inlineRadio1" value="1" checked {{ old("verification_id") == '1' ? 'checked' : '' }} required />
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="verification_id" id="inlineRadio2" value="0" {{ old("verification_id") == '0' ? 'checked' : '' }} />
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
