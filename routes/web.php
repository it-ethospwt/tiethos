<?php

use App\Http\Controllers\knowladgeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\fileEndorseController;
use App\Http\Controllers\fileVideoEndorseController;
use App\Models\product;
use App\Http\Controllers\endorseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\KolController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliatorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\kontenController;
use App\Http\Controllers\handbookController;
use App\Http\Controllers\DashboardController;
use App\Models\endors;
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
Route::prefix('konten')->group(function () {
    Route::get('/', [kontenController::class, "index"])->name('konten')->middleware('auth');
    Route::get('/{id}/al/', [kontenController::class, 'al'])->name('konten.al')->middleware('auth');
    Route::get('/{id}/ccp/', [kontenController::class, 'ccp'])->name('konten.ccp')->middleware('auth');
    Route::get('/{id}/ac/', [kontenController::class, 'ac'])->name('konten.ac')->middleware('auth');
    Route::get('tambah', [kontenController::class, 'tambah'])->name('konten.tambah')->middleware('auth');
    Route::get('plus', [kontenController::class, 'plus'])->name('konten.plus')->middleware('auth');
    Route::get('edit/{content_id}', [kontenController::class, 'edit'])->name('konten.edit')->middleware('auth');
    Route::get('ganti/{content_id}', [kontenController::class, 'ganti'])->name('konten.ganti')->middleware('auth');
});
// contoroller tambah vidio dan gambar
Route::post('save', [kontenController::class, "save"])->middleware('auth');
Route::post('toko', [kontenController::class, "toko"])->middleware('auth');
// controller edit konten
Route::put('storeUbah/{content_id}', [kontenController::class, 'edit_store'])->middleware('auth');
Route::put('storeGanti/{content_id}', [kontenController::class, 'edit_ganti'])->middleware('auth');
Route::get('delete/{content_id}', [kontenController::class, "destroy_content"])->middleware('auth');
Route::get('unduh/{id}', [kontenController::class, "download_konten"])->middleware('auth');

//ROUTE PRODUCT
Route::get('produk', [produkController::class, "index"]);
Route::get('tambah', [produkController::class, "tambah_product"]);
Route::post('store', [produkController::class, "store_product"]);
Route::get('edit/{id}', [produkController::class, 'edit_product']);
Route::put('storeEdit/{id}', [produkController::class, 'store_edit_product']);
Route::get('hapus/{id}', [produkController::class, "destroy_product"]);

// ROUTE BANK KNOWLADGE
Route::get('knowladge', [knowladgeController::class, "index"]);
Route::get('tambahKnowladge', [knowladgeController::class, "tambah_knowladge"]);
Route::post('storeKnowladge', [knowladgeController::class, "store_knowladge"]);
Route::get('show/{id}', [knowladgeController::class, 'show_knowladge']);
Route::get('editKnowladge/{id}', [knowladgeController::class, 'edit_knowladge']);
Route::put('storeEditKnowladge/{id}', [knowladgeController::class, 'store_edit_knowladge']);


// punya hadnbook
Route::get('handbook', [handbookController::class, "index"])->middleware('auth');
// handbookwa
Route::get('handbook/{id}/handbook/wa', [handbookController::class, 'wa'])->name('handbook.wa.index')->middleware('auth');
Route::get('handbook/wa/tambah', [handbookController::class, 'tambah'])->name('handbook.wa.tambah')->middleware('auth');
Route::post('saveWa', [handbookController::class, "saveWa"])->middleware('auth');
Route::get('handbook/wa/detail/{id}', [handbookController::class, 'detail'])->name('handbook.wa.detail')->middleware('auth');
Route::get('whapus/{id}', [handbookController::class, "destroy_wa"])->middleware('auth');
Route::get('wchange/{id}', [handbookController::class, 'edit_wa'])->middleware('auth');
Route::put('wstoreChange/{id}', [handbookController::class, 'edit_store_wa'])->middleware('auth');
// handbookweb
Route::get('handbook/{id}/handbook/web', [handbookController::class, 'web'])->name('handbook.web.index')->middleware('auth');
Route::get('handbook/web/tambah', [handbookController::class, 'plus'])->name('handbook.web.tambah')->middleware('auth');
Route::post('saveWeb', [handbookController::class, "saveWeb"])->middleware('auth');
Route::get('handbook/web/detail/{id}', [handbookController::class, 'lengkap'])->name('handbook.web.detail')->middleware('auth');
Route::get('wbhapus/{id}', [handbookController::class, "destroy_web"])->middleware('auth');
Route::get('wbchange/{id}', [handbookController::class, 'edit_web'])->middleware('auth');
Route::put('wbstoreChange/{id}', [handbookController::class, 'edit_store_web'])->middleware('auth');


