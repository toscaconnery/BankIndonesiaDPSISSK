<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Anggaran;
use App\Pencairan;
use Auth;
use DB;
use Redirect;

class AnggaranController extends Controller
{
    public function report_anggaran_tahunan()
    {
        $this->data['anggaran'] = DB::select('SELECT a.*,used_ri+used_op as used_total, ROUND(used_ri * 100.0 / ri, 2) as persen_ri, ROUND(used_op * 100.0 / op, 2) as persen_op, nominal-used_ri-used_op as sisa, ROUND((used_ri+used_op) * 100.0 / nominal, 2) as persen_realisasi, ROUND(100-(used_ri+used_op) * 100.0 / nominal, 2) as persen_used FROM anggaran a ORDER BY a.created_at DESC');
        return view('anggaran.report-anggaran-tahunan', $this->data);
    }

    public function report_anggaran_bulanan($tahun)
    {
        $this->data['tahun_anggaran'] = $tahun;
        $this->data['jlh_pengeluaran_bulanan'] = DB::select('SELECT (SELECT SUM(nominal) from pencairan where MONTH(tanggal_pencairan)=tab1.idbulan and kategori="RI" and YEAR(tanggal_pencairan)='.$tahun.') as sumri, (SELECT SUM(nominal) from pencairan where MONTH(tanggal_pencairan)=tab1.idbulan and kategori="OP" and YEAR(tanggal_pencairan)='.$tahun.') as sumop, (SELECT SUM(nominal) from pencairan where MONTH(tanggal_pencairan)=tab1.idbulan and YEAR(tanggal_pencairan)='.$tahun.') as sumtot, tab1.idbulan, tab1.Bulan, tab1.Jumlah from (SELECT MONTH(tanggal_pencairan) as idbulan, MONTHNAME(tanggal_pencairan) as Bulan,COUNT(nominal) as Jumlah FROM pencairan WHERE YEAR(tanggal_pencairan) = '.$tahun.' GROUP BY MONTH(tanggal_pencairan)) tab1');
        //dd($this->data);
        $anggaran = DB::select('SELECT * from anggaran where tahun='.$tahun.'');
        $januariRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $januariOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $februariRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $februariOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $maretRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $maretOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $aprilRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $aprilOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $meiRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $meiOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $juniRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $juniOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $juliRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $juliOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $agustusRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $agustusOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $septemberRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $septemberOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $oktoberRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $oktoberOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $novemberRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $novemberOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        $desemberRI = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="RI"');
        $desemberOP = DB::select('SELECT SUM(p.nominal) FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = '.$tahun.' WHERE kategori="OP"');
        // dd($anggaran);
        return view('anggaran.report-anggaran-bulanan', $this->data);
        // SELECT ROUND((new2.sumri) * 100.0 / ri, 2) as persenri, ROUND((new2.sumop) * 100.0 / op, 2) as persenop, new2.sumri, new2.sumop, new2.Bln, new2.thn, new2.jlh from (SELECT (SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)=new1.tahun and MONTH(tanggal_pencairan)=new1.bulan and kategori='RI') as sumri, (SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)=new1.tahun and MONTH(tanggal_pencairan)=new1.bulan and kategori='OP') as sumop, new1.bulan as Bln, new1.tahun as thn, new1.jumlah as jlh from (SELECT MONTH(tanggal_pencairan) as bulan, YEAR(tanggal_pencairan) as tahun, COUNT(NOMINAL) as jumlah from pencairan where MONTH(tanggal_pencairan) = 7 and YEAR(tanggal_pencairan) = 2017) new1) new2, anggaran where anggaran.tahun=2017
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
        $this->data['pengeluaran_rinci'] = DB::select('SELECT * from pencairan where YEAR(tanggal_pencairan) = '.$tahun_anggaran.' and MONTH(tanggal_pencairan) = '.$idbulan.' ORDER BY tanggal_pencairan');
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
        $year = intval($tanggal);
        // dd($year);

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
        if($kategori=='OP')
        {
            DB::select('UPDATE anggaran SET used_op=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="OP") where tahun='.$year.'');
        }
        else if($kategori=='RI')
        {
            DB::select('UPDATE anggaran SET used_ri=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="RI") where tahun='.$year.'');
        }
        return Redirect::back();
    }
}
