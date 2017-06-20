<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function save_tambahkan_issue()
    {
    	//
    }

    public function save_edit_issue()
    {
    	//
    }
}