Route::prefix('kol')->group(function () {
    Route::get('/', [KolController::class, 'index'])->name('kol')->middleware('auth');
    Route::get('tambahKOL', [KolController::class, 'tambahKOL'])->name('kol.tambah')->middleware('auth');
    Route::post('store', [KolController::class, 'store'])->name('kol.store')->middleware('auth');
    Route::get('detail/{id}', [KolController::class, 'detail'])->name('kol.detail')->middleware('auth');
    Route::post('/upload-gambar', [KolController::class, 'uploadGambar'])->name('upload.gambar')->middleware('auth');
    Route::post('/upload-video', [KolController::class, 'uploadVideo'])->name('upload.video')->middleware('auth');
});
Route::get('kedit/{id}', [KolController::class, 'edit_kol'])->middleware('auth');
Route::put('kstoreEdit/{id}', [KolController::class, 'edit_store_kol'])->middleware('auth');
Route::get('khapus/{id}', [KolController::class, "destroy_kol"])->middleware('auth');
Route::get('kdelete/{id}', [KolController::class, "destroy_content"])->middleware('auth');
Route::get('kunduh/{id}', [KolController::class, "download_konten"])->middleware('auth');

// punya affiliatpr
Route::get('affiliator', [AffiliatorController::class, "index"])->middleware('auth');
Route::get('affiliator/tambah', [AffiliatorController::class, "tambah"])->middleware('auth');
Route::post('asave', [AffiliatorController::class, "asave"])->middleware('auth');
Route::get('affiliator/detail/{id}', [AffiliatorController::class, 'adetail'])->name('affiliator.detail')->middleware('auth')->middleware('auth');
Route::get('affiliator/change/{id}', [AffiliatorController::class, 'edit'])->name('affiliator.edit')->middleware('auth');
Route::put('storeChange/{id}', [AffiliatorController::class, 'edit_store'])->middleware('auth');
Route::get('ahapus/{id}', [AffiliatorController::class, "destroy_affiliator"])->middleware('auth');
// affiliator cilacap
Route::get('/affiliator/cilacap/{id}/', [AffiliatorController::class, 'cilacap'])->name('affiliator.cilacap.index')->middleware('auth');
// affiliator purwokerto
Route::get('/affiliator/purwokerto/{id}/', [AffiliatorController::class, 'purwokerto'])->name('affiliator.purwokerto.index')->middleware('auth');


//ROUTE LIST ENDORSE
Route::get('endorse', [endorseController::class, "index"]);
//Route List Endorse(Instagram)
Route::get('endorse(instagram)', [endorseController::class, 'instagram_index']);
//Route List Endorse(Tiktok)
Route::get('endorse(tiktok)', [endorseController::class, 'tiktok_index']);
// ----------------------------------------------------------------------
Route::get('tambahEndorse', [endorseController::class, 'tambah_Endorse']);
Route::post('storeEndorse', [endorseController::class, 'store_Endorse']);
Route::get('detailEndoser/{id}', [endorseController::class, 'detail_Endoser']);
Route::get('editEndorse/{id}', [endorseController::class, 'edit_Endorse']);
Route::post('storeEditEndorse/{id}', [endorseController::class, 'store_editEndorse']);
Route::get('hpsEndorse/{id}', [endorseController::class, 'hapus_Endorse']);
//Route File Gambar Endorse 
Route::get('tambahFile/{id}', [fileEndorseController::class, 'tambah_file']);
Route::post('storeFile/{id}', [fileEndorseController::class, 'store_file']);
Route::get('download_file/{id}', [fileEndorseController::class, 'download_file']);
Route::get('hapus_file/{id}', [fileEndorseController::class, 'hapus_file']);
//Route File Video Endorse
Route::get('tambahVideo/{id}', [fileVideoEndorseController::class, 'tambah_fileVideo']);
Route::post('storeFileVideo/{id}', [fileVideoEndorseController::class, 'store_fileVideo']);
Route::get('download_fileVideo/{id}', [fileVideoEndorseController::class, 'download_fileVideo']);
Route::get('hapus_fileVideo/{id}', [fileVideoEndorseController::class, 'hapus_fileVideo']);
