<?php

use App\Http\Controllers\api\admin\LoginControllerAdmin;
use App\Http\Controllers\api\admin\master\anggaran\DetailAnggaranController;
use App\Http\Controllers\api\admin\master\anggaran\KegiatanAnggaranController;
use App\Http\Controllers\api\admin\master\BidangController;
use App\Http\Controllers\api\admin\master\DetailRapController;
use App\Http\Controllers\api\admin\master\JabatanController;
use App\Http\Controllers\api\admin\master\JenisBelanja;
use App\Http\Controllers\api\admin\master\JenisPendapatan;
use App\Http\Controllers\api\admin\master\KegiatanController;
use App\Http\Controllers\api\admin\master\KelompokBelanja;
use App\Http\Controllers\api\admin\master\KelompokPendapatan;
use App\Http\Controllers\api\admin\master\ObjekBelanja;
use App\Http\Controllers\api\admin\master\ObjekPendapatan;
use App\Http\Controllers\api\admin\master\perangkatController;
use App\Http\Controllers\api\admin\master\PolaKegiatanController;
use App\Http\Controllers\api\admin\master\ProfilController;
use App\Http\Controllers\api\admin\master\rab\RabController;
use App\Http\Controllers\api\admin\master\rab\RabDetailController;
use App\Http\Controllers\api\admin\master\RapController;
use App\Http\Controllers\api\admin\master\SettingController;
use App\Http\Controllers\api\admin\master\SubBidangController;
use App\Http\Controllers\api\admin\master\SumberdanaController;
use App\Http\Controllers\api\admin\master\TahunAnggaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::prefix("v1")->group(function () {

    Route::prefix("admin")->group(function () {
        route::post("login", [LoginControllerAdmin::class, "login"]);

        // perangkat desa
        route::middleware("auth:api")->prefix("perangkat-desa")->group(function () {
            route::get("/", [perangkatController::class, "get_data"]);
            route::post("/", [perangkatController::class, "save_data"]);
            route::put("/{id_pr}", [perangkatController::class, "update_data"]);
            route::delete("/{id}", [perangkatController::class, "delete_data"]);
        });

        // jabatan desa
        route::middleware("auth:api")->prefix("jabatan-desa")->group(function () {
            route::get("/", [JabatanController::class, "get_data"]);
            route::post("/", [JabatanController::class, "save_data"]);
            route::put("/{id_pr}", [JabatanController::class, "update_data"]);
            route::delete("/{id}", [JabatanController::class, "delete_data"]);
        });

        // Profil
        route::middleware("auth:api")->prefix("profil-desa")->group(function () {
            route::get("/", [ProfilController::class, "get_data_profil_desa"]);
            route::post("/{id}", [ProfilController::class, "update_data_profil_desa"]);
        });

        // Sumber Dana
        route::middleware("auth:api")->prefix("sumber-dana")->group(function () {
            route::get("/", [SumberdanaController::class, "get_data"]);
            route::post("/", [SumberdanaController::class, "save_data"]);
            route::put("/{id}", [SumberdanaController::class, "update_data"]);
            route::delete("/{id}", [SumberdanaController::class, "delete_data"]);
        });

        // Bidang
        route::middleware("auth:api")->prefix("bidang")->group(function () {
            route::get("/", [BidangController::class, "get_data"]);
            route::post("/", [BidangController::class, "save_data"]);
            route::put("/{id}", [BidangController::class, "update_data"]);
            route::delete("/{id}", [BidangController::class, "delete_data"]);
        });

        // Sub Bidang
        Route::middleware('auth:api')->prefix("sub_bidang")->group(function () {
            route::get("/", [SubBidangController::class, "get_data"]);
            route::post("/", [SubBidangController::class, "save_data"]);
            route::put("/{id}", [SubBidangController::class, "update_data"]);
            route::delete("/{id}", [SubBidangController::class, "delete_data"]);
        });

        // Kegiatan
        route::middleware('auth:api')->prefix("kegiatan")->group(function () {
            route::get("/", [KegiatanController::class, "get_data"]);
            route::post("/", [KegiatanController::class, "save_data"]);
            route::put("/{id}", [KegiatanController::class, "update_data"]);
            route::delete("/{id}", [KegiatanController::class, "delete_data"]);
        });

        // Pola Kegiatan
        route::middleware('auth:api')->prefix("pola-kegiatan")->group(function () {
            route::get("/", [PolaKegiatanController::class, "get_all"]);
            route::post("/", [PolaKegiatanController::class, "save_data"]);
            route::put("/{id}", [PolaKegiatanController::class, "update_data"]);
            route::delete("/{id}", [PolaKegiatanController::class, "delete_data"]);
        });

        // Kelompok Belanja
        route::middleware('auth:api')->prefix("kelompok-belanja")->group(function () {
            route::get("/", [KelompokBelanja::class, "get_all"]);
            route::post("/", [KelompokBelanja::class, "save_data"]);
            route::put("/{id}", [KelompokBelanja::class, "update_data"]);
            route::delete("/{id}", [KelompokBelanja::class, "delete_data"]);
        });

        // Jenis Belanja
        route::middleware('auth:api')->prefix("jenis-belanja")->group(function () {
            route::get("/", [JenisBelanja::class, "get_all"]);
            route::post("/", [JenisBelanja::class, "save_data"]);
            route::put("/{id}", [JenisBelanja::class, "update_data"]);
            route::delete("/{id}", [JenisBelanja::class, "delete_data"]);
        });

        // Objek Belanja
        route::middleware('auth:api')->prefix("objek-belanja")->group(function () {
            route::get("/", [ObjekBelanja::class, "get_all"]);
            route::post("/", [ObjekBelanja::class, "save_data"]);
            route::put("/{id}", [ObjekBelanja::class, "update_data"]);
            route::delete("/{id}", [ObjekBelanja::class, "delete_data"]);
        });

        // Kelompok Pendapatan
        route::middleware('auth:api')->prefix("kelompok-pendapatan")->group(function () {
            route::get("/", [KelompokPendapatan::class, "get_all"]);
            route::post("/", [KelompokPendapatan::class, "save_data"]);
            route::put("/{id}", [KelompokPendapatan::class, "update_data"]);
            route::delete("/{id}", [KelompokPendapatan::class, "delete_data"]);
        });

        // Jenis Pendapatan
        route::middleware('auth:api')->prefix("jenis-pendapatan")->group(function () {
            route::get("/", [JenisPendapatan::class, "get_all"]);
            route::post("/", [JenisPendapatan::class, "save_data"]);
            route::put("/{id}", [JenisPendapatan::class, "update_data"]);
            route::delete("/{id}", [JenisPendapatan::class, "delete_data"]);
        });

        // Objek Pendapatan
        route::middleware('auth:api')->prefix("objek-pendapatan")->group(function () {
            route::get("/", [ObjekPendapatan::class, "get_all"]);
            route::post("/", [ObjekPendapatan::class, "save_data"]);
            route::put("/{id}", [ObjekPendapatan::class, "update_data"]);
            route::delete("/{id}", [ObjekPendapatan::class, "delete_data"]);
        });

        // Anggaran Kegiatan
        route::middleware('auth:api')->prefix("anggaran-kegiatan")->group(function () {
            route::get("/", [KegiatanAnggaranController::class, "get_all"]);
            route::post("/", [KegiatanAnggaranController::class, "save_data"]);
            route::put("/{id}", [KegiatanAnggaranController::class, "update_data"]);
            route::delete("/{id}", [KegiatanAnggaranController::class, "delete_data"]);
        });

        // Detail Anggaran Kegiatan
        route::middleware('auth:api')->prefix("detail-kegiatan")->group(function () {
            route::get("/{id}", [DetailAnggaranController::class, "get_all"]);
            route::post("/", [DetailAnggaranController::class, "save_data"]);
            route::put("/{id}", [DetailAnggaranController::class, "update_data"]);
            route::delete("/{id}", [DetailAnggaranController::class, "delete_data"]);
            route::get("/paket/{id}", [DetailAnggaranController::class, "get_detail_kegiatan"]);
        });

        // Tahun Anggaran
        route::middleware('auth:api')->prefix("tahun-anggaran")->group(function () {
            route::get("/", [KegiatanAnggaranController::class, "get_tahun_anggaran"]);
        });

        // Rencana Anggaran Pendapatan
        route::middleware('auth:api')->prefix("rap")->group(function () {
            route::get("/", [RapController::class, "get_all"]);
            route::post("/", [RapController::class, "save_data"]);
            route::put("/{id}", [RapController::class, "update_data"]);
            route::delete("/{id}", [RapController::class, "delete_data"]);
        });

        // Detail Rencana Anggaran Pendapatan
        route::middleware('auth:api')->prefix("detail-rap")->group(function () {
            route::get("/", [DetailRapController::class, "get_all"]);
            route::post("/", [DetailRapController::class, "save_data"]);
            route::put("/{id}", [DetailRapController::class, "update_data"]);
            route::delete("/{id}", [DetailRapController::class, "delete_data"]);
            route::get("check_nomor_urut/{id}", [DetailRapController::class, "check_nomor_urut"]);
        });

        // Detail Rencana Anggaran Pendapatan
        route::middleware('auth:api')->prefix("setting")->group(function () {
            route::get("/", [SettingController::class, "get_all"]);
            route::post("/", [SettingController::class, "update_data"]);
        });

        route::middleware('auth:api')->prefix("get-form")->group(function () {
            route::get("/", [DetailAnggaranController::class, "get_form"]);
        });

        // Rencana Anggaran Belanja
        route::middleware('auth:api')->prefix("rab")->group(function () {
            route::get("/", [RabController::class, "get_all"]);
            route::post("/", [RabController::class, "save_data"]);
            route::put("/{id}", [RabController::class, "update_data"]);
            route::delete("/{id}", [RabController::class, "delete_data"]);
        });

        // Rincian Rencana Anggaran Belanja
        route::middleware('auth:api')->prefix("detail-rab")->group(function () {
            route::get("/{id}", [RabDetailController::class, "get_detail_rab"]);
            route::post("/", [RabDetailController::class, "save_data"]);
            route::put("/{id}", [RabDetailController::class, "update_data"]);
            route::delete("/{id}", [RabDetailController::class, "delete_data"]);
        });

        // Tahun Anggaran
        route::middleware('auth:api')->prefix("anggaran-tahun")->group(function () {
            route::get("/", [TahunAnggaranController::class, "get_all"]);
            route::post("/", [TahunAnggaranController::class, "save_data"]);
            route::put("/{id}", [TahunAnggaranController::class, "update_data"]);
            route::delete("/{id}", [TahunAnggaranController::class, "delete_data"]);
        });
    });

});
