<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\PolaKegiatanRequest;
use App\Models\master\PolaKegiatanModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PolaKegiatanRepo
{

    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("pola_kegiatan")->selectRaw("*")->get();
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

    public function save(PolaKegiatanRequest $req): JsonResponse
    {
        try {

            PolaKegiatanModel::query()->create($req->validated());
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

    public function update(PolaKegiatanRequest $req, $id): JsonResponse
    {
        try {

            PolaKegiatanModel::query()->findOrFail($id)->update($req->validated());
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

            PolaKegiatanModel::query()->findOrFail($id)->delete();
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
