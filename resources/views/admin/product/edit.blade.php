@extends('admin.master.index')
@section('title')
    Product
@endsection
@section('body')
    <div class="card overflow-hidden">
        <div class="card-header justify-content-between">
            <h3 class="card-title col-md-auto">Edit Product Form</h3>
            <a href="{{route('product.index')}}" class="btn btn-sm shadow-none btn-primary col-md-auto">Manage</a>
        </div>
        <div class="card-body">
            @if(session('message'))
                <p class="text-center text-success">{{session('message')}}</p>
            @endif
            <form action="{{route('product.update', $product->id)}}" method="POST"
                  enctype="multipart/form-data" class="">
                @csrf @method('PUT')
                <div class="container">
                    <div class="row my-3">
                        <label class="form-label col-md-4">Select Category</label>
                        <div class="col-md-8">
                            <select name="category_id" class="form-select shadow-none" onchange="getSubcategoryByCategory(this.value)">
                                <option disabled>-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected($category->id ==
                                        $product->category_id)>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="text-danger">{{$errors->first('category_id')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Select Subcategory</label>
                        <div class="col-md-8">
                            <select name="subcategory_id" class="form-select shadow-none" id="subCategoryId">
                                <option value>-- Select Subcategory --</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" @selected($subcategory->id ==
                                        $product->subcategory_id)>{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subcategory_id'))
                                <span class="text-danger">{{$errors->first('subcategory_id')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Select Brand</label>
                        <div class="col-md-8">
                            <select name="brand_id" class="form-select shadow-none">
                                <option value>-- Select Brand --</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @selected($brand->id ==
                                        $product->brand_id)>{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand_id'))
                                <span class="text-danger">{{$errors->first('brand_id')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Select Unit</label>
                        <div class="col-md-8">
                            <select name="unit_id" class="form-select shadow-none">
                                <option disabled value>-- Select Unit --</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}" @selected($unit->id ==
                                        $product->unit_id)>{{$unit->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('unit_id'))
                                <span class="text-danger">{{$errors->first('unit_id')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Product Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control shadow-none" name="name" required
                                   value="{{$product->name}}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Stock Amount</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control shadow-none" name="stock_amount"
                                   required value="{{$product->stock_amount}}">
                            @if($errors->has('stock_amount'))
                                <span class="text-danger">{{$errors->first('stock_amount')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Reorder Label</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control shadow-none" name="reorder_label"
                                   required value="{{$product->reorder_label}}">
                            @if($errors->has('reorder_label'))
                                <span class="text-danger">{{$errors->first('reorder_label')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Product Regular Price</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control shadow-none" name="regular_price"
                                   value="{{$product->regular_price}}">
                            @if($errors->has('regular_price'))
                                <span class="text-danger">{{$errors->first('regular_price')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Product Selling Price</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control shadow-none" name="selling_price"
                                   required value="{{$product->selling_price}}">
                            @if($errors->has('selling_price'))
                                <span class="text-danger">{{$errors->first('selling_price')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Product Short Description</label>
                        <div class="col-md-8">
                                        <textarea name="short_description"
                                                  class="form-control shadow-none summernote">{!! $product->short_description !!}</textarea>
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{$errors->first('short_description')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Product Long Description</label>
                        <div class="col-md-8">
                                        <textarea name="long_description" class="form-control shadow-none summernote">{!! $product->long_description !!}</textarea>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{$errors->first('long_description')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Product Image</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control shadow-none" accept="image/*"
                                   name="image">
                            @if($product->image)
                                <br/>
                                <img src="{{asset($product->image)}}" alt="{{$product->name}}" class=""
                                     width="80" height="50">
                            @endif
                            @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <label class="form-label col-md-4">Other Images</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control shadow-none" accept="image/*"
                                   name="other_images[]" multiple>
                            @foreach($product->otherImages as $otherImage)
                                @if($otherImage->image)
                                    <img src="{{asset($otherImage->image)}}" alt="{{$product->name}}"
                                         class="" width="80" height="50">
                                @endif
                            @endforeach
                            @if($errors->has('other_images'))
                                <span class="text-danger">{{$errors->first('other_images')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="form-label">Published Status</label>
                            <div class="row">
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio" name="status"
                                           id="published" value="1" @checked($product->status == 1)>
                                    <label class="form-check-label" for="published">Published</label>
                                </div>
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio" name="status"
                                           id="unpublished" value="0" @checked($product->status == 0)>
                                    <label class="form-check-label" for="unpublished">Unpublished</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Featured Status</label>
                            <div class="row">
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio" name="featured_status"
                                           id="featured" value="1" @checked($product->featured_status == 1)>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio" name="featured_status"
                                           id="non_featured" value="0" @checked($product->featured_status == 0)>
                                    <label class="form-check-label" for="non_featured">Non Featured</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Carousel Status</label>
                            <div class="row">
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio" name="carousel_status"
                                           id="carouselActive" value="1" @checked($product->carousel_status == 1)>
                                    <label class="form-check-label" for="carouselActive">Active</label>
                                </div>
                                <div class="form-check col-md-auto">
                                    <input class="form-check-input shadow-none" type="radio" name="carousel_status"
                                           id="carouselInactive" value="0" @checked($product->carousel_status == 0)>
                                    <label class="form-check-label" for="carouselInactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-4"></div>
                            <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Update product
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
