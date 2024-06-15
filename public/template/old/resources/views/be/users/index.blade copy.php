@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Users';
    $description = 'User List.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/th/be/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
<script src="/th/be/js/cs/scrollspy.js"></script>
<script src="/th/be/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
<script src="/th/be/js/cs/datatable.extend.js"></script>
<script src="/th/be/js/plugins/datatable.boxedvariations.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title-container">{{-- Title and Top Buttons Start --}}
                        <div class="row">
                            <div class="col-12 col-md-7">{{-- Title Start --}}
                                <h1 class="mb-0 pb-0 display-4" id="title">User Lists</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Index</a></li>
                                </ul>
                                </nav>
                            </div>{{-- Title End --}}

                            <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">{{-- Top Buttons Start --}}
                                {{-- Add New Button Start --}}
                                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable" onclick="window.location.href='{{ route('users.create') }}';">
                                    <i data-acorn-icon="plus"></i>
                                    <span>Add New</span>
                                </button>
                                {{-- Add New Button End --}}
                            </div>{{-- Top Buttons End --}}
                        </div>
                    </div>{{-- Title and Top Buttons End --}}

                    <div>{{-- Content Start --}}
                        @include('be._layout.flash-message')

                        <section class="scroll-section" id="stripe">{{-- Stripe START --}}
                            {{-- <h2 class="small-title">Stripe</h2> --}}
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="row">{{-- Stripe Controls Start --}}
                                        <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                                            <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
                                                <input class="form-control form-control-sm datatable-search" placeholder="Search" data-datatable="#datatableStripe" />
                                                <span class="search-magnifier-icon"><i data-acorn-icon="search"></i></span>
                                                <span class="search-delete-icon d-none"><i data-acorn-icon="close"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
                                            <div class="d-inline-block">
                                                <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button" data-datatable="#datatableStripe">
                                                <i data-acorn-icon="print"></i>
                                                </button>

                                                <div class="d-inline-block datatable-export" data-datatable="#datatableStripe">
                                                    <button
                                                        class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown"
                                                        data-bs-toggle="dropdown"
                                                        type="button"
                                                        data-bs-offset="0,3" >
                                                        <i data-acorn-icon="download"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <button class="dropdown-item export-copy" type="button">Copy</button>
                                                        <button class="dropdown-item export-excel" type="button">Excel</button>
                                                        <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                                    </div>
                                                </div>
                                                <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableStripe">
                                                    <button
                                                        class="btn btn-outline-muted btn-sm dropdown-toggle"
                                                        type="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-bs-offset="0,3">
                                                        10 Items
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">5 Items</a>
                                                        <a class="dropdown-item active" href="#">10 Items</a>
                                                        <a class="dropdown-item" href="#">20 Items</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>{{-- Stripe Controls End --}}

                                    {{-- Stripe Table Start --}}
                                    <table
                                        class="data-table data-table-pagination data-table-standard responsive nowrap stripe"
                                        id="datatableStripe"
                                        data-order='[[ 0, "desc" ]]'>
                                        <thead>
                                            <tr>
                                                <th class="text-muted text-small text-uppercase">#</th>
                                                <th class="text-muted text-small text-uppercase">Name</th>
                                                <th class="text-muted text-small text-uppercase">Email</th>
                                                <th class="text-muted text-small text-uppercase">Role(s)</th>
                                                <th class="text-muted text-small text-uppercase">Verified</th>
                                                <th class="text-muted text-small text-uppercase">Last Login</th>
                                                <th class="text-muted text-small text-uppercase">Last IP</th>
                                                <th class="text-muted text-small text-uppercase">Status</th>
                                                <th class="text-muted text-small text-uppercase" style="width:10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td class="text-alternate">{{ $user->name }}</td>
                                                    <td class="text-alternate">{{ $user->email }}</td>
                                                    <td class="text-alternate">
                                                        @if(!empty($user->getRoleNames()))
                                                            @foreach($user->getRoleNames() as $v)
                                                                {{-- {!! $v == "Admin" ? '<span class="badge bg-success text-uppercase">'.$v.'</span>' : '<span class="badge bg-info text-uppercase">'.$v.'</span>' !!} --}}
                                                                @if($v == "Admin")
                                                                        <span class="badge bg-success text-uppercase">{{ $v }}</span>
                                                                    @elseif($v == "Staff")
                                                                        <span class="badge bg-secondary text-uppercase">{{ $v }}</span>
                                                                    @else
                                                                        <span class="badge bg-info text-uppercase">{{ $v }}</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td class="text-alternate">
                                                        @if($user->email_verified_at == null)
                                                                <span class="badge bg-danger"><i data-acorn-icon="email" data-acorn-size="13"></i></span>
                                                            @else
                                                                <span class="badge bg-success"><i data-acorn-icon="email" data-acorn-size="13"></i></span>
                                                        @endif
                                                        @if($user->profile_verified == 1)
                                                                <span class="badge bg-success"><i data-acorn-icon="user" data-acorn-size="13"></i></span>
                                                            @else
                                                                <span class="badge bg-danger"><i data-acorn-icon="user" data-acorn-size="13"></i></span>
                                                        @endif
                                                        @if($user->phone_verified == 1)
                                                                <span class="badge bg-success"><i data-acorn-icon="phone" data-acorn-size="13"></i></span>
                                                            @else
                                                                <span class="badge bg-danger"><i data-acorn-icon="phone" data-acorn-size="13"></i></span>
                                                        @endif
                                                    </td>

                                                    <td class="text-alternate">{{ $user->last_login_at }}</td>
                                                    <td class="text-alternate">{{ $user->last_login_ip }}</td>
                                                    <td class="text-alternate">
                                                        @if($user->userstatus_id === 0)
                                                                <span class="badge bg-danger">Disabled</span>
                                                            @elseif($user->userstatus_id === 1)
                                                                <span class="badge bg-success">Active</i></span>
                                                            @else
                                                                <span class="badge bg-info">Locked</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-alternate">
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                                            @can('user-edit')
                                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                                            @endcan
                                                            @can('user-delete')
                                                                @if ($user->name!=Auth::user()->hasRole($user->name))
                                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i> Delete</button>
                                                                @endif
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="3">
                                                    <span class="text-danger">
                                                        <strong>No User Found!</strong>
                                                    </span>
                                                </td>
                                            @endforelse
                                        </tbody>
                                    </table>{{-- Table End --}}
                                </div>
                            </div>
                        </section>{{-- Stripe END --}}
                    </div>{{-- Content END --}}
                </div>
            </div>
        </div>
@endsection
