<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index',['brands'=>Brand::orderBy('name','asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:brands,name',
            'description'   => 'nullable',
            'image'         => 'nullable|image'
        ]);
        Brand::newBrand($request);
        return back()->with('message', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required|unique:brands,name,' . $id,
            'description'   => 'nullable',
            'image'         => 'nullable|image',
            'featured_status' => 'required|in:0,1',
            'status' => 'required|in:0,1',
        ],[
            'status.in' => 'Status can only "Active" or "Inactive".',
            'featured_status.in' => 'Featured status can only "Active" or "Inactive".'
        ]);
        Brand::updateBrand($request, $id);
        return redirect()->route('brand.index')->with('message', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message', 'Category deleted successfully.');
    }
}
