<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
use App\TabelFolder;
use Auth;
use DateTime;

class ArsipController extends Controller
{
    public function list_arsip()
    {
        $this->data['tabel_folder'] = DB::select('SELECT tf.* FROM tabel_folder tf ORDER BY tf.created_at DESC');
        return view('arsip.list-arsip', $this->data);
    	// return view('arsip.list-arsip');
    }

    public function save_input_folder()
    {
        $namafolder = Input::get('namafolder');
        $kategori = Input::get('kategori');
         
        $folder = new TabelFolder;
        $folder->nama = $namafolder;
        $folder->kategori = $kategori;
        $folder->pic = Auth::user()->name;
        $folder->id_proyek = 0;
        $folder->tahun = (new DateTime)->format("Y");
        $folder->path = 0;
        // if( Auth::check() ) {
        //  $anggaran->pic = Auth::user()->get('id');
        // }
        // else {
        //  $anggaran->pic = 0;
        // }
        if($folder->save()){
            mkdir('tesfolder/'.$namafolder);
        }
        
        return redirect('list-arsip');
    }

    public function input_arsip()
    {
    	return view('arsip.input-arsip');
    }

    public function list_file_arsip()
    {
    	return view('arsip.list-file-arsip');
    }

    public function tambah_folder_file_proyek()
    {
        dd('aha');
    }
}
