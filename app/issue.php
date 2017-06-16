<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    protected $fillable = [
    	'judul', 'isi', 'status',
    ];
}
