<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RkdModel extends Model
{
    use HasFactory;

    protected $table = "rkd";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        "id",
        "id_bidang",
        "id_sub_bidang",
        "id_kegiatan",
        "lokasi",
        "keluaran",
        "manfaat",
        "waktu_pelaksanaan",
        "jenis_pelaksanaan"
    ];
}
