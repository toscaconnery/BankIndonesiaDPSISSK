<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $fillable = [
    	'nama', 'pic', 'keterangan', 'tanggal_mulai', 'tanggal_selesai', 'real_tanggal_mulai', 'real_tanggal_selesai', 'status',
    ];
    
}
