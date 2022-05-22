<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\LoginController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::post('send',[EmailController::class,'sendmail']);
Route::view('/send-mail','/sendMail');
// Route::get('send-mail', function () {
//         $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];

//     \Mail::to('immu12725@gmail.com')->send(new \App\Mail\MyTestMail($details));

//     dd("Email is Sent.");
// });

//Route::view('googleAuth');
Route::get('auth/login',[LoginController::class,'redirectToGoogle']);
Route::get('postmessage',[LoginController::class,'handleGoogleCallback']);
