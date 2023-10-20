<?php

namespace App\Models\master\belanja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RabModel extends Model
{
    use HasFactory;

    protected $table="rab";
    protected $primaryKey="id";
    public $timestamps=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=["id","id_kegiatan","paket_kegiatan","kode","anggaran"];
}
