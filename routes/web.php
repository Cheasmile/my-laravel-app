<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookingController;


Route::get('/', [BookingController::class, 'welcome'])->name('welcome');


Route::post('/book', [BookingController::class, 'store'])->name('book.store');

// Admin: list all bookings
Route::get('/admin/bookings', [BookingController::class, 'index'])->name('booking.index');
Route::get('/admin/bookings/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::post('/admin/bookings/{id}', [BookingController::class, 'update'])
    ->name('booking.update');

Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');


Route::get('/', function () { return view('welcome'); });


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('index', 'index')->name('category.index');
    Route::post('store', 'store')->name('category.store');
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::post('update/{id}', 'update')->name('category.update');
    Route::get('delete/{id}', 'delete')->name('category.delete');
    Route::get('subcategories/{id}', 'getSubcategories')->name('category.getSubcategories'); 
});

Route::prefix('subcategory')->controller(SubcategoryController::class)->group(function () {
    Route::get('index', 'index')->name('subcategory.index');
    Route::get('create', 'create')->name('subcategory.create');
    Route::post('store', 'store')->name('subcategory.store');
    Route::get('edit/{id}', 'edit')->name('subcategory.edit');
    Route::post('update/{id}', 'update')->name('subcategory.update');
    Route::get('delete/{id}', 'delete')->name('subcategory.delete');
});

Route::prefix('post')->controller(PostController::class)->group(function () {
    Route::get('index', 'index')->name('post.index');
    Route::get('create', 'create')->name('post.create');
    Route::post('store', 'store')->name('post.store');
    Route::get('edit/{id}', 'edit')->name('post.edit');
    Route::post('update/{id}', 'update')->name('post.update');
    Route::get('delete/{id}', 'delete')->name('post.delete');
 
});



Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->name('category.show');

Route::get('/subcategory/{id}', [SubcategoryController::class, 'show'])
    ->name('subcategory.show');



Route::get(
    '/posts/subcategory/{id}',
    [PostController::class, 'bySubcategory']
)->name('posts.bySubcategory');

Route::get('/about', function () {
    return view('about'); // resources/views/about.blade.php
});

Route::get('/contact', function () {
    return view('contact'); // resources/views/contact.blade.php
});

Route::get('/service', function () {
    return view('service'); // resources/views/service.blade.php
});