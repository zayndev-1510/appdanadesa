<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\JenisBelanjaRequest;
use App\Models\master\JenisBelanjaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class JenisBelanjaRepo
{
    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("jenis_belanja_desa as jbd")
                ->join("kelompok_belanja_desa as kbd", "kbd.id", "=", "jbd.id_kelompok")
                ->selectRaw("jbd.id,jbd.kode,jbd.id_kelompok,jbd.keterangan,
                kbd.kode as kode_kelompok,kbd.keterangan as keterangan_kelompok")
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

    public function save(JenisBelanjaRequest $req): JsonResponse
    {
        try {
            JenisBelanjaModel::query()->create($req->validated());
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

    public function update(JenisBelanjaRequest $req, $id): JsonResponse
    {
        try {
            JenisBelanjaModel::query()->findOrFail($id)->update($req->validated());
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
            JenisBelanjaModel::query()->findOrFail($id)->delete();
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
