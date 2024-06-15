@php
    $html_tag_data = [];
    $title = 'Permissions';
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
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Permission
                </div>
                <div class="float-end">
                    <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('be.layouts.flash-message')
                @can('permission-create')
                    <a href="{{ route('permissions.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Permission</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="width: 250px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            {{-- <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>--}}

                            @can('permission-edit')
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                            @endcan

                            @can('permission-delete')
                                {{-- @if ($permission->name!=Auth::user()->hasPermission($permission->name)) --}}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this permission?');"><i class="bi bi-trash"></i> Delete</button>
                                {{-- @endif --}}
                            @endcan

                        </form>
                    </td>
                        </tr>
                        @empty
                            <td colspan="3">
                                <span class="text-danger">
                                    <strong>No Permission Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection