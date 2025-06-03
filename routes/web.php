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

Route::get('/' ,[PagesController::class,'HomePage'])->name('homePage')->middleware('auth');
Route::get('/product_categorie/{categorie}',[PagesController::class,'ProductPage'])->name('ProductPage')->middleware('auth');
// Cart route *

Route::get('/add-to-cart/{id}',[CartController::class,'addToCart'])->name('addToCart')->middleware('auth');
Route::get('/product-cart',[CartController::class,'cart'])->name('product.cart')->middleware('auth');
// Route::post('/cart-update',[CartController::class,'cartUpdate'])->name('cart.update');
// Admin
Route::get('/AdminDashboard',[AdminController::class,'index'])->name('admin.dashboard')->middleware('auth');
// Route::get('/statistice',[AdminController::class,'statistice'])->name('admin.statistice');
//Menu 
Route::get('/menu',[MenuController::class,'index'])->name('menu.index')->middleware('auth');
Route::get('/menu/show/{id}',[MenuController::class,'show'])->name('menu.show')->middleware('auth');
Route::get('menu/create',[MenuController::class,'create'])->name('menu.create')->middleware('auth') ;
Route::post('menu/store',[MenuController::class,'store'])->name('menu.store')->middleware('auth');
Route::get('/menu/edit/{id}',[MenuController::class,'edit'])->name('menu.edit')->middleware('auth');
Route::put('/menu/update/{id}',[MenuController::class,'update'])->name('menu.update')->middleware('auth');
Route::delete('/menu/destroy/{id}',[MenuController::class,'destroy'])->name('menu.destroy')->middleware('auth');

//Product
Route::get('/product',[ProductController::class,'index'])->name('product.index')->middleware('auth');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create')->middleware('auth');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store')->middleware('auth');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show')->middleware('auth');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit')->middleware('auth');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update')->middleware('auth');
Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy')->middleware('auth');


//Profiles
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/logi-store',[LoginController::class,'login'])->name('profile.login');
Route::post('/profile/store',[LoginController::class,'store'])->name('profile.store')->middleware('auth');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[LoginController::class,"register"])->name('profile.register');
Route::get('/settings',[ProfileController::class,'settings'])->name('settings')->middleware('auth');
Route::get('/profiles',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/show/{id}',[ProfileController::class,'show'])->name('profile.show');
Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile/update/{id}',[ProfileController::class,'update'])->name('profile.update')->middleware('auth');
Route::delete('/profile/destroy/{id}',[ProfileController::class,'destroy'])->name('profile.destroy')->middleware('auth');


