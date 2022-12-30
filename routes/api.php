<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

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

Route::post('login',[AuthController::class,'login']);
Route::post('register_user',[AuthController::class,'register']);

Route::middleware(['auth:api'])->group(function () {
Route::post('logout',[AuthController::class,'logout']);
Route::get('get-users',[AuthController::class,'index']);
Route::get('get-user/{id}',[AuthController::class,'show']);
Route::put('edit-user/{id}',[AuthController::class,'update']);
Route::delete('delete-user/{id}',[AuthController::class,'destroy']);
Route::get('books-on-rent',[AuthController::class,'books_on_rent']);

Route::resource('books',BooksController::class);
Route::get('rent-book/{id}',[BooksController::class,'rent_book']);
Route::get('book-returned/{id}',[BooksController::class,'book_returned']);

});




