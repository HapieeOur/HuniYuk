<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKost extends Model
{

    protected $table = 'kategori_kost';

    protected $fillable = [

        'kategori_id',
        'kost_id'

    ];
    //
}
