<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller_utama;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/hello_word',[Controller_utama::class,'index']);
Route::get('/create_user/{email}',[Controller_utama::class,'create_user']);
Route::get('/login_page',[Controller_utama::class,'login_page']);
Route::get('/login',[Controller_utama::class,'login_page'])->name('login');
Route::get('/dashboard',[Controller_utama::class,'dashboard']);
Route::get('/tampilan_awal',[Controller_utama::class,'tampilan_awal']);
Route::get('/register',[Controller_utama::class,'register']);

Route::post('/login_aksi',[Controller_utama::class,'login_aksi']);
Route::post('/aksi_register',[Controller_utama::class,'aksi_register']);
Route::post('/pesan_menu', [Controller_utama::class,'pesan_menu']);



Route::group(['middleware' => ['auth']], function() {
    Route::get('/password',[Controller_utama::class,'password']);
    Route::post('/ganti_password',[Controller_utama::class,'ganti_password']);
	Route::get('/logout', [Controller_utama::class,'logout']);
    Route::get('/profile',[Controller_utama::class,'profile']);
    Route::post('/edit_profile',[Controller_utama::class,'edit_profile']);
    Route::post('/kirim_pesan',[Controller_utama::class,'kirim_pesan']);
    Route::get('/cek', [Controller_utama::class,'cek']);
    Route::post('/input_menu', [Controller_utama::class,'input_menu']);
    Route::get('/hapus_menu/{id}', [Controller_utama::class,'hapus_menu']);
    
    Route::post('/edit_menu', [Controller_utama::class,'edit_menu']);
    Route::get('/edit_dashboard/{id}', [Controller_utama::class, 'edit_dashboard']);
    Route::get('/pesanan',[Controller_utama::class,'pesanan']);
    Route::get('/update_status/{id}',[Controller_utama::class,'update_status']);
    Route::get('/ambil_pesan/{id}',[Controller_utama::class,'ambil_pesan']);
});

Route::get('/', [Controller_utama::class,'tampilan_awal']);

// Route::get('/loginpage', function () {
//     return view('login1');
// });

// Route::get('/dashbor', function () {
//     return view('dashboard');
// });

Route::get('/regist', function () {
    return view('register1');
});