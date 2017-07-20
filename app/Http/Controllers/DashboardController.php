<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Anggaran;
use App\Pencairan;
// use Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	// if(Auth::check())
    	// {

    	$this->data['issue'] = DB::select('SELECT i.* FROM issue i 
                                            WHERE i.status = "On Progress" 
                                            OR i.status = "Pending" 
                                            ORDER BY i.created_at DESC');
        $this->data['anggaran'] = DB::select('SELECT tahun,ri,ao,(ri-used_ri) as sisa_ri,(ao-used_ao) as sisa_ao from anggaran where tahun=YEAR(now()) limit 1');
    	// dd($this->data['anggaran']);
        $this->data['anggaranada']=1;
        if(empty($this->data['anggaran']))
        {
            $this->data['anggaranada']=0;
        }
        
        // $this->data['anggaran2'] = 
        // dd($this->data['anggaran']);
        $this->data['januariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['januariAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['februariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['februariAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['maretRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['maretAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['aprilRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['aprilAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['meiRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['meiAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['juniRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['juniAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['juliRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['juliAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['agustusRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['agustusAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['septemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['septemberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['oktoberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['oktoberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['novemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['novemberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];
        
        $this->data['desemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['desemberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="AO"')[0];

        $this->data['forecast'] = $this->getEndYearForecast();
        $this->data['progressProyek'] = $this->getProgressProyek();
        
        return view('dashboard.dashboard', $this->data);

    }

    public function getEndYearForecast()
    {
        $anggaranTahunIni = Anggaran::where('tahun', date("Y"))->select('nominal')->first();
        if(is_null($anggaranTahunIni))
        {
            $penggunaanNormalBulanan = 0;
        }
        else
        {
            $penggunaanNormalBulanan = $anggaranTahunIni->nominal / 12;;
        }
        
        $terpakaiTahunIni = DB::select('SELECT SUM(p.nominal) AS jumlah FROM pencairan p WHERE YEAR(p.tanggal_pencairan) = '.date("Y"))[0]->jumlah;
        
        if(is_null($terpakaiTahunIni)){
            $terpakaiTahunIni = 0;
        }
        $bulanSekarang = date('m');
        $forecast = ((($penggunaanNormalBulanan * $bulanSekarang) - $terpakaiTahunIni) * 12) / $bulanSekarang;
        return $forecast;
    }

    public function getProgressProyek()
    {
        $listProyek = DB::select('SELECT k.*, p.nama, p.jenis FROM kelengkapan_proyek k, proyek p WHERE p.id = k.id_proyek ORDER BY k.created_at DESC');
        $this->data['kelengkapanProyek'] = array();
        foreach($listProyek as $data){
            $this->data['kelengkapanProyek'][$data->id_proyek]['nama'] = $data->nama;
            $this->data['kelengkapanProyek'][$data->id_proyek]['id'] = $data->id;
            $this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['disain'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['pengembangan'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['pengujian'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['implementasi'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Belum Ada Progress";
            $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = 0;
            $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = "Tgl belum ditentukan";

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

            if($this->data['kelengkapanProyek'][$data->id_proyek]['pengajuan'] > 0 ){
                $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Pengajuan";
                $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = $this->data['kelengkapanProyek'][$data->id_proyek]['persenPengajuan'];
            }
            if($this->data['kelengkapanProyek'][$data->id_proyek]['disain'] > 0 ){
                $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Disain";
                $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = $this->data['kelengkapanProyek'][$data->id_proyek]['persenDisain'];
            }
            if($this->data['kelengkapanProyek'][$data->id_proyek]['pengembangan'] > 0 ){
                $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Pengembangan";
                $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = $this->data['kelengkapanProyek'][$data->id_proyek]['persenPengembangan'];
            }
            if($this->data['kelengkapanProyek'][$data->id_proyek]['pengujian'] > 0 ){
                $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Pengujian";
                $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = $this->data['kelengkapanProyek'][$data->id_proyek]['persenPengujian'];
            }
            if($this->data['kelengkapanProyek'][$data->id_proyek]['siapImplementasi'] > 0 ){
                $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Siap Implementasi";
                $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = $this->data['kelengkapanProyek'][$data->id_proyek]['persenSiapImplementasi'];
            }
            if($this->data['kelengkapanProyek'][$data->id_proyek]['implementasi'] > 0 ){
                $this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] = "Implementasi";
                $this->data['kelengkapanProyek'][$data->id_proyek]['persenLastProgress'] = $this->data['kelengkapanProyek'][$data->id_proyek]['persenImplementasi'];
            }

            $this->data['kelengkapanProyek'][$data->id_proyek]['persenTotal'] = ($this->data['kelengkapanProyek'][$data->id_proyek]['persenPengajuan'] + $this->data['kelengkapanProyek'][$data->id_proyek]['persenDisain'] + $this->data['kelengkapanProyek'][$data->id_proyek]['persenPengembangan'] + $this->data['kelengkapanProyek'][$data->id_proyek]['persenPengujian'] + $this->data['kelengkapanProyek'][$data->id_proyek]['persenSiapImplementasi'] + $this->data['kelengkapanProyek'][$data->id_proyek]['persenImplementasi']) / 6;

            if($this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] == "Pengajuan"){
                $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$data->id_proyek.' AND t.nama = "Pengajuan"')[0]->tgl_selesai;
            }
            elseif($this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] == "Disain"){
                $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$data->id_proyek.' AND t.nama = "Disain"')[0]->tgl_selesai;
            }
            elseif($this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] == "Pengembangan"){
                $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$data->id_proyek.' AND t.nama = "Pengembangan"')[0]->tgl_selesai;
            }
            elseif($this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] == "Pengujian"){
                $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$data->id_proyek.' AND t.nama = "Pengujian"');
            }
            elseif($this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] == "Siap Implementasi"){
                $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$data->id_proyek.' AND t.nama = "Siap Implementasi"')[0]->tgl_selesai;
            }
            elseif($this->data['kelengkapanProyek'][$data->id_proyek]['lastProgress'] == "Implementasi"){
                $this->data['kelengkapanProyek'][$data->id_proyek]['deadlineProgress'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$data->id_proyek.' AND t.nama = "Implementasi"')[0]->tgl_selesai;
            }
        }
        return $this->data['kelengkapanProyek'];
    }
}
