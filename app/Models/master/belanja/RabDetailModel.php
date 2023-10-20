<?php

namespace App\Models\master\belanja;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RabDetailModel extends Model
{
    use HasFactory;

    protected $table = "rab_rinci";
    protected $primaryKey = "id";
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        "id", "nomor_urut", "rab", "uraian",
        "jumlah", "harga", "sumber_dana"];

}
