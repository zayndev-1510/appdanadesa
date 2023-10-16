<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master\penganggaran;

use App\Http\Requests\admin\master\anggaran\DetailAnggaranRequest;
use App\Models\master\penganggaran\DetailAnggaranModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class DetailAnggaranRepo
{


    public function getForm():JsonResponse
    {
        $data=[
            [
                "label"=>"id_pola_kegiatan"
            ],
            [
                "label"=>"id_sumber_dana"
            ],
            [
                "label"=>"nama_paket"
            ],
            [
                "label"=>"nilai"
            ],
            [
                "label"=>"uraian"
            ],
            [
                "label"=>"satuan"
            ],
            [
                "label"=>"target"
            ],
            [
                "label"=>"sifat_kegiatan"
            ],

            [
                "label"=>"lokasi_kegiatan"
            ],
        ];
        return response()->json(["message"=>"Success","success"=>false,"data"=>$data]);
    }
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData(int $id): JsonResponse
    {
        try {

            $existdata = DB::table("detail_anggaran_kegiatan")->whereRaw("id_anggaran_kegiatan=?", [$id])->first();
            if (empty($existdata)) {
                return response()->json(["message" => "Invalid ID", "success" => false], 200);
            }
            // load data jabatan desa
            $data = DB::table("detail_anggaran_kegiatan as dak")
                ->join("anggaran_kegiatan as ak", "ak.id", "=", "dak.id_anggaran_kegiatan")
                ->join("pola_kegiatan as pola", "pola.id", "=", "dak.id_pola_kegiatan")
                ->join("sumber_dana as sd", "sd.id", "=", "dak.id_sumber_dana")
                ->whereRaw("dak.id_anggaran_kegiatan=?", [$id])
                ->selectRaw(
                    "dak.id,dak.nama_paket,dak.id_anggaran_kegiatan,
                    dak.nilai,dak.id_pola_kegiatan,dak.target,
                    dak.uraian,dak.satuan,dak.id_sumber_dana,
                    dak.sifat_kegiatan,dak.lokasi_kegiatan"
                )
                ->orderBy("dak.id", "ASC")
                ->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (ModelNotFoundException $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function saveData(DetailAnggaranRequest $req): JsonResponse
    {
        try {
            // create data
            DetailAnggaranModel::query()->create($req->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(DetailAnggaranRequest $req, int $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            DetailAnggaranModel::query()->findOrFail($id)->update($req->validated());

            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function deleteData(int $id): JsonResponse
    {
        try {
            // validation id  is valid or not
            DetailAnggaranModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
