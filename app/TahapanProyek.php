<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahapanProyek extends Model
{
    protected $table = 'tahapan_proyek';

    protected $fillable = [
    	'nama', 'pic', 'tgl_mulai', 'tgl_selesai', 'tgl_real_mulai', 'tgl_real_selesai',
    ];
}