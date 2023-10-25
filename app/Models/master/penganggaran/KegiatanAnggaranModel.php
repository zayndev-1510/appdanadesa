<?php

namespace App\Models\master\penganggaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanAnggaranModel extends Model
{
    use HasFactory;

    protected $table = "anggaran_kegiatan";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ["id", "id_kegiatan", "lokasi", "waktu", "id_perangkat_desa",
        "keluaran", "volume", "pagu","tahun_anggaran"];
}
