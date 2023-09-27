<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapModel extends Model
{
    use HasFactory;
    protected $table = "rap";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ["id","id_objek","total"];
}
