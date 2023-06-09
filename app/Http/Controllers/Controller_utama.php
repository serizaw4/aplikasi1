<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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

        if($data->hasFile('foto')){
            $validator = Validator::make($data->all(),[
                'foto'  => 'image|max:1000'
            ]);
            if($validator->fails()){      
                return redirect('/register')->withErrors($validator->errors());
            };

            $ext  = $data->foto->getClientOriginalExtension();
            $foto = $insert->id.'.'.$ext;

            $data->foto->storeAs('public/user', $foto);

            User::where('id',$insert->id)->update([
                'foto' => $foto,
            ]);
        }

    	return redirect('/login_page')->withErrors([
    			'message_success'=> 'register berhasil'
    		]);

    	
    }

    public function login_page()
    {
        if(!Auth::user()){
            return view('login1');
        }else{
            return redirect('/dashboard');
        }
    }

    public function dashboard()
    {
        $user_cek=Auth::user();
        $get=Menu::all();
    	if(!$user_cek){
            return redirect('/login_page');
        }else{
            $foto='user_nw.png';
            if(!empty($user_cek->foto)){
                $foto=$user_cek->foto;
            }

            return view('dashboard')->with([
                'foto' =>$foto,
                'menu' =>$get
            ]);
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
    public function profile()
    {
        $user_cek=Auth::user();
        if(empty($user_cek->foto)){
            $user_cek->foto='user_nw.png';
        }
        // return $user_cek;
        return view('profile1')->with([
            'user' => $user_cek
        ]);
    }
    public function edit_profile(Request $data)
    {
        // return 1;
        $validator = Validator::make($data->all(),[
    		'nama' => 'required',
            'email' => 'required|email',
        ]);
        if($validator->fails()){      
            return redirect('/profile')->withErrors($validator->errors());
        };

        $user_cek=Auth::user();

        if($data->hasFile('foto')){
                $validator = Validator::make($data->all(),[
                    'foto'  => 'image|max:1000'
                ]);
                if($validator->fails()){      
                    return redirect('/profile')->withErrors($validator->errors());
                };
        
                $ext  = $data->foto->getClientOriginalExtension();
                $foto = $user_cek->id.'.'.$ext;
    
                $data->foto->storeAs('public/user', $foto);
    
                User::where('id',$user_cek->id)->update([
                    'name' => $data->nama,
                    'email' =>$data->email,
                    'foto' => $foto,
                ]);
        }else{
            User::where('id',$user_cek->id)->update([
                'name' => $data->nama,
                'email' =>$data->email,
            ]);
        }
        return redirect('/profile')->withErrors([
            'message_success'=> 'edit berhasil'
        ]);
    }
    public function ganti_password(Request $data)
    {
        $validator = Validator::make($data->all(),[
    		'pass_lama' => 'required',
            'pass_baru' => 'required',
            'pass_baru2' => 'required',
        ]);
        if($validator->fails()){      
            return redirect('/password')->withErrors($validator->errors());
        };

        $user_cek=Auth::user();

        if(Auth::attempt(['email' => $user_cek->email, 'password' => $data->pass_lama])){
       
            if($data->pass_baru == $data->pass_baru2){
               
                if($data->pass_lama == $data->pass_baru){
                    return redirect('/password')->withErrors([
                        'message'=> 'Error Password Baru dan Lama Sama'
                    ]);
                }else{
                    User::where('id',$user_cek->id)->update([
                        'password' => bcrypt($data->pass_baru)
                    ]);
                    return redirect('/password')->withErrors([
                        'message_success'=>'Password Telah Diganti'
                    ]);
                
                }
            }else{
                return redirect('/password')->withErrors([
                    'message'=> 'Error Password Baru Tidak Sama'
                ]);
            }
        }else{
            return redirect('/password')->withErrors([
                'message'=> 'Error Password Lama Salah'
            ]);
        }
    }

    public function password()
    {
        return view('gantipass');
    }
    public function kirim_pesan(Request $data)
    {
        $validator = Validator::make($data->all(),[
    		'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()){      
            return view('login1')->withErrors($validator->errors());
        }

        $insert=Message::create([
            'name' => $data->name,
    		'email' => $data->email,
    		'subject' => $data->subject,
            'message'=> $data->message,
    	]);
        if($insert){
            return redirect('/dashboard')->withErrors([
                'message_success'=>'Berhasil Dikirim'
            ]);
        }else{
            return redirect('/dashboard')->withErrors([
                'message'=> 'Gagal Dikirim'
            ]);
        }
    }
    public function cek()
    {
        return Message::all();
        // return DB::table('messages')->get();
        // return Message::where('id',3)->delete();
    }
}


