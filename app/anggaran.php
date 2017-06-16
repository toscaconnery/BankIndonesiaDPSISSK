<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggaran extends Model
{
    protected $fillable = [
    	'tahun', 'nominal', 'pic', 'ri', 'op', 'used_ri', 'used_op',
    	
    ];
}
