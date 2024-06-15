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
@endsection

@section('js_vendor')
<!-- <script src="/th/be/js/vendor/jquery.validate/jquery.validate.min.js"></script> {{-- validation tooltip required --}} -->
<!-- <script src="/th/be/js/cs/scrollspy.js"></script> -->
<script src="/th/be/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
<script src="/th/be/js/forms/frmbe_users.js"></script>
<script src="/th/be/js/forms/controls.select2.js"></script>
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

                        <!-- Common Rules Start -->
                        <section class="scroll-section" id="commonRules">
                        <h2 class="small-title">Common Rules</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                            <!-- <form id="rulesForm" class="tooltip-label-end" novalidate> -->
                            <form action="{{ route('users.store') }}" method="post" id="rulesForm" class="tooltip-label-end">
                                @csrf
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="rulesName" required />
                                    <div class="form-text">Must be letters only!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="rulesEmail" required />
                                    <div class="form-text">Must be a valid email!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Email Verified At</label>
                                    <input type="text" class="form-control" name="rulesName" value="2001-01-01 01:01:01" required disabled />
                                    <div class="form-text">Automatic value!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="rulesPassword" id="rulesPassword" required />
                                    <div class="form-text">Must be at least 6 chars!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control" name="rulesPasswordConfirm" id="rulesPasswordConfirm" required />
                                    <div class="form-text">Must be same with password!</div>
                                </div>

                                <div class="mb-3 position-relative form-group">
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
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Profile Verified</label>
                                    <div>
                                        <input type="radio" class="btn-check" id="btnRadioPrimaryOutline" name="radioOutline" /><label class="btn btn-outline-primary" for="btnRadioPrimaryOutline">Verified</label>
                                        <input type="radio" class="btn-check" id="btnRadioSecondaryOutline" name="radioOutline" /><label class="btn btn-outline-secondary" for="btnRadioSecondaryOutline">Not Verified</label>
                                    </div>
                                    <div class="form-text">Only for Member!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Phone Number For Whatsapp Verified</label>
                                    <div>
                                        <input type="radio" class="btn-check" id="btnRadioPrimaryOutline" name="radioOutline" /><label class="btn btn-outline-primary" for="btnRadioPrimaryOutline">Verified</label>
                                        <input type="radio" class="btn-check" id="btnRadioSecondaryOutline" name="radioOutline" /><label class="btn btn-outline-secondary" for="btnRadioSecondaryOutline">Not Verified</label>
                                    </div>
                                    <div class="form-text">Only for Member!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Breads</label>
                                    <div class="w-100">
                                        <select id="basicSingle">
                                            <option label="&nbsp;"></option>
                                            <option value="Breadstick">Breadstick</option>
                                            <option value="Biscotti">Biscotti</option>
                                            <option value="Fougasse">Fougasse</option>
                                            <option value="Lefse">Lefse</option>
                                            <option value="Melonpan">Melonpan</option>
                                            <option value="Naan">Naan</option>
                                            <option value="Panbrioche">Panbrioche</option>
                                            <option value="Rewena">Rewena</option>
                                            <option value="Shirmal">Shirmal</option>
                                            <option value="Tunnbröd">Tunnbröd</option>
                                            <option value="Vánočka">Vánočka</option>
                                            <option value="Zopf">Zopf</option>
                                        </select>
                                    </div>
                                    <div class="form-text">Must be letters only!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Photo</label>
                                    <input type="text" class="form-control" name="rulesName" required />
                                    <div class="form-text">Must be letters only!</div>
                                </div>

                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Id</label>
                                    <input type="text" class="form-control" name="rulesId" />
                                    <div class="form-text">Must be digits and 8 chars only!</div>
                                </div>
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" name="rulesAge" />
                                    <div class="form-text">Must be 18 and over!</div>
                                </div>
                                
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Details</label>
                                    <textarea class="form-control" rows="2" name="rulesDetail"></textarea>
                                    <div class="form-text">Must be 20 chars or less!</div>
                                </div>
                                
                                <div class="mb-3 position-relative form-group">
                                    <label class="form-label">Credit Card</label>
                                    <input type="text" class="form-control" name="rulesCreditCard" id="rulesCreditCard" />
                                    <div class="form-text">Must be a valid credit card number without whitespace!</div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                            </div>
                        </div>
                        </section>
                        <!-- Common Rules End -->
                    </div>{{-- Content END --}}
                </div>
            </div>
        </div>
@endsection