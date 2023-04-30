<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Controller_utama extends Controller
{
    public function index()
    {
    	return 'hello world';
    }

    public function create_user($email)
    {
    	$insert=User::create([
    		'name' => $email,
    		'email' => $email,
    		'password' => bcrypt('asd'),
    	]);
    	if($insert){
    		return 'sukses';
    	}
    }
    public function login_aksi(Request $data)
    {
        $validator = Validator::make($data->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){      
            return view('login1')->withErrors($validator->errors());
        }

        if(Auth::attempt(['email' => $data->email, 'password' => $data->password])){
            return redirect('/dashboard');
        }

    	// return redirect('/loginpage');
        return redirect('/login_page')->withErrors([
            'message' =>'User atau password salah'
        ]);
    }

    public function aksi_register(Request $data)
    {
    	$validator = Validator::make($data->all(),[
    		'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password1' => 'required',
        ]);
        if($validator->fails()){      
            return redirect('/register')->withErrors($validator->errors());
        };

    	if($data->password != $data->password1){
    		return redirect('/register')->withErrors([
    			'message'=> 'password tidak cocok'
    		]);
    	};
    	$insert=User::create([
    		'name' => $data->nama,
    		'email' => $data->email,
    		'password' => bcrypt($data->password),
    	]);

    	return redirect('/login_page')->withErrors([
    			'message_success'=> 'register berhasil'
    		]);

    	
    }

    public function login_page()
    {
        if(!Auth::user()){
            return view('login1');
        }else{
            return view('dashboard');
        }
    }

    public function dashboard()
    {
    	if(Auth::user()){
            return view('login1');
        }else{
            return view('dashboard');
        }
    }

    public function register()
    {
    	return view('register1');
    }

    public function logout() {
        try {
            session()->flush();
            // Auth::user()->token()->revoke();
            // Auth::user()->token()->delete();
            return redirect('/login_page');
        } catch (Exception $e) {
            return redirect('/dashboard');
        }
    }
}


