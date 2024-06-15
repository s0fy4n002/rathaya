@extends('be.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Provinsi
                </div>
                <div class="float-end">
                    <a href="{{ route('provinces.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('be.layouts.flash-message')
                @can('master-create')
                    <a href="{{ route('provinces.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Province</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Upper</th>
                            <th scope="col">Short</th>
                            <th scope="col">PG</th>
                            <th scope="col" style="width: 250px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($provinces as $province)
                        <tr>
                            <th scope="row">{{ $province->id }}</th>
                            <td>{{ $province->name }}</td>
                            <td>{{ $province->nameupper }}</td>
                            <td>{{ $province->short }}</td>
                            <td>
                              @if($province->f_pg==1)
                                <label class="badge badge-success">Ya</label>
                              @endif
                            </td>
                            <td>
                                <form action="{{ route('provinces.destroy', $province->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    @can('master-edit')
                                        <a href="{{ route('provinces.edit', $province->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                                    @endcan

                                    @can('master-delete')
                                        {{-- @if ($permission->name!=Auth::user()->hasPermission($permission->name)) --}}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this province?');"><i class="bi bi-trash"></i> Delete</button>
                                        {{-- @endif --}}
                                    @endcan

                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="5">
                                <span class="text-danger">
                                    <strong>No Province Found!</strong>
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