<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function list_arsip()
    {
    	return view('arsip.list-arsip');
    }

    public function input_arsip()
    {
    	return view('arsip.inp-arsip');
    }

    public function list_file_arsip()
    {
    	return view('arsip.list-file-arsip');
    }
}
