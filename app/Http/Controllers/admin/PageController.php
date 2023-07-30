<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
class PageController extends Controller
{
    function pageLogin(){
        $message="Selamat Datang Admin";
        return view("login",compact("message"));
    }

    function pageHome(){
        $data=(object)[
            "keterangan"=>"Data Home"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.home",compact("data","datalogin"));
    }


    function pageJabatan(){
        $data=(object)[
            "keterangan"=>"Data Jabatan"
        ];
        $datalogin[0]=(object)[
            "foto"=>"default.jpg",
            "nama_lengkap"=>"Zayn"
        ];
        return view("admin.jabatan_desa",compact("data","datalogin"));
    }
}
