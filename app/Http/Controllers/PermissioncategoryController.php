<?php

namespace App\Http\Controllers;

use App\Permissioncategory;
use Illuminate\Http\Request;

class PermissioncategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissioncategories = Permissioncategory::latest()->get();
        return view('permissioncategories.index',compact('permissioncategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $permissioncategories = new Permissioncategory();
        $permissioncategories->name = $permissioncategories->name;
        $permissioncategories->save();
        return redirect()->route('permissioncategories.index')->with('success','Permissioncategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permissioncategory  $permissioncategory
     * @return \Illuminate\Http\Response
     */
    public function show(Permissioncategory $permissioncategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permissioncategory  $permissioncategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissioncategories = Permissioncategory::find($id);
        return view('permissioncategories.edit',compact('permissioncategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permissioncategory  $permissioncategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permissioncategory $permissioncategory)
    {
        $permissioncategories = Permissioncategory::findOrFail($request->tag_id);
        $permissioncategories->name = $request->name;
        $permissioncategories->save();
        return redirect()->route('permissioncategories.index') ->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permissioncategory  $permissioncategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $permissioncategories = Permissioncategory::findOrFail($request->tag_id);
        $permissioncategories->delete();
        return back()->with('success','Permission deleted successfully');
    }
}
