<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Issue;
use DB;

class IssueController extends Controller
{
    public function list_issue()
    {
        $this->data['issue'] = DB::select('SELECT i.* FROM issue i 
                                            WHERE i.status = "On Progress" 
                                            OR i.status = "Pending" 
                                            ORDER BY i.created_at DESC');
        //dd($this->data['issue']);
        return view('issue.list-issue', $this->data);
    }

    public function list_all_issue()
    {
        $this->data['issue'] = DB::select('SELECT i.* FROM issue i 
                                            ORDER BY i.created_at DESC');
        return view('issue.list-all-issue', $this->data);
    }

    public function input_issue()
    {
    	return view('issue.input-issue');
    }

    public function edit_issue($id)
    {
        $this->data['issue'] = DB::select('SELECT i.* FROM issue i WHERE i.id = '.$id)[0];
    	return view('issue.edit-issue', $this->data);
    }

    public function save_input_issue()
    {   
    	$issue = new Issue;
        $issue->judul = Input::get('judul');
        $issue->isi = Input::get('isi');
        if( Auth::check() ){
            $issue->pic = Auth::user()->name;
        }
        else{
            $issue->pic = 'Unknown';
        }
        $issue->status = 'Pending';
        $issue->save();
        return redirect('list-issue');
    }

    public function save_edit_issue($id)
    {
    	$issue = Issue::find($id);
        $issue->judul = Input::get('judul');
        $issue->isi = Input::get('isi');
        $issue->status = Input::get('status');
        $issue->tindak_lanjut = Input::get('tindak_lanjut');
        if( Auth::check() ){
            $issue->pic_tindak_lanjut = Auth::user()->name;
        }
        else{
            $issue->pic_tindak_lanjut = "Unknown";
        }
        $issue->save();
        return redirect('list-issue');
    }
}
