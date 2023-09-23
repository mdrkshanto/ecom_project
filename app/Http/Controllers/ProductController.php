<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index',['products'=>Product::orderBy('name','asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories' => Category::orderBy('name','asc')->get(),
            'subcategories' => Subcategory::orderBy('name','asc')->get(),
            'brands' => Brand::orderBy('name','asc')->get(),
            'units' => Unit::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'       => 'required|exists:categories,id',
            'subcategory_id'    => 'nullable|exists:subcategories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'unit_id'           => 'required|exists:units,id',
            'name'              => 'required',
            'stock_amount'      => 'required|numeric',
            'reorder_label'     => 'required|numeric',
            'regular_price'     => 'nullable|numeric',
            'selling_price'     => 'required|numeric',
            'short_description' => 'nullable',
            'long_description'  => 'nullable',
            'image'             => 'required|image',
            'other_images[]'      => 'nullable|array|image',
        ],[
            'category_id.exists'        => "Category you selected doesn't exists." ,
            'subcategory_id.exists'     => "Subcategory you selected doesn't exists." ,
            'brand_id.exists'           => "Brand you selected doesn't exists." ,
            'unit_id.exists'            => "Unit you selected doesn't exists." ,
        ]);
        Product::newProduct($request);
        return redirect()->route('product.index')->with('message','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product'           => $product,
            'categories'        => Category::orderBy('name','asc')->get(),
            'subcategories'     => Subcategory::orderBy('name','asc')->get(),
            'brands'            => Brand::orderBy('name','asc')->get(),
            'units'             => Unit::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id'       => 'required|exists:categories,id',
            'subcategory_id'    => 'nullable|exists:subcategories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'unit_id'           => 'required|exists:units,id',
            'name'              => 'required',
            'stock_amount'      => 'required|numeric',
            'reorder_label'     => 'required|numeric',
            'regular_price'     => 'nullable|numeric',
            'selling_price'     => 'required|numeric',
            'short_description' => 'nullable',
            'long_description'  => 'nullable',
            'image'             => 'nullable|image',
            'other_images[]'      => 'nullable|array|image',
            'featured_status'      => 'required|in:0,1',
            'carousel_status'      => 'required|in:0,1',
            'status'      => 'required|in:0,1',
        ],[
            'category_id.exists'        => "Category you selected doesn't exists." ,
            'subcategory_id.exists'     => "Subcategory you selected doesn't exists." ,
            'brand_id.exists'           => "Brand you selected doesn't exists." ,
            'unit_id.exists'            => "Unit you selected doesn't exists." ,
            'featured_status.in'            => 'Featured status can only "Featured" or "Non Featured".' ,
            'carousel_status.in'            => 'Carousel status can only "Active" or "Inactive".' ,
            'status.in'            => 'Published status can only "Published" or "Unpublished".' ,
        ]);

        Product::updateProduct($request,$id);
        return redirect()->route('product.index')->with('message','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::deleteProduct($id);
        return back()->with('message','Product deleted successfully.');
    }

    public function getSubcategoryByCategory()
    {
        return response()->json(Subcategory::where('category_id',$_GET['id'])->get());
    }
}
