<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::attempt(['email' => $data->email, 'password' => $data->password])){
            return view('dashboard');
        }
    	return redirect('/loginpage');
    }

    public function logout() {
        return 1;
        try {
            session()->flush();
            // Auth::user()->token()->revoke();
            // Auth::user()->token()->delete();
            return redirect('/');
        } catch (Exception $e) {
            return redirect('/loginpage');
        }
    }
}


