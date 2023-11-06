<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\BidangRequest;
use App\Models\master\BidangModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;


class BidangRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData(): JsonResponse
    {
        try {
            // load data jabatan desa
            $data = BidangModel::query()->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error", "success" => false], 500);
        }
    }

    public function saveData(BidangRequest $bidangRequest): JsonResponse
    {
        try {
            // create data
            BidangModel::query()->create($bidangRequest->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(BidangRequest $bidangRequest, $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            BidangModel::query()->findOrFail($id)->update($bidangRequest->validated());

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
            BidangModel::query()->findOrFail($id)->delete();

            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
