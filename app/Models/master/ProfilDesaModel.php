<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesaModel extends Model
{
    use HasFactory;

    protected $table="profil_desa";
    protected $primaryKey="id";
    public $timestamps=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=["id","provinsi","kecamatan","kabupaten","desa","id_pengisi","foto"];
}
