<?php
use App\Http\Controllers\admin\Page;
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
Route::get("/",[Page::class,"pageLogin"])->name("login")->middleware(["guest"]);

Route::post('login', [LoginControllerAdmin::class, 'login'])->name('login.action');
// handle page error route
route::get("error_500/",[ErrorController::class,"error_500"]);
// handle page home,login and logout
Route::get("home",[Page::class,"pageHome"]);

Route::get("logout",[LoginControllerAdmin::class,"logout"])->middleware("auth");

Route::middleware(["auth","checkrole:admin"])->prefix("admin")->group(function(){
    Route::get("dashboard",[Page::class,"pageHome"]);
    Route::get("fakultas",[Page::class,"pageFakultas"]);
    Route::get("jurusan",[Page::class,"pageJurusan"]);
    Route::get("mahasiswa",[Page::class,"pageMahasiswa"]);
    Route::get("berita",[Page::class,"pageBerita"]);
    Route::get("periode-kkn",[Page::class,"pagePeriodeKkn"]);
    Route::get("calon-peserta-kkn",[Page::class,"pageCalonKkn"]);
    Route::get("desa-kkn",[Page::class,"pageDesaKkn"]);
    Route::get("dpl",[Page::class,"pageDosenKkn"]);
});
