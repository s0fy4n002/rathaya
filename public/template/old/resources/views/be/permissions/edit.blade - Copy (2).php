@php
    $html_tag_data = [];
    $title = 'Edit Permissions';
    $description = 'Create Permission.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
<script src="/th/be/js/vendor/jquery.validate/jquery.validate.min.js"></script> {{-- validation tooltip required --}}
@endsection

@section('js_page')
<script src="/th/be/js/forms/frmbe_permissions.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Edit Permission</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Permissions</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Edit</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}
                            
                            <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">{{-- Top Buttons Start --}}
                                {{-- Add New Button Start --}}
                                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable" onclick="window.location.href='{{ route('permissions.create') }}';">
                                    <i data-acorn-icon="plus"></i>
                                    <span>Add New</span>
                                </button>
                                {{-- Add New Button End --}}
                            </div>{{-- Top Buttons End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}
                        <div class="card mb-5">
                            <div class="card-body">
                                <p class="mb-0">Pastikan data yang diisi sudah benar.</p>
                            </div>
                        </div>

                        <section class="scroll-section" id="form-permission">{{-- Form Start --}}
                            <h2 class="small-title">Form Isian</h2>
                            <form class="tooltip-end-top" id="validationTopLabel" action="{{ route('permissions.update', $permission->id) }}" method="post">
                            <!-- <form class="tooltip-end-top" id="rulesForm" action="{{ route('permissions.update', $permission->id) }}" method="post"> -->
                                @csrf
                                @method("PUT")
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <p class="text-alternate mb-4">
                                        Cheesecake chocolate carrot cake pie lollipop lemon drops toffee lollipop. Oat cake jujubes chupa chups cotton candy sugar plum.
                                        Jujubes wafer topping biscuit lemon drops jelly-o muffin.
                                        </p>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="mb-3 top-label">
                                                    <input class="form-control" name="name" value="{{ $permission->name }}" required />
                                                    <span>NAME</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                                            <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                                <span>Update Permission</span>
                                                <i data-acorn-icon="chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>{{-- Form End --}}
                    </div>{{-- Content END --}}
                </div>
            </div>
        </div>
@endsection