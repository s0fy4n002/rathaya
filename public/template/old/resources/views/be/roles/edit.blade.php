@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Edit Role';
    $description = 'Edit Role.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
<script src="/th/be/js/vendor/jquery.validate/jquery.validate.min.js"></script> {{-- validation tooltip required --}}
@endsection

@section('js_page')
<script src="/th/be/js/forms/frmbe_roles.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Edit Role</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Role</a></li>
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

                        <section class="scroll-section" id="form-permission">{{-- Form Start --}}
                            <h2 class="small-title">Form Isian</h2>
                            <form class="tooltip-end-top" id="validationTopLabel" action="{{ route('roles.update', $role->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label>Role Name</label>
                                                <input class="form-control form-control" type="text" name="name" value="{{ $role->name }}" required />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label>Permission(s)</label>
                                                <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]" style="height: 210px;">
                                                    @forelse ($permissions as $permission)
                                                        <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                                            {{ $permission->name }}
                                                        </option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                                @if ($errors->has('permissions'))
                                                    <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                                        <div>
                                            <button class="btn btn-icon btn-icon-end btn-primary" type="submit"><span>Update Role</span><i data-acorn-icon="chevron-right"></i></button>
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