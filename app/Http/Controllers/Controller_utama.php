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
}


