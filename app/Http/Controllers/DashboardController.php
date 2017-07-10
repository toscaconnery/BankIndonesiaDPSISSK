<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $this->data['anggaran'] = DB::select('SELECT tahun,ri,op,used_ri,used_op from anggaran where tahun=YEAR(now()) limit 1');
    	// dd($this->data['anggaran']);
        $this->data['anggaranada']=1;
        if(empty($this->data['anggaran']))
        {
            $this->data['anggaranada']=0;
        }
        
        // $this->data['anggaran2'] = 
        // dd($this->data['anggaran']);
        $this->data['januariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['januariOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['februariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['februariOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['maretRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['maretOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['aprilRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['aprilOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['meiRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['meiOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['juniRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['juniOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['juliRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['juliOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['agustusRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['agustusOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['septemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['septemberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['oktoberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['oktoberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['novemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['novemberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        $this->data['desemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="RI"')[0];
        $this->data['desemberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = YEAR(now()) AND p.kategori="OP"')[0];
        
        return view('dashboard.dashboard', $this->data);
    	// }
    	// else
    	// {
    	// 	return redirect('autentikasi');
    	// }
    }
}
