<?php

namespace App\Models\master\penganggaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAnggaranModel extends Model
{
    use HasFactory;

    protected $table = "detail_anggaran_kegiatan";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        "id", "id_anggaran_kegiatan", "nama_paket",
        "nilai", "id_pola_kegiatan", "target",
        "uraian","satuan","id_sumber_dana",
        "sifat_kegiatan","lokasi_kegiatan"
    ];
}
