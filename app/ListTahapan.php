<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTahapan extends Model
{
    protected $table = 'list_tahapan';
    protected $fillable = [
    	'nama', 'nilai', 'jenis',
    ];
}