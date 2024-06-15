@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Dashboards';
    $description = 'Dashboard pages contains different layouts to provide stats, graphics, listings, categories, banners and so on. They have various implementations of plugins such as Datatables, Chart.js, Glide.js and Plyr.js with alternative extensions.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
        <div class="container">
            <div class="page-title-container">{{-- Area Title and Top Buttons START title and breadcumb --}}
                <div class="row">
                    <div class="col-12 col-sm-6 mb-5">{{-- Title Start --}}
                        <h1 class="mb-0 pb-0 display-4" id="title">Dashboard</h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="Dashboards.html">Dashboards</a></li>
                            </ul>
                        </nav>
                    </div>{{-- Title End --}}
                    {{-- Top Buttons Start --}}
                    {{-- Top Buttons End --}}
                </div>
            </div>{{-- Area Title and Top Buttons END title and breadcumb --}}

            <div class="card mb-5">
                <div class="card-body">
                    <p class="mb-0">
                        Welcome back <strong>{{ Auth::user()->name }}</strong>, you're logged as
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    {{-- <label class="badge badge-success">{{ $v }}</label> --}}
                                    <span class="badge bg-primary text-uppercase">{{ $v }}</span>
                                @endforeach
                            @endif
                        . Your last login at {{ Auth::user()->last_login_at }} with IP {{ Auth::user()->last_login_ip }}.
                    </p>
                </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 col-12">
                    <div class="card mb-5">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                            <div class="d-flex rounded-xl bg-gradient-light sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <i data-acorn-icon="office" class="text-white"></i>
                            </div>
                            <p class="card-text mb-2 d-flex">Person In Charge</p>
                            <p class="h4 text-center mb-0 d-flex text-primary">{{ $pics }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 col-12">
                    <div class="card mb-5">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                            <div class="d-flex rounded-xl bg-gradient-light sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <i data-acorn-icon="building-large" class="text-white"></i>
                            </div>
                            <p class="card-text mb-2 d-flex">Businesses</p>
                            <p class="h4 text-center mb-0 d-flex text-primary">{{ $firms }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 col-12">
                    <div class="card mb-5">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                            <div class="d-flex rounded-xl bg-gradient-light sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <i data-acorn-icon="list" class="text-white"></i>
                            </div>
                            <p class="card-text mb-2 d-flex">Products</p>
                            <p class="h4 text-center mb-0 d-flex text-primary">{{ $products }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 col-12">
                    <div class="card mb-5">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                            <div class="d-flex rounded-xl bg-gradient-light sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <i data-acorn-icon="badge" class="text-white"></i>
                            </div>
                            <p class="card-text mb-2 d-flex">Enablers</p>
                            <p class="h4 text-center mb-0 d-flex text-primary">{{ $enablers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 col-12">
                    <div class="card mb-5">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                            <div class="d-flex rounded-xl bg-gradient-light sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <i data-acorn-icon="sync-horizontal" class="text-white"></i>
                            </div>
                            <p class="card-text mb-2 d-flex">Partners</p>
                            <p class="h4 text-center mb-0 d-flex text-primary">{{ $partners }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 col-12">
                    <div class="card mb-5">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                            <div class="d-flex rounded-xl bg-gradient-light sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <i data-acorn-icon="user" class="text-white"></i>
                            </div>
                            <p class="card-text mb-2 d-flex">Users</p>
                            <p class="h4 text-center mb-0 d-flex text-primary">{{ $users }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-12 col-xl-6">
                    Mulai isi...
                </div>
            </div> --}}
        </div>
@endsection

