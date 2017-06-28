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
    	return view('dashboard.dashboard', $this->data);
    	
    	// else
    	// {
    	// 	return redirect('autentikasi');
    	// }
    }
}
