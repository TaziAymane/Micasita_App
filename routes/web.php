<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Route::get('/Auth',[AuthController::class,'loginfORM'])->name('loginfORM') ;
Route::post('/login',[AuthController::class,'login'])->name('login') ;
Route::post('/register',[AuthController::class,'store'])->name('register') ;
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/' ,[PagesController::class,'HomePage'])->name('homePage');
Route::get('/product_categorie/{categorie}',[PagesController::class,'ProductPage'])->name('ProductPage');
// Cart route *
Route::any('/add-cart',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/product-cart',[CartController::class,'cart'])->name('product.cart');
Route::get('/cart-delete/{id}',[CartController::class,'destroy'])->name('cart-delete');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('place.order');


// Admin
Route::get('/AdminDashboard',[AdminController::class,'index'])->name('admin.dashboard');

//Menu 
Route::get('/menu',[MenuController::class,'index'])->name('menu.index');
Route::get('/menu/show/{id}',[MenuController::class,'show'])->name('menu.show');
Route::get('menu/create',[MenuController::class,'create'])->name('menu.create') ;
Route::post('menu/store',[MenuController::class,'store'])->name('menu.store');
Route::get('/menu/edit/{id}',[MenuController::class,'edit'])->name('menu.edit');
Route::put('/menu/update/{id}',[MenuController::class,'update'])->name('menu.update');
Route::delete('/menu/destroy/{id}',[MenuController::class,'destroy'])->name('menu.destroy');

//Product
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');


//User 
Route::get('/settings',[UserController::class,'settings'])->name('settings');
Route::get('/users',[UserController::class,'index'])->name('user.index');
Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::put('/user/update/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('/user/destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');


// search 
// Route for handling the form submission
Route::get('/search', [MenuController::class, 'handleSearch'])->name('search_handler');

// Route to show menu by category
Route::get('/product_categorie/{category}', [MenuController::class, 'showByCategory'])->name('product_categorie');
