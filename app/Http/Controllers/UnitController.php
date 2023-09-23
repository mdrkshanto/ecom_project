<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit.index', [
            'units' => Unit::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:units,name',
            'description'   => 'nullable'
        ]);
        Unit::newUnit($request);
        return back()->with('message', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return view('admin.unit.show',['unit'=>$unit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.unit.edit',['unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required|unique:units,name,' . $id,
            'description'   => 'nullable',
            'status' => 'required|in:0,1',
        ],[
            'status.in' => 'Status can only "Active" or "Inactive".'
        ]);

        Unit::updateUnit($request, $id);
        return redirect()->route('unit.index')->with('message', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Unit::deleteUnit($id);
        return back()->with('message', 'Unit deleted successfully.');
    }
}
