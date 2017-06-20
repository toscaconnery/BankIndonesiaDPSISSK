<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = [
    	'nama', 'uploader', 'tanggal_upload', 'id_proyek', 'path', 'step',
    ];
}