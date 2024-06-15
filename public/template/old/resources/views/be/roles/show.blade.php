@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Show Roles';
    $description = 'Show Roles.';
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
                                <h1 class="mb-0 pb-0 display-4" id="title">Show Roles</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Role</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Show</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}
                        {{-- <div class="card mb-5">
                            <div class="card-body">
                                <p class="mb-0">Pastikan data yang diisi sudah benar.</p>
                            </div>
                        </div> --}}

                        <section class="scroll-section" id="form-permission">{{-- Form Start --}}
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Role Name</label>
                                        <div class="col-sm-10 form-control">
                                            {{ $role->name }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Role(s)</label>
                                        <div class="col-sm-10 form-control">
                                            @forelse ($rolePermissions as $permission)
                                                <span class="badge bg-info text-uppercase">{{ $permission->name }}</span>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>{{-- Form End --}}
                    </div>{{-- Content END --}}
                </div>
            </div>
        </div>
@endsection