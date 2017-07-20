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
use Excel;

class AnggaranController extends Controller
{
    public function report_anggaran_tahunan()
    {
        $this->data['anggaran'] = DB::select('SELECT a.*,used_ri+used_ao as used_total, ROUND(used_ri * 100.0 / ri, 2) as persen_ri, ROUND(used_ao * 100.0 / ao, 2) as persen_ao, nominal-used_ri-used_ao as sisa, ROUND((used_ri+used_ao) * 100.0 / nominal, 2) as persen_realisasi, ROUND(100-(used_ri+used_ao) * 100.0 / nominal, 2) as persen_used FROM anggaran a ORDER BY a.created_at DESC');
        $this->data['anggaranedit'] = DB::select('SELECT a.* FROM anggaran a ORDER BY a.created_at DESC');
        $this->data['anggaranscript'] = DB::select('SELECT a.* FROM anggaran a ORDER BY a.created_at DESC');
        $this->data['listAnggaran'] = DB::select('SELECT a.* FROM anggaran a ORDER BY a.created_at DESC');
        return view('anggaran.report-anggaran-tahunan', $this->data);
    }

    public function report_anggaran_bulanan($tahun)
    {
        $this->data['tahun_anggaran'] = $tahun;
        
        $this->data['anggaran'] = DB::select('SELECT * from anggaran where tahun='.$tahun.'')[0];
        $this->data['nominal']=DB::select('SELECT MONTH(tanggal_pencairan) as idbulan, MONTHNAME(tanggal_pencairan) as Bulan,COUNT(nominal) as Jumlah FROM pencairan WHERE YEAR(tanggal_pencairan) = '.$tahun.' GROUP BY MONTH(tanggal_pencairan)');

        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p');
        
        $this->data['totaljanuari'] = 0;
        $this->data['januariRI'] = DB::select('SELECT SUM(p.nominal) as sumri FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="RI"')[0];
        $this->data['januariAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 1 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        
        if ($this->data['januariRI'])
        {
            $this->data['totaljanuari'] = $this->data['totaljanuari'] + $this->data['januariRI']->sumri;
            $this->data['persenjanuariRI'] = ($this->data['januariRI']->sumri/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['januariAO'])
        {
            $this->data['totaljanuari'] = $this->data['totaljanuari'] + $this->data['januariAO']->sumao;
            $this->data['persenjanuariAO'] = ($this->data['januariAO']->sumao/$this->data['anggaran']->ao)*100;
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
        $this->data['februariAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 2 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['februariRI'])
        {
            $this->data['totalfebruari'] = $this->data['totalfebruari'] + $this->data['februariRI']->sumri;
            $this->data['persenfebruariRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['februariAO'])
        {
            $this->data['totalfebruari'] = $this->data['totalfebruari'] + $this->data['februariAO']->sumao;
            $this->data['persenfebruariAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['maretAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 3 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['maretRI'])
        {
            $this->data['totalmaret'] = $this->data['totalmaret'] + $this->data['maretRI']->sumri;
            $this->data['persenmaretRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['maretAO'])
        {
            $this->data['totalmaret'] = $this->data['totalmaret'] + $this->data['maretAO']->sumao;
            $this->data['persenmaretAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['aprilAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 4 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['aprilRI'])
        {
            $this->data['totalapril'] = $this->data['totalapril'] + $this->data['aprilRI']->sumri;
            $this->data['persenaprilRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['aprilAO'])
        {
            $this->data['totalapril'] = $this->data['totalapril'] + $this->data['aprilAO']->sumao;
            $this->data['persenaprilAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['meiAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) =  5 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['meiRI'])
        {
            $this->data['totalmei'] = $this->data['totalmei'] + $this->data['meiRI']->sumri;
            $this->data['persenmeiRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['meiAO'])
        {
            $this->data['totalmei'] = $this->data['totalmei'] + $this->data['meiAO']->sumao;
            $this->data['persenmeiAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['juniAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 6 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['juniRI'])
        {
            $this->data['totaljuni'] = $this->data['totaljuni'] + $this->data['juniRI']->sumri;
            $this->data['persenjuniRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['juniAO'])
        {
            $this->data['totaljuni'] = $this->data['totaljuni'] + $this->data['juniAO']->sumao;
            $this->data['persenjuniAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['juliAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 7 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['juliRI'])
        {
            $this->data['totaljuli'] = $this->data['totaljuli'] + $this->data['juliRI']->sumri;
            $this->data['persenjuliRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['juliAO'])
        {
            $this->data['totaljuli'] = $this->data['totaljuli'] + $this->data['juliAO']->sumao;
            $this->data['persenjuliAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao+$this->data['juliAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['agustusAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 8 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['agustusRI'])
        {
            $this->data['totalagustus'] = $this->data['totalagustus'] + $this->data['agustusRI']->sumri;
            $this->data['persenagustusRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['agustusAO'])
        {
            $this->data['totalagustus'] = $this->data['totalagustus'] + $this->data['agustusAO']->sumao;
            $this->data['persenagustusAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao+$this->data['juliAO']->sumao+$this->data['agustusAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['septemberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 9 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['septemberRI'])
        {
            $this->data['totalseptember'] = $this->data['totalseptember'] + $this->data['septemberRI']->sumri;
            $this->data['persenseptemberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['septemberAO'])
        {
            $this->data['totalseptember'] = $this->data['totalseptember'] + $this->data['septemberAO']->sumao;
            $this->data['persenseptemberAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao+$this->data['juliAO']->sumao+$this->data['agustusAO']->sumao+$this->data['septemberAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['oktoberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 10 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['oktoberRI'])
        {
            $this->data['totaloktober'] = $this->data['totaloktober'] + $this->data['oktoberRI']->sumri;
            $this->data['persenoktoberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri+$this->data['oktoberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['oktoberAO'])
        {
            $this->data['totaloktober'] = $this->data['totaloktober'] + $this->data['oktoberAO']->sumao;
            $this->data['persenoktoberAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao+$this->data['juliAO']->sumao+$this->data['agustusAO']->sumao+$this->data['septemberAO']->sumao+$this->data['oktoberAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['novemberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 11 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['novemberRI'])
        {
            $this->data['totalnovember'] = $this->data['totalnovember'] + $this->data['novemberRI']->sumri;
            $this->data['persenoktoberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri+$this->data['oktoberRI']->sumri+$this->data['novemberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['novemberAO'])
        {
            $this->data['totalnovember'] = $this->data['totalnovember'] + $this->data['novemberAO']->sumao;
            $this->data['persenoktoberAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao+$this->data['juliAO']->sumao+$this->data['agustusAO']->sumao+$this->data['septemberAO']->sumao+$this->data['oktoberAO']->sumao+$this->data['novemberAO']->sumao)/$this->data['anggaran']->ao)*100;
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
        $this->data['desemberAO'] = DB::select('SELECT SUM(p.nominal) as sumao FROM pencairan p WHERE MONTH(p.tanggal_pencairan) = 12 AND YEAR(p.tanggal_pencairan) = '.$tahun.' AND p.kategori="AO"')[0];
        if ($this->data['desemberRI'])
        {
            $this->data['totaldesember'] = $this->data['totaldesember'] + $this->data['desemberRI']->sumri;
            $this->data['persenoktoberRI'] = (($this->data['januariRI']->sumri+$this->data['februariRI']->sumri+$this->data['maretRI']->sumri+$this->data['aprilRI']->sumri+$this->data['meiRI']->sumri+$this->data['juniRI']->sumri+$this->data['juliRI']->sumri+$this->data['agustusRI']->sumri+$this->data['septemberRI']->sumri+$this->data['oktoberRI']->sumri+$this->data['novemberRI']->sumri+$this->data['novemberRI']->sumri)/$this->data['anggaran']->ri)*100;
        }
        if ($this->data['desemberAO'])
        {
            $this->data['totaldesember'] = $this->data['totaldesember'] + $this->data['desemberAO']->sumao;
            $this->data['persenoktoberAO'] = (($this->data['januariAO']->sumao+$this->data['februariAO']->sumao+$this->data['maretAO']->sumao+$this->data['aprilAO']->sumao+$this->data['meiAO']->sumao+$this->data['juniAO']->sumao+$this->data['juliAO']->sumao+$this->data['agustusAO']->sumao+$this->data['septemberAO']->sumao+$this->data['oktoberAO']->sumao+$this->data['novemberAO']->sumao+$this->data['novemberAO']->sumao)/$this->data['anggaran']->ao)*100;
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

    public function download_anggaran_rinci($tahun_anggaran,$idbulan)
    {
        //BAGIAN BULAN
        $anggaran = Anggaran::where('tahun', $tahun_anggaran)->first();
        if(!is_null($anggaran)){
            $totalAnggaranRI = $anggaran->ri;
            $totalAnggaranAO = $anggaran->ao;
            $totalAnggaranNominal = $anggaran->nominal;
            for($i = 1; $i <= $idbulan; $i++){
                $bulan[$i]['BULAN'] = $this->angka_ke_bulan($i);
                $bulan[$i]['RI'] = 0;
                $bulan[$i]['PENYERAPAN RI'] = 0;
                $bulan[$i]['AO'] = 0;
                $bulan[$i]['PENYERAPAN AO'] = 0;
                $bulan[$i]['TOTAL'] = 0;
                $bulan[$i]['PENYERAPAN TOTAL'] = 0;
            }
            $pencairanTahunan = DB::select('SELECT SUM(p.nominal) AS nominal, MONTH(p.tanggal_pencairan) AS bulan, p.kategori AS kategori  FROM pencairan p WHERE YEAR(p.tanggal_pencairan) = '.$tahun_anggaran.' GROUP BY MONTH(p.tanggal_pencairan), p.kategori');

            foreach($pencairanTahunan as $data){
                if($data->kategori == "RI"){
                    $bulan[$data->bulan]['RI'] = $data->nominal;
                }
                elseif($data->kategori == "AO"){
                    $bulan[$data->bulan]['AO'] = $data->nominal;
                }   
            }
            $riRunDate = 0;
            $aoRunDate = 0;
            $totalRunDate = 0;
            for($i = 1; $i <= $idbulan; $i++){
                //$bulan[$i]['PENYERAPAN RI'] =  number_format($bulan[$i]['PENYERAPAN RI'], 2, '.', '');
                $bulan[$i]['PENYERAPAN RI'] =  round($bulan[$i]['PENYERAPAN RI'], 2);
                $bulan[$i]['TOTAL'] = $bulan[$i]['RI'] + $bulan[$i]['AO'];
                $riRunDate = $riRunDate + $bulan[$i]['RI'];
                $aoRunDate = $aoRunDate + $bulan[$i]['AO'];
                $totalRunDate = $totalRunDate + $bulan[$i]['TOTAL'];
                $bulan[$i]['PENYERAPAN RI'] = ($riRunDate / (float) $totalAnggaranRI) * 100;
                $bulan[$i]['PENYERAPAN AO'] = ($aoRunDate / (float) $totalAnggaranAO) * 100;
                $bulan[$i]['PENYERAPAN TOTAL'] = ($totalRunDate / (float) $totalAnggaranNominal) * 100;
            }
            for($i = 1; $i <= $idbulan; $i++){
                if($bulan[$i]['RI'] == 0){
                    $bulan[$i]['RI'] = "0";
                }
                if($bulan[$i]['AO'] == 0){
                    $bulan[$i]['AO'] = "0";
                }
                if($bulan[$i]['TOTAL'] == 0){
                    $bulan[$i]['TOTAL'] = "0";
                }
                if($bulan[$i]['PENYERAPAN RI'] == 0){
                    $bulan[$i]['PENYERAPAN RI'] = "0";
                }
                if($bulan[$i]['PENYERAPAN AO'] == 0){
                    $bulan[$i]['PENYERAPAN AO'] = "0";
                }
                if($bulan[$i]['PENYERAPAN TOTAL'] == 0){
                    $bulan[$i]['PENYERAPAN TOTAL'] = "0";
                }

                $bulan[$i]['PENYERAPAN RI'] = $bulan[$i]['PENYERAPAN RI']."%";
                $bulan[$i]['PENYERAPAN AO'] = $bulan[$i]['PENYERAPAN AO']."%";
                $bulan[$i]['PENYERAPAN TOTAL'] = $bulan[$i]['PENYERAPAN TOTAL']."%";
            }
        }
        $pengeluaranBulan = array();
        $pengeluaranBulan[0] = $bulan[$idbulan];

        //BAGIAN TAHUN
        $pengeluaranTahun[0]['TAHUN'] = $anggaran->tahun;
        $pengeluaranTahun[0]['RI'] = $anggaran->ri;
        $pengeluaranTahun[0]['AO'] = $anggaran->ao;
        $pengeluaranTahun[0]['TOTAL'] = $anggaran->nominal;
        $pengeluaranTahun[0]['REALISASI RI'] = $anggaran->used_ri;
        $pengeluaranTahun[0]['REALISASI AO'] = $anggaran->used_ao;
        $pengeluaranTahun[0]['REALISASI TOTAL'] = $anggaran->used_ri + $anggaran->used_ao;
        $pengeluaranTahun[0]['SISA ANGGARAN'] = $anggaran->nominal - $anggaran->used_ri - $anggaran->used_ao;

        //BAGIAN RINCI
        $namaBulan = $this->angka_ke_bulan($idbulan);
        $type = "xlsx";
        $pengeluaranObject = DB::select('SELECT p.proyek AS "PROYEK", 
                                        p.tanggal_pencairan AS "TANGGAL PENCAIRAN",
                                        p.kategori AS "KATEGORI",
                                        p.nominal AS "NOMINAL",
                                        p.keterangan AS "KETERANGAN"
                                        FROM pencairan p 
                                        WHERE YEAR(p.tanggal_pencairan) = '.$tahun_anggaran.' AND 
                                        MONTH(p.tanggal_pencairan) = '.$idbulan.' ORDER BY p.tanggal_pencairan');
        foreach($pengeluaranObject as $data){
            $pengeluaranRinci[] = (array)$data;
        }

        if(isset($pengeluaranRinci)){
            return Excel::create('Anggaran Rinci '.$namaBulan.' '.$tahun_anggaran, function($excel) use ($pengeluaranRinci, $pengeluaranBulan, $pengeluaranTahun){
                $excel->sheet('Pengeluaran Rinci', function($sheet) use ($pengeluaranRinci) {
                    $sheet->fromArray($pengeluaranRinci);
                    $sheet->cell('A1:J1', function($cell){
                        $cell->setFontColor("#dd4b38");
                    });
                });
                $excel->sheet('Data Bulan', function($sheet) use ($pengeluaranBulan) {
                    $sheet->fromArray($pengeluaranBulan);
                    $sheet->cell('A1:J1', function($cell){
                        $cell->setFontColor("#dd4b38");
                    });
                });
                $excel->sheet('Data Tahun', function($sheet) use ($pengeluaranTahun) {
                    $sheet->fromArray($pengeluaranTahun);
                    $sheet->cell('A1:J1', function($cell){
                        $cell->setFontColor("#dd4b38");
                    });
                });
            })->download($type);
        }
        else{
            Alert::error("Tidak ada data.");
            return back();
        }
    }

    public function download_anggaran_tahunan()
    {
        $anggaran = DB::select('SELECT a.tahun AS "TAHUN", a.ri AS "RI", a.ao AS "AO", a.nominal AS "TOTAL",  
                                a.used_ri AS "REALISASI RI", ROUND(a.used_ri * 100.0 / a.ri, 2) AS "PERSEN REALISASI RI",
                                a.used_ao AS "REALISASI AO", ROUND(a.used_ao * 100.0 / a.ao, 2) AS "PERSEN REALISASI AO",
                                a.used_ri + a.used_ao AS "REALISASI TOTAL", ROUND((a.used_ri + a.used_ao) * 100.0 / a.nominal, 2) AS "PERSEN REALISASI TOTAL",
                                a.nominal - a.used_ri - a.used_ao AS "SISA", ROUND((a.nominal - a.used_ri - a.used_ao) * 100.0 / a.nominal) AS "PERSEN SISA"
                                FROM anggaran a ORDER BY a.created_at ASC');
        foreach($anggaran as $data){
            $anggaranTahunan[] = (array)$data;
        }
            
        //dd($anggaranTahunan);
        if(isset($anggaranTahunan)){
            foreach($anggaranTahunan as $data){
                if($data['REALISASI RI'] == 0){
                    $data['REALISASI RI'] = ROUND($data['REALISASI RI'] * 100.0, 2);
                    //number_format($data['REALISASI RI'], 2) * 100;
                }
            }
            return Excel::create('Anggaran Tahunan', function($excel)use ($anggaranTahunan){
                $excel->sheet('List Anggaran Tahunan', function($sheet) use ($anggaranTahunan){
                    $sheet->fromArray($anggaranTahunan);
                    $sheet->cell('A1:L1', function($cell){
                        $cell->setFontColor("#dd4b38");
                    });
                });
            })->download('xlsx');
        }
        else{
            Alert::error("Tidak ada data.");
            return back();
        }
    }

    public function download_anggaran_bulanan($tahun_anggaran)
    {
        $bulan = array();
        $anggaran = Anggaran::where('tahun', $tahun_anggaran)->first();
        if(!is_null($anggaran)){
            $totalAnggaranRI = $anggaran->ri;
            $totalAnggaranAO = $anggaran->ao;
            $totalAnggaranNominal = $anggaran->nominal;
            for($i = 1; $i <= 12; $i++){
                $bulan[$i]['BULAN'] = $this->angka_ke_bulan($i);
                $bulan[$i]['RI'] = 0;
                $bulan[$i]['PENYERAPAN RI'] = 0;
                $bulan[$i]['AO'] = 0;
                $bulan[$i]['PENYERAPAN AO'] = 0;
                $bulan[$i]['TOTAL'] = 0;
                $bulan[$i]['PENYERAPAN TOTAL'] = 0;
            }

            $pencairanTahunan = DB::select('SELECT SUM(p.nominal) AS nominal, MONTH(p.tanggal_pencairan) AS bulan, p.kategori AS kategori  FROM pencairan p WHERE YEAR(p.tanggal_pencairan) = '.$tahun_anggaran.' GROUP BY MONTH(p.tanggal_pencairan), p.kategori');

            foreach($pencairanTahunan as $data){
                if($data->kategori == "RI"){
                    $bulan[$data->bulan]['RI'] = $data->nominal;
                }
                elseif($data->kategori == "AO"){
                    $bulan[$data->bulan]['AO'] = $data->nominal;
                }   
            }

            $riRunDate = 0;
            $aoRunDate = 0;
            $totalRunDate = 0;
            for($i = 1; $i <= 12; $i++){
                //$bulan[$i]['PENYERAPAN RI'] =  number_format($bulan[$i]['PENYERAPAN RI'], 2, '.', '');
                $bulan[$i]['PENYERAPAN RI'] =  round($bulan[$i]['PENYERAPAN RI'], 2);
                $bulan[$i]['TOTAL'] = $bulan[$i]['RI'] + $bulan[$i]['AO'];
                $riRunDate = $riRunDate + $bulan[$i]['RI'];
                $aoRunDate = $aoRunDate + $bulan[$i]['AO'];
                $totalRunDate = $totalRunDate + $bulan[$i]['TOTAL'];
                $bulan[$i]['PENYERAPAN RI'] = ($riRunDate / (float) $totalAnggaranRI) * 100;
                $bulan[$i]['PENYERAPAN AO'] = ($aoRunDate / (float) $totalAnggaranAO) * 100;
                $bulan[$i]['PENYERAPAN TOTAL'] = ($totalRunDate / (float) $totalAnggaranNominal) * 100;
            }
            //dd($bulan);

            for($i = 1; $i <= 12; $i++){
                if($bulan[$i]['RI'] == 0){
                    $bulan[$i]['RI'] = "0";
                }
                if($bulan[$i]['AO'] == 0){
                    $bulan[$i]['AO'] = "0";
                }
                if($bulan[$i]['TOTAL'] == 0){
                    $bulan[$i]['TOTAL'] = "0";
                }
                if($bulan[$i]['PENYERAPAN RI'] == 0){
                    $bulan[$i]['PENYERAPAN RI'] = "0";
                }
                if($bulan[$i]['PENYERAPAN AO'] == 0){
                    $bulan[$i]['PENYERAPAN AO'] = "0";
                }
                if($bulan[$i]['PENYERAPAN TOTAL'] == 0){
                    $bulan[$i]['PENYERAPAN TOTAL'] = "0";
                }

                $bulan[$i]['PENYERAPAN RI'] = $bulan[$i]['PENYERAPAN RI']."%";
                $bulan[$i]['PENYERAPAN AO'] = $bulan[$i]['PENYERAPAN AO']."%";
                $bulan[$i]['PENYERAPAN TOTAL'] = $bulan[$i]['PENYERAPAN TOTAL']."%";
            }

            return Excel::create('Anggaran Bulanan Tahun '.$tahun_anggaran, function($excel) use ($bulan){
                $excel->sheet('Pengeluaran ', function($sheet) use ($bulan) {
                    $sheet->fromArray($bulan);
                    $sheet->cell('A1:J1', function($cell){
                        $cell->setFontColor("#dd4b38");
                    });
                    $sheet->getStyle('B')->getNumberFormat();
                });
            })->download('xlsx');

        }
        else{
            Alert::error("Tidak ada anggaran ditahun ".$tahun_anggaran."!");
            return redirect('report-anggaran-tahunan');
        }    
    }

    public function report_anggaran_rinci($tahun_anggaran,$idbulan)
    {
        $this->data['bulan'] = $idbulan;
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
        $this->data['proyek'] = DB::select('SELECT p.* FROM proyek p');
        $this->data['proyekEdit'] = DB::select('SELECT p.* FROM proyek p');
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
        $ao = Input::get('ao');

        $anggaran = new Anggaran;
        $anggaran->tahun = $tahun;
        $anggaran->nominal = $nominal;
        $anggaran->ri = $ri;
        $anggaran->ao = $ao;
        $anggaran->used_ri = 0;
        $anggaran->used_ao = 0;
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
        $ao = Input::get('aoEdit');

        if( Auth::check() )
        {
            $pic = Auth::user()->name;
        }
        else{
            $pic = 'Unknown';
        }

        if(!is_null($tahun))
        {
            DB::select('UPDATE anggaran SET ri='.$ri.', ao='.$ao.', nominal='.$nominal.', pic="'.$pic.'" where tahun='.$tahun.'');
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
        if(!is_null(Input::get('proyek'))){
            $pengeluaran->proyek = Input::get('proyek');
        }
        
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

        if($kategori=='AO')
        {
            DB::select('UPDATE anggaran SET used_ao=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="AO") where tahun='.$year.'');
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
            DB::select('UPDATE anggaran SET used_ao=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="AO") where tahun='.$year.'');
            DB::select('UPDATE anggaran SET used_ri=(SELECT SUM(nominal) from pencairan where YEAR(tanggal_pencairan)='.$year.' and kategori="RI") where tahun='.$year.'');
            Alert::success("Pencairan Berhasil Diubah!");
        }
        else
        {
            Alert::error("Pencairan Gagal Diubah");
        }
    
        return Redirect::back();
    }

    public function angka_ke_bulan($angka)
    {   $bulan = "";
        if($angka == 1){
            $bulan = "Januari";
        }
        elseif($angka == 2){
            $bulan = "Februari";
        }
        elseif($angka == 3){
            $bulan = "Maret";
        }
        elseif($angka == 4){
            $bulan = "April";
        }
        elseif($angka == 5){
            $bulan = "Mei";
        }
        elseif($angka == 6){
            $bulan = "Juni";
        }
        elseif($angka == 7){
            $bulan = "Juli";
        }
        elseif($angka == 8){
            $bulan = "Agustus";
        }
        elseif($angka == 9){
            $bulan = "September";
        }
        elseif($angka == 10){
            $bulan = "Oktober";
        }
        elseif($angka == 11){
            $bulan = "November";
        }
        elseif($angka == 12){
            $bulan = "Desember";
        }
        return $bulan;
    }

    public function downloadPencairan($type)
    {
        $pencairanx = DB::select('SELECT p.nama, p.kodema AS kODe, p.pic FROM proyek p');
        foreach($pencairanx as $data){
            $pencairan[] = (array)$data;
        }
        
        //$pencairan = Pencairan::get()->toArray();
        //dd($pencairan);
        return Excel::create('contohFileExcel', function($excel) use ($pencairan){
            $excel->sheet('mySheet', function($sheet) use ($pencairan) {
                $sheet->fromArray($pencairan);
            });
        })->download($type);
    }
}
