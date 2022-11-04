<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\NasaController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Route::view('nasa','nasa');
Route::view('nasa_chart','nasa_charts');
Route::post('show-data',[NasaController::class,'get_data']);

Route::get('middlewares',[UserController::class,'middlewares'])->middleware(['auth.basic','ensurepractice:user']);//2 middlewares
                                                        // when auser try to access this route directly
                                                        //he will get prompt to provide username and password 
                                                        //instead of redirecting to login page and then new
                                                        //custom middleware will be invoked if th request satisfies
                                                        //the requirements then only it will proceed otherwise 
                                                        //will be reverted to dashboard
                                                        //php artisan make:middleware EnsurePractice to create middleware

Route::middleware(['auth','auth.basic'])->group(function () {
Route::view('save-company','company');
Route::get('companies/{department}/employee/{employee:phone}', [CompanyController::class,'get_companies']);
Route::post('companies/add', [CompanyController::class,'register_company']);
Route::resource('company', CompanyController::class,['names' => 'company_resource']);
Route::resource('department', DepartmentController::class);

Route::view('manual_login','login.manual_login');
Route::post('user_manual_login',[UserController::class,'user_manual_login'])->name('user_login');
Route::get('/storage-functions',[UserController::class,'storage_functions']);
Route::get('company/edit_with_gate_policies/{company}',[CompanyController::class,'edit_with_gate_policies'])->middleware('can:update,company');//apply policy middleware to check whether or not to proceed this request
Route::get('all-companies',[CompanyController::class,'all_companies']);//->middleware('throttle:all_companies');//type of middleware that limits the amount of incoming traffic


Route::get('/firebase',[FirebaseController::class,'login']);

});