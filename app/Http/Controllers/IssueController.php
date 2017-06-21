<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Issue;

class IssueController extends Controller
{
    public function list_issue()
    {
        return view('issue.list-issue');
    }

    public function list_all_issue()
    {
        return view('issue.list-all-issue');
    }

    public function input_issue()
    {
    	return view('issue.input-issue');
    }

    public function edit_issue()
    {
        
    	return view('issue.edit-issue');
    }

    public function save_input_issue()
    {
    	$issue = new Issue;
        $issue->judul = Input::get('judul');
        $issue->isi = Input::get('isi');

        if( Auth::check() ){
            $issue->pic = Auth::id();
        }
        else{
            $issue->pic = 0;
        }
        $issue->status = 'Pending';

        $issue->save();
        return redirect('list-issue');
    }

    public function save_edit_issue()
    {
    	//
    }
}
