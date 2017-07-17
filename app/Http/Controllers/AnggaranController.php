<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Anggaran;
use App\Pencairan;
use Auth;
use DB;
use Redirect;
use Alert;

class AnggaranController extends Controller
{
    public function report_anggaran_tahunan()
    {
        $this->data['anggaran'] = DB::select('SELECT a.*,used_ri+used_op as used_total, ROUND(used_ri * 100.0 / ri, 2) as persen_ri, ROUND(used_op * 100.0 / op, 2) as persen_op, nominal-used_ri-used_op as sisa, ROUND((used_ri+used_op) * 100.0 / nominal, 2) as persen_realisasi, ROUND(100-(used_ri+used_op) * 100.0 / nominal, 2) as persen_used FROM anggaran a ORDER BY a.created_at DESC');
        $this->data['anggaranedit'] = DB::select('SELECT a.* FROM anggaran a ORDER BY a.created_at DESC');
        $this->data['anggaranscript'] = DB::select('SELECT a.* FROM anggaran a ORDER BY a.created_at DESC');
        return view('anggaran.report-anggaran-tahunan', $this->data);
    }

    public function report_anggaran_bulanan($tahun)
    {
        $this->data['tahun_anggaran'] = $tahun;
        
        $this->data['anggaran'] = DB::select('SELECT * from anggaran where tahun='.$tahun.'')[0];
        $this->data['nominal']=DB::select('SELECT MONTH(tanggal_pencairan) as idbulan, MONTHNAME(tanggal_pencairan) as Bulan,COUNT(nominal) as Jumlah FROM pencairan WHERE YEAR(tanggal_pencairan) = '.$tahun.' GROUP BY MONTH(tanggal_pencairan)');
        
        $this->data['totaljanuari'] = 0;
        $this->data['januariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['januariOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        
        if ($this->data['januariRI'])
        {
            $this->data['totaljanuari'] = $this->data['totaljanuari'] + $this->data['januariRI']->sumri;
            $this->data['persenjanuariRI'] = ($this->data['januariRI']->sumri/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['januariOP'])
        {
            $this->data['totaljanuari'] = $this->data['totaljanuari'] + $this->data['januariOP']->sumop;
            $this->data['persenjanuariOP'] = ($this->data['januariOP']->sumop/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttljanuari'] = ROUND(($this->data['totaljanuari']/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranjanuari']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==1)
                {
                    $this->data['jlhpengeluaranjanuari']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }

        $this->data['totalfebruari'] = 0;
        $this->data['februariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['februariOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['februariRI'])
        {
            $this->data['totalfebruari'] = $this->data['totalfebruari'] + $this->data['februariRI']->sumri;
            $this->data['persenfebruariRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['februariOP'])
        {
            $this->data['totalfebruari'] = $this->data['totalfebruari'] + $this->data['februariOP']->sumop;
            $this->data['persenfebruariOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlfebruari'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranfebruari']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==2)
                {
                    $this->data['jlhpengeluaranfebruari']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totalmaret'] = 0;
        $this->data['maretRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['maretOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['maretRI'])
        {
            $this->data['totalmaret'] = $this->data['totalmaret'] + $this->data['maretRI']->sumri;
            $this->data['persenmaretRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['maretOP'])
        {
            $this->data['totalmaret'] = $this->data['totalmaret'] + $this->data['maretOP']->sumop;
            $this->data['persenmaretOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlmaret'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranmaret']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==3)
                {
                    $this->data['jlhpengeluaranmaret']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totalapril'] = 0;
        $this->data['aprilRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['aprilOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['aprilRI'])
        {
            $this->data['totalapril'] = $this->data['totalapril'] + $this->data['aprilRI']->sumri;
            $this->data['persenaprilRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['aprilOP'])
        {
            $this->data['totalapril'] = $this->data['totalapril'] + $this->data['aprilOP']->sumop;
            $this->data['persenaprilOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlapril'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranapril']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==4)
                {
                    $this->data['jlhpengeluaranapril']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totalmei'] = 0;
        $this->data['meiRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['meiOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['meiRI'])
        {
            $this->data['totalmei'] = $this->data['totalmei'] + $this->data['meiRI']->sumri;
            $this->data['persenmeiRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['meiOP'])
        {
            $this->data['totalmei'] = $this->data['totalmei'] + $this->data['meiOP']->sumop;
            $this->data['persenmeiOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlmei'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranmei']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==5)
                {
                    $this->data['jlhpengeluaranmei']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totaljuni'] = 0;
        $this->data['juniRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['juniOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['juniRI'])
        {
            $this->data['totaljuni'] = $this->data['totaljuni'] + $this->data['juniRI']->sumri;
            $this->data['persenjuniRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['juniOP'])
        {
            $this->data['totaljuni'] = $this->data['totaljuni'] + $this->data['juniOP']->sumop;
            $this->data['persenjuniOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttljuni'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranjuni']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==6)
                {
                    $this->data['jlhpengeluaranjuni']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totaljuli'] = 0;
        $this->data['juliRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['juliOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['juliRI'])
        {
            $this->data['totaljuli'] = $this->data['totaljuli'] + $this->data['juliRI']->sumri;
            $this->data['persenjuliRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['juliOP'])
        {
            $this->data['totaljuli'] = $this->data['totaljuli'] + $this->data['juliOP']->sumop;
            $this->data['persenjuliOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop+$this->data['juliOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttljuli'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni']+$this->data['totaljuli'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranjuli']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==7)
                {
                    $this->data['jlhpengeluaranjuli']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totalagustus'] = 0;
        $this->data['agustusRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['agustusOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['agustusRI'])
        {
            $this->data['totalagustus'] = $this->data['totalagustus'] + $this->data['agustusRI']->sumri;
            $this->data['persenagustusRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['agustusOP'])
        {
            $this->data['totalagustus'] = $this->data['totalagustus'] + $this->data['agustusOP']->sumop;
            $this->data['persenagustusOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop+$this->data['juliOP']->sumop+$this->data['agustusOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlagustus'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni']+$this->data['totaljuli']+$this->data['totalagustus'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranagustus']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==8)
                {
                    $this->data['jlhpengeluaranagustus']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totalseptember'] = 0;
        $this->data['septemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['septemberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['septemberRI'])
        {
            $this->data['totalseptember'] = $this->data['totalseptember'] + $this->data['septemberRI']->sumri;
            $this->data['persenseptemberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['septemberOP'])
        {
            $this->data['totalseptember'] = $this->data['totalseptember'] + $this->data['septemberOP']->sumop;
            $this->data['persenseptemberOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop+$this->data['juliOP']->sumop+$this->data['agustusOP']->sumop+$this->data['septemberOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlseptember'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni']+$this->data['totaljuli']+$this->data['totalagustus']+$this->data['totalseptember'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranseptember']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==9)
                {
                    $this->data['jlhpengeluaranseptember']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totaloktober'] = 0;
        $this->data['oktoberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['oktoberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['oktoberRI'])
        {
            $this->data['totaloktober'] = $this->data['totaloktober'] + $this->data['oktoberRI']->sumri;
            $this->data['persenoktoberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri+$this->data['oktoberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['oktoberOP'])
        {
            $this->data['totaloktober'] = $this->data['totaloktober'] + $this->data['oktoberOP']->sumop;
            $this->data['persenoktoberOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop+$this->data['juliOP']->sumop+$this->data['agustusOP']->sumop+$this->data['septemberOP']->sumop+$this->data['oktoberOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttloktober'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni']+$this->data['totaljuli']+$this->data['totalagustus']+$this->data['totalseptember']+$this->data['totaloktober'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluaranoktober']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==10)
                {
                    $this->data['jlhpengeluaranoktober']=$this->data['nominal'][$i]->Jumlah;
                }
            }
        }
        
        $this->data['totalnovember'] = 0;
        $this->data['novemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['novemberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['novemberRI'])
        {
            $this->data['totalnovember'] = $this->data['totalnovember'] + $this->data['novemberRI']->sumri;
            $this->data['persenoktoberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri+$this->data['oktoberRI']->sumri+$this->data['novemberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['novemberOP'])
        {
            $this->data['totalnovember'] = $this->data['totalnovember'] + $this->data['novemberOP']->sumop;
            $this->data['persenoktoberOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop+$this->data['juliOP']->sumop+$this->data['agustusOP']->sumop+$this->data['septemberOP']->sumop+$this->data['oktoberOP']->sumop+$this->data['novemberOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttlnovember'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni']+$this->data['totaljuli']+$this->data['totalagustus']+$this->data['totalseptember']+$this->data['totaloktober']+$this->data['totalnovember'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluarannovember']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==11)
                {
                    $this->data['jlhpengeluarannovember']=$this->data['nominal'][$i]->Jumlah;
                }
                else
                {
                    $this->data['jlhpengeluarannovember']=0;
                }
            }
        }
        
        $this->data['totaldesember'] = 0;
        $this->data['desemberRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['desemberOP'] = DB::select('SELECT SUM(p.nominal) as sumop FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="OP"')[0];
        if ($this->data['desemberRI'])
        {
            $this->data['totaldesember'] = $this->data['totaldesember'] + $this->data['desemberRI']->sumri;
            $this->data['persenoktoberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri+$this->data['oktoberRI']->sumri+$this->data['novemberRI']->sumri+$this->data['novemberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['desemberOP'])
        {
            $this->data['totaldesember'] = $this->data['totaldesember'] + $this->data['desemberOP']->sumop;
            $this->data['persenoktoberOP'] = (($this->data['januariOP']->sumop+$this->data['februariOP']->sumop+$this->data['maretOP']->sumop+$this->data['aprilOP']->sumop+$this->data['meiOP']->sumop+$this->data['juniOP']->sumop+$this->data['juliOP']->sumop+$this->data['agustusOP']->sumop+$this->data['septemberOP']->sumop+$this->data['oktoberOP']->sumop+$this->data['novemberOP']->sumop+$this->data['novemberOP']->sumop)/$this->data['anggaran']->op)*100;
        }
        $this->data['persenttldesember'] = ROUND((($this->data['totaljanuari']+$this->data['totalfebruari']+$this->data['totalmaret']+$this->data['totalapril']+$this->data['totalmei']+$this->data['totaljuni']+$this->data['totaljuli']+$this->data['totalagustus']+$this->data['totalseptember']+$this->data['totaloktober']+$this->data['totalnovember']+$this->data['totaldesember'])/$this->data['anggaran']->nominal)*100,2);
        $this->data['jlhpengeluarandesember']=0;
        for ($i=0; $i<12; $i++)
        {
            if (isset($this->data['nominal'][$i]))
            {
                if($this->data['nominal'][$i]->idbulan==12)
                {
                    $this->data['jlhpengeluarandesember']=$this->data['nominal'][$i]->Jumlah;
                }
                else
                {
                    $this->data['jlhpengeluarandesember']=0;
                }
            }
        }

        return view('anggaran.report-anggaran-bulanan', $this->data);
    }

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
        if($this->data['numbulan']==1)
        {
            $this->data['namabulan']='Januari';
        }
        else if($this->data['numbulan']==2)
        {
            $this->data['namabulan']='Februari';
        }
        else if($this->data['numbulan']==3)
        {
            $this->data['namabulan']='Maret';
        }
        else if($this->data['numbulan']==4)
        {
            $this->data['namabulan']='April';
        }
        else if($this->data['numbulan']==5)
        {
            $this->data['namabulan']='Mei';
        }
        else if($this->data['numbulan']==6)
        {
            $this->data['namabulan']='Juni';
        }
        else if($this->data['numbulan']==7)
        {
            $this->data['namabulan']='Juli';
        }  
        else if($this->data['numbulan']==8)
        {
            $this->data['namabulan']='Agustus';
        }
        else if($this->data['numbulan']==9)
        {
            $this->data['namabulan']='September';
        }
        else if($this->data['numbulan']==10)
        {
            $this->data['namabulan']='Oktober';
        }
        else if($this->data['numbulan']==11)
        {
            $this->data['namabulan']='November';
        } 
        else if($this->data['numbulan']==12)
        {
            $this->data['namabulan']='Desember';
        }        

        $this->data['pengeluaran_rinci'] = DB::select('SELECT * from pencairan where YEAR(tanggal_pencairan) = '.$tahun_anggaran.' and MONTH(tanggal_pencairan) = '.$idbulan.' ORDER BY tanggal_pencairan');
        $this->data['pengeluaran_rinci_edit'] = DB::select('SELECT * from pencairan where YEAR(tanggal_pencairan) = '.$tahun_anggaran.' and MONTH(tanggal_pencairan) = '.$idbulan.' ORDER BY tanggal_pencairan');
        $this->data['pengeluaran_rinci_modal'] = DB::select('SELECT * from pencairan where YEAR(tanggal_pencairan) = '.$tahun_anggaran.' and MONTH(tanggal_pencairan) = '.$idbulan.' ORDER BY tanggal_pencairan');
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
        $anggaran->used_ri = 0;
        $anggaran->used_op = 0;
    	if( Auth::check() )
        {
            $anggaran->pic = Auth::user()->name;
        }
        else{
            $anggaran->pic = 'Unknown';
        }

        if($anggaran->save())
        {
            Alert::success("Anggaran $tahun Berhasil Ditambahkan!");
        }
        else
        {
            Alert::error("Anggaran Gagal Ditambahkan!");
        }
        return redirect('report-anggaran-tahunan');
    }

    public function save_edit_anggaran_tahunan()
    {
        $tahun = Input::get('tahunEdit');
        $nominal = Input::get('nominalEdit');
        $ri = Input::get('riEdit');
        $op = Input::get('opEdit');

        if( Auth::check() )
        {
            $pic = Auth::user()->name;
        }
        else{
            $pic = 'Unknown';
        }

        if(!is_null($tahun))
        {
            DB::select('UPDATE anggaran SET ri='.$ri.', op='.$op.', nominal='.$nominal.', pic="'.$pic.'" where tahun='.$tahun.'');
            Alert::success("Anggaran $tahun Berhasil Diubah!");
        }
        else
        {
            Alert::error("Anggaran $tahun Gagal Diubah");
        }
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
        if( Auth::check() )
        {
            $pengeluaran->pic = Auth::user()->name;
        }
        else{
            $pengeluaran->pic = 'Unknown';
        }

        if($pengeluaran->save())
        {
            Alert::success("Pengeluaran Berhasil Ditambahkan!");
        }
        else
        {
            Alert::error("Pengeluaran Gagal Ditambahkan!");
        }

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

    public function save_edit_pengeluaran()
    {
        $tanggaledit = Input::get('tanggaledit');
        $kategoriedit = Input::get('kategoriedit');
        $nominaledit = Input::get('nominaledit');
        $keteranganedit = Input::get('keteranganedit');
        $idpencairan = Input::get('idpencairan');
        $year = intval($tanggaledit);
        // dd($year);
        $tgl_real = date("Y-m-d", strtotime($tanggaledit));
        // dd($tgl_real);
        if( Auth::check() )
        {
            $picedit = Auth::user()->name;
        }
        else{
            $picedit = 'Unknown';
        }

        if(!is_null($idpencairan))
        {
            DB::select('UPDATE pencairan SET tanggal_pencairan="'.$tgl_real.'", kategori="'.$kategoriedit.'", nominal='.$nominaledit.', pic="'.$picedit.'", keterangan="'.$keteranganedit.'" where id='.$idpencairan.'');
            DB::select('UPDATE anggaran SET used_op=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="OP") where tahun='.$year.'');
            DB::select('UPDATE anggaran SET used_ri=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="RI") where tahun='.$year.'');
            Alert::success("Pencairan Berhasil Diubah!");
        }
        else
        {
            Alert::error("Pencairan Gagal Diubah");
        }
    
        return Redirect::back();
    }
}
