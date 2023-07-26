<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\api\akademik\Jurusan;
use App\Http\Controllers\Controller;
use App\Models\akademik\FakultasModel;
use App\Models\akademik\JurusanModel;
use Illuminate\Http\Request;

class Page extends Controller
{

    function pageLogin(){
        $message="Selamat Datang Admin";
        return view("login",compact("message"));
    }
    function pageHome(){
        $data=(object)[
            "keterangan"=>"Data Fakultas"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.home",compact("data","datalogin"));
    }
     function  pageFakultas(){
        $data=(object)[
            "keterangan"=>"Data Fakultas"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.fakultas",compact("data","datalogin"));
    }

    function  pageJurusan(){
        $data=(object)[
            "keterangan"=>"Data Jurusan",
            "data"=>    $data=JurusanModel::with("fakultas")->get()
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.jurusan",compact("data","datalogin"));
    }

    function pageMahasiswa(){

        $data=(object)[
            "keterangan"=>"Data Jurusan"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.mahasiswa",compact("data","datalogin"));
    }

    function  pageBerita(){
        $data=(object)[
            "keterangan"=>"Data Berita"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.berita",compact("data","datalogin"));
    }

    function pagePeriodeKkn(){
        $data=(object)[
            "keterangan"=>"Data Periode KKN"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.periode_kkn",compact("data","datalogin"));
    }

    // hanlde page kkn

    function pageCalonKkn(){
        $data=(object)[
            "keterangan"=>"Data Calon Peserta KKN"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.kkn.calon_peserta",compact("data","datalogin"));
    }


    function pageDesaKkn(){
        $data=(object)[
            "keterangan"=>"Data Desa KKN"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.kkn.desa_kkn",compact("data","datalogin"));
    }

    function pageDosenKkn(){
        $data=(object)[
            "keterangan"=>"Data Dosen Pembimbing Lapangan"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.kkn.dpl_kkn",compact("data","datalogin"));
    }
}
