<?php

/**
 * Summary of namespace App\Http\Repository\admin\master
 */
namespace App\Http\Repository\admin\master;

use App\Http\Requests\admin\master\SettingRequest;
use App\Models\master\SettingModel;
use Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PengaturanRepo
{
    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getData()
    {
        try {
            // load data jabatan desa
            $data["user"] = DB::table("users")->whereRaw("role=?", ["admin"])->selectRaw("*")->first();
            $data["pengaturan"] = DB::table("pengaturan")->selectRaw("*")->first();
            return response()->json(["message" => "success", "success" => true, "data" => $data], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "error", "success" => false], 500);
        }
    }


    public function updateData(Request $req)
    {
        try {
            // validation id jabatan is valid or not
            $data = json_decode($req->data);

            $checkdata = SettingModel::query()->findOrFail($data->id);
            $filenamelogin = $req->hasFile("fotologin") ? time() . "_" . $req->file("fotologin")->extension() : null;
            $filenamerel = $req->hasFile("fotorel") ? time() . "_" . $req->file("fotorel")->extension() : null;
            if ($filenamelogin !== null) {
                $req->file("fotologin")->move(public_path("uploads"), $filenamelogin);
            } else {
                $filenamelogin = $checkdata->logo_login;
            }
            if ($filenamerel !== null) {
                $req->file("fotorel")->move(public_path("uploads"), $filenamerel);
            } else {
                $filenamerel = $checkdata->logo_rel;
            }

            $updatesetting = [
                "logo_login" => $filenamelogin,
                "logo_rel" => $filenamelogin,
                "judul_aplikasi" => $data->judul_aplikasi
            ];
            $checkdata->update($updatesetting);
            $updateuser = [
                "username" => $data->username,
                "password" => Hash::make($data->password)
            ];
            if ($updateuser["password"] === "") {
                unset($updateuser["password"]);
            }
            DB::table("users")->whereRaw("id=?", [$data->id_user])->update($updateuser);
            return response()->json(["message" => "success", "success" => true], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "invalid ID", "success" => false], 500);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false], 500);
        }
    }
}
