<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
	protected $table = 'pencairan';
    protected $fillable = [
    	'tanggal_pencairan', 'keterangan', 'pic', 'jenis',
    ];
}
