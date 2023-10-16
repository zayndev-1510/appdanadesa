<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\master\PerangkatModel;
use App\Models\master\ProfilDesaModel;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Summary of pageLogin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageLogin()
    {
        $data["message"] = "Selamat Datang Admin";
        $data["pengaturan"] = DB::table('pengaturan')->selectRaw("*")->first();
        return view("login", compact("data"));
    }

    /**
     * Summary of getResultData
     * @param mixed $ket
     * @return array
     */
    private static function getResultData($ket)
    {
        $pengaturan = DB::table("pengaturan")->selectRaw("*")->first();
        $profildesa = ProfilDesaModel::query()->selectRaw("desa")->first();
        $data = (object) [
            "keterangan" => $ket,
            "title" => Str::upper("aplikasi manajemen dana desa " . $profildesa["desa"]),
            "logo_rel" => $pengaturan->logo_rel,
        ];

        $perangkat = PerangkatModel::query()->selectRaw("foto")->first();
        $datalogin = new \stdClass();
        $datalogin->id_pengguna = Auth::user()->id_pengguna;

        $datalogin->name = Auth::user()->name;
        $datalogin->foto = $perangkat["foto"];
        return [$data, $datalogin];
    }

    /**
     * Summary of pageHome
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageHome()
    {
        [$data, $datalogin] = self::getResultData("Dashboard");
        return view("admin.home", compact("data", "datalogin"));
    }

    /**
     * Summary of pageJabatan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageJabatan()
    {
        [$data, $datalogin] = self::getResultData("Data Jabatan");
        return view("admin.jabatan_desa", compact("data", "datalogin"));
    }

    /**
     * Summary of pagePerangkat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pagePerangkat()
    {
        [$data, $datalogin] = self::getResultData("Data Perangkat");
        return view("admin.perangkat_desa", compact("data", "datalogin"));
    }

    /**
     * Summary of pageProfilDesa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageProfilDesa()
    {
        [$data, $datalogin] = self::getResultData("Profil Desa");
        return view("admin.profil_desa", compact("data", "datalogin"));
    }

    /**
     * Summary of pageSumberDana
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageSumberDana()
    {
        [$data, $datalogin] = self::getResultData("Jenis Sumber Dana Desa");
        return view("admin.sumber_dana", compact("data", "datalogin"));
    }
    /**
     * Summary of pageBidang
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageBidang()
    {
        [$data, $datalogin] = self::getResultData("Data Bidang");
        return view("admin.bidang", compact("data", "datalogin"));
    }
    /**
     * Summary of pageSubBidang
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageSubBidang()
    {
        [$data, $datalogin] = self::getResultData("Data Sub Bidang");
        return view("admin.sub_bidang", compact("data", "datalogin"));
    }

    /**
     * Summary of pageKegiatan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pageKegiatan()
    {
        [$data, $datalogin] = self::getResultData("Data Kegiatan");
        return view("admin.kegiatan", compact("data", "datalogin"));
    }

    public function pagePolaKegiatan()
    {
        [$data, $datalogin] = self::getResultData("Data Pola Kegiatan");
        return view("admin.pola_kegiatan", compact("data", "datalogin"));
    }

    public function pageRkd()
    {
        [$data, $datalogin] = self::getResultData("Data Pola Kegiatan");
        return view("admin.rkd", compact("data", "datalogin"));
    }
    public function pageKelompokBelanja()
    {
        [$data, $datalogin] = self::getResultData("Data Kelompok Belanja Desa");
        return view("admin.belanja.kelompok", compact("data", "datalogin"));
    }

    public function pageJenisBelanja()
    {
        [$data, $datalogin] = self::getResultData("Data Jenis Belanja Desa");
        return view("admin.belanja.jenis", compact("data", "datalogin"));
    }

    public function pageObjekBelanja()
    {
        [$data, $datalogin] = self::getResultData("Data Objek Belanja Desa");
        return view("admin.belanja.objek", compact("data", "datalogin"));
    }

    public function pageKelompokPendapatan()
    {
        [$data, $datalogin] = self::getResultData("Data Kelompok Pendapatan Desa");
        return view("admin.pendapatan.kelompok", compact("data", "datalogin"));
    }

    public function pageJenisPendapatan()
    {
        [$data, $datalogin] = self::getResultData("Data Jenis Pendapatan Desa");
        return view("admin.pendapatan.jenis", compact("data", "datalogin"));
    }

    public function pageObjekPendapatan()
    {
        [$data, $datalogin] = self::getResultData("Data Objek Pendapatan Desa");
        return view("admin.pendapatan.objek", compact("data", "datalogin"));
    }

    public function pageAnggaranKegiatan()
    {
        [$data, $datalogin] = self::getResultData("Data Anggaran Kegiatan");
        return view("admin.penganggaran.kegiatan", compact("data", "datalogin"));
    }

    public function pageDetailKegiatan()
    {
        [$data, $datalogin] = self::getResultData("Data Detail Kegiatan");
        return view("admin.penganggaran.detail_paket", compact("data", "datalogin"));
    }

    public function pageRap()
    {
        [$data, $datalogin] = self::getResultData("Rencana Anggaran Pendapatan");
        return view("admin.pendapatan.rap", compact("data", "datalogin"));
    }

    public function pageSetting()
    {
        [$data, $datalogin] = self::getResultData("Pengaturan");
        return view("admin.pengaturan", compact("data", "datalogin"));
    }

}
