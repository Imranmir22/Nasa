<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('api')->post('login', UserController::class . '@login');

// Route::middleware(['api', 'auth:sanctum'])->group(function () {
//    // Route::get('/register',[Registration::class,'try']);
//     Route::resource('user', UserController::class)->only(['show', 'index', 'store', 'update', 'destroy']);
//     Route::post('logout', UserController::class . '@logout');
// });

Route::view('loginuser','/login');

Route::view('reg','/register');
//Route::view('list','/list');

Route::post('/registerd',[RegistrationController::class,'register_user']);

Route::post('/userlogin',[LoginController::class,'login_user'])->name('login');

