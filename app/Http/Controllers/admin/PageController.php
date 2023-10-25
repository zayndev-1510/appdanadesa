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
        return view("admin.pendapatan.objek_rap", compact("data", "datalogin"));
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

    public function pageRab()
    {
        [$data, $datalogin] = self::getResultData("Data RAB Desa");
        return view("admin.belanja.rab", compact("data", "datalogin"));
    }

    public function pageRabRincian()
    {

        [$data, $datalogin] = self::getResultData("Data RAB Rincian Desa");
        return view("admin.belanja.rincian", compact("data", "datalogin"));
    }

    public function pageTahunAnggaran()
    {
        [$data, $datalogin] = self::getResultData("Data ahun Anggaran");
        return view("admin.tahun_anggaran", compact("data", "datalogin"));
    }

    // data laporan

    public function pageLaporanRak()
    {
        [$data, $datalogin] = self::getResultData("Laporan Rencana Anggaran Kegiatan");
        return view("admin.penganggaran.laporan", compact("data", "datalogin"));
    }

    public function pageLaporanRab()
    {
        [$data, $datalogin] = self::getResultData("Laporan Rencana Anggaran Belanja");
        return view("admin.belanja.laporan", compact("data", "datalogin"));
    }

    public function pageCetakRak(int $id)
    {
        [$data, $datalogin] = self::getResultData("Laporan Rencana Anggaran Kegiatan");
        [$data->rak, $tahun_anggaran] = self::get_rak($id);
        $profildesa = DB::table("profil_desa")->first();
        $data->foto = url("uploads", $profildesa->foto);
        $data->tahun_anggaran = $tahun_anggaran;
        $perangkat = DB::table("perangkat_desa")->selectRaw("*")->WhereRaw("id_jabatan=?", [1])->orWhereRaw("id_jabatan=?", [2])->get();
        $data->perangkat = [
            "nama_kepala_desa" => $perangkat[0]->nama_lengkap,
            "nama_sekretaris_desa" => $perangkat[1]->nama_lengkap,
        ];
        if (empty($data->rak)) {
            return abort(404, 'Page not found');
        }
        // dd($data->rab);
        return view("admin.penganggaran.cetak", compact("data", "datalogin"));
    }

    public function pageCetakRab(int $id)
    {
        [$data, $datalogin] = self::getResultData("Laporan Rencana Anggaran Kegiatan");

        $profildesa = DB::table("profil_desa")->first();
        $data->foto = url("uploads", $profildesa->foto);
        $rab = self::get_rab($id);
        [$data->rak, $tahun_anggaran] = self::get_rak($id);
        $data->tahun_anggaran = 2023;
        $data->rab = array_values($rab);
        $perangkat = DB::table("perangkat_desa")->selectRaw("*")->WhereRaw("id_jabatan=?", [1])->orWhereRaw("id_jabatan=?", [2])->get();
        $data->perangkat = [
            "nama_kepala_desa" => $perangkat[0]->nama_lengkap,
            "nama_sekretaris_desa" => $perangkat[1]->nama_lengkap,
        ];

        return view("admin.belanja.cetak", compact("data", "datalogin"));

    }

    private static function get_rak(int $id)
    {
        // load data jabatan desa
        $query = DB::table("bidang as b")
            ->join("sub_bidang as sb", "b.id", "=", "sb.id_bidang")
            ->join("kegiatan as k", "sb.id", "=", "k.id_sub_bidang")
            ->join("anggaran_kegiatan as ak", "k.id", "=", "ak.id_kegiatan")
            ->join("tahun_anggaran as ta", "ta.id", "=", "ak.tahun_anggaran")
            ->selectRaw("
                b.id as id_bidang,b.keterangan as bidang,b.kode_bidang,
                sb.id as id_sub_bidang,sb.kode_sub_bidang,sb.keterangan as sub_bidang,
                k.id as id_kegiatan,k.kode_kegiatan,
                k.keterangan as kegiatan,ak.id as id_anggaran,ak.pagu,ak.volume,
                ta.tahun
        ");
        if ($id == 0) {
            $query->get();
        } else if ($id != 0) {
            $query->whereRaw("ak.tahun_anggaran=?", [$id]);
        }
        $data = $query->get();

        // Initialize an empty result array
        $result = [];
        $totalpagu = 0;
        $tahun_anggaran = "";

// Loop through the data and group by "id_bidang"
        foreach ($data as $item) {
            $item->anggaran = 0;
            $id_bidang = $item->id_bidang;
            $idSubBidang = $item->id_sub_bidang;

            if (!array_key_exists($id_bidang, $result)) {
                // If not, initialize an empty array for the "id_bidang"
                $result[$id_bidang] = [
                    'id_bidang' => $id_bidang,
                    'bidang' => $item->bidang,
                    'kode_bidang' => $item->kode_bidang,
                    "total" => 0,
                ];
            }
            if (!isset($result[$id_bidang]['sub_bidang'][$idSubBidang])) {
                $result[$id_bidang]['sub_bidang'][$idSubBidang] = [
                    'id_sub_bidang' => $idSubBidang,
                    "sub_bidang" => $item->sub_bidang,
                    "kode_sub_bidang" => $item->kode_sub_bidang,
                    'kegiatan' => [],
                ];
            }
            $result[$id_bidang]['sub_bidang'][$idSubBidang]['kegiatan'][] = [
                'id_kegiatan' => $item->id_kegiatan,
                'kode_kegiatan' => $item->kode_kegiatan,
                'kegiatan' => $item->kegiatan,
                'id_anggaran' => $item->id_anggaran,
                'pagu' => $item->pagu,
                'volume' => $item->volume,
                "tahun_anggaran" => $item->tahun,
            ];
            $tahun_anggaran = $item->tahun;
            $totalpagu += $item->pagu;
            $result[$id_bidang]['total'] += $item->pagu;
        }
        return [
            array_values($result), $tahun_anggaran,
        ];

    }

    private static function get_rab(int $id)
    {
        $rab = DB::table("rab")->join("rab_rinci", "rab.id", "=", "rab_rinci.rab")
            ->join("sumber_dana", "sumber_dana.id", "=", "rab_rinci.sumber_dana")
            ->selectRaw("rab.id as rab,rab.kode,rab.anggaran,rab.tahun_anggaran,rab.id_kegiatan as id_anggaran,
            rab_rinci.id as rab_rinci,rab_rinci.uraian,rab_rinci.jumlah,rab_rinci.harga,rab_rinci.sumber_dana,
            sumber_dana.jenis")->get();
        $kelompok = DB::table("kelompok_belanja_desa as kbd")
            ->join("jenis_belanja_desa as jbd", "jbd.id_kelompok", "=", "kbd.id")
            ->join("objek_belanja_desa as obd", "obd.id_jenis", "=", "jbd.id")
            ->selectRaw("kbd.id as id_kelompok,kbd.kode as kode_kelompok,kbd.keterangan as kelompok,
                jbd.id as id_jenis,jbd.kode as kode_jenis,jbd.keterangan as jenis,
                obd.id as id_objek,obd.kode as kode_objek,obd.keterangan as objek
            ")->get();
        // dd($rab);
        $result = [];

        foreach ($kelompok as $key => $item) {
            $id_kelompok = $item->id_kelompok;
            $id_jenis = $item->id_jenis;
            if (!array_key_exists($id_kelompok, $result)) {
                //         // If not, initialize an empty array for the "id_bidang"
                $result[$id_kelompok] = [
                    'id_kelompok' => $id_kelompok,
                    'kode_kelompok' => $item->kode_kelompok,
                    'kelompok' => $item->kelompok,
                    "id_anggaran" => 0,

                ];
            }

            if (!isset($result[$id_kelompok]['jenis'][$id_jenis])) {
                $result[$id_kelompok]['jenis'][$id_jenis] = [
                    'id_jenis' => $id_jenis,
                    "id_kelompok" => $id_kelompok,
                    "kode_jenis" => $item->kode_jenis,
                    "jenis" => $item->jenis,

                ];
            }
            foreach ($rab as $keys => $value) {
                // Check if the current "id_objek" is found in $rab
                if (($item->id_objek == $value->kode)) {
                    $result[$id_kelompok]['jenis'][$id_jenis]['objek'][] = [
                        'id_objek' => $item->id_objek,
                        "id_anggaran" => $value->id_anggaran,
                        'kode_objek' => $item->kode_objek,
                        'objek' => $item->objek,
                        "total" => $value->anggaran,
                        "uraian" => $value->uraian,
                        "jumlah" => $value->jumlah,
                        "harga" => $value->harga,
                        "sumber_dana" => $value->jenis,
                    ];
                    $result[$id_kelompok]["id_anggaran"] = $value->id_anggaran;
                }
            }
        }

        return $result;

    }
}
