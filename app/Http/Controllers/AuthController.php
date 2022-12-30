<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Enums\ServerStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function test()
    {
        return Hash::make(12345);
    }
    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'invalid credentials',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request)
    {


        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'age'  => 'required|max:3',
            'mobile_number' => 'required|max:10|unique:users,mobile_number',
            'city'  => 'required|string|max:255',
            'gender' => 'required|in:m,f,o',
            'password' => 'required|string|min:6',
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'city' => $request->city,
            'gender' => $request->gender,
            'age' => $request->age,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function index()
    {
        //
        $users = User::get();
        return response()->json([
            'status' => 'success',
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        try {
            return User::findorfail($id);
        } catch (ModelNotFoundException $e) {
            return ['message' => 'id not found'];
        }
    }
    public function update(Request $request, $id)
    {
        try
        {
            $user = User::findorfail($id);
            $request->validate([
                'first_name'     => 'string|max:255',
                'last_name'      => 'string|max:255',
                'email'          => ['string','email','max:255',Rule::unique('users')->ignore($user->id,'email')],
                'age'            => 'max:3',
                'mobile_number'  => ['max:10',Rule::unique('users')->ignore($user->id,'mobile_number')],
                'city'           => 'string|max:255',
                'gender'         => 'in:m,f,o',
                'password'       => 'string|min:6',
            ]);
            $user->first_name=$request->first_name ?? $user->first_name;
            $user->last_name=$request->last_name ?? $user->last_name;
            $user->email=$request->email ?? $user->email;
            $user->age=$request->age ?? $user->age;
            $user->mobile_number=$request->mobile_number ?? $user->mobile_number;
            $user->city=$request->city ?? $user->city;
            $user->gender=$request->gender ?? $user->gender;
            $user->password=$request->password ?? $user->password;
            $user->save();
            return $request;
        } catch (ModelNotFoundException $e) {
            return ['message' => 'id not found'];
        }
    }
    public function destroy($id)
    {
        try {
            $user=User::findorfail($id);
            User::destroy($id);
            return ['message' => 'user deleted'];
            
        } catch (ModelNotFoundException $e) {

            return ['message' => 'id not found'];
        }
    }
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }


    public function books_on_rent()
    {    
        $articles = User::whereHas('rent_books')->get();
        return $articles;
    }
}
