<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\KelompokBelanjaRequest;
use App\Models\master\KelompokBelanjaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class KelompokBelanjaRepo
{
    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("kelompok_belanja_desa")->selectRaw("*")->get();
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

    public function save(KelompokBelanjaRequest $req): JsonResponse
    {
        try {
            KelompokBelanjaModel::query()->create($req->validated());
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

    public function update(KelompokBelanjaRequest $req, $id): JsonResponse
    {
        try {
            KelompokBelanjaModel::query()->findOrFail($id)->update($req->validated());
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
            KelompokBelanjaModel::query()->findOrFail($id)->delete();
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
