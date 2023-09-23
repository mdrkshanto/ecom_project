@extends('admin.master.index')
@section('title')
    Category
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Edit Category Form</h3>
            <a href="{{route('category.index')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Manage</a>
        </div>
        <div class="card-body">
            @if(session('message'))
                <p class="text-center text-success">{{session('message')}}</p>
            @endif
            <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="container">
                    <div class="row my-3">
                        <label class="form-label col-md-4">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control shadow-none" name="name" required placeholder="Category Name" value="{{$category->name}}" autofocus>
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Category Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control shadow-none" placeholder="Category Description">{{$category->description}}</textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Category Image</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control shadow-none" accept="image/*"
                                   name="image">
                            @if($category->image)
                                <img src="{{asset($category->image)}}" alt="{{$category->slug}}" width="80" height="50" />
                            @endif
                            @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>





                    <div class="row my-3">
                        <div class="col-md-6">
                            <label class="form-label">Category Status</label>
                            <div class="row my-3 my-md-0">
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio"
                                           id="statusActive" name="status" value="1" @checked($category->status
                                    == 1)>
                                    <label class="form-check-label" for="statusActive">Active</label>
                                </div>

                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio"
                                           id="statusInactive" name="status" value="0" @checked($category->status
                                    == 0)>
                                    <label class="form-check-label" for="statusInactive">Inactive</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Featured Status</label>
                            <div class="row my-3 my-md-0">
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio"
                                           id="featuredStatusActive" name="featured_status" value="1"
                                           @checked($category->featured_status == 1)>
                                    <label class="form-check-label"
                                           for="featuredStatusActive">Active</label>
                                </div>

                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio"
                                           id="featuredStatusInactive" name="featured_status" value="0"
                                           @checked($category->featured_status == 0)>
                                    <label class="form-check-label"
                                           for="featuredStatusInactive">Inactive</label>
                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="row my-3">
                        <div class="col-md-4"></div>
                        <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Update
                            category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
