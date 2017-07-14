<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function edit_profile()
    {
    	if(Auth::check()){
    		$this->data['nip'] = Auth::user()->nip;
    		$this->data['email'] = Auth::user()->email;
    		return view('profile.edit-profile', $this->data);
    	}
    	else{
    		return redirect('autentikasi');
    	}
    }

    public function save_edit_profile(Request $request)
    {
    	if(Auth::check()){
    		$myself = User::find(Auth::user()->id);
    		$confirmation = $request->confirmpassword;

    		if(Hash::check($confirmation, $myself->password)){
    			$user = User::find(Auth::user()->id);
	    		$user->nip = Input::get('nip');
	    		$user->email = Input::get('email');
	    		if(!is_null($request->password)){
	    			$user->password = bcrypt($request->password);
	    		}


	    		if(!is_null($request->file('gambar'))){
	    			$file = $request->file('gambar');
	    			$fileExtension = $file->getClientOriginalExtension();
	    			$path = "user/";
	    			$fileName = date("Y-m-d-H-i-s").'-'.Auth::user()->id.'.'.$fileExtension;
	    			$file->move($path, $fileName);
	    			$user->image_path = $path.$fileName;
	    		}
	    		$user->save();
    		}
    		return redirect('dashboard');
    	}
    	else{
    		return redirect('dashboard');
    	}
    }
}
