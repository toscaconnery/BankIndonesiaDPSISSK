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
    	return view('proyek.input-proyek');
    }

    public function input_tahap_proyek()
    {
    	return view('proyek.input-tahap-proyek');
    }

    // public function input_detail_tahapan()
    // {
    // 	return view('proyek.inp-detail-tahapan');
    // }

    public function input_sub_tahapan()
    {
        return view('proyek.input-sub-tahapan');
    }
}
