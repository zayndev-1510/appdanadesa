<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\master\PerangkatModel;
use App\Models\master\ProfilDesaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PageController extends Controller
{
    /**
     * Summary of pageLogin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageLogin(){
        $message="Selamat Datang Admin";
        return view("login",compact("message"));
    }

    /**
     * Summary of getResultData
     * @param mixed $ket
     * @return array
     */
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
        $datalogin->foto=$perangkat["foto"];
        return [$data,$datalogin];
    }

    /**
     * Summary of pageHome
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageHome(){
        [$data,$datalogin]=self::getResultData("Dashboard");
        return view("admin.home",compact("data","datalogin"));
    }


    /**
     * Summary of pageJabatan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageJabatan(){
        [$data,$datalogin]=self::getResultData("Data Jabatan");
        return view("admin.jabatan_desa",compact("data","datalogin"));
    }

    /**
     * Summary of pagePerangkat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pagePerangkat(){
        [$data,$datalogin]=self::getResultData("Data Perangkat");
        return view("admin.perangkat_desa",compact("data","datalogin"));
    }

    /**
     * Summary of pageProfilDesa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageProfilDesa(){
        [$data,$datalogin]=self::getResultData("Profil Desa");
        return view("admin.profil_desa",compact("data","datalogin"));
    }


    /**
     * Summary of pageSumberDana
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageSumberDana(){
        [$data,$datalogin]=self::getResultData("Jenis Sumber Dana Desa");
        return view("admin.sumber_dana",compact("data","datalogin"));
    }
    /**
     * Summary of pageBidang
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageBidang(){
        [$data,$datalogin]=self::getResultData("Data Bidang");
        return view("admin.bidang",compact("data","datalogin"));
    }
    /**
     * Summary of pageSubBidang
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageSubBidang(){
        [$data,$datalogin]=self::getResultData("Data Sub Bidang");
        return view("admin.sub_bidang",compact("data","datalogin"));
    }

    /**
     * Summary of pageKegiatan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function pageKegiatan(){
        [$data,$datalogin]=self::getResultData("Data Kegiatan");
        return view("admin.kegiatan",compact("data","datalogin"));
    }


}
