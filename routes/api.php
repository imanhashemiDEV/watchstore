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


});

Route::prefix('/v1')->namespace('Api\V1')->middleware('auth:sanctum')->group(function (){
    Route::post('register',[\App\Http\Controllers\Api\V1\UserApiController::class, 'register']);

});
