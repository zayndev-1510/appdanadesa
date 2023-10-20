<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master\rab;

use App\Http\Requests\admin\master\belanja\RabRequest;
use App\Models\master\belanja\RabModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class RabRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData(): JsonResponse
    {
        try {
            // load data jabatan desa
            $data = DB::table("rab")
                ->join("anggaran_kegiatan as ak", "ak.id", "=", "rab.id_kegiatan")
                ->join("kegiatan as k", "k.id", "=", "ak.id_kegiatan")
                ->join("objek_belanja_desa as obd", "obd.id", "=", "rab.kode")
                ->join("jenis_belanja_desa as jbd", "jbd.id", "=", "obd.id_jenis")
                ->join("kelompok_belanja_desa as kbd", "kbd.id", "=", "jbd.id_kelompok")
                ->join("detail_anggaran_kegiatan as dak", "dak.id", "=", "rab.paket_kegiatan")
                ->selectRaw("rab.id,obd.id as id_objek,obd.id_kelompok,obd.id_jenis,
                jbd.kode as kode_jenis,kbd.kode as kode_kelompok,obd.kode as kode_objek,dak.nama_paket,
                dak.nilai as nilai_paket,ak.pagu,
            rab.id_kegiatan,obd.keterangan as rincian,rab.anggaran,k.keterangan as kegiatan")->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function saveData(RabRequest $rabRequest): JsonResponse
    {
        try {
            // create data
            RabModel::query()->create($rabRequest->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(RabRequest $rabRequest, $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            RabModel::query()->findOrFail($id)->update($rabRequest->validated());

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

            RabModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
