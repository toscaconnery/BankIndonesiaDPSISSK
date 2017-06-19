<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggaran extends Model
{
	protected $table = 'anggaran';
    protected $fillable = [
    	'tahun', 'nominal', 'pic', 
    	
    ];
}
