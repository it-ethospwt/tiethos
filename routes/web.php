<?php

use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\produkController;

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

//ROUTE PRODUCT
Route::get('produk', [produkController::class, "index"]);
Route::get('tambah', [produkController::class, "tambah_product"]);
Route::post('store', [produkController::class, "store_product"]);
Route::get('edit/{id}', [produkController::class, 'edit_product']);
Route::put('storeEdit/{id}', [produkController::class, 'store_edit_product']);
Route::get('hapus/{id}', [produkController::class, "destroy_product"]);

Route::prefix('faq')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('faq')->middleware('auth');
    Route::get('tambahKeluhan', [FaqController::class, 'tambahKeluhan'])->name('faq.tambahKeluhan')->middleware('auth');
    Route::post('keluhanstore', [FaqController::class, 'keluhanStore'])->name('keluhanStore')->middleware('auth');
    Route::get('faqIndex/{id}', [FaqController::class, 'faqIndex'])->name('faqIndex')->middleware('auth');
    Route::get('tambahFaqDetail', [FaqController::class, 'tambahFaqDetail'])->name('faq.tambahFaqDetail')->middleware('auth');
    Route::get('tambahFaqDetail/{id}', [FaqController::class, 'getKeluhan'])->name('faq.getKeluhan')->middleware('auth');
    Route::post('storeFaq', [FaqController::class, 'storeFaq'])->name('storeFaq')->middleware('auth');
});
