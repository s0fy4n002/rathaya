@php
    $html_tag_data = [];
    $title = 'Provinces';
    $description = 'Dashboard pages contains different layouts to provide stats, graphics, listings, categories, banners and so on. They have various implementations of plugins such as Datatables, Chart.js, Glide.js and Plyr.js with alternative extensions.';
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
                    <!-- Title and Top Buttons Start -->
                    <div class="page-title-container">
                        <div class="row">
                            <!-- Title Start -->
                            <div class="col-12 col-md-7">
                                <h1 class="mb-0 pb-0 display-4" id="title">Province Lists</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                <ul class="breadcrumb pt-0">
                                    <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
                                    <li class="breadcrumb-item"><a href="Interface.Plugins.html">Plugins</a></li>
                                    <li class="breadcrumb-item"><a href="Interface.Plugins.Datatables.html">Datatables</a></li>
                                </ul>
                                </nav>
                            </div>
                            <!-- Title End -->

                            <!-- Top Buttons Start -->
                            <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                                <!-- Add New Button Start -->
                                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                                <i data-acorn-icon="plus"></i>
                                <span>Add New</span>
                                </button>
                                <!-- Add New Button End -->
                            </div>
                            <!-- Top Buttons End -->
                        </div>
                    </div>
                    <!-- Title and Top Buttons End -->

                    <div>{{-- Content Start --}}
                        <div class="card mb-5">
                            <div class="card-body">
                                <p class="mb-0">Daftar ijin yang terdaftar di aplikasi ini.</p>
                            </div>
                        </div>

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
                                                        data-bs-offset="0,3"
                                                    >
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
                                                <th class="text-muted text-small text-uppercase">Upper</th>
                                                <th class="text-muted text-small text-uppercase">Short</th>
                                                <th class="text-muted text-small text-uppercase">PG</th>
                                                <th class="text-muted text-small text-uppercase" style="width:10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($provinces as $province)
                                                <tr>
                                                    <td>{{ $province->id }}</td>
                                                    <td class="text-alternate">{{ $province->name }}</td>
                                                    <td class="text-alternate">{{ $province->nameupper }}</td>
                                                    <td class="text-alternate">{{ $province->short }}</td>
                                                    <td class="text-alternate">
                                                        @if($province->f_pg==1)
                                                            <span class="badge bg-success text-uppercase">Yes</span>
                                                        @endif</td>
                                                    <td class="text-alternate">
                                                        <form action="{{ route('provinces.destroy', $province->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{-- <a href="{{ route('provinces.show', $province->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>--}}
                                                            @can('province-edit')
                                                                <a href="{{ route('provinces.edit', $province->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                                            @endcan
                                                            @can('province-delete')
                                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this province?');"><i class="bi bi-trash"></i> Delete</button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="3">
                                                    <span class="text-danger">
                                                        <strong>No Province Found!</strong>
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