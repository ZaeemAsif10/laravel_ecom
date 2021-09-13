<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RegisteredController;

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Frontend\UserController;

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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Auth::routes();


// isUser middleware routes
Route::group(['middleware' => ['auth','isUser']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Profile Page Routes
    Route::get('/my-profile', [UserController::class, 'myprofile']);
    Route::post('/my-profile-update', [UserController::class, 'profileupdate']);

});


//admin Middleware routes
Route::group(['middleware' => ['auth','isAdmin']], function() {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    //registe user routes..
    Route::get('registered-user', [RegisteredController::class, 'index']);
    Route::get('role-edit/{id}', [RegisteredController::class, 'edit']);
    Route::put('role-update/{id}', [RegisteredController::class, 'updaterole']);


    //Groups Routes
    Route::get('group', [GroupController::class, 'index']);
    Route::get('group-add', [GroupController::class, 'viewpage']);
    Route::post('group-store',[GroupController::class, 'store']);
    Route::get('group-edit/{id}', [GroupController::class, 'edit']);
    Route::put('group-update/{id}', [GroupController::class, 'update']);
    Route::get('group-delete/{id}', [GroupController::class, 'delete']);
    Route::get('group-deleted-records', [GroupController::class, 'deletedrecords']);
    Route::get('group-re-store/{id}', [GroupController::class, 'deletedrestore']);

    //Category Routes
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'create']);
    Route::post('/category-store', [CategoryController::class, 'store']);
    Route::get('category/{id}', [CategoryController::class, 'edit']);
    Route::put('category-update/{id}', [CategoryController::class, 'update']);
    Route::get('category-delete/{id}', [CategoryController::class, 'delete']);
    Route::get('category-deleted-records', [CategoryController::class, 'deletedrecord']);
    Route::get('category-re-store/{id}', [CategoryController::class, 'restorecategoryrecord']);

    //Sub Category Routes
    Route::get('sub-category', [SubcategoryController::class, 'index']);
    Route::post('sub-category-store', [SubcategoryController::class, 'store']);
    Route::get('subcategory-edit/{id}', [SubcategoryController::class, 'edit']);
    Route::put('sub-category-update/{id}', [SubcategoryController::class, 'update']);
    Route::get('subcategory-delete/{id}', [SubcategoryController::class, 'delete']);

    //Product Routes..
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'create']);
    Route::post('store-products', [ProductController::class, 'store']);

});




// is Vendor Middleware Routes
Route::group(['middleware' => ['auth','isVendor']], function() {

    Route::get('/vendor-dashboard', function () {
        return view('vendor.dashboard');
    });

});