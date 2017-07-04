<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;
use App\TahapanProyek;
use Input;
use DB;
use App\SubTahapanProyek;
use App\TabelFile;
use App\TabelFolder;
use Auth;

class ProjectController extends Controller
{
    public function list_proyek()
    {
        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p ORDER BY p.created_at DESC');
    	return view('proyek.list-proyek', $this->data);
    }

    public function save_input_proyek() //done
    {
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

        if($proyek->save()){
            $folder = new TabelFolder;
            $folder->nama = $proyek->nama;
            $folder->pic = $proyek->pic;
            $folder->kategori = "Proyek";
            $folder->id_proyek = $proyek->id;
            $folder->tahun = date("Y");
            $folder->path = $folder->tahun.'/';
            if(!is_dir($folder->tahun)){
                mkdir($folder->tahun);
            }
            mkdir($folder->tahun.'/'.$proyek->nama);
            $folder->save();

            //Membuat folder P3A dan MLBI
            $folderP = new TabelFolder;
            $folderP->nama = "P3A";
            $folderP->pic = $folder->pic;
            $folderP->kategori = "Proyek";
            $folderP->id_proyek = $folder->id_proyek;
            $folderP->tahun = $folder->tahun;
            $folderP->path = $folderP->tahun.'/'.$proyek->nama.'/';
            mkdir($folderP->tahun.'/'.$proyek->nama.'/'.'P3A');
            $folderP->save();

            $folderM = new TabelFolder;
            $folderM->nama = "MLBI";
            $folderM->pic = $folder->pic;
            $folderM->kategori = "Proyek";
            $folderM->id_proyek = $folder->id_proyek;
            $folderM->tahun = $folder->tahun;
            $folderM->path = $folderP->tahun.'/'.$proyek->nama.'/';
            mkdir($folderM->tahun.'/'.$proyek->nama.'/'.'MLBI');
            $folderM->save();

        }
        return redirect('list-proyek');
    }

    public function input_tahap_proyek($id)
    {
        $this->data['id_proyek'] = $id;
        $this->data['jenis_proyek'] = DB::select('SELECT jenis FROM proyek p WHERE id = '.$id)[0]->jenis;
        $this->data['tahapan'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$id.' ORDER BY t.created_at ASC');
        $proyek = Proyek::find($id);
        $this->data['namaProyek'] = $proyek->nama;
    	return view('proyek.input-tahap-proyek', $this->data);
    }

    public function save_input_tahap_proyek($id)
    {
        $tahap = new TahapanProyek;
        $tahap->nama = Input::get('nama');
        $tahap->pic = Input::get('pic');
        $tahap->id_proyek = Input::get('id_proyek');
        $tanggal = Input::get('tanggal');
        $text_tgl_mulai = substr($tanggal, 0 ,10);
        $text_tgl_selesai = substr($tanggal, 13, 23);
        $tgl_mulai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $tahap->tgl_mulai = $tgl_mulai;
        $tahap->tgl_selesai = $tgl_selesai;
        $tahap->status = 'Suspend';

        if($tahap->save()){
            $folder = new TabelFolder;
            $folder->nama = $tahap->nama;
            $folder->pic = $tahap->pic;
            $folder->kategori = "Proyek";
            $folder->id_proyek = $tahap->id_proyek;
            $namaProyek = Proyek::find($folder->id_proyek)->nama;
            $folder->tahun = date("Y");
            $folder->path = $folder->tahun.'/'.$namaProyek.'/'.'P3A/';
            mkdir($folder->tahun.'/'.$namaProyek.'/'.'P3A/'.$folder->nama.'/');
            $folder->save();
        }
        return redirect('input-tahap-proyek/'.$id);
    }

