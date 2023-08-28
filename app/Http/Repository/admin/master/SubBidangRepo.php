<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\SubBidangRequest;
use App\Models\master\BidangModel;
use App\Models\master\SubBidangModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;


class SubBidangRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData(): JsonResponse
    {
        try {
            // load data jabatan desa
            $data["sub_bidang"] = DB::table("bidang as b")->join("sub_bidang as sb", "b.id", "=", "sb.id_bidang")
                ->selectRaw("sb.id,sb.id_bidang,b.kode_bidang,b.keterangan as bidang,sb.kode_sub_bidang,sb.keterangan as sub_bidang")->get();
            $data["bidang"]=BidangModel::all();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error", "success" => false], 500);
        }
    }

    public function saveData(SubBidangRequest $bidangRequest): JsonResponse
    {
        try {
            // create data
            SubBidangModel::query()->create($bidangRequest->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(SubBidangRequest $bidangRequest, $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            SubBidangModel::query()->findOrFail($id)->update($bidangRequest->validated());

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
            SubBidangModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
