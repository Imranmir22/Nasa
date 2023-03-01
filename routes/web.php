<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;


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
    Route::get('get-employee/{id}', [EmployeesController::class,'get_employee']);
    Route::get('update-company/{id}', [CompaniesController::class,'update_company']);
    Route::resource('employee', EmployeesController::class);
    Route::resource('company', CompaniesController::class);
});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

