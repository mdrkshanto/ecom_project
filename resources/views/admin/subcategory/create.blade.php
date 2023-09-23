@extends('admin.master.index')
@section('title')
    Subcategory
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Add Subcategory Form</h3>
            <a href="{{route('subcategory.index')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Manage</a>
        </div>
        <div class="card-body">
            @if(session('message'))
                <p class="text-center text-success">{{session('message')}}</p>
            @endif
            <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row my-3">
                        <label class="form-label col-md-4">Select Category</label>
                        <div class="col-md-8">
                            <select name="category_id" class="form-select shadow-none">
                                <option disabled selected>-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="text-danger">{{$errors->first('category_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="form-label col-md-4">Subcategory Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control shadow-none" name="name" required placeholder="Subcategory Name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Subcategory Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control shadow-none" placeholder="Subcategory Description"></textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Subcategory Image</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control shadow-none" accept="image/*"
                                   name="image">
                            @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-4"></div>
                        <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Create new
                            subcategory
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
