<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
# Create Admin
Route::get('/create-admin',[AdminController::class,'createAdmin']);

# Auth
Route::get('/',[AdminController::class,'loginForm'])->name('loginView');
Route::post('/login',[AdminController::class,'login'])->name('login');

# Index
Route::get('/index',[AdminController::class,'index'])->name('index');

# Categories
Route::resource('categories',CategoryController::class);
Route::resource('subcategories',SubcategoryController::class);
Route::resource('product', ProductController::class);

# Search
Route::get('/getProducts', [ProductController::class, 'getProducts'])->name('getproducts');
Route::post('/search-post-by-name',[ProductController::class,'searchPostByName'])->name('searchPostByName');