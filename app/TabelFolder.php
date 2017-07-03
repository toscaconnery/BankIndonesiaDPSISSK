<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelFolder extends Model
{
    protected $table = 'tabel_folder';
    protected $fillable = [
    	'nama', 'pic', 'kategori', 'id_proyek', 'tahun', 'path',
    ];
}
