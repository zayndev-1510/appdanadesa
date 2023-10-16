<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\DetailRapRequest;
use App\Models\master\DetailRapModel;
use App\Models\master\RapModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DetailRapRepo
{
    public function getAll(): JsonResponse
    {
        try {
            $data = DB::table("detail_rap as dr")->
                join("rap", "rap.id", "=", 'dr.id_rap')->
                join("sumber_dana as sd", "sd.id", "=", "dr.id_sumber")->
                selectRaw("dr.id,dr.id_rap,dr.id_sumber,dr.no_urut,
                sd.jenis,dr.jumlah_satuan,dr.harga_satuan,dr.total")->get();
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                    "data" => $data
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error " . $th->getMessage(),
                "success" => false
            ]);
        }
    }

    public function save(DetailRapRequest $req): JsonResponse
    {
        try {
            DetailRapModel::query()->create($req->validated());
            $data = DB::table("detail_rap")->whereRaw("id_rap=?", [$req->id_rap])->get();
            $total = $data->sum("total");
            RapModel::query()->where("id", $req->id_rap)->update([
                "total" => $total
            ]);
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Error " . $th->getMessage(),
                "success" => false
            ]);
        }
    }

    public function update(DetailRapRequest $req, $id): JsonResponse
    {
        try {
            DetailRapModel::query()->findOrFail($id)->update($req->validated());
            $data = DB::table("detail_rap")->whereRaw("id_rap=?", [$req->id_rap])->get();
            $total = $data->sum("total");
            RapModel::query()->where("id", $req->id_rap)->update([
                "total" => $total
            ]);
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

            DB::beginTransaction();
            $data=DB::table('detail_rap')->whereRaw("id=?",[$id])->first();
            DB::table("detail_rap")->whereRaw("id=?",[$id])->delete();
            $alldata=DB::table("detail_rap")->whereRaw("id_rap=?",[$data->id_rap])->get();
            $total = $alldata->sum("total");
            DB::table("rap")->whereRaw("id=?",[$data->id_rap])->update(
                [
                    "total"=>$total
                ]
                );

            DB::commit();
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
            DB::rollBack();
            return response()->json([
                "message" => "Error ".$th->getMessage(),
                "success" => false
            ]);
        }
    }

    // more function

    public function checkNomor($id): JsonResponse
    {
        try {
            $data["sumberdana"] = DB::table("sumber_dana")->selectRaw("*")->get();
            $data["detail"] = DB::table("detail_rap as dr")->
                join("sumber_dana as sd", "sd.id", "=", "dr.id_sumber")
                ->selectRaw("dr.id,dr.id_rap,dr.id_sumber,dr.no_urut,dr.uraian,sd.jenis,dr.jumlah_satuan,dr.harga_satuan,dr.total")->
                whereRaw("id_rap=?", [$id])->get();
            return response()->json(
                [
                    "message" => "Success",
                    "success" => true,
                    "data" => $data
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
