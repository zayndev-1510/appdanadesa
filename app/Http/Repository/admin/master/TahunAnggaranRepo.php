<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\TahunRequest;
use App\Models\master\TahunModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class TahunAnggaranRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData(): JsonResponse
    {
        try {
            // load data jabatan desa
            $data = TahunModel::query()->orderBy("tahun","asc")->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error", "success" => false], 500);
        }
    }

    public function saveData(TahunRequest $request): JsonResponse
    {
        try {
            // create data
            TahunModel::query()->create($request->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(TahunRequest $request, int $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            TahunModel::query()->findOrFail($id)->update($request->validated());
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
            TahunModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
