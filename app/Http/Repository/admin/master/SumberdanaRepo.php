<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\JabatanRequest;
use App\Http\Requests\admin\master\SumberdanaRequest;
use App\Http\Requests\admin\master\SumberdanRequest;
use App\Http\Resources\master\JabatanResource;
use App\Models\master\JabatanModel;
use App\Models\master\SumberDanaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class SumberdanaRepo
{
   /**
    * Summary of getData
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function getData() : JsonResponse
   {
        try {
            // load data jabatan desa
            $data=SumberDanaModel::query()->selectRaw("*")->get();
            return response()->json(["message"=>"success","success"=>true,"data"=>$data],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"error","success"=>false],500);
        }
   }

   /**
    * Summary of saveData
    * @param \App\Http\Requests\admin\master\SumberdanaRequest $sumberdanaRequest
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function saveData(SumberdanaRequest $sumberdanaRequest) : JsonResponse
   {
        try {
            // create data
            SumberDanaModel::query()->create($sumberdanaRequest->validated());
            return response()->json(["message"=>"success","success"=>true],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
   }

   /**
    * Summary of updateData
    * @param \App\Http\Requests\admin\master\SumberdanaRequest $sumberdanaRequest
    * @param mixed $id_sumber
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function updateData(SumberdanaRequest $sumberdanaRequest,$id_sumber) : JsonResponse
   {
        try {
            // validation id  is valid or not
            SumberDanaModel::query()->findOrFail($id_sumber);

            // update data
            SumberDanaModel::query()->whereRaw("id=?",[$id_sumber])->update($sumberdanaRequest->validated());

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

   /**
    * Summary of deleteData
    * @param mixed $id_sumber
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function deleteData($id_sumber) : JsonResponse{
    try {

        SumberDanaModel::query()->findOrFail($id_sumber);
        // delete data
        SumberDanaModel::query()->whereRaw("id = ?",[$id_sumber])->delete();

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
