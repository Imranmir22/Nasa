<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function user_manual_login(Request $request)
    {
    
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role'=>'user'   //this will check in database table if user role is user or not 
        ])) {
            return Auth::login(Auth::user());
            // $request->session()->regenerate();
    
            return Auth::user(); //returns the current user
            Auth::id();            //returns the id of current user
            if(Auth::check())  // checks if user is logged
            {
                //do othing
            }

            $credentials=$request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if (Auth::once($credentials)) {
                //
            }


        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        // return redirect()->intended('dashboard');  //used to redirect to page user wants

    }
    public function middlewares()
    {
        return "in practice ";
    }

    public function logout(Request $request)
    {
        Auth::logout();    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();    
        return redirect('/');
    }
    public function storage_functions()
    {
        return Storage::path('uucpcQR9iRwAprKwL7L8rIKMVeh7I9fNnygtHSh4.jpg'); //returns full path C:\xampp\htdocs\Nasa\storage\app\uucpcQR9iRwAprKwL7L8rIKMVeh7I9fNnygtHSh4.jpg

        return  Storage::url('uucpcQR9iRwAprKwL7L8rIKMVeh7I9fNnygtHSh4.jpg');  //to get the URL for a given file
       
        return $size = Storage::size('file.jpg');//returns file size

        return $time = Storage::lastModified('file.jpg');//last modifed

        Storage::prepend('file.log', 'Prepended Text');//add  text at first
        Storage::append('file.log', 'Appended Text');//add text at last

        Storage::copy('old/file.jpg', 'new/file.jpg');//copy file
        Storage::move('old/file.jpg', 'new/file.jpg');//move file

        //To Download th file we must specify publicand it automatically includes storage folder and then we can
        //specify next folder name inside storage folder and then file name
        //the second parameter is  th file name the user will see
        return Storage::download('public/company_logo/uucpcQR9iRwAprKwL7L8rIKMVeh7I9fNnygtHSh4.jpg','flower');
       
        $contents = Storage::get('file.jpg');//get file
        $contents = Storage::put('folder_name_inside_storage_folder','content','public/private');//store file tird parameter is public or private 
                   
        
        $visibility = Storage::getVisibility('file.jpg'); //to get visibility of file
        Storage::setVisibility('file.jpg', 'public');//to set or reset visibility of file
        if (Storage::disk('s3')->exists('file.jpg')) {  //checks if file exitsts
            // ...
        }

        Storage::delete(['file.jpg', 'file2.jpg']);//to delete the file

        $files = Storage::files('storage');//all files within a directory(storage)
        $files = Storage::allFiles('storage');//all files within a directory and files of other  sub direcories

        $directories = Storage::directories('storage');//diretories in a directory
        $directories = Storage::allDirectories('storage');//direcories and sub directories in a directory

        Storage::makeDirectory('storage');//make directory

        Storage::deleteDirectory('storage');//delete directory
    }
}
