<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTahapanProyek extends Model
{
    protected $table = 'sub_tahapan_proyek';
    protected $fillable = [
    	'id_tahapan', 'nama', 'pic', 'tgl_mulai', 'tgl_selesai', 'tgl_real_mulai', 'tgl_real_selesai', 'status',
    ];
}
