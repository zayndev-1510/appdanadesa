<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master\rab;

use App\Http\Requests\admin\master\belanja\RabDetailRequest;
use App\Models\master\belanja\RabDetailModel;
use App\Models\master\belanja\RabModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class RabDetailRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function rabRinci(int $id): JsonResponse
    {
        try {
            // load data jabatan desa
            $data = DB::table("rab_rinci")
                ->join("rab", "rab.id", "=", "rab_rinci.rab")
                ->join("sumber_dana as sd", "sd.id", "=", "rab_rinci.sumber_dana")
                ->whereRaw("rab_rinci.rab=?",
                    [$id])
                ->selectRaw("
                            rab_rinci.id,rab_rinci.rab,rab_rinci.nomor_urut,rab_rinci.jumlah,
                            rab_rinci.sumber_dana,rab_rinci.harga,sd.jenis,rab_rinci.uraian")->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function saveData(RabDetailRequest $rabRequest): JsonResponse
    {
        try {
            RabDetailModel::query()->create($rabRequest->validated());
            $str = explode(" ", $rabRequest->jumlah);

            $total = $rabRequest->harga * (int) $str[0];

            $anggaran = RabModel::query()->where("id", "=", $rabRequest->rab)->sum("anggaran");

            RabModel::query()->where("id", "=", $rabRequest->rab)->update(
                [
                    "anggaran" => $anggaran + $total,
                ]
            );
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(RabDetailRequest $rabRequest, $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            RabDetailModel::query()->findOrFail($id)->update($rabRequest->validated());
            $str = explode(" ", $rabRequest->jumlah);
            $total = $rabRequest->harga * (int) $str[0];
            $anggaran = RabModel::query()->where("id", "=", $rabRequest->rab)->sum("anggaran");

            RabModel::query()->where("id", "=", $rabRequest->rab)->update(
                [
                    "anggaran" => $anggaran + $total,
                ]
            );

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

            RabDetailModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
