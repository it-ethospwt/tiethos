<?php

use App\Http\Controllers\knowladgeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\produkController;
use App\Models\product;

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

Route::get('/', function () {
    return view('index');
});


//ROUTE PRODUCT
Route::get('produk',[produkController::class,"index"]);
Route::get('tambah', [produkController::class,"tambah_product"]);
Route::post('store',[produkController::class,"store_product"]);
Route::get('edit/{id}',[produkController::class,'edit_product']);
Route::put('storeEdit/{id}',[produkController::class,'store_edit_product']);
Route::get('hapus/{id}',[produkController::class,"destroy_product"]);
Route::get('download/{id}',[produkController::class,"download_product"]);

// ROUTE  BANK KNOWLADGE
Route::get('knowladge',[knowladgeController::class,"index"]);
Route::get('tambahKnowladge',[knowladgeController::class,"tambah_knowladge"]);
Route::post('storeKnowladge',[knowladgeController::class,"store_knowladge"]);
Route::get('show/{id}',[knowladgeController::class,'show_knowladge']);
