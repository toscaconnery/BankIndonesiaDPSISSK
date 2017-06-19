<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list_proyek()
    {
    	return view('proyek.list-proyek');
    }

    public function input_proyek()
    {
    	return view('proyek.inp-proyek');
    }

    public function input_tahap_proyek()
    {
    	return view('proyek.inp-thp-proyek');
    }

    public function input_detail_tahapan()
    {
    	return view('proyek.inp-detail-tahapan');
    }
}
