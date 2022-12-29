<?php

namespace App\Http\Controllers;
use App\Models\Human;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use illuminate\SUpport\Facades\Storage;
class TechController extends Controller
{
    //
    public function register_user(Request $request)
    {
        $human=new Human();
        $request->validate([
            'name'=>'required | max:50',
            'email'=>'required | email | max:150',
            'mobile'=>'min:8 | max:12'
        ]);
        $profile = $request->file('profile') ?? "";
        $base_name = $profile ? date("YmdHmi").$profile->getClientOriginalName() : "";   
        if($base_name) 
            $profile->move(public_path('storage/Images'), $base_name);

        $human->name    = $data['name']=$request->name;
        $human->email   = $data['email']=$request->email;
        $human->address = $data['address']=$request->address;
        $human->number  = $data['number']=$request->number;
        $human->profile = "Images/".$base_name;
        $human->save();
        UserRegistered::dispatch($data);
        return view('dashboard');

    }
}
