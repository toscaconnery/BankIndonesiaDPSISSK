<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    protected $fillable = [
    	'tanggal_pencairan', 'keterangan', 'pic', 'jenis',
    ];
}
