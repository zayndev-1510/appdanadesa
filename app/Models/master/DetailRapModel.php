<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRapModel extends Model
{
    use HasFactory;
    protected $table = "detail_rap";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ["id","no_urut","uraian","total",
    "id_rap","id_sumber","jumlah_satuan","harga_satuan"];
}
