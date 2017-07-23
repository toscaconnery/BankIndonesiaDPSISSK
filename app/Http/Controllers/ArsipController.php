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
use File;

class ArsipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   

    public function list_tahun_arsip()  //See all available year
    {
        $this->data['tahun'] = DB::select('SELECT t.* FROM tahun t');
        return view('arsip.list-tahun-arsip', $this->data);
    }

    public function list_arsip_tahapan_proyek($id_folder_proyek)    //See tahapan project on certain project
    {
        $parentFolder = TabelFolder::find($id_folder_proyek);
        $proyek = Proyek::find($parentFolder->id_proyek);
        $this->data['namaProyek'] = $proyek->nama;
        $tahun = date("Y");
        $this->data['tahun'] = $tahun;

        $this->data['tahapan'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$proyek->id);
        return view('arsip.list-arsip-tahapan-proyek', $this->data);
    }

    public function list_arsip_file_tahapan_proyek($id_tahapan)
    {
        //menampilkan semua file dan folder normal dalam proyek
    }
    public function panggilbreadcrumb($id_folder)
    {
        $aha = $this->breadcrumb($id_folder);
        dd($aha);
    }

    public function breadcrumb($id_folder, $list = null)
    {
        if(is_null($list)){
            $list = array();
        }

        $parentFolder = TabelFolder::find($id_folder);

        $folderUp = DB::select('SELECT t.* FROM tabel_folder t WHERE CONCAT(t.path,t.nama,"/") = "'.$parentFolder->path.'" LIMIT 1');

        if(empty($folderUp)){
            return $list;
        }
        else{
            $jumlahPath = count($list);
            if($jumlahPath > 0){
                $oldlist = $list;
                $list[$jumlahPath]['nama'] = null;
                $list[$jumlahPath]['path'] = null;
                $list[$jumlahPath]['id'] = null;
                
                for($x = $jumlahPath; $x > 0; $x--){
                    $list[$x]['nama'] = $list[$x-1]['nama'];
                    $list[$x]['path'] = $list[$x-1]['path'];
                    $list[$x]['id'] = $list[$x-1]['id'];
                }
                
                $list[0]['nama'] = $folderUp[0]->nama;
                $list[0]['path'] = $folderUp[0]->path;
                $list[0]['id'] = $folderUp[0]->id;
            } 
            elseif($jumlahPath == 0){
                $list[0]['nama'] = $folderUp[0]->nama;
                $list[0]['path'] = $folderUp[0]->path;
                $list[0]['id'] = $folderUp[0]->id;
            }
            $list = $this->breadcrumb($folderUp[0]->id, $list);
        }
        return $list;
    }

    public function download_file($id)
    {
        $dataFile = TabelFile::find($id);
        $file = $dataFile->path.$dataFile->nama;
        return Response::download($file);
    }

    public function delete_file_arsip($id_file)
    {
        $file = TabelFile::find($id_file);
        if(File::exists($file->path.$file->nama)){
            File::delete($file->path.$file->nama);
            $file->delete();
            Alert::success("File telah terhapus.");
            return back();
        }
        else{
            Alert::error("File tidak tersedia!");
            return back();
        }
            
    }

    public function delete_folder_arsip($id_folder)
    {
        $adaChildFolder = 0;
        
        $parentFolder = TabelFolder::find($id_folder);

        //deleting file in parent folder
        $isiFile = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$parentFolder->path.$parentFolder->nama.'/"');
        foreach($isiFile as $data){
            $this->delete_file_arsip($data->id);
        }
        
        //deleting child folder
        $isiFolder = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$parentFolder->path.$parentFolder->nama.'/"');
        foreach($isiFolder as $data){
            $this->delete_folder_arsip($data->id);
        }

        //deleting parent folder
        rmdir($parentFolder->path.$parentFolder->nama.'/');
        $parentFolder->delete();
        return back();
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
        $this->data['tahun'] = $tahun;
        $this->data['listFolderProyek'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$tahun.'/" AND t.id_proyek IS NOT NULL');
        $this->data['listFolderNonProyek'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$tahun.'/" AND t.id_proyek IS NULL');
        return view('arsip.list-file-tahun-arsip', $this->data);
    }

    public function tambah_folder_dalam_tahun(Request $request, $tahun)
    {
        $folder = new TabelFolder;
        $folder->nama = $request->namaFolder;
        if(Auth::check()){
            $folder->pic = Auth::user()->name;
        }
        else{
            $folder->pic = "Unregistered User";
        }
        $folder->kategori = "Non Proyek";
        $folder->tahun = $tahun;
        $folder->path = $tahun."/";
        if($folder->save()){
            $tahun = Tahun::where('tahun', $folder->tahun)->first();
            $tahun->non_proyek = $tahun->non_proyek + 1;
            $tahun->save();
            mkdir($folder->path.$folder->nama);
            Alert::success("Folder telah ditambahkan.");
            return back();
        }
        else{
            Alert::error("Gagal!");
            return back();
        }
    }

    public function list_file_arsip($id_folder)
    {
        $this->data['parentFolder'] = TabelFolder::find($id_folder);
        $this->data['tahun'] = $this->data['parentFolder']->tahun;
        $this->data['childFolder'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$this->data['parentFolder']->path.$this->data['parentFolder']->nama.'/"');
        $this->data['listFile'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['parentFolder']->path.$this->data['parentFolder']->nama.'/"');
        $this->data['breadcrumb'] = $this->breadcrumb($id_folder);
        return view('arsip.list-file-arsip', $this->data);
    }

    public function tambah_folder_arsip(Request $request, $id_folder)
    {
        $parentFolder = TabelFolder::find($id_folder);
        $newFolder = new TabelFolder;
        $newFolder->nama = $request->namaFolder;
        if(Auth::check()){
            $newFolder->pic = Auth::user()->name;
        }
        else{
            $newFolder->pic = "Unregistered User";
        }
        $newFolder->kategori = "Non Proyek";
        $newFolder->tahun = $parentFolder->tahun;
        $newFolder->path = $parentFolder->path.$parentFolder->nama.'/';
        // if($newFolder->save()){
        //     mkdir($newFolder->path.$newFolder->nama);
        //     Alert::success("Folder telah ditambahkan.");
        //     return back();
        // }
        if(!File::exists($newFolder->path.$newFolder->nama)){
            if($newFolder->save()){
                mkdir($newFolder->path.$newFolder->nama);
                Alert::success("Folder berhasil ditambahkan.");
                return back();
            }
            else{
                Alert::error("Folder gagal disimpan!");
                return back();
            }
        }
        else{
            Alert::error("Folder sudah ada!");
            return back();
        }
    }

    public function upload_file_arsip(Request $request, $id_folder)
    {
        $folderParent = TabelFolder::find($id_folder);
        $file = $request->file('berkas');
        $fileExtension = $file->getClientOriginalExtension();
        $diizinkan = $this->cek_tipe_file($fileExtension);
        if($diizinkan > 0){
            $berkas = new TabelFile;
            $berkas->nama = $file->getClientOriginalName();
            if(Auth::check()){
                $berkas->pic = Auth::user()->name;
            }
            else{
                $berkas->pic = "Unregistered User";
            }
            $berkas->tahun = $request->tahun;
            $berkas->path = $folderParent->path.$folderParent->nama.'/';
            if($berkas->save()){
                $file->move($berkas->path, $berkas->nama);
                Alert::success('File tersimpan.');
                return back();
            }
        }
        else{
            Alert::error('File .'.$fileExtension.' tidak diizinkan!');
            return back();
        }
    }

    public function cek_tipe_file($tipe)
    {
        $diizinkan = 0;
        $cek = DB::select('SELECT w.nama FROM whitelist_type w WHERE w.nama = "'.$tipe.'"');
        foreach($cek as $data){
            $diizinkan = $diizinkan + 1;
        }
        return $diizinkan;
    }

    // public function list_arsip()
    // {
    //     $this->data['tabel_folder'] = DB::select('SELECT tf.* FROM tabel_folder tf ORDER BY tf.created_at DESC');
    //     return view('arsip.list-arsip', $this->data);
    //  // return view('arsip.list-arsip');
    // }

    // public function list_arsip_proyek($id_tahun)    //See all project on certain year
    // {
    //     //$tahun = Tahun::find($id_tahun)->first();
    //     $tahun = Tahun::where('id', $id_tahun)->first()->tahun;
    //     $this->data['tahun'] = $tahun;
    //     $this->data['proyek'] = DB::select('SELECT t.*, p.nama, p.pic, p.id AS id_proyek FROM proyek p, tabel_folder t WHERE t.nama = p.nama AND t.tahun = '.$tahun);
    //     return view('arsip.list-arsip-proyek', $this->data);
    // }

    // public function save_input_folder()
    // {
    //     $namafolder = Input::get('namafolder');
    //     $kategori = Input::get('kategori');
         
    //     $folder = new TabelFolder;
    //     $folder->nama = $namafolder;
    //     $folder->kategori = $kategori;
    //     if( Auth::check() ){
    //         $folder->pic = Auth::user()->name;
    //     }
    //     else{
    //         $folder->pic = "Unknown";
    //     }
    //     $folder->id_proyek = 0;
    //     $folder->tahun = (new DateTime)->format("Y");
    //     $folder->path = 'tesfolder/'.$namafolder;
        
    //     if($folder->save()){
    //         mkdir('tesfolder/'.$namafolder);
    //     }
        
    //     return redirect('list-arsip');
    // }

    // public function input_arsip()
    // {
    //  return view('arsip.input-arsip');
    // }

    // public function list_file_arsip()
    // {
    //  return view('arsip.list-file-arsip');
    // }
}