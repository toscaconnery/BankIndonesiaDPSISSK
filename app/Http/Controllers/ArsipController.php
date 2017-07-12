<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
use App\TabelFolder;
use Auth;
use DateTime;
use App\TabelFile;
use App\Tahun;
use Response;

class ArsipController extends Controller
{
    public function list_arsip()
    {
        $this->data['tabel_folder'] = DB::select('SELECT tf.* FROM tabel_folder tf ORDER BY tf.created_at DESC');
        return view('arsip.list-arsip', $this->data);
    	// return view('arsip.list-arsip');
    }

    public function list_arsip_tahun()
    {
        $this->data['tahun'] = DB::select('SELECT t.* FROM tahun t');
        return view('arsip.list-arsip-tahun', $this->data);
    }
    public function list_arsip_proyek($id_tahun)
    {
        $tahun = Tahun::find($id_tahun)->first()->tahun;
        $this->data['tahun'] = $tahun;
        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p, tabel_folder t WHERE t.nama = p.nama AND t.tahun = '.$tahun);
        return view('arsip.list-arsip-proyek', $this->data);
    }    

    public function save_input_folder()
    {
        $namafolder = Input::get('namafolder');
        $kategori = Input::get('kategori');
         
        $folder = new TabelFolder;
        $folder->nama = $namafolder;
        $folder->kategori = $kategori;
        if( Auth::check() ){
            $folder->pic = Auth::user()->name;
        }
        else{
            $folder->pic = "Unknown";
        }
        $folder->id_proyek = 0;
        $folder->tahun = (new DateTime)->format("Y");
        $folder->path = 'tesfolder/'.$namafolder;
        
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

    public function download_file($id)
    {
        $dataFile = TabelFile::find($id);
        $file = $dataFile->path.$dataFile->nama;
        return Response::download($file);
    }

    // public function mlbi($id, $deeppath = null)   //ini ID proyek
    // {
    //     if($deeppath){
    //         dd("this is deeppath");
    //         $this->data['']
    //     }
    //     else{
    //         dd("this is not deeppath");
    //     }
    // }
}