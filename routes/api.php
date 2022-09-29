<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SeekexController;

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
Route::get('/bucketvolumes',function(){
    echo 'bucket';
});


// Route::view('balls','/ball');
// Route::view('buckets','/buckets');
// Route::view('fill_buckets','/fill_buckets');


// Route::post('/bucketvolumes',[SeekexController::class,'bucket_volume']);
// Route::post('/ballvolumes',[SeekexController::class,'ball_volume']);
// Route::post('/fill',[SeekexController::class,'fill_buckets']);
