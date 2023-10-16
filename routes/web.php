<?php
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\api\admin\LoginControllerAdmin;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Controller\ErrorController;

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

// route login admin with check middleware already login
Route::get("/", [PageController::class, "pageLogin"])->name("login")->middleware(["guest"]);

Route::post('login', [LoginControllerAdmin::class, 'login'])->name('login.action');
// handle page error route
route::get("error_500/", [ErrorController::class, "error_500"]);
// handle page home,login and logout
Route::get("home", [PageController::class, "pageHome"]);

Route::get("logout", [LoginControllerAdmin::class, "logout"])->middleware("auth");

Route::middleware(["auth", "checkrole:admin"])->prefix("admin")->group(function () {

    // data master umum
    Route::get("dashboard", [PageController::class, "pageHome"]);
    Route::get("jabatan", [PageController::class, "pageJabatan"]);
    Route::get("perangkat", [PageController::class, "pagePerangkat"]);
    Route::get("profil-desa", [PageController::class, "pageProfilDesa"]);
    Route::get("sumber-dana", [PageController::class, "pageSumberDana"]);
    Route::get("bidang", [PageController::class, "pageBidang"]);
    Route::get("sub-bidang", [PageController::class, "pageSubBidang"]);
    Route::get("kegiatan", [PageController::class, "pageKegiatan"]);
    Route::get("pola-kegiatan", [PageController::class, "pagePolaKegiatan"]);
    Route::get("rkd", [PageController::class, "pageRkd"]);

    // data master belanja desa
    Route::get("kelompok-belanja", [PageController::class, "pageKelompokBelanja"]);
    Route::get("jenis-belanja", [PageController::class, "pageJenisBelanja"]);
    Route::get("objek-belanja", [PageController::class, "pageObjekBelanja"]);

    // data master pendapatan desa
    Route::get("kelompok-pendapatan", [PageController::class, "pageKelompokPendapatan"]);
    Route::get("jenis-pendapatan", [PageController::class, "pageJenisPendapatan"]);
    Route::get("objek-pendapatan", [PageController::class, "pageObjekPendapatan"]);
    Route::get("rap", [PageController::class, "pageRap"]);

    // anggaran kegiatan
    Route::get("anggaran-kegiatan", [PageController::class, "pageAnggaranKegiatan"]);
    Route::get("detail-kegiatan", [PageController::class, "pageDetailKegiatan"]);

    // Pengaturan
    Route::get("pengaturan", [PageController::class, "pageSetting"]);

});
