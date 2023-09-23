<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index',['categories'=>Category::orderBy('name','asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:categories,name',
            'description'   => 'nullable',
            'image'         => 'nullable|image'
        ]);
        Category::newCategory($request);
        return back()->with('message', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required|unique:categories,name,' . $id,
            'description'   => 'nullable',
            'image'         => 'nullable|image',
            'featured_status' => 'required|in:0,1',
            'status' => 'required|in:0,1',
        ],[
            'status.in' => 'Status can only "Active" or "Inactive".',
            'featured_status.in' => 'Featured status can only "Active" or "Inactive".'
        ]);

        Category::updateCategory($request, $id);
        return redirect()->route('category.index')->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::deleteCategory($id);
        return back()->with('message', 'Category deleted successfully.');
    }
}
