<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GoogleDocsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TechController;


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


//used these two routes
// Route::view('register_student','register');
// Route::post('register-user',[TechController::class,"register_user"]);


///////////











// Route::get('google',[GoogleDocsController::class,'getValues']);
// Route::post('upload-image',[StudentController::class,'upload_image']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
   
Route::middleware(['auth','auth.basic'])->group(function () {
    Route::view('students',"students");
    Route::get('get-contacts',[StudentController::class,'get_contacts']);
    Route::patch('edit-contact/{id}',[StudentController::class,'edit_contact']);
    Route::delete('delete-contact/{id}',[StudentController::class,'delete_contact']);
    Route::post('add-contact',[StudentController::class,'add_contact']);



// Route::get('store/books',[BookController::class,'insert_books']);
// Route::resource('books',BookController::class);

});