<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
	protected $table = 'issue';
	
    protected $fillable = [
    	'judul', 'isi', 'status', 'pic', 'tindak_lanjut', 'pic_tindak_lanjut',
    ];
}
