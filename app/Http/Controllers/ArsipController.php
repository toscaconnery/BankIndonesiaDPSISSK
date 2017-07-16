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
use App\Proyek;
use Response;
use Alert;

class ArsipController extends Controller
{
    // public function list_arsip()
    // {
    //     $this->data['tabel_folder'] = DB::select('SELECT tf.* FROM tabel_folder tf ORDER BY tf.created_at DESC');
    //     return view('arsip.list-arsip', $this->data);
    // 	// return view('arsip.list-arsip');
    // }

    public function list_tahun_arsip()  //See all available year
    {
        $this->data['tahun'] = DB::select('SELECT t.* FROM tahun t');
        return view('arsip.list-tahun-arsip', $this->data);
    }

    public function list_arsip_proyek($id_tahun)    //See all project on certain year
    {
        //$tahun = Tahun::find($id_tahun)->first();
        $tahun = Tahun::where('id', $id_tahun)->first()->tahun;
        $this->data['tahun'] = $tahun;
        $this->data['proyek'] = DB::select('SELECT t.*, p.nama, p.pic, p.id AS id_proyek FROM proyek p, tabel_folder t WHERE t.nama = p.nama AND t.tahun = '.$tahun);
        return view('arsip.list-arsip-proyek', $this->data);
    }

    public function list_arsip_tahapan_proyek($id_folder_proyek)    //See tahapan project on certain project
    {
        $parentFolder = TabelFolder::find($id_folder_proyek)->first();
        $proyek = Proyek::find($parentFolder->id_proyek)->first();
        $this->data['namaProyek'] = $proyek->nama;
        $tahun = date("Y");
        $this->data['tahun'] = $tahun;

        $this->data['tahapan'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$proyek->id);
        return view('arsip.list-arsip-tahapan-proyek', $this->data);
    }

    public function list_arsip_file_tahapan_proyek($id_tahapan)
    {
        //
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

    public function tambah_tahun_arsip(Request $request)
    {
        $tahunBaru = $request->tahun;
        
        //Checking if the year is exist
        $adaTahun = 0;
        $cekTahun = DB::select('SELECT t.tahun FROM tahun t WHERE t.tahun = "'.$tahunBaru.'"');
        foreach($cekTahun as $data){
            $adaTahun = $adaTahun + 1;
        }
        if($adaTahun > 0 ){
            Alert::error("Tahun ".$tahunBaru." telah ada.");
            return back();
        }
        else{
            $tahun = new Tahun;
            $tahun->tahun = $tahunBaru;
            $tahun->proyek = 0;
            $tahun->non_proyek = 0;

            if($tahun->save()){
                mkdir($tahunBaru);
                Alert::success("Tahun ".$tahunBaru." berhasil ditambahkan.");
                return back();
            }
        }
    }

    public function list_file_tahun_arsip($tahun){
        $this->data['listFolderProyek'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$tahun.'/" AND t.id_proyek IS NOT NULL');
        $this->data['listFolderNonPoyek'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$tahun.'/" AND t.id_proyek IS NULL');
        return view('arsip.list-file-tahun-arsip', $this->data);
    }

    public function list_file_tahun_arsip2()
    {
        //
    }
}