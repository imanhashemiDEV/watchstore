<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "لیست محصولات";
        return view('admin.product.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "اضافه کردن محصول";
        $categories = Category::query()->pluck('title', 'id');
        $brands = Brand::query()->pluck('title', 'id');
        return view('admin.product.create', compact('title','categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = Product::saveImage($request->file);
        Product::query()->create([
            'title'=>$request->input('title'),
            'title_en'=>$request->input('title_en'),
            'slug'=> Helper::make_slug($request->input('title')),
            'price'=>$request->input('price'),
            'count'=>$request->input('count'),
            'image'=>$image,
            'guaranty'=>$request->input('guaranty'),
            'discount'=>$request->input('discount'),
            'description'=>$request->input('description'),
            'is_special'=>$request->input('is_special') === 'on',
            'special_expiration'=>($request->input('special_expiration') !==null  ? Verta::parse($request->input('special_expiration'))->datetime() : now()),
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
        ]);

        return redirect()->route('products.index')->with('message', 'محصول با موفقیت اضافه شد');
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
        $title = "لیست محصولات";
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
        //
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
