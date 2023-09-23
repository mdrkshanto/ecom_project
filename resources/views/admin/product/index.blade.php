@extends('admin.master.index')
@section('title')
    Product
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Products Info</h3>
            <a href="{{route('product.create')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Add new</a>
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
                    <th class="align-middle">#</th>
                    <th class="align-middle">Code</th>
                    <th class="align-middle">Name</th>
                    <th class="align-middle">Image</th>
                    <th class="align-middle">Stock Amount</th>
                    <th class="align-middle">Featured Status</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="align-middle">{{$loop->iteration}}</td>
                        <td class="align-middle">{{$product->code}}</td>
                        <td class="align-middle">{{$product->name}}</td>
                        <td class="align-middle">
                            @if($product->image)
                                <img src="{{asset($product->image)}}" alt="" class="" width="80"
                                     height="50">
                        @endif
                        <td class="align-middle">{{$product->stock_amount}}</td>
                        </td>
                        <td class="align-middle">{{$product->featured_status == 1 ? 'Active' : 'Inactive'}}</td>
                        <td class="align-middle">{{$product->status == 1 ? 'Active' : 'Inactive'}}</td>
                        <td class="align-middle">
                            <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="{{route('product.edit',$product->slug)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{route('product.show',$product->slug)}}" class="btn btn-info"><i class="fa fa-book"></i></a>
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
