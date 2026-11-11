<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $primaryKey = 'kost_id';
    protected $table = "kosts";

    protected $fillable = [

        "nama_kost",
        "jumlah_kamar",
        "status_kamar",

    ];


    protected function casts(): array
    {
        return [
            'jumlah_kamar' => 'integer',
        ];
    }
    //
}
