<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\ProfildesaRequest;
use App\Models\master\ProfilDesaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProfilDesaRepo
{
    /**
     * Summary of getProfilDesa
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfilDesa():JsonResponse{

        // get data profil desa
        $data=DB::table("profil_desa as pd")->join("perangkat_desa as pr","pr.id","=","pd.id_pengisi")
        ->join("jabatan_desa as jb","jb.id","=","pr.id_jabatan")
        ->selectRaw("pd.id,pr.id as idperangkat,jb.id as idjabatan,pd.provinsi,pd.kecamatan,pd.kabupaten,pd.desa,pr.nama_lengkap as nama,jb.jabatan")->first();

        // get data perangkat
        $perangkat=DB::table("perangkat_desa as pd")->selectRaw("pd.id,pd.nama_lengkap")->get();

        // merge perangkat
        $data->perangkat=$perangkat;
        return response()->json(["message"=>"Success","success"=>true,"data"=>$data]);
    }

    public function updateProfilDesa(ProfildesaRequest $profildesaRequest,$id):JsonResponse{
        try {
                ProfilDesaModel::query()->findOrFail($id,["id"]);
                $data=ProfilDesaModel::query()->whereRaw("id=?",[$id])->update($profildesaRequest->validated());
                return response()->json(
                    [
                        "message"=>"Success",
                        "success"=>true,
                    ],200
                );
        } catch(ModelNotFoundException $e){
            return response()->json(
                [
                    "message"=>"Invalid ID",
                    "success"=>false
                ],500
            );
        }
        catch (\Throwable $th) {
            return response()->json(
                [
                    "message"=>"Error in server ".$th->getMessage(),
                    "success"=>false
                ],500
            );
        }
    }
}
