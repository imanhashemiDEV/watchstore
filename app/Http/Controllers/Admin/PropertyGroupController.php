<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "لیست گروه ویژگی ها";
        return  view('admin.property_group.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "ایجاد گروه ویژگی ها";
        return view('admin.property_group.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PropertyGroup::query()->create([
            'title'=>$request->input('title')
        ]);

        return  redirect()->route('property_groups.index')->with('message','گروه ویژگی ها با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property_group = PropertyGroup::query()->find($id);
        $title = "ویرایش گروه ویژگی ها";
        return view('admin.property_group.edit', compact('title','property_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property_group = PropertyGroup::query()->find($id);
        $property_group->update([
            'title'=>$request->input('title')
        ]);
        return  redirect()->route('property_groups.index')->with('message','گروه ویژگی ها با موفقیت ایجاد شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