    public function input_sub_tahapan($id)  //ini ID tahapan
    {
        $this->data['sub'] = DB::select('SELECT s.* FROM sub_tahapan_proyek s WHERE s.id_tahapan = '.$id);
        $this->data['id_tahapan'] = $id;
        $tahapan = TahapanProyek::find($id);
        $proyek = Proyek::find($tahapan->id_proyek);
        $this->data['namaProyek'] = $proyek->nama;
        return view('proyek.input-sub-tahapan', $this->data);
    }

    public function save_input_sub_tahapan($id) //ini ID tahapan
    {
        $sub = new SubTahapanProyek;
        $sub->id_tahapan = Input::get('id_tahapan');
        $sub->nama = Input::get('nama');
        $sub->pic = Input::get('pic');
        $tanggal = Input::get('tanggal');

        $text_tgl_mulai = substr($tanggal, 0 ,10);
        $text_tgl_selesai = substr($tanggal, 13, 23);
        $tgl_mulai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $sub->tgl_mulai = $tgl_mulai;
        $sub->tgl_selesai = $tgl_selesai;
        $sub->status = 'Belum selesai';

        $tahapan = TahapanProyek::find($id);
        $proyek = Proyek::find($tahapan->id_proyek);

        if($sub->save()){
            $folder = new TabelFolder;
            $folder->nama = $sub->nama;
            $folder->pic = $sub->pic;
            $folder->kategori = "Proyek";
            $folder->id_proyek = $proyek->id;
            $namaProyek = $proyek->nama;
            $namaTahapan = $tahapan->nama;
            $folder->tahun = date("Y");
            $folder->path = $folder->tahun.'/'.$namaProyek.'/'.'P3A/'.$namaTahapan.'/';
            mkdir($folder->tahun.'/'.$namaProyek.'/'.'P3A/'.$namaTahapan.'/'.$folder->nama.'/');
            $folder->save();
        }

        return redirect('input-sub-tahapan/'.$id);
    }

    public function list_file_sub_tahapan( $id, $deeppath = null )  //ini ID sub tahapan
    { 
        if($deeppath){
            dd('ini deep path, perlu penanganan lebih lanjut');
        }
        else{
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $tahun = date("Y");
            $this->data['namaSubTahapan'] = $subTahapan->nama;
            $this->data['namaTahapan'] = $tahapan->nama;
            $this->data['namaProyek'] = $proyek->nama;
            $this->data['path'] = $tahun.'/'.$proyek->nama.'/'.'P3A/'.$tahapan->nama.'/'.$subTahapan->nama.'/';
            $this->data['fileSubTahapan'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['path'].'"');
            
            return view('proyek.list-file-sub-tahapan', $this->data);
        }
    }

    public function save_list_file_sub_tahapan (Request $request, $id, $deeppath = null )    //ini ID sub tahapan
    {
        if($deeppath){
            dd('ini deep path, perlu penanganan lebih lanjut');
        }
        else{
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $tanggal = date_create($subTahapan->tgl_mulai);
            $tahun = date_format($tanggal, 'Y');
            $file = $request->file('berkas');
            $fileExtension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $fileName = $file->getClientOriginalName();
            $path = $tahun.'/'.$proyek->nama.'/'.'P3A/'.$tahapan->nama.'/'.$subTahapan->nama.'/';

            $berkas = new TabelFile;
            $berkas->nama = $fileName;
            if(Auth::check()){
                $berkas->pic = Auth::user()->name;
            }
            else{
                $berkas->pic = "Unregistered User";
            }
            $berkas->tahun = $tahun;
            $berkas->path = $path;
            $berkas->id_sub_tahapan = $id;
            if($berkas->save()){
                $file->move($path, $fileName);
            }
            return redirect('list-file-sub-tahapan/'.$id);

        }
    }
    

    public function xtambah_file_sub_tahapan_proyek(Request $request, $id) //ini ID sub tahapan
    {
        $subTahapan = SubTahapanProyek::find($id);
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

        return redirect('list-file-sub-tahapan/'.$id);
    }
}
