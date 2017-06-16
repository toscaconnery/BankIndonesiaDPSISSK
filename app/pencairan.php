<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pencairan extends Model
{
    protected $fillable = [
    	'tanggal_pencairan', 'keterangan', 'pic', 'jenis',
    ];
}
