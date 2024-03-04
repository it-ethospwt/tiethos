<?php

use App\Http\Controllers\knowladgeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\produkController;
use App\Models\product;

use App\Http\Controllers\Controller;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\KolController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliatorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\kontenController;
use App\Http\Controllers\handbookController;
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

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
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
Route::get('konten', [kontenController::class, "index"]);
Route::get('/{id}/al/', [kontenController::class, 'al'])->name('konten.al');
Route::get('/{id}/ccp/', [kontenController::class, 'ccp'])->name('konten.ccp');
Route::get('/{id}/ac/', [kontenController::class, 'ac'])->name('konten.ac');

// contoroller tambah vidio dan gambar
Route::get('konten/tambah', [kontenController::class, 'tambah'])->name('konten.tambah');
Route::get('konten/plus', [kontenController::class, 'plus'])->name('konten.plus');
Route::post('save', [kontenController::class, "save"]);
Route::post('toko', [kontenController::class, "toko"]);


// controller edit konten
Route::get('ubah/{content_id}', [kontenController::class, 'edit']);
Route::put('storeUbah/{content_id}', [kontenController::class, 'edit_store']);
Route::get('ganti/{content_id}', [kontenController::class, 'ganti']);
Route::put('storeGanti/{content_id}', [kontenController::class, 'edit_ganti']);
Route::get('delete/{content_id}', [kontenController::class, "destroy_content"]);
Route::get('unduh/{id}', [kontenController::class, "download_konten"]);


//ROUTE PRODUCT
Route::get('produk', [produkController::class, "index"]);
Route::get('tambah', [produkController::class, "tambah_product"]);
Route::post('store', [produkController::class, "store_product"]);
Route::get('edit/{id}', [produkController::class, 'edit_product']);
Route::put('storeEdit/{id}', [produkController::class, 'store_edit_product']);
Route::get('hapus/{id}', [produkController::class, "destroy_product"]);
Route::get('download/{id}', [produkController::class, "download_product"]);

// ROUTE  BANK KNOWLADGE
Route::get('knowladge', [knowladgeController::class, "index"]);
Route::get('tambahKnowladge', [knowladgeController::class, "tambah_knowladge"]);
Route::post('storeKnowladge', [knowladgeController::class, "store_knowladge"]);
Route::get('show/{id}', [knowladgeController::class, 'show_knowladge']);
Route::get('editKnowladge/{id}', [knowladgeController::class, 'edit_knowladge']);
Route::put('storeEditKnowladge/{id}', [knowladgeController::class, 'store_edit_knowladge']);
// punya hadnbook
Route::get('handbook', [handbookController::class, "index"]);
// handbookwa
Route::get('/{id}/handbook/wa', [handbookController::class, 'wa'])->name('handbook.wa.index');
Route::get('handbook/wa/tambah', [handbookController::class, 'tambah'])->name('handbook.wa.tambah');
Route::post('saveWa', [handbookController::class, "saveWa"]);
Route::get('wa/detail/{id}', [handbookController::class, 'detail'])->name('handbook.wa.detail');
Route::get('whapus/{id}', [handbookController::class, "destroy_wa"]);
Route::get('wchange/{id}', [handbookController::class, 'edit_wa']);
Route::put('wstoreChange/{id}', [handbookController::class, 'edit_store_wa']);
// handbookweb
Route::get('/{id}/handbook/web', [handbookController::class, 'web'])->name('handbook.web.index');
Route::get('handbook/web/tambah', [handbookController::class, 'plus'])->name('handbook.web.tambah');
Route::post('saveWeb', [handbookController::class, "saveWeb"]);
Route::get('web/detail/{id}', [handbookController::class, 'lengkap'])->name('handbook.web.detail');
Route::get('wbhapus/{id}', [handbookController::class, "destroy_web"]);
Route::get('wbchange/{id}', [handbookController::class, 'edit_web']);
Route::put('wbstoreChange/{id}', [handbookController::class, 'edit_store_web']);

Route::prefix('kol')->group(function () {
    Route::get('/', [KolController::class, 'index'])->name('kol')->middleware('auth');
    Route::get('tambahKOL', [KolController::class, 'tambahKOL'])->name('kol.tambah')->middleware('auth');
    Route::post('store', [KolController::class, 'store'])->name('kol.store')->middleware('auth');
    Route::get('detail/{id}', [KolController::class, 'detail'])->name('kol.detail')->middleware('auth');
    Route::post('/upload-gambar', [KolController::class, 'uploadGambar'])->name('upload.gambar');
    Route::post('/upload-video', [KolController::class, 'uploadVideo'])->name('upload.video');
});
Route::get('kedit/{id}', [KolController::class, 'edit_kol']);
Route::put('kstoreEdit/{id}', [KolController::class, 'edit_store_kol']);
Route::get('khapus/{id}', [KolController::class, "destroy_kol"]);
Route::get('kdelete/{id}', [KolController::class, "destroy_content"]);
Route::get('kunduh/{id}', [KolController::class, "download_konten"]);

// punya affiliatpr
Route::get('affiliator', [AffiliatorController::class, "index"]);
Route::get('affiliator/tambah', [AffiliatorController::class, "tambah"]);
Route::post('asave', [AffiliatorController::class, "asave"]);
Route::get('detail/{id}', [AffiliatorController::class, 'adetail'])->name('affiliator.detail')->middleware('auth');
Route::get('change/{id}', [AffiliatorController::class, 'edit']);
Route::put('storeChange/{id}', [AffiliatorController::class, 'edit_store']);
Route::get('ahapus/{id}', [AffiliatorController::class, "destroy_affiliator"]);
// affiliator cilacap
Route::get('/{id}/affiliator/cilacap', [AffiliatorController::class, 'cilacap'])->name('affiliator.cilacap.index');
// affiliator purwokerto
Route::get('/{id}/affiliator/purwokerto', [AffiliatorController::class, 'purwokerto'])->name('affiliator.purwokerto.index');
