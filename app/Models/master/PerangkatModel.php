<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatModel extends Model
{
    use HasFactory;
    protected $table="perangkat_desa";
    protected $primaryKey="id";
    public $timestamps=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=[
     "id","nama_lengkap","tempat_lahir","tgl_lahir","jenis_kelamin",
     "no_sk","tgl_sk","no_handphone"
    ];
}

