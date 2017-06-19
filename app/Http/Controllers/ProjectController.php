<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list_proyek()
    {
    	return view('proyek.list-proyek');
    }
}
