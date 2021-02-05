<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;

Route::get("/", [FrontendController::class, 'index']);
Route::get("about", [FrontendController::class, 'about']);
Route::get("contact", [FrontendController::class, 'contact']);
Route::get("contact", [FrontendController::class, 'contact']);




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/delete/{cetegory_id}', [CategoryController::class, 'delete']);

Route::get('/subcategory', [SubCategoryController::class, 'index']);
Route::post('/subcategory/insert', [SubCategoryController::class, 'insert']);
Route::get('/subcategory/delete/{subcategory_id}', [SubCategoryController::class, 'delete']);
