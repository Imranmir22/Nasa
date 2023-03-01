<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Companies;
use App\Http\Controllers\Employees;
use App\Http\Controllers\NasaController;


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


Route::middleware(['auth'])->group(function () {
    Route::view('save-employee','employees');
    Route::view('save-company','companies');
    // Route::view('update-employee','update_employee');
    Route::get('get-employee/{id}', [Employees::class,'get_employee']);
    Route::get('update-company/{id}', [Companies::class,'update_company']);
    Route::resource('employee', Employees::class);
    Route::resource('company', Companies::class);
});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Route::view('nasa','nasa');
Route::view('nasa_chart','nasa_charts');
Route::post('show-data',[NasaController::class,'get_data']);
