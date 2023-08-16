<?php

use App\Http\Controllers\api\admin\master\BidangController;
use App\Http\Controllers\api\admin\master\JabatanController;
use App\Http\Controllers\api\admin\master\perangkatController;
use App\Http\Controllers\api\admin\master\ProfilController;
use App\Http\Controllers\api\admin\master\SumberdanaController;
use App\Http\Controllers\api\akademik\BerkasController;

use App\Http\Controllers\api\akademik\BeritaController;
use App\Http\Controllers\api\admin\LoginControllerAdmin;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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


Route::prefix("v1")->group(function(){

    Route::prefix("admin")->group(function(){
        route::post("login",[LoginControllerAdmin::class,"login"]);

        // perangkat desa
        route::prefix("perangkat-desa")->group(function(){
            route::get("/",[perangkatController::class,"get_data"]);
            route::post("/",[perangkatController::class,"save_data"]);
            route::put("/{id_pr}",[perangkatController::class,"update_data"]);
            route::delete("/{id}",[perangkatController::class,"delete_data"]);
        });

        // jabatan desa
        route::prefix("jabatan-desa")->group(function(){
            route::get("/",[JabatanController::class,"get_data"]);
            route::post("/",[JabatanController::class,"save_data"]);
            route::put("/{id_pr}",[JabatanController::class,"update_data"]);
            route::delete("/{id}",[JabatanController::class,"delete_data"]);
        });

         // Profil
         route::prefix("profil-desa")->group(function(){
            route::get("/",[ProfilController::class,"get_data_profil_desa"]);
            route::put("/{id}",[ProfilController::class,"update_data_profil_desa"]);
        });

        // Sumber Dana
        route::prefix("sumber-dana")->group(function(){
            route::get("/",[SumberdanaController::class,"get_data"]);
            route::post("/",[SumberdanaController::class,"save_data"]);
            route::put("/{id}",[SumberdanaController::class,"update_data"]);
            route::delete("/{id}",[SumberdanaController::class,"delete_data"]);
        });

        // Bidang
        route::prefix("bidang")->group(function(){
            route::get("/",[BidangController::class,"get_data"]);
            route::post("/",[BidangController::class,"save_data"]);
            route::put("/{id}",[BidangController::class,"update_data"]);
            route::delete("/{id}",[BidangController::class,"delete_data"]);
        });

    });

});


