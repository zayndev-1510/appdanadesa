<?php

namespace App\Http\Resources\master;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerangkatResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "idjabatan"=>$this->id_jabatan,
            "namalengkap"=>$this->nama_lengkap,
            "tempatlahir"=>$this->tempat_lahir,
            "tgllahir"=>$this->tgl_lahir,
            "jeniskelamin"=>$this->jenis_kelamin,
            "nosk"=>$this->no_sk,
            "tglsk"=>$this->tgl_sk,
            "nohandphone"=>$this->no_handphone,
            "createat"=>$this->created_at,
            "updateat"=>$this->updated_at
        ];
    }
}
