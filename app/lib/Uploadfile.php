<?php

namespace App\lib;
use App\Http\Requests\mahasiswa\BerkasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Psy\Readline\Hoa\FileException;

class Uploadfile{


    public static function upload_foto_mahasiswa($request,$nim_mhs){

        $path_file="mahasiswa/".$nim_mhs."/";
        $upload_path=public_path($path_file);

        if(!File::isDirectory($upload_path)){
            File::makeDirectory($upload_path,0755,true,true);
        }

        $foto=$request;
        $explode = explode('.', $foto->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $foto->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $foto->getClientMimeType();
        $filesize = $foto->getSize();

        if ($foto->move($upload_path, $rename)) return['val' => 1,'message' => "Upload image berhasil",'data' => $rename];
        return['val' => 0,'message' =>"Upload File Error"];
    }

    public static function upload_foto_calon_kkn_mhs(BerkasRequest $berkasRequest,$nim_mhs){

        $path_file="mahasiswa/calonkkn/foto/".$nim_mhs."/";
        $upload_path=public_path($path_file);

        if(!File::isDirectory($upload_path)){
            File::makeDirectory($upload_path,0755,true,true);
        }

        $foto=$berkasRequest;
        $explode = explode('.', $foto->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $foto->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $foto->getClientMimeType();
        $filesize = $foto->getSize();

        if ($foto->move($upload_path, $rename)) return['val' => 1,'message' => "Upload image berhasil",'data' => $rename];
        return['val' => 0,'message' =>"Upload File Error"];
    }

    public static function upload_berkas_calon_kkn(Request $request){

    $nim_mhs=$request->nim;
    $tipe=$request->tipe;
    $path_file="calonkkn/".$tipe."/".$nim_mhs."/";
        $upload_path=public_path($path_file);

        if(!File::isDirectory($upload_path)){
            File::makeDirectory($upload_path,0755,true,true);
        }

        $file=$request->file("files");
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $rename = 'file_' . date('YmdHis') . '.' . $extension;
        $mime = $file->getClientMimeType();
        $filesize = $file->getSize();

        if ($file->move($upload_path, $rename)) return['success' =>true,'message' => "Upload image berhasil",'data' => $rename];
        return['success' => false,'message' =>"Upload File Error","data"=>""];
    }


    public static function upload_surat_izin_ortu(BerkasRequest $berkasRequest,$nim_mhs){

        $path_file="mahasiswa/calonkkn/orangtua/".$nim_mhs."/";
            $upload_path=public_path($path_file);

            if(!File::isDirectory($upload_path)){
                File::makeDirectory($upload_path,0755,true,true);
            }

            $foto=$berkasRequest;
            $explode = explode('.', $foto->getClientOriginalName());
            $originalName = $explode[0];
            $extension = $foto->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $mime = $foto->getClientMimeType();
            $filesize = $foto->getSize();

            if ($foto->move($upload_path, $rename)) return['val' => 1,'message' => "Upload image berhasil",'data' => $rename];
            return['val' => 0,'message' =>"Upload File Error"];
        }

        public static function upload_sertifikat_vaksin(BerkasRequest $berkasRequest,$nim_mhs){

                $path_file="mahasiswa/calonkkn/vaksi/".$nim_mhs."/";
                $upload_path=public_path($path_file);

                if(!File::isDirectory($upload_path)){
                    File::makeDirectory($upload_path,0755,true,true);
                }
                $foto=$berkasRequest;
                $explode = explode('.', $foto->getClientOriginalName());
                $originalName = $explode[0];
                $extension = $foto->getClientOriginalExtension();
                $rename = 'file_' . date('YmdHis') . '.' . $extension;
                $mime = $foto->getClientMimeType();
                $filesize = $foto->getSize();

                if ($foto->move($upload_path, $rename)) return['val' => 1,'message' => "Upload image berhasil",'data' => $rename];
                return['val' => 0,'message' =>"Upload File Error"];
        }

        public static function upload_thumbnail($request){

            $path_file="berita/";
            $upload_path=public_path($path_file);

            if(!File::isDirectory($upload_path)){
                File::makeDirectory($upload_path,0755,true,true);
            }
            $foto=$request->file("file");
            $explode = explode('.', $foto->getClientOriginalName());
            $originalName = $explode[0];
            $extension = $foto->getClientOriginalExtension();
            $check_extension=self::check_extension_file($extension);
            if($check_extension){
                return ["message"=>"File Tidak Support","success"=>false];
            }
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $mime = $foto->getClientMimeType();
            $filesize = $foto->getSize();
            if ($foto->move($upload_path, $rename)) return["success"=>true,'message' => "Upload image berhasil",'data' => $rename];
            return['val' => 0,'message' =>"Upload File Error"];
    }

    private static function check_extension_file($extension){
        if($extension=='png' || $extension=='jpg') return false;
        return true;
    }

}

