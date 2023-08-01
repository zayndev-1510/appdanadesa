<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;
use App\Http\Requests\admin\LoginRequest;
use App\Http\Requests\master\PerangkatRequest;
use App\Http\Resources\master\PerangkatResources;
use App\Models\master\PerangkatModel;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
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
            $resultjoin = DB::table("perangkat_desa as ps")->join("jabatan_desa as d","ps.id_jabatan","=","d.id")
            ->join("users as u","ps.id","=","u.id_pengguna")
            ->selectRaw("ps.id,ps.nama_lengkap,ps.tempat_lahir,ps.tgl_lahir,ps.jenis_kelamin,ps.id_jabatan,u.role,
            ps.no_sk,ps.tgl_sk,ps.no_handphone,ps.created_at,ps.updated_at,d.jabatan,u.username,u.password,u.email")->get();
            $data = PerangkatResources::collection($resultjoin);
            return response()->json(["message"=>"success","success"=>true,"data"=>$data],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
   }

   /**
    * Summary of saveData
    * @param \App\Http\Requests\master\PerangkatRequest $perangkatRequest
    * @return \Illuminate\Http\JsonResponse|mixed
    */
   public function saveData(PerangkatRequest $perangkatRequest):JsonResponse
   {
        try {
            // set value data perangkat desa
            $dataperangkat=$perangkatRequest->except("username","password","email","role");

            // begin transaction in database to table perangkat desa and users
            DB::beginTransaction();

            // update perangkat desa
            $userId=DB::table('perangkat_desa')->insertGetId($dataperangkat);

            // update users
            $perangkatRequest["password"]=Hash::make($perangkatRequest["password"]);
            $datauser=$perangkatRequest->only("username","password","email","role");
            $datauser["id_pengguna"]=$userId;
            $datauser["name"]=$perangkatRequest->nama_lengkap;
            DB::table("users")->insert($datauser);

            // commit query
            DB::commit();

            return response()->json(["message"=>"success","success"=>true],200);


        }catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return response()->json(["message"=>"email already exists","success"=>false],500);
            }
            return response()->json(["message"=>"error ".$e->getMessage(),"success"=>false],500);
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message"=>"error in server ","success"=>false],500);
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
            $dataperangkat=$perangkatRequest->except("username","password","email","role","password_new");

            // begin to action transaction database to update tabel perangkat desa and users
            DB::beginTransaction();

            // update perangkat desa data
            DB::table('perangkat_desa')->where("id",$id_perangkat)->update($dataperangkat);

            // check if password valid
            $confirmpass=$perangkatRequest->get("password");

            // Retrieve the user from the database based on the identifier (email or username)
            $user = User::where('email', $perangkatRequest->get("email"))->first();
            // Check if the user exists and if the provided password matches the stored hashed password

             // Check if email already exists
             $checkEmail = DB::table("users")->where("email", $perangkatRequest->email)->count("*");
             if ($checkEmail == 0) {
                 $dataUser = $perangkatRequest->only("username", "password", "email", "role");
             } else {
                 $dataUser = $perangkatRequest->only("username", "password", "role");
             }
             $dataUser["name"] = $perangkatRequest->nama_lengkap;
            if($confirmpass==$user->password){
                $dataUser = Arr::except($dataUser, ['password']);
            }else{

                    if (Hash::check($confirmpass,$user->password)) {


                    $dataUser["password"]=(!empty($perangkatRequest->get("password_new"))) ? Hash::make($perangkatRequest->get("password_new")) : $user->password;
                    } else {
                        return response()->json(["message"=>"Password lama tidak cocok","success"=>false],200);
                    }
            }

            DB::table("users")->where("id_pengguna",$id_perangkat)->update($dataUser);
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
