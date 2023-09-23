@extends('admin.master.index')
@section('title')
    Subcategory
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Categories Info</h3>
            <a href="{{route('subcategory.create')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Add new</a>
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
                @foreach($subcategories as $subcategory)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$subcategory->name}}</td>
                    <td>{{$subcategory->slug}}</td>
                    <td>
                        @if($subcategory->image)
                            <img src="{{asset($subcategory->image)}}" alt="{{$subcategory->slug}}" height="30" width="80" />
                        @endif
                    </td>
                    <td>{{$subcategory->featured_status == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>{{$subcategory->status == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>
                        <form action="{{route('subcategory.destroy',$subcategory->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('subcategory.edit',$subcategory->slug)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{route('subcategory.show',$subcategory->slug)}}" class="btn btn-info"><i class="fa fa-book"></i></a>
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
