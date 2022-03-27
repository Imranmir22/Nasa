<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Registration;
use App\Http\Controllers\Api\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/register',[Registration::class,'try']);
//[UserController::class,'login']);

Route::resource('user', UserController::class)->only(['show', 'index', 'store', 'update', 'destroy']);
Route::middleware('api')->post('login', UserController::class . '@login');
Route::post('/login',[UserController::class,'login']);
