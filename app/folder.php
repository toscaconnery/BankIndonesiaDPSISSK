<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
	protected $table = 'tabel_folder';
    protected $fillable = [
    	'nama', 'kategori',    	
    ];
}
