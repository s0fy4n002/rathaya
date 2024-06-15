@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Edit Frontpage';
    $description = 'Edit Frontpage.';
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
                                <h1 class="mb-0 pb-0 display-4" id="title">Edit Frontpage</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Commodity</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Edit</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}
                        @include('be._layout.flash-message')
                        {{-- Basic Start --}}
                        <section class="scroll-section" id="basic">
                            <h2 class="small-title">Form Input</h2>
                            <div class="card mb-5">
                                <div class="card-body">
                                {{-- tooltip-label-end inputs should be wrapped in form-group class --}}
                                    <form id="frmPermission" class="tooltip-label-end" action="{{ route('frontpage.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <h2 class="small-title"><strong>Mission Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="mission_title1_lid" value="{{ $data->mission_title1_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('mission_title1_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="mission_title1_len" value="{{ $data->mission_title1_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('mission_title1_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Sub Title (ID)*</label>
                                                <input type="text" class="form-control" name="mission_title2_lid" value="{{ $data->mission_title2_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('mission_title2_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Sub Title (EN)*</label>
                                                <input type="text" class="form-control" name="mission_title2_len" value="{{ $data->mission_title2_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('mission_title2_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description (ID)*</label>
                                                {{-- <input type="text" class="form-control" name="mission_decs_lid" value="{{ $data->mission_decs_lid }}" required /> --}}
                                                <textarea class="form-control" name="mission_decs_lid" rows="3" cols="50" required>{{ $data->mission_decs_lid }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('mission_decs_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description (EN)*</label>
                                                {{-- <input type="text" class="form-control" name="mission_decs_len" value="{{ $data->mission_decs_len }}" required /> --}}
                                                <textarea class="form-control" name="mission_decs_len" rows="3" cols="50" required>{{ $data->mission_decs_len }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('mission_decs_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Photo</label>
                                                <input type="file" class="form-control" name="mission_image" accept="image/png, image/webp, image/jpg, image/jpeg" />
                                                <div class="form-text">File : PNG/WEBP/JPG and max size 1MB. Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>
                                                @error('mission_image')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Photo View : {{ $data->mission_image }}</label>
                                                <img src="/imgfe/{{ $data->mission_image <> '' ? $data->mission_image : 'empty.jpg' }}" class="form-control img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="" style="max-width:100px;width:100%" />
                                            </div>
                                        </div>
                                        <h2 class="small-title"><strong>Our Advantages Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="advantage_title_lid" value="{{ $data->advantage_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="advantage_title_len" value="{{ $data->advantage_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h3 class="small-title">First</h3>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #1 (ID)*</label>
                                                <input type="text" class="form-control" name="advantage1_title_lid" value="{{ $data->advantage1_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage1_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #1 (EN)*</label>
                                                <input type="text" class="form-control" name="advantage1_title_len" value="{{ $data->advantage1_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage1_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description #1 (ID)*</label>
                                                {{-- <input type="text" class="form-control" name="advantage1_desc_lid" value="{{ $data->advantage1_desc_lid }}" required /> --}}
                                                <textarea class="form-control" name="advantage1_desc_lid" rows="3" cols="50" required>{{ $data->advantage1_desc_lid }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage1_desc_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description #1 (EN)*</label>
                                                {{-- <input type="text" class="form-control" name="advantage1_desc_len" value="{{ $data->advantage1_desc_len }}" required /> --}}
                                                <textarea class="form-control" name="advantage1_desc_len" rows="3" cols="50" required>{{ $data->advantage1_desc_len }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage1_desc_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h3 class="small-title">Second</h3>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #2 (ID)*</label>
                                                <input type="text" class="form-control" name="advantage2_title_lid" value="{{ $data->advantage2_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage2_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #2 (EN)*</label>
                                                <input type="text" class="form-control" name="advantage2_title_len" value="{{ $data->advantage2_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage2_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description #2 (ID)*</label>
                                                {{-- <input type="text" class="form-control" name="advantage2_desc_lid" value="{{ $data->advantage2_desc_lid }}" required /> --}}
                                                <textarea class="form-control" name="advantage2_desc_lid" rows="3" cols="50" required>{{ $data->advantage2_desc_lid }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage2_desc_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description #2 (EN)*</label>
                                                {{-- <input type="text" class="form-control" name="advantage2_desc_len" value="{{ $data->advantage2_desc_len }}" required /> --}}
                                                <textarea class="form-control" name="advantage2_desc_len" rows="3" cols="50" required>{{ $data->advantage2_desc_len }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage2_desc_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h3 class="small-title">Third</h3>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #3 (ID)*</label>
                                                <input type="text" class="form-control" name="advantage3_title_lid" value="{{ $data->advantage3_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage3_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #3 (EN)*</label>
                                                <input type="text" class="form-control" name="advantage3_title_len" value="{{ $data->advantage3_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage3_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description #3 (ID)*</label>
                                                {{-- <input type="text" class="form-control" name="advantage3_desc_lid" value="{{ $data->advantage3_desc_lid }}" required /> --}}
                                                <textarea class="form-control" name="advantage3_desc_lid" rows="3" cols="50" required>{{ $data->advantage3_desc_lid }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage3_desc_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description #3 (EN)*</label>
                                                {{-- <input type="text" class="form-control" name="advantage3_desc_len" value="{{ $data->advantage3_desc_len }}" required /> --}}
                                                <textarea class="form-control" name="advantage3_desc_len" rows="3" cols="50" required>{{ $data->advantage3_desc_len }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('advantage3_desc_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h2 class="small-title"><strong>Product Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="product_title_lid" value="{{ $data->product_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('product_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="product_title_len" value="{{ $data->product_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('product_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Most Popular (ID)*</label>
                                                <input type="text" class="form-control" name="product_popular_title_lid" value="{{ $data->product_popular_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('product_popular_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Most Popular (EN)*</label>
                                                <input type="text" class="form-control" name="product_popular_title_len" value="{{ $data->product_popular_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('product_popular_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h2 class="small-title"><strong>How We Work Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="work_title_lid" value="{{ $data->work_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('work_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="work_title_len" value="{{ $data->work_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('work_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Photo</label>
                                                <input type="file" class="form-control" name="work_image" accept="image/png, image/webp, image/jpg, image/jpeg" />
                                                <div class="form-text">File : PNG/WEBP/JPG and max size 1MB. Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>
                                                @error('work_image')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Photo View : {{ $data->work_image }}</label>
                                                <img src="/imgfe/{{ $data->work_image <> '' ? $data->work_image : 'empty.jpg' }}" class="form-control img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="" style="max-width:100px;width:100%" />
                                            </div>
                                        </div>
                                        <h2 class="small-title"><strong>Peat Studies Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="study_title_lid" value="{{ $data->study_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="study_title_len" value="{{ $data->study_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description (ID)*</label>
                                                {{-- <input type="text" class="form-control" name="study_decs_lid" value="{{ $data->study_decs_lid }}" required /> --}}
                                                <textarea class="form-control" name="study_decs_lid" rows="3" cols="50" required>{{ $data->study_decs_lid }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study_decs_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Description (EN)*</label>
                                                {{-- <input type="text" class="form-control" name="study_decs_len" value="{{ $data->study_decs_len }}" required /> --}}
                                                <textarea class="form-control" name="study_decs_len" rows="3" cols="50" required>{{ $data->study_decs_len }} </textarea>
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study_decs_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h3 class="small-title">First</h3>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #1 (ID)*</label>
                                                <input type="text" class="form-control" name="study1_title_lid" value="{{ $data->study1_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study1_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #1 (EN)*</label>
                                                <input type="text" class="form-control" name="study1_title_len" value="{{ $data->study1_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study1_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group">
                                                <label class="form-label">URL #1*</label>
                                                <input type="text" class="form-control" name="study1_url" value="{{ $data->study1_url }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study1_url')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h3 class="small-title">Second</h3>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #2 (ID)*</label>
                                                <input type="text" class="form-control" name="study2_title_lid" value="{{ $data->study2_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study2_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #2 (EN)*</label>
                                                <input type="text" class="form-control" name="study2_title_len" value="{{ $data->study2_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study2_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group">
                                                <label class="form-label">URL #2*</label>
                                                <input type="text" class="form-control" name="study2_url" value="{{ $data->study2_url }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study2_url')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h3 class="small-title">Third</h3>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #3 (ID)*</label>
                                                <input type="text" class="form-control" name="study3_title_lid" value="{{ $data->study3_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study3_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title #3 (EN)*</label>
                                                <input type="text" class="form-control" name="study3_title_len" value="{{ $data->study3_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study3_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group">
                                                <label class="form-label">URL #3*</label>
                                                <input type="text" class="form-control" name="study3_url" value="{{ $data->study3_url }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('study3_url')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h2 class="small-title"><strong>Partner Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="partner_title_lid" value="{{ $data->partner_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('partner_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="partner_title_len" value="{{ $data->partner_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('partner_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <h2 class="small-title"><strong>Call To Action Section</strong></h2>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (ID)*</label>
                                                <input type="text" class="form-control" name="cto_title_lid" value="{{ $data->cto_title_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('cto_title_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Title (EN)*</label>
                                                <input type="text" class="form-control" name="cto_title_len" value="{{ $data->cto_title_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('cto_title_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Button (ID)*</label>
                                                <input type="text" class="form-control" name="cto_button_lid" value="{{ $data->cto_button_lid }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('cto_button_lid')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 position-relative form-group col-sm-6">
                                                <label class="form-label">Button (EN)*</label>
                                                <input type="text" class="form-control" name="cto_button_len" value="{{ $data->cto_button_len }}" required />
                                                <div class="form-text">Input <strong>minimum 5 characters.</strong></div>
                                                @error('cto_button_len')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-icon btn-icon-end btn-primary"> <span>Update </span><i data-acorn-icon="chevron-right"></i></button>
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
