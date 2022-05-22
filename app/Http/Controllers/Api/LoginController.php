<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registrations;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class LoginController extends Controller
{
    // function login_user(Request $request)
    // {
    //     $cred=Registrations::where('name',$request->name)->where('email',$request->email)->get();

    //    if($cred!='[]')
    //    {
    //         if($cred[0]->role=='admin')
    //         {
    //             $users=Registrations::where('role','!=','admin')->get();
    //             return view('list',['users'=>$users]);
    //         }
    //         else
    //             echo("<h3>login successful</h3>");
    //    }
    //    else
    //    {
    //     return view("login");
    //    }
    // }



    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();
           // dd($user);
            $finduser = Registrations::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return view('register');
                return  redirect('/home');

            }else{
                return view('register');
                $newUser = Registrations::create([

                    'name' => $user->name,
                    'email' => $user->email,

                    'google_id'=> $user->id

                      ]);

                      Auth::login($newUser);

                      return redirect()->back();

                  }
                } catch (Exception $e) {

                    return redirect('auth/google');

                }

            }

}

