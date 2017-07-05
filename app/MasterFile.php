<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterFile extends Model
{
    protected $table = 'master_file';
    protected $fillable = [
    	'nama', 'tahapan',
    ];
}
