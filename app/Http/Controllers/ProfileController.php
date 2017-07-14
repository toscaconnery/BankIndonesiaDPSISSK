<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function edit_profile()
    {
    	if(Auth::check()){
    		return view('profile.edit-profile');
    	}
    	else{
    		return redirect('autentikasi');
    	}
    }
}
