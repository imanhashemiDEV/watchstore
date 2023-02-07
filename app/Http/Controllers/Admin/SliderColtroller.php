<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderColtroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "لیست اسلایدر ها";
        return  view('admin.slider.list',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "ایجاد اسلایدر ";
        return view('admin.slider.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $image = Slider::saveImage($request->file);
        Slider::query()->create([
            'title'=>$request->input('title'),
            'url'=>$request->input('url'),
            'image'=> $image
        ]);

        return redirect()->route('sliders.index')->with('message', 'اسلایدر با موفقیت ایجاد شد');
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
        $slider = Slider::query()->find($id);
        $title = "ویرایش اسلایدر ";
        return view('admin.slider.edit', compact('title','slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $image = Slider::saveImage($request->file);
        Slider::query()->find($id)->update([
            'title'=>$request->input('title'),
            'url'=>$request->input('url'),
            'image'=> $image
        ]);

        return redirect()->route('sliders.index')->with('message', 'اسلایدر با موفقیت ویرایش شد');
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
