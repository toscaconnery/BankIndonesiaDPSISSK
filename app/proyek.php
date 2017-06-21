<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
	protected $table = 'proyek';
    protected $fillable = [
    	'nama', 'kodema', 'kategori', 'pic', 'status', 'jenis', 'tgl_mulai', 'tgl_selesai', 'tgl_real_mulai', 'tgl_real_selesai',
    ];
    
}