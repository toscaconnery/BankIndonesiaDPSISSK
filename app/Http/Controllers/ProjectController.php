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
use Auth;

class ProjectController extends Controller
{
    public function list_proyek()
    {
        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p ORDER BY p.created_at DESC');
        $this->data['modalProyek'] = $this->data['proyek'];
        $kelengkapanProyek = DB::select('SELECT k.*, p.nama FROM kelengkapan_proyek k, proyek p WHERE p.id = k.id_proyek ORDER BY k.created_at DESC');
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
                $this->data['kelengkapanProyek'][$data->iid_proyekd]['pengajuan']++;
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
            $this->data['kelengkapanProyek'][$data->id]['persenDisain'] = ($this->data['kelengkapanProyek'][$data->id]['disain']/3) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenPengembangan'] = ($this->data['kelengkapanProyek'][$data->id]['pengembangan']/3) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenPengujian'] = ($this->data['kelengkapanProyek'][$data->id]['pengujian']/7) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenSiapImplementasi'] = ($this->data['kelengkapanProyek'][$data->id]['siapImplementasi']/6) * 100;
            $this->data['kelengkapanProyek'][$data->id]['persenImplementasi'] = ($this->data['kelengkapanProyek'][$data->id]['implementasi']/3) * 100;
        }

        foreach($pic as $pic){
            //$this->data['kelengkapanProyek'][$data->id]['picDisain'] = "-";
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
        $tgl_mulai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $tgl_selesai = date_create_from_format("d/m/Y", $text_tgl_mulai);
        $proyek->tgl_mulai = $tgl_mulai;
        $proyek->tgl_selesai = $tgl_selesai;
        $proyek->status = "Pending";

        if($proyek->save()){

            //Membuat folder proyek
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

            //Membuat folder P3A
            $folderP = new TabelFolder;
            $folderP->nama = "P3A";
            $folderP->pic = $folder->pic;
            $folderP->kategori = "Proyek";
            $folderP->id_proyek = $folder->id_proyek;
            $folderP->tahun = $folder->tahun;
            $folderP->path = $folderP->tahun.'/'.$proyek->nama.'/';
            mkdir($folderP->tahun.'/'.$proyek->nama.'/'.'P3A');
            $folderP->save();

            //Membuat folder MLBI
            $folderM = new TabelFolder;
            $folderM->nama = "MLBI";
            $folderM->pic = $folder->pic;
            $folderM->kategori = "Proyek";
            $folderM->id_proyek = $folder->id_proyek;
            $folderM->tahun = $folder->tahun;
            $folderM->path = $folderP->tahun.'/'.$proyek->nama.'/';
            mkdir($folderM->tahun.'/'.$proyek->nama.'/'.'MLBI');
            $folderM->save();


            //Mempersiapkan kelengkapan file proyek
            $kelengkapan = new KelengkapanProyek;
            $kelengkapan->id_proyek = $proyek->id;
            $kelengkapan->save();
        }
        return redirect('list-proyek');
    }

    public function mulai_proyek($id)
    {
        $proyek = Proyek::find($id);
        $proyek->status = "On Progress";
        $proyek->tgl_real_mulai = date("Y-m-d");
        $proyek->save();
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
        $tahap->status = 'Pending';

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

    public function mulai_tahap_proyek($id)
    {
        $tahapan = TahapanProyek::find($id);
        $tahapan->status = "On Progress";
        $tahapan->tgl_real_mulai = date("Y-m-d");
        $tahapan->save();
        return redirect('input-tahap-proyek/'.$tahapan->id_proyek);
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
        $sub->status = 'Pending';

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
        if($deeppath){
            //dd("KEMUNGKINAN 1 : DEEP PATH / AKSES FOLDER DEEP");
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $tahun = date("Y");
            $this->data['id_sub_tahapan'] = $id;
            $this->data['deeppath'] = $deeppath;
            $this->data['namaSubTahapan'] = $subTahapan->nama;
            $this->data['namaTahapan'] = $tahapan->nama;
            $this->data['namaProyek'] = $proyek->nama;
            $folder = TabelFolder::find($deeppath);
            $this->data['path'] = $folder->path.$folder->nama.'/';
            // dd($this->data['path']);
            $this->data['fileSubTahapan'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['path'].'"');
            $this->data['folderSubTahapan'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$this->data['path'].'"');
            return view('proyek.list-file-sub-tahapan', $this->data);
        }
        else{
            //dd("KEMUNGKINAN 2 : NORMAL / AKSES FOLDER NORMAL");
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $tahun = date("Y");
            $this->data['id_sub_tahapan'] = $id;
            $this->data['namaSubTahapan'] = $subTahapan->nama;
            $this->data['namaTahapan'] = $tahapan->nama;
            $this->data['namaProyek'] = $proyek->nama;
            $this->data['path'] = $tahun.'/'.$proyek->nama.'/'.'P3A/'.$tahapan->nama.'/'.$subTahapan->nama.'/';
            $this->data['fileSubTahapan'] = DB::select('SELECT t.* FROM tabel_file t WHERE t.path = "'.$this->data['path'].'"');
            $this->data['folderSubTahapan'] = DB::select('SELECT t.* FROM tabel_folder t WHERE t.path = "'.$this->data['path'].'"');
            
            return view('proyek.list-file-sub-tahapan', $this->data);
        }
    }

    public function save_list_file_sub_tahapan (Request $request, $id, $deeppath = null )    //ini ID sub tahapan
    {
        if($deeppath){
            //dd("KEMUNGKINAN 3 : DEEP PATH / UPLOAD FILE DEEP");
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan = TahapanProyek::find($subTahapan->id_tahapan);
            $proyek = Proyek::find($tahapan->id_proyek);
            $tanggal = date_create($subTahapan->tgl_mulai);
            $tahun = date_format($tanggal, 'Y');
            $file = $request->file('berkas');
            $fileExtension = $file->getClientOriginalExtension();
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
            //DD("KEMUNGKINAN 4 : NORMAL / UPLOAD FILE NORMAL");
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

    public function tambah_folder_sub_tahapan(Request $request, $id, $deeppath = null)      //ini ID sub tahapan
    {
        if($deeppath){
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
            $folder->tahun = date("Y");
            $folder->path = $request->path;
            $folder->kategori = "Proyek";
            if($folder->save()){
                mkdir($folder->path.$folder->nama);
            }
            return redirect('list-file-sub-tahapan/'.$id.'/'.$deeppath);
        }
        else{
            $subTahapan = SubTahapanProyek::find($id);
            $tahapan  = TahapanProyek::find($subTahapan->id_tahapan);
            $folder = new TabelFolder;
            $folder->nama = $request->namaFolder;
            if(Auth::check()){
                $folder->pic = Auth::user()->name;
            }
            else{
                $folder->pic = "Unregistered User";
            }
            $folder->id_proyek = $tahapan->id_proyek;
            $folder->tahun = date("Y");
            $folder->path = $request->path;
            $folder->kategori = "Proyek";
            if($folder->save()){
                mkdir($folder->path.$folder->nama);
            }
            return redirect('list-file-sub-tahapan/'.$id);
        }
    }
    
}





