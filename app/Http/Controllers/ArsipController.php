<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
<<<<<<< 6b37c16fa1e500dc08aff462ef3806cc55188b13
use App\TabelFolder;
use Auth;
use DateTime;
=======
use App\TabelFile;
>>>>>>> memperbaiki file proyek

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

    public function tambah_file_sub_tahapan_proyek(Request $request)
    {
        dd("masuk");
        $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
        $proyek = Proyek::find($tahapan->id_proyek);

        $file = $request->file('berkas');
        $fileExtension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();
        $fileMime = $file->getMimeType();
        $fileName = $file->getClientOriginalName();
        $path = 'file-proyek/'.$proyek->nama.'/'.$tahapan->nama.'/'.$subTahapan->nama.'/';

        $berkas = new TabelFile;
        $berkas->nama = $fileName;
        if(Auth::check()){
            $berkas->pic = Auth::user()->name;
        }
        else {
            $berkas->pic = 'Unregistered User';
        }
        $berkas->tahun = date("Y");
        $berkas->path = $path;
        $berkas->id_sub_tahapan = $id;
        $berkas->save();

        $file->move($path, $fileName);

        return redirect('list-file-sub-tahapan/'.$id);///////

        $file = $request->file('berkas');
        $fileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();
        $fileMime = $file->getMimeType();

        $berkas = new TabelFile;
        $berkas->nama = $fileName;
        if(Auth::check()){
            $berkas->pic = Auth::user()->name;
        }
        else{
            $berkas->pic = "Unknown User";
        }
        $berkas->tahun = date("Y");
        $berkas->path = $berkas->tahun.'/';

    }
}