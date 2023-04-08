<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/v1')->namespace('Api\V1')->group(function (){

    Route::post('send_sms',[\App\Http\Controllers\Api\V1\AuthApiController::class, 'sendSms']);
    Route::post('verify_sms_code',[\App\Http\Controllers\Api\V1\AuthApiController::class, 'verifySms']);

    Route::get('home', [\App\Http\Controllers\Api\v1\HomeApiController::class, 'home']);

    Route::get('most_sold_products', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'most_sold_product']);
    Route::get('most_viewed_products', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'most_viewed_products']);
    Route::get('newest_products', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'newest_products']);
    Route::get('cheapest_products', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'cheapest_product']);
    Route::get('most_expensive_products', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'most_expensive_products']);
    Route::get('products_by_category/{id}', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'productsByCategory']);
    Route::get('products_by_brand/{id}', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'productsByBrand']);
    Route::get('product_details/{id}', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'productDetail']);
    Route::post('search_product', [\App\Http\Controllers\Api\v1\ProductsApiController::class, 'searchProduct']);



});

Route::prefix('/v1')->namespace('Api\V1')->middleware('auth:sanctum')->group(function (){
    Route::post('register',[\App\Http\Controllers\Api\V1\UserApiController::class, 'register']);
    Route::post('save_product_comment',[\App\Http\Controllers\Api\V1\ProductsApiController::class, 'saveComment']);

    Route::post('payment',[\App\Http\Controllers\Api\V1\PaymentApiController::class, 'payment'])->name('payment');

});
