@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Show User';
    $description = 'Show User.';
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
                                <h1 class="mb-0 pb-0 display-4" id="title">Show User</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
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
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10 form-control">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10 form-control">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Role(s)</label>
                                        <div class="col-sm-10 form-control">
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <span class="badge bg-info">{{ $v }}</span>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Verified</label>
                                        <div class="col-sm-10 form-control">
                                            @if($user->email_verified_at === null)
                                                    <span class="badge bg-danger"><i data-acorn-icon="email" data-acorn-size="18"></i> email not verified</span>
                                                @else
                                                    <span class="badge bg-success"><i data-acorn-icon="email" data-acorn-size="18"></i> email verified</span>
                                            @endif
                                            @if($user->profile_verified === 0)
                                                    <span class="badge bg-danger"><i data-acorn-icon="user" data-acorn-size="18"></i> profile not verified</span>
                                                @else
                                                    <span class="badge bg-success"><i data-acorn-icon="user" data-acorn-size="18"></i> profile verified</span>
                                            @endif
                                            @if($user->phone_verified === 0)
                                                    <span class="badge bg-danger"><i data-acorn-icon="phone" data-acorn-size="18"></i> phone not verified</span>
                                                @else
                                                    <span class="badge bg-success"><i data-acorn-icon="phone" data-acorn-size="18"></i> phone verified</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Last Login</label>
                                        <div class="col-sm-10 form-control">
                                            @if($user->last_login_at <> '')
                                                    {{ $user->last_login_at }} with IP {{ $user->last_login_ip }}
                                                @else
                                                    Never logged in!
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10 form-control">
                                            @if($user->userstatus_id === 0)
                                                    <span class="badge bg-danger">Disabled</span>
                                                @elseif($user->userstatus_id === 1)
                                                    <span class="badge bg-success">Active</i></span>
                                                @else
                                                    <span class="badge bg-info">Locked</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Avatar</label>
                                        <div>
                                            <img src="/atr/{{ $user->avatar <> '' ? $user->avatar : 'empty.jpg' }}" class="img-fluid rounded img-fluid rounded mb-1 me-1 sw-35" alt="user image" />
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
