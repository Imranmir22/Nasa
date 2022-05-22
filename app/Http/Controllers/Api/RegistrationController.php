<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registrations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{


    function register_user(Request $request)
    {
        $req=$request->input();
        $errors= $request->validate(
           ['userfile'=>'mimes:pdf',
           'name'=>'required',
           'phone'=>'required | min:10 |max:12',
           'email'=>'required | email |unique:registrations'
           ]

       );
        $register=new Registrations();
        $register->name=$req['name'];
        $register->email=$req['email'];
        $register->phone=$req['phone'];
        $register->role=$req['role'];
        $path= $request->file('userfile')->store('public');    
        $path= pathinfo($path);
        $register->file=$path['basename'];
        $register->save();
        return view('login',['msg'=>'registered successfully']);
       // return redirect('/api/reg');

    }


}
