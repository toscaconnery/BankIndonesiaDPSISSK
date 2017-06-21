<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$this->data['issue'] = DB::select('SELECT i.*, u.name FROM issue i, users u WHERE i.status = "On Progress" OR i.status = "Pending" AND u.id = i.pic ORDER BY i.created_at DESC');
    	return view('dashboard.dashboard', $this->data);
    }
}
