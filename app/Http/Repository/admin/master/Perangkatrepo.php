<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;
use App\Http\Requests\admin\LoginRequest;
use App\Http\Requests\master\PerangkatRequest;
use App\Http\Resources\master\PerangkatResources;
use App\Models\master\PerangkatModel;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Summary of Class Perangkatrepo
 * feature for crud data
 * author by zayn
 */
class Perangkatrepo
{
   /**
    * Summary of getData
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function getData()
   {
        try {
            // load data perangkat desa
            $data=PerangkatResources::collection(PerangkatModel::all());
            return response()->json(["message"=>"success","success"=>true,"data"=>$data],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"error","success"=>false],500);
        }
   }

   /**
    * Summary of saveData
    * @param \App\Http\Requests\master\PerangkatRequest $perangkatRequest
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function saveData(PerangkatRequest $perangkatRequest)
   {
        try {
            // set value data perangkat desa
            $dataperangkat=$perangkatRequest->except("username","password","email","role");

            // begin transaction in database to table perangkat desa and users
            DB::beginTransaction();

            // update perangkat desa
            $userId=DB::table('perangkat_desa')->insertGetId($dataperangkat);

            // update users
            $datauser=$perangkatRequest->only("username","password","email","role");
            $datauser["id_pengguna"]=$userId;
            $datauser["name"]=$perangkatRequest->nama_lengkap;
            DB::table("users")->insert($datauser);

            // commit query
            DB::commit();

            return response()->json(["message"=>"success","success"=>true],200);

        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
   }

   /**
    * Summary of updateData
    * @param \App\Http\Requests\master\PerangkatRequest $perangkatRequest
    * @param mixed $id_perangkat
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function updateData(PerangkatRequest $perangkatRequest,$id_perangkat)
   {
        try {

            // validation id perangkat is valid or not
            PerangkatModel::findOrFail($id_perangkat);
            // set value array data perangkat desa
            $dataperangkat=$perangkatRequest->except("username","password","email","role");

            // begin to action transaction database to update tabel perangkat desa and users
            DB::beginTransaction();

            // update perangkat desa data
            DB::table('perangkat_desa')->where("id",$id_perangkat)->update($dataperangkat);

            // checkemail already exist
            $checkemail=DB::table("users")->where("email",$perangkatRequest->email)->count("*");
            if($checkemail==0) $datauser=$perangkatRequest->only("username","password","email","role");
            else $datauser=$perangkatRequest->only("username","password","role");
            $datauser["name"]=$perangkatRequest->nama_lengkap;

            // update users
            DB::table("users")->where("id_pengguna",$id_perangkat)->update($datauser);

            // commit query
            DB::commit();

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
    * @param mixed $id_perangkat
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function deleteData($id_perangkat){
    try {

        // validation id perangkat is valid or not
        PerangkatModel::findOrFail($id_perangkat);

        // begin to action transaction database to update tabel perangkat desa and users
        DB::beginTransaction();

        // update perangkat desa data
        DB::table('perangkat_desa')->delete($id_perangkat);

        // checkemail already exist

        // update users
        DB::table("users")->where("id_pengguna",$id_perangkat)->delete();

        // commit query
        DB::commit();

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
