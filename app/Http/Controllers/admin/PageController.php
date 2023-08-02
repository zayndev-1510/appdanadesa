<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\master\PerangkatModel;
use App\Models\master\ProfilDesaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PageController extends Controller
{
    function pageLogin(){
        $message="Selamat Datang Admin";
        return view("login",compact("message"));
    }

    private static function getResultData($ket){
        $profildesa=ProfilDesaModel::query()->selectRaw("desa")->first();
        $data=(object)[
            "keterangan"=>$ket,
            "title"=>Str::upper("aplikasi manajemen dana desa ".$profildesa["desa"])
        ];

        $perangkat=PerangkatModel::query()->selectRaw("foto")->first();
        $datalogin=new \stdClass();
        $datalogin->id_pengguna=Auth::user()->id_pengguna;
        $datalogin->name=Auth::user()->name;
        $datalogin->foto=$perangkat->foto;
        return [$data,$datalogin];
    }

    function pageHome(){
        [$data,$datalogin]=self::getResultData("Dashboard");
        return view("admin.home",compact("data","datalogin"));
    }


    function pageJabatan(){
        [$data,$datalogin]=self::getResultData("Data Jabatan");
        return view("admin.jabatan_desa",compact("data","datalogin"));
    }

    function pagePerangkat(){
        [$data,$datalogin]=self::getResultData("Data Perangkat");
        return view("admin.perangkat_desa",compact("data","datalogin"));
    }

    function pageProfilDesa(){
        [$data,$datalogin]=self::getResultData("Profil Desa");
        return view("admin.profil_desa",compact("data","datalogin"));
    }


    function pageSumberDana(){
        [$data,$datalogin]=self::getResultData("Jenis Sumber Dana Desa");
        return view("admin.sumber_dana",compact("data","datalogin"));
    }


}
