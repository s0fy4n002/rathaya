@extends('be.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Province
                </div>
                <div class="float-end">
                    <a href="{{ route('provinces.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('provinces.update', $province->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="id" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ $province->id }}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $province->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nameupper" class="col-md-4 col-form-label text-md-end text-start">Name Upper</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nameupper') is-invalid @enderror" id="nameupper" name="nameupper" value="{{ $province->nameupper }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="short" class="col-md-4 col-form-label text-md-end text-start">Short</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('short') is-invalid @enderror" id="short" name="short" value="{{ $province->short }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="f_pg" class="col-md-4 col-form-label text-md-end text-start">PG</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('f_pg') is-invalid @enderror" id="f_pg" name="f_pg" value="{{ $province->f_pg }}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Province">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection