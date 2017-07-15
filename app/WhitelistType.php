<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhitelistType extends Model
{
    protected $table = 'whitelist_type';

    protected $fillable = [
    	'nama',
    ]
}
