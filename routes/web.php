<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/' ,[PagesController::class,'HomePage'])->name('homePage');
Route::get('/product_categorie/{categorie}',[PagesController::class,'ProductPage'])->name('ProductPage');
// Admin
Route::get('/AdminDashboard',[AdminController::class,'index'])->name('admin.dashboard');
// Route::get('/statistice',[AdminController::class,'statistice'])->name('admin.statistice');
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


//Profiles
Route::get('/login',[ProfileController::class,'create'])->name('profile.login');
Route::post('/profile/store',[ProfileController::class,'store'])->name('profile.store');
Route::get('/profiles',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/show/{id}',[ProfileController::class,'show'])->name('profile.show');
Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile/update/{id}',[ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile/destroy/{id}',[ProfileController::class,'destroy'])->name('profile.destroy');


