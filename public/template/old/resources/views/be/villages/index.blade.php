@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical","behaviour": "pinned", "layout":"fluid","radius": "rounded","color": "light-red","navcolor": "default" }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Village List';
    $description = 'Village List.';
    $breadcrumbs = ["/"=>"Home"]
@endphp
@extends('be._layout.layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/th/be/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
<script src="/th/be/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
<script src="/th/be/js/cs/datatable.extend.pg.js"></script> {{-- search print download length --}}
<script src="/th/be/js/plugins/datatable.serverside.villages.js"></script>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col">
                    {{-- Title and Top Buttons Start --}}
                    <div class="page-title-container">
                        <div class="row">
                            {{-- Title Start --}}
                            <div class="col-12 col-md-7">
                                <h1 class="mb-0 pb-0 display-4" id="title">Village List</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Village</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">List</a></li>
                                </ul>
                                </nav>
                            </div>
                            {{-- Title End --}}

                            {{-- Top Buttons Start --}}
                            <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                                {{-- Add New Button Start --}}
                                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable" onclick="window.location.href='{{ route('villages.create') }}';">
                                    <i data-acorn-icon="plus"></i>
                                    <span>Add New</span>
                                </button>
                                {{-- Add New Button End --}}
                            </div>
                            {{-- Top Buttons End --}}
                        </div>
                    </div>
                    {{-- Title and Top Buttons End --}}

                    {{-- Content Start --}}
                    <div class="data-table-rows slim">
                        @include('be._layout.flash-message')
                        {{-- Controls Start --}}
                        <div class="row">
                            {{-- Search Start --}}
                            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRowsServerSide" />
                                <span class="search-magnifier-icon">
                                    <i data-acorn-icon="search"></i>
                                </span>
                                <span class="search-delete-icon d-none">
                                    <i data-acorn-icon="close"></i>
                                </span>
                                </div>
                            </div>
                            {{-- Search End --}}

                            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">

                                <div class="d-inline-block">
                                    {{-- Print Button Start --}}
                                    <button
                                        class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print"
                                        data-bs-delay="0"
                                        data-datatable="#datatableRowsServerSide"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Print"
                                        type="button" >
                                        <i data-acorn-icon="print"></i>
                                    </button>
                                    {{-- Print Button End --}}

                                    {{-- Export Dropdown Start --}}
                                    <div class="d-inline-block datatable-export" data-datatable="#datatableRowsServerSide">
                                        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                            <span
                                                class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown"
                                                data-bs-delay="0"
                                                data-bs-placement="top"
                                                data-bs-toggle="tooltip"
                                                title="Export" >
                                                <i data-acorn-icon="download"></i>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end">
                                            <button class="dropdown-item export-copy" type="button">Copy</button>
                                            <button class="dropdown-item export-excel" type="button">Excel</button>
                                            <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                        </div>
                                    </div>
                                    {{-- Export Dropdown End --}}

                                    {{-- Length Start --}}
                                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRowsServerSide" data-childSelector="span">
                                        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                                            <span
                                                class="btn btn-foreground-alternate dropdown-toggle"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-delay="0"
                                                title="Item Count" >
                                                10 Items
                                            </span>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end">
                                            <a class="dropdown-item" href="#">5 Items</a>
                                            <a class="dropdown-item active" href="#">10 Items</a>
                                            <a class="dropdown-item" href="#">20 Items</a>
                                            <a class="dropdown-item" href="#">50 Items</a>
                                            <a class="dropdown-item" href="#">1000 Items</a>
                                            <!-- <a class="dropdown-item" href="#">10000 Items</a> -->
                                            <!-- <a class="dropdown-item" href="#">85000 Items</a> -->
                                        </div>
                                    </div>
                                    {{-- Length End --}}
                                </div>
                            </div>
                        </div>
                        {{-- Controls End --}}

                        {{-- Table Start --}}
                        <!-- <div class="data-table-responsive-wrapper"> -->
                        <div>
                            <!-- <table id="datatableRowsServerSide" class="data-table strip hover"> -->
                            <table
                                        class="data-table data-table-pagination data-table-standard responsive nowrap hover"
                                        id="datatableRowsServerSide">
                                <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase">ID</th>
                                        <th class="text-muted text-small text-uppercase">NAME</th>
                                        <th class="text-muted text-small text-uppercase">DISTRICT</th>
                                        <th class="text-muted text-small text-uppercase">REGENCY</th>
                                        <th class="text-muted text-small text-uppercase">PROVINCE</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 150px;">ACTION</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        {{-- Table End --}}
                    </div>
                    {{-- Content End --}}

                </div>
            </div>
        </div>
@endsection