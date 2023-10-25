<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\RapRequest;
use App\Models\master\DetailRapModel;
use App\Models\master\RapModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RapRepo
{
    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("rap")->
                join("objek_pendapatan_desa as op", "op.id", "=", "rap.id_objek")
                ->join("jenis_pendapatan_desa as jp", "jp.id", "=", "op.id_jenis")
                ->join("kelompok_pendapatan_desa as kp", "kp.id", "=", "op.id_kelompok")
                ->join("tahun_anggaran as ta","ta.id","=","rap.tahun_anggaran")
                ->selectRaw("rap.id,rap.id_objek,op.kode as kode_objek,
                jp.kode as kode_jenis,kp.kode as kode_kelompok,
                op.id_kelompok,jp.id as id_jenis,rap.tahun_anggaran,
                ta.tahun,
                op.keterangan as rincian,rap.total as anggaran,rap.created_at,rap.updated_at")->get();

            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                    "data" => $data,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false,
            ]);
        }
    }

    public function save(RapRequest $req): JsonResponse
    {
        try {
            RapModel::query()->create($req->validated());
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false,
            ]);
        }
    }

    public function update(RapRequest $req, $id): JsonResponse
    {
        try {
            RapModel::query()->findOrFail($id)->update($req->validated());
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "message" => "Invalid Id",
                "success" => false,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false,
            ]);
        }
    }

    public function delete($id): JsonResponse
    {
        try {
            RapModel::query()->findOrFail($id)->delete();
            DetailRapModel::query()->where("id_rap", $id)->delete();
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "message" => "Invalid Id",
                "success" => false,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false,
            ]);
        }
    }
}
