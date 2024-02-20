<?php

use App\Http\Controllers\knowladgeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\produkController;
use App\Models\product;

use App\Http\Controllers\Controller;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\kontenController;

use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


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


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'proses'])->name('login-proses');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
});

Route::prefix('users')->middleware(['isadmin'])->group(function () {
    Route::get('/', [AdminController::class, 'users'])->name('admin.users')->middleware('auth');
    Route::get('tambahUsers', [AdminController::class, 'tambahUsers'])->name('admin.tambahUsers')->middleware('auth');
    Route::post('store', [AdminController::class, 'users_store'])->name('admin.users.store')->middleware('auth');
    Route::get('detail/{id}', [AdminController::class, 'users_detail'])->name('admin.users.detail')->middleware('auth');
    Route::get('edit/{id}', [AdminController::class, 'users_edit'])->name('admin.users.edit')->middleware('auth');
    Route::post('update/{id}', [AdminController::class, 'users_update'])->name('admin.users.update')->middleware('auth');
    Route::delete('delete/{id}', [AdminController::class, 'users_delete'])->name('admin.users.delete')->middleware('auth');
});

Route::prefix('faq')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('faq')->middleware('auth');
    Route::get('tambahKeluhan', [FaqController::class, 'tambahKeluhan'])->name('faq.tambahKeluhan')->middleware('auth');
    Route::post('keluhanstore', [FaqController::class, 'keluhanStore'])->name('keluhanStore')->middleware('auth');
    Route::get('faqIndex/{id}', [FaqController::class, 'faqIndex'])->name('faqIndex')->middleware('auth');
    Route::get('tambahFaqDetail', [FaqController::class, 'tambahFaqDetail'])->name('faq.tambahFaqDetail')->middleware('auth');
    Route::get('tambahFaqDetail/{id}', [FaqController::class, 'getKeluhan'])->name('faq.getKeluhan')->middleware('auth');
    Route::post('storeFaq', [FaqController::class, 'storeFaq'])->name('storeFaq')->middleware('auth');
});

// punya konten
Route::get('konten', [App\Http\Controllers\kontenController::class, "index"]);
Route::get('/{id}/al/', [App\Http\Controllers\kontenController::class, 'al'])->name('konten.al');
Route::get('/{id}/ccp/', [App\Http\Controllers\kontenController::class, 'ccp'])->name('konten.ccp');
Route::get('/{id}/ac/', [App\Http\Controllers\kontenController::class, 'ac'])->name('konten.ac');

// contoroller tambah vidio dan gambar
Route::get('konten/tambah', [App\Http\Controllers\kontenController::class, 'tambah'])->name('konten.tambah');
Route::get('konten/plus', [App\Http\Controllers\kontenController::class, 'plus'])->name('konten.plus');
Route::post('save', [App\Http\Controllers\kontenController::class, "save"]);
Route::post('toko', [App\Http\Controllers\kontenController::class, "toko"]);


// controller edit konten
Route::get('ubah/{content_id}', [App\Http\Controllers\kontenController::class, 'edit']);
Route::put('storeUbah/{content_id}', [App\Http\Controllers\kontenController::class, 'edit_store']);
Route::get('delete/{content_id}', [App\Http\Controllers\kontenController::class, "destroy_content"]);


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
Route::get('editKnowladge/{id}',[knowladgeController::class,'edit_knowladge']);
Route::put('storeEditKnowladge/{id}',[knowladgeController::class,'store_edit_knowladge']);
// punya hadnbook
Route::get('handbook', [App\Http\Controllers\handbookController::class, "index"]);
// handbookwa
Route::get('/{id}/handbook/wa', [App\Http\Controllers\handbookController::class, 'wa'])->name('handbook.wa.index');
Route::get('handbook/wa/tambah', [App\Http\Controllers\handbookController::class, 'tambah'])->name('handbook.wa.tambah');
Route::post('saveWa', [App\Http\Controllers\handbookController::class, "saveWa"]);
Route::get('wa/detail/{id}', [App\Http\Controllers\handbookController::class, 'detail'])->name('handbook.wa.detail');
// handbookweb
Route::get('/{id}/handbook/web', [App\Http\Controllers\handbookController::class, 'web'])->name('handbook.web.index');
Route::get('handbook/web/tambah', [App\Http\Controllers\handbookController::class, 'plus'])->name('handbook.web.tambah');
Route::post('saveWeb', [App\Http\Controllers\handbookController::class, "saveWeb"]);
Route::get('web/detail/{id}', [App\Http\Controllers\handbookController::class, 'lengkap'])->name('handbook.web.detail');
