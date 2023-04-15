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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginpage', function () {
    return view('login1');
});