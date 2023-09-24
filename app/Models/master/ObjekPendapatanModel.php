<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekPendapatanModel extends Model
{
    use HasFactory;

    protected $table = "objek_pendapatan_desa";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ["id", "id_kelompok","id_jenis","kode", "keterangan"];
}
