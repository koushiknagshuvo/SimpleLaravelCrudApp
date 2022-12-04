<?php

use App\Http\Controllers\ImageCrudController;
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

Route::get('/', [ImageCrudController::class, "all_product"])->name("all.product");
Route::get('/add-new-product', [ImageCrudController::class, "add_new_product"])->name("add.product");
Route::post('/store-product', [ImageCrudController::class, "store_product"])->name("store.product");
Route::get('/edit-product/{id}', [ImageCrudController::class, "edit_product"])->name("edit.product");
Route::post('/update-product/{id}', [ImageCrudController::class, "update_product"])->name("update.product");
Route::get('/delete-product/{id}', [ImageCrudController::class, "delete_product"])->name("delete.product");
