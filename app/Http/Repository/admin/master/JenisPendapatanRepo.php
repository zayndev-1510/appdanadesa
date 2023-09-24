<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\JenisPendapatanRequest;
use App\Models\master\JenisPendapatanModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class JenisPendapatanRepo
{
    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("jenis_pendapatan_desa as jbd")
                ->join("kelompok_pendapatan_desa as kbd", "kbd.id", "=", "jbd.id_kelompok")
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

    public function save(JenisPendapatanRequest $req): JsonResponse
    {
        try {
            JenisPendapatanModel::query()->create($req->validated());
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error ".$th->getMessage(),
                "success" => false
            ]);
        }
    }

    public function update(JenisPendapatanRequest $req, $id): JsonResponse
    {
        try {
            JenisPendapatanModel::query()->findOrFail($id)->update($req->validated());
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
            JenisPendapatanModel::query()->findOrFail($id)->delete();
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
