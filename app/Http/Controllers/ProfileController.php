<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\User;
use Hash;
use Alert;

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

    public function halaman_autentikasi()
    {
        return view('auth.login-register');
    }

    public function forgot_password(Request $request)
    {
        $nip = $request->nipForgotPassword;
        $this->data['user'] = User::where('nip', $nip)->first();
        return view('auth.form-lupa-password', $this->data);
    }

    public function reset_password(Request $request)
    {
        $securityAnswer = $request->securityAnswer;
        $nip = $request->nip;
        $password = $request->password;
        $passwordConfirmation = $request->passwordConfirmation;
        $user = User::where('nip', $nip)->first();
        if($user->security_answer == $securityAnswer){
            if($password == $passwordConfirmation){
                $user->password = bcrypt($password);
                $user->save();
                Alert::success('Password berhasil diubah.');
                return redirect('autentikasi');
            }
            else{
                Alert::error('Konfirmasi password salah!');
                return back();
            }
        }
        else{
            Alert::error('Jawaban tidak benar!');
            return back();
        }
    }
}
