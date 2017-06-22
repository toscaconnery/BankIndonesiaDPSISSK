<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Anggaran;
use Auth;

class AnggaranController extends Controller
{
    public function report_anggaran_tahunan()
    {
        return view('anggaran.report-anggaran-tahunan');
    }

    public function report_anggaran_bulanan()
    {
        return view('anggaran.report-anggaran-bulanan');
    }

    public function input_anggaran_tahunan()
    {
    	return view('anggaran.input-anggaran-tahunan');
    }

    public function input_pencairan_anggaran()
    {
        return view('anggaran.input-pencairan-anggaran');
    }

    public function report_anggaran_rinci()
    {
        return view('anggaran.report-anggaran-rinci');
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
        
        $pengeluaran = new Pengeluaran;
        $pengeluaran->tanggal_pencairan = $tanggal;
        $pengeluaran->nominal = $kategori;
        $pengeluaran->ri = $ri;
        $pengeluaran->op = $op;
        $pengeluaran->pic = 0;
        $pengeluaran->used_ri = 0;
        $pengeluaran->used_op = 0;
        // if( Auth::check() ) {
        //  $anggaran->pic = Auth::user()->get('id');
        // }
        // else {
        //  $anggaran->pic = 0;
        // }
        $anggaran->save();
        return redirect('report-anggaran-tahunan');
    }
}
