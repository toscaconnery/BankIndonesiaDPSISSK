<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;
use App\TahapanProyek;
use Input;
use DB;
use App\SubTahapanProyek;

class ProjectController extends Controller
{
    public function list_proyek()
    {
        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p ORDER BY p.created_at DESC');
    	return view('proyek.list-proyek', $this->data);
    }

    // public function input_proyek()
    // {
    // 	return view('proyek.input-proyek');
    // }

    public function save_input_proyek()
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

        $proyek->save();
        return redirect('list-proyek');
    }

    public function input_tahap_proyek($id)
    {
        $this->data['id_proyek'] = $id;
        $this->data['jenis_proyek'] = DB::select('SELECT jenis FROM proyek p WHERE id = '.$id)[0]->jenis;
        $this->data['tahapan'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$id.' ORDER BY t.created_at ASC');
    	return view('proyek.input-tahap-proyek', $this->data);
    }

    public function save_input_tahap_proyek($id)
    {
        //dd('data tahap proyek akan disave ');
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
        $tahap->status = 'Not started';
        $tahap->save();
        return redirect('input-tahap-proyek/'.$id);
    }

    // public function input_detail_tahapan()
    // {
    // 	return view('proyek.inp-detail-tahapan');
    // }

    public function input_sub_tahapan($id)
    {
        $this->data['sub'] = DB::select('SELECT s.* FROM sub_tahapan_proyek s WHERE s.id_tahapan = '.$id);
        $this->data['id_tahapan'] = $id;
        return view('proyek.input-sub-tahapan', $this->data);
    }

    public function save_input_sub_tahapan($id)
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
        $sub->save();
        return redirect('input-sub-tahapan/'.$id);
    }

    public function list_file_sub_tahapan($id)
    {
        $subTahapan = SubTahapanProyek::find($id);
        $this->data['namaSubTahapan'] = $subTahapan->nama;
        //dd($this->data['namaSubTahapan']);
        return view('proyek.list-file-sub-tahapan', $this->data);
    }
}
