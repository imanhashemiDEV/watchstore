<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\SliderRequest;
use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "لیست برندها";
        return  view('admin.brand.list',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "ایجاد برند ";
        return view('admin.brand.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $image = Brand::saveImage($request->image);
        Brand::query()->create([
            'title'=>$request->input('title'),
            'image'=> $image
        ]);

        return redirect()->route('brands.index')->with('message', 'برند با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand= Brand::query()->find($id);
        $title = "ویرایش برند ";
        return view('admin.brand.edit', compact('title','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $image = Brand::saveImage($request->file);
        Brand::query()->find($id)->update([
            'title'=>$request->input('title'),
            'image'=> $image
        ]);

        return redirect()->route('brands.index')->with('message', 'برند با موفقیت ویرایش شد');
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
