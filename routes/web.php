<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->group(function () {
    ///------ Main Route  -----------///
    Route::get('/', [\App\Http\Controllers\Admin\PanelController::class,'index'])->name('panel');

    ///------ User  -----------///
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::get('create_user_roles/{id}', [\App\Http\Controllers\Admin\UserController::class,'createUserRoles'])->name('create.user.roles');
    Route::post('store_user_roles/{id}', [\App\Http\Controllers\Admin\UserController::class,'storeUserRoles'])->name('store.user.roles');
    Route::get('logs', [\App\Http\Controllers\Admin\LogViewerController::class,'index'])->name('logs');

    ///------ Products -----------///
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderColtroller::class);
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('colors', \App\Http\Controllers\Admin\ColorController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    Route::get('create_product_gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'addGallery'])->name('create.product.galley');
    Route::post('store_product_gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'storeGallery'])->name('store.product.galley');


});
