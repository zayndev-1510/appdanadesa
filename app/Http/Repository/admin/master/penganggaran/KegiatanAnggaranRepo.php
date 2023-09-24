<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master\penganggaran;

use App\Http\Requests\admin\master\anggaran\KegiatanAnggaranRequest;
use App\Models\master\penganggaran\KegiatanAnggaranModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;


class KegiatanAnggaranRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData(): JsonResponse
    {
        try {
            // load data jabatan desa
            $data = DB::table("anggaran_kegiatan as ak")
                ->join("kegiatan as k", "k.id", "=", "ak.id_kegiatan")
                ->join("bidang as b", "b.id", "=", "k.id_bidang")
                ->join("sub_bidang as sb", "sb.id", "=", "k.id_sub_bidang")
                ->join("perangkat_desa as pd", "pd.id", "=", "ak.id_perangkat_desa")
                ->join("jabatan_desa as jd", "jd.id", "=", "pd.id_jabatan")
                ->selectRaw("ak.id,ak.id_kegiatan,b.id as id_bidang,ak.keluaran,
                sb.id as id_sub_bidang,k.keterangan as kegiatan,ak.lokasi,
                k.kode_kegiatan,b.kode_bidang,sb.kode_sub_bidang,
                ak.waktu,ak.volume,pd.id as id_perangkat,pd.nama_lengkap,jd.jabatan,ak.pagu")
                ->orderBy("ak.id","ASC")
                ->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error ".$th->getMessage(), "success" => false], 500);
        }
    }

    public function saveData(KegiatanAnggaranRequest $req): JsonResponse
    {
        try {
            // create data
            KegiatanAnggaranModel::query()->create($req->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(KegiatanAnggaranRequest $req, $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            KegiatanAnggaranModel::query()->findOrFail($id)->update($req->validated());

            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function deleteData($id): JsonResponse
    {
        try {
            // validation id  is valid or not
            KegiatanAnggaranModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function getTahunAnggaran():JsonResponse
    {
        try {

            $data=DB::table("tahun_setting")->selectRaw("*")->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error ".$th->getMessage(), "success" => false], 500);
        }
    }
}
