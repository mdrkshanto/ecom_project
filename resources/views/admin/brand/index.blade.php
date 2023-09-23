@extends('admin.master.index')
@section('title')
    Brand
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Categories Info</h3>
            <a href="{{route('brand.create')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Add new</a>
        </div>
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show small text-center p-1" role="alert" data-bs-dismiss="alert">
                    <span class="alert-inner--text">{{session('message')}}</span>
                </div>
            @endif
            <table class="table table-sm table-hover table-striped align-middle text-center table-success" id="basic-datatable">
                <thead>
                <tr class="bg-success">
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Featured Status</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->slug}}</td>
                    <td>
                        @if($brand->image)
                            <img src="{{asset($brand->image)}}" alt="{{$brand->slug}}" height="30" width="80" />
                        @endif
                    </td>
                    <td>{{$brand->featured_status == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>{{$brand->status == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>
                        <form action="{{route('brand.destroy',$brand->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('brand.edit',$brand->slug)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{route('brand.show',$brand->slug)}}" class="btn btn-info"><i class="fa fa-book"></i></a>
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
