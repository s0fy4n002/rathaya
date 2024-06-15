@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Edit User';
    $description = 'Edit User.';
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
<script src="/th/be/js/forms/frmbe_users.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">Edit User</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
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

                        {{-- Basic Start --}}
                        <section class="scroll-section" id="basic">
                            <h2 class="small-title">Form Isian</h2>
                            <div class="card mb-5">
                                <div class="card-body">
                                {{-- tooltip-label-end inputs should be wrapped in form-group class --}}
                                    <form id="frmUser" class="tooltip-label-end" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required />
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Email*</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required />
                                                @error('email')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Password*</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="new-password" />
                                                @error('password')<div class="form-text text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Confirm Password*</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" autocomplete="new-password" />
                                            <div class="form-text">Harus sama dengan password!</div>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Role(s)*</label>
                                            <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]" style="height: 110px;" required>
                                                @forelse ($roles as $role)
                                                    <option value="{{ $role->id }}"  {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @empty

                                                @endforelse
                                            </select>
                                            <div class="form-text">Pick one or more!</div>
                                        </div>
                                        {{-- <div class="mb-3 w-100">
                                            <label class="form-label">Profile Status*</label>
                                            <select name="profile_verified" id="cboProfileStatus" required>
                                                <option label="&nbsp;"></option>
                                                <option value="0" {{ ( $user->profile_verified) == 0 ? 'selected' : '' }}>0 - Not Verified</option>
                                                <option value="1" {{ ( $user->profile_verified) == 1 ? 'selected' : '' }}>1 - Verified</option>
                                            </select>
                                        </div> --}}
                                        {{-- <div class="mb-3 w-100">
                                            <label class="form-label">Phone WA Status*</label>
                                            <select name="phone_verified" id="cboPhoneStatus" required>
                                                <option label="&nbsp;"></option>
                                                <option value="0" {{ ( $user->phone_verified) == 0 ? 'selected' : '' }}>0 - Not Verified</option>
                                                <option value="1" {{ ( $user->phone_verified) == 1 ? 'selected' : '' }}>1 - Verified</option>
                                            </select>
                                        </div> --}}
                                        <div class="mb-3 w-100">
                                            <label class="form-label">Status*</label>
                                            <select name="userstatus_id" id="cboUserStatus" required>
                                                <option label="&nbsp;"></option>
                                                <option value="0" {{ ( $user->userstatus_id) == 0 ? 'selected' : '' }}>0 - Disabled</option>
                                                <option value="1" {{ ( $user->userstatus_id) == 1 ? 'selected' : '' }}>1 - Active</option>
                                                <option value="2" {{ ( $user->userstatus_id) == 2 ? 'selected' : '' }}>2 - Locked</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 position-relative form-group">
                                            <label class="form-label">Photo</label>
                                            <input type="file" class="form-control" name="avatar" accept="image/jpg, image/jpeg" />
                                            <div class="form-text">File : .jpg / .jpeg with dimension 320px x 320px  and max size 1MB.</div>
                                                @error('avatar')<div class="form-text text-danger">{{ $message }} Tool resize : <strong><a href="https://redketchup.io/image-resizer" target="_blank">click here</a></strong>.</div>@enderror
                                            <img src="/atr/{{ $user->avatar <> '' ? $user->avatar : 'empty.jpg' }}" class="img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="user image" />
                                        </div>

                                        <button type="submit" class="btn btn-icon btn-icon-end btn-primary"><span>Update User</span><i data-acorn-icon="chevron-right"></i></button>
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
