<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\services\Keys;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    /**
     * @OA\Get(
     ** path="/api/v1/most_sold_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function most_sold_product()
    {
        return response()->json([
            'result'=>true,
            'message'=>'application home page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::most_seller_products=>ProductRepository::getMostSellerProducts()->response()->getData(true),
            ]

        ],200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/most_viewed_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function most_viewed_products()
    {
        return response()->json([
            'result'=>true,
            'message'=>'application home page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::most_viewed_products=>ProductRepository::getMostViewedProducts()->response()->getData(true),
            ]

        ],200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/newest_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function newest_products()
    {
        return response()->json([
            'result'=>true,
            'message'=>'application home page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::newest_products=>ProductRepository::getNewestProducts()->response()->getData(true),
            ]

        ],200);
    }


    /**
     * @OA\Get(
     ** path="/api/v1/cheapest_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function cheapest_product()
    {
        return response()->json([
            'result'=>true,
            'message'=>'application home page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::cheapest_products=>ProductRepository::getCheapestProducts(),
            ]

        ],200);
    }


    /**
     * @OA\Get(
     ** path="/api/v1/most_expensive_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function most_expensive_products()
    {
        return response()->json([
            'result'=>true,
            'message'=>'application home page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),ies(),
                Keys::most_expensive_products=>ProductRepository::getMostExpensiveProducts()->response()->getData(true),
            ]

        ],200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/products_by_category/{id}",
     *  tags={"Products Page"},
     *  description="get products data by category id",
     * *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productsByCategory($id)
    {
        return response()->json([
            'result'=>true,
            'message'=>'application products page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::products_by_category=>ProductRepository::getProductsByCategory($id)->response()->getData(true),
            ]

        ],200);

    }

    /**
     * @OA\Get(
     ** path="/api/v1/products_by_brand/{id}",
     *  tags={"Products Page"},
     *  description="get products data by category id",
     * *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productsByBrand($id)
    {
        return response()->json([
            'result'=>true,
            'message'=>'application products page',
            'data'=>[
                Keys::brands=>Brand::getAllBrands(),
                Keys::products_by_brand=>ProductRepository::getProductsByBrand($id)->response()->getData(true),
            ]

        ],200);
    }

}
