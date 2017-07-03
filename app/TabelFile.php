<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelFile extends Model
{
    protected $table = 'tabel_file';
    protected $fillable = [
    	'nama', 'pic', 'tahun', 'path', 'id_sub_tahapan',
    ];
}
