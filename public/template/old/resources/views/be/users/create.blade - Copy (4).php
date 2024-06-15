@php
    $html_tag_data = [];
    $title = 'Create User';
    $description = 'Create User.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/th/be/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/th/be/css/vendor/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="/th/be/css/vendor/bootstrap-datepicker3.standalone.min.css" />
    <link rel="stylesheet" href="/th/be/css/vendor/tagify.css" />
@endsection

@section('js_vendor')
    <script src="/th/be/js/cs/scrollspy.js"></script>
    <script src="/th/be/js/vendor/select2.full.min.js"></script>
    <script src="/th/be/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/th/be/js/vendor/tagify.min.js"></script>
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
                                <h1 class="mb-0 pb-0 display-4" id="title">Create User</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Create</a></li>
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
                        <section class="scroll-section" id="basic">
                            {{-- Basic Start --}}
                            <h2 class="small-title">Basic</h2>
                            <div class="card mb-5">
                                <div class="card-body">
                                    <form action="{{ route('users.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <!-- <input type="password" class="form-control" /> -->
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" id="password-confirm" class="form-control" name="confirm-password" required autocomplete="new-password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email Verified At</label>
                                            <input type="text" class="form-control" name="email_verified_at" value="2001-01-01 01:01:01" required disabled />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Role(s)</label>
                                            <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]" style="height: 110px;">
                                                @forelse ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ in_array($role->id, old('roles') ?? []) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @empty

                                                @endforelse
                                            </select>
                                            <div class="form-text">Pick one or more!</div>
                                        </div>
                                        <div class="mb-3 w-100">
                                            <label class="form-label">Status</label>
                                            <select id="cboUserStatus" required>
                                                <option label="&nbsp;"></option>
                                                <option value="0">Disabled</option>
                                                <option value="1">Active</option>
                                                <option value="2">Locked</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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