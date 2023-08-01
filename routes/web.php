<?php
use App\Http\Controllers\admin\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admin\LoginControllerAdmin;
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
Route::get("/",[PageController::class,"pageLogin"])->name("login")->middleware(["guest"]);

Route::post('login', [LoginControllerAdmin::class, 'login'])->name('login.action');
// handle page error route
route::get("error_500/",[ErrorController::class,"error_500"]);
// handle page home,login and logout
Route::get("home",[PageController::class,"pageHome"]);

Route::get("logout",[LoginControllerAdmin::class,"logout"])->middleware("auth");

Route::middleware(["auth","checkrole:admin"])->prefix("admin")->group(function(){
    Route::get("dashboard",[PageController::class,"pageHome"]);
    Route::get("jabatan",[PageController::class,"pageJabatan"]);
    Route::get("perangkat",[PageController::class,"pagePerangkat"]);
    Route::get("profil-desa",[PageController::class,"pageProfilDesa"]);
});
