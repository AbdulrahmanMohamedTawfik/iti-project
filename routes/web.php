<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\CartItem;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
// Route::view('/login','login')->name('login');
// Route::view('/reg','reg')->name('register');
Route::view('/user/show_login', 'user.login')->name('user.show_login');
Route::view('/user/show_reg', 'user.reg')->name('user.show_reg');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login'); //->middleware('auth');
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.profile');
// Route::resource('/user',UserController::class);

Route::get('/user_products/search/{uid}', [ProductController::class, 'product_search'])->name('user_products.search');


Route::get('/products', [ProductController::class, 'index'])->name('product.index');

// Route::get('/user_products/{pid,uid}',[ProductController::class,'user_products'])->name('product.user_product');

Route::get('/user_products/{uid}', [ProductController::class, 'user_products'])->name('product.user_product');

// Route::get('/products/user_products/{id}','product.user_products')->name('product.user_products');
// Route::get('/products/user_products',[ProductController::class,'user_products'])->name('product.user_products');//new

Route::view('/products/create', 'product.create')->name('product.create');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::put('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/user_category_products/{category}/{uid}', [CategoryController::class, 'user_show_products'])->name('category.user_show_products');
Route::resource('/category', CategoryController::class);
Route::get('/user_categories/{uid}', [CategoryController::class, 'user_categories'])->name('category.user_category');

Route::view('/orders/create', 'orders.create')->name('orders.create');

// Route::resource('/cart', CartController::class);
Route::post('/cart/add/{productId}/{uid}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/{uid}', [CartController::class, 'index'])->name('cart.index');
