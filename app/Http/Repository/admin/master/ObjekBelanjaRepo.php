<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\ObjekBelanjaRequest;
use App\Models\master\ObjekBelanjaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ObjekBelanjaRepo
{
    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("objek_belanja_desa as obd")
                ->join("kelompok_belanja_desa as kbd", "kbd.id", "=", "obd.id_kelompok")
                ->join("jenis_belanja_desa as jbd", "jbd.id", "=", "obd.id_jenis")
                ->selectRaw("obd.id,obd.id_kelompok,obd.id_jenis,obd.kode,
                kbd.kode as kode_kelompok,jbd.kode as kode_jenis,
                obd.keterangan,kbd.keterangan as ket_kelompok,jbd.keterangan as ket_jenis")
                ->get();
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                    "data" => $data
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false
            ]);
        }
    }

    public function save(ObjekBelanjaRequest $req): JsonResponse
    {
        try {
            ObjekBelanjaModel::query()->create($req->validated());
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false
            ]);
        }
    }

    public function update(ObjekBelanjaRequest $req, $id): JsonResponse
    {
        try {
            ObjekBelanjaModel::query()->findOrFail($id)->update($req->validated());
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "message" => "Invalid Id",
                "success" => false
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false
            ]);
        }
    }

    public function delete($id): JsonResponse
    {
        try {
            ObjekBelanjaModel::query()->findOrFail($id)->delete();
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "message" => "Invalid Id",
                "success" => false
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error",
                "success" => false
            ]);
        }
    }
}
