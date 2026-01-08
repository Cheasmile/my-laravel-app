<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Subcategory;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(CategoryController::class)->group(function(){

Route::prefix('category')->controller(App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('index', 'index')->name('category.index');
    Route::post('store', 'store')->name('category.store'); 
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

});

});

Route::controller(SubcategoryController::class)->group(function(){
Route::prefix('subcategory')->group (function(){
Route::get('index','index')->name('subcategory.index');
Route::post('store','store')->name('subcategory.store');
Route::get('create', 'create')->name('subcategory.create');
Route::get('edit/{id}', [SubcategoryController::class,'edit'])->name('subcategory.edit');
Route::post('subcategory/update/{id}', [SubcategoryController::class,'update'])->name('subcategory.update');
Route::get('subcategory/delete/{id}', [SubcategoryController::class,'delete'])->name('subcategory.delete');
    });
});

Route::controller(PostController::class)->group(function(){
Route::prefix('post')->group (function(){
Route::get('index','index')->name('post.index');
Route::post('store','store')->name('post.store');
Route::get('create', 'create')->name('post.create');
Route::get('edit/{id}', [PostController::class,'edit'])->name('post.edit');
Route::post('post/update/{id}', [PostController::class,'update'])->name('post.update');
Route::get('post/delete/{id}', [PostController::class,'delete'])->name('post.delete');
    });
});
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

Route::get('/subcategories/by-category/{id}', function ($id) {
    return \App\Models\Subcategory::where('category_id', $id)->get();
});
