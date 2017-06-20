<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenangananIssue extends Model
{
    protected $table = 'penanganan_issue';

    protected $fillable = [
    	'pic', 'isi',
    ]
}