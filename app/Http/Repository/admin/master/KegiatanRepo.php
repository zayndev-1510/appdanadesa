<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;


use App\Http\Requests\admin\master\KegiatanRequest;
use App\Models\master\KegiatanModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;


class KegiatanRepo
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


            $groupedData = [];

            foreach ($data['sub_bidang'] as $subBidang) {
                $bidangId = $subBidang->id_bidang;

                $groupedData[$bidangId] ??= [
                    "id_bidang"=>$bidangId,
                    'bidang' => $subBidang->bidang,
                    'sub_bidangs' => []
                ];

                $groupedData[$bidangId]['sub_bidangs'][] = [
                    'id' => $subBidang->id,
                    'kode_sub_bidang' => $subBidang->kode_sub_bidang,
                    'sub_bidang' => $subBidang->sub_bidang
                ];
            }
            $data["sub_bidang"]=array_values($groupedData);
            $data["kegiatan"] = DB::table("kegiatan as k")->join("bidang as b", "b.id", "=", "k.id_bidang")
                ->join("sub_bidang as sb", "sb.id", "=", "k.id_sub_bidang")
                ->selectRaw("k.id,b.id as id_bidang,sb.id as id_sub_bidang,
                b.kode_bidang,sb.kode_sub_bidang,k.kode_kegiatan,b.keterangan as bidang,
                sb.keterangan as sub_bidang,k.keterangan as kegiatan")
                ->get();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error ".$th->getMessage(), "success" => false], 500);
        }
    }

    public function saveData(KegiatanRequest $kegiatanRequest): JsonResponse
    {
        try {
            // create data
            KegiatanModel::query()->create($kegiatanRequest->validated());
            return response()->json(["message" => "success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }

    public function updateData(KegiatanRequest $kegiatanRequest, $id): JsonResponse
    {
        try {
            // validation id jabatan is valid do it update
            KegiatanModel::query()->findOrFail($id)->update($kegiatanRequest->validated());
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
            KegiatanModel::query()->findOrFail($id)->delete();
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
