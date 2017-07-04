<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Anggaran;
use App\Pencairan;
use Auth;
use DB;

class AnggaranController extends Controller
{
    public function report_anggaran_tahunan()
    {
        $this->data['anggaran'] = DB::select('SELECT a.* FROM anggaran a ORDER BY a.created_at DESC');
        return view('anggaran.report-anggaran-tahunan', $this->data);
    }

    // public function input_tahap_proyek($id)
    // {
    //     $this->data['id_proyek'] = $id;
    //     $this->data['jenis_proyek'] = DB::select('SELECT jenis FROM proyek p WHERE id = '.$id)[0]->jenis;
    //     $this->data['tahapan'] = DB::select('SELECT t.* FROM tahapan_proyek t WHERE t.id_proyek = '.$id.' ORDER BY t.created_at ASC');
    //     $proyek = Proyek::find($id);
    //     $this->data['namaProyek'] = $proyek->nama;
    //     return view('proyek.input-tahap-proyek', $this->data);
    // }

    public function report_anggaran_bulanan($tahun)
    {
        $this->data['tahun_anggaran'] = $tahun;
        $this->data['jlh_pengeluaran_bulanan'] = DB::select('SELECT MONTH(tanggal_pencairan) as idbulan, MONTHNAME(tanggal_pencairan) as Bulan,COUNT(nominal) as Jumlah FROM pencairan WHERE YEAR(tanggal_pencairan) = '.$tahun.' GROUP BY MONTH(tanggal_pencairan)');
        $anggaran = DB::select('SELECT * from anggaran where tahun='.$tahun.'');
        // dd($anggaran);
        //$this->data['tahun_ang'] = $anggaran->tahun;
        return view('anggaran.report-anggaran-bulanan', $this->data);
        // return view('anggaran.report-anggaran-bulanan');
    }

    // public function report_anggaran_bulanan()
    // {
    //     return view('anggaran.report-anggaran-bulanan');
    // }

    public function input_anggaran_tahunan()
    {
    	return view('anggaran.input-anggaran-tahunan');
    }

    public function input_pencairan_anggaran()
    {
        return view('anggaran.input-pencairan-anggaran');
    }

    public function report_anggaran_rinci($tahun_anggaran,$idbulan)
    {
        $this->data['tahun_anggar'] = $tahun_anggaran;
        $this->data['numbulan'] = $idbulan;
        // dd($this->data['tahun_anggar']);
        // dd($this->data['numbulan']);
        $this->data['pengeluaran_rinci'] = DB::select('SELECT * from pencairan where YEAR(tanggal_pencairan) = '.$tahun_anggaran.' and MONTH(tanggal_pencairan) = '.$idbulan.'');
        return view('anggaran.report-anggaran-rinci', $this->data);
    }

    public function save_input_anggaran_tahunan()
    {
    	$tahun = Input::get('tahun');
    	$nominal = Input::get('nominal');
        $ri = Input::get('ri');
        $op = Input::get('op');
    	
    	$anggaran = new Anggaran;
    	$anggaran->tahun = $tahun;
    	$anggaran->nominal = $nominal;
        $anggaran->ri = $ri;
        $anggaran->op = $op;
        $anggaran->pic = 0;
        $anggaran->used_ri = 0;
        $anggaran->used_op = 0;
    	// if( Auth::check() ) {
    	// 	$anggaran->pic = Auth::user()->get('id');
    	// }
    	// else {
    	// 	$anggaran->pic = 0;
    	// }
    	$anggaran->save();
    	return redirect('report-anggaran-tahunan');
    }

    public function save_input_pengeluaran()
    {
        $tanggal = Input::get('tanggal');
        $kategori = Input::get('kategori');
        $nominal = Input::get('nominal');
        $keterangan = Input::get('keterangan');
        
        $pengeluaran = new Pencairan;
        $pengeluaran->tanggal_pencairan = $tanggal;
        $pengeluaran->nominal = $nominal;
        $pengeluaran->kategori = $kategori;
        $pengeluaran->keterangan = $keterangan;
        $pengeluaran->pic = 0;
        // if( Auth::check() ) {
        //  $anggaran->pic = Auth::user()->get('id');
        // }
        // else {
        //  $anggaran->pic = 0;
        // }
        $pengeluaran->save();
        return redirect('report-anggaran-tahunan');
    }
}
