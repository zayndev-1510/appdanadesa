<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\master\JabatanRequest;
use App\Http\Requests\master\PerangkatRequest;
use App\Http\Resources\master\JabatanResource;
use App\Models\master\JabatanModel;
use App\Models\master\PerangkatModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class Jabatanrepo
{
   /**
    * Summary of getData
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function getData()
   {
        try {
            // load data jabatan desa
            $data=JabatanResource::collection(JabatanModel::all());
            return response()->json(["message"=>"success","success"=>true,"data"=>$data],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"error","success"=>false],500);
        }
   }

   public function saveData(JabatanRequest $jabatanRequest)
   {
        try {
            // create data
            JabatanModel::create($jabatanRequest->validated());
            return response()->json(["message"=>"success","success"=>true],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
   }

   public function updateData(JabatanRequest $jabatanRequest,$id_jabatan)
   {
        try {
            // validation id jabatan is valid or not
            JabatanModel::findOrFail($id_jabatan);

            // update data
            JabatanModel::where("id",$id_jabatan)->update($jabatanRequest->validated());
            return response()->json(["message"=>"success","success"=>true],200);
        }
        catch(ModelNotFoundException $e){
            return response()->json(["message"=>"invalid ID","success"=>false],500);
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
   }

   public function deleteData($id_jabatan){
    try {

        // validation id jabatan is valid or not
        JabatanModel::findOrFail($id_jabatan);

        // delete data
        JabatanModel::where("id",$id_jabatan)->delete();
        return response()->json(["message"=>"success","success"=>true],200);
    }
    catch(ModelNotFoundException $e){
        return response()->json(["message"=>"invalid ID","success"=>false],500);
    }
    catch (\Throwable $th) {
        DB::rollBack();
        return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
    }
   }
}
