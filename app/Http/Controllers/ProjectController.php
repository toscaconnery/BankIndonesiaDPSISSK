<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;
use Input;

class ProjectController extends Controller
{
    public function list_proyek()
    {
    	return view('proyek.list-proyek');
    }

    // public function input_proyek()
    // {
    // 	return view('proyek.input-proyek');
    // }

    public function save_input_proyek()
    {
        //06/21/2017 - 03/03/2018
        // dd(Input::get());
        //'nama', 'kodema', 'kategori', 'pic', 'status', 'jenis', 'tgl_mulai', 'tgl_selesai', 'tgl_real_mulai', 'tgl_real_selesai',
        $proyek = new Proyek;
        $proyek->nama = Input::get('nama');
        $proyek->kodema = Input::get('kodema');
        $proyek->kategori = Input::get('kategori');
        $proyek->pic = Input::get('pic');
        $proyek->status = Input::get('status');
        $proyek->jenis = Input::get('jenis');
        $tanggal = Input::get('tanggal');
        
        $text_tgl_mulai = substr($tanggal, 0 ,10);
        $text_tgl_selesai = substr($tanggal, 13, 23);
        $tgl_mulai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $proyek->tgl_mulai = $tgl_mulai;
        $proyek->tgl_selesai = $tgl_selesai;

        $proyek->status = "Not started";

        $proyek->save();
        return redirect('list-proyek');

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
