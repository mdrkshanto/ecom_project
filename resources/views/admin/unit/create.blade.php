@extends('admin.master.index')
@section('title')
    Unit
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Add Unit Form</h3>
            <a href="{{route('unit.index')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Manage</a>
        </div>
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show small text-center p-1" role="alert" data-bs-dismiss="alert">
                    <span class="alert-inner--text">{{session('message')}}</span>
                </div>
            @endif
            <form action="{{route('unit.store')}}" method="POST">
                @csrf
                <div class="container">
                    <div class="row my-3">
                        <label class="form-label col-md-4">Unit Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control shadow-none" name="name" required placeholder="Unit Name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Unit Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control shadow-none" placeholder="Unit Description"></textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-4"></div>
                        <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Create new
                            unit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
