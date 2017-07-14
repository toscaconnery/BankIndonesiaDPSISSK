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
use App\KelengkapanProyek;
use App\Tahun;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function list_proyek()
    {
        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p ORDER BY p.created_at DESC');
        $this->data['modalProyek'] = $this->data['proyek'];
        $kelengkapanProyek = DB::select('SELECT k.*, p.nama, p.jenis FROM kelengkapan_proyek k, proyek p WHERE p.id = k.id_proyek ORDER BY k.created_at DESC');
        $pic = DB::select('SELECT t.pic, t.nama, t.id_proyek FROM tahapan_proyek t');
        //dd($pic);
        $this->data['kelengkapanProyek'] = array();
        foreach($kelengkapanProyek as $data){
            $this->data['kelengkapanProyek'][$data->id_proyek]['nama'] = $data->nama;
            $this->data['kelengkapanProyek'][$data->id_proyek]['id'] = $data->id;
            $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['disain'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['pengembangan'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['implementasi'] = 0;

            //Inisiasi PIC
            $this->data['kelengkapanProyek'][$data->id_proyek]['picPengajuan'] = "-";
            $this->data['kelengkapanProyek'][$data->id_proyek]['picDisain'] = "-";
            $this->data['kelengkapanProyek'][$data->id_proyek]['picPengembangan'] = "-";
            $this->data['kelengkapanProyek'][$data->id_proyek]['picPengujian'] = "-";
            $this->data['kelengkapanProyek'][$data->id_proyek]['picSiapImplementasi'] = "-";
            $this->data['kelengkapanProyek'][$data->id_proyek]['picImplementasi'] = "-";

            //Menghitung tahap pengajuan
            if($data->spesifikasi_kebutuhan == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan']++;
            }
            if($data->use_case_effort_estimation == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan']++;
            }
            if($data->solusi_si == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan']++;
            }
            if($data->proposal == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan']++;
            }
            if($data->jadwal == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan']++;
            }

            //Menghitung tahap disain
            if($data->fnds == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['disain']++;
            }
            if($data->disain_rinci == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['disain']++;
            }
            if($data->traceability_matrix == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['disain']++;
            }

            //Menghitung tahap pengembangan
            if($data->dokumentasi_program == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengembangan']++;
            }
            if($data->paket_unit_test == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengembangan']++;
            }
            if($data->laporan_unit_test == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengembangan']++;
            }
            

            //Menghitung tahap pengujian
            if($data->rencana_sit == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            if($data->paket_sit == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            if($data->laporan_sit == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            if($data->paket_test_uat == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            if($data->rencana_uat == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            if($data->ba_uat == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            if($data->laporan_uat == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian']++;
            }
            
            //Menghitung tahap siap implementasi
            if($data->juknis_instalasi == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi']++;
            }
            if($data->juknis_operasional == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi']++;
            }
            if($data->rencana_deployment == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi']++;
            }
            if($data->ba_migrasi_data == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi']++;
            }
            if($data->ba_serah_terima_operasional == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi']++;
            }
            if($data->ba_serah_terima_psi == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi']++;
            }

            //Menghitung tahap implementasi
            if($data->rencana_implementasi == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['implementasi']++;
            }
            if($data->juknis_aplikasi == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['implementasi']++;
            }
            if($data->ba_implementasi == 'Done'){
                $this->data['kelengkapanProyek'][$data->id_proyek]['implementasi']++;
            }
            
            $this->data['kelengkapanProyek'][$data->id]['persenPengajuan'] = ($this->data['kelengkapanProyek'][$data->id]['pengajuan']/5) * 100;
            if($data->jenis == 'Outsource'){
                $this->data['kelengkapanProyek'][$data->id]['persenDisain'] = ($this->data['kelengkapanProyek'][$data->id]['disain']/3) * 100;
            }
            elseif($data->jenis == 'Inhouse'){
                $this->data['kelengkapanProyek'][$data->id]['persenDisain'] = ($this->data['kelengkapanProyek'][$data->id]['disain']/2) * 100;
            }
            $this->data['kelengkapanProyek'][$data->id]['persenPengembangan'] = ($this->data['kelengkapanProyek'][$data->id]['pengembangan']/3) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenPengujian'] = ($this->data['kelengkapanProyek'][$data->id]['pengujian']/7) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenSiapImplementasi'] = ($this->data['kelengkapanProyek'][$data->id]['siapImplementasi']/6) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenImplementasi'] = ($this->data['kelengkapanProyek'][$data->id]['implementasi']/3) * 100;
        }

        foreach($pic as $pic){
            if($pic->nama == 'Pengajuan'){
                $this->data['kelengkapanProyek'][$pic->id_proyek]['picPengajuan'] = $pic->pic;
            }
            elseif($pic->nama == 'Disain'){
                $this->data['kelengkapanProyek'][$pic->id_proyek]['picDisain'] = $pic->pic;
            }
            elseif($pic->nama == 'Pengembangan'){
                $this->data['kelengkapanProyek'][$pic->id_proyek]['picPengembangan'] = $pic->pic;
            }
            elseif($pic->nama == 'Pengujian'){
                $this->data['kelengkapanProyek'][$pic->id_proyek]['picPengujian'] = $pic->pic;
            }
            elseif($pic->nama == 'Siap Implementasi'){
                $this->data['kelengkapanProyek'][$pic->id_proyek]['picSiapImplementasi'] = $pic->pic;
            }
            elseif($pic->nama == 'Implementasi'){
                $this->data['kelengkapanProyek'][$pic->id_proyek]['picImplementasi'] = $pic->pic;
            }
        }
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
        $tgl_mulai = date_create_from_format("m/d/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("m/d/Y", $text_tgl_selesai);
        $proyek->tgl_mulai = $tgl_mulai;
        $proyek->tgl_selesai = $tgl_selesai;
        $tahun = $proyek->tgl_mulai->format("Y");
        $proyek->status = "Pending";

        $proyek->save();

        //Mempersiapkan kelengkapan file proyek
        $kelengkapan = new KelengkapanProyek;
        $kelengkapan->id_proyek = $proyek->id;
        $kelengkapan->save();

        return redirect('list-proyek');
    }

    public function mulai_proyek($id_proyek)
    {
        $proyek = Proyek::find($id_proyek);
        $proyek->status = "On Progress";
        $proyek->tgl_real_mulai = date("Y-m-d");
        $proyek->save();

        $this->buat_folder_proyek($id_proyek);
        
        return redirect('list-proyek');
    }

    public function input_tahap_proyek($id)     //ini ID proyek
    {
        $this->data['id_proyek'] = $id;
        $this->data['jenisProyek'] = DB::select('SELECT jenis FROM proyek p WHERE id = '.$id)[0]->jenis;
        if($this->data['jenisProyek'] == 'Outsource'){
            $this->data['optionTahapan'] = DB::select('SELECT l.* 
                                                        FROM list_tahapan l 
                                                        WHERE NOT EXISTS
                                                        (
                                                            SELECT NULL
                                                            FROM tahapan_proyek t
                                                            WHERE t.nama = l.nama
                                                            AND t.id_proyek = '.$id.'
                                                        )');
        }
        elseif($this->data['jenisProyek'] == 'Inhouse'){
            $this->data['optionTahapan'] = DB::select('SELECT l.* 
                                                        FROM list_tahapan l 
                                                        WHERE NOT EXISTS
                                                        (
                                                            SELECT NULL
                                                            FROM tahapan_proyek t
                                                            WHERE t.nama = l.nama
                                                            AND t.id_proyek = '.$id.'
                                                        )
                                                        AND l.jenis = "Inhouse" ');
        }
        $this->data['tahapan'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$id.' ORDER BY t.created_at ASC');
        $this->data['modalTahapan'] = $this->data['tahapan'];
        $proyek = Proyek::find($id);
        $this->data['namaProyek'] = $proyek->nama;
    	return view('proyek.input-tahap-proyek', $this->data);
    }

    public function save_input_tahap_proyek($id)
    {
        //tahapan
        $proyek = Proyek::find(Input::get('id_proyek'));
        $tahap = new TahapanProyek;
        $tahap->nama = Input::get('nama');
        $tahap->pic = Input::get('pic');
        $tahap->id_proyek = $proyek->id;
        $tanggal = Input::get('tanggal');
        $text_tgl_mulai = substr($tanggal, 0 ,10);
        $text_tgl_selesai = substr($tanggal, 13, 23);
        $tgl_mulai = date_create_from_format("m/d/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("m/d/Y", $text_tgl_selesai);
        $tahap->tgl_mulai = $tgl_mulai;
        $tahap->tgl_selesai = $tgl_selesai;
        $tahap->status = 'Pending';
        $tahap->save();
        
        return redirect('input-tahap-proyek/'.$id);
    }

    public function mulai_tahap_proyek($id_tahapan)
    {
        $tahapan = TahapanProyek::find($id_tahapan);
        $tahapan->status = "On Progress";
        $tahapan->tgl_real_mulai = date("Y-m-d");
        $tahapan->save();
        $this->buat_folder_tahap_proyek($id_tahapan);
        return redirect('input-tahap-proyek/'.$tahapan->id_proyek);
    }

    public function buat_folder_proyek($id_proyek)
    {
        $proyek = Proyek::find($id_proyek);
        $time = strtotime($proyek->tgl_mulai);
        $tahun = date("Y", $time);

        //mengisi tabel folder
        $folderProyek = new TabelFolder;
        $folderProyek->nama = $proyek->nama;
        $folderProyek->pic = $proyek->pic;
        $folderProyek->kategori = "Proyek";
        $folderProyek->id_proyek = $proyek->id;
        $folderProyek->tahun = $tahun;
        $folderProyek->path = $folderProyek->tahun.'/';

        //mengecek ketersedian folder tahun
        if(!is_dir($folderProyek->tahun)){
            mkdir($folderProyek->tahun);
            $tahunProyek = new Tahun;
            $tahunProyek->tahun = $folderProyek->tahun;
            $tahunProyek->proyek = 1;
            $tahunProyek->save();
        }
        else{
            $tahunFile = Tahun::where('tahun', $tahun)->first();
            $tahunFile->proyek = $tahunFile->proyek + 1;
            $tahunFile->save();
        }
        mkdir($folderProyek->tahun.'/'.$proyek->nama);
        $folderProyek->save();

        //Membuat folder P3A
        $folderP3A = new TabelFolder;
        $folderP3A->nama = "P3A";
        $folderP3A->pic = $folderProyek->pic;
        $folderP3A->kategori = "Proyek";
        $folderP3A->id_proyek = $folderProyek->id_proyek;
        $folderP3A->tahun = $folderProyek->tahun;
        $folderP3A->path = $folderP3A->tahun.'/'.$proyek->nama.'/';
        mkdir($folderP3A->tahun.'/'.$proyek->nama.'/'.'P3A');
        $folderP3A->save();

        //Membuat folder MLBI. Hanya terbentuk jika di proyek outsource
        if($proyek->jenis == 'Outsource'){
            $folderMLBI = new TabelFolder;
            $folderMLBI->nama = "MLBI";
            $folderMLBI->pic = $folderProyek->pic;
            $folderMLBI->kategori = "Proyek";
            $folderMLBI->id_proyek = $folderProyek->id_proyek;
            $folderMLBI->tahun = $folderProyek->tahun;
            $folderMLBI->path = $folderProyek->tahun.'/'.$proyek->nama.'/';
            mkdir($folderMLBI->tahun.'/'.$proyek->nama.'/'.'MLBI');
            $folderMLBI->save();
        }
    }

    public function buat_folder_tahap_proyek($id_tahapan)
    {
        $tahap = TahapanProyek::find($id_tahapan);
        $proyek = Proyek::find($tahap->id_proyek);
        $namaProyek = $proyek->nama;

        //Mengecek ketersediaan folder tahun
        $time = strtotime($tahap->tgl_mulai);
        $tahun = date("Y", $time);
        if(!File::exists($tahun)){
            $tahunBaru = new Tahun;
            $tahunBaru->tahun = $tahun;
            $tahunBaru->proyek = 1;
            $tahunBaru->non_proyek = 0;
            $tahunBaru->save();
            mkdir($tahunBaru->tahun.'/');
        }

        //Mengecek ketersedian folder proyek, folder p3A, dan folder mlbi
        if(!File::exists($tahun.'/'.$namaProyek.'/')){
            
            //proyek
            mkdir($tahun.'/'.$namaProyek.'/');          
            $folderProyek = new TabelFolder;
            $folderProyek->nama = $namaProyek;
            $folderProyek->pic = $tahap->pic;
            $folderProyek->kategori = "Proyek";
            $folderProyek->id_proyek = $proyek->id;
            $folderProyek->tahun = $tahun;
            $folderProyek->path = $tahun.'/';
            $folderProyek->save();

            //p3a
            mkdir($tahun.'/'.$namaProyek.'/'.'P3A/');
            $folderP3A = new TabelFolder;
            $folderP3A->nama = "P3A";
            $folderP3A->pic = $tahap->pic;
            $folderP3A->kategori = "Proyek";
            $folderP3A->id_proyek = $proyek->id;
            $folderP3A->tahun = $tahun;
            $folderP3A->path = $tahun.'/'.$namaProyek.'/';
            $folderP3A->save(); 
            
            //mlbi
            if($proyek->jenis == "Outsource"){
                mkdir($tahun.'/'.$namaProyek.'/'.'MLBI/');
                $folderMLBI = new TabelFolder;
                $folderMLBI->nama = "MLBI";
                $folderMLBI->pic = $tahap->pic;
                $folderMLBI->kategori = "Proyek";
                $folderMLBI->id_proyek = $proyek->id;
                $folderMLBI->tahun = $tahun;
                $folderMLBI->path = $tahun.'/'.$namaProyek.'/';
                $folderMLBI->save();
            }
        }

        //Membuat folder tahapan proyek di P3A
        $folderTahapan = new TabelFolder;
        $folderTahapan->nama = $tahap->nama;
        $folderTahapan->pic = $tahap->pic;
        $folderTahapan->kategori = "Proyek";
        $folderTahapan->id_proyek = $tahap->id_proyek;
        $folderTahapan->tahun = $tahun;
        $folderTahapan->path = $tahun.'/'.$namaProyek.'/'.'P3A/';
        $folderTahapan->save();
        // $ha = $folderTahapan->tahun.'/'.$namaProyek.'/'.'P3A/'.$folderTahapan->nama.'/';
        // dd($ha);
        mkdir($folderTahapan->tahun.'/'.$namaProyek.'/'.'P3A/'.$folderTahapan->nama.'/');

        //Membuat folder tahapan proyek di MLBI
        if($proyek->jenis == "Outsource"){
            $folderTahapanMLBI = new TabelFolder;
            $folderTahapanMLBI->nama = $tahap->nama;
            $folderTahapanMLBI->pic = $tahap->pic;
            $folderTahapanMLBI->kategori = "Proyek";
            $folderTahapanMLBI->id_proyek = $tahap->id_proyek;
            $folderTahapanMLBI->tahun = $tahun;
            $folderTahapanMLBI->path = $folderTahapanMLBI->tahun.'/'.$namaProyek.'/'.'MLBI/';
            $folderTahapanMLBI->save();
            mkdir($folderTahapanMLBI->tahun.'/'.$namaProyek.'/'.'MLBI/'.$folderTahapanMLBI->nama.'/');
        }
    }

    public function selesaikan_tahapan_proyek($id)  //ini ID tahapan
    {
        //cek semua sub tahapan telah selesai
        $subTahapan = DB::select('SELECT s.* FROM sub_tahapan_proyek s WHERE s.id_tahapan = '.$id);
        $selesai = 1;
        foreach($subTahapan as $data){
            if(is_null($data->tgl_real_selesai)){
                $selesai = 0;
            }
        }
        
        if($selesai == 1){
            //update tahapan menjadi selesai
            $tahapan = TahapanProyek::find($id);
            $tahapan->status = "Finish";
            $tahapan->tgl_real_selesai = date("Y-m-d");
            $tahapan->save();
            return redirect('input-tahap-proyek/'.$tahapan->id_proyek);
        }
        return redirect('input-sub-tahapan/'.$id);
    }


    public function input_sub_tahapan($id)  //ini ID tahapan
    {
        $this->data['sub'] = DB::select('SELECT s.* FROM sub_tahapan_proyek s WHERE s.id_tahapan = '.$id);
        $tahapan = TahapanProyek::find($id);
        $proyek = Proyek::find($tahapan->id_proyek);
        $this->data['optionSubTahapan'] = DB::select('SELECT m.* FROM master_file m, tahapan_proyek t WHERE m.tahapan = t.nama AND t.id = '.$id);
        $this->data['namaProyek'] = $proyek->nama;
        $this->data['namaTahapan'] = $tahapan->nama;
        $this->data['id_tahapan'] = $id;
        $this->data['id_proyek'] = $proyek->id;
        return view('proyek.input-sub-tahapan', $this->data);
    }

    public function save_input_sub_tahapan($id) //ini ID tahapan
    {
        $sub = new SubTahapanProyek;
        $sub->id_tahapan = Input::get('id_tahapan');
        $sub->nama = Input::get('namaSubTahapan');
        $sub->pic = Input::get('pic');
        $tanggal = Input::get('tanggal');

        $text_tgl_mulai = substr($tanggal, 0 ,10);
        $text_tgl_selesai = substr($tanggal, 13, 23);
        $tgl_mulai = date_create_from_format("m/d/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("m/d/Y", $text_tgl_selesai);
        $sub->tgl_mulai = $tgl_mulai;
        $sub->tgl_selesai = $tgl_selesai;
        $sub->status = 'Pending';
        $sub->save();

        return redirect('input-sub-tahapan/'.$id);
    }

    public function mulai_sub_tahapan_proyek($id)   //ini ID sub tahapan
    {
        $subTahapan = SubTahapanProyek::find($id);
        $subTahapan->status = "On Progress";
        $subTahapan->tgl_real_mulai = date("Y-m-d");
        $subTahapan->save();
        return redirect('input-sub-tahapan/'.$subTahapan->id_tahapan);
    }

    public function selesaikan_sub_tahapan_proyek($id)  //ini ID sub tahapan
    {
        $subTahapan = SubTahapanProyek::find($id);
        $subTahapan->tgl_real_selesai = date("Y-m-d");
        $subTahapan->status = "Finish";
        $subTahapan->save();

        //update kelengkapan proyek
        $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
        if($subTahapan->nama == "Spesifikasi Kebutuhan"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['spesifikasi_kebutuhan' => "Done"]);
        }
        elseif($subTahapan->nama == "Use Case & Effort Estimation"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['use_case_effort_estimation' => "Done"]);
        }
        elseif($subTahapan->nama == "Solusi SI"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['solusi_si' => "Done"]);
        }
        elseif($subTahapan->nama == "Proposal"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['proposal' => "Done"]);
        }
        elseif($subTahapan->nama == "Jadwal"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['jadwal' => "Done"]);
        }
        elseif($subTahapan->nama == "FNDS"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['fnds' => "Done"]);
        }
        elseif($subTahapan->nama == "Disain Rinci"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['disain_rinci' => "Done"]);
        }
        elseif($subTahapan->nama == "Traceability Matrix"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['traceability_matrix' => "Done"]);
        }
        elseif($subTahapan->nama == "Dokumentasi Program"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['dokumentasi_program' => "Done"]);
        }
        elseif($subTahapan->nama == "Paket Unit Test"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['paket_unit_test' => "Done"]);
        }
        elseif($subTahapan->nama == "Laporan Unit Test"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['laporan_unit_test' => "Done"]);
        }
        elseif($subTahapan->nama == "Rencana SIT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['rencana_sit' => "Done"]);
        }
        elseif($subTahapan->nama == "Paket SIT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['paket_sit' => "Done"]);
        }
        elseif($subTahapan->nama == "Laporan SIT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['laporan_sit' => "Done"]);
        }
        elseif($subTahapan->nama == "Paket Test UAT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['paket_test_uat' => "Done"]);
        }
        elseif($subTahapan->nama == "Rencana UAT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['rencana_uat' => "Done"]);
        }
        elseif($subTahapan->nama == "BA UAT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['ba_uat' => "Done"]);
        }
        elseif($subTahapan->nama == "Laporan UAT"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['laporan_uat' => "Done"]);
        }
        elseif($subTahapan->nama == "Juknis Instalasi"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['juknis_instalasi' => "Done"]);
        }
        elseif($subTahapan->nama == "Juknis Operasional"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['juknis_operasional' => "Done"]);
        }
        elseif($subTahapan->nama == "Rencana Deployment"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['rencana_deployment' => "Done"]);
        }
        elseif($subTahapan->nama == "BA Migrasi Data"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['ba_migrasi_data' => "Done"]);
        }
        elseif($subTahapan->nama == "BA Serah Terima Operasional"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['ba_serah_terima_operasional' => "Done"]);
        }
        elseif($subTahapan->nama == "BA Serah Terima PSI"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['ba_serah_terima_psi' => "Done"]);
        }
        elseif($subTahapan->nama == "Rencana Implementasi"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['rencana_implementasi' => "Done"]);
        }
        elseif($subTahapan->nama == "Juknis Aplikasi"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['juknis_aplikasi' => "Done"]);
        }
        elseif($subTahapan->nama == "BA Implementasi"){
            DB::table('kelengkapan_proyek')->where('id_proyek', $tahapan->id_proyek)->update(['ba_implementasi' => "Done"]);
        }

        return redirect('input-sub-tahapan/'.$subTahapan->id_tahapan);
    }

    //Untuk mengakses isi folder dan menampilkannya
    public function list_file_sub_tahapan( $id, $deeppath = null )  //ini ID sub tahapan, deep path adalah id folder
    {
        $subTahapan = SubTahapanProyek::find($id);
        $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
        $proyek = Proyek::find($tahapan->id_proyek);
        $tahun = date("Y");
        $this->data['id_sub_tahapan'] = $id;
        $this->data['id_tahapan'] = $tahapan->id;
        $this->data['id_proyek'] = $proyek->id;
        $this->data['namaSubTahapan'] = $subTahapan->nama;
        $this->data['namaTahapan'] = $tahapan->nama;
        $this->data['namaProyek'] = $proyek->nama;
        $this->data['jenisProyek'] = $proyek->jenis;

        if($deeppath){
            //dd("KEMUNGKINAN 1 : DEEP PATH / AKSES FOLDER DEEP");
            $this->data['deeppath'] = $deeppath;
            $folder = TabelFolder::find($deeppath);
            $this->data['path'] = $folder->path.$folder->nama.'/';
            $this->data['pathMLBI'] = $folder->path_mlbi.$folder->nama.'/';
            $this->data['fileSubTahapanP3A'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['path'].'"');
            $this->data['folderSubTahapan'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$this->data['path'].'"');
            $this->data['fileSubTahapanMLBI'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['pathMLBI'].'"');
        }
        else{
            //dd("KEMUNGKINAN 2 : NORMAL / AKSES FOLDER NORMAL");
            $this->data['path'] = $tahun.'/'.$proyek->nama.'/'.'P3A/'.$tahapan->nama.'/';
            $this->data['pathMLBI'] = $tahun.'/'.$proyek->nama.'/'.'MLBI/'.$tahapan->nama.'/';
            $this->data['fileSubTahapanP3A'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['path'].'" AND t.id_sub_tahapan = '.$id);
            $this->data['folderSubTahapan'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$this->data['path'].'" AND t.id_sub_tahapan = '.$id);
            $this->data['fileSubTahapanMLBI'] = DB::select('SELECT t.* FROm tabel_file t WHERE t.path  = "'.$this->data['pathMLBI'].'" AND t.id_sub_tahapan = '.$id);
        }
        return view('proyek.list-file-sub-tahapan', $this->data);
    }

    public function save_list_file_sub_tahapan (Request $request, $id, $deeppath = null )    //ini ID sub tahapan
    {
        if($deeppath){
            //dd("KEMUNGKINAN 3 : DEEP PATH / UPLOAD FILE DEEP");
            $file = $request->file('berkas');
            $fileExtension = $file->getClientOriginalExtension();
            $diizinkan = $this->cek_tipe_file($fileExtension);
            if($diizinkan > 0 ){
                $subTahapan = SubTahapanProyek::find($id);
                $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
                $proyek = Proyek::find($tahapan->id_proyek);
                $tanggal = date_create($subTahapan->tgl_mulai);
                $tahun = date_format($tanggal, 'Y');
                $fileSize = $file->getSize();
                $fileName = $file->getClientOriginalName();
                $folder = TabelFolder::find($deeppath);
                $path = $folder->path.$folder->nama.'/';

                $berkas = new TabelFile;
                $berkas->nama = $fileName;
                if(Auth::user()){
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
                return redirect('list-file-sub-tahapan/'.$id.'/'.$deeppath);
            }
            else{
                return back();
            }
            
        }
        else{
            //dd("KEMUNGKINAN 4 : NORMAL / UPLOAD FILE NORMAL");
            $file = $request->file('berkas');
            $fileExtension = $file->getClientOriginalExtension();
            $diizinkan = $this->cek_tipe_file($fileExtension);
            if($diizinkan > 1){
                $subTahapan = SubTahapanProyek::find($id);
                $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
                $proyek = Proyek::find($tahapan->id_proyek);
                $tanggal = date_create($subTahapan->tgl_mulai);
                $tahun = date_format($tanggal, 'Y');
                $fileSize = $file->getSize();
                $fileName = $file->getClientOriginalName();
                $path = $tahun.'/'.$proyek->nama.'/'.'P3A/'.$tahapan->nama.'/';

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
            else{
                return back();
            }
        }
    }

    public function tambah_folder_sub_tahapan(Request $request, $id, $deeppath = null)      //ini ID sub tahapan
    {
        if($deeppath){
            //dd("KEMUNGKINAN 5 : DEEP PATH / TAMBAH FOLDER");
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $folder = new TabelFolder;
            $folder->nama = $request->namaFolder;
            if(Auth::check()){
                $folder->pic = Auth::user()->name;
            }
            else{
                $folder->pic = "Unregistered User";
            }
            $folder->id_proyek = $tahapan->id_proyek;
            $folder->id_sub_tahapan = $id;
            $folder->tahun = date("Y");
            $folder->path = $request->path;
            $folder->kategori = "Proyek";

            if($proyek->jenis == "Outsource"){
                $pathMLBI =  TabelFolder::find($deeppath);
                $folder->path_mlbi = $pathMLBI->path_mlbi.$pathMLBI->nama.'/';
            }

            if($proyek->jenis == "Outsource"){
                $folder2 = new TabelFolder;
                $folder2->nama = $folder->nama;
                $folder2->pic = $folder->pic;
                $folder2->id_proyek = $folder->id_proyek;
                $folder2->id_sub_tahapan = $folder->id_sub_tahapan;
                $folder2->tahun = $folder->tahun;
                $folder2->path = $folder->path_mlbi;
                $folder2->kategori = $folder->kategori;
            }

            if($folder->save()){
                mkdir($folder->path.'/'.$folder->nama);
                if($proyek->jenis == "Outsource"){
                    mkdir($folder->path_mlbi.'/'.$folder->nama);
                    $folder2->save();
                }
            }
            return redirect('list-file-sub-tahapan/'.$id.'/'.$deeppath);
        }
        else{
            //dd("KEMUNGKINAN 6 : NORMAL / TAMBAH FOLDER");
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan  = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $folder = new TabelFolder;
            $folder->nama = $request->namaFolder;
            if(Auth::check()){
                $folder->pic = Auth::user()->name;
            }
            else{
                $folder->pic = "Unregistered User";
            }
            $folder->id_proyek = $proyek->id;
            $folder->id_sub_tahapan = $id;
            $folder->tahun = date("Y");
            $folder->path = $request->path;
            $folder->kategori = "Proyek";

            if($proyek->jenis == "Outsource"){
                $tahun = date("Y");
                $folder->path_mlbi = $tahun.'/'.$proyek->nama.'/'.'MLBI/'.$tahapan->nama.'/';
            }

            if($proyek->jenis == "Outsource"){
                $folder2 = new TabelFolder;
                $folder2->nama = $folder->nama;
                $folder2->pic = $folder->pic;
                $folder2->id_proyek = $folder->id_proyek;
                $folder2->id_sub_tahapan = $folder->id_sub_tahapan;
                $folder2->tahun = $folder->tahun;
                $folder2->path = $folder->path_mlbi;
                $folder2->kategori = $folder->kategori;
            }

            if($folder->save()){
                mkdir($folder->path.$folder->nama);
                if($proyek->jenis == "Outsource"){
                    mkdir($folder->path_mlbi.$folder->nama);
                    $folder2->save();
                }
            }
            return redirect('list-file-sub-tahapan/'.$id);
        }
    }

    public function upload_file_mlbi(Request $request, $id, $deeppath = null)   //ini ID sub tahapan
    {
        //dd("MLBI");
        $file = $request->file('berkas');
        $fileExtension = $file->getClientOriginalExtension();
        $this->cek_tipe_file($fileExtension);
        $fileName = $file->getClientOriginalName();
        $subTahapan = SubTahapanProyek::find($id);
        $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
        $proyek = Proyek::find($tahapan->id_proyek);
        $berkas = new TabelFile;
        $berkas->nama = $fileName;
        $berkas->id_sub_tahapan = $id;
        if(Auth::check()){
            $berkas->pic = Auth::user()->name;
        }
        else{
            $berkas->pic = "Unregistered User";
        }
        $berkas->tahun = date("Y");
        if($deeppath){
            //dd("DEEPPATH MLBI UPLOAD FILE");
            $direktori = TabelFolder::find($deeppath);
            $pathMLBI = $direktori->path_mlbi.$direktori->nama.'/';
            $berkas->path = $pathMLBI;
            if($berkas->save()){
                $file->move($pathMLBI, $fileName);
            }
            return redirect('list-file-sub-tahapan/'.$id.'/'.$deeppath);
        }
        else{
            //dd("NORMAL MLBI UPLOAD FILE");
            $path = $berkas->tahun.'/'.$proyek->nama.'/'.'MLBI/'.$tahapan->nama.'/';
            $berkas->path = $path;
            if($berkas->save()){
                $file->move($path, $fileName);
            }
            return redirect('list-file-sub-tahapan/'.$id);
        }
    }

    public function delete_file_sub_tahapan($id_file)
    {
        $file = TabelFile::find($id_file);
        File::delete($file->path.$file->nama);
        $file->delete();
        return back();
    }

    public function delete_folder_sub_tahapan($id_folder)
    {
        $adaFolder = 0;
        $adaFile = 0;

        $folder = TabelFolder::find($id_folder);
        
        // //File
        $isiFile = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$folder->path.$folder->nama.'/'.'"');
        foreach($isiFile as $data){
            $adaFile = $adaFile + 1;
        }
        if($adaFile > 0){
            $this->delete_file_sub_tahapan($data->id);
        }
        
        // //Folder
        $isiFolder = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$folder->path.$folder->nama.'/'.'"');
        foreach($isiFolder as $data){
            $adaFolder = $adaFolder + 1;
        }
        if($adaFolder > 0){
            foreach($isiFolder as $data){
                $this->delete_folder_sub_tahapan($data->id);
            }
        }
        else{
            rmdir($folder->path.$folder->nama.'/');
            $folder->delete();
        }

        return back();
    }

    public function delete_sub_tahapan($id_sub_tahapan)
    {
        $subTahapan = SubTahapanProyek::find($id_sub_tahapan);

        //mengecek isi folder
        $isiFolder = DB::select('SELECT t.* FROM tabel_folder t WHERE t.id_sub_tahapan = '.$id_sub_tahapan);


        //mengecek isi file
        $isiFile = DB::select('SELECT t.* FROM tabel_file t WHERE t.id_sub_tahapan = '.$id_sub_tahapan);
        foreach($isiFile as $data){
            $this->delete_file_sub_tahapan($data->id);
        }

        return back();
        // dd($isiFolder, $isiFile);
    }

    public function edit_tahapan_proyek(Request $request, $id_tahapan)
    {
        $tahapan = TahapanProyek::find($id_tahapan)->first();
        $tanggal = Input::get('tanggal');
        $text_tgl_mulai = substr($tanggal, 0 ,10);
        $text_tgl_selesai = substr($tanggal, 13, 23);
        $tgl_mulai = date_create_from_format("m/d/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("m/d/Y", $text_tgl_selesai);
        $tahapan->tgl_real_mulai = $tgl_mulai;
        $tahapan->tgl_real_selesai = $tgl_selesai;
        $tahapan->save();
        //dd($tahapan->tgl_mulai);
        return back();
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

}
