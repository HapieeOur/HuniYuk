<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $table = "kosts";

    protected $fillable = [

        "nama_kost",
        "jumlah_kamar",
        "status_kamar",

    ];
    //
}
